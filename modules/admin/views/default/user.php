<?php

use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;

?>


<?php echo GhostMenu::widget([
    'encodeLabels'=>false,
    'activateParents'=>true,
    'items' => [
        [
            'label' => 'Frontend routes',
            'items'=>[
                ['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
            ],
        ],
    ],
]);
?>