<?php namespace Eckspan\Donors;

class RecordDonorDetailsCommand {

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $age;

    /**
     * @var string
     */
    public $sex;

    /**
     * @var string
     */
    public $blood_group;

    /**
     * @var string
     */
    public $mobile;

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $observations;

    /**
     * @param string name
     * @param string email
     * @param string age
     * @param string sex
     * @param string blood_group
     * @param string mobile
     * @param string address
     * @param string observations
     */
    public function __construct($name, $email, $age, $sex, $blood_group, $mobile, $address, $observations)
    {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
        $this->sex = $sex;
        $this->blood_group = $blood_group;
        $this->mobile = $mobile;
        $this->address = $address;
        $this->observations = $observations;
    }

}