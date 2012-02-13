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
<div class="regions view">
<h2><?php  echo __('Region');?></h2>
	<dl>
		<dt><?php echo __('Region Name'); ?></dt>
		<dd>
			<?php echo h($region['Region']['region_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($countries[$region['Country']['id']], array('controller' => 'countries', 'action' => 'view', $region['Country']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('related_wines',array('currentModel' => $region)) ; ?>