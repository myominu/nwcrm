<?php
use Cake\Utility\Hash;
global $array;
  //print_r($array);
require ROOT . DS . APP_DIR . DS . 'View' . DS . 'arrays' .DS . 'settings_admin_menu.php';

?>
<?php
  if (!empty($array['settings_admin_menu'])) {
    $menu_array = Hash::mergeDiff($array['settings_admin_menu'], $array['common_admin_menu']);
  }
  else {
    $menu_array = $array['common_admin_menu'];
  }
  $url = strtolower($this->request->url);
  //$url = $this->request->url;
  //print_r(G::$array['settings_admin_menu']);
  //管理画面メニュー
  $MENU[] = '<ul class="nav navbar-nav">';
  foreach ($menu_array as $admin_menu) {
    //対象権限の場合のみ表示
    if (!empty($admin_menu['role']) && in_array($this->request->session()->read('Auth.User.role'), $admin_menu['role'])) {
      //linksが2つ以上だったらプルダウンSTART
      if (count($admin_menu['links']) > 1) {
        $active = '';
        foreach ($admin_menu['links'] as $link) {
          
          $path = strtolower($link['path']);
          
        
            
          //表示中のパスが子要素にある場合はCSSクラス追加
          if (strpos($url, substr($path, 1))!==false) {
            $active = ' active';
          }
        }
        $MENU[] = " <li class=\"dropdown{$active}\">";
        $MENU[] = '   <a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $admin_menu['title'] . '　<b class="caret"></b></a>';
        $MENU[] = '   <ul class="dropdown-menu">';
      }
      //リンク
      foreach ($admin_menu['links'] as $link) {
        if($link['path'] != '/Masters/2'){
            $path = strtolower($link['path']);
          }else{
            $path = $link['path'];
          } 
        //対象権限の場合のみ表示
        if (empty($link['role']) || in_array($this->request->session()->read('Auth.User.role'), $link['role'])) {
          if ($path == 'divider' || $path == 'nav-header') {
            $MENU[] = '     <li class="'.$path.'">'.$link['title'].'</li>';
          }
          else {
            //表示中のパスが一致した場合はCSSクラス追加
            $active_sub = (strpos($url, substr($path, 1))!==false) ? ' class="active"' : '';
            $MENU[] = "     <li{$active_sub}>" . $this->Html->link($link['title'], $path, $link['opt']) . '</li>';
          }
        }
      }
      //linksが2つ以上だったらプルダウンEND
      if (count($admin_menu['links']) > 1) {
        $MENU[] = '   </ul>';
        $MENU[] = ' </li>';
      }
    }
  }
  $MENU[] = '</ul>';
  
  //ログアウトボタン
  if ($this->request->session()->check('Auth.User.username')) {
    //$MENU[] = '<ul class="nav navbar-nav navbar-right"><li>';
    $MENU[] = $this->Html->link(' '.
        $this->request->session()->read('Auth.User.username') . ' Logout',
      '/users/logout',
      array(
        'class'=>'btn btn-default pull-right logout_btn glyphicon glyphicon-user',
        'confirm' => 'Are you confirm to logout ?',
        'icon'=>'user'
      )
    );
    //$MENU[] = '</li></ul>';
  }
  
  //追加情報(ユーザー情報を表示したりする)
  if (!empty($navbar_text)) {
    $MENU[] = $this->Html->div('extend-text', $navbar_text);
  }
?>
<nav class="navbar navbar-fixed-top navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php echo $this->Html->link('', '/', array('class'=>'navbar-brand glyphicon glyphicon-home', 'icon'=>'home')); ?> 
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php echo implode($MENU, "\n") ?> 


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>