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
