<?php

namespace frontend\controllers;

use Yii;
use common\models\Roomstoday;
use frontend\models\RoomstodaySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
/**
 * RoomstodayController implements the CRUD actions for Roomstoday model.
 */
class RoomstodayController extends Controller
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

    /**
     * Lists all Roomstoday models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RoomstodaySearch();
      
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
          //\Yii::info("own: ", var_dump($dataProvider,true));
        
    
        $db=Roomstoday::getDb();
$count_room = $db->cache(function ($db) {

    // Результат SQL запроса будет возвращен из кэша если
    // кэширование запросов включено и результат запроса присутствует в кэше
    return ArrayHelper::map( Roomstoday::find()->select('count_rooms')->orderBy('count_rooms')->asArray()->all(), 'count_rooms', 'count_rooms');  

});

$floor = $db->cache(function ($db) {

    // Результат SQL запроса будет возвращен из кэша если
    // кэширование запросов включено и результат запроса присутствует в кэше
    return ArrayHelper::map( Roomstoday::find()->select('floor')->orderBy('floor')->asArray()->all(), 'floor', 'floor');  

});

$floors = $db->cache(function ($db) {

    // Результат SQL запроса будет возвращен из кэша если
    // кэширование запросов включено и результат запроса присутствует в кэше
    return ArrayHelper::map( Roomstoday::find()->select('floors')->orderBy('floors')->asArray()->all(), 'floors', 'floors');  

});
   
   $own_or_business = $db->cache(function ($db) {

    // Результат SQL запроса будет возвращен из кэша если
    // кэширование запросов включено и результат запроса присутствует в кэше
    return ArrayHelper::map( Roomstoday::find()->select('own_or_business')->orderBy('own_or_business')->asArray()->all(), 'own_or_business', 'own_or_business');  

});



   $district = $db->cache(function ($db) {

    // Результат SQL запроса будет возвращен из кэша если
    // кэширование запросов включено и результат запроса присутствует в кэше
    return ArrayHelper::map( Roomstoday::find()->select('district')->orderBy('district')->asArray()->all(), 'district', 'district');  

});


   $currency = $db->cache(function ($db) {
    return ArrayHelper::map( Roomstoday::find()->select('currency')->orderBy('currency')->asArray()->all(), 'currency', 'currency');  
});
   //$currency = ArrayHelper::map( Roomstoday::find()->select('currency')->orderBy('currency')->asArray()->all(), 'currency', 'currency');  
   $type = $db->cache(function ($db) {
    return ArrayHelper::map( Roomstoday::find()->select('type')->orderBy('type')->asArray()->all(), 'type', 'type');  
});

   $manager = $db->cache(function ($db) {
    return ArrayHelper::map( Roomstoday::find()->select('manager')->orderBy('manager')->asArray()->all(), 'manager', 'manager');  
});


   $material = $db->cache(function ($db) {
    return ArrayHelper::map( Roomstoday::find()->select('material')->orderBy('material')->asArray()->all(), 'material', 'material');  
});
    
       $site = $db->cache(function ($db) {
    return ArrayHelper::map( Roomstoday::find()->select('site')->orderBy('site')->asArray()->all(), 'site', 'site');  
});


       $state = $db->cache(function ($db) {
    return ArrayHelper::map( Roomstoday::find()->select( 'state')->orderBy('state')->asArray()->all(), 'state', 'state');  
});
    
                 




        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'count_room'=>$count_room,
            'floor'=>$floor,
             'floors'=>$floors,
             'own_or_business'=>$own_or_business,
             'district'=>$district,
             'currency'=>$currency,
             'type'=>$type,
             'manager'=>$manager,
             'material'=>$material,
             'site'=>$site,
             'state'=>$state,
            // 'site_id'=>$site_id
             
            
        ]);



    }

    /**
     * Displays a single Roomstoday model.
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
     * Creates a new Roomstoday model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Roomstoday();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Roomstoday model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Roomstoday model.
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
     * Finds the Roomstoday model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Roomstoday the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Roomstoday::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
