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
<div class="related">
	<h3><?php echo __('Related Wines');?></h3>
	<?php if (!empty($currentModel['Wine'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Wine Name'); ?></th>
		<th><?php echo __('Vintage'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th><?php echo __('Producer'); ?></th>
		<th><?php echo __('Region'); ?></th>
		<th><?php echo __('Wine type'); ?></th>
		<th><?php echo __('Grape type'); ?></th>
		<th><?php echo __('Picture'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($currentModel['Wine'] as $wine): ?>
		<tr>
			<td><?php echo $wine['wine_name'];?></td>
			<td><?php echo $wine['vintage'];?></td>
			<td><?php echo $wine['price'];?></td>
			<td><?php echo $this->element('rating',array('rating'=>$wine['rating']));?></td>
			<td><?php echo $producers[$wine['producer_id']];?></td>
			<td><?php echo $regions[$wine['region_id']];?></td>
			<td><?php echo $winetypes[$wine['winetype_id']];?></td>
			<td><?php echo $grapetypes[$wine['grapetype_id']];?></td>
			<td>
                        <?php 
                        if (!empty($wine['picture']))
                            echo $this->Html->image(str_replace('img/', '', $wine['picture']), array('width'=>'50','height'=>'50'));
                        else
                            echo $this->Html->image('wines/no_image.jpg', array('width'=>'50','height'=>'50'));
                        ?></td>
			<td class="actions">
				<?php echo $this->Html->link($this->Html->image('view.gif', array('alt' => __('View'),'title' => __('View'),)), array('controller' => 'wines', 'action' => 'view', $wine['id']),array('escape' => false)); ?>
				<?php echo $this->Html->link($this->Html->image('edit.gif', array('alt' => __('Edit'),'title' => __('Edit'))), array('controller' => 'wines', 'action' => 'edit', $wine['id']),array('escape' => false)); ?>
				<?php echo $this->Form->postLink($this->Html->image('delete.gif', array('alt' => __('Delete'),'title' => __('Delete'))), array('controller' => 'wines', 'action' => 'delete', $wine['id']),array('escape' => false), __('Are you sure you want to delete # %s?', $wine['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
<div class="new-button"><?php echo $this->Html->link(__('New Wine'), array('controller' => 'wines', 'action' => 'add'));?></div>
</div>