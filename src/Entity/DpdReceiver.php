<?php
declare(strict_types=1);

namespace TMCms\Modules\Dpd\Entity;

class DpdReceiver
{
    private $address = '';
    private $city = '';
    private $company = '';
    private $country_code = '';
    private $email = '';
    private $name = '';
    private $phone = '';
    private $postal_code = '';

    public function __construct(array $initial_data = [])
    {
        // Set all supported fields
        foreach ($initial_data as $k => $v) {
            if (isset($this->{$k})) {
                $this->{$k} = $v;
            }
        }
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return DpdReceiver
     */
    public function setAddress(string $address): DpdReceiver
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return DpdReceiver
     */
    public function setCity(string $city): DpdReceiver
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @param string $company
     * @return DpdReceiver
     */
    public function setCompany(string $company): DpdReceiver
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->country_code;
    }

    /**
     * @param string $country_code
     * @return DpdReceiver
     */
    public function setCountryCode(string $country_code): DpdReceiver
    {
        $this->country_code = $country_code;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return DpdReceiver
     */
    public function setEmail(string $email): DpdReceiver
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DpdReceiver
     */
    public function setName(string $name): DpdReceiver
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return DpdReceiver
     */
    public function setPhone(string $phone): DpdReceiver
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postal_code;
    }

    /**
     * @param string $postal_code
     * @return DpdReceiver
     */
    public function setPostalCode(string $postal_code): DpdReceiver
    {
        $this->postal_code = $postal_code;

        return $this;
    }
}