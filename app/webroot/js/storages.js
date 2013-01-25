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
    $('#CabinetRenderCabinetForm').submit(function(){ 
        if ( $('#CabinetCellarId').val() != '' && $('#CabinetCabinetId').val() != '' ) {
            $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            dataType: 'text',
            data: "cellar_id=" + $('#CabinetCellarId').val() + '&' +
                "cabinet_id=" + $('#CabinetCabinetId').val()  ,
            success: function(cabinet){
                $('#storages-index').html(cabinet);
                makeDraggable();
                makeDroppable();                
            },
            error: function(msg) {         
                $('#storages-index').html('0');
            }
            });
        }
    });
    
    $('#WineRenderWinesForm').submit(function(){
            $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            dataType: 'text',
            data: "country_id=" + $('#WineCountryId').val() + '&' +
                "producer_id=" + $('#WineProducerId').val() + '&' +
                "region_id=" + $('#WineRegionId').val() + '&' +
                "winetype_id=" + $('#WineWinetypeId').val() + '&' +
                "grapetype_id=" + $('#WineGrapetypeId').val(),
            success: function(wines){
                $('#wine-collection').html(wines);
                makeDraggable();
                $("#mycarousel").jcarousel({
                    vertical: true,
                    visible: 6
                });                
            },
            error: function(msg) {         
                $('#mycarousel').html('0');
            }
            });        
    });
        
    $('#CabinetCellarId').change(function(){         
        $.ajax({
        type: "POST",
        url: baseHref+'/cabinets/ajaxGetCellarCabinets',
        data: "cellar_id=" + $('#CabinetCellarId').val(),
        success: function(cabinets){
            $('#cabinets-select').html(cabinets);
        }        
        });
    });        
    
    $('#WineCountryId').change(function(){         
        $.ajax({
        type: "POST",
        url: baseHref+'/producers/ajaxGetCountryProducers',
        data: "country_id=" + $('#WineCountryId').val(),
        success: function(producers){
            $('#producers-select').html(producers);
        }        
        });        
        
        $.ajax({
        type: "POST",
        url: baseHref+'/regions/ajaxGetCountryRegions',
        data: "country_id=" + $('#WineCountryId').val(),
        success: function(regions){
            $('#regions-select').html(regions);
        }        
        });        
    });
});

function makeDraggable() {
$(".draggable" ).draggable({
    helper: 'clone',
    appendTo: 'body',
    revert: 'invalid',
    cursor: 'move',
    snap: true
});
}

function makeDroppable() {
    var pathName = window.location.pathname;
    var pathArray = pathName.split("/");
    if ( pathName.substr(0,1) == "/" )       
        var baseHref = "/" + pathArray[1];
    else
        var baseHref = "/" + pathArray[0];
    $(".droppable" ).droppable({
        accept: '.draggable',
        greedy: true,
        activeClass: 'ui-state-highlight',
        drop: function(event,ui) {
            var element = $(ui.draggable).clone();
            
            cabinet_id = $(this).attr('cabinet_id'); // read from cellar cell div
            
            if ( cabinet_id > 0 ) { // cellar cell
                
                wine_id = $(this).attr('wine_id');
                if ( wine_id > 0 ) { // if cellar cell already has a wine bottle
                    storage_id = $(this).attr('storage_id');
                    if (storage_id > 0) {
                        // delete storage from database
                        $.ajax({
                        async: false,
                        type: "POST",
                        url: baseHref+'/storages/delWineFromCabinet',
                        dataType: 'text',
                        data: "storage_id=" + storage_id,
                        success: function(wines){

                        },
                        error: function(msg) {         
                            alert('Database delete error');
                        }
                        });                                             
                    }
                }
                
                wine_id = element.attr('wine_id'); // read from dragged element
                
                line_number = $(this).attr('line_number'); // read from cellar cell div
                column_number = $(this).attr('column_number'); // read from cellar cell div

                // add wine to cabinet ( insert in storage table )
                $.ajax({
                async: false,
                type: "POST",
                url: baseHref+'/storages/addWineToCabinet',
                dataType: 'text',
                data: "wine_id=" + wine_id  + '&' +
                    "line_number=" + line_number  + '&' +
                    "column_number=" + column_number  + '&' +
                    "cabinet_id=" + cabinet_id,
                success: function(id){
                    storage_id = id;
                },
                error: function(id) {         
                    alert('Database insert error');
                }
                }); 
                
                $(this).html(element); // append dragged element to cellar cell div
                $(this).addClass("draggable"); // add css class to make cellar cell draggable to recycle bin
                $(this).addClass("fromCellar"); // add css class for recycle bin 

                $(this).attr('wine_id',wine_id); // add wine_id attribute to cellar cell div
                $(this).attr('storage_id',storage_id); // add storage id for future delete
                
                $(this).draggable({ // make this cellar cell draggable
                    helper: 'clone',
                    appendTo: 'body',
                    revert: 'invalid',
                    cursor: 'move',
                    snap: true
                });                


            } else { // recycle-bin
                
                storage_id = element.attr('storage_id');
                if (storage_id > 0)  { // is element dragged from cellar ?
                    // remove from database
                    $.ajax({
                    async: false,
                    type: "POST",
                    url: baseHref+'/storages/delWineFromCabinet',
                    dataType: 'text',
                    data: "storage_id=" + storage_id,
                    success: function(id){
                        
                    },
                    error: function(id) {         
                        alert('Database insert error');
                    }
                    }); 
                    
                    $(ui.draggable).html('');
                
                }
            }
        }
    }); 
}