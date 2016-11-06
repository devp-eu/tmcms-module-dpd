<?php

namespace TMcms\Modules\Dpd;

use TMCms\Modules\Dpd\Entity\DpdSender;
use TMCms\Modules\Dpd\Entity\DpdDelivery;
use TMCms\Modules\Dpd\Entity\DpdParcel;
use TMCms\Modules\Dpd\Entity\DpdReceiver;
use TMCms\Modules\Dpd\Entity\DpdService;

class CmsDpd {
    public function _default()
    {
        // Run test delivery
        $this->_generate_package_numbers();
    }

    private function _generate_package_numbers()
    {

        // TODO this is only an example prototype code, no code intended to run

        // TODO GenerateDeliveryPackageNumbers

        // Object wih method by one
        $sender = new DpdSender(); // Data about sender of the delivery packages
        $sender->setAddress('My address');
        $sender->setCity('My city');
        $sender->setCompany('My company');
        $sender->setCountryCode('My country code');
        $sender->setEmail('My email');
        $sender->setName('My name');
        $sender->setPhone('My phone');
        $sender->setPostalCode('My postal code');

        // Or use initial data
        $receiver = new DpdReceiver([ // Data about receiver of delivery
            'address' => 'His address',
            'city' => 'His city',
            'company' => 'His company',
            'country_code' => 'His country code',
            'email' => 'His email',
            'name' => 'His name',
            'phone' => 'His phone',
            'postal_code' => 'His postal code',
        ]); // To whom delivery is sent

        $parcel_one = new DpdParcel(); // One of the packages for delivery
        $parcel_one->setTitle('Korobka s konfetami');
        $parcel_one->setWeight(5);

        $parcel_two = new DpdParcel(); // Another package for the delivery
        $parcel_two->setTitle('Cveti');
        $parcel_two->setWeight(5);

        $delivery = new DpdDelivery(); // Delivery itself
        $delivery->setSender($sender);
        $delivery->setReceiver($receiver);
        $delivery->addParcel($parcel_one);

        // Or connect delivery to parcel otherwise
        $parcel_two->addToDelivery($delivery);

        $dpd = new DpdService();
        $dpd->arrangeDelivery($delivery); // Run many times for many deliveries or supply array of objects



        // Or use one method to do it all
        ModuleDpd::sendDelivery($sender, $receiver, [$parcel_one, $parcel_two]);
    }
}