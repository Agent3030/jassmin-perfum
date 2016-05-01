<?php

use yii\db\Migration;

class m160404_192917_partners_attachments extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%partners_attachements}}', [
            'id' => $this->primaryKey(),
            'partner_id' => $this->integer()->notNull(),
            'path' => $this->string()->notNull(),
            'base_url' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'order' => $this->integer(),


        ], $tableOptions);
        $this->addForeignKey('fk_partnerAttachement_partner', '{{%partners_attachements}}', 'partner_id', '{{%partners}}', 'id', 'cascade', 'cascade');
    }
    public function down()
    {
        $this->dropForeignKey('fk_partnerAttachement_partner', '{{%partners_attachements}}');
        $this->dropTable('{{%partners_attachements}}');
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
