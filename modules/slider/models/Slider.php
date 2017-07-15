<?php

namespace modules\slider\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property integer $active
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class Slider extends \yii\db\ActiveRecord
{
    public $sliderImage;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['sliderImage'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif, jpeg'],
            [['title', 'description'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
            'active' => 'Active',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if($insert) {
            $this->setCreatedAt($this->created_at);
        }

        $this->setUpdatedAt($this->created_at);
        $this->setActive($this->active);

        return true;
    }
    public function setActive($active)
    {
        $this->active = empty($active) ? true : false;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = empty($created_at) ? date('Y-m-d H:i:s') : $created_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = empty($updated_at) ? date('Y-m-d H:i:s') : $updated_at;
    }

    public static function getAll()
    {
        $model = self::findAll(['active' => true]);

        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
