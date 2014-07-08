
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/js/jquery-1.9.1.min.js"><\/script>')</script>
		<script type="text/javascript" src="/js/jquery.scrollTo.min.js"></script>
		<script type="text/javascript" src="/js/jquery.easing.min.js"></script>

        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/main.js"></script>
		<script src="/js/jquery.masonry.min.jsa"></script>
		<script src="/js/packery.pkgd.min.jsa"></script>
		<script src="/js/jquery.isotope.min.js"></script>
		<script src="/js/jquery.cycle.lite.js"></script>
		<script src="/js/jquery.client.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;region=ES"></script>

<script>
/* document.write($.client.os+' '+navigator.userAgent) */

		/* $('#os').html("Your browser is running on: <b>" + $.client.os + "</b>");
		$('#browser').html("Your browser is: <b>" + $.client.browser + "</b>");
if (navigator.userAgent.indexOf('Mac OS X') != -1) {
  $("body").addClass("mac");
} else {
  $("body").addClass("pc"); 
}*/

if ($.client.os=='Mac'){
	$('.element').addClass("mac");
	}

/* if ($.client.os=='Windows'){
	$('.element').addClass("mac");
	} */

    $(document).ready(function(){
      
      var $container = $('#container');
      
      $container.isotope({
        itemSelector: '.element',
		layoutMode : 'masonry',
		//resizesContainer: true,
		masonry: {
            columnWidth: 4
        },
		getSortData: {
            selected: function ($element) {
                return ($element.hasClass('selected') ? -1000 : 0) + $element.index();
            }
		},
		sortBy: 'selected'
      });
	  
	$('.element').click(function () {

        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            $(this).children('.big').hide();
            $(this).children('.little').show();
        } else {
            $(this).addClass('selected');
            $(this).children('.little').hide();
            $(this).children('.big').show();
        }

        /*$container.isotope('shuffle');*/
        $container.isotope('reLayout');
    });

});

$(".elementA").click(function(){
     window.location=$(this).attr("href"); 
     return false;
});

$(".pseudolink").click(function(){
     window.open($(this).attr("href"), '_blank'); 
     return false;
});

$('.slideshow').cycle();

$(window).on('resize', function(){
    $('#container').isotope('reLayout')
});

/* $(".element").click(function(){
     window.location=$(this).find("a").attr("href"); 
     return false;
}); */
	
/* 	$(document).ready(function () {

    var $container = $('#container');
    $items = $('.item');

    $container.isotope({
        itemSelector: '.item',
        masonry: {
            columnWidth: 90
        },
        getSortData: {
            selected: function ($item) {
                return ($item.hasClass('selected') ? -1000 : 0) + $item.index();
            }
        },
        sortBy: 'selected'
    });

    $('.item').click(function () {

        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            $(this).children('.maximise').hide();
            $(this).children('.minimise').show();
        } else {
            $(this).addClass('selected');
            $(this).children('.minimise').hide();
            $(this).children('.maximise').show();
        } */

        /*$container.isotope('shuffle');*/
        /* $container.isotope('reLayout');
    });

}); */
	
/*  $container.find('.item').live('click', function() {
        if ($(this).is('.large')) {
        jQuerycontainer.find('.large').each(function(){
        jQuery(this).toggleClass('large');  });
        } else {
            jQuery('.large > .item-content');
            jQuery('.large > .thumb');
            jQuery('.large > h3');
            $container.find('.large').removeClass('large');

            jQuery('.item-content', this).fadeToggle("fast", "linear");
            jQuery('.thumb', this).fadeToggle("fast", "linear");
            jQuery('h3', this).fadeToggle("fast", "linear");
            $(this).toggleClass('large');
            $container.isotope('reLayout');

        }
    }); */
  </script>

<script type="text/javascript">

function mapload(){

  var point = new google.maps.LatLng(40.391500,-3.697900);

  var myMapOptions = {
    zoom: 17,
    center: point,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
	disableDefaultUI: true,
	/* zoom: 4,
    center: new google.maps.LatLng(-33, 151), */
    panControl: true,
    zoomControl: true,
  zoomControlOptions: {
    style: google.maps.ZoomControlStyle.SMALL
  },
	scrollwheel: false,
    scaleControl: false,
  };
  
  var styles = [
{
    featureType: "all",
    elementType: "all",
    stylers: [
      { hue: "#ff0000" },
	  { saturation:	-100 }
    ]
  }
];



  var map = new google.maps.Map(document.getElementById("map"),myMapOptions);
  
  map.setOptions({styles: styles});

  var image = new google.maps.MarkerImage(
    '/img/marker-images/gmaps.png',
    new google.maps.Size(98,89),
    new google.maps.Point(0,0),
    new google.maps.Point(0,89)
  );

  var shadow = new google.maps.MarkerImage(
    '/img/marker-images/shadow.png',
    new google.maps.Size(146,89),
    new google.maps.Point(0,0),
    new google.maps.Point(0,89)
  );

  var shape = {
    coord: [79,0,83,1,85,2,87,3,88,4,90,5,91,6,92,7,94,8,94,9,95,10,95,11,96,12,96,13,97,14,97,15,97,16,97,17,97,18,97,19,97,20,97,21,97,22,97,23,97,24,97,25,97,26,97,27,97,28,97,29,97,30,97,31,97,32,97,33,96,34,96,35,95,36,95,37,95,38,94,39,94,40,93,41,93,42,93,43,92,44,92,45,91,46,90,47,90,48,89,49,89,50,88,51,88,52,88,53,88,54,88,55,88,56,87,57,87,58,87,59,87,60,86,61,86,62,86,63,86,64,86,65,86,66,86,67,86,68,86,69,86,70,86,71,86,72,86,73,87,74,87,75,87,76,88,77,88,78,87,79,87,80,87,81,87,82,85,83,32,84,32,85,31,86,30,87,30,88,18,88,18,87,16,86,16,85,16,84,15,83,14,82,14,81,14,80,14,79,13,78,12,77,12,76,12,75,11,74,10,73,10,72,10,71,9,70,9,69,9,68,9,67,9,66,9,65,9,64,4,63,3,62,4,61,3,60,3,59,10,58,10,57,10,56,10,55,10,54,11,53,10,52,10,51,9,50,9,49,8,48,8,47,7,46,6,45,6,44,5,43,5,42,5,41,4,40,4,39,3,38,3,37,3,36,2,35,2,34,2,33,1,32,1,31,1,30,1,29,1,28,1,27,1,26,0,25,0,24,0,23,0,22,0,21,0,20,0,19,0,18,1,17,1,16,1,15,1,14,2,13,2,12,3,11,4,10,4,9,5,8,6,7,7,6,8,5,10,4,11,3,13,2,15,1,19,0,79,0],
    type: 'poly'
  };

  var marker = new google.maps.Marker({
    draggable: false,
    raiseOnDrag: false,
    icon: image,
    /* shadow: shadow, */
    shape: shape,
    map: map,
	title:"Typo_Mad!",
    position: point
  });

var infoWindow = new google.maps.InfoWindow({ 
content: '<p class="maptip">Plaza de Legazpi, 8. 28045 Madrid</p>' 
}); 

google.maps.event.addListener(marker, 'click', function() { 
infoWindow.open(map, marker); 
});


}

