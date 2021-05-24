<?php

namespace App\Database\Seeds;

use App\Eloquents\M_enumdetails;
use App\Eloquents\M_enums;
use CodeIgniter\Database\Seeder;

class seed_2021_04_26_134301_m_enums20210426134301 extends Seeder
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
				'Enum'   => [
					'Name' => 'ShopStatus',
				],
				'Detail' => [
					[
						'Value'    => 1,
						'EnumName' => 'Prospek',
						'Ordering' => 1,
					], [
						'Value'    => 2,
						'EnumName' => 'Berminat',
						'Ordering' => 2,
					],[
						'Value'    => 3,
						'EnumName' => 'Sudah Anggota',
						'Ordering' => 3,
					],[
						'Value'    => 4,
						'EnumName' => 'Blacklist',
						'Ordering' => 4,
					],
				],
			],

		];
		foreach ($datas as $data)
		{
			// $this->db->table('m_enums')->insert($data['Enum']);
			$menum       = M_enums::findOneOrNew(['where' => ['Name' => $data['Enum']['Name']]]);
			$menum->Name = $data['Enum']['Name'];
			$menum->save();

			foreach ($data['Detail'] as $detail)
			{
				$newDetail            = new M_enumdetails();
				$newDetail->M_Enum_Id = $menum->Id;
				$newDetail->Value     = $detail['Value'];
				$newDetail->EnumName  = $detail['EnumName'];
				$newDetail->Ordering  = $detail['Ordering'];
				$newDetail->save();
			}
		}
	}
}
