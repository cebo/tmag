jQuery(function($) {
	$(document).on('focusin', '.field, textarea', function() {
		if(this.title==this.value) {
			this.value = '';
		}
	}).on('focusout', '.field, textarea', function(){
		if(this.value=='') {
			this.value = this.title;
		}
	});

	// small-slider
	function small_slider(){
		if ( $('body').hasClass('home') ) {
			// var items,items_width, margins;
			if ( $('.small-slider').length ) {
		        $('.small-slider').each(function(){
		            var $self = $(this),
		                prev_slide = $self.find('a.slide-nav.prev-slide'),
		                next_slide = $self.find('a.slide-nav.next-slide');
		            $self.find('.carousel').carouFredSel({
		                width: '100%',
		                items: {
		                    visible: 3,
		                    start: -1
		                },
		                scroll: {
		                	items: 1,
		                	duration: 800
		                },
		                prev: {
		                    button: prev_slide
		                },
		                next: {
		                    button: next_slide
		                },
		                auto: false
		            });
		        });
		    }
		} else {
			if ( $('.small-slider').length ) {
		        $('.small-slider').each(function(){
		            var $self = $(this),
		                prev_slide = $self.find('a.slide-nav.prev-slide'),
		                next_slide = $self.find('a.slide-nav.next-slide');
		            $self.find('.carousel').carouFredSel({
		                height: 400,
		                align: 'left',
		                responsive: true,
		                items: {
		                    width: 600,
		                    visible: {
		                        min: 3,
		                        max: 6
		                    },
		                    height: 400
		                },
		                scroll: 1,
		                prev: {
		                    button: prev_slide
		                },
		                next: {
		                    button: next_slide
		                },
		                auto: false
		            });
		        });
		    }	
		}
    }

    function loaded_small_img(){
	    // check if all imgs are loaded and start the slider
	    var i = 0;
	    $('.small-slider img').each(function(){
	        var img = new Image(),
	            imgs_slider = $('.small-slider img').length;

	        img.onload = function() {
	            i = i + 1;              
	            if ( i == imgs_slider ) {
	                small_slider();
	                $('.small-slider').animate({'opacity': 1}, 500);
	            }
	        }
	        img.src = $(this).attr('src');
	    });
	}

    function big_slider(){
	    if ( $('.big-slider').length ) {
	        $('.big-slider').each(function(){
	            var $self = $(this),
	            	pagination = $self.find('.slider-pagination');
	            $self.find('.carousel').carouFredSel({
	                height: 546,
	                responsive: true,
	                items: {
	                    visible: 1,
	                    height: 546
	                },
	                pagination: pagination,
	                scroll: {
	                	items: 1,
	                	duration: 800,
	                	fx: 'crossfade'
	                },
	                auto: 6000
	            });
	        });
	    }
    }    

	function loaded_big_img(){
		var i = 0;
	    $('.big-slider img').each(function(){
	        var img = new Image(),
	            imgs_slider = $('.big-slider img').length;

	        img.onload = function() {
	            i = i + 1;              
	            if ( i == imgs_slider ) {	            	
	                big_slider();
	                slider_resize();
	                $('.big-slider').animate({'opacity': 1}, 500);
	            }
	        }
	        img.src = $(this).attr('src');
	    });
	} 

	function wide_img(){
        resizer( $('.section.wide-section'), $('.section.wide-section img') );
    }

    function wide_img_loaded(){
		var i = 0;
	    $('.section.wide-section img').each(function(){
	        var img = new Image(),
	            imgs_slider = $('.section.wide-section img').length;

	        img.onload = function() {
	            i = i + 1;              
	            if ( i == imgs_slider ) {
	            	wide_img();
	                $('.section.wide-section').animate({'opacity': 1}, 500);
	            }
	        }
	        img.src = $(this).attr('src');
	    });
	} 

    function bg_img(){
        resizer( $('.body-bg'), $('.body-bg img') );
    }

    function wide_img_bg(){
		var i = 0;
	    $('.body-bg img').each(function(){
	        var img = new Image(),
	            imgs_slider = $('.body-bg img').length;

	        img.onload = function() {
	            i = i + 1;              
	            if ( i == imgs_slider ) {
	            	bg_img();
	                $('.body-bg').animate({'opacity': 1}, 500);
	            }
	        }
	        img.src = $(this).attr('src');
	    });
	} 

	function feature_loaded(){
		var i = 0;
	    $('.feature img').each(function(){
	        var img = new Image(),
	            imgs_slider = $('.feature img').length;

	        img.onload = function() {
	            i = i + 1;              
	            if ( i == imgs_slider ) {
	            	feature_resize();
	                $('.feature').animate({'opacity': 1}, 500);
	            }
	        }
	        img.src = $(this).attr('src');
	    });
	} 

    function slider_resize(){
        resizer( $('.big-slider .slide'), $('.big-slider .slide img') );
    }

    function feature_resize(){
        resizer( $('.feature'), $('.feature img.feature-img') );
    }

    function resizer( $parent, $img ) {
        var ww = $parent.width(),
            wh = $parent.height(),
            iw = $img.width(),
            ih = $img.height(),
            rw = wh / ww,
            ri = ih / iw,
            newWidth, newHeight,
            newLeft, newTop,
            properties;

        if ( rw > ri ) {
            newWidth = wh / ri;
            newHeight = wh;
        } else {
            newWidth = ww;
            newHeight = ww * ri;
        }

        properties = {
            'width': newWidth + 'px',
            'height': newHeight + 'px',
            'top': 'auto',
            'bottom': 'auto',
            'left': 'auto',
            'right': 'auto'
        }

        properties[ 'top' ] = ( wh - newHeight ) / 2;
        properties[ 'left' ] = ( ww - newWidth ) / 2;

        $img.css( properties );
    }

    function wide_map(){
    	var contact_map = $('#wide-map'),
    		contact_map_exist = contact_map.length,
    		contact_map_lng = contact_map_exist ? contact_map.attr('data-lng') : '',
    		contact_map_lat = contact_map_exist ? contact_map.attr('data-lat') : '';

    	var lng = contact_map_lng ? contact_map_lng : '30.25281',
    		lat = contact_map_lat ? contact_map_lat : '-97.74174';

		var mapOptions = {
			center: new google.maps.LatLng(lat, lng),
		    scrollwheel: false,
			zoom: 17
		},
		latlng = new google.maps.LatLng(lat, lng),
		map = new google.maps.Map(document.getElementById("wide-map"),mapOptions),
		marker = new google.maps.Marker({
			position: latlng,
			map: map,
			icon: window.stylesheet_directory + '/images/marker.png'
		});
	}

	function order_map1(){
		var mapOptions = {
			center: new google.maps.LatLng(30.25281, -97.74174),
		    scrollwheel: false,
			zoom: 12
		},
		latlng = new google.maps.LatLng(30.25281, -97.74174),
		map = new google.maps.Map(document.getElementById("map1"),mapOptions);		
	}

	function order_map2(){
		var mapOptions = {
			center: new google.maps.LatLng(30.25281, -97.74174),
		    scrollwheel: false,
			zoom: 12
		},
		latlng = new google.maps.LatLng(30.25281, -97.74174),
		map = new google.maps.Map(document.getElementById("map2"),mapOptions);
	}

	function location2(){
		var mapOptions = {
			center: new google.maps.LatLng(30.25281, -97.74174),
		    scrollwheel: false,
			zoom: 12
		},
		latlng = new google.maps.LatLng(30.25281, -97.74174),
		map = new google.maps.Map(document.getElementById("location2-map"),mapOptions);		
		marker = new google.maps.Marker({
			position: latlng,
			map: map,
			icon: window.stylesheet_directory + '/images/marker1.png'
		});
	}

	// location map 1
	function location1() {
		var locations = [
				['Location 3', 30.24838, -97.77658, 3],
				['Location 2', 30.29340, -97.73165, 2],
				['Location 1', 30.26395, -97.74595, 1]
			],
			mapOptions = {
				center: new google.maps.LatLng(30.29834, -97.74647),
			    scrollwheel: false,
				zoom: 12,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				panControl: false,
				zoomControl: false,
				mapTypeControl: false,
				scaleControl: false,
				streetViewControl: false,
				overviewMapControl: false
			},
			map = new google.maps.Map(document.getElementById("location-map"), mapOptions),
			marker,
			i,
			icon_file = window.stylesheet_directory + '/images/marker'

		for (i = 0; i < locations.length; i++) {  
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(locations[i][1], locations[i][2]),
				icon: icon_file+locations[i][locations[i].length-1]+'.png',
				map: map
			});
		}
	};

	function big_map(){
		var mapOptions = {
			center: new google.maps.LatLng(30.25281, -97.74174),
		    scrollwheel: false,
			zoom: 12			
		},
		latlng = new google.maps.LatLng(30.25281, -97.74174),
		map = new google.maps.Map(document.getElementById("big-map"),mapOptions);		
	}

	// add last class
	$('.footer-nav li:last-child, .feature-cols .col:last-child, .direction-icons a:last-child, .white-section .posts-section .post:last-child, .location-cnt a.orange-btn:last-child, .white-section .question:last-child').addClass('last');

	// last-section
	$('.main .section:last-child').addClass('last-section');

	// labels effect
	$('.location-search label, .col label, .request-form label').inFieldLabels();

	// click questions
	$('.question h5 a').click(function(){
		var $self = $(this),
			data_id = $(this).attr('data-id');
		$self.closest('.question').find('ul, p').stop(true, true).slideToggle();
		$self.stop(true, true).toggleClass('active');

		if (data_id) {
			var $dependency_items = $('.'+data_id);
			$dependency_items.stop(true, true).slideToggle();
			// dependency_items.each(function(){
			// 	if ($(this).is(":visible")) {
			// 		$(this).slideUp(function(){
			// 			$(this).css('display', 'none')
			// 		});
			// 	}else{
			// 		$(this).slideDown(function(){
			// 			$(this).css('display', 'block')
			// 		});
			// 	};
			// });
		};

		return false;
	});

	$("p").filter( function() {
		return $.trim($(this).html()) == '';
	}).remove();

	$('a.orange-btn:not(.cbox)').click(function(){
		var $self = $(this),
			href = $self.attr('href').replace('#', '');
		if ( $('.main').find('#' + href).length && !$(this).parent('.order-location').length ) {
			var scroll_top = $('.main #'+ href).offset().top;
			$('body, html').animate({
				scrollTop: scroll_top
			}, 400);
			return false;
		}
	});

	if ( $('.main .section:first-child').hasClass('orange-section') ) {
		$('.main').addClass('orange-main');
	}
	if ( $('.main .section:first-child').hasClass('yellow-section') ) {
		$('.main').addClass('yellow-main');
	}

	$('.tabs-nav li').eq(0).addClass('active').siblings('li').removeClass('active');

	$('.tabs-holder .tab').hide();
	$('.tabs-holder .tab:eq(0)').fadeIn();

	$('.tabs-nav li a').click(function(){
		var $self = $(this),
			href = $self.attr('href').replace('#', '');
			$self.closest('li').addClass('active').siblings('li').removeClass('active');

		if ( $('.tab#' + href ).is(':hidden') ) {
			$('.tabs-holder .tab').hide();
			$('.tabs-holder .tab#' + href ).stop(true, true).fadeIn();
		}

		if ( !$self.hasClass('ext') ) {
			return false;
		};
	});

	// custom select
	$('select.field, select.states-select').chosen({
		disable_search: true
	});

	$('.direction-icons a.disabled').click(function(){
		return false;
	});

	$('textarea#cover-letter').on('keypress', function(event){
		var $self = $(this),
			cover_letter = $self.val().length,
			max = 1000,
			key_code = event.which;
		if ( cover_letter > max ) {
			if ( key_code == 8 || key_code == 37 || key_code == 39 || key_code == 40 || key_code == 38 || key_code == 46 ) {
				return true;
			} else {
				return false;	
			}
		}
		$self.closest('p').find('span.characters small').text( cover_letter );
	});

	$('textarea#resume-textarea').on('keypress', function(event){
		var $self = $(this),
			cover_letter = $self.val().length,
			max = 5000,
			key_code = event.which;
		if ( cover_letter > max ) {
			if ( key_code == 8 || key_code == 37 || key_code == 39 || key_code == 40 || key_code == 38 || key_code == 46 ) {
				return true;
			} else {
				return false;	
			}
		}
		$self.closest('p').find('span.characters small').text( cover_letter );
	});

	$('textarea#cover-letter, textarea#resume-textarea').on('keyup', function(event){
		var $self = $(this),
			cover_letter = $self.val().length;
		$self.closest('p').find('span.characters small').text( cover_letter );
	});

	$('a.more-info').click(function(){
		var $self = $(this),
			is_active = $self.hasClass('active-state');
		$self.toggleClass('active-state').closest('.post').find('.expand').stop(true, true).slideToggle();
		
		return false;
	});

	var i = 0;
	// location2 list
	$('.locations .list').each(function(){
		var $self = $(this),
			list_h = $self.height();
		if ( list_h > i ) {
			$('.locations .list').css('height', i );
		}
	});

	// custom radio
	$('label.check input:checked').parent().addClass('checked');
	
	$(document).on('click', 'label.check', function(){
		var $label = $(this),
			$input = $label.find('input');

		if ( $input.not(':checked') ) {
			$input.attr('checked', true);
			$label.closest('.radios').find('label.check').removeClass('checked');
			$label.addClass('checked');
		}

		$input.trigger('change');

		return false;
	});

	$('#catering-form .request-form form').submit(function(){
		var $self = $(this),
			holder_h = $self.parent().height();			

		$('.request-form p, .request-form h5, .request-form form').hide();
		$self.parent().css('min-height', holder_h );
		$('<p class="send-message">Request sent</p>').prependTo( $self.parent() ).animate({'opacity': 1}, 600);
		return false;
	});

	$('.page-template-templatestemplate-employment-php .request-form form').submit(function(){
		var $self = $(this),
			holder_h = '540px';

		$('.request-form p, .request-form h5, .request-form form').hide();
		$self.parent().css({'min-height': holder_h, 'margin-bottom': 0 });
		$('.page-template-templatestemplate-employment-php .container').css('padding-bottom', '50px' );
		$('<p class="send-message">Thank you for your application.</p>').prependTo( $self.parent() ).animate({'opacity': 1}, 600);
		return false;
	});

	// add line
	$('<span class="grey-line" />').prependTo('.white-section.last-section');

	// question slide toggle
	/*
	if ( !$('.list:eq(2) h5').length ) {
		$('.list:eq(1) .question:last-child').addClass('last-question');
	}	

	$('.last-question h5 a').click(function(){
		var $self 	= $(this);
		$('.list:eq(2) .question').find('ul, p').stop(true, true).slideToggle();

		$self.stop(true, true).toggleClass('active');
		return false;
	});
*/

	//popup
	$('.locations-center .lists a.orange-btn, .orders .lists a.orange-btn').colorbox({
		href: $(this).attr('href'),
		opacity: 0.6,
		inline: true
	});

	$('#navigation li:eq(1)').addClass('order-now');

	$(window).on('load', function(){
		loaded_small_img();
		loaded_big_img();
		wide_img_bg();

		$('.question h5 a').addClass('active');
		wide_img_loaded();

		if ( $('#wide-map').length ) {
			wide_map();
		}
		if ( $('#location2-map').length ) {
			location2();
		}
		if ( $('#location-map').length ) {
			location1();
		}
		if ( $('#map1').length ) {
			order_map1();
		}
		if ( $('#map2').length ) {
			order_map2();
		}
		if ( $('#big-map').length ) {
			var main_h = $('.main').outerHeight();
			$('#big-map').css('height', main_h);
			big_map();
		}

		feature_loaded();
	});

	$(window).on('resize', function(){
        slider_resize();
        wide_img_loaded();
        feature_loaded();
        wide_img_bg();
    });
});