</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#quelink').click(function() {
        $.scrollTo('#que', 1000, {
            easing: 'easeOutQuint',
			offset:-95
        });
    });
	
	$('#maplink').click(function() {
        $.scrollTo('#map', 1000, {
            easing: 'easeOutQuint',
			offset:-158
        });
    });
	
	$('#ponlink').click(function() {
        $.scrollTo('#ponencias', 1000, {
            easing: 'easeOutQuint',
			offset:-85
        });
    });
	
	$('#actlink').click(function() {
        $.scrollTo('#actividades', 1000, {
            easing: 'easeOutQuint',
			offset:-85
        });
    });
	
	$('#expolink').click(function() {
        $.scrollTo('#expo', 1000, {
            easing: 'easeOutQuint',
			offset:-55
        });
    });
	
	$('#entradaslink').click(function() {
        $.scrollTo('#entradas', 1000, {
            easing: 'easeOutQuint',
			offset:-90
        });
    });
	
	$('.entradaslink').click(function() {
        $.scrollTo('#entradas', 1000, {
            easing: 'easeOutQuint',
			offset:-85
        });
    });
	
	$('#contactlink').click(function() {
        $.scrollTo('#contact', 1000, {
            easing: 'easeOutQuint',
			offset:-85
        });
    });
	
	 // invoke the carousel
   $('.myCarousel').carousel({
     interval: 2000
    });
});
//easeOutCubic easeOutQuart easeOutQuint

$(function() {

    $('.accordion').on('show', function (e) {
         $(e.target).prev('.accordion-heading').find('.accordion-toggle').removeClass('accordion-normal').addClass('accordion-active');
    });
    
    $('.accordion').on('hide', function (e) {
        $(this).find('.accordion-toggle').not($(e.target)).removeClass('accordion-active').addClass('accordion-normal');
    });
        
});

/* $('#container').isotope({
  // options
  itemSelector : '.item',
  layoutMode : 'fitRows'
}); */


</script>

<script type="text/javascript">
/*     var $container = null;

    $(function () {

        $container = $('#isotope');

        // add random heights and widths
        $container.find('.element').each(function () {
            var $this = $(this);
            var number = parseInt($this.find('.number').text(), 10);
            if (number % 7 % 2 === 1) {
                $this.addClass('width2');
            }
            if (number % 3 === 0) {
                $this.addClass('height2');
            }
        });

        // set the widths on page load
        setWidths();

        // initialize Isotope
        $container.isotope({
            sortBy: 'number',
            getSortData: {
                number: function ($elem) {
                    var number = $elem.hasClass('element') ?
                        $elem.find('.number').text() :
                        $elem.attr('data-number');
                    return parseInt(number, 10);
                },
                alphabetical: function ($elem) {
                    var name = $elem.find('.name'),
                        itemText = name.length ? name : $elem;
                    return itemText.text();
                }
            },
            resizable: false, // disable normal resizing
            // set columnWidth to a percentage of container width
            masonry: { columnWidth: getUnitWidth() }
        });

        // update columnWidth on window resize
        $(window).smartresize(function () {
            // set the widths on resize
            setWidths();
            // reinit isotop
            $container.isotope({
                // update columnWidth to a percentage of container width
                masonry: { columnWidth: getUnitWidth() }
            });
        });

    });

    // get the column width per unit.
    // an item may be multiple units tall or wide, but we need to figuire out the unit dynamically on resize
    function getUnitWidth() {
        var width;
        if ($(".visible-phone").is(":visible")) {
            width = $container.width() / 2;
        } else if ($(".visible-tablet").is(":visible")) {
            width = $container.width() / 3;
        } else {
            width = $container.width() / 5;
        }
        return width;
    }

    // set all the widths to the elements
    function setWidths() {
        var unitWidth = getUnitWidth() -1;
        $container.children(":not(.width2)").css({ width: unitWidth });
        $container.children(".width2").css({ width: (unitWidth * 2) });
        $container.children(":not(.height2)").css({ height: unitWidth });
        $container.children(".height2").css({ height: (unitWidth * 2) });
    }
 */
</script>

<script type="text/javascript">
		$(function(){
$('#container').masonry({
  itemSelector: '.entry',
  columnWidth: 50,
  isAnimated: true
});
});
</script>