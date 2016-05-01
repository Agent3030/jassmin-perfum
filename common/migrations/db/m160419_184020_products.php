<?php

use yii\db\Migration;

class m160419_184020_products extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(1024)->notNull(),
            'product_code' => $this->string(128)->notNull(),
            'gender' => $this->string(32)->notNull(),
            'brand_id' => $this->integer(),
            'product_name' => $this->string(128)->notNull(),
            'description' => $this->text(),
            'bulk_id' => $this->integer(),
            'author_id' => $this->integer(),
            'updater_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'is_available' => $this->smallInteger()->notNull()->defaultValue(1),
            'is_new' => $this->smallInteger()->notNull()->defaultValue(0),
            'is_action' => $this->smallInteger()->notNull()->defaultValue(0)
        ], $tableOptions);

        $this->createTable('{{%brands}}', [
            'id' => $this->primaryKey(),
            'brand_name' => $this->string(128)->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
        ], $tableOptions);

        $this->createTable('{{%bulks}}', [
            'id' => $this->primaryKey(),
            'bulk' => $this->string(32)->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
        ], $tableOptions);

        $this->createTable('{{%prices}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'bulk_id' => $this->integer(),
            'status_id' => $this->integer(),
            'prices' => $this->float(2),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%product_images}}', [
            'id' => $this->primaryKey(),
            'path' =>$this->string(255)->notNull(),
            'base_url' => $this->string(255)->notNull(),
            'type' =>  $this->string(255)->notNull(),
            'size' =>  $this->integer(),
            'name' => $this->string(255),
            'order' => $this->integer(),
            'product_id' => $this->integer()->notNull(),


        ]);


        $this->addForeignKey('fk_product_brand', '{{%products}}', 'brand_id', '{{%brands}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_product_author', '{{%products}}', 'author_id', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_product_updater', '{{%products}}', 'updater_id', '{{%user}}', 'id', 'set null', 'cascade');
        $this->addForeignKey('fk_product_bulk', '{{%products}}', 'bulk_id', '{{%bulks}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_product_prices', '{{%prices}}', 'product_id', '{{%products}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_product_images', '{{%product_images}}', 'product_id', '{{%products}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_price_status', '{{%prices}}', 'status_id', '{{%statuses}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_bulk_prices', '{{%prices}}', 'bulk_id', '{{%bulks}}', 'id', 'cascade', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('fk_product_brand', '{{%products}}');
        $this->dropForeignKey('fk_product_author', '{{%products}}');
        $this->dropForeignKey('fk_product_updater', '{{%products}}');
        $this->dropForeignKey('fk_product_bulk', '{{%products}}');
        $this->dropForeignKey('fk_product_prices', '{{%prices}}');
        $this->dropForeignKey('fk_product_images', '{{%product_images}}');
        $this->dropForeignKey('fk_price_status', '{{%prices}}');
        $this->dropForeignKey('fk_bulk_prices', '{{%prices}}');


        $this->dropTable('{{%products}}');
        $this->dropTable('{{%brands}}');
        $this->dropTable('{{%bulks}}');
        $this->dropTable('{{%prices}}');
        $this->dropTable('{{%product_images}}');
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

