<?php

use yii\db\Migration;

class m160415_200432_offices extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%offices}}', [
            'id' => $this->primaryKey(),
            'region' => $this->string(128)->notNull(),
            'city' =>  $this->string(128)->notNull(),
            'street' => $this->string(128)->notNull(),
            'house' => $this->Integer()->notNull(),
            'appartment' => $this->Integer(),
            'index' =>  $this->string(5),
            'tel' => $this->string(14),
            'email' => $this->string(128),
            'status' => $this->string(28)->notNull(),

        ], $tableOptions);

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
        $this->dropTable('{{%offices}}');
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

