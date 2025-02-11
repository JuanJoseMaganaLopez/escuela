<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reticula */

$this->title = Yii::t('app', 'Actualizar Retícula: {name}', [
    'name' => $model->ret_carrera,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Retículas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ret_id, 'url' => ['view', 'ret_id' => $model->ret_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="reticula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
