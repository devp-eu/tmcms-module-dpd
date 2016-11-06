<?php
declare(strict_types = 1);

namespace TMCms\Modules\Dpd\Entity;

use Exception;
use SoapClient;

class DpdService
{
    private $is_test_mode = true;
    private $dpd_hosts = array(
        // TODO get addresses
        0 => 'http://wstest.dpd.ru/services/nl', // production
        1 => 'http://wstest.dpd.ru/services/nl' // test
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
        $response = $this->callDpdGeneratePackageNumbers();

        dump($response);
    }

    private function connectToDpd()
    {
        $host = $this->dpd_hosts[(int)$this->is_test_mode];

        try {
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
        // TODO
        $AdditionalServiceVO = [];

        $ParcelVO = [
            'parcelId' => '',
            'parcelReferenceNumber' => '',
            'dimensionsHeight' => '',
            'dimensionsWidth' => '',
            'dimensionsLength' => '',
            'weight' => '',
            'description' => '',
        ];

        $ShipmentVO = [
            'shipmentId' => '', // Leave empty to create new DPD or fill in if update existing
            'shipshipmentReferenceNumbermentId' => '',
            'payerId' => '',
            'senderAddressId' => '',
            'receiverName' => '',
            'receiverFirmName' => '',
            'receiverCountryCode' => '',
            'receiverZipCode' => '',
            'receiverCity' => '',
            'receiverStreet' => '',
            'receiverHouseNo' => '',
            'receiverPhoneNo' => '',
            'mainServiceCode' => '',
            'additionalServices' => $AdditionalServiceVO,
            'additionalServicesparcels' => $ParcelVO,
        ];

        $data = [
            'wsUserName' => '',
            'wsPassword' => '',
            'wsLang' => '',
            'appliactionType' => '',
            'shipment' => $ShipmentVO,
            'priceOption' => '',
        ];

        return $data;
    }
}