<?php

/**
 * @var $this \yii\web\View
 * @var $book \app\models\Book
 */

$this->title = $book->title;
?>
<h1><?= $book->title ?></h1>
<p>Author: <?= $book->author ?></p>
<p>Year: <?= $book->year ?></p>
<p>Count: <?= $book->count ?></p>
<div class="btn-group">
    <?= \yii\helpers\Html::a(
        'Update',
        ['book/update', 'id' => $book->id],
        ['class' => 'btn btn-warning']
    ) ?>
    <?= \yii\helpers\Html::a(
        'Delete',
        ['book/delete', 'id' => $book->id],
        ['class' => 'btn btn-danger']
    ) ?>
</div>