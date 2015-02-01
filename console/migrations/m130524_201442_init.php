<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);


        // create default user for this app
        // username: admin
        // password: admin
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'auth_key' => 'nL2P8kfj4NtzY7QTXuiCpSqDK5jQHe7c',
            'password_hash' => '$2y$13$68UpqA6OWQqFs75DJH2joOFTSwD9iTywtV3DXegXKrUd4wKRbBm4C',
            'pasword_reset_token' => null,
            'email' => 'admin@apc.tanker',
            'status' => '10',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
