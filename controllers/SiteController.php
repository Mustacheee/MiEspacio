<?php

namespace app\controllers;

use app\models\SignUpForm;
use app\models\User;
use app\models\Profile;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\base\UserException;
//use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @return array
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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * @return string
     * @throws UserException
     */
    public function actionSignUp()
    {
        $model = new User();

        if(Yii::$app->request->isPost){
            $success = $model->create(Yii::$app->request->post());
            if($success){
                $this->redirect('create-profile');
            } else {
                throw new UserException;
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * @return string
     */
    public function actionEmployeeProfile()
    {
        return $this->render('employeeprofile');
    }

    /**
     * @return string
     */
    public function actionCreateProfile()
    {
        $model = new Profile();

        if (Yii::$app->request->isPost) {
            $success = $model->createProfile(Yii::$app->request->post());

            //if creating profile is successful, send them to employee profile
            if ($success) {
                $this->redirect('employee-profile');
            }
        }
        return $this->render('createprofile', [
            'model' => $model,
        ]);

    }
}
