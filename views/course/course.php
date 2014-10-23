<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use app\models\Group;
use yii\helpers\ArrayHelper;
Yii::$app->user->returnUrl = Yii::$app->request->getAbsoluteUrl();?>
<div class="wrapper2 clearfix">
<?php echo Html::tag('div','Курсы', ['id'=>'page_name']);?>
<div style="width: 26%; float:left;">
<?=
    $this->render('..\student\menu_left', ['current' => 'subscriptions', 'model' => $stModel]);
?>
</div>

<div style="position:relative; width: 73%; float:left;">

<?php 

	echo Html::beginTag('div', ['class' => 'panel panel-default']);
	echo Html::tag('div', Html::tag('span', 'Курс: ' . $model->name, ['class' => 'panel-title', 'style' => 'float:left; width:80%;']).
	    	Html::tag('span', 'Лектор: '.$model->getIdLecturer()->one()->name, ['style' => 'float:right; width:20%;']), 
	    	['class' => 'panel-heading clearfix']);	
	echo Html::beginTag('div', ['class' => 'panel-body']);
	echo Html::tag('div', Html::tag('div', $model->description));
	echo Html::tag('br');
	echo Html::tag('div', 'Лекции: ');
	echo Html::endTag('div');	
    for($i = 0; $i < $model->getLessons()->count(); $i++)
    {
	    echo Html::beginTag('div', ['class' => 'panel panel-default', 'style' => 'margin:10px;' ]); 
	    echo Html::tag('div', Html::tag('span', $model->getLessons()->all()[$i]->name, ['class' => 'panel-title', 'style' => 'float:left; width:80%;'] ), ['class' => 'panel-heading clearfix' ]);
	    echo Html::beginTag('div', ['class' => 'panel-body']);
	    echo Html::tag('div', mb_substr($model->getLessons()->all()[$i]->description, 0, 501).'...');
	    echo Html::tag('br');
	    echo Html::a('Просмотреть', '../lesson/view-lesson?id='.$model->getLessons()->all()[$i]->id,['class' => 'btn btn-x btn-primary', 'style' => 'float: right;']);
	    echo Html::endTag('div'); 
	    echo Html::endTag('div'); 
	}
	echo Html::endTag('div'); 
?>
</div>
</div>