<?php

use yii\db\Schema;
use yii\db\Migration;

class m150131_162527_manageCustomer extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // create customer table
        $this->createTable('{{%customer}}', [
            'customer_id' => Schema::TYPE_PK,
            'customer_company_name' => Schema::TYPE_STRING . ' NOT NULL',
            'customer_contact_person' => Schema::TYPE_STRING . ' NOT NULL',
            'customer_created_by' => Schema::TYPE_INTEGER . ' NOT NULL'
        ], $tableOptions);

        $this->addForeignKey(
            'FK_customer_owned_by',
            'customer', 'customer_created_by',
            'user', 'id',
            'CASCADE', 'CASCADE'
        );

        // create customer address table
        $this->createTable('{{%customer_address}}', [
            'customer_address_id' => Schema::TYPE_PK,
            'customer_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'customer_address_type' => Schema::TYPE_STRING . '(12) NOT NULL', // PENAGIHAN, KANTOR, KANCAB, LAIN-LAIN
            'customer_address_contact_person' => Schema::TYPE_STRING . ' NOT NULL', // Nama CP
            'customer_address_location' => Schema::TYPE_STRING . ' NOT NULL', // Alamat
            'customer_address_phone' => Schema::TYPE_STRING . ' NOT NULL', // nomor telepon
            'customer_address_email' => Schema::TYPE_STRING . ' NOT NULL', // email
        ], $tableOptions);

        $this->addForeignKey(
            'FK_customer_address_to_customer',
            'customer_address', 'customer_id',
            'customer', 'customer_id',
            'CASCADE', // delete
            'CASCADE'  // update
        );
    }

    public function down()
    {
        $this->dropForeignKey('FK_customer_owned_by', 'customer');
        $this->dropForeignKey('FK_customer_address_to_customer', 'customer_address');
        $this->dropTable('{{%customer}}');
        $this->dropTable('{{%customer_address}}');

        // echo "m150131_162527_manageCustomer has been reverted.\n";

        return true;
    }
}
