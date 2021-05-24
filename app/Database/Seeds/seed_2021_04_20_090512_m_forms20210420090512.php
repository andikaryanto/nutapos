<?php

namespace App\Database\Seeds;

use App\Libraries\CommonLib;
use App\Libraries\DateLib;
use CodeIgniter\Database\Seeder;

class seed_2021_04_20_090512_m_forms20210420090512 extends Seeder
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
				'FormName'  => 'm_paymentcategories',
				'AliasName' => 'Payment Catgory',
				'LocalName' => 'Kategori Pembayaran',
				'ClassName' => 'Master',
			],
			[
				'FormName'  => 'm_payments',
				'AliasName' => 'Peyment',
				'LocalName' => 'Pembayaran',
				'ClassName' => 'Master',
			],
		];
		foreach ($datas as $data)
		{
			$this->db->table('m_forms')->insert($data);
		}
	}
}
