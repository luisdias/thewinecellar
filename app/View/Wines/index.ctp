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
<div class="filter">
    <?php 
    echo $this->Form->create('Wine',array('url' => array_merge(array('action' => 'find'), $this->params['pass'])));
    echo $this->Form->input('country_id',array('empty'=>__('---Select---',true))); 
    echo '<div id="producers-select">';
    echo $this->Form->input('producer_id',array('empty'=>__('---Select---',true)));
    echo '</div>';
    echo '<div id="regions-select">';
    echo $this->Form->input('region_id',array('empty'=>__('---Select---',true)));
    echo '</div>';
    echo $this->Form->input('winetype_id',array('label'=>__('Wine type'),'empty'=>__('---Select---',true)));    
    echo $this->Form->input('grapetype_id',array('label'=>__('Grape type'),'empty'=>__('---Select---',true)));
    echo $this->Form->end(__('Filter'));
    ?>
</div>
<div class="filter">
    
</div>
<div class="new-button"><?php echo $this->Html->link(__('New Wine'), array('action' => 'add')); ?></div>
<div class="wines index">
	<h2><?php echo __('Wines');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('wine_name');?></th>
			<th><?php echo $this->Paginator->sort('vintage');?></th>
			<th><?php echo $this->Paginator->sort('country_id');?></th>
			<th><?php echo $this->Paginator->sort('producer_id');?></th>
			<th><?php echo $this->Paginator->sort('region_id');?></th>
			<th><?php echo $this->Paginator->sort('winetype_id',__('Wine type'));?></th>
			<th><?php echo $this->Paginator->sort('grapetype_id',__('Grape type'));?></th>
			<th><?php echo $this->Paginator->sort('picture');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($wines as $wine): ?>
	<tr>
		<td><?php echo h($wine['Wine']['wine_name']); ?>&nbsp;</td>
		<td><?php echo h($wine['Wine']['vintage']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($wine['Country']['country_name'], array('controller' => 'countries', 'action' => 'view', $wine['Country']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($wine['Producer']['producer_name'], array('controller' => 'producers', 'action' => 'view', $wine['Producer']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($wine['Region']['region_name'], array('controller' => 'regions', 'action' => 'view', $wine['Region']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($wine['Winetype']['winetype_name'], array('controller' => 'winetypes', 'action' => 'view', $wine['Winetype']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($wine['Grapetype']['grape_name'], array('controller' => 'grapetypes', 'action' => 'view', $wine['Grapetype']['id'])); ?>
		</td>
		<td><?php 
                if (!empty($wine['Wine']['picture'])) {
                    echo $this->Html->image(str_replace('img/','',h($wine['Wine']['picture'])),array('width'=>'50','height'=>'50'));
                } else {
                    echo $this->Html->image('wines/no_image.jpg',array('width'=>'50','height'=>'50'));
                }; 
                ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image('view.gif', array('alt' => __('View'),'title' => __('View'),)), array('action' => 'view', $wine['Wine']['id']),array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('edit.gif', array('alt' => __('Edit'),'title' => __('Edit'))), array('action' => 'edit', $wine['Wine']['id']),array('escape' => false)); ?>
			<?php echo $this->Form->postLink($this->Html->image('delete.gif', array('alt' => __('Delete'),'title' => __('Delete'))), array('action' => 'delete', $wine['Wine']['id']),array('escape' => false), __('Are you sure you want to delete # %s?', $wine['Wine']['id'])); ?>
                        <?php echo $this->Html->link($this->Html->image('image.gif', array('alt' => __('Picture'),'title' => __('Picture'))), array('action' => 'edit-picture', $wine['Wine']['id']),array('escape' => false)); ?>                    
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<?php echo $this->element('paginator'); ?>
</div>