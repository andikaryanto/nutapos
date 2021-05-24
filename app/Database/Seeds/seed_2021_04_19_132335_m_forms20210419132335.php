<?php

namespace App\Database\Seeds;

use App\Libraries\CommonLib;
use App\Libraries\DateLib;
use CodeIgniter\Database\Seeder;

class seed_2021_04_19_132335_m_forms20210419132335 extends Seeder
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
				'FormName'  => 'm_shops',
				'AliasName' => 'Shops',
				'LocalName' => 'Mart',
				'ClassName' => 'Master',
			],
		];
		foreach ($datas as $data)
		{
			$this->db->table('m_forms')->insert($data);
		}
	}
}
