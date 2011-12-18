/* Authors:
	Nizar Khalife Iglesias,
	Waldemar Figueroa,
*/

GUIACONSTANZA = {
	// !Common
	common: {
		init : function() {
		}
	}, // end common object
	
	
	//----
	
	
	// !Home
	home: {
		init : function() {
		}
	}, // end home object
	
	
	//----
	
	
	// !Page
	page: {
		init : function() {
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
		    act_classes = new Array ('category-hoteles', 'category-bares-y-restaurantes', 'category-atractivos'),
		    con_length  = con_classes.length,
		    act_length  = act_classes.length,
		    i         = 0,
		    exec      = {
		    	controller : '',
		    	action     : ''
		    };
		
		for (i = 0; i < con_length; i++) {
			if (body.hasClass (con_classes[i])) {
				exec.controller = con_classes[i].replace ('-', '_');
				break;
			}
		}
		
		for (i = 0; i < act_length; i++) {
			if (body.hasClass (act_classes[i])) {
				exec.action = act_classes[i].replace ('-', '_');
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