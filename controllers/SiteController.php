<?php

namespace app\controllers;

use app\models\Blog;
use app\models\City;
use app\models\Coment;
use app\models\EntryForm;
use app\models\MessageForm;
use app\models\Users;
use Yii;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
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
     * @inheritdoc
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
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
    public function actionRegisterUser(){
        $checking = false;
        $model = new Users();
        if ($model->load(Yii::$app->request->post())&& $model->validate()){
            $model->save();
        }
        $users = Users::find()->all();
        $city = City::find()->all();
        return $this->render("comments",
            ['model'=>$model, 'user' => $users, 'city'=>$city, 'check'=>$checking
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionHelloWorld()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post())&& $model->validate()){
            $name = Html::encode($model->name);
            $email = Html::encode($model->email);
            return $this->render('success', [
                'name' => $name,
                'email'=> $email
            ]);
        }

        return $this->render("helloWorld", [
            'model' => $model,
        ]);
    }

    public function actionSendmessage()
    {
        $model = new MessageForm();

        if ($model->load(Yii::$app->request->post()) && $model->sendEmail()){

            return $this->render('success');
        }

        return $this->render("message", [
            'model' => $model,
        ]);
    }

    public function actionShowComments()
    {
        $model = Coment::findOne(1);

        if ($model->load(Yii::$app->request->post())&& $model->validate()){
            $model->save();
        }
        $comments = Coment::find()->all();

        return $this->render("comments", [
            'comments' => $comments,
            'model' => $model
        ]);
    }

    public function actionAdminka(){

    }

    public function actionBlog(){
        $dataProvider = new ActiveDataProvider(
            ['query'=>Blog::find()]
        );
        return $this->render('blog',['dataProvider'=>$dataProvider]);
    }

    public function actionViewBlog($id){
        $model = Blog::findOne($id);
        return $this->render("viewBlog",['model'=>$model]);
    }
    public function actionEditBlog($id){
        $model = Blog::findOne($id);
        if ($model->load(Yii::$app->request->post())&& $model->validate()){
            $model->save();
            return $this->redirect(['site/blog']);
        }
        return $this->render("editBlog",['model'=>$model]);
    }

    public function actionDeleteBlog($id){
        $model = Blog::findOne($id);
        if ($model->load(Yii::$app->request->post())&& $model->validate()){
            $model->delete();
            $model->save();
        }
        return $this->render("editBlog",['model'=>$model]);
    }
}
