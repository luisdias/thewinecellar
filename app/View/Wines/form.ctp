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
<?php echo $this->Html->script('wines'); ?>
<div class="wines form">
<?php echo $this->Form->create('Wine');?>
	<fieldset>
		<legend><?php echo $theAction . ' ' . __('Wine'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('wine_name',array('size'=>'45','title'=>__('Enter the wine name',true)));
		echo $this->Form->input('vintage',array('size'=>'4','title'=>__('Enter the vintage year',true)));
		echo $this->Form->input('price',array('size'=>'6','title'=>__('Enter the price',true)));
                $options = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5');
                echo $this->Html->tag('div',
                        $this->Form->input('rating',array(
                            'options'=>$options,
                            'label'=>__('Rating')))
                     ,array('id'=>'stars-wrapper'));
                echo $this->Form->input('rating',array('type'=>'hidden'));                
		echo $this->Form->input('country_id',array('empty'=>__('---Select---'),'title'=>__('Select the country',true)));
                echo '<div id="producers-select">';
		echo $this->Form->input('producer_id',array('empty'=>__('---Select---'),'title'=>__('Select the producer',true)));
                echo '</div>';
                echo '<div id="regions-select">';
		echo $this->Form->input('region_id',array('empty'=>__('---Select---'),'title'=>__('Select the region',true)));
                echo '</div>';
		echo $this->Form->input('winetype_id',array('empty'=>__('---Select---'),'title'=>__('Select the wine type',true)));
		echo $this->Form->input('grapetype_id',array('empty'=>__('---Select---'),'title'=>__('Select the grape type',true)));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>