<?php

use Cake\Utility\Hash;
global $array;

require ROOT . DS . APP_DIR . DS . 'View' . DS . 'arrays' .DS . 'settings_admin_menu.php';
    $count = 0;
    
    $menu_array = Hash::mergeDiff($array['settings_admin_menu'], $array['common_admin_menu']);
    foreach ($menu_array as $key => $admin_menu) {
        if (is_array($admin_menu['role']) && in_array($this->request->session()->read('Auth.User.role'), $admin_menu['role'])) {
            $count++;
?>
    <div class="col-md-3">
        <div class="well">
            <h4><?php echo $admin_menu['title'] ?></h4>
            <?php
                foreach ($admin_menu['links'] as $link) {
                    if (empty($link['role']) || in_array($this->request->session()->read('Auth.User.role'), $link['role'])) {
                        if ($link['path'] == 'nav-header') {
                            echo "<h5>{$link['title']}</h3>";
                        }
                        elseif ($link['path'] == 'divider') {
                            echo '<hr />';
                        }
                        else {
                            echo $this->Html->link($link['title'], $link['path'], array_merge($link['opt'], array('class'=>'btn btn-primary btn-block mbottom')));
                        }
                    }
                }
            ?> 
        </div>
    </div>
<?php
            if ($count%4==0) echo '</div><div class="row">';
        }
    }
?> 
