<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Mshopproduct20210428133312 extends Migration
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
			'M_Product_Id'  => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'PurchasePrice' => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'SellPrice'     => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'Stock'         => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'DiscountType'  => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'DiscountValue' => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'IsFeatured'    => [
				'type'       => 'SMALLINT',
				'constraint' => 1,
				'null'       => true,
			],
			'IsActive'      => [
				'type'       => 'SMALLINT',
				'constraint' => 1,
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
		$this->forge->addForeignKey('M_Product_Id', 'm_products', 'Id', 'CASCADE', 'RESTRICT');
		$this->forge->createTable('m_shopproducts', false);
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
