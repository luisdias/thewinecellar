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
<div class="new-button"><?php echo $this->Html->link(__('New Cellar'), array('action' => 'add')); ?></div>
<div class="cellars index">
	<h2><?php echo __('Cellars');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('cellar_name');?></th>
			<th><?php echo $this->Paginator->sort('street');?></th>
			<th><?php echo $this->Paginator->sort('block');?></th>
			<th><?php echo $this->Paginator->sort('apt');?></th>
			<th><?php echo $this->Paginator->sort('zip');?></th>
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('state');?></th>
			<th><?php echo $this->Paginator->sort('country');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($cellars as $cellar): ?>
	<tr>
		<td><?php echo h($cellar['Cellar']['cellar_name']); ?>&nbsp;</td>
		<td><?php echo h($cellar['Cellar']['street']); ?>&nbsp;</td>
		<td><?php echo h($cellar['Cellar']['block']); ?>&nbsp;</td>
		<td><?php echo h($cellar['Cellar']['apt']); ?>&nbsp;</td>
		<td><?php echo h($cellar['Cellar']['zip']); ?>&nbsp;</td>
		<td><?php echo h($cellar['Cellar']['city']); ?>&nbsp;</td>
		<td><?php echo h($cellar['Cellar']['state']); ?>&nbsp;</td>
		<td><?php echo h($cellar['Cellar']['country']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image('view.gif', array('alt' => __('View'),'title' => __('View'),)), array('action' => 'view', $cellar['Cellar']['id']),array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('edit.gif', array('alt' => __('Edit'),'title' => __('Edit'))), array('action' => 'edit', $cellar['Cellar']['id']),array('escape' => false)); ?>
			<?php echo $this->Form->postLink($this->Html->image('delete.gif', array('alt' => __('Delete'),'title' => __('Delete'))), array('action' => 'delete', $cellar['Cellar']['id']),array('escape' => false), __('Are you sure you want to delete # %s?', $cellar['Cellar']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
        <?php echo $this->element('paginator'); ?>
</div>
