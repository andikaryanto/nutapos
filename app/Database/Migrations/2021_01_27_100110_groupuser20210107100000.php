<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Groupuser20210107100000 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $this->forge->addField([
            'Id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'GroupName'       => [
                'type'       => 'VARCHAR',
                'constraint' => TableLib::string100(),
                'null' => true
            ],
            'Description'       => [
                'type'       => 'VARCHAR',
                'constraint' => TableLib::string300(),
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
        $this->forge->addKey('Id', true , true);
        $this->forge->createTable('m_groupusers', false);
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
