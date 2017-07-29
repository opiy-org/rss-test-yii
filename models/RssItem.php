<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rss_item".
 *
 * @property integer $id
 * @property string $guid
 * @property string $title
 * @property string $link
 * @property string $category
 * @property string $author
 * @property string $description
 * @property string $pubdate
 *
 * @property Comment[] $comments
 */
class RssItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rss_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid'], 'required'],
            [['description'], 'string'],
            [['pubdate'], 'safe'],
            [['guid', 'title', 'link', 'category', 'author'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'guid' => Yii::t('app', 'Guid'),
            'title' => Yii::t('app', 'Title'),
            'link' => Yii::t('app', 'Link'),
            'category' => Yii::t('app', 'Category'),
            'author' => Yii::t('app', 'Author'),
            'description' => Yii::t('app', 'Description'),
            'pubdate' => Yii::t('app', 'Pubdate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['rss_item_id' => 'id']);
    }
}
