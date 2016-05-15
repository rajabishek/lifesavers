<?php namespace Eckspan\Donors\Events;
use Donor;

class DonorDetailsWasRecorded{

	public $donor;
	public function __construct(Donor $donor){
		$this->donor = $donor;
	}
}