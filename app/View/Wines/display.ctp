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
<div id="mycarousel" class="jcarousel-skin-tango">  
    <ul>
        <?php foreach ($wines as $wine) {
        echo '<li>';
        echo'<div class="draggable" wine_id="'.$wine['Wine']['id'].'">';        
        $image = '<img  class="wineCarouselImage" src="';
        if(!empty($wine['Wine']['picture']))
            $image .= $wine['Wine']['picture'];
        else
            $image .= 'img/wines/no_image.jpg';
        $image .= '" alt="'.$wine['Wine']['wine_name'].' '.$wine['Wine']['vintage'];
        $image .= '" title="'.$wine['Wine']['wine_name'].' '.$wine['Wine']['vintage'];
        $image .= '" width="50" height="50" />';
        echo $image;
        echo '</div>';
        echo '</li>'; 
        echo '<li><span class="wineCarouselText">'.$wine['Wine']['wine_name'].' '.$wine['Wine']['vintage'].'</span></li>';
        }?>
    </ul>
</div>