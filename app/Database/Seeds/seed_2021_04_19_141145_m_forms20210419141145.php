<?php

namespace App\Database\Seeds;

use App\Libraries\CommonLib;
use App\Libraries\DateLib;
use CodeIgniter\Database\Seeder;

class seed_2021_04_19_141145_m_forms20210419141145 extends Seeder
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
				'FormName'  => 'm_productcategories',
				'AliasName' => 'Product Categories',
				'LocalName' => 'Kategori Produk',
				'ClassName' => 'Master',
			],
			[
				'FormName'  => 'm_products',
				'AliasName' => 'Product',
				'LocalName' => 'Produk',
				'ClassName' => 'Master',
			],
		];
		foreach ($datas as $data)
		{
			$this->db->table('m_forms')->insert($data);
		}
	}
}
