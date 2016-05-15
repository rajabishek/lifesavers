<?php namespace Eckspan\Validators;

use Laracasts\Validation\FormValidator;

class LoginFormValidator extends FormValidator{
	protected $rules = array(
			'username' => 'required',
			'password' => 'required'
		);
}