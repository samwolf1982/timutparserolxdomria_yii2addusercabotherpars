<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OwnsaveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ownsaves';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ownsave-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ownsave', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'site_id',
            'shortdistrict',
            'phone',
            'price',
            // 'currency',
            // 'price_m',
            // 'count_rooms',
            // 'square',
            // 'floor',
            // 'floors',
            // 'type',
            // 'district',
            // 'street',
            // 'street2',
            // 'description:ntext',
            // 'state',
            // 'material',
            // 'own_or_business',
            // 'manager',
            // 'coment',
            // 'url:ntext',
            // 'site',
            // 'img:ntext',
            // 'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
