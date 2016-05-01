<?php

use yii\db\Migration;

class m160404_192339_adresses_i18 extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%adresses_i18}}', [
            'id' => $this->primaryKey(),
            'adress_id' => $this->Integer()->notNull(),
            'partnerI18_id'=>$this->Integer()->notNull(),
            'language_id' => $this->Integer()->notNull(),
            'region' => $this->string(128)->notNull(),
            'city' =>  $this->string(128)->notNull(),
            'street' => $this->string(128)->notNull(),


        ], $tableOptions);
        $this->addForeignKey('fk_adressI18_adress', '{{%adresses_i18}}', 'adress_id', '{{%adresses}}', 'id', 'cascade', 'cascade');
    }


    public function down()
    {
        $this->dropForeignKey('fk_adressI18_adress', '{{%adresses_i18}}');
        $this->dropTable('{{%adresses_i18}}');
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
