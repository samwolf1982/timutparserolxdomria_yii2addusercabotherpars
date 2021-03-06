<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ownsave */

$this->title = 'Update Ownsave: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ownsaves', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ownsave-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
