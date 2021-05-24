<?php

use App\Libraries\DbtransLib;
use App\Libraries\TableLib;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Database\Migration;

class Mshopfund20210426151920 extends Migration
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
			'M_Shop_Id' => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'M_Fund_Id' => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
		]);
		$attributes = ['ENGINE' => 'InnoDB'];
		$this->forge->addKey('Id', true, true);
		$this->forge->addForeignKey('M_Shop_Id', 'm_shops', 'Id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('M_Fund_Id', 'm_funds', 'Id', 'CASCADE', 'RESTRICT');
		$this->forge->createTable('m_shopfunds', false);
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
