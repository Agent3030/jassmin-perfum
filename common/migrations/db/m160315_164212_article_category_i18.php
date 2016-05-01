<?php

use yii\db\Migration;

class m160315_164212_article_category_i18 extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%article_category_i18}}', [
            'id' => $this->primaryKey(),
            'article_category_id' => $this->integer(),
            'language_id' => $this->integer(),
            'title' => $this->string(512)->notNull(),
            'parent_id' => $this->integer(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%article_category_i18}}');
    }
}