<?php

use common\models\User;
use yii\db\Schema;
use yii\db\Migration;

class m140703_123000_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(32),
            'auth_key' => $this->string(32)->notNull(),
            'access_token' => $this->string(40)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'oauth_client' => $this->string(),
            'oauth_client_user_id' => $this->string(),
            'email' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(User::STATUS_ACTIVE),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'logged_at' => $this->integer()
        ], $tableOptions);

        $this->createTable('{{%user_profile}}', [
            'user_id' => $this->primaryKey(),
            'firstname' => $this->string(),
            'middlename' => $this->string(),
            'lastname' => $this->string(),
            'position' => $this->string(128)->notNull(),
            'partner_id' => $this->integer(),
            'avatar_path' => $this->string(),
            'avatar_base_url' => $this->string(),
            'locale' => $this->string(32)->notNull(),
            'gender' => $this->smallInteger(1)
        ], $tableOptions);

        $this->createTable('{{%partners}}', [
            'id' => $this->primaryKey(),
            'short_name' => $this->string(128)->notNull(),
            'full_name' => $this->string(1026),
            'reg_code' => $this->integer(8)->notNull(),
            'prop_form' => $this->string(128)->notNull(),
            'isVAT' => $this->smallInteger()->notNull(),
            'VAT_code' => $this->integer(12),
            'user_id' => $this->integer(),
            'status_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);


        $this->createTable('{{%statuses}}', [
            'id' => $this->primaryKey(),
            'status_name' => $this->string(128)->notNull(),
        ], $tableOptions);

        $this->createTable('{{%partners_i18}}', [
            'id' => $this->primaryKey(),
            'partner_id' => $this->integer()->notNull(),
            'language_id' => $this->integer()->notNull(),
            'short_name' => $this->string(128)->notNull(),
            'full_name' => $this->string(1026),
            'prop_form' => $this->string(128)->notNull(),

        ], $tableOptions);

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

        $this->createTable('{{%statuses_i18}}', [
            'id' => $this->primaryKey(),
            'lang_id' =>$this->integer()->notNull(),
            'status_id' =>$this->integer()->notNull(),
            'status_name' => $this->string(128)->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_user', '{{%user_profile}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');

        $this->addForeignKey('fk_partner_user', '{{%partners}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');



        $this->addForeignKey('fk_partner_status', '{{%partners}}', 'status_id', '{{%statuses}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_partnerI18_partner', '{{%partners_i18}}', 'partner_id', '{{%partners}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_partnerAttachement_partner', '{{%partners_attachements}}', 'partner_id', '{{%partners}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_statusI18_status', '{{%statuses_i18}}', 'status_id', '{{%statuses}}', 'id', 'cascade', 'cascade');


    }

    public function down()
    {
        $this->dropForeignKey('fk_user', '{{%user_profile}}');
        $this->dropForeignKey('fk_user_partner', '{{%user_profile}}');
        $this->dropForeignKey('fk_partner_user', '{{%partners}}');
        $this->dropForeignKey('fk_partner_status', '{{%partners}}');
        $this->dropForeignKey('fk_partnerI18_partner', '{{%partners_i18}}');
        $this->dropForeignKey('fk_partnerAttachement_partner', '{{%partners_attachements}}');
        $this->dropForeignKey('fk_statusI18_status', '{{%statuses_i18}}');
        $this->dropTable('{{%statuses_i18}}');
        $this->dropTable('{{%partners_attachements}}');
        $this->dropTable('{{%partners_i18}}');
        $this->dropTable('{{%statuses}}');
        $this->dropTable('{{%partners}}');
        $this->dropTable('{{%user_profile}}');
        $this->dropTable('{{%user}}');


    }
}



















