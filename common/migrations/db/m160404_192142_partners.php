<?php

use yii\db\Migration;

class m160404_192142_partners extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%partners}}', [
            'id' => $this->primaryKey(),
            'short_name' => $this->string(128)->notNull(),
            'full_name' =>  $this->string(1026),
            'reg_code' => $this->Integer(8)->notNull(),
            'prop_form' => $this->string(128)->notNull(),
            'isVAT' =>  $this->smallInteger()->notNull(),
            'VAT_code' => $this->Integer(12),
            'user_id' => $this->Integer()->notNull(),
            'status_id' => $this->Integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey('fk_partner_user', '{{%partners}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_partner_status', '{{%partners}}', 'status_id', '{{%statuses}}', 'id', 'cascade', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('fk_partner_user', '{{%partners}}');
        $this->dropForeignKey('fk_partner_status', '{{%partners}}');
        $this->dropTable('{{%partners}}');
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
