<?php

class PagesController extends \BaseController {
	
	public function home(){
		return Redirect::route('getLogin');
	}

	public function about(){
		return View::make('pages.about');
	}

	public function contact(){
		return View::make('pages.contact');
	}

	public function error(){
		return View::make('pages.unknownResource');
	}
}