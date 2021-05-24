<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Mcanvasser20210419130001 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->forge->addField([
			'Id'           => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'M_User_Id'    => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'M_Village_Id' => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Name'         => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
			'Email'        => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
			'Phone'        => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string50(),
				'null'       => true,
			],
			'Supervisor'   => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
			'Address'      => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string1000(),
				'null'       => true,
			],
			'Created'      => [
				'type' => 'Datetime',
				'null' => true,
			],
			'CreatedBy'    => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
			'Modified'     => [
				'type' => 'Datetime',
				'null' => true,
			],
			'ModifiedBy'   => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
		]);
		 $this->forge->addKey('Id', true, true);
		 $this->forge->addForeignKey('M_User_Id', 'm_users', 'Id', 'CASCADE', 'CASCADE');
		 $this->forge->addForeignKey('M_Village_Id', 'm_villages', 'Id', 'CASCADE', 'RESTRICT');
		 $this->forge->createTable('m_canvassers', false);
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
