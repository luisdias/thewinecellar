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
$(document).ready(function() {
    $('input[title]').tipsy({trigger: 'focus', gravity: 'w'});
    $('select[title]').tipsy({trigger: 'focus', gravity: 'w'});
    $('textarea[title]').tipsy({trigger: 'focus', gravity: 'w'});   
    
    $("#bottom-bar").jixedbar();

    var $scrollingDiv = $("#wine-collection");

    $(window).scroll(function(){			
            $scrollingDiv
                    .stop()
                    .animate({"marginTop": ($(window).scrollTop() + 30) + "px"}, "slow" );			
    });
   
    $("#mycarousel").jcarousel({
        vertical: true,
        visible: 6
    });

    $(".draggable" ).draggable({
        helper: 'clone',
        appendTo: 'body',
        revert: 'invalid',
        cursor: 'move',
        snap: true
    });
    
    $(".droppable" ).droppable({
        accept: '.draggable',
        greedy: true,
        activeClass: 'ui-state-highlight',
        drop: function(event,ui) {
            var element = $(ui.draggable).clone();
            
            cabinet_id = $(this).attr('cabinet_id'); // read from cellar cell div
            
            if ( cabinet_id > 0 ) { // cellar cell
                
                wine_id = element.attr('wine_id'); // read from dragged element
                
                line_number = $(this).attr('line_number'); // read from cellar cell div
                column_number = $(this).attr('column_number'); // read from cellar cell div
                
                $(this).html(element); // append dragged element to cellar cell div
                $(this).addClass("draggable"); // add css class to make cellar cell draggable to recycle bin
                $(this).addClass("fromCellar"); // add css class for recycle bin 
                
                $(this).attr('wine_id',wine_id); // add wine_id attribute to cellar cell div
                
                $(this).draggable({ // make this cellar cell draggable
                    helper: 'clone',
                    appendTo: 'body',
                    revert: 'invalid',
                    cursor: 'move',
                    snap: true
                });
            } else { // recycle-bin
                wine_id = element.attr('wine_id');
                cabinet_id = element.attr('cabinet_id');
                line_number = element.attr('line_number');
                column_number = element.attr('column_number');                

                if ($(ui.draggable).hasClass("fromCellar"))  { // is element dragged from cellar ?
                    $(ui.draggable).html('');
                    // remove from database
                }
            }
        }
    });
});


/**
 * http://www.gmarwaha.com/jquery/jcarousellite/
 * Options
-SbtnPrev Selector for the "Previous" button. The navigation buttons - both prev and next - need not be as 
part of the carousel "div" itself, but it can be if you want it to. Where ever you decide to place 
those buttons in the HTML structure, an appropriate jQuery selector for the "previous" button should be 
provided as the value for this option.

-btnNext Selector for the "Next" button. The navigation buttons - both prev and next - need not be as part 
of the carousel "div" itself, but it can be if you want it to. Where ever you decide to place those buttons 
in the HTML structure, an appropriate jQuery selector for the "next" button should be provided as the 
value for this option.

-btnGo If you don't want next and previous buttons for navigation, instead you prefer custom navigation 
based on the item number within the carousel, you can use this option. Just supply an array of selectors 
for each element in the carousel. The index of the array represents the index of the element. What i mean 
is, if the first element in the array is ".0", it means that when the element represented by ".0" is 
clicked, the carousel will slide to the first element and so on and so forth. This feature is very powerful.
 For example, i made a tabbed interface out of it by making my navigation elements styled like tabs in css. 
As the carousel is capable of holding any content, not just images, you can have a very simple tabbed 
navigation in minutes without using any other plugin. The best part is that, the tab will "slide" based on 
the provided effect. :-)

-mouseWheel As of version 0.4.0, the navigation buttons are no more needed to enjoy the carousel. 
The mouse-wheel itself can be used for navigation. To achieve this, 2 things should be done. 
First, include the mousewheel plugin (checkout the installation section). Second, set "true" for 
this option. That's it, now you will be able to navigate your carousel using the mouse wheel. 
Using buttons and mouse-wheel are not mutually exclusive. You can still have buttons for 
navigation as well. They complement each other. To use both together, just supply the btnNext/btnPrev 
or btnGo options.

-auto As of version 0.4.0, the carousel can auto-scroll as well. This is enabled by specifying a 
millisecond value to this option. The value you specify is the amount of time between 2 consecutive 
slides. The default is null, and that disables auto-scrolling. Specify this value and watch your 
carousel magically scroll.

-speed Specifying a speed will slow-down or speed-up the sliding speed of your carousel. Try it out with 
different speeds like 800, 600, 1500 etc. Providing 0, will remove the slide effect.

-easing You can specify any easing effect. Note: You need easing plugin for that. Once specified, the 
carousel will slide based on the provided easing effect.

-vertical Determines the direction of the carousel. true, means the carousel will display vertically. 
The next and prev buttons will slide the items vertically as well. The default is false, which means that 
the carousel will display horizontally. The next and prev items will slide the items from left-right in 
this case.

-circular Setting it to true enables circular navigation. This means, if you click "next" after you reach 
the last element, you will automatically slide to the first element and vice versa. If you set circular to 
false, then if you click on the "next" button after you reach the last element, you will stay in the last 
element itself and similarly for "previous" button and first element.

-visible This specifies the number of items visible at all times within the carousel. 
The default is 3. You are even free to experiment with real numbers. Eg: "3.5" will have 3 items 
fully visible and the last item half visible. This gives you the effect of showing the user that 
there are more images to the right.

-start You can specify from which item the carousel should start. Remember, the first item in the carousel 
has a start of 0, and so on.

-scroll As of version 0.4.0, you can specify the number of items to scroll when you click the next or prev 
buttons. Ofcourse, this applies to the mouse-wheel and auto-scroll as well. 
For example, scroll:2 will scroll 2 items at a time.

-beforeStart Callback function that should be invoked before the animation starts. 
The elements representing the items that are visible before the animation is passed in as argument.

-afterEnd Callback function that should be invoked after the animation ends. 
The elements representing the items that are visible after the animation ends are passed in as argument.
 */

