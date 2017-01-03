<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use yii\widgets\Pjax;

use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use frontend\models\Rooms;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RoomsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Rooms";

$this->params['breadcrumbs'][] = $this->title;


//\Yii::info("own: ", var_dump($params,true));

?>
<div class="rooms-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rooms', ['create'], ['class' => 'btn btn-success']) ?>
    
     <?= Html::a('Сбросить кеш', ['flush'], ['class' => 'btn btn-success pull-right']) ?>
    
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive'=>true,
        'resizableColumns'=>true,
    'hover'=>true,
    'pjax'=>false,
    'pjaxSettings'=>[
        'neverTimeout'=>true,
        'beforeGrid'=>'My fancy content before.',
        'afterGrid'=>'My fancy content after.',
    ],
        //'hover'=>true,
        'exportConfig'=>[ 
 GridView::CSV => [
        'label' => "Save as CSV",
        'icon' => true? 'file-code-o' : 'floppy-open', 
        'iconOptions' => ['class' => 'text-primary'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => "export",
        'alertMsg' => "error",
        'options' => ['title' =>"export file",
        'mime' => 'application/csv',
        'config' => [
            'colDelimiter' => ",",
            'rowDelimiter' => "\r\n",
        ]
    ],],],
        
         'toolbar'=>[
        '{export}',
        '{toggleData}'
    ],
    
     'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-home"></i> Квартиры</h3>',
        'type'=>'success',
        'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
        'footer'=>true,
    ],
        'columns' => [
        
           ['class' => 'yii\grid\ActionColumn' ,'template' => '{view} {update}']
,


      
           
           
           
           
           

                  [
            'attribute'=>'site_id', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            'contentOptions' => 
            ['style'=>'max-width: 50px;     max-height: 120px; width:50px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap;
 white-space: -pre-wrap; 
 white-space: -o-pre-wrap; 
 word-wrap: break-word; ']
            ,
            ],
            
            
 
            
            
            
            
              'date',
            
            
                [
            'attribute'=>'count_rooms', 
            'width'=>'250px',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->count_rooms;
            },
            'filterType'=>GridView::FILTER_SELECT2,
   
   'filter'=>  $count_room,         
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Комнаты']
        ],
            
            
             
             
             
            
             
                              [
            'attribute'=>'site', 
            'width'=>'250px',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->site;
            },
            'filterType'=>GridView::FILTER_SELECT2,
   
   'filter'=>  $site,         
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Сайт']
        ],
             
             
                                                                                    
                        
            
           [
           'label'=>'Ссылка',
           'format' => 'raw',
       'value'=>function ($data) {
             return Html::a($data->site,$data->url);
        },
    ], 
                
                 [
            'attribute'=>'shortdistrict', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,

            'contentOptions' => 
            ['style'=>'max-width: 350px;     max-height: 120px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; 
 white-space: -pre-wrap; 
 white-space: -o-pre-wrap; 
 word-wrap: break-word; ']
            ,
           
        
            ],
            
           
            
                     [
            'attribute'=> 'phone', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            
            'contentOptions' => 
            ['style'=>'max-width: 350px;     max-height: 120px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; 
 white-space: -pre-wrap; 
 white-space: -o-pre-wrap; 
 word-wrap: break-word; ']
            ,
           
        
            ],
            
            
            
            
            
                       [
            'attribute'=>'district', 
            'width'=>'250px',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->district;
            },
            'filterType'=>GridView::FILTER_SELECT2,
   
   'filter'=>  $district,         
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Город']
        ],
        
        
                              [
            'attribute'=>'material', 
            'width'=>'250px',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->material;
            },
            'filterType'=>GridView::FILTER_SELECT2,
   
   'filter'=>  $material,         
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Материал']
        ],
        
            
            
            
            
              
                 [
            'attribute'=>'street', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            
            'contentOptions' => 
            ['style'=>'min-width: 120px;     max-height: 120px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; 
 white-space: -pre-wrap; 
 white-space: -o-pre-wrap; 
 word-wrap: break-word; ']
            ,
           
        
            ],
            
                     
                 [
            'attribute'=>'street2', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            
            'contentOptions' => 
            ['style'=>'min-width: 120px;     max-height: 120px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; 
 white-space: -pre-wrap; 
 white-space: -o-pre-wrap; 
 word-wrap: break-word; ']
            ,
           
        
            ],
            
            
            
            
          
            
            
             [
            'attribute'=>'price',
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            
            'contentOptions' => 
            ['style'=>'min-width: 140px;     max-height: 120px;  overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; 
 white-space: -pre-wrap; 
 white-space: -o-pre-wrap; 
 word-wrap: break-word; ']
            ,
           
           
            ],
            
            
            
     
       
                       [
            'attribute'=>'currency', 
            'width'=>'250px',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->currency;
            },
            'filterType'=>GridView::FILTER_SELECT2,
   
   'filter'=>  $currency,         
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Валюта']
        ],
     
     
     
     
     [
            'attribute'=>'price_m',
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            
            'contentOptions' => 
            ['style'=>'min-width: 90px;     max-height: 120px;  overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; 
 white-space: -pre-wrap; 
 white-space: -o-pre-wrap; 
 word-wrap: break-word; ']
            ,
           
           
            ],
     
          
            
      
            
            
             'square',
             
        [
            'attribute'=>'floor', 
            'width'=>'250px',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->floor;
            },
            'filterType'=>GridView::FILTER_SELECT2,
           // 'filter'=>ArrayHelper::map(Rooms::find()->select('floor')->orderBy('floor')->asArray()->all(), 'floor', 'floor'), 
            'filter'=>$floor,
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Этаж']
        ],
            
            
         [
            'attribute'=>'floors', 
            'width'=>'250px',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->floors;
            },
            'filterType'=>GridView::FILTER_SELECT2,
     // 'filter'=>ArrayHelper::map(Rooms::find()->select('floors')->orderBy('floors')->asArray()->all(), 'floors', 'floors'), 
            'filter'=>$floors,
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Этажность']
        ],
            
            
                 [
            'attribute'=>'type', 
            'width'=>'250px',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->type;
            },
            'filterType'=>GridView::FILTER_SELECT2,
     // 'filter'=>ArrayHelper::map(Rooms::find()->select('floors')->orderBy('floors')->asArray()->all(), 'floors', 'floors'), 
            'filter'=>$type,
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Тип']
        ],
            
            
            
        
            
              [
            'attribute'=>'description', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => true,
            
            'contentOptions' => 
            ['style'=>'max-width: 300px;     max-height: 120px;  width: 200px;
    height: 100px;
    
      overflow: -moz-hidden-unscrollable;
     overflow: scroll;
 white-space: -moz-pre-wrap; 
 white-space: -pre-wrap; 
 white-space: -o-pre-wrap; 
 word-wrap: break-word;
 
     text-overflow: inherit;
 
 white-space: pre;
 overflow: -moz-hidden-unscrollable;
  '
 ]
            ,
           
           
            ],
            
            
            
           
                                [
            'attribute'=> 'state', 
            'width'=>'250px',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->state;
            },
            'filterType'=>GridView::FILTER_SELECT2,
           // 'filter'=>ArrayHelper::map(Rooms::find()->select('own_or_business')->orderBy('own_or_business')->asArray()->all(), 'own_or_business', 'own_or_business'), 
            'filter'=>$state,
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Any category']
        ],
            
            
            
            
                      [
            'attribute'=>'own_or_business', 
            'width'=>'250px',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->own_or_business;
            },
            'filterType'=>GridView::FILTER_SELECT2,
           // 'filter'=>ArrayHelper::map(Rooms::find()->select('own_or_business')->orderBy('own_or_business')->asArray()->all(), 'own_or_business', 'own_or_business'), 
            'filter'=>$own_or_business,
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Any category']
        ],
    
            
            
               [
            'attribute'=>'manager', 
            'width'=>'250px',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->manager;
            },
            'filterType'=>GridView::FILTER_SELECT2,
           // 'filter'=>ArrayHelper::map(Rooms::find()->select('own_or_business')->orderBy('own_or_business')->asArray()->all(), 'own_or_business', 'own_or_business'), 
            'filter'=>$manager,
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Менеджер']
        ],
     
            
     
            
                                                [
            'attribute'=>'coment', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            
            'contentOptions' => 
            ['style'=>'max-width: 50px;     max-height: 120px; width:50px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; 
 white-space: -pre-wrap; 
 white-space: -o-pre-wrap; 
 word-wrap: break-word; ']
            ,
            ],
            
                                                          [
            'attribute'=>'img', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            
            'contentOptions' => 
            ['style'=>'max-width: 50px;     max-height: 120px; width:50px; overflow: hidden; /* css-3 */
 white-space: -moz-pre-wrap; 
 white-space: -pre-wrap; 
 white-space: -o-pre-wrap; 
 word-wrap: break-word; ']
            ,
            ],
                                                                      [
            'attribute'=>'url', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            
            'contentOptions' => 
            ['style'=>'max-width: 50px;     max-height: 120px; width:50px; overflow: hidden; /* css-3 */
 white-space: -moz-pre-wrap; 
 white-space: -pre-wrap; 
 white-space: -o-pre-wrap; 
 word-wrap: break-word; ']
            ,
            ],                                    
    
            
            
          

        ],
    ]); ?>


</div>
<style>
.container{
    width: 99%
}
</style>