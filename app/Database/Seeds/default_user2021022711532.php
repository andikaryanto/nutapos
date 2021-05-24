<?php
namespace App\Database\Seeds;

use App\Libraries\CommonLib;
use App\Libraries\DateLib;
use CodeIgniter\Database\Seeder;

class default_user2021022711532 extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = [
			'Username'   => CommonLib::defaultUser(),
			'Password'   => CommonLib::encryptMd5(CommonLib::getKey() . 'koroko11'),
			'IsLoggedIn' => 0,
			'IsActive'   => 1,
			'Photo'      => 'public/assets/uploads/img/custom.png',
			'Created'    => DateLib::getCurrentDate('Y-m-d H:i:s'),
		];

		$this->db->table('m_users')->insert($data);
	}
}
