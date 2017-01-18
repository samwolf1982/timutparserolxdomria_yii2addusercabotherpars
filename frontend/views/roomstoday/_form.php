<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//use kartik\widgets\FileInput;

// or 'use kartikile\FileInput' if you have only installed yii2-widget-fileinput in isolation
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Roomstoday */
/* @var $form yii\widgets\ActiveForm */

use common\models\Roomstoday;
use yii\helpers\ArrayHelper;

use yii\web\JqueryAsset;


?>

<div class="roomstoday-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'site_id')->textInput() ?>


    
       <?php
           if (empty($model->site_id) ) {
               echo $form->field($model, 'site_id')->textInput(['readonly' => true, 'value' => 999]); 
           }else{
             echo  $form->field($model, 'site_id')->textInput();
           }

       ?>
   


    <?= $form->field($model, 'shortdistrict')->textInput(['maxlength' => true]) ?>


     <?php 
           if (empty($model->phone) ) {
               echo $form->field($model, 'phone')->textInput(['maxlength' => true,'title' => 'Номера телефонов разделять "|"   на пример: 38999999999|3809999999','placeholder'=>'38999999999|3809999999']);
           }else{
             echo  $form->field($model, 'phone')->textInput();
           }
     ?>
   

    <?= $form->field($model, 'price')->textInput() ?>



    
<?php
     if (empty($model->currency) ) {
               echo $form->field($model, 'currency')->dropDownList([
    'грн' => 'грн',
    '$' => '$']);
           }else{
             echo  $form->field($model, 'currency')->textInput();
           }

?>


    <?= $form->field($model, 'price_m')->textInput() ?>

    <?= $form->field($model, 'count_rooms')->textInput() ?>

    <?= $form->field($model, 'square')->textInput() ?>

    <?= $form->field($model, 'floor')->textInput() ?>

    <?= $form->field($model, 'floors')->textInput() ?>

      <?= $form->field($model, 'sqare_total')->textInput() ?>
      <?= $form->field($model, 'sqare_live')->textInput() ?>
      <?= $form->field($model, 'sqare_kitchen')->textInput() ?>

        


<?php
     if (empty($model->type) ) {
               echo $form->field($model, 'type')->dropDownList([
    'Вторичный рынок ' => 'Вторичный рынок ',
    'Новостройки' => 'Новостройки',
    'Не определено' => 'Не определено',]);
           }else{
             echo  $form->field($model, 'type')->textInput();
           }

?>

      


    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>



<?php
     if (empty($model->state) ) {
               echo $form->field($model, 'state')->textInput(['readonly' => true, 'value' => 'Создан']);
           }else{
             echo  $form->field($model, 'state')->textInput();
           }

?>



<?php

           if (empty($model->material) ) {
              $db=Roomstoday::getDb();


   $material = $db->cache(function ($db) {
    return ArrayHelper::map( Roomstoday::find()->select('material')->orderBy('material')->asArray()->all(), 'material', 'material');  
});


   echo $form->field($model, 'material')->dropDownList($material);



           }else{
             echo  $form->field($model, 'material')->textInput();
           }
     




?>
    <?php //$form->field($model, 'material')->textInput(['maxlength' => true]) ?>



<?php
     if (empty($model->own_or_business) ) {
               echo $form->field($model, 'own_or_business')->dropDownList([
    'Частного лица' => 'Частного лица',
    'Бизнес' => 'Бизнес',
    'Не определено' => 'Не определено',]);
           }else{
             echo  $form->field($model, 'own_or_business')->textInput();
           }

?>



    <?php //$form->field($model, 'own_or_business')->textInput(['maxlength' => true]) ?>

       

       <?php
           if ($model->manager=='********' || empty($model->manager) ) {
               echo $form->field($model, 'manager')->textInput(['readonly' => true, 'value' => Yii::$app->user->identity->username]); 
           }else{
             echo  $form->field($model, 'manager')->textInput(['readonly' => true, 'value' => $model->manager]); 
           }

       ?>
   

 

    <?= $form->field($model, 'coment')->textInput(['maxlength' => true]) ?>



 
    <?= $form->field($model, 'url')->textarea(['readonly' => true,'rows' => 6]) ?>

    <?= $form->field($model, 'site')->textInput(['readonly' => true,'maxlength' => true]) ?>


   <?php
   // Usage with ActiveForm and model

$img_arr=json_decode($model->img,true);
$keys=array_keys($img_arr);
foreach ($keys as $k => $v) {
 $arr_captions[]=['caption'=>$k.'.jpg','size'=>500];
}

//Yii->trace

//$this->registerJsFile('@app/assets/js/upload.js');

