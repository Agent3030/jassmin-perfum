<?php

use yii\db\Migration;

class m160313_181724_page_i18 extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%page_i18}}', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer(),
            'language_id' => $this->integer(),
            'title' => $this->string(512)->notNull(),
            'body' => $this->text()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%page_i18}}');
    }
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

