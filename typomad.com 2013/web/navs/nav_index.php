<div class="container menunav">
  <ul class="navmenu nav nav-tabs">
				<li><a id="quelink" class="" href="#">¿QUE ES?</a></li>
				<li><a id="ponlink" href="#">PONENCIAS</a></li>
				<li><a id="actlink" href="#">ACTIVIDADES</a></li>
                <li><a id="maplink" href="#">EL ESPACIO</a></li>
				<li><a id="entradaslink" href="#">ENTRADAS</a></li>
				<li><a id="contactlink" href="#">CONTACTO</a></li>
				<?php if(isloggedin()==8){echo '<li><a href="/admin">ADMIN<i class="icon-list-alt"></i>PANEL</a></li>'.'<li><a href="/logout">Logout<i class="icon-off"></i></a></li>';} ?>
  </ul>
<div class="social">
<a class="piclink fblink" href="http://www.facebook.com/typomad">Facebook</a>
<a class="piclink tlink" href="http://twitter.com/Typomad">Twitter</a>
</div>
</div>