<?php

namespace app\controllers;

use Yii;
use app\models\GeneratorForm;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * CardController implements the CRUD actions for Card model.
 */
class GeneratorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new GeneratorForm();
        
        $isPost = $model->load(Yii::$app->request->post());
        if ($isPost) {
            if (isset($_POST['create'])) {
                $model->createCards();
            }
            else
            if (isset($_POST['delete'])) {
                $model->deleteCards();
            }
        }
        
        return $this->render('index', [
            'model' => $model,
        ]);        
    }
}
