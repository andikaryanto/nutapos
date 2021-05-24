<?php

use App\Libraries\DbtransLib;
use App\Libraries\TableLib;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Database\Migration;

class User20210107104845 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $this->forge->addField([
            'Id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'M_Groupuser_Id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null' => true
            ],
            'Username'       => [
                'type'       => 'VARCHAR',
                'constraint' => TableLib::string100(),
                'null' => true
            ],
            'Password'       => [
                'type'       => 'VARCHAR',
                'constraint' => Tablelib::string50(),
                'null' => true
            ],
            'Photo'       => [
                'type'       => 'VARCHAR',
                'constraint' => TableLib::string300(),
                'null' => true
            ],
            'IsLoggedIn'       => [
                'type'       => 'SMALLINT',
                'constraint' => 1,
                'null' => true
            ],
            'IsActive'       => [
                'type'       => 'SMALLINT',
                'constraint' => 1,
                'null' => true
            ],
            'Created'       => [
                'type'       => 'Datetime',
                'null' => true
            ],
            'CreatedBy'       => [
                'type'       => 'VARCHAR',
                'constraint' => TableLib::string100(),
                'null' => true
            ],
            'Modified'       => [
                'type'       => 'Datetime',
                'null' => true
            ],
            'ModifiedBy'       => [
                'type'       => 'VARCHAR',
                'constraint' => TableLib::string100(),
                'null' => true
            ],
        ]);
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->addKey('Id', true, true);
        $this->forge->addForeignKey("M_Groupuser_Id", "m_groupusers", "Id", "CASCADE", "RESTRICT");
        $this->forge->createTable('m_users', false);
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
