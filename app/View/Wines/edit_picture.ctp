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
<div class="wines form">
<?php echo $this->Form->create('Wine', array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Edit Wine'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('wine_name',array('size'=>'45','disabled'=>'true'));
		echo $this->Form->input('vintage',array('size'=>'4','disabled'=>'true'));
		echo $this->Form->input('price',array('size'=>'6','disabled'=>'true'));
		echo $this->Form->input('rating',array('size'=>'5','disabled'=>'true'));
		echo $this->Form->input('country_id',array('disabled'=>'true'));
		echo $this->Form->input('producer_id',array('disabled'=>'true'));
		echo $this->Form->input('region_id',array('disabled'=>'true'));
		echo $this->Form->input('winetype_id',array('disabled'=>'true'));
		echo $this->Form->input('grapetype_id',array('disabled'=>'true'));
		echo $this->Form->input('picture', array('type' => 'file','title'=>__('Select the image file to upload',true)));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>