<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class mshop20210418131504 extends Migration
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
			'M_Canvasser_Id'       => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'M_Village_Id'         => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Name'                 => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
			'Owner'                => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
			'Phone'                => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string50(),
				'null'       => true,
			],
			'PIN'                  => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string50(),
				'null'       => true,
			],
			'MapAddress'           => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string1000(),
				'null'       => true,
			],
			'Address'              => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string1000(),
				'null'       => true,
			],
			'FrontShopPicture'     => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string1000(),
				'null'       => true,
			],
			'IdentityCardPicture'  => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string1000(),
				'null'       => true,
			],
			'OwnerPicture'         => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string1000(),
				'null'       => true,
			],
			'CanvasserPicture'     => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string1000(),
				'null'       => true,
			],
			'AccountNumber'        => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string100(),
				'null'       => true,
			],
			'AccountNumberPicture' => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string1000(),
				'null'       => true,
			],
			'Latitude'             => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string50(),
				'null'       => true,
			],
			'Longitude'            => [
				'type'       => 'VARCHAR',
				'constraint' => TableLib::string50(),
				'null'       => true,
			],
			'M_Fund_Id'            => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'Status'               => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'HasDelivery'          => [
				'type'       => 'SMALLINT',
				'constraint' => 1,
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
		$this->forge->addForeignKey('M_Canvasser_Id', 'm_canvassers', 'Id', 'CASCADE', 'RESTRICT');
		$this->forge->addForeignKey('M_Village_Id', 'm_villages', 'Id', 'CASCADE', 'RESTRICT');
		$this->forge->addForeignKey('M_Fund_Id', 'm_funds', 'Id', 'CASCADE', 'RESTRICT');
		$this->forge->createTable('m_shops', false);
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
