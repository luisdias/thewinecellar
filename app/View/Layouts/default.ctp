<?php
/**
    This file is part of TWC - The Wine Cellar Application.

    TWC - The Wine Cellar is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    TWC - The Wine Cellar is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with TWC - The Wine Cellar.  If not, see <http://www.gnu.org/licenses/>.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<meta name="robots" content="index, follow" />
<meta name="revisit-after" content="21 days" />
<meta name="author" content="" />
<meta name="copyright" content="" />
<meta name="rating" content="Global" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="Description" content="" />
<meta name="Keywords" content="" />
<meta name="abstract" content="" />
<?php echo $this->Html->charset(); ?>
<title>
        <?php echo __('The wine cellar') ?>:
        <?php echo $title_for_layout; ?>
</title>
<?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('skin'); // carousel
        echo $this->Html->css('tipsy');
        echo $this->Html->css('jx.bar');
        echo $this->Html->css('jx.stylesheet');
        echo $this->Html->css('jquery.ui.stars');
        echo $this->Html->css('layout');
        
        echo $this->Html->script(array('jquery-1.7.1.min.js'));       
        echo $this->Html->script(array('jquery-ui-1.8.17.custom.min.js'));                
        echo $this->Html->script(array('jquery.tipsy.js'));                
        echo $this->Html->script(array('jquery.jixedbar.min.js'));
        echo $this->Html->script(array('jquery.jcarousel.min.js'));
        echo $this->Html->script(array('jquery.ui.stars.js'));
        echo $this->Html->script(array('default.js'));

        echo $scripts_for_layout;
?>
<script type="text/javascript">
    baseHref = "<?php echo Router::url('/',true); ?>";
</script>
</head>

<body id="home">

<div id="main-wrapper">
	<div id="header">
		<div id="title"><a href="#"><?php echo 'The' ?><br /><span><?php echo 'Wine cellar' ?></span></a></div>
		<div id="navigation">
		<ul>
                    <li><?php echo $this->Html->link(__('Home', true), array('plugin'=>null, 'controller' => 'pages', 'action' => 'home')); ?></li>
                    <li><?php echo $this->Html->link(__('Cellars', true), array('plugin'=>null, 'controller' => 'cellars', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link(__('Cabinets', true), array('plugin'=>null, 'controller' => 'cabinets', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link(__('Storages', true), array('plugin'=>null, 'controller' => 'storages', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link(__('Wines', true), array('plugin'=>null, 'controller' => 'wines', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link(__('Reports', true), array('plugin'=>'report_manager', 'controller' => null, 'action' => 'reports')); ?></li>
                    <li><?php echo $this->Html->link(__('Logout', true), array('plugin'=>null, 'controller' => 'members', 'action' => 'logout'), array('class' => 'no-divide')); ?></li>
                </ul>
                </div>
	</div>
	
	<div id="content-wrapper">		
		<div id="content">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $content_for_layout; ?>  
                </div>
	  
		<div class="clear"></div>
	</div>
    <div id="bottom-navigation">
            <?php echo $this->Html->link(__('Countries', true), array('plugin'=>null, 'controller' => 'countries', 'action' => 'index')); ?> |         
            <?php echo $this->Html->link(__('Producers', true), array('plugin'=>null, 'controller' => 'producers', 'action' => 'index')); ?> |             
            <?php echo $this->Html->link(__('Regions', true), array('plugin'=>null, 'controller' => 'regions', 'action' => 'index')); ?> | 
            <?php echo $this->Html->link(__('Wine types', true), array('plugin'=>null, 'controller' => 'winetypes', 'action' => 'index')); ?> | 
            <?php echo $this->Html->link(__('Grape types', true), array('plugin'=>null, 'controller' => 'grapetypes', 'action' => 'index')); ?> | 
            <?php echo $this->Html->link(__('Members', true), array('plugin'=>null, 'controller' => 'members', 'action' => 'index')); ?>
    </div>
	<div id="content-bottom"></div>
</div>
<div id="footer">
    <div class="footer-info">&copy; <a href="http://www.smartbyte.com.br" title="Web Development" target="_blank"><strong>Web Development</strong></a> by Smartbyte</div>
    <div class="footer-info">&copy; <a href="http://www.flipsidedigital.net" title="Web Design" target="_blank"><strong>Web Design</strong></a> by Flipside Digital</div>
    <span id="english" class="language"></span>
    <span id="portuguese" class="language"></span>
    <span id="spanish" class="language"></span>
    <span id="french" class="language"></span>
    <span id="italian" class="language"></span>
</div>
<?php echo $this->element('sql_dump'); ?>    
</body>
</html>