<?php

namespace App\Database\Seeds;

use App\Eloquents\M_enumdetails;
use App\Eloquents\M_enums;
use App\Eloquents\M_formsettings;
use CodeIgniter\Database\Seeder;

class seed_2021_04_20_131908_m_formsetting20210420131908 extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$datas = [
			'SHIPPING_FEE',
			'DELIVERY_RADIUS',
			'SHORTEST_MART_RADIUS',
			'WHATSAPP_NUMBER',
			'WHATSAPP_MESSAGE_TEMPLATE',
		];
		foreach ($datas as $data)
		{
			$menum       = new M_formsettings();
			$menum->Name = $data;
			$menum->save();
		}
	}
}
