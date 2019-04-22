/* JS */


/* Navigation */

$(document).ready(function(){
/*
  $(window).resize(function()
  {
    if($(window).width() >= 765){
      $(".sidebar #nav").slideDown(350);
    }
    else{
      $(".sidebar #nav").slideUp(350); 
    }
  }); */
  
   $(".has_sub > a").click(function(e){
    e.preventDefault();
    var menu_li = $(this).parent("li");
    var menu_ul = $(this).next("ul");

    if(menu_li.hasClass("open")){
      menu_ul.slideUp(350);
      menu_li.removeClass("open")
    }
    else{
      $("#nav > li > ul").slideUp(350);
      $("#nav > li").removeClass("open");
      menu_ul.slideDown(350);
      menu_li.addClass("open");
    }
  });

/* Old Code 

  $("#nav > li > a").on('click',function(e){
      if($(this).parent().hasClass("has_sub")) {
       
		  e.preventDefault();

		  if(!$(this).hasClass("subdrop")) {
			// hide any open menus and remove all other classes
			$("#nav li ul").slideUp(350);
			$("#nav li a").removeClass("subdrop");
			
			// open our new menu and add the open class
			$(this).next("ul").slideDown(350);
			$(this).addClass("subdrop");
		  }
		  
		  else if($(this).hasClass("subdrop")) {
			$(this).removeClass("subdrop");
			$(this).next("ul").slideUp(350);
		  } 
      }   
      
  }); */
});

$(document).ready(function(){
  $(".sidebar-dropdown a").on('click',function(e){
      e.preventDefault();

      if(!$(this).hasClass("open")) {
        // open our new menu and add the open class
        $(".sidebar #nav").slideDown(350);
        $(this).addClass("open");
      }
      
      else{
        $(".sidebar #nav").slideUp(350);
        $(this).removeClass("open");
      }
  });

});

/* Widget close */

$('.wclose').click(function(e){
  e.preventDefault();
  var $wbox = $(this).parent().parent().parent();
  $wbox.hide(100);
});

/* Widget minimize */

$('.wminimize').click(function(e){
	e.preventDefault();
	var $wcontent = $(this).parent().parent().next('.widget-content');
	if($wcontent.is(':visible')) 
	{
	  $(this).children('i').removeClass('fa fa-chevron-up');
	  $(this).children('i').addClass('fa fa-chevron-down');
	}
	else 
	{
	  $(this).children('i').removeClass('fa fa-chevron-down');
	  $(this).children('i').addClass('fa fa-chevron-up');
	}            
	$wcontent.toggle(500);
}); 

/* Calendar */

$(document).ready(function() {
  
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    
    $('#calendar').fullCalendar({
      header: {
        left: 'prev',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,next'
      },
      editable: true,
      events: [
        {
          title: 'All Day Event',
          start: new Date(y, m, 1)
        },
        {
          title: 'Long Event',
          start: new Date(y, m, d-5),
          end: new Date(y, m, d-2)
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: new Date(y, m, d-3, 16, 0),
          allDay: false
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: new Date(y, m, d+4, 16, 0),
          allDay: false
        },
        {
          title: 'Meeting',
          start: new Date(y, m, d, 10, 30),
          allDay: false
        },
        {
          title: 'Lunch',
          start: new Date(y, m, d, 12, 0),
          end: new Date(y, m, d, 14, 0),
          allDay: false
        },
        {
          title: 'Birthday Party',
          start: new Date(y, m, d+1, 19, 0),
          end: new Date(y, m, d+1, 22, 30),
          allDay: false
        },
        {
          title: 'Click for Google',
          start: new Date(y, m, 28),
          end: new Date(y, m, 29),
          url: 'http://google.com/'
        }
      ]
    });
    
});

/* Progressbar animation */

setTimeout(function(){

	$('.progress-animated .progress-bar').each(function() {
		var me = $(this);
		var perc = me.attr("data-percentage");

		//TODO: left and right text handling

		var current_perc = 0;

		var progress = setInterval(function() {
			if (current_perc>=perc) {
				clearInterval(progress);
			} else {
				current_perc +=1;
				me.css('width', (current_perc)+'%');
			}

			me.text((current_perc)+'%');

		}, 200);

	});

},1200);

/* Slider */

$(function() {
	// Horizontal slider
	$( "#master1, #master2" ).slider({
		value: 60,
		orientation: "horizontal",
		range: "min",
		animate: true
	});

	$( "#master4, #master3" ).slider({
		value: 80,
		orientation: "horizontal",
		range: "min",
		animate: true
	});        

	$("#master5, #master6").slider({
		range: true,
		min: 0,
		max: 400,
		values: [ 75, 200 ],
		slide: function( event, ui ) {
			$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		}
	});


	// Vertical slider 
	$( "#eq > span" ).each(function() {
		// read initial values from markup and remove that
		var value = parseInt( $( this ).text(), 10 );
		$( this ).empty().slider({
			value: value,
			range: "min",
			animate: true,
			orientation: "vertical"
		});
	});
});



/* Support */

$(document).ready(function(){
  $("#slist a").click(function(e){
     e.preventDefault();
     $(this).next('p').toggle(200);
  });
});

/* Scroll to Top */


$(".totop").hide();

$(function(){
	$(window).scroll(function(){
	  if ($(this).scrollTop()>300)
	  {
		$('.totop').fadeIn();
	  } 
	  else
	  {
		$('.totop').fadeOut();
	  }
	});

	$('.totop a').click(function (e) {
	  e.preventDefault();
	  $('body,html').animate({scrollTop: 0}, 500);
	});

});

/* jQuery Notification */

$(document).ready(function(){

  setTimeout(function() {noty({text: '<strong>Howdy! Hope you are doing good...</strong>',layout:'topRight',type:'information',timeout:15000});}, 7000);

  setTimeout(function() {noty({text: 'This is an all in one theme which includes Front End, Admin & E-Commerce. Dont miss it. Grab it now',layout:'topRight',type:'alert',timeout:13000});}, 9000);

});


$(document).ready(function() {

  $('.noty-alert').click(function (e) {
      e.preventDefault();
      noty({text: 'Some notifications goes here...',layout:'topRight',type:'alert',timeout:2000});
  });

  $('.noty-success').click(function (e) {
      e.preventDefault();
      noty({text: 'Some notifications goes here...',layout:'top',type:'success',timeout:2000});
  });

  $('.noty-error').click(function (e) {
      e.preventDefault();
      noty({text: 'Some notifications goes here...',layout:'topRight',type:'error',timeout:2000});
  });

  $('.noty-warning').click(function (e) {
      e.preventDefault();
      noty({text: 'Some notifications goes here...',layout:'bottom',type:'warning',timeout:2000});
  });

  $('.noty-information').click(function (e) {
      e.preventDefault();
      noty({text: 'Some notifications goes here...',layout:'topRight',type:'information',timeout:2000});
  });

});


/* Date picker */

$(function() {
    $('#tanggal').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#1').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#2').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#3').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#4').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#5').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#6').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#7').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#8').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#9').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#10').datetimepicker({
      pickTime: false
    });
});


$(function() {
    $('#11').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#12').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#13').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#14').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#15').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#16').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#17').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#18').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#19').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#20').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#21').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#22').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#23').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#24').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#25').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#26').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#27').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#28').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#29').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#30').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#31').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#32').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#33').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#34').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#35').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#36').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#37').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#38').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#39').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#40').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#41').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#42').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#43').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#44').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#45').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#46').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#47').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#48').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#49').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#50').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#51').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#52').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#53').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#54').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#55').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#56').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#57').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#58').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#59').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#60').datetimepicker({
      pickTime: false
    });
});


$(function() {
    $('#61').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#62').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#63').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#64').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#65').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#66').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#67').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#68').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#69').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#70').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#71').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#72').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#73').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#74').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#75').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#76').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#77').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#78').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#79').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#80').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#81').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#82').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#83').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#84').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#85').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#86').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#87').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#88').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#89').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#90').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#91').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#92').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#93').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#94').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#95').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#96').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#97').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#98').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#99').datetimepicker({
      pickTime: false
    });
});

$(function() {
    $('#100').datetimepicker({
      pickTime: false
    });
});


$(function() {
    $('#3').datetimepicker({
      pickTime: false
    });
});




$(function() {
    $('#waktu1').datetimepicker({
      pickDate: false
    });
});

$(function() {
    $('#waktu2').datetimepicker({
      pickDate: false
    });
});


$(function() {
    $('#waktu3').datetimepicker({
      pickDate: false
    });
});

$(function() {
    $('#waktu4').datetimepicker({
      pickDate: false
    });
});

$(function() {
    $('#waktu5').datetimepicker({
      pickDate: false
    });
});

$(function() {
    $('#waktu6').datetimepicker({
      pickDate: false
    });
});

$(function() {
    $('#waktu7').datetimepicker({
      pickDate: false
    });
});

$(function() {
    $('#waktu8').datetimepicker({
      pickDate: false
    });
});
/* On Off pllugin */  
  
$(document).ready(function() {
  $('.toggleBtn').onoff();
});


/* CL Editor */

$(".cleditor").cleditor({
    width: "auto",
    height: "auto"
});

/* Modal fix */

$('.modal').appendTo($('body'));

/* Pretty Photo for Gallery*/

jQuery("a[class^='prettyPhoto']").prettyPhoto({
overlay_gallery: false, social_tools: false
});

/* Slim Scroll */

/* Slim scroll for chat widget */

$('.scroll-chat').slimscroll({
  height: '350px',
  color: 'rgba(0,0,0,0.3)',
  size: '5px'
});

/* Data tables */

$(document).ready(function() {
	$('#data-table-1').dataTable({
	   "sPaginationType": "full_numbers"
	});
});
