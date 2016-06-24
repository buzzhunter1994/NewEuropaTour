<?php
$this->pageTitle='Відгуки';
$this->breadcrumbs = array(
    Yii::t('yii','Main')=> Yii::app()->homeUrl,
    'Відгуки',
);
?>
<div class="container">
<?php if(Yii::app()->user->hasFlash('reviews')): ?>

    <div class="alert alert-success">
        <?php echo Yii::app()->user->getFlash('reviews'); ?>
    </div>
<?php else: ?>
    <div class="testimonialsPage">
        <div class="testimForm">
                <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                    'id'=>'review-form',
                    'type'=>'horizontal',
                    'enableClientValidation'=>false,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    ),
                )); ?>

                <?php echo $form->errorSummary($model); ?>
                <div class="row">
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        <div class="form">
                            <?php echo $form->textFieldRow($model,'name'); ?>
                            <?php echo $form->textFieldRow($model,'city'); ?>
                            <?php echo $form->textFieldRow($model,'email'); ?>
                            <label></label>
                            <div class="control-group">
                                <div class="controls">
                                    <?php $this->widget('CCaptcha',array('clickableImage'=>true)) ?>
                                </div>
                            </div>
                            <?php echo $form->textFieldRow($model,'verifyCode'); ?>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-7 col-lg-7">
                        <div class="form">
                            <?php echo $form->textAreaRow($model,'message',array('rows'=>5, 'id'=>'review', 'hint'=>'<p>Будь ласка, опишіть нам свою поїздку: Куди і коли ви подорожували з нашою компанією, що вам сподобалося в поїздці, які пропозиції щодо поліпшення сервісу ви можете предложіть. Дякуємо!</p>')); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <button class="button button-rounded button-default pull-right" type="submit">Надіслати відгук</button>
                    </div>
                </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
<?php endif; ?>
    <div class="testimList">
        <?php
        $this->widget('ext.bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_view',
            'template'=>"{items}\n{pager}<br/>",
            'pager' => array(
                'firstPageLabel'=>'<<',
                'prevPageLabel'=>'<span><</span>',
                'nextPageLabel'=>'<span>></span>',
                'lastPageLabel'=>'>>',
                'nextPageCssClass'=>'_next',
                'previousPageCssClass'=>'_prev',
                'maxButtonCount'=>'10',
                'header'=> false,
            ),
            'ajaxUpdate'=>false,
        ));
        ?>
    </div>
</div>