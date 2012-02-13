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
<div class="cellars form">
<?php echo $this->Form->create('Cellar');?>
	<fieldset>
		<legend><?php echo $theAction . ' ' . __('Cellar'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cellar_name',array('size'=>'50','title'=>__('Choose a name for the winery',true)));
		echo $this->Form->input('street',array('size'=>'30','title'=>__('Enter the street name',true)));
		echo $this->Form->input('block',array('size'=>'20','title'=>__('Enter the block',true)));
		echo $this->Form->input('apt',array('size'=>'10','title'=>__('Enter the apartment number',true)));
		echo $this->Form->input('zip',array('size'=>'10','title'=>__('Enter the zip code',true)));
		echo $this->Form->input('city',array('size'=>'20','title'=>__('Enter the city name',true)));
		echo $this->Form->input('state',array('size'=>'20','title'=>__('Enter the state code',true)));
		echo $this->Form->input('country',array('size'=>'20','title'=>__('Enter the country name',true)));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>