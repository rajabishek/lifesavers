<?php namespace Eckspan\Mailers;
use Mail;
use Exception;

class InvalidDonorContactInfoException extends Exception{};

abstract class Mailer{
	protected $to;
	protected $email;
	protected $subject;
	protected $view;
	protected $data = array();
	protected $options;

	public function __construct($donor){
		if(!is_object($donor)){
			throw new InvalidDonorContactInfoException('Please pass a valid donor object');
		}
		$this->data = $donor->toArray();
		$this->to = $donor->name;
		$this->email = $donor->email;
	}

	public function deliver(){
		return Mail::send($this->view,$this->data,function($message){
			$message->to($this->email,$this->to)->subject($this->subject);
			if(is_callable($this->options)){
				call_user_func($this->options,$message);
			}
		});
	}

}