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

        $customer = new DpdSender(); // Data about sender of the delivery packages
        $customer->setAddress('My address');
        $customer->setCity('My city');
        $customer->setCompany('My company');
        $customer->setCountryCode('My country code');
        $customer->setEmail('My email');
        $customer->setName('My name');
        $customer->setPhone('My phone');
        $customer->setPostalCode('My postal code');

        // Or use new DpdCustomer($data_array_for_construct);

        $receiver = new DpdReceiver(); // To whom delivery is sent
        $receiver->setAddress('His address');
        $receiver->setCity('His city');
        $receiver->setCompany('His company');
        $receiver->setCountryCode('His country code');
        $receiver->setEmail('His email');
        $receiver->setName('His name');
        $receiver->setPhone('His phone');
        $receiver->setPostalCode('His postal code');

        $parcel_one = new DpdParcel(); // One of the packages for delivery
        $parcel_one->setTitle('Korobka s konfetami');
        $parcel_one->setCustomer();
        $parcel_one->setWeight(5);

        $parcel_two = new DpdParcel(); // Another package for the delivery
        $parcel_two->setTitle('Cveti');
        $parcel_two->setCustomer();
        $parcel_two->setWeight(5);

        $delivery = new DpdDelivery(); // Delivery itself
        $delivery->setSender($customer);
        $delivery->setReceiver($receiver);
        $delivery->addParcel($parcel_one); // May add array of parcel object or by one object

        // Or connect delivery to parcel otherwise
        $parcel_two->addtoDelivery($delivery);

        $dpd = new DpdService();
        $dpd->arrangeDelivery($delivery); // Run many times for many deliveries or supply array of objects

        // Or use one method to do it all
        ModuleDpd::sendDelivery([$parcel_one, $parcel_two]);
    }
}