<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Gtrans20210420092456 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->forge->addField([
			'Id'         => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'Format'     => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string50(),
				'null'       => true,
			],
			'Year'       => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Month'      => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Day'        => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'LastNumber' => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'M_Form_Id'  => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'M_Shop_Id'  => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'TypeTrans'  => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Created'    => [
				'type' => 'Datetime',
				'null' => true,
			],
			'CreatedBy'  => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
			'Modified'   => [
				'type' => 'Datetime',
				'null' => true,
			],
			'ModifiedBy' => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
		]);
		 $this->forge->addKey('Id', true, true);
		 $this->forge->createTable('g_transactionnumbers', false);
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
