<?php

namespace app\controllers;

use Yii;
use app\models\Lecturer;
use app\models\LecturerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\StudentAnswer;

/**
 * LecturerController implements the CRUD actions for Lecturer model.
 */
class LecturerController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Lecturer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LecturerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
        

    /**
     * Displays a single Lecturer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lecturer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lecturer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Lecturer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->user->returnUrl);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateLc()
    {
        $model = Yii::$app->user->getIdentity();   
        if ($model->load(Yii::$app->request->post())) {
            $info = $_POST['Lecturer'];
            $model->password = $info['password'];
            $model->confirmation = $info['confirmation'];
            if($model->updateLc())
            {
                return $this->redirect(Yii::$app->user->returnUrl);
            } else{
                
            }
        }
        else
        {
             return $this->render('update_lc', [
                'model' => $model,
            ]);
        } 
    }

    /**
     * Deletes an existing Lecturer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(Yii::$app->user->returnUrl);
    }

    /**
     * Finds the Lecturer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lecturer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lecturer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	public function actionProfile()
    {
        $this->layout = "main_layout";
        $model = Yii::$app->user->getIdentity();           
        return $this->render('courses', [
                'model' => $model
        ]);    
    }

    public function actionCourses()
    {
        $this->layout='main_layout';
        $model = Yii::$app->user->getIdentity();           
        return $this->render('courses', [
                'model' => $model
        ]);        
    }

    public function actionRequests()
    {
        $this->layout='main_layout';
        $model = Yii::$app->user->getIdentity();           
        return $this->render('requests', [
                'model' => $model
        ]);        
    }

    public function actionProfileUpdate()
    {
        $this->layout = "main_layout";
        $model = Yii::$app->user->getIdentity();   
        if ($model->load(Yii::$app->request->post())) {
            $info = $_POST['Lecturer'];
            $model->password = $info['password'];
            $model->confirmation = $info['confirmation'];
            if($model->updateLc())
            {
                return $this->redirect(Yii::$app->user->returnUrl);
            } else{
                
            }
        }
        else
        {
             return $this->render('profile_update', [
                'model' => $model
        ]);
        } 
    }

    public function actionResults()
    {
        
    }
}
