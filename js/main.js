function getDomain(){
	var matches = window.location.href.match(/^https?\:\/\/([^\/?#]+)(?:[\/?#]|$)/i);
	return matches && matches[1] + '/public/papayamp';
}
var domain = getDomain();
var country_name;
jQuery(document).ready(function($){  
	  
});

jQuery(document).ready(function($){
	// Get instant pricing dropdown
	var inline_dropdown_wrap = $('.form-inline').find('.dropdown-wrap');
	var inline_dropdown_menu = inline_dropdown_wrap.find('.dropdown-menu');
	var inline_dropdown_button = inline_dropdown_wrap.find('.drop-input');
	
	
	var inline_dropdown_menu_elem = inline_dropdown_menu.find('li');
	
	inline_dropdown_menu_elem.click(function(e){
		e.preventDefault();
		
		var inline_dropdown_menu_elem_text = $(this).find('a').text();
		
		inline_dropdown_button.html(inline_dropdown_menu_elem_text + '<span class="caret"><span>');
		
		var inline_index_elem = $(this).index() + 1;
		
		var inline_talk_selected_elem = $('.form-inline').find('.select-wrap select option:nth-child('+inline_index_elem+')').attr('selected', 'selected');
	});
	
	
	
	function echoAjaxSection3(){
		/*
		service_id, country_name
		if(service_id ===0){
			service_id = $('#iwantselect').val();
		}
		if(country_name ===0){
			
		}
		*/
		service_id = $('#iwantselect').val();
		country_name = $('#inselect').val();
		console.log(service_id, country_name);
		
		$.ajax({
			url: 'http://' + domain + '/wp-admin/admin-ajax.php',  
			type: 'POST',  
			data:{
				action: 'echoSecion3firstBlock', 
				country_name:country_name, 
				country_code:$('#inselect').find(':selected').attr('country_code'), 
				service_id:service_id
			},
			success:function(data) {
				$('#firstBlock').text('');
				$('#firstBlock').append(data);
			}
		});
	}	
	
	$('#Learn_more').live('click',function(){
		$('#inselect_field, #inselect').val($(this).attr('country_name'));
		$('#iwantselect').val($(this).attr('service_id'));
		
		//$(this).attr('service_id'), $(this).attr('country_name')
		echoAjaxSection3();
		setTimeout(function(){
			$('html, body').animate({
				scrollTop: $("#firstBlock").offset().top-230
			}, 1000);
		},500);
		
		
		
	});
	
	$.ajax({
		url: 'http://' + domain + '/wp-admin/admin-ajax.php',  
		type: 'POST',  
		data:{action: 'echoSection5'},
		success:function(data) {
			$('section.section-5').html(data);
		}
	});
	 
	/*
    $( "#inselect" ).autocomplete({
		source: country_name,
        autoFocus: true,
        minLength: 1
    });
	
	*/
	$('#Get_Instant_Pricing').bind('click',function(e){
		e.preventDefault();
		if($('#inselect').val() ==''){
			$('#inselect_field').focus();
			return;
		}
		if($('#iwantselect').val() ==''){
			$('#iwantselect').focus();
			return;
		}
		
		echoAjaxSection3();
		
		$.ajax({
			url: 'http://' + domain + '/wp-admin/admin-ajax.php',  
			type: 'POST',  
			data:{action: 'echoSection5', 
				country_name:$('#inselect').val(), 
				country_code:$('#inselect').find(':selected').attr('country_code'), 
				service_id:$('#iwantselect').val() 
			},
			success:function(data) {
				$('section.section-5').html(data);
			}
		});
		
		
	});
	
	/* Init Flexslider */
	$('.flexslider').flexslider({
		animation: "slide",
		animationLoop: false,
		itemWidth: 210,
		itemMargin: 5,
		minItems: 2,
		maxItems: 4
	});
	
	/* Open popup form */
	$(document).on('click', '.open-popup-form', function(e){
		e.preventDefault();
		$('.contact-wrap').css('display', 'block');
		$('#wpcf7-f50-o1').css('display', 'block');
		$('.talk-success-message').css('display', 'none');
	});
	
	

	/* Esc */
	$(document).keyup(function(e){
		if (e.keyCode == 27){
			$('.contact-wrap').css('display','none');
		}	
	});
	
	/* Talk to us form */
	var talk_form = $('#wpcf7-f50-o1 form');
	
	// Dropdown 
	var dropdown_wrap = talk_form.find('.dropdown-wrap');
	var dropdown_menu = dropdown_wrap.find('.dropdown-menu');
	var dropdown_button = dropdown_wrap.find('.drop-input');
	
	var dropdown_button_start_text = dropdown_button.html();
	var dropdown_menu_elem = dropdown_menu.find('li');
	
	dropdown_menu_elem.click(function(e){
		e.preventDefault();
		
		var dropdown_menu_elem_text = $(this).find('a').text();
		
		dropdown_button.html(dropdown_menu_elem_text + '<span class="caret"><span>');
		
		var index_elem = $(this).index() + 1;
		
		var talk_selected_elem = talk_form.find('.select-wrap span select option:nth-child('+index_elem+')').attr('selected', 'selected');;
	});
	
	$('.cancel-form').click(function(e){
		e.preventDefault();
		$('.contact-wrap').css('display', 'none');
		talk_form[0].reset();
		talk_form.find('input').attr('aria-invalid', 'false');
		$('span.wpcf7-not-valid-tip').remove();
		dropdown_button.html(dropdown_button_start_text);
		talk_form.find('input').removeClass('wpcf7-not-valid');
	});
	
	$('.keep-btn').click(function(e){
		e.preventDefault();
		$('.contact-wrap').css('display', 'none');
		talk_form[0].reset();
		talk_form.find('input').attr('aria-invalid', 'false');
		$('span.wpcf7-not-valid-tip').remove();
		dropdown_button.html(dropdown_button_start_text);
		$('.contact-wrap form .wpcf7-mail-sent-ok').remove();
	});
	
		/* Esc */
		$(document).keyup(function(e){
			if (e.keyCode == 27){
				$('.contact-wrap').css('display', 'none');
				talk_form[0].reset();
				talk_form.find('input').attr('aria-invalid', 'false');
				$('span.wpcf7-not-valid-tip').remove();
				dropdown_button.html(dropdown_button_start_text);
				talk_form.find('input').removeClass('wpcf7-not-valid');
				/********************/
			}	
		});
		
		
});	



jQuery(document).ready(function($){
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
		  .attr( "placeholder", "Country" )
		  .attr( "id", "inselect_field" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            classes: {
              "ui-tooltip": "ui-state-highlight"
            }
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
 
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Show All Items" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .on( "mousedown", function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .on( "click", function() {
            input.trigger( "focus" );
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
 
    $( "#inselect" ).combobox();
    
  } ); 
  