<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Mcustomerdevice20210427105921 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->forge->addField([
			'Id'            => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'M_Customer_Id' => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'DeviceId'      => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string300(),
				'null'       => true,
			],
			'FcmId'         => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string300(),
				'null'       => true,
			],
			'Created'       => [
				'type' => 'Datetime',
				'null' => true,
			],
			'CreatedBy'     => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
			'Modified'      => [
				'type' => 'Datetime',
				'null' => true,
			],
			'ModifiedBy'    => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
		]);
		 $this->forge->addKey('Id', true, true);
		 $this->forge->addForeignKey('M_Customer_Id', 'm_customers', 'Id', 'CASCADE', 'CASCADE');
		 $this->forge->createTable('m_customerdevices', false);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}
}
