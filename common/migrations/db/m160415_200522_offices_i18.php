<?php

use yii\db\Migration;

class m160415_200522_offices_i18 extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%offices_i18}}', [
            'id' => $this->primaryKey(),
            'office_id'=>$this->Integer()->notNull(),
            'region' => $this->string(128)->notNull(),
            'city' =>  $this->string(128)->notNull(),
            'street' => $this->string(128)->notNull(),
            'status' => $this->string(28)->notNull(),

        ], $tableOptions);
        $this->addForeignKey('fk_officeI18_office', '{{%offices_i18}}', 'office_id', '{{%offices}}', 'id', 'cascade', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('fk_officeI18_office', '{{%offices_i18}}');
        $this->dropTable('{{%offices_i18}}');
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
