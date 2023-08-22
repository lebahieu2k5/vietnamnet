<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
\johnitvn\ajaxcrud\CrudAsset::register($this);

$this->title = 'Bài viết';
$this->params['breadcrumbs'][] = ['name' => 'Thêm mới bài viết', 'link' => 'javascript:void(0)'];

?>
<div class="page-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="form-group">

        <?php if (!Yii::$app->request->isAjax) { ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Lưu lại' : 'Cập nhật', ['id' => 'btn-luu', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        <?php } ?>
    </div>

    <div class="content-form">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12">
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-xs-3">
                        <?= $form->field($model, 'ord')->textInput() ?>
                    </div>

                    <div class="col-xs-3">
                        <div class="home-check">
                            <?= $form->field($model, 'active')->checkbox() ?>
                            <em>Chọn nếu hiển thị mặc định</em>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="home-check">
                            <?= $form->field($model, 'check')->checkbox() ?>
                            <em>Chọn nếu hiển thị ngoài giao diện trang chủ</em>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <?= $form->field($model, 'content')->textarea(['id' => 'noidung']) ?>
                    </div>
                    <div class="col-xs-12">
                        <?= $form->field($model, 'brief')->textarea(['id' => 'tomtat']) ?>
                    </div>
                    <div class="col-xs-12 form-group">
                        <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Hình ảnh đại diện</span>','',['class'=>'form-label'])?>
                        <?php echo Html::fileInput('fileupload','',['required'=>true,'class'=>'form-control','onChange'=>"uploadImage(this)", 'extensions' => 'png, jpg',
                            'data-target'=>"#aImgShow",
                        ]);?>
                        <div id="img-view">

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xs-12">
                <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12">
                <?= $form->field($model, 'seo_desc')->textarea(['rows' => 6]) ?>
            </div>
            <div class="col-xs-12">
                <?= $form->field($model, 'seo_keyword')->textarea(['rows' => 6]) ?>
            </div>

        </div>


    </div>
</div>

<?php ActiveForm::end(); ?>
</div>

<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$now = getdate();
$nowfullstring = $now["mday"]."/".$now["mon"]."/".$now["year"];
?>
<script>
    $(document).ready(function () {
        $('#tag').tagsInput({
            width: '100%',
            'onAddTag': function () {
                //alert(1);
            }
        })
        CKEDITOR.replace('noidung', {
            language: 'vi',
            filebrowserBrowseUrl:'/2595fcc932fcbc933591f65b0927f6ad/responsive_filemanager/filemanager/dialog.php?type=2&akey=<?=sha1("Karion3e0d56c94e15c78d3fe012bc33aba5252020".sha1($nowfullstring))?>&editor=ckeditor&fldr=',
            filebrowserUploadUrl:'/2595fcc932fcbc933591f65b0927f6ad/responsive_filemanager/filemanager/dialog.php?type=2&akey=<?=sha1("Karion3e0d56c94e15c78d3fe012bc33aba5252020" . sha1($nowfullstring))?>&editor=ckeditor&fldr=',
            filebrowserImageBrowseUrl :'/2595fcc932fcbc933591f65b0927f6ad/responsive_filemanager/filemanager/dialog.php?type=1&akey=<?=sha1("Karion3e0d56c94e15c78d3fe012bc33aba5252020" . sha1($nowfullstring))?>&editor=ckeditor&fldr='
        })
        CKEDITOR.replace('tomtat', {
            language: 'vi',
            filebrowserBrowseUrl: '/2595fcc932fcbc933591f65b0927f6ad/responsive_filemanager/filemanager/dialog.php?type=2&akey=<?=sha1("Karion3e0d56c94e15c78d3fe012bc33aba5252020" . sha1($nowfullstring))?>&editor=ckeditor&fldr=',
            filebrowserUploadUrl: '/2595fcc932fcbc933591f65b0927f6ad/responsive_filemanager/filemanager/dialog.php?type=2&akey=<?=sha1("Karion3e0d56c94e15c78d3fe012bc33aba5252020" . sha1($nowfullstring))?>&editor=ckeditor&fldr=',
            filebrowserImageBrowseUrl: '/2595fcc932fcbc933591f65b0927f6ad/responsive_filemanager/filemanager/dialog.php?type=1&akey=<?=sha1("Karion3e0d56c94e15c78d3fe012bc33aba5252020" . sha1($nowfullstring))?>&editor=ckeditor&fldr='
        })

    })

</script>