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
$(function() {
    $('#stars-wrapper').stars({
        inputType: "select",
        cancelValue: 0,
        callback: function(ui, type, value){
            $('#WineRating').val(value);
        }
    });      
    var pathName = window.location.pathname;
    var pathArray = pathName.split("/");
    var firstLevel = null;
    if ( pathName.substr(0,1) == "/" )       
        firstLevel = "/" + pathArray[1];
    else
        firstLevel = "/" + pathArray[0];               
    
    $('#WineCountryId').change(function(){         
        $.ajax({
        type: "POST",
        url: firstLevel+'/producers/ajaxGetCountryProducers',
        data: "country_id=" + $('#WineCountryId').val(),
        success: function(producers){
            $('#producers-select').html(producers);
        }        
        });        
        
        $.ajax({
        type: "POST",
        url: firstLevel+'/regions/ajaxGetCountryRegions',
        data: "country_id=" + $('#WineCountryId').val(),
        success: function(regions){
            $('#regions-select').html(regions);
        }        
        });        
    });
});