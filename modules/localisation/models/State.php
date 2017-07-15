<?php

namespace modules\localisation\models;

use Yii;
use modules\user\models\User;
use modules\localisation\models\Country;
use common\helpers\ArrayHelper;

/**
 * This is the model class for table "ttp_mst_state".
 *
 * @property integer $id
 * @property string $country_code
 * @property string $name
 * @property integer $priority
 * @property integer $status
 * @property string $created_by
 * @property string $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $state Status in human readable form
 * @property string $country Country relation data
 * @property string $countryName Get country name from country relation
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ttp_mst_state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_code', 'name'], 'required'],
            [['priority', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['country_code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_code' => 'Country',
            'name' => 'Name',
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
            //$this->setCreatedBy($this->created_by);
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
        if (!$insert) {
            //$this->setUpdatedBy($this->updated_by);
        }

        return true;
    }

    public function setCreatedBy($created_by)
    {
        $this->created_by = empty($created_by) ? Yii::$app->user->id : $created_by;
    }

    public function setUpdatedBy($updated_by)
    {
        $this->updated_by = empty($updated_by) ? Yii::$app->user->id : $updated_by;
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
    
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['code' => 'country_code']);
    }
    
    public function getCountryName()
    {
        return $this->getCountry()->select('name')->scalar();
    }
    
    /**
     * Country list for drop downs
     *
     * @return array
     */
    public static function getList($country_code = null)
    {
        try {
            if(!empty($country_code)) {
                $states = self::find()
                    ->andWhere(['status' => 1])
                    ->andWhere(['country_code' => $country_code])
                    ->orderBy(['priority' => SORT_ASC])
                    ->all();
            } else {
                $states = self::find()
                    ->andWhere(['status' => 1])
                    ->orderBy(['priority' => SORT_ASC])
                    ->all();
            }
            //$states->createCommand()->getRawSql();
        } catch (\Exception $e) {
            return [];
        }

        if(empty($states)) {
            return [];
        }
        
        return ArrayHelper::map($states, 'id', 'name');
    }
    
    /**
     * @inheritdoc
     * @return StateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StateQuery(get_called_class());
    }
}
