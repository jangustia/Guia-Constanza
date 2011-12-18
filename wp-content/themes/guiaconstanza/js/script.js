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
		init  : function() {
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