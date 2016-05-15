<?php namespace Eckspan\Mailers;
use Mail;

class DonorMailer extends Mailer{

	public function sendConfirmation(){
		$this->subject = 'Welcome Aboard !';
		$this->view = 'emails.donors.welcome';
		return $this;
	}
}