<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration\Services;

use Iks\Symfony1SIntegration\Exceptions\Exchange1CException;

class SaleService extends AbstractService
{

    /**
     * Начало сеанса
     * Выгрузка данных начинается с того, что система "1С:Предприятие" отправляет http-запрос следующего вида:
     * http://<сайт>/<путь> /1c-exchange?type=sale&mode=checkauth.
     * В ответ система управления сайтом передает системе «1С:Предприятие» три строки (используется разделитель строк "\n"):
     * - слово "success";
     * - имя Cookie;
     * - значение Cookie.
     * Примечание. Все последующие запросы к системе управления сайтом со стороны "1С:Предприятия" содержат в заголовке запроса имя и значение Cookie.
     *
     * @return string
     * @throws Exchange1CException
     */
    public function checkauth(): string
    {
        return $this->authService->checkAuth();
    }

    /**
     * Уточнение параметров сеанса
     * Далее следует запрос следующего вида:
     * http://<сайт>/<путь>/1c_exchange.php?type=sale&mode=init
     * В ответ система управления сайтом передает две строки:
     * - zip=yes, если сервер поддерживает обмен в zip-формате —  в этом случае на следующем шаге файлы должны быть упакованы в zip-формате
     *   или
     *   zip=no — в этом случае на следующем шаге файлы не упаковываются и передаются каждый по отдельности.
     * - file_limit=<число>,
     *   где <число> — максимально допустимый размер файла в байтах для передачи за один запрос.
     *   Если системе «1С: Предприятие» понадобится передать файл большего размера, его следует разделить на фрагменты.
     *
     * @return string
     * @throws Exchange1CException
     */
    public function init(): string
    {
        $this->authService->auth();
        $this->loaderService->clearImportDirectory();
        $zipEnable = function_exists('zip_open') && $this->config->isUseZip();
        $response = 'zip='.($zipEnable ? 'yes' : 'no')."\n";
        $response .= 'file_limit='.$this->config->getFilePart();

        return $response;
    }

    /**
     * Получение файла обмена с сайта
     * На сайт отправляется запрос вида
     * http://<сайт>/<путь>/1c_exchange.php?type=sale&mode=query.
     * Сайт передает сведения о заказах в формате CommerceML 2.
     * В случае успешного получения и записи заказов «1С: Предприятие» передает на сайт запрос вида
     * http://<сайт>/<путь>/1c_exchange.php?type=sale&mode=success
     *
     * @param string $filePath
     * @return string
     */
    public function query(string $filePath): string
    {
        if (substr($filePath, -10) === 'orders.xml') {
            throw new \LogicException('This method is not released');
        }
        if (substr($filePath, -3) !== 'xml') {
            throw new \LogicException('This format of file is not supported');
        }

        return "success\n".$filePath."\n";
    }

    /**
     * В случае успешного получения и записи заказов «1С: Предприятие» передает на сайт запрос вида
     * http://<сайт>/<путь>/1c_exchange.php?type=sale&mode=success
     *
     * @param string $filePath
     * @return string
     */
    public function success(string $filePath): string
    {
        if (empty($filePath)) {
            return "failure\n";
        }
        $content = file_get_contents($filePath);
        if ($content === false) {
            return "failure\n";
        }

        return "success\n";
    }

    /**
     * Отправка файла обмена на сайт
     * Система «1С: Предприятие» отправляет на сайт запрос вида
     * http://<сайт>/<путь>/1c_exchange.php?type=sale&mode=file&filename=<имя файла>,
     * который загружает на сервер файл обмена, посылая содержимое файла в виде POST.
     * В случае успешной записи файла система управления сайтом передает строку со словом «success».
     * Дополнительно на следующих строчках могут содержаться замечания по загрузке.
     * Примечание. Если в ходе какого-либо запроса произошла ошибка, то в первой строке ответа системы управления сайтом будет содержаться слово «failure»,
     * а в следующих строках — описание ошибки, произошедшей в процессе обработки запроса.
     * Если произошла необрабатываемая ошибка уровня ядра продукта или sql-запроса, то будет возвращен html-код.
     *
     * @return string
     * @throws Exchange1CException
     */
    public function file()
    {
        $this->authService->auth();

        return $this->loaderService->load();
    }
}
