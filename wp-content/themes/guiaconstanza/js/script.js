/* Authors:
	Nizar Khalife Iglesias,
	Waldemar Figueroa,
	Jonathan Torres
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
				    	icon      : 'http://guiaconstanza.com/wp-content/themes/guiaconstanza/images/gmap_icon.png',
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
		
		open_weather_lightbox : function() {
			var $lightbox = $('.lightbox');
			var $details = $('.clima_details');
			
			$lightbox.fadeIn("fast", function() {
				$details.fadeIn("fast");
			});
			
			$(".close_btn").click(function(e) {
				e.preventDefault();
				GUIACONSTANZA.common.close_weather_lightbox();
			});
		},
		
		close_weather_lightbox : function() {
			var $lightbox = $('.lightbox');
			var $details = $('.clima_details');
			
			$details.fadeOut("fast", function() {
				$lightbox.fadeOut();
			});
		},

		do_fb_login : function() {
			FB.login(function(response) {
		        if (response.authResponse) {
		            GUIACONSTANZA.common.fb_insert_recommendation();
		        } else {
		            
		        }
		    });
		},

		fb_insert_recommendation : function() {
			var $lightbox = $('.lightbox'),
				$details = $('.recomendaciones_details'),
				$write_recommendation = $(".write_recommendation");

			$lightbox.fadeIn("fast", function() {
				$details.fadeIn("fast");

				FB.api("/me", function(response) {
					$write_recommendation.find("h3").text(response.name);
					$write_recommendation.find("img").attr("src", "https://graph.facebook.com/" + response.id + "/picture?width=40&height=40");

					$("#submit_recommendation_btn").on("click", function(e) {
						e.preventDefault();
						var message = $("#message").val();

						$.ajax({
							type : "POST",
							url : "http://guiaconstanza.com/wp-content/themes/guiaconstanza/inc/inc.proc.recommendation.php",
							data : { post_name : response.name, user_id : response.id, post_msg : message },
							success : function() {
								$details.fadeOut("fast", function() {
									$("#message").val("");
									$lightbox.fadeOut();
								});

								// Append markup
								var rec_markup = "";
								rec_markup += "<li>";
								rec_markup += "    <img src=\"https://graph.facebook.com/" + response.id + "/picture?width=40&height=40\" alt=\"Recommend\" />";
								rec_markup += "    <span class=\"tip\"></span>";
								rec_markup += "    <div class=\"box\">";
								rec_markup += "        <h3>" + response.name + "</h3>";
								rec_markup += "        <p>" + message + "</p>";
								rec_markup += "        <span>A moment ago</span>";
								rec_markup += "    </div>";
								rec_markup += "</li>";

								$(".all_recomendations").prepend(rec_markup);
								GUIACONSTANZA.common.paginate_recommendations();
							},
							error : function() {
								
							}
						});
					});
			    });
			});
		},

		paginate_recommendations : function() {
			var prev = { start: 0, stop: 0 },
    			cont = $('.all_recomendations li');

			$(".pagination").paging(cont.length, {
				format: '< ncnnn >',
				page: 1,
				perpage: 8,

				// Code which gets executed when user selects a page
				onSelect: function (page) {
					var data = this.slice;

					cont.slice(prev[0], prev[1]).css('display', 'none');
					cont.slice(data[0], data[1]).css('display', 'block');

					prev = data;

					return false;
				},

				onFormat: function (type) {
					switch (type) {
						case 'block': // n and c
							if (!this.active)
								return '<li>' + this.value + '</li>';
							else
								return '<li><a href="#">' + this.value + '</a></li>';
						
						case 'next': // >
							return '<li><a href="#">&raquo;</a></li>';
						case 'prev': // <
							return '<li><a href="#">&laquo;</a></li>';
					}
				}
			});
		},
		
		init : function() {
			var $featured = $('#featured');
			
			if ($featured.length) {
				GUIACONSTANZA.common.slide_nav ('#featured_bars', '.featured_arrows', '.slide');
				GUIACONSTANZA.common.slide_nav ('#featured_posts', '.featured_arrows', '.slide');
				GUIACONSTANZA.common.main_feature();
			}
			
			$("#weather_lightbox").click(function(e) {
				e.preventDefault();
				GUIACONSTANZA.common.open_weather_lightbox();
			});
		}
	}, // end common object
	
	
	//----
	
	
	// !Home
	home: {
		init : function() {
			GUIACONSTANZA.common.dondeir_map ('home');
		}
	}, // end home object
	
	
	//----
	
	
	// !Page
	page: {
		current_infowindow : null,
		
		init : function() {
		},
		
		// !Donde Ir
		page_id_24 : function() {
			GUIACONSTANZA.common.dondeir_map ('dondeir');
			$(".tweets_container").mCustomScrollbar();
		}, 

		// Recomendaciones
		page_id_26 : function() {
			var $lightbox = $('.lightbox'),
				$details = $('.recomendaciones_details');

			GUIACONSTANZA.common.paginate_recommendations();
			GUIACONSTANZA.common.slide_nav ('.we_recommend', '.recommend_nav', '.recommend_slide');

			// Characters limit
			$("#message").keyup(function() {
				var maxCharacters = 100;
				var $field = $(this);

			    if ($field.val().length > maxCharacters) {
			    	$field.val($field.val().substr(0, maxCharacters));
			    }

			    var remaining = maxCharacters - $field.val().length;
				$(".char_limit .limit").text(remaining);
			});

			// Do facebook login
			$("a.button").on("click", function(e) {
				e.preventDefault();

				FB.getLoginStatus(function(response) {
					if (response.status === 'connected') {
						GUIACONSTANZA.common.fb_insert_recommendation();
					} else if (response.status === 'not_authorized') {
						GUIACONSTANZA.common.do_fb_login();
					} else {
						GUIACONSTANZA.common.do_fb_login();
					}
				});
			});

			// Close lightboxes
			$(".recomendaciones_details").find(".close_btn").on("click", function(e) {
				e.preventDefault();

				$details.fadeOut("fast", function() {
					$lightbox.fadeOut();
				});
			});
		}
	}, // end page object
	
	
	//----
	
	
	// !Category
	category: {
		init : function() {
		},
		category_atractivos: function() {
			$('#atractivo_slider').nivoSlider ({
				effect         : 'fade',
				pauseTime      : 5000,
				directionNav   : false,
				captionOpacity : 1.0
			});

			GUIACONSTANZA.common.slide_nav ('.we_recommend', '.recommend_nav', '.recommend_slide');
		}
	}, // end category object
	
	
	//----
	
	
	// !Single
	single: {
		single_marker_map : function (map_contain_id) {
			var map_container = $('#' + map_contain_id),
				marker_pos    = new google.maps.LatLng (parseFloat(map_container.data ('geo_lat')), parseFloat(map_container.data ('geo_long'))),
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
					icon      : 'wp-content/themes/guiaconstanza/images/gmap_icon.png',
					animation : google.maps.Animation.DROP
			  });
		},
		
		init : function() {
			$('#single_gallery').nivoSlider ({
				effect         : 'fade',
				pauseTime      : 5000,
				directionNav   : false,
				captionOpacity : 1.0
			});

			GUIACONSTANZA.common.slide_nav ('.we_recommend', '.recommend_nav', '.recommend_slide');
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
		    act_classes = new Array ('category-hoteles', 'category-bares-y-restaurantes', 'category-atractivos', 'page-id-24', 'page-id-26'),
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