<?php

namespace TMcms\Modules\Dpd;

use TMCms\Modules\Dpd\Entity\DpdDelivery;
use TMCms\Modules\Dpd\Entity\DpdReceiver;
use TMCms\Modules\Dpd\Entity\DpdSender;
use TMCms\Modules\Dpd\Entity\DpdService;

class ModuleDpd {

    public static function sendDelivery(DpdSender $sender, DpdReceiver $receiver, array $parcels)
    {
        $delivery = new DpdDelivery(); // Delivery itself
        $delivery->setSender($sender);
        $delivery->setReceiver($receiver);
        foreach ($parcels as $parcel) {
            $delivery->addParcel($parcel);
        }

        $dpd = new DpdService();
        $dpd->arrangeDelivery($delivery);
    }
}