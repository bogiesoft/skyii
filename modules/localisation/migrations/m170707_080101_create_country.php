<?php

use yii\db\Schema;

class m170707_080101_create_country extends \yii\db\Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'ttp_mst_country', $tables)) {
            $this->createTable('ttp_mst_country', [
                'id' => $this->primaryKey(),
                'name' => $this->string(100)->notNull(),
                'code' => $this->string(2)->notNull(),
                'priority' => $this->integer(11)->notNull()->defaultValue('1'),
                'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
                'created_at' => $this->timestamp()->notNull()->defaultValue(CURRENT_TIMESTAMP),
                'updated_at' => $this->timestamp(),
            ], $tableOptions);
        } else {
            echo "\nTable `".Yii::$app->db->tablePrefix."ttp_mst_country` already exists!\n";
        }
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->dropTable('ttp_mst_country');
        $this->execute('SET foreign_key_checks = 1');
    }
}
