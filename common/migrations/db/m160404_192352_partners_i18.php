<?php

use yii\db\Migration;

class m160404_192352_partners_i18 extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%partners_i18}}', [
            'id' => $this->primaryKey(),
            'partner_id' =>  $this->Integer()->notNull(),
            'language_id' => $this->integer()->notNull(),
            'short_name' => $this->string(128)->notNull(),
            'full_name' =>  $this->string(1026),
            'prop_form' => $this->string(128)->notNull(),

        ], $tableOptions);
        $this->addForeignKey('fk_partnerI18_partner', '{{%partners_i18}}', 'partner_id', '{{%partners}}', 'id', 'cascade', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('fk_partnerI18_partner', '{{%partners_i18}}');
        $this->dropTable('{{%partners_i18}}');
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
