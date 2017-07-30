<?php

namespace app\models;

use Yii;
use yii\helpers\HtmlPurifier;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $guid
 * @property string $email
 * @property string $description
 * @property string $created_at
 *
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'email'], 'required'],
            [['guid'], 'string', 'max' => 255],

            ['description', 'filter', 'filter' => function ($value) {
                return HtmlPurifier::process($value);
            }],
            [['description'], 'required'],
            [['description'], 'string', 'min' => 4],

            [['created_at'], 'safe'],

            [['email'], 'string', 'max' => 255],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'guid' => Yii::t('app', 'Rss Item ID'),
            'email' => Yii::t('app', 'Email'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }


}
