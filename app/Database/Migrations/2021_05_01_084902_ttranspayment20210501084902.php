<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Ttranspayment20210501084902 extends Migration
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
			'T_Transaction_Id' => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'M_Payment_Id'     => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Paid'             => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'TotalAmount'      => [
				'type'       => 'DECIMAL',
				'constraint' => '18,2',
				'null'       => true,
			],
			'Change'           => [
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
		 $this->forge->addForeignKey('T_Transaction_Id', 't_transactions', 'Id', 'CASCADE', 'CASCADE');
		 $this->forge->addForeignKey('M_Payment_Id', 'm_payments', 'Id', 'CASCADE', 'RESTRICT');
		 $this->forge->createTable('t_transactionpayments', false);
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
