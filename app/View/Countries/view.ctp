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
<div class="countries view">
<h2><?php  echo __('Country');?></h2>
	<dl>
		<dt><?php echo __('Country Name'); ?></dt>
		<dd>
			<?php echo h($country['Country']['country_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country Code'); ?></dt>
		<dd>
			<?php echo h($country['Country']['country_code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Producers');?></h3>
	<?php if (!empty($country['Producer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Producer Name'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($country['Producer'] as $producer): ?>
		<tr>
			<td><?php echo $producer['producer_name'];?></td>
			<td class="actions">
				<?php echo $this->Html->link($this->Html->image('view.gif', array('alt' => __('View'),'title' => __('View'),)), array('controller' => 'producers', 'action' => 'view', $producer['id']),array('escape' => false)); ?>
				<?php echo $this->Html->link($this->Html->image('edit.gif', array('alt' => __('Edit'),'title' => __('Edit'))), array('controller' => 'producers', 'action' => 'edit', $producer['id']),array('escape' => false)); ?>
				<?php echo $this->Form->postLink($this->Html->image('delete.gif', array('alt' => __('Delete'),'title' => __('Delete'))), array('controller' => 'producers', 'action' => 'delete', $producer['id']),array('escape' => false), __('Are you sure you want to delete # %s?', $producer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
<div class="new-button"><?php echo $this->Html->link(__('New Producer'), array('controller' => 'producers', 'action' => 'add'));?></div>
</div>
<div class="related">
	<h3><?php echo __('Related Regions');?></h3>
	<?php if (!empty($country['Region'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Region Name'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($country['Region'] as $region): ?>
		<tr>
			<td><?php echo $region['region_name'];?></td>
			<td class="actions">
				<?php echo $this->Html->link($this->Html->image('view.gif', array('alt' => __('View'),'title' => __('View'),)), array('controller' => 'regions', 'action' => 'view', $region['id']),array('escape' => false)); ?>
				<?php echo $this->Html->link($this->Html->image('edit.gif', array('alt' => __('Edit'),'title' => __('Edit'))), array('controller' => 'regions', 'action' => 'edit', $region['id']),array('escape' => false)); ?>
				<?php echo $this->Form->postLink($this->Html->image('delete.gif', array('alt' => __('Delete'),'title' => __('Delete'))), array('controller' => 'regions', 'action' => 'delete', $region['id']),array('escape' => false), __('Are you sure you want to delete # %s?', $region['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
<div class="new-button"><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add'));?></div>
</div>
<?php echo $this->element('related_wines',array('currentModel' => $country)) ; ?>