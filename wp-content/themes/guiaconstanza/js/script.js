/* Authors:
	Nizar Khalife Iglesias,
	Waldemar Figueroa,
*/

GUIACONSTANZA = {
	// !Common
	common: {
		constanza_lat      : 18.912133,
		constanza_long     : -70.74337,
		current_infowindow : null,
		
		dondeir_map: function (type) {
			var constanza_pos = new google.maps.LatLng (GUIACONSTANZA.common.constanza_lat, GUIACONSTANZA.common.constanza_long),
			    gmap          = new google.maps.Map (document.getElementById ('dondeir_map'), {
					zoom               : 11,
					mapTypeControl     : false,
					streetViewControl  : false,
					overviewMapControl : true,
					zoomControlOptions : {
	  					style: google.maps.ZoomControlStyle.DEFAULT
	  				},			    
					center             : constanza_pos,
					mapTypeId          : google.maps.MapTypeId.ROADMAP
				});
			
			$('#marker_list li').each (function()
			{
				var marker_element = $(this),
				    title          = marker_element.find ('h3').text(),
					url            = marker_element.find ('a').prop ('href'),
				    marker         = new google.maps.Marker ({
				    	position  : new google.maps.LatLng (marker_element.data ('geo_lat'), marker_element.data ('geo_long')),
				    	map       : gmap,
				    	title     : title,
				    	animation : google.maps.Animation.DROP
				    }),
				    info_window    = new google.maps.InfoWindow({
				    	content : (type == 'home' ?
				    		'<a class="infobox_home" href="'+ url +'">'+ title +'</a>' :
				    		marker_element.html())
				    });
				
				google.maps.event.addListener (marker, 'click', function() {
					info_window.open (gmap, marker);
					if (GUIACONSTANZA.common.current_infowindow)
						GUIACONSTANZA.common.current_infowindow.close();
					GUIACONSTANZA.common.current_infowindow = info_window;
				});
			});
		},
		
		main_feature: function () {
			$('#hotel_slide').nivoSlider ({
				effect         : 'fade',
				pauseTime      : 5000,
				directionNav   : false,
				captionOpacity : 1.0
			});
		},
		
		slide_nav: function (container_selector, nav_selector, content_selector) {
			var $nav = $(container_selector +' '+ nav_selector),
			    $nav_buttons = $nav.find ('a');
			
			$nav_buttons.click (function() {
				var $button    = $(this),
				    $container = $button.closest (container_selector),
				    $current   = $container.find (content_selector + '.active'),
				    $new;
				
				$current.hide();
				$current.removeClass ('active');
				
				if ($button.hasClass ('prev')) {
					$new = $current.prev (content_selector);
					if (!$new.length)
						$new = $container.find (content_selector).last();
				}
				else if ($button.hasClass ('next')) {
					$new = $current.next (content_selector);
					if (!$new.length)
						$new = $container.find (content_selector).first();
				}
				
				$new.fadeIn (400, function() {
					$(this).addClass ('active');
				});
			});
		},
		
		init : function() {
		}
	}, // end common object
	
	
	//----
	
	
	// !Home
	home: {
		init : function() {
			GUIACONSTANZA.common.dondeir_map ('home');
			GUIACONSTANZA.common.slide_nav ('#featured_bars', '.featured_arrows', '.slide');
			GUIACONSTANZA.common.main_feature ('#featured_bars', '.featured_arrows', '.slide');
		}
	}, // end home object
	
	
	//----
	
	
	// !Page
	page: {
		current_infowindow : null,
		
		init : function() {
		},
		
		// !Donde Ir
		page_id_113 : function() {
			GUIACONSTANZA.common.dondeir_map ('dondeir');
		}
	}, // end page object
	
	
	//----
	
	
	// !Category
	category: {
		init : function() {
		}
	}, // end category object
	
	
	//----
	
	
	// !Single
	single: {
		single_marker_map : function (map_contain_id) {
			var map_container = $('#' + map_contain_id),
				marker_pos    = new google.maps.LatLng (map_container.data ('geo_lat'), map_container.data ('geo_long')),
			    gmap          = new google.maps.Map (document.getElementById (map_contain_id), {
					zoom               : 10,
					mapTypeControl     : false,
					streetViewControl  : false,
					overviewMapControl : true,
					zoomControlOptions : {
	  					style: google.maps.ZoomControlStyle.SMALL
	  				},			    
					center             : marker_pos,
					mapTypeId          : google.maps.MapTypeId.ROADMAP
				}),
				marker        = new google.maps.Marker({
					position  : marker_pos,
					map       : gmap,
					title     : $('#details .org').text(),
					animation : google.maps.Animation.DROP
			  });
		},
		
		init : function() {
		},
		
		category_hoteles : function() {
			this.single_marker_map ('details_map');
		},
		
		category_bares_y_restaurantes : function() {
			this.single_marker_map ('details_map');
		}
	} // end single object
};


//----


// !JS Object Loader
UTIL = {
  exec: function( controller, action ) {
    var ns = GUIACONSTANZA,
        action = ( action === undefined ) ? "init" : action;

    if ( controller !== "" && ns[controller] && typeof ns[controller][action] == "function" ) {
      ns[controller][action]();
    }
  },
  
	action_from_body: function() {
		var body        = $(document.body),
		    con_classes = new Array ('home', 'page', 'category', 'single', 'search', 'archive'),
		    act_classes = new Array ('category-hoteles', 'category-bares-y-restaurantes', 'category-atractivos', 'page-id-113'),
		    con_length  = con_classes.length,
		    act_length  = act_classes.length,
		    i         = 0,
		    exec      = {
		    	controller : '',
		    	action     : ''
		    };
		
		for (i = 0; i < con_length; i++) {
			if (body.hasClass (con_classes[i])) {
				exec.controller = con_classes[i].replace (/-/g, '_');
				break;
			}
		}
		
		for (i = 0; i < act_length; i++) {
			if (body.hasClass (act_classes[i])) {
				exec.action = act_classes[i].replace (/-/g, '_');
				break;
			}
		}
		
		return exec;
	},

	init: function() {
		var action_obj = UTIL.action_from_body();
		
		UTIL.exec ('common');
		UTIL.exec (action_obj.controller);
		UTIL.exec (action_obj.controller, action_obj.action);
	}
};

$( document ).ready( UTIL.init );