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
<?php echo $this->Html->script('storages'); ?>
<div id="storages-index">
    <p><?php echo __('1.Draw the cabinet by selecting the cellar and the cabinet in the bottom bar and then click on the "Cabinet" button.'); ?></p>
    <p><?php echo __('2.Draw the wine toolbar by selecting country, producer, region, wine type and grape type and then click on the "Wines" button.'); ?></p>
    <p><?php echo __('3.Add bottles to the cabinet by drag and drop from the wines toolbar.'); ?></p>
    <p><?php echo __('4.Remove bottles from the cabinet by drag and drop to the recycle bin.'); ?></p>
</div>

<div id="wine-collection">

</div>

<!-- fixed bar bottom begin -->    
<div id="bottom-bar">

   <ul>
      <li title="Home"></li>
   </ul>
   <span class="jx-separator-left"></span>
   
           <?php echo $this->Form->create('Cabinet',array(
               'action'=> 'renderCabinet',
               'default'=> false
           ));?>
           <ul>
               <li>
                <?php echo $this->Form->input('cellar_id',array('empty'=>__('---Select---',true))); ?>
                   <br/>
                <div id="cabinets-select"><?php echo $this->Form->input('cabinet_id',array('empty'=>__('---Select---',true))); ?></div>
               </li>                               
           </ul>    
           <?php echo $this->Form->end(__('Cabinet'));?>
   
   <span class="jx-separator-left"></span>
   
           <?php echo $this->Form->create('Wine',array(
               'action'=> 'renderWines',
               'default'=> false
           ));?>
           <ul>           
               <li>
                <?php echo $this->Form->input('country_id',array('empty'=>__('---Select---',true))); ?>
                <br/>
                <?php echo $this->Form->input('grapetype_id',array('label'=>__('Grape type'),'empty'=>__('---Select---',true))); ?>
               </li>
               <li>
                <div id="producers-select"><?php echo $this->Form->input('producer_id',array('empty'=>__('---Select---',true))); ?></div>
               </li>
               <li>
                <div id="regions-select"><?php echo $this->Form->input('region_id',array('empty'=>__('---Select---',true))); ?></div>
               </li>               
               <li>
               <?php echo $this->Form->input('winetype_id',array('label'=>__('Wine type'),'empty'=>__('---Select---',true))); ?>
               </li>               

           </ul>
           <?php echo $this->Form->end(__('Wines'));?>
   
    <ul class="jx-bar-button-right">
        <li title="recycle-bin">
          <div class="droppable" cabinet_id="0"><img src="img/trash_empty.png" alt="" width="50" height="50"></div>
        </li>
    </ul>
   
   <span class="jx-separator-right"></span>
   
</div>    
<!-- fixed bar bottom end -->