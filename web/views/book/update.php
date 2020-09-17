<?php

/**
 * @var $this \yii\web\View
 * @var $book \app\models\BookForm
 */

use yii\widgets\ActiveForm;

$this->title = 'Update book';

$form = ActiveForm::begin();
?>
<?= $form->field($book, 'title') ?>
<?= $form->field($book, 'author') ?>
<?= $form->field($book, 'year') ?>
<?= $form->field($book, 'count') ?>
    <input class="btn btn-success" type="submit" value="Update">
<?php ActiveForm::end() ?>