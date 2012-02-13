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
<div class="storages form">
<?php echo $this->Form->create('Storage');?>
	<fieldset>
		<legend><?php echo __('Edit Storage'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('line_number');
		echo $this->Form->input('column_number');
		echo $this->Form->input('cabinet_id');
		echo $this->Form->input('wine_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Storage.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Storage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Storages'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Cabinets'), array('controller' => 'cabinets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cabinet'), array('controller' => 'cabinets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wines'), array('controller' => 'wines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wine'), array('controller' => 'wines', 'action' => 'add')); ?> </li>
	</ul>
</div>
