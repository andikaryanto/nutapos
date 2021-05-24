<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Mproduct20210419140203 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->forge->addField([
			'Id'                   => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'M_Productcategory_Id' => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Name'                 => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
			'Description'          => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string300(),
				'null'       => true,
			],
			'Price'                => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'Producer'             => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
			'PackSize'             => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string50(),
				'null'       => true,
			],
			'Quality'              => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
			'Created'              => [
				'type' => 'Datetime',
				'null' => true,
			],
			'CreatedBy'            => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
			'Modified'             => [
				'type' => 'Datetime',
				'null' => true,
			],
			'ModifiedBy'           => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
		]);
		 $this->forge->addKey('Id', true, true);
		 $this->forge->addForeignKey('M_Productcategory_Id', 'm_productcategories', 'Id', 'CASCADE', 'RESTRICT');
		 $this->forge->createTable('m_products', false);
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