/** 
 * http://code.google.com/p/jixedbar/
 * jixedbar version 0.0.5
 * showOnTop	Boolean	Position the bar on top, instead of the default bottom.	false
 * transparent	Boolean	Make the bar transparent.	false
 * opacity	Float	Set bar's opacity level. (0.0 ~ 1.0)	0.9
 * slideSpeed	String or Integer	Set bar's hide/show slide effect speed. (fast ~ slow or 200 ~ 600)	fast
 * roundedCorners	Boolean	Enable or disable bar's rounded corner property.	true
 * roundedButtons	Boolean	Enable or disable button's rounded corner property.	true
 * menuFadeSpeed	String or Integer	Set menu fade effect speed. (fast ~ slow or 200 ~ 600)	250
 * tooltipFadeSpeed	String or Integer	Set tooltip fade effect speed. (fast ~ slow or 200 ~ 600)	slow
 * tooltipFadeOpacity	Float	Set tooltip fadeout opacity effect. (0.0 ~ 1.0)	0.8
 * 
 
 <div id="sample-bar">

   <ul>
      <li title="Home"><a href="http://your.domain.tld/"><img src="img/home.png" alt="" /></a></li>
   </ul>

   <span class="jx-separator-left"></span>
   
   <ul>        
      <li title="Around The Web"><a href="#"><img src="img/web.png" alt="Get Social" /></a>
         <ul>
            <li><a href="http://www.facebook.com/account-name"><img src="img/facebook.png" title="Facebook" />Facebook</a></li>
            <li><a href="http://twitter.com/account-name"><img src="img/twitter.png" title="Twitter" />Twitter</a></li>
            <li><a href="http://www.flickr.com/photos/account-name/"><img src="img/flickr.png" title="Flickr" />Flickr</a></li>
         </ul>
      </li>
   </ul>
   
   <span class="jx-separator-left"></span>
   
   <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
   
   <ul class="jx-bar-button-right">
      <li title="Feeds"><a href="#"><img src="img/feed.png" alt="" /></a>
         <ul>
            <li><a href="http://your.domain.tld/feed/"><img src="img/feed.png" title="Content Feeds" />Content Feed</a></li>
            <li><a href="http://your.domain.tld/comments/"><img src="img/comment.png" title="Comment Feeds" />Comment Feed</a></li>
         </ul>
      </li>
   </ul>
   
   <span class="jx-separator-right"></span>
   
</div>

*/