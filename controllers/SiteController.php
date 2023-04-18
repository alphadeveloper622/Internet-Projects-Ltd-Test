<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Fruit;  

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
        $fruits = Fruit::find()->all();     
        return $this->render('index' ,['model' => $fruits]);
    }

    /**
     * set Favorite.
     *
     * @return string
     */
    public function actionSetFavorite()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $id= $data['id'];
            $flag= $data['flag'];

            $fruits = Fruit::find()->where(['favorite' => 1])->all();
            $cnt= count ( $fruits );
            // your logic;
            $msg='';
            $fruit = Fruit::findOne($id);
            if($flag == 'true')
            {   if($cnt < 10)
                    $fruit->favorite = 1;
                else    
                    $msg='The number of Favorites is over than ten!';
            }
            else
                $fruit->favorite = 0;
            $fruit->save();

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            return [
                'message' => 'success',
                'id'=>$id,
                'flag'=>$flag,
                'msg'=>$msg
            ];
        }
    }
   

   

    /**
     * Displays Favorite page.
     *
     * @return string
     */
    public function actionFavorite()
    {
        $fruits = Fruit::find()->where(['favorite' => 1])->all();
        
        return $this->render('favorite', ['model' => $fruits]);
    }
}
