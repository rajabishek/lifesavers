<?php namespace Eckspan\Listeners;
use Eckspan\Donors\Events\DonorDetailsWasRecorded;
use Eckspan\Donors\Events\DonorWasFoundForUrgency;
use Eckspan\Mailers\DonorMailer;
use Laracasts\Commander\Events\EventListener;

class EmailNotifier extends EventListener{

	public function whenDonorDetailsWasRecorded(DonorDetailsWasRecorded $event){
		$donorMailer = new DonorMailer($event->donor);
		$donorMailer->sendConfirmation()->deliver();
	}
}