<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property integer $rss_item_id
 * @property string $email
 * @property string $description
 * @property string $created_at
 *
 * @property RssItem $rssItem
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
            [['rss_item_id', 'email'], 'required'],
            [['rss_item_id'], 'integer'],
            [['description'], 'string'],
            [['created_at'], 'safe'],

            [['email'], 'string', 'max' => 255],
            ['email', 'email'],

            [['rss_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => RssItem::className(), 'targetAttribute' => ['rss_item_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'rss_item_id' => Yii::t('app', 'Rss Item ID'),
            'email' => Yii::t('app', 'Email'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRssItem()
    {
        return $this->hasOne(RssItem::className(), ['id' => 'rss_item_id']);
    }
}
