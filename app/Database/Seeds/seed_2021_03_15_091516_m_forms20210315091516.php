<?php

namespace App\Database\Seeds;

use App\Libraries\CommonLib;
use App\Libraries\DateLib;
use CodeIgniter\Database\Seeder;

class seed_2021_03_15_091516_m_forms20210315091516 extends Seeder
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
				'FormName'  => 'm_groupusers',
				'AliasName' => 'Groupuser',
				'LocalName' => 'Grup Pengguna',
				'ClassName' => 'User',
			], [
				'FormName'  => 'm_users',
				'AliasName' => 'User',
				'LocalName' => 'Pengguna',
				'ClassName' => 'User',
			],
		];
		foreach ($datas as $data)
		{
			$this->db->table('m_forms')->insert($data);
		}
	}
}
