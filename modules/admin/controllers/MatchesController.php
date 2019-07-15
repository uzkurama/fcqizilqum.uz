<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Matches;
use app\modules\admin\models\MatchesOptions;
use app\modules\admin\models\MatchesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MatchesController implements the CRUD actions for Matches model.
 */
class MatchesController extends Controller
{
    /**
     * {@inheritdoc}
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

    /**
     * Lists all Matches models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MatchesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Matches model.
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
     * Creates a new Matches model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Matches();
        $options = new MatchesOptions();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $options->match_id = $model->id;
            $options->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionForm()
    {
        $model = new Matches();
        $options = new MatchesOptions();
        if ($model->load(Yii::$app->request->post())) {
            $date = strtotime($model->date);
            if($date < date('U')) {
                return $this->render('_form_played', [
                    'model' => $model,
                    'options' => $options,
                ]);
            }
            else if($date >= date('U')) {
                return $this->render('_form_next', [
                    'model' => $model,
                ]);
            }
            else {
                Yii::$app->session->setFlash(\dominus77\sweetalert2\Alert::TYPE_ERROR, [
                    [
                        'title' => 'Xatolik yuz berdi',
                        'confirmButtonText' => 'Ok!',
                    ]
                ]);
                return $this->redirect('create');
            }
        }
    }

    /**
     * Updates an existing Matches model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $options = MatchesOptions::findOne(['match_id' => $id]);
        if ($model->load(Yii::$app->request->post()) && $options->load(Yii::$app->request->post())) {
            $options->match_id = $model->id;
            $model->status = 0;
            $model->save();
            $options->save();
            Yii::$app->session->setFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS, [
                [
                    'title' => 'Saqlandi',
                    'confirmButtonText' => 'Ok!',
                ]
            ]);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('_form_played', [
            'model' => $model,
            'options' => $options,
        ]);
    }

    /**
     * Deletes an existing Matches model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        MatchesOptions::findOne(['match_id' => $id])->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Matches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Matches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Matches::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
