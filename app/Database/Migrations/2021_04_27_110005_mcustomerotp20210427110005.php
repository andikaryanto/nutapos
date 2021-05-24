<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Mcustomerotp20210427110005 extends Migration
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
			'M_Customer_Id' => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Otp'           => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'IsConfirmed'   => [
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
		 $this->forge->addForeignKey('M_Customer_Id', 'm_customers', 'Id', 'CASCADE', 'CASCADE');
		 $this->forge->createTable('m_customerotps', false);
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
