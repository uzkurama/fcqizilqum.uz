<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="<?= Yii::$app->request->baseUrl.'/admin_assets/img/sidebar-5.jpg'?>">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?= Url::to(['/admin/default/index']);?>" class="simple-text">
                    Admin Panel
                </a>
            </div>

            <?= Nav::widget([
                'options' => ['class' => 'nav'],
                'items' => [
                    ['label' => 'Bosh sahifa', 'url' => ['/admin/default/index']],
                    ['label' => 'Yangiliklar', 'url' => ['/admin/news/index']],
                    ['label' => 'Contact', 'url' => ['/admin/contact/view', 'id' => 1]],
                    [
                        'label' => 'Yangiliklar',
                        'items' => [
                                ['label' => 'Tillar', 'url' => ['/admin/language/index']],
                                ['label' => 'Asosiy so\'zlar', 'url' => ['/admin/source-message/index']],
                                ['label' => 'Tarjimalar', 'url' => ['/admin/message/index']],
                        ],
                    ],
                    Yii::$app->user->isGuest ? (
                        ['label' => 'Login', 'url' => ['/site/login']]
                    ) : ['label' => 'Logout', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']]
                ],
            ]);?>
            <?php if(Yii::$app->user->identity->username == 'kurama') echo GhostMenu::widget([
                'encodeLabels'=>false,
                'activateParents'=>true,
                'items' => [
                    [
                        'label' => 'Backend routes',
                        'items'=>UserManagementModule::menuItems()
                    ],
                    [
                        'label' => 'Frontend routes',
                        'items'=>[
                            ['label'=>'Login', 'url'=>['/user-management/auth/login']],
                            ['label'=>'Logout', 'url'=>['/user-management/auth/logout']],
                            ['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
                            ['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
                            ['label'=>'Password recovery', 'url'=>['/user-management/auth/password-recovery']],
                            ['label'=>'E-mail confirmation', 'url'=>['/user-management/auth/confirm-email']],
                        ],
                    ],
                ],
            ]);
            ?>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <?= \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]) ?>
                <?= Alert::widget() ?>
                <?= $content;?>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                <?= 'Tez yordam: (91) 332-25-45';?>
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> Open Code LLC
                </p>
            </div>
        </footer>

    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
