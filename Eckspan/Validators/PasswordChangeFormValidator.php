<?php namespace Eckspan\Validators;

use Laracasts\Validation\FormValidator;

class PasswordChangeFormValidator extends FormValidator{
	protected $rules = array(
			'password_current' => 'required',
			'password' => 'required',
			'password_confirmation' => 'required|same:password'
		);
}