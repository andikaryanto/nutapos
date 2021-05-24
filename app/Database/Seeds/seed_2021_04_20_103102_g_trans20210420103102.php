<?php

namespace App\Database\Seeds;

use App\Eloquents\M_forms;
use App\Libraries\CommonLib;
use App\Libraries\DateLib;
use CodeIgniter\Database\Seeder;

class seed_2021_04_20_103102_g_trans20210420103102 extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$form  = M_forms::findOne(['where' => ['FormName' => 't_transactions']]);
		$datas = [
			[
				'Format'     => 'TRS/{DD}{MM}{YY}/#####/1',
				'Year'       => DateLib::getCurrentDate('Y'),
				'Month'      => DateLib::getCurrentDate('m'),
				'Day'        => DateLib::getCurrentDate('d'),
				'LastNumber' => 0,
				'M_Form_Id'  => $form->Id,
			],
		];
		foreach ($datas as $data)
		{
			$this->db->table('g_transactionnumbers')->insert($data);
		}
	}
}
