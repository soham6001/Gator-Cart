#!/usr/local/bin/php
<?php
$msg=$_GET['v'];
?>
<html>
<head>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Gator Cart</title>
<link rel="stylesheet" href="form.css" type="text/css">
<!--<link href="css/custom.css" rel="stylesheet">-->
<div id="container">
<div id="top_div">
<div class="heading">
<font color="#1E90FF"><h1 align="CENTER">Gator Cart</h1></font>

<div class="module">

      <form method="post" class="form-signin" action="login2.php">
        <font color="#1E90FF"><h2>Login</h2>
        <input type="text" placeholder="User Name" name="myusername" required />
        <input type="password" placeholder="Password" name="mypassword" required />
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label><br>
        <button class="btn btn-large btn-success" type="submit" >Sign in</button>
		<button class="btn btn-large btn-success" type="button" onClick="window.location.href='regn.php';">Register</button><br>
    <font color="red"><?PHP echo $msg; ?></font>
      </form>
</div>


	
   	

</div></div></div>
</div>    
</div>
</head>

</html>