?>
<label class="control-label">Planets and Satellites</label>
<input id="input-24" name="img[]" type="file" multiple class="file-loading">
<?php


$img_arr_str="'";
$img_arr_str.=implode($img_arr,"','");
 $img_arr_str.="'";
 $img_arr_keys_str_n=range(0, count($img_arr)-1);
 $img_arr_keys_str=implode($img_arr_keys_str_n,"},{ key:");
 $img_arr_keys_str_r="{ key:".$img_arr_keys_str."}";

$del_url=Url::toRoute('roomstoday/delfileinput');
Yii::trace($del_url);
$jsss=<<<EOT

    $("#input-24").fileinput({
        initialPreview: [
            $img_arr_str
        ],
        initialPreviewAsData: true,
        initialPreviewConfig: [
             $img_arr_keys_str_r
        ],
        deleteUrl: "$del_url",
        overwriteInitial: false,
        maxFileSize: 1000,
        initialCaption: "Список фото",
        allowedFileTypes: ["image", "video"],
        maxFilePreviewSize: 50240,
         uploadUrl: "http://localhost3/file-upload-single/1", // server upload action
    uploadAsync: true,

    });


    $('#input-24').on('filedeleted', function(event, key) {
      //$('#roomstoday-img').text();

     var arr=  jQuery.parseJSON( $('#roomstoday-img').text() );
         

        console.log(event);
      //  delete arr[key];
arr.splice(key, 1);

console.log('len = ' + arr.length);
           // if(arr.length==0){
              $('#roomstoday-img').text();
            //}else{
                $('#roomstoday-img').text(  JSON.stringify(arr));
              //    }
    console.log('zzKey = ' + key);
});

EOT;


$this->registerJs($jsss
  ,$this::POS_READY
);



?>
<?php


// echo '<label class="control-label">Add Attachments</label>';
// echo FileInput::widget([
//     'model' => $model,
//     'attribute' => 'img',
//     'options' => ['multiple' => true]
// ]);
// echo $form->field($model, 'img')->widget(FileInput::classname(), [
//     'options' => ['accept' => 'image/*'],
// ]);

// echo FileInput::widget([
//     'name' => 'attachment_48[]',
//     'options'=>[
//         'multiple'=>true,
//         'id' => 'my-file-input-0',
        
//     ],
//     'pluginOptions' => [
//         'uploadUrl' => Url::to(['/site/file-upload']),
  
//         ' overwriteInitial'=> false,
//          'initialPreviewFileType'=> 'image',
//         'initialPreview'=>$img_arr
//         ,'append' => true,
//         'maxFileCount' => 10,
//         'initialPreviewAsData'=>true,

//     ]
// ]);

// Display an initial preview of files with caption 
// (useful in UPDATE scenarios). Set overwrite `initialPreview`
// to `false` to append uploaded images to the initial preview.
// echo FileInput::widget([
//     'name' => 'attachment_49[]',
//     'options'=>[
//         'multiple'=>true
//     ],
//     'initialPreview'=>false,
//     'pluginOptions' => [
//         'initialPreview'=>[
//             "http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg",
//             "http://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Earth_Eastern_Hemisphere.jpg/600px-Earth_Eastern_Hemisphere.jpg"
//         ],
//         'initialPreviewAsData'=>true,
//         'initialCaption'=>"The Moon and the Earth",
//         'initialPreviewConfig' => [
//             ['caption' => 'Moon.jpg', 'size' => '873727'],
//             ['caption' => 'Earth.jpg', 'size' => '1287883'],
//         ],
//         'overwriteInitial'=>false,
//         'maxFileSize'=>2800
//     ]
// ]);
// echo FileInput::widget([
//     'name' => 'url[]',
//     'options'=>[
//         'multiple'=>true
//     ],
//     'pluginOptions' => [
       
//       'initialPreview'=>$img_arr,
//         'initialPreviewAsData'=>true,
//           'initialPreviewConfig' => $arr_captions,
//         'initialCaption'=>"The Moon and the Earth",
       
//         'overwriteInitial'=>true,
//         'maxFileSize'=>2800
//     ]
// ]);


?>
    <?=  $form->field($model, 'img')->textarea(['rows' => 6]) ?>

      <?php
           if ( empty($model->date) ) {
               echo $form->field($model, 'date')->textInput(['readonly' => true, 'value' => date("Y-m-d H:i:s")]); 
           }else{
             echo  $form->field($model, 'date')->textInput(['readonly' => true, 'value' => $model->date]); 
           }

       ?>


    <?// $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
   // 'dateFormat' => 'yyyy-MM-dd',
//])
 ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
