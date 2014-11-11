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


<div class="wrapper2 clearfix" style="overflow:auto;"><div id="page_name">Registration</div>
     <div class="site-login" style='margin:70px 70px 0px 0px; float:right; width:49%;'>
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

          
        <?=Html::label('Кем Вы хотите быть?','',['style'=>'float:left'])?>
         <input id="lecturer_role" type="radio" name="RegistrationForm[role]"  value="lecturer" onclick="show('lecturer', 'student')"/> <?=Html::label('Лектор')?>
            <input id="student_role" type="radio" name="RegistrationForm[role]" value="student" onclick="show('student', 'lecturer')"/>  <?=Html::label('Студент')?>


        <div id="lecturer" style="display:none;">

                     <?= $form->field($model, 'degree')->textInput()?>

                      <?= $form->field($model, 'department')->dropDownList(ArrayHelper::map(Department::find()->all(), 'id', 'name'))->label('Кафедра') ?>

        </div>
        <div id="student" style="display:none;">

                 <?= $form->field($model, 'group')->dropDownList(ArrayHelper::map(Group::find()->all(), 'id', 'name'))?>

        </div>

        <br><br>

        <div class="form-group ">
          <div class="col-lg-12">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary btn-block btn-lg ', 'name' => 'Submit']) ?>
          </div>
        </div>
        <?php ActiveForm::end(); ?>
        <br><br>
    </div>
    <div class="clearfix" style="float:left; margin:70px 0px 0px 70px; width:49%;">
      <div >
        <center><?=Html::img('../images/placeit.jpg',['style'=>'width: 200px; height: 150px;   src: images/placeit.jpg;']);?></center><br></br>
        
        <p class="parag">Рады приветствовать вас на нашем ресурсе!</p> <p class="parag">Данный сайт предназначен для студентов и преподавателей 
        для ведения курса, контроля знаний и распространения материалов. После прохождения регистрации Ваша 
        заявка будет отправлена на рассмотрение к администратору сайта. Письмо с подтверждением будет отправлено
        на e-mail, указанный при регистрации, поэтому указывайте действующий адрес электронной почты. После 
        подтверждения регистрации Вам станут доступны все функции сайта и Вы сможете с лёгкостью делиться своими
        знаниями или приобретать новые.</p>
         
      </div>
      <br>
    </div>
</div>
<script>
$(document).ready(function(){
$('#<?=$model->role?>_role').click();
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