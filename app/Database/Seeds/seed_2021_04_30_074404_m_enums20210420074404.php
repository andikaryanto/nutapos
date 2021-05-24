<?php

namespace App\Database\Seeds;

use App\Eloquents\M_enumdetails;
use App\Eloquents\M_enums;
use CodeIgniter\Database\Seeder;

class seed_2021_04_30_074404_m_enums20210420074404 extends Seeder
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
					'Name' => 'TransactionStatus',
				],
				'Detail' => [
					[
						'Value'    => 2,
						'EnumName' => 'Menunggu Diterima',
						'Ordering' => 2,
					], [
						'Value'    => 3,
						'EnumName' => 'Ditolak',
						'Ordering' => 3,
					], [
						'Value'    => 4,
						'EnumName' => 'Dikirim',
						'Ordering' => 4,
					], [
						'Value'    => 5,
						'EnumName' => 'Menunggu Pembayaran',
						'Ordering' => 5,
					], [
						'Value'    => 6,
						'EnumName' => 'Sudah Dibayar',
						'Ordering' => 6,
					], [
						'Value'    => 7,
						'EnumName' => 'Dibatalkan',
						'Ordering' => 7,
					],[
						'Value'    => 8,
						'EnumName' => 'Diterima',
						'Ordering' => 7,
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
