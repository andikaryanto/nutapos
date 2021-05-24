<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Menumdetail20210420110012 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->forge->addField([
			'Id'        => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'M_Enum_Id' => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Value'     => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'EnumName'  => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string50(),
				'null'       => true,
			],
			'Ordering'  => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Resource'  => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string50(),
				'null'       => true,
			],
		]);
		$this->forge->addKey('Id', true, true);
		$this->forge->addForeignKey('M_Enum_Id', 'm_enums', 'Id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('m_enumdetails', false);
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
