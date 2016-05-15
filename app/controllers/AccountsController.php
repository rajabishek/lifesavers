<?php
use Laracasts\Validation\FormValidationException;
use Eckspan\Validators\LoginFormValidator;
use Eckspan\Validators\PasswordChangeFormValidator;

class AccountsController extends \BaseController {

	protected $loginFormValidator;
	protected $passwordChangeFormValidator;

	public function __construct(LoginFormValidator $loginFormValidator,PasswordChangeFormValidator $passwordChangeFormValidator){
		$this->loginFormValidator = $loginFormValidator;
		$this->passwordChangeFormValidator = $passwordChangeFormValidator;
	}

	public function getProfile(){
		return View::make('accounts.profile');
	}
	
	public function getLogin(){
		if(Auth::check()) return Redirect::route('donors.index');
		return View::make('accounts.login');
	}

	public function postLogin(){

		try
	    {
	        $this->loginFormValidator->validate(Input::all());
	        $credentials = array('username' => Input::get('username'),'password' => Input::get('password'));
			if(Auth::attempt($credentials)){
				return Redirect::route('donors.index');
			}
			
			Flash::error('<strong>Oops !</strong> Invalid credentials.');
			//We are using error code 500 for ivalid credentials
			return Redirect::back()->withInput();
	    }
	    catch (FormValidationException $e)
	    {
	        return Redirect::back()->withInput()->withErrors($e->getErrors());
	    }

	}

	public function logout(){
		Auth::logout();
		return Redirect::route('home');
	}

	public function getChangepassword(){
		return View::make('accounts.changepassword');
	}

	public function postChangepassword(){
		try
	    {
	        $this->passwordChangeFormValidator->validate(Input::all());
	        $user = User::first();
			if(Hash::check(Input::get('password_current'),$user->password)){
				$user->password = Hash::make(Input::get('password'));
				$user->save();
				Flash::success('Password has been sucessfully updated !');
				return Redirect::route('donors.index');
			}
			Flash::error('Oops! Invalid credentials');
			return Redirect::back()->withInput();
	    }
	    catch (FormValidationException $e)
	    {
	        return Redirect::back()->withInput()->withErrors($e->getErrors());
	    }
	}

}