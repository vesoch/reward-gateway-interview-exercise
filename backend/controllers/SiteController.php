<?php

namespace backend\controllers;

use backend\models\activeRecord\Employee;
use backend\models\form\activeRecord\employee\Create as EmployeeCreate;
use backend\models\search\activeRecord\Employee as EmployeeSearch;
use backend\services\RewardGatewayInterviewExerciseAPIConnector;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $defaultAction = 'list';

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
     * Displays a list of employees
     */
    public function actionList()
    {
        $data = RewardGatewayInterviewExerciseAPIConnector::getEmployeeList();
        if ($data != 500) {
            Employee::deleteAll();

            foreach ($data as $employee) {
                $employeeModel = new Employee();
                $employeeForm = new EmployeeCreate($employeeModel, $employee);
                $employeeForm->run();
            }
        }

        $employees = Employee::find()->all();
        return $this->render(
            'list',
            [
                'employees' => $employees
            ]
        );

//        $request = Yii::$app->request;
//        $employeeSearchModel = Yii::createObject(EmployeeSearch::class, [Employee::find()]);
//        $employeeSearchModel->load($request->queryParams);
//
//        return $this->render(
//            'list',
//            [
//                'searchModel' => $employeeSearchModel,
//                'dataProvider' => $employeeSearchModel->search(),
//            ]
//        );
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
        if ($model->load(Yii::$app->request->post()) && $model->loginAdmin()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
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
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'list'],
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
}
