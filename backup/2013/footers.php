<?php
function footer_index(){
global $myv_host;
require_once('./footers/footer_index.php');
}

function footer_expo(){
global $myv_host;
require_once('./footers/footer_expo.php');
}

function footer_login(){
global $myv_host;
require_once('./footers/footer_login.php');
}

function footer_admin(){
global $myv_host;
require_once('./footers/footer_admin.php');
}

function footer_nosotros(){
global $myv_host;
require_once('./footers/footer_nosotros.php');
}

function footer_promesas(){
global $myv_host;
echo <<< EOT
<div class="container">
  <ul class="nav nav-tabs">
				<li><a class="piclink nosotrospic" href="{$myv_host}nosotros">nosotros</a></li>
				<li class="active"><a class="piclink promesaspic" href="{$myv_host}promesas">Promesas</a></li>
				<li><a class="piclink programaspic" href="{$myv_host}programas">Programas</a></li>
                <li><a class="piclink graficaspic" href="{$myv_host}graficas">Gráficas</a></li>
				<li class="last"><a class="piclink aboutpic" href="{$myv_host}about">About</a></li>
  </ul>
    <hr>
	<footer>
	<p>&copy; Mira & Vota 2013</p>
	</footer>
	
</div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{$myv_host}js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="{$myv_host}js/vendor/bootstrap.min.js"></script>

        <script src="{$myv_host}js/main.js"></script>
		<script type="text/javascript">
    $(function () {
        $("[rel='tooltip']").tooltip({
		placement: "right"
		});
    });
	</script>
EOT;
}

function footer_about(){
global $myv_host;
echo <<< EOT
<div class="container">
  <ul class="nav nav-tabs">
				<li><a class="piclink nosotrospic" href="{$myv_host}nosotros">nosotros</a></li>
				<li><a class="piclink promesaspic" href="{$myv_host}promesas">Promesas</a></li>
				<li><a class="piclink programaspic" href="{$myv_host}programas">Programas</a></li>
                <li><a class="piclink graficaspic" href="{$myv_host}graficas">Gráficas</a></li>
				<li class="last active"><a class="piclink aboutpic" href="{$myv_host}about">About</a></li>
  </ul>
    <hr>
	<footer>
	<p>&copy; Mira & Vota 2013</p>
	</footer>
	
</div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{$myv_host}js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="{$myv_host}js/vendor/bootstrap.min.js"></script>

        <script src="{$myv_host}js/main.js"></script>
		<script type="text/javascript">
    $(function () {
        $("[rel='tooltip']").tooltip({
		placement: "right"
		});
    });
	</script>
EOT;
}

function footer_conversor(){

}
?>