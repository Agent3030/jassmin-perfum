//js animated button
(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD module
    define(factory);
  } else if (typeof exports === 'object') {
    // CommonJS-like environment (i.e. Node)
    module.exports = factory();
  } else {
    // Browser global
    root.transformicons = factory();
  }
}(this || window, function () {

  // ####################
  // MODULE TRANSFORMICON
  // ####################
  'use strict';

  var
    tcon = {}, // static class
    _transformClass = 'tcon-transform',

    // const
    DEFAULT_EVENTS = {
      transform : ['click'],
      revert : ['click']
    };

  // ##############
  // private methods
  // ##############

  /**
  * Normalize a selector string, a single DOM element or an array of elements into an array of DOM elements.
  * @private
  *
  * @param {(string|element|array)} elements - Selector, DOM element or Array of DOM elements
  * @returns {array} Array of DOM elements
  */
  var getElementList = function (elements) {
    if (typeof elements === 'string') {
      return Array.prototype.slice.call(document.querySelectorAll(elements));
    } else if (typeof elements === 'undefined' || elements instanceof Array) {
      return elements;
    } else {
      return [elements];
    }
  };

  /**
  * Normalize a string with eventnames separated by spaces or an array of eventnames into an array of eventnames.
  * @private
  *
  * @param {(string|array)} elements - String with eventnames separated by spaces or array of eventnames
  * @returns {array} Array of eventnames
  */
  var getEventList = function (events) {
    if (typeof events === 'string') {
      return events.toLowerCase().split(' ');
    } else {
      return events;
    }
  };

  /**
  * Attach or remove transformicon events to one or more elements.
  * @private
  *
  * @param {(string|element|array)} elements - Selector, DOM element or Array of DOM elements to be toggled
  * @param {object} [events] - An Object containing one or more special event definitions
  * @param {boolean} [remove=false] - Defines wether the listeners should be added (default) or removed.
  */
  var setListeners = function (elements, events, remove) {
    var
      method = (remove ? 'remove' : 'add') + 'EventListener',
      elementList = getElementList(elements),
      currentElement = elementList.length,
      eventLists = {};

    // get events or use defaults
    for (var prop in DEFAULT_EVENTS) {
      eventLists[prop] = (events && events[prop]) ? getEventList(events[prop]) : DEFAULT_EVENTS[prop];
    }
    
    // add or remove all events for all occasions to all elements
    while(currentElement--) {
      for (var occasion in eventLists) {
        var currentEvent = eventLists[occasion].length;
        while(currentEvent--) {
          elementList[currentElement][method](eventLists[occasion][currentEvent], handleEvent);
        }
      }
    }
  };

  /**
  * Event handler for transform events.
  * @private
  *
  * @param {object} event - event object
  */
  var handleEvent = function (event) {
    tcon.toggle(event.currentTarget);
  };

  // ##############
  // public methods
  // ##############

  /**
  * Add transformicon behavior to one or more elements.
  * @public
  *
  * @param {(string|element|array)} elements - Selector, DOM element or Array of DOM elements to be toggled
  * @param {object} [events] - An Object containing one or more special event definitions
  * @param {(string|array)} [events.transform] - One or more events that trigger the transform. Can be an Array or string with events seperated by space.
  * @param {(string|array)} [events.revert] - One or more events that trigger the reversion. Can be an Array or string with events seperated by space.
  * @returns {transformicon} transformicon instance for chaining
  */
  tcon.add = function (elements, events) {
    setListeners(elements, events);
    return tcon;
  };

  /**
  * Remove transformicon behavior from one or more elements.
  * @public
  *
  * @param {(string|element|array)} elements - Selector, DOM element or Array of DOM elements to be toggled
  * @param {object} [events] - An Object containing one or more special event definitions
  * @param {(string|array)} [events.transform] - One or more events that trigger the transform. Can be an Array or string with events seperated by space.
  * @param {(string|array)} [events.revert] - One or more events that trigger the reversion. Can be an Array or string with events seperated by space.
  * @returns {transformicon} transformicon instance for chaining
  */
  tcon.remove = function (elements, events) {
    setListeners(elements, events, true);
    return tcon;
  };

  /**
  * Put one or more elements in the transformed state.
  * @public
  *
  * @param {(string|element|array)} elements - Selector, DOM element or Array of DOM elements to be transformed
  * @returns {transformicon} transformicon instance for chaining
  */
  tcon.transform = function (elements) {
    getElementList(elements).forEach(function(element) {
      element.classList.add(_transformClass);
    });
    return tcon;
  };

  /**
  * Revert one or more elements to the original state.
  * @public
  *
  * @param {(string|element|array)} elements - Selector, DOM element or Array of DOM elements to be reverted
  * @returns {transformicon} transformicon instance for chaining
  */
  tcon.revert = function (elements) {
    getElementList(elements).forEach(function(element) {
      element.classList.remove(_transformClass);
    });
    return tcon;
  };
  
  /**
  * Toggles one or more elements between transformed and original state.
  * @public
  *
  * @param {(string|element|array)} elements - Selector, DOM element or Array of DOM elements to be toggled
  * @returns {transformicon} transformicon instance for chaining
  */
  tcon.toggle = function (elements) {
    getElementList(elements).forEach(function(element) {
      tcon[element.classList.contains(_transformClass) ? 'revert' : 'transform'](element);
    });
    return tcon;
  };

  return tcon;
}));

transformicons.add('.tcon');

//document = JQuery(document);
//window = $(window);

	$(document).ready(function() {


		var $window = $(window);
		var $headerTop = $('.header-top');
		var $headerBottom = $('.header-bottom');
		var $headerMiddle = $('.header-middle');
		var $toAbout = $('#to-about');
		var $toNews = $('#to-news');
		var $toProducts = $('#to-products');
		var $toPartners = $('#to-partners');
		var $toProdUp = $('#to-prod-up');
		var $toNewsUp = $('#to-news-up');
		var $toAboutUp = $('#to-about-up');
		var $toBegin = $('#to-begin');
		var $minNavCover = $('.min-nav-cover');
		var $minNav = $('.min-nav')
		var $tcon = $('.tcon');
		var $body = $('body');


			//parallaxWindow.parallax({imageSrc: parralaxWindowPath});
			//headImage.parallax({imageSrc: headImagePath});

		/* stiky nav */
	if(window.innerWidth > 768) {	

		$window.scroll(function(){
			
			

			var scroll = $window.scrollTop();
			
	 		
	      if(scroll > 60){

	        $headerTop.hide();
	        $headerBottom.hide();
	        $headerMiddle.addClass('header-middle-fixed');
	      
	      } else {
	      	$headerTop.show();
	        $headerBottom.show();
	        $headerMiddle.removeClass('header-middle-fixed');
	        
	      }
	      if(scroll>4650)
	      {
	      	$headerMiddle.hide();
	      } else $headerMiddle.show();

	    });
	}

		$toAbout.on('click', function(){
			$window.scrollTo('.about', '0.5', 'swing');
		});

		$toNews.on('click', function(){
			$window.scrollTo('.news', '0.5', 'swing');
		});

		$toProducts.on('click', function(){
			$window.scrollTo('.products', '0.5', 'swing');
		});

		$toPartners.on('click', function(){
			$window.scrollTo('.partners', '0.5', 'swing');
		});

		$toProdUp.on('click', function(){
			$window.scrollTo('.products', '0.5', 'swing');
		});

		$toNewsUp.on('click', function(){
			$window.scrollTo('.news', '0.5', 'swing');
		});

		$toAboutUp.on('click', function(){
			$window.scrollTo('.about', '0.5', 'swing');
		});
		$toBegin.on('click', function(){
			$window.scrollTo('header', '0.5', 'swing');
		});

	$tcon.on("click", function(){
    	if ($minNavCover.attr("data-click-state")=="0") {
    
		    $minNavCover.attr("data-click-state", 1);
		    $minNavCover.fadeTo(500, 1);
		    $body.css("overflow-y", "hidden");  
		    $(this).css("position", "fixed");
    	}  else {
		     $minNavCover.attr("data-click-state", 0);   
		     $minNavCover.fadeTo(500, 0, function() {
		     $minNavCover.hide();   
	    });
     
	    $(this).css("position", "fixed");
	     $body.css("overflow-y", "auto");    
	    }
  });

	$(".min-nav, a[href^='#']").on("click", function(){
    $tcon.removeClass("tcon-menu--xbutterfly tcon-transform").addClass("tcon-menu--xbutterfly");
     $minNavCover.attr("data-click-state", 0);   
    $minNavCover.fadeTo(500, 0, function() {
      $minNavCover.hide();   
    });
     
    $tcon.css("position", "fixed");
     $body.css("overflow-y", "auto");    
    
  });
  


   
    

	//$.pjax.reload({container:'#partners-data-wrapper'});	  
	

	});

/*---google api---*/