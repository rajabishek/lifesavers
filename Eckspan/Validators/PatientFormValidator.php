<?php namespace Eckspan\Validators;

use Laracasts\Validation\FormValidator;

class PatientFormValidator extends FormValidator{
	
	protected $rules = [];
    /*
     * Validation rules for the status form
     * @var Array
     */
    protected $create_rules = array(
			'name' => 'required',
			'email' => 'required|email|unique:patients',
			'age' => 'required|integer|between:1,100',
			'sex' => 'required',
			'blood_group' => 'required',
			'mobile' => 'required|digits:10',
			'address' => 'required'
	);

    protected $update_rules = array(
			'name' => 'required',
			'email' => 'required|email',
			'age' => 'required|integer|between:1,100',
			'sex' => 'required',
			'blood_group' => 'required',
			'mobile' => 'required|digits:10',
			'address' => 'required'
	);

    /**
     * @param array $input
     * @return mixed
     */
    public function validateCreate(array $input)
    {
        $this->rules = $this->create_rules;
        return $this->validate($input);
    }

    /**
     * @param int $id
     * @param array $input
     * @return mixed
     */
    public function validateUpdate(array $input, $id)
    {
        $this->update_rules['email'] = "required|email|unique:patients,email,$id";
        $this->rules = $this->update_rules;
        return $this->validate($input);
    }
}