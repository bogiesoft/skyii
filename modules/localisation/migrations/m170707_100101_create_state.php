<?php

use yii\db\Schema;

class m170707_100101_create_state extends \yii\db\Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'ttp_mst_state', $tables))  {
            $this->createTable('ttp_mst_state', [
                'id' => $this->primaryKey(),
                'country_code' => $this->string(2)->notNull(),
                'name' => $this->string(100)->notNull(),
                'priority' => $this->integer(11)->notNull()->defaultValue(1),
                'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
                'created_by' => $this->integer(11)->notNull(),
                'updated_by' => $this->integer(11),
                'created_at' => $this->timestamp()->notNull()->defaultValue(CURRENT_TIMESTAMP),
                'updated_at' => $this->timestamp(),
                'PRIMARY KEY ([[id]])',
            ], $tableOptions);
        } else {
            echo "\nTable `".Yii::$app->db->tablePrefix."ttp_mst_state` already exists!\n";
        }
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->dropTable('ttp_mst_state');
        $this->execute('SET foreign_key_checks = 1');
    }
}
