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
<div class="wines view">
<h2><?php  echo __('Wine');?></h2>
	<dl>
		<dt><?php echo __('Wine Name'); ?></dt>
		<dd>
			<?php echo h($wine['Wine']['wine_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vintage'); ?></dt>
		<dd>
			<?php echo h($wine['Wine']['vintage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($wine['Wine']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
			<?php echo $this->element('rating',array('rating'=>$wine['Wine']['rating'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($wine['Country']['country_name'], array('controller' => 'countries', 'action' => 'view', $wine['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Producer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($wine['Producer']['producer_name'], array('controller' => 'producers', 'action' => 'view', $wine['Producer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo $this->Html->link($wine['Region']['region_name'], array('controller' => 'regions', 'action' => 'view', $wine['Region']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wine type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($wine['Winetype']['winetype_name'], array('controller' => 'winetypes', 'action' => 'view', $wine['Winetype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grape type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($wine['Grapetype']['grape_name'], array('controller' => 'grapetypes', 'action' => 'view', $wine['Grapetype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Picture'); ?></dt>
		<dd>
			<?php echo h($wine['Wine']['picture']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
    <h3><?php echo __('Related Storages');?></h3>    
    
    <?php 
    foreach ($cabinets as $cabinet) {
        if (empty($cabinet['Storage'])) {
            continue;
        }
        echo '<h2>' . $cabinet['Cellar']['cellar_name'] . ' - '. $cabinet['Cabinet']['cabinet_code'] .'</h2>';        
        echo '<table class="cellar">';
        for ($i = 1; $i <= $cabinet['Cabinet']['lines']; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= $cabinet['Cabinet']['columns']; $j++) {
                $storage_id = 0;
                $image = null;
                foreach ($cabinet['Storage'] as $bottle) {    
                    if ( $bottle['line_number']==$i && $bottle['column_number']==$j) {
                        if (!empty($wine['Wine']['picture']))
                            $image .= $this->Html->image(str_replace('img/','',h($wine['Wine']['picture'])),
                                    array(
                                        'width'=>'50',
                                        'height'=>'50',
                                        'alt='=> $wine['Wine']['wine_name'].' '. $wine['Wine']['vintage'],
                                        'title'=>$wine['Wine']['wine_name'].' '. $wine['Wine']['vintage']
                                        ));
                        else
                            $image .= $this->Html->image('wines/no_image.jpg',array('width'=>'50','height'=>'50'));
                        break;
                    }                
                }          
                echo '<td>';
                echo $image; // show wine if exist
                echo '</td>';        
            }
            echo '</tr>';
        }
        echo '</table>';
    }    
    ?>
</div>