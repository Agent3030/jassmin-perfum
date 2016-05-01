<?php

use yii\db\Migration;

class m160405_193448_statuses_i18 extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%statuses_i18}}', [
            'id' => $this->primaryKey(),
            'lang_id' =>$this->integer()->notNull(),
            'status_id' =>$this->integer()->notNull(),
            'status_name' => $this->string(128)->notNull(),
        ], $tableOptions);
        $this->addForeignKey('fk_statusI18_status', '{{%statuses_i18}}', 'status_id', '{{%statuses}}', 'id', 'cascade', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('fk_statusI18_status', '{{%statuses_i18}}');
        $this->dropTable('{{%statuses_i18}}');
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
