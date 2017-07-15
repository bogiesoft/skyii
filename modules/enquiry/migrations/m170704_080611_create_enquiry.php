<?php

use yii\db\Migration;

/**
 * Class m170704_080611_create_enquiry
 */
class m170704_080611_create_enquiry extends Migration
{
    /**
     * Create Table
     */
    public function up()
    {
        $this->createTable('{{%ttp_dta_enquiry}}', [
            'enquiry_id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'customer_name' => $this->string(100)->notNull(),
            'email' => 'VARCHAR(100) NULL DEFAULT \'n\' COMMENT \'n=not applicable, v=veg, o=non veg, m=mixed, s=sea food\'',
            'phone' => $this->string(15)->null(),
            'budget' => $this->string(10)->null(),
            'description' => $this->string(600)->null(),
            'status' => 'CHAR(1) NOT NULL DEFAULT \'o\' COMMENT \'o=open, f=fake, p=positive, n=negative, h=on hold\'',
            'query_assigned_to' => 'INT(11) NULL COMMENT \'user/admin/agent who is working on this query\'',
            'remark' => 'VARCHAR(500) NULL',
            'remark_date' => 'TIMESTAMP NULL',
            'last_status_change_date' => 'TIMESTAMP NULL',
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * Drop table
     */
    public function down()
    {
        $this->dropTable('{{%ttp_dta_enquiry}}');
    }
}
