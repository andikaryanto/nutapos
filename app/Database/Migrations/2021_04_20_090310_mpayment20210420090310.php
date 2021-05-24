<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Mpayment20210420090310 extends Migration
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
			'M_Paymentcategory_Id' => [
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
		 $this->forge->addForeignKey('M_Paymentcategory_Id', 'm_paymentcategories', 'Id', 'CASCADE', 'RESTRICT');
		 $this->forge->createTable('m_payments', false);
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
