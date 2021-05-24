<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Eloquents\M_banners;
use App\Eloquents\M_branches;
use App\Eloquents\M_cities;
use App\Eloquents\M_popups;
use App\Eloquents\M_vehicletypes;
use App\Libraries\SessionLib;

class Error404 extends BaseController
{

	public function index()
	{
		$homeUrl = baseUrl('/');
		$user    = SessionLib::get('userdata');
		if (! empty($user))
		{
			$homeUrl = baseUrl('/office');
		}

		echo view('errors/error404', compact('homeUrl'));
	}

}
