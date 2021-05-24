<?php

namespace App\Database\Seeds;

use App\Eloquents\M_enumdetails;
use App\Eloquents\M_enums;
use CodeIgniter\Database\Seeder;

class seed_2021_04_29_074909_m_enums20210429074909 extends Seeder
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
					'Name' => 'DiscountType',
				],
				'Detail' => [
					[
						'Value'    => 1,
						'EnumName' => 'Persen',
						'Ordering' => 1,
					], [
						'Value'    => 2,
						'EnumName' => 'Nominal',
						'Ordering' => 2,
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
