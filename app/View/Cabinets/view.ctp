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
<div class="cabinets view">
<h2><?php  echo __('Cabinet');?></h2>
	<dl>
		<dt><?php echo __('Cabinet Code'); ?></dt>
		<dd>
			<?php echo h($cabinet['Cabinet']['cabinet_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lines'); ?></dt>
		<dd>
			<?php echo h($cabinet['Cabinet']['lines']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Columns'); ?></dt>
		<dd>
			<?php echo h($cabinet['Cabinet']['columns']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cellar'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cellars[$cabinet['Cellar']['id']], array('controller' => 'cellars', 'action' => 'view', $cabinet['Cellar']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Storages');?></h3>
	<?php if (!empty($cabinet['Storage'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Line Number'); ?></th>
		<th><?php echo __('Column Number'); ?></th>
		<th><?php echo __('Wine'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($cabinet['Storage'] as $storage): ?>
		<tr>
			<td><?php echo $storage['line_number'];?></td>
			<td><?php echo $storage['column_number'];?></td>
			<td><?php echo $wines[$storage['wine_id']];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
