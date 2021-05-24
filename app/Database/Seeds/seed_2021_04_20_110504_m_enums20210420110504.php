<?php

namespace App\Database\Seeds;

use App\Eloquents\M_enumdetails;
use App\Eloquents\M_enums;
use CodeIgniter\Database\Seeder;

class seed_2021_04_20_110504_m_enums20210420110504 extends Seeder
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
					'Name' => 'PaymentType',
				],
				'Detail' => [
					[
						'Value'    => 1,
						'EnumName' => 'Melalui Amanah Mart',
						'Ordering' => 1,
					], [
						'Value'    => 2,
						'EnumName' => 'Melalui Aplikasi',
						'Ordering' => 2,
					],
				],
			],
			[
				'Enum'   => [
					'Name' => 'TransactionStatus',
				],
				'Detail' => [
					[
						'Value'    => 1,
						'EnumName' => 'Selesai',
						'Ordering' => 1,
					],
				],
			],
		];
		foreach ($datas as $data)
		{
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
