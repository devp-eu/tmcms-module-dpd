<?php
declare(strict_types = 1);

namespace TMCms\Modules\Dpd\Entity;

use Exception;
use SoapClient;

class DpdService
{
    private $is_test_mode = true;
    private $dpd_hosts = array(
        0 => 'ws.dpd.com/services/', // production
        1 => 'wstest.dpd.com/services/' // test
    );

    /** @var SoapClient */
    private $SOAP_client;

    /** @var DpdDelivery */
    private $delivery;

    public function arrangeDelivery(DpdDelivery $delivery)
    {
        $this->delivery = $delivery;
        // TODO request DPD for new delivery with all supplied data

        $this->connectToDpd();

        // Change required methods here
        $responce = $this->callDpdGeneratePackageNumbers();

    }

    private function connectToDpd()
    {
        $host = $this->dpd_hosts[(int)$this->is_test_mode];

        try {
            // Soap-подключение к сервису
            $this->SOAP_client = new SoapClient('http://' . $host);
        } catch (Exception $e) {
            throw new Exception('SOAP client can not connect. ' . $e->getMessage());
        }

        return true;
    }

    private function callDpdGeneratePackageNumbers()
    {
        if (!$this->SOAP_client) {
            return false;
        }

        try {
            $res = $this->SOAP_client->createShipment($this->getFormattedDeliveryData());
        } catch (Exception $e) {
            throw new Exception('SOAP client can not connect. ' . $e->getMessage());
        }

        return $res;
    }

    private function getFormattedDeliveryData()
    {
        return $this->delivery;
    }
}