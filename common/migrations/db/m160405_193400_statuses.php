<?php

use yii\db\Migration;

class m160405_193400_statuses extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%statuses}}', [
            'id' => $this->primaryKey(),
            'status_name' => $this->string(128)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%statuses}}');
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
