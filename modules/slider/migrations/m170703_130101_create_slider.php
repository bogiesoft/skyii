<?php

use yii\db\Migration;

/**
 * Class m170703_130101_create_slider
 */
class m170703_130101_create_slider extends Migration
{
    /**
     * Create Table
     */
    public function up()
    {
        $this->createTable('{{%slider}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->string(255)->notNull(),
            'image' => $this->string(255)->notNull(),
            'active' => $this->boolean(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->createIndex('idx_created_by_slider','slider','created_by',0);
        $this->createIndex('idx_updated_by_slider','slider','updated_by',0);
    }

    /**
     * Drop table
     */
    public function down()
    {
        $this->dropTable('{{%slider}}');
    }
}
