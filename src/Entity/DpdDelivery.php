<?php
declare(strict_types=1);

namespace TMCms\Modules\Dpd\Entity;

class DpdDelivery
{
    /** @var DpdSender */
    private $sender;

    /** @var DpdReceiver */
    private $receiver;

    private $parcels;

    /**
     * @return DpdSender
     */
    public function getSender(): DpdSender
    {
        return $this->sender;
    }

    /**
     * @param DpdSender $sender
     * @return DpdDelivery
     */
    public function setSender(DpdSender $sender): DpdDelivery
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return DpdReceiver
     */
    public function getReceiver(): DpdReceiver
    {
        return $this->receiver;
    }

    /**
     * @param DpdReceiver $receiver
     * @return DpdDelivery
     */
    public function setReceiver(DpdReceiver $receiver): DpdDelivery
    {
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * @param DpdParcel $parcel
     * @return DpdDelivery
     */
    public function addParcel(DpdParcel $parcel): DpdDelivery
    {
        $this->parcels[] = $parcel;
        return $this;
    }

    /**
     * @return array
     */
    public function getParcels(): array
    {
        return $this->parcels;
    }
}