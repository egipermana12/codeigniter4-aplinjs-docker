<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableMovies extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'movie_id'    => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title'  => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'overview'  => [
                'type'       => 'TEXT',
            ],
            'vote_average'    => [
                'type'           => 'BIGINT',
                'constraint'     => 5,
            ],
            'poster_path'  => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'realase_date'  => [
                'type'       => 'DATE',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('movie_id');
        $this->forge->createTable('movies');
    }

    public function down()
    {
        $this->forge->dropTable('movies');
    }
}
