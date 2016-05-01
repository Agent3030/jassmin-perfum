<?php

use yii\db\Migration;

class m160404_201204_users_to_partners extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%users_to_partners}}', [
            'id' => $this->primaryKey(),
            'user_id' =>  $this->Integer()->notNull(),
            'partner_id' => $this->integer()->notNull(),


        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%users_to_partners}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
