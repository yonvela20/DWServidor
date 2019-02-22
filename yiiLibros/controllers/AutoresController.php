<?php

namespace app\controllers;

use Yii;
use app\models\Autores;
use app\controllers\AutoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use yii\web\AccessControl;


/**
 * AutoresController implements the CRUD actions for Autores model.
 */

 //TODO: Importar el AccessControl con la extension que no encuentro
class AutoresController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        /*
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
        */
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','delete','update'],
                'rules' => [
                    ['allow' => true,
                     'actions' => ['create', 'delete', 'update'],
                     'matchCallback' => function ($rule, $action) {
                                           return !Yii::$app->user->isGuest && Yii::$app->user->identity->usuario=='admin';
                                        }
 
                    ],
                    ['allow' => true,
                     'actions' => ['update'],
                     'matchCallback' => function ($rule, $action) {
                                           return !Yii::$app->user->isGuest && 
                                              Yii::$app->user->identity->estado=="A"; //Un usuario identificado y de alta
                                        }
 
                    ],
 
                ],
            ],
        ];
    }

    /**
     * Lists all Autores models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AutoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Autores model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Autores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Autores();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Autores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Autores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Autores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Autores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Autores::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
