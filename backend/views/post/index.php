<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Poststatus;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Post'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
        	[
        		'attribute'=>'id', 
        		'contentOptions'=>['width'=>'30px']
            ],
            'title',
            'tags:ntext',
        	[
        		'attribute'=>'username',
        		'label'=>'作者',
        		'value'=>'author.username',
        	],
        	[
        		'attribute'=>'status',
        		'value'=>'status0.name',
        		'filter'=>Poststatus::find()
        		->select(['name','id'])
        		->orderBy('position')
        		->indexBy('id')
        		->column(),
        	],
            [
            	'attribute'=>'update_time',
                'format'=>['date','php:Y-m-d H:i:s'],
        	],
        	//'content:ntext',
            // 'create_time:datetime',
            // 'update_time:datetime',
            // 'author_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
