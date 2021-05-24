<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Seeder20210127112645 extends Migration
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
            'Seeder' => [
                'type'       => 'VARCHAR',
                'constraint' => TableLib::string300(),
                'null' => true
            ]
            
        ]);
        $this->forge->addKey('Id', true, true);
        $this->forge->createTable('seeder', false);
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
