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
<div class="cellars view">
<h2><?php  echo __('Cellar');?></h2>
	<dl>
		<dt><?php echo __('Cellar Name'); ?></dt>
		<dd>
			<?php echo h($cellar['Cellar']['cellar_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($cellar['Cellar']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Block'); ?></dt>
		<dd>
			<?php echo h($cellar['Cellar']['block']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apt'); ?></dt>
		<dd>
			<?php echo h($cellar['Cellar']['apt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($cellar['Cellar']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($cellar['Cellar']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($cellar['Cellar']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($cellar['Cellar']['country']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Cabinets');?></h3>
	<?php if (!empty($cellar['Cabinet'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Cabinet Code'); ?></th>
		<th><?php echo __('Lines'); ?></th>
		<th><?php echo __('Columns'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($cellar['Cabinet'] as $cabinet): ?>
		<tr>
			<td><?php echo $cabinet['cabinet_code'];?></td>
			<td><?php echo $cabinet['lines'];?></td>
			<td><?php echo $cabinet['columns'];?></td>
			<td class="actions">				
                                <?php echo $this->Html->link($this->Html->image('view.gif', array('alt' => __('View'),'title' => __('View'),)), array('controller' => 'cabinets', 'action' => 'view', $cabinet['id']),array('escape' => false)); ?>				
                                <?php echo $this->Html->link($this->Html->image('edit.gif', array('alt' => __('Edit'),'title' => __('Edit'))), array('controller' => 'cabinets', 'action' => 'edit', $cabinet['id']),array('escape' => false)); ?>
				<?php echo $this->Form->postLink($this->Html->image('delete.gif', array('alt' => __('Delete'),'title' => __('Delete'))), array('controller' => 'cabinets', 'action' => 'delete', $cabinet['id']),array('escape' => false), __('Are you sure you want to delete # %s?', $cabinet['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
<div class="new-button"><?php echo $this->Html->link(__('New Cabinet'), array('controller' => 'cabinets', 'action' => 'add'));?></div>
</div>
