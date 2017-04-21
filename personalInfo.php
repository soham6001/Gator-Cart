#!/usr/local/bin/php

<html><head><title>GATOR CART</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>GATOR CART</title>
<link rel="stylesheet" href="form.css" type="text/css">
<div id="container">
<div id="top_div">
<div class="heading">
<font color = "#1E90FF"><h1 align="center"> Gator Cart</h1></font></div></div>


<div class="tool">
<div class="btn-toolbar" role="toolbar">
  <div class="btn-group">
      <button type="button" class="btn btn-info" onClick="window.location.href='usernew.php';">Home</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='My_Account.php';">My Account</button>
    <button type="button" class="btn btn-success" onClick="window.location.href='logout.php';">LogOut</button>
      </div>
    <div class="btn-group">
  <button type="button" class="btn btn-primary" onClick="window.location.href='book.php';">Books</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='cellphone.php';">Electronics</button>
  <button type="button" class="btn btn-primary" onClick="window.location.href='clothing.php';">Clothes</button>
  </div>
 </div></div></div>
</div>    
</div>
</head>
<body>
<div id="bottom_div">



<body></body>>
<div id="bottom_div">
<br><br><br>
<center>
<form name="regForm" action="updateEmail.php" method="post">
<table>
<tr>
<td align="center"><input type="text" name="email" class="form-control" style="width:200%; padding:0 2%;" rows="3" placeholder="Email"></h4><input class="btn btn-primary" type="submit" value="Update Email"><br></td>
</h4></td></tr>
</table>

</form>
</center>
<center>
<form name="regForm" action="updateAdd.php" method="post">
<table>
<tr>
<td align="center"><input type="text" name="street" class="form-control" style="width:200%; padding:0 2%;" rows="3" placeholder="Street"><br></td>
</h4></td></tr>
<tr>
<td align="center"><input type="text" name="city" class="form-control" style="width:200%; padding:0 2%;" rows="3" placeholder="City"></h4><br></td>
</h4></td></tr> 
<tr>
<td align="center"><input type="text" name="state" class="form-control" style="width:200%; padding:0 2%;" rows="3" placeholder="State"></h4><br></td>
</h4></td></tr>
<tr>
<td align="center"><input type="text" name="region" class="form-control" style="width:200%; padding:0 2%;" rows="3" placeholder="Region"></h4><br></td>
</h4></td></tr>
<tr>
<td align="center"><input type="text" name="zip" class="form-control" style="width:200%; padding:0 2%;" rows="3" placeholder="Zip"></h4><input class="btn btn-primary" type="submit" value="Update Address"><br></td>
</h4></td></tr><br>

</table>

</form>
</center>
</div>
</body>
</html>
