<?php

namespace App\Database\Seeds;

use App\Eloquents\M_enumdetails;
use App\Eloquents\M_enums;
use CodeIgniter\Database\Seeder;

class seed_2021_04_30_074401_m_enums20210420074401 extends Seeder
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
					'Name' => 'TransProductType',
				],
				'Detail' => [
					[
						'Value'    => 1,
						'EnumName' => 'Non Virtual',
						'Ordering' => 1,
					], [
						'Value'    => 2,
						'EnumName' => 'Virtual',
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
