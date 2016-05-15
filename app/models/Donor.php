<?php

use Laracasts\Commander\Events\EventGenerator;
use Eckspan\Donors\Events\DonorDetailsWasRecorded;
use Eckspan\Donors\Events\DonorWasFoundForUrgency;

class Donor extends \Eloquent {
	
	use EventGenerator;
	protected $guarded = [];

	public static function recordDetails($name, $email, $age, $sex, $blood_group, $mobile, $address, $observations){
		$donor = static::create(compact('name','email','age','sex','blood_group','mobile','address','observations'));
		$donor->raise(new DonorDetailsWasRecorded($donor));
		return $donor;
	}
}