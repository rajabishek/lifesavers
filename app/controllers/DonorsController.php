<?php
use Laracasts\Validation\FormValidationException;
use Eckspan\Validators\DonorFormValidator;
use Eckspan\Mailers\DonorMailer;
use Eckspan\Donors\RecordDonorDetailsCommand;
use Eckspan\Donors\NotifyUrgencyCommand;

use Laracasts\Commander\CommanderTrait;

class DonorsController extends \BaseController {

	use CommanderTrait;

	protected $donorFormValidtor;
	
	public function __construct(DonorFormValidator $donorFormValidtor){
		$this->donorFormValidtor = $donorFormValidtor;
	}

	/**
	 * Display a listing of the resource.
	 * GET /donors
	 *
	 * @return Response
	 */
	public function index(){
		$query = Request::get('q');
		$bloodgroup = Request::get('bloodgroup');
		if($query){
			$donors = Donor::where('blood_group','LIKE',"%$query%")
									->orWhere('name','LIKE',"%$query%")
									->orWhere('age','LIKE',"%$query%")
									->orWhere('sex','LIKE',"%$query%")
									->orWhere('email','LIKE',"%$query%")
									->orWhere('mobile','LIKE',"%$query%")
									->orderBy('created_at','desc')->paginate(10);
		}
		else if($bloodgroup){
			$donors = Donor::where('blood_group',$bloodgroup)
									->orderBy('created_at','desc')->paginate(10);
		}
		else{
			$donors = Donor::orderBy('created_at','desc')->paginate(10);
		}
		return View::make('donors.index',compact('donors'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /donors/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('donors.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /donors
	 *
	 * @return Response
	 */
	public function store(){
		$input = Input::all();
		try
	    {
	        $this->donorFormValidtor->validateCreate($input);
	        //$command = new RecordDonorDetailsCommand($input);
	        //$donor = $this->commandBus->execute($command);
			$donor = $this->execute(RecordDonorDetailsCommand::class);
			Flash::success('New donor record has been successfully added !');
			return Redirect::route('donors.show',$donor->id);
	    }
	    catch (FormValidationException $e)
	    {
	        return Redirect::back()->withInput()->withErrors($e->getErrors());
	    }
	}

	/**
	 * Display the specified resource.
	 * GET /donors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		$donor = Donor::find($id);
		return View::make('donors.show',compact('donor'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /donors/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id){
		$donor = Donor::find($id);
		return View::make('donors.edit',compact('donor'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /donors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id){
		try
	    {
	        $this->donorFormValidtor->validateUpdate(Input::all(),$id);
	        $donor = Donor::find($id);
			$donor->name = Input::get('name');
			$donor->email = Input::get('email');
			$donor->age = Input::get('age');
			$donor->sex = Input::get('sex');
			$donor->blood_group = Input::get('blood_group');
			$donor->mobile = Input::get('mobile');
			$donor->address = Input::get('address');
			$donor->observations = Input::get('observations');
			$donor->save();
			Flash::success('Donor record has been successfully updated !');
			return Redirect::route('donors.show',$id);
	    }
	    catch (FormValidationException $e)
	    {
	        return Redirect::back()->withInput()->withErrors($e->getErrors());
	    }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /donors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$donor = Donor::find($id);
		$donor->delete();
		Flash::success("$donor->name was successfully removed from the donors list !");
		return Redirect::route('donors.index');
	}

}