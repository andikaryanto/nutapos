<?php

namespace App\Database\Seeds;

use App\Libraries\CommonLib;
use App\Libraries\DateLib;
use CodeIgniter\Database\Seeder;

class seed_2021_03_29_213114_m_groupuser20210329213114 extends Seeder
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
				'Groupname' => 'Principal',
			], [
				'Groupname' => 'Canvasser',
			],
		];
		foreach ($datas as $data)
		{
			$this->db->table('m_groupusers')->insert($data);
		}
	}
}
