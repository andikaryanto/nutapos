<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Tcartdetail20210428134156 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->forge->addField([
			'Id'               => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'T_Cart_Id'        => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'M_Shopproduct_Id' => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Quantity'         => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'ActualPrice'      => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'Price'            => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'Created'          => [
				'type' => 'Datetime',
				'null' => true,
			],
			'CreatedBy'        => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
			'Modified'         => [
				'type' => 'Datetime',
				'null' => true,
			],
			'ModifiedBy'       => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
		]);
		$this->forge->addKey('Id', true, true);
		$this->forge->addForeignKey('T_Cart_Id', 't_carts', 'Id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('M_Shopproduct_Id', 'm_shopproducts', 'Id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('t_cartdetails', false);
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
