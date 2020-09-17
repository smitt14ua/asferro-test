<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $title
 * @property string $author
 * @property int $year
 * @property int $count
 */
class Book extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%book}}';
    }
}