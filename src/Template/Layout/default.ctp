<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'NW-CRM';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- bootstrap css -->
    <?= $this->Html->css('bootstrap.min.css') ?>

    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
   

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>   

    <?php if($this->request->session()->check('Auth.User')){?>
    <header>
        <div class="header-nav">

            <?= $this->element('navbar', ['recentExtendEndSalesCount'=>$recentExtendEndSalesCount]) ?>
        </div>     
    </header>
    <?php } ?>
    <div id="container" class="container-fluid">    
  
        <div class="row">
            <div class="page-header col-sm-12">
              <h1><small><?= $this->fetch('title') ?></small><div class="pull-right clearfix">
                <?= $this->fetch('actions') ?>
              </div></h1>

              
            </div>

        </div>        
        <div id="content">          
            
            <div class="row">
                <div class="large-12 col-sm-12">
                    <?= $this->Flash->render() ?>
                    <!-- add authorize message -->
                    <?= $this->Flash->render('auth') ?>
                </div>              

                <?= $this->fetch('content') ?>
            </div>
        </div>
        <footer>
        </footer>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- bootstrap js -->
    <?= $this->Html->script('bootstrap.min.js') ?>
    <!-- script bottom -->
    <?= $this->fetch('scriptBottom') ?>
</body>
</html>
