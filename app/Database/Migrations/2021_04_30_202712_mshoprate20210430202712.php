<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Mshoprate20210430202712 extends Migration
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
			'Rate'          => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Review'        => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string1000(),
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
		 $this->forge->addForeignKey('M_Customer_Id', 'm_customers', 'Id', 'CASCADE', 'RESTRICT');
		 $this->forge->createTable('m_shoprates', false);
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
