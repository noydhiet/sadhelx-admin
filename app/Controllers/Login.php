<?php namespace App\Controllers;

// Load model
use App\Models\User_model;
// End load model

class Login extends BaseController
{
	public function index()
	{
		echo view('admin/_partials/head');
		return view('login/index');
	}
		
	public function registration()
	{
		echo view('admin/_partials/head');
		return view('login/registration');
	}
		
	// Logout
	public function logout()
	{

	}

}	
