<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\filters\Cors;
use app\models\Scoreboard;


class SiteController extends Controller
{
    public $layout = 'content';
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'corsFilter'  => [
                'class' => Cors::className(),
                'cors'  => [
                    'Origin' => static::allowedDomains(),
//                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age' => 3600,
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ]);
    }



    public function actionTableUpdate()
    {
        $this->layout = false;
        $table = Scoreboard::find()->where(['id' => 1])->one();
        if(Yii::$app->request->post() && Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            $table = Scoreboard::find()->where(['id' => $id])->one();
            return $this->render('table_template', [
                'table' => $table,
            ]);
        }

        return $this->render('table', [
            'table' => $table,
        ]);
    }

    public static function allowedDomains() {
        return [
            'https://www.youtube.com',
            'https://googleads.g.doubleclick.net/pagead/id',
            'https://www.mover.uz',
            'https://mover.uz',
            'https://i.mover.uz/1VZp5pTm_th.webvtt',
            'http://www.mover.uz',
            'http://www.mover.uz',
        ];
    }

    public function getStatus($id, $param){
        $values=\app\models\Option::find()->select($param)->where(['id' => $id])->all();

        foreach ($values as $value){
            $val = $value[$param];
        }
        return $val;
    }

    public function getMatchDate()
    {
        $values=\app\models\Matches::find()->orderBy('date DESC')->all();

        foreach ($values as $value){
            if($value->date > date('U'))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'error',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'main';
        $table = Scoreboard::find()->where(['id' => 1])->one();

        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            $table = Scoreboard::find()->where(['id' => $id])->one();
            return $this->renderPartial('index', [
                'table' => $table,
            ]);
        }
        else {
            return $this->render('index', [
                'table' => $table,
            ]);
        }
    }


    public function actionLanguage($ln)
    {
        $language = \app\models\Language::find()->joinWith('languageCode')->where(['language.status'=>'1','country.language_code'=>$ln])->one();

        if($language != null){
            $lan_code = $language->languageCode->language_code;
            Yii::$app->language = $lan_code;
            $cookie = new Yii\web\cookie([
              'name'=>'language',
              'value'=>$lan_code
            ]);
            Yii::$app->getResponse()->getCookies()->add($cookie);


            $session = Yii::$app->session;
            !$session->isActive ? $session->open() : $session->close();
            $session->set('language', $lan_code);
            $session->close();
            return isset($_SERVER['HTTP_REFERER']) ? $this->redirect($_SERVER['HTTP_REFERER']) : $this->redirect(Yii::$app->homeUrl);
        }else{
            return $this->redirect('/');
        }
    }
}
