<?php namespace Modules\Userscontrol\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class UsersControlController extends Controller {
	
	public function index()
	{
		return view('userscontrol::index');
	}
	
}