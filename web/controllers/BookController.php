<?php

namespace app\controllers;

use app\models\Book;
use app\models\BookForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;

class BookController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $booksProvider = new ActiveDataProvider(
            [
                'query' => Book::find(),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]
        );
        return $this->render('index', ['booksProvider' => $booksProvider]);
    }

    public function actionCreate()
    {
        $book = new BookForm();

        if (
            $book->load(Yii::$app->request->post())
            && $book->validate()
            && $book->save()
        ) {
            Yii::$app->session->addFlash('success', 'Book was created');
            return $this->redirect(['book/index']);
        }

        return $this->render('create', ['book' => $book]);
    }

    /**
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $book = Book::findOne((int) $id);

        if ($book === null) {
            throw new NotFoundHttpException('Book not found');
        }

        return $this->render('view', ['book' => $book]);
    }

    /**
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $book = BookForm::findOne((int) $id);

        if ($book === null) {
            throw new NotFoundHttpException('Book not found');
        }

        if (
            $book->load(Yii::$app->request->post())
            && $book->validate()
            && $book->save()
        ) {
            Yii::$app->session->addFlash('success', 'Book has been updated');
            return $this->redirect(['book/index']);
        }

        return $this->render('update', ['book' => $book]);
    }

    /**
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $book = Book::findOne((int) $id);

        if ($book === null) {
            throw new NotFoundHttpException('Book not found');
        }

        if ($book->delete()) {
            Yii::$app->session->addFlash('success', 'Book has been deleted');
        } else {
            Yii::$app->session->addFlash('error', 'Book has been not deleted');
        }

        return $this->redirect(['book/index']);
    }
}