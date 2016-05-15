<?php
use Laracasts\Validation\FormValidationException;
use Laracasts\Commander\CommanderTrait;
use Eckspan\Validators\PatientFormValidator;

class PatientsController extends \BaseController {

	use CommanderTrait;

	protected $patientFormValidator;

	public function __construct(PatientFormValidator $patientFormValidator){
		$this->patientFormValidator = $patientFormValidator;
	}
	
	/**
	 * Ask help from donors fom blood donation
	 * GET/donors/seekhelp
	 *
	 * @return Response
	 */
	public function seekhelp($id)
	{
		$patient = Patient::find($id);
		$count = Donor::whereBloodGroup($patient->blood_group)->count();
		return View::make('patients.seekhelp',compact('patient','count'));
	}

	public function postSeekhelp(){
		Flash::success(Input::get('name')."'s contact details was mailed to all the donors !");
		return Redirect::route('patients.show',Input::get('id'));
	}

	/**
	 * Display a listing of the resource.
	 * GET /patients
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = Request::get('q');
		$bloodgroup = Request::get('bloodgroup');
		if($query){
			$patients = Patient::where('blood_group','LIKE',"%$query%")
									->orWhere('name','LIKE',"%$query%")
									->orWhere('age','LIKE',"%$query%")
									->orWhere('sex','LIKE',"%$query%")
									->orWhere('email','LIKE',"%$query%")
									->orWhere('mobile','LIKE',"%$query%")
									->orderBy('created_at','desc')->paginate(10);
		}
		else if($bloodgroup){
			$patients = Patient::where('blood_group',$bloodgroup)
									->orderBy('created_at','desc')->paginate(10);
		}
		else{
			$patients = Patient::orderBy('created_at','desc')->paginate(10);
		}
		return View::make('patients.index',compact('patients'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /patients/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('patients.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /patients
	 *
	 * @return Response
	 */
	public function store()
	{
		try
	    {
	        $this->patientFormValidator->validateCreate(Input::all());
	        //$command = new RecordPatientDetailsCommand($input);
			//$patient = $this->commandBus->execute($command);
			$patient = Patient::create(Input::all());
			Flash::success('New patient record has been successfully added !');
			return Redirect::route('patients.show',$patient->id);
	    }
	    catch (FormValidationException $e)
	    {
	        return Redirect::back()->withInput()->withErrors($e->getErrors());
	    }
	}

	/**
	 * Display the specified resource.
	 * GET /patients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$patient = Patient::find($id);
		return View::make('patients.show',compact('patient'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /patients/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$patient = Patient::find($id);
		return View::make('patients.edit',compact('patient'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /patients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try
	    {
	        $this->patientFormValidator->validateUpdate(Input::all(),$id);
	        $patient = Patient::find($id);
			$patient->name = Input::get('name');
			$patient->email = Input::get('email');
			$patient->age = Input::get('age');
			$patient->sex = Input::get('sex');
			$patient->blood_group = Input::get('blood_group');
			$patient->mobile = Input::get('mobile');
			$patient->address = Input::get('address');
			$patient->save();
			Flash::success('Patient record has been successfully updated !');
			return Redirect::route('patients.show',$id);
	    }
	    catch (FormValidationException $e)
	    {
	        return Redirect::back()->withInput()->withErrors($e->getErrors());
	    }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /patients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$patient = Patient::find($id);
		$patient->delete();
		Flash::success("$patient->name was successfully removed from the patients list !");
		return Redirect::route('patients.index');
	}

}