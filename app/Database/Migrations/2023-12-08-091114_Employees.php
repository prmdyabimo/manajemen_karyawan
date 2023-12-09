<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Employees extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'employee_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null'  => false
            ],
            'name'  => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'position'  => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'salary'  => [
                'type' => 'DECIMAL',
            ],
            'created_at' => [
                'type'=> 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                'type'=> 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ]
        ]);

        $this->forge->addPrimaryKey('employee_id');
        $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
