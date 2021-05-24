<?php

namespace App\Database\Seeds;

use App\Libraries\CommonLib;
use App\Libraries\DateLib;
use CodeIgniter\Database\Seeder;

class seed_2021_04_19_105319_m_forms20210419105319 extends Seeder
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
				'FormName'  => 'm_provinces',
				'AliasName' => 'Province',
				'LocalName' => 'Provinsi',
				'ClassName' => 'Master',
			], [
				'FormName'  => 'm_cities',
				'AliasName' => 'City',
				'LocalName' => 'Kota',
				'ClassName' => 'Master',
			], [
				'FormName'  => 'm_districts',
				'AliasName' => 'Disrict',
				'LocalName' => 'Kecamatan',
				'ClassName' => 'Master',
			], [
				'FormName'  => 'm_villages',
				'AliasName' => 'Village',
				'LocalName' => 'Kelurahan',
				'ClassName' => 'Master',
			],
		];
		foreach ($datas as $data)
		{
			$this->db->table('m_forms')->insert($data);
		}
	}
}
