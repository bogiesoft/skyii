<?php

namespace modules\enquiry\models;

use Yii;

/**
 * This is the model class for table "ttp_dta_enquiry".
 *
 * @property string $enquiry_id
 * @property integer $user_id
 * @property string $customer_name
 * @property string $email
 * @property string $phone
 * @property string $budget
 * @property string $description
 * @property string $status
 * @property integer $query_assigned_to
 * @property string $remark
 * @property string $remark_date
 * @property string $last_status_change_date
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class Enquiry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ttp_dta_enquiry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_by', 'updated_by'], 'integer'],
            [['customer_name', 'email', 'phone'], 'required'],
            [['remark_date', 'last_status_change_date', 'created_at', 'updated_at'], 'safe'],
            [['customer_name', 'email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 15],
            [['budget'], 'string'],
            [['description'], 'string', 'max' => 600],
            [['status'], 'string', 'max' => 1],
            [['remark'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'enquiry_id' => 'Enquiry ID',
            'user_id' => 'User ID',
            'customer_name' => 'Customer Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'budget' => 'Budget',
            'description' => 'Description',
            'status' => 'Status',
            'query_assigned_to' => 'Query Assigned To',
            'remark' => 'Remark',
            'remark_date' => 'Remark Date',
            'last_status_change_date' => 'Last Status Change Date',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
