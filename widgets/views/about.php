<section class=about>
    <div class=container>
        <div class=row>
            <div class="col-md-6">
                <?php if($about->type == 1):?>
                <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" width="100%" height="100%">
                    <source src="<?= Yii::$app->request->baseUrl.$about->media;?>" type="video/mp4">
                </video>
                <?php elseif($about->type == 0):?>
                    <img src="<?= Yii::$app->request->baseUrl.$about->media;?>" class="img-responsive">
                <?php endif;?>
            </div>
            <div class="col-md-6">
                <h2 class="heading"><?= \app\components\DefaultComponent::name($about->title);?></h2>
                <p><?= \app\components\DefaultComponent::name($about->description);?></p>
            </div>
        </div>
    </div>
</section>