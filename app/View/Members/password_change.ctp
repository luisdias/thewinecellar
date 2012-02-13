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
<div class="members form">
    <?php echo $this->Form->create('Member');?>
            <fieldset>
                    <legend><?php echo __('Password change');?></legend>
            <?php
                    echo $this->Form->input('id');
                    echo $this->Form->input('username',array('disabled'=>'true','label' => 'Nome'));
                    echo $this->Form->input('username',array('type' => 'hidden'));
                    echo $this->Form->input('new_password', array('type' => 'password','title'=>__('Enter the new password',true)));
                    echo $this->Form->input('password_confirm',array('type' => 'password','title'=>__('Enter the password confirmation',true)));
                    echo $this->Form->input('tmp_password',array('type' => 'hidden','value'=>''));
            ?>
            </fieldset>
    <?php echo $this->Form->end(__('Submit', true));?>
</div>