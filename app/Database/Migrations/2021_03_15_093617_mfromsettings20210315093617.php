<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Mfromsettings20210315093617 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$fields = [
			'Id'            => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'M_Form_Id'     => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'TypeTrans'     => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Value'         => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Name'          => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
			],
			'IntValue'      => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'StringValue'   => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string250(),
				'null'       => true,
			],
			'DecimalValue'  => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'DateTimeValue' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'BooleanValue'  => [
				'type'       => 'SMALLINT',
				'constraint' => 1,
				'null'       => true,
			],
		];
		$this->forge->addField($fields);
		$this->forge->addKey('Id', true, true);
		$this->forge->createTable('m_formsettings', false);
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
