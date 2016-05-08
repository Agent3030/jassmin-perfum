<?php

use yii\db\Migration;

class m160404_192219_adresses extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%adresses}}', [
            'id' => $this->primaryKey(),
            'partner_id' => $this->Integer()->notNull(),
            'region' => $this->string(128)->notNull(),
            'city' =>  $this->string(128)->notNull(),
            'street' => $this->string(128)->notNull(),
            'house' => $this->Integer()->notNull(),
            'appartment' => $this->Integer(),
            'index' =>  $this->Integer(),
            'status' => $this->smallInteger()->notNull(),

        ], $tableOptions);

        $this->createTable('{{%adresses_i18}}', [
            'id' => $this->primaryKey(),
            'adress_id' => $this->Integer()->notNull(),
            'partnerI18_id'=>$this->Integer()->notNull(),
            'language_id' => $this->Integer()->notNull(),
            'region' => $this->string(128)->notNull(),
            'city' =>  $this->string(128)->notNull(),
            'street' => $this->string(128)->notNull(),


        ], $tableOptions);

        $this->addForeignKey('fk_adress_partner', '{{%adresses}}', 'partner_id', '{{%partners}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_adressI18_adress', '{{%adresses_i18}}', 'adress_id', '{{%adresses}}', 'id', 'cascade', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('fk_adress_partner', '{{%adresses}}');
        $this->dropForeignKey('fk_adressI18_adress', '{{%adresses_i18}}');
        $this->dropTable('{{%adresses_i18}}');
        $this->dropTable('{{%adresses}}');
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

