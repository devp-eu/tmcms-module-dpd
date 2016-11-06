<?php
declare(strict_types=1);

namespace TMCms\Modules\Dpd\Entity;

class DpdParcel
{
    private $title = '';
    private $weight = 0;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return DpdParcel
     */
    public function setTitle(string $title): DpdParcel
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     * @return DpdParcel
     */
    public function setWeight(int $weight): DpdParcel
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @param DpdDelivery $delivery
     * @return DpdParcel
     */
    public function addToDelivery(DpdDelivery $delivery): DpdParcel
    {
        $delivery->addParcel($this);
        return $this;
    }
}