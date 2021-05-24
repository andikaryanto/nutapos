<?php

use App\Libraries\TableLib;
use CodeIgniter\Database\Migration;

class Form20210107104845 extends Migration
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
            'FormName' => [
                'type'       => 'VARCHAR',
                'constraint' => TableLib::string100(),
                'null' => true
            ],
            'AliasName' => [
                'type'       => 'VARCHAR',
                'constraint' => TableLib::string100(),
                'null' => true
            ],
            'LocalName' => [
                'type'       => 'VARCHAR',
                'constraint' => TableLib::string100(),
                'null' => true
            ],
            'ClassName' => [
                'type'       => 'VARCHAR',
                'constraint' => TableLib::string100(),
                'null' => true
            ],
            'Resource' => [
                'type'       => 'VARCHAR',
                'constraint' => TableLib::string50(),
                'null' => true
            ],
            'IndexRoute' => [
                'type'       => 'VARCHAR',
                'constraint' => TableLib::string50(),
                'null' => true
            ],
            
        ]);
        $this->forge->addKey('Id', true, true);
        $this->forge->createTable('m_forms', false);
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
