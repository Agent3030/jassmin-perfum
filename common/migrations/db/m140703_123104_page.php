<?php

use yii\db\Schema;
use yii\db\Migration;

class m140703_123104_page extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(2048)->notNull(),
            'title' => $this->string(512)->notNull(),
            'body' => $this->text()->notNull(),
            'view' => $this->string(),
            'status' => $this->smallInteger()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%page_i18}}', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer(),
            'language_id' => $this->integer(),
            'title' => $this->string(512)->notNull(),
            'body' => $this->text()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_pageI18_page', '{{%page_i18}}', 'page_id', '{{%page}}', 'id', 'cascade', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('fk_pageI18_page', '{{%page_i18}}');
        $this->dropTable('{{%page}}');
        $this->dropTable('{{%page_i18}}');
    }


}
