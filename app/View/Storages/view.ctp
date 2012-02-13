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
<div class="storages view">
<h2><?php  echo __('Storage');?></h2>
	<dl>
		<dt><?php echo __('Line Number'); ?></dt>
		<dd>
			<?php echo h($storage['Storage']['line_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Column Number'); ?></dt>
		<dd>
			<?php echo h($storage['Storage']['column_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cabinet'); ?></dt>
		<dd>
			<?php echo $this->Html->link($storage['Cabinet']['id'], array('controller' => 'cabinets', 'action' => 'view', $storage['Cabinet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wine'); ?></dt>
		<dd>
			<?php echo $this->Html->link($storage['Wine']['id'], array('controller' => 'wines', 'action' => 'view', $storage['Wine']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>