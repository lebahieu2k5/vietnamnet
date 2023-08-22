<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Chuyenkhoa */
?>
<div class="chuyenkhoa-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'image:ntext',
            'job',
            'content:ntext',
            'ord',
            'active',
            'lang_id',
        ],
    ]) ?>

</div>
