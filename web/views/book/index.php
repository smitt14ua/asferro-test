<?php

/**
 * @var $this \yii\web\View
 * @var $booksProvider \yii\data\ActiveDataProvider
 */

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Books';
?>
<a href="<?= Url::to(['book/create']) ?>" class="btn btn-default">Add book</a>
<hr>
<?= GridView::widget(
    [
        'dataProvider' => $booksProvider,
        'columns' => [
            'title',
            'author',
            'year',
            'count',
            [
                'class' => ActionColumn::class,
                'template' => '{view} {update} {delete}'
            ]
        ],
    ]
) ?>


