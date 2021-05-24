<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Ttrans20210420103321 extends Migration
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
			'M_Shop_Id'     => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'M_Customer_Id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'TransNo'       => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string50(),
				'null'       => true,
			],
			'TransType'     => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Amount'        => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'Discount'      => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'DeliveryFee'   => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'TotalAmount'   => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'TransStatus'   => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'ProductType'   => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Reason'        => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string500(),
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
		$this->forge->addForeignKey('M_Shop_Id', 'm_shops', 'Id', 'CASCADE', 'RESTRICT');
		$this->forge->addForeignKey('M_Customer_Id', 'm_customers', 'Id', 'CASCADE', 'RESTRICT');
		$this->forge->createTable('t_transactions', false);
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
