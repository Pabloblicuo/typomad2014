<div class="container" style="margin-top:80px;">
</div>
<div class="container-fluid">
  <div class="row-fluid">
	
<div class="span8 offset2">
<!--Body content-->
<table class="table">
<thead>
              <tr>
                <th><h1>Iniciar Sesión</h1></th>
              </tr>
            </thead>
<tbody>
<form name="login" method="post" action="/login.php">
<tr>
<td>
<label>Usuario o Email</label>
<input type="text" name="user" maxlength="254"/><br />
</td>
</tr>
<tr>
<td>
<label>Contraseña</label>
<input type="password" name="pass" /><br />
<input type="hidden" maxlength="10" value="" name="epoch">
</td>
</tr>
<tr>
<td>
<input type="submit" class="btn btn-primary" value="Entrar" onclick='epochTime(this.form)'/>
</form>
</td>
</tr>
</tbody>
			</table>
            </div>
	
	
  </div>
</div>