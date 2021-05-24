<?php

namespace App\Controllers;

use App\Consts\MenusConst;
use App\Controllers\BaseController;
use App\Eloquents\G_transactionnumbers;
use App\Eloquents\M_banners;
use App\Eloquents\M_branches;
use App\Eloquents\M_cities;
use App\Eloquents\M_customers;
use App\Eloquents\M_formsettings;
use App\Eloquents\M_paymentcategories;
use App\Eloquents\M_payments;
use App\Eloquents\M_popups;
use App\Eloquents\M_shops;
use App\Eloquents\M_users;
use App\Eloquents\M_vehicletypeimages;
use App\Eloquents\M_vehicletypes;
use App\Eloquents\T_transactions;
use App\Libraries\SessionLib;
use ReflectionClass;

class Test extends BaseController
{

	public function index()
	{
		// echo G_transactionnumbers::getLastNumberByFormId(MenusConst::TTRANSACTION);
		// G_transactionnumbers::updateLastNumber(MenusConst::TTRANSACTION);

		// $class = new ReflectionClass(M_users::class);
		$params = [
			"limit" => [
				"page" => 1,
				"size" => 5
			]
		];
		$data = T_transactions::with([
			[
				"Class" => M_customers::class,
				"ForeignKey" => "M_Customer_Id"
			],
			[
				"Class" => M_shops::class,
				"ForeignKey" => "M_Shop_Id"
			]
		])->fetch($params);
		foreach ($data as $d) {
			// echo json_encode($d->M_customers) . "<br>";
			echo json_encode($d->M_shops) . "<br>";
		}

		// $users = M_users::collect();
		// echo json_encode($users->find(1));
	}
}
