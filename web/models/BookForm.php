<?php

namespace app\models;

class BookForm extends Book
{
    public function rules()
    {
        return [
            [['title', 'author', 'year', 'count'], 'required'],
            [['title', 'author'], 'string'],
            [['year', 'count'], 'integer'],
        ];
    }
}