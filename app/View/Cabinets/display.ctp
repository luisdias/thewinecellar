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
<div id="main-cellar">
    <table class="cellar">
    <?php 
    for ($i = 1; $i <= $cabinet['Cabinet']['lines']; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $cabinet['Cabinet']['columns']; $j++) {
            $storage_id = 0;
            $image = '';
            foreach ($cabinet['Storage'] as $bottle) {
                if ( $bottle['line_number']==$i && $bottle['column_number']==$j) {
                    $storage_id = $bottle['id'];
                    $image = '<img src="';
                    
                    if (!empty($bottle['Wine']['picture']))
                        $image .= $bottle['Wine']['picture'].'" width="50" height="50" ';
                    else
                        $image .= '/img/wines/no_image.jpg" width="50" height="50" ';
                    
                    $image .= 'alt="'. $bottle['Wine']['wine_name'].' '. $bottle['Wine']['vintage'].'" ';
                    $image .= 'title="'.$bottle['Wine']['wine_name'].' '. $bottle['Wine']['vintage'].'" />' ;
                    break;
                }                
            }                       
            echo '<td><div class="droppable" ';
            if ($storage_id > 0 )
                echo 'class="draggable" class="fromCellar" storage_id="'.$storage_id.'" ';                
            echo 'cabinet_id="'.$cabinet_id.'" line_number="'.$i.'" column_number="'.$j.'">';
            if ($storage_id > 0 )
                echo '<div class="draggable" class="fromCellar" storage_id="'.$storage_id.'">';            
            echo $image; // show wine if exist
            if ($storage_id > 0 )
                echo '</div>';            
            echo '</div></td>';
        }
        echo '</tr>';
    }
    ?>
    </table>
</div>