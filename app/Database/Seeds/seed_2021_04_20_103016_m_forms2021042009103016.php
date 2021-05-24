<?php

namespace App\Database\Seeds;

use App\Libraries\CommonLib;
use App\Libraries\DateLib;
use CodeIgniter\Database\Seeder;

class seed_2021_04_20_103016_m_forms2021042009103016 extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$datas = [
			[
				'FormName'  => 't_transactions',
				'AliasName' => 'Transaction',
				'LocalName' => 'Transaksi',
				'ClassName' => 'Transaction',
			],
		];
		foreach ($datas as $data)
		{
			$this->db->table('m_forms')->insert($data);
		}
	}
}
