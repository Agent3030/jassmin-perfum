<?php

use yii\db\Migration;

class m160315_164115_article_i18 extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%article_i18}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer(),
            'language_id' => $this->integer(),
            'categoryI18_id'=>$this->integer(),
            'title' => $this->string(512)->notNull(),
            'body' => $this->text()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%article_i18}}');
    }
}
