<?php 
require_once('./mysqli_connect.php');
require_once('./common-functions.php');
global $mysqli;

function get_items(){
global $mysqli;
$query = 'SELECT id, name, namelink, author, authorlink, description, tags, img_number FROM expo';

if ($result = $mysqli->query($query)) {
    /* fetch object array */
    while ($row = $result->fetch_row()) {
	/* .$row[2], $row[3], $row[4], $row[5]; */
        echo '<div class="element ponente triple isotope-item '.$row[6].'">
		<div class="little">
        <p class="title">'.$row[1].'</p>'.
		'<img class="thumb over" src="/img/expo/'.$row[0].'_'.'1'.'_'.'2'.'.jpg'.'" />'.
		'<img class="thumb" src="/img/expo/'.$row[0].'_'.'1'.'_'.'2'.'.jpg'.'" />'.//might want to add tinted version here
        '</div>'.
		'<div class="big">
	  <p class="title">'.$row[1].'</p>';
	  for ($i = 1; $i <= $row[7]; $i++) {
	  echo '<img class="head-element" src="/img/expo/big/'.$row[0].'_2_'.$i.'.jpg'.'">';
		}
	echo '<p class="title"><a href="'.$row[4].'">'.$row[3].'</a></p>
	  <p class="title subtitle">'.$row[1].'</p>
	  <p class="title description">'.$row[5].'
	  </p>';
	 if (!empty($row[2])){
	 echo '<p class="title"><a href="'.$row[2].'" target="_blank">Link al proyecto</a></p>';
	 }
	 echo '</div></div>';
    }

    /* free result set */
    $result->close();
	
	
}
$mysqli->close();
}


?>
<?php /* <div class="container" style="margin-top:80px;background:none;">
</div> */ ?>
<div class="container" style="margin-top:0px;width:100%;height:162px;background-image:url('/img/expo_cabez.jpg');background-repeat:no-repeat;background-position:center top; ">
</div>	
<div class="container" style="margin-top:25px;">
<div class="span12 center">

<?php /* <h1 class="titled">EXPO</h1>
  <ul id="filters">
  <li><a href="#" data-filter="*">show all</a></li>
  <li><a href="#" data-filter=".other">metal</a></li>
  <li><a href="#" data-filter=".othera">transition</a></li>
  <li><a href="#" data-filter=".alkali, .alkaline-earth">alkali and alkaline-earth</a></li>
  <li><a href="#" data-filter=":not(.transition)">not transition</a></li>
  <li><a href="#" data-filter=".metal:not(.transition)">metal but not transition</a></li>
</ul> */ ?>
<ul id="filters">
  <li><a href="#" data-filter=".1">Han comprado tipografías</a></li>
  <li><a href="#" data-filter=".2">0 - 80 tipos en su ordenador</a></li>
  <li><a href="#" data-filter=".3">80 - 200 tipos en su ordenador</a></li>
  <li><a href="#" data-filter=".4">200 - 100 tipos en su ordenador</a></li>
</ul>
<ul id="filters">
  <li><a href="#" data-filter=".1a">Estudiantes</a></li>
  <li><a href="#" data-filter=".2a">Trabajadores</a></li>
  <li><a href="#" data-filter=".3a">Estudiaron diseño gráfico</a></li>
  <li><a href="#" data-filter=".4a">Estudiaron diseño</a></li>
</ul>
<ul id="filters">
  <li><a href="#" data-filter=".1b">Diseñan letras amateur</a></li>
  <li><a href="#" data-filter=".2b">Usan Fontlab</a></li>
  <li><a href="#" data-filter=".3b">Usan Gliphs</a></li>
  <li><a href="#" data-filter=".4b">Usan Fontforge</a></li>
</ul>
<ul id="filters">
  <li><a href="#" data-filter=".1c">Typomad</a></li>
  <li><a href="#" data-filter=".2c">2013 Type Generation</a></li>
</ul>

	<div id="container" class="photos clearfix isotope" style="position: relative; overflow: hidden; height: 1470px;">
    
	<?php get_items(); ?>
    
  </div>

<br /><br />

</div>    
</div>
<div class="container" style="margin-top:45px;width:100%;background-color:#D8DF25;">
<div class="span8 offset1 center">
<h1 id="something_else" class="titled black">SOMETHING ELSE</h1>
<p class="white">Awesomely cool, yeah, something, we don't know what, but we're cool people, so what?
Doesn't really matter, yeah, I think that's the name of crappy song of David Guetta, but who cares?
That is kinda weird, I mean, why all those paragraphs are questions at the end?
It's fucked up...
</p>

<div class="centered">
<a href="/download/Bases_Expo_typomad2013.pdf" target="_blank" class="btn btn-static btnew btnlimeback" style="margin-top:25px;margin-bottom:15px;">DESCARGA LAS BASES</a>
</div>

<div class="row" style="margin-top:-5px;">
        <div class="span4 doubles">
<h1 id="yet_another_something_else" class="titled" style="color:black;">TDC EXHIBITION</h1>
<p class="white expo">La actividad de cierre del festival será la inauguración de la Type Directors Club Exhibition. La prestigiosa organización presenta una muestra de los mejores trabajos tipográficos de todo el mundo durante el último año. Las últimas tendencias y los mejores diseñadores y tipógrafos en una exposición que  podrá visitarse en Matadero a partir del 10 de octubre.</p>
        </div>
        <div class="span4 doubles">
<h1 id="yet_another_something_else" class="titled" style="color:black;">2013 TYPE GENERATION</h1>
<p class="white expo">La editorial Tipo e y TypoMad te traen la Exposición de Tipografías de Estudiantes 2013 organizada bajo el paraguas de la Ampersand Conference (Inglaterra). La muestra aglutina mas de cien especímenes tipográficos de estudiantes  de 41 universidades y escuelas repartidas por todo el mundo, un escaparate perfecto para conocer a la futura generación de diseñadores de tipos.
</p>
       </div>
        </div>
<div class="carousel slide carousel-fade presentation myCarousel" style="margin-top:25px;"><!-- class of slide for animation -->
  <div class="carousel-inner">
<div class="item active">
      <img src="/img/slider/1tdc.jpg" style="width:100%;height:auto;" alt="" />
    </div>
<div class="item">
      <img src="/img/slider/2amper.jpg" style="width:100%;height:auto;" alt="" />
    </div>
<div class="item">
      <img src="/img/slider/3amper.jpg" style="width:100%;height:auto;" alt="" />
    </div>
</div>
</div>
		
<br/>
</div>
</div>


<div class="container">

      <hr>

      <footer>
        <p>© Typomad 2013</p>
      </footer>

    </div>
	
<!-- Piwik -->
<script type="text/javascript"> 
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://piwik.lvis.co//";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();

</script>
<noscript><p><img src="http://piwik.lvis.co/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Code -->
  