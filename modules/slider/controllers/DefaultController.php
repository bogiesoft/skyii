<?php

namespace modules\slider\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use common\helpers\Url;
use common\helpers\FileHelper;
use modules\slider\models\Slider;
use modules\slider\models\SliderSearch;

/**
 * DefaultController implements the CRUD actions for Slider model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slider model.
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
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slider();

        if(Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            $imageUploaded = UploadedFile::getInstance($model,'sliderImage');
            if(isset($imageUploaded->name)) {
                $model->sliderImage = $imageUploaded;
                $model->image = FileHelper::upload([
                    'fileObj' => $imageUploaded,
                    'folder' => 'slider',
                    'oldFile' => $model->image
                ]);
            }

            if ($model->validate()) {
                $model->title = ucwords($model->title);
                $model->save();

                Yii::$app->session->setFlash('success', 'Slider data saved successfully.');

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (!empty($model->image)) {
            $oldImage = Url::getMediaUrl($model->image, 'slider');
        } else {
            $oldImage = '';
        }

        if(Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            $imageUploaded = UploadedFile::getInstance($model,'sliderImage');
            if(isset($imageUploaded->name)) {
                $model->sliderImage = $imageUploaded;
                $model->image = FileHelper::upload([
                    'fileObj' => $imageUploaded,
                    'folder' => 'slider',
                    'oldFile' => $model->image
                ]);
            }

            if ($model->validate()) {
                $model->title = ucwords($model->title);
                $model->update();

                Yii::$app->session->setFlash('success', 'Slider data updated successfully.');

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'oldImage' => $oldImage,
        ]);
    }

    /**
     * Deletes an existing Slider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
