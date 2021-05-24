<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Tcart20210428132812 extends Migration
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
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'M_Customer_Id' => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'DeliveryFee'   => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'Amount'        => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'TotalAmount'   => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
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
		 $this->forge->addForeignKey('M_Shop_Id', 'm_shops', 'Id', 'CASCADE', 'CASCADE');
		 $this->forge->addForeignKey('M_Customer_Id', 'm_customers', 'Id', 'CASCADE', 'CASCADE');
		 $this->forge->createTable('t_carts', false);
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
