<?php

class DonorsLookupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /donorslookup
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
		return View::make('donors.lookup.index',compact('donors'));
	}

	/**
	 * Display the specified resource.
	 * GET /donorslookup/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		$donor = Donor::find($id);
		return View::make('donors.lookup.show',compact('donor'));
	}

}