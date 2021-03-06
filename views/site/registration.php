<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Department;
use app\models\Group;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\RegistrationForm */

$this->title = 'Регистрация';
?>


<div class="wrapper2 clearfix" style="overflow:auto;"><div id="page_name">Регистрация</div>
     <div class="site-login">
     <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal '],
        'fieldConfig' => [
            'template' => "<div class=\"col-lg-12\" ><div style=\" float:left;\">{label}</div>\n</div><div class=\"col-lg-12\">{input}<div style=\" float:left;\">{error}</div></div>"
        ],
    ]); ?>
            <?= $form->field($model, 'name')->textInput()?>
            <?= $form->field($model, 'second_name')->textInput()?>
            <?= $form->field($model, 'email')->textInput()?>
            <?= $form->field($model, 'password')->passwordInput()?>
            <?= $form->field($model, 'confirmation')->passwordInput()?>

          
        <div><?=Html::label('Кем Вы хотите быть?','',['style'=>'float:left'])?><div style="float:none;clear:both;"></div></div>
        <div style="margin-bottom:10px; margin-top:5px;">
          <input id="student_role" type="radio" name="RegistrationForm[role]" value="student" onclick="show('student', 'lecturer')"/>  <?=Html::label('Студент')?>
          <input id="lecturer_role" type="radio" name="RegistrationForm[role]"  value="lecturer" onclick="show('lecturer', 'student')"/> <?=Html::label('Лектор')?>
        </div>

        <div id="lecturer" style="display:none;">

                     <?= $form->field($model, 'degree')->textInput()?>

                      <?= $form->field($model, 'department')->dropDownList(ArrayHelper::map(Department::find()->all(), 'id', 'name'))->label('Кафедра') ?>

        </div>
        <div id="student" style="display:none;">

                 <?= $form->field($model, 'group')->dropDownList(ArrayHelper::map(Group::find()->orderBy('name')->all(), 'id', 'name'))?>

        </div>

        <br>

        <div class="form-group ">
          <div class="col-lg-12">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary btn-block btn-lg ', 'name' => 'Submit']) ?>
          </div>
        </div>
        <?php ActiveForm::end(); ?>
        <br><br>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
if ('<?=$model->role?>'=='')
  $('#student_role').click();
$('#<?=$model->role?>_role').click();
$(document).ready(function(){
$('#lecturer_department').val('<?=$model->department?>');
$('#student_group').val('<?=$model->group?>');
    });

function show(id, id2)
{
    if (document.getElementById(id).style.display == 'none')
    {
        document.getElementById(id).style.display = 'block';
        document.getElementById(id2).style.display = 'none';
    }
}
</script>

<style>
.parag{
  text-align: justify !important;
  text-indent: 20px !important;
  font-weight: bold !important;
  font-size: 14px !important;
  color:#333 !important;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
}
</style>