<?php

namespace modules\localisation\models;

use Yii;
use modules\user\models\User;
use common\helpers\ArrayHelper;

/**
 * This is the model class for table "ttp_mst_country".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $priority
 * @property integer $status
 * @property string $created_by
 * @property string $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $state Status in human readable form
 * @property string $list Status in human readable form
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ttp_mst_country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['priority', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 100],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Country Code',
            'priority' => 'Priority',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => \yii\behaviors\BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }
    /**
     * Set created by before validating the form.
     *
     * @return bool
     */
    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            
            return true;
        }
        return false;
    }

    /**
     * Set updated by column before updating the form.
     *
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        // When updating the record
        if ($insert) {
            $this->setPriority($this->priority);
            $this->setCode($this->code);
        }

        return true;
    }

    public function setPriority($priority)
    {
        $this->priority = empty($priority) ? 1 : $priority;
    }

    public function setCode($code)
    {
        $this->code = empty($code) ? null : strtoupper($code);
    }

    /**
     * Get status in human readable form
     *
     * @return string
     */
    public function getState()
    {
        return !empty($this->status) && $this->status == 1 ? 'Active' : 'Inactive';
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    public static function get($id)
    {
        return self::find()->where(['id' => $id]);
    }
    
    /**
     * Country list for drop downs
     *
     * @return array
     */
    public static function getList()
    {
        try {
            $countries = self::find()
                ->where(['status' => 1])
                ->orderBy(['priority' => SORT_ASC])
                ->all();
        } catch (\Exception $e) {
            return [];
        }
        
        if(empty($countries)) {
            return [];
        }
        
        return ArrayHelper::map($countries, 'code', 'name');
    }
    
    public static function getAll($condition = null)
    {
        return self::findAll($condition);
    }
    
    /**
     * @inheritdoc
     * @return CountryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CountryQuery(get_called_class());
    }
}
