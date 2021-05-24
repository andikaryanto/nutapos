<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Menum20210420105934 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->forge->addField([
			'Id'   => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'Name' => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string50(),
				'null'       => true,
			],
		]);
		 $this->forge->addKey('Id', true, true);
		 $this->forge->createTable('m_enums', false);
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
