<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$seederData = [
			'default_user2021022711532',
			'seed_2021_03_15_091516_m_forms20210315091516',
			'seed_2021_03_29_213114_m_groupuser20210329213114',
			'seed_2021_04_19_105319_m_forms20210419105319',
			'seed_2021_04_19_111412_m_forms2021041911412',
			'seed_2021_04_19_130702_m_forms20210419130702',
			'seed_2021_04_19_132335_m_forms20210419132335',
			'seed_2021_04_19_141145_m_forms20210419141145',
			'seed_2021_04_20_090512_m_forms20210420090512',
			'seed_2021_04_20_103016_m_forms2021042009103016',
			'seed_2021_04_20_103102_g_trans20210420103102',
			'seed_2021_04_20_110504_m_enums20210420110504',
			'seed_2021_04_20_131908_m_formsetting20210420131908',
			'seed_2021_04_26_134301_m_enums20210426134301',
			'seed_2021_04_28_141912_m_forms20210428141912',
			'seed_2021_04_29_074909_m_enums20210429074909',
			'seed_2021_04_30_074401_m_enums20210420074401',
			'seed_2021_04_30_074404_m_enums20210420074404',
			'seed_2021_05_20_091414_m_enums20210520091414',
		];

		foreach ($seederData as $seed)
		{
			$data = $this->db->table('seeder')->where('Seeder', $seed)->get()->getResult();

			if (empty($data))
			{
				$this->call($seed);
				$this->db->table('seeder')->set(['Seeder' => $seed])->insert();
			}
		}
	}
}
