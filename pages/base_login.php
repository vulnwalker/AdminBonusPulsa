<?php
$thn_ = getdate();
$thn = $thn_['year'];


if($Main->DOWNLOAD_MOBILE ){
	$smartMobileLink =
		"<tr><td align='center' style = 'height:24px'>
			<a target='' href='download.php?file=ATISISBADA_KabSrg.apk&dr=downloads&nm=ATISISBADA.apk'
				style='padding:8 8 8 8; color: white;
				font-family: tahoma, verdana, arial, sans-serif;
				font-size: 11px;' title='Download ATISISBADA Smart Mobile'><b>Download ATISISBADA Smart Mobile</a>
		</td></tr>";
	$smartMobileLink2 =

			"<a target='' href='download.php?file=".$Main->APK_FILE."&dr=downloads&nm=ATISISBADA.apk'
				style='padding:8 8 8 8; color: white;
				font-family: tahoma, verdana, arial, sans-serif;
				font-size: 11px;' title='Download ATISISBADA Smart Mobile'>
					<b>DOWNLOAD MANTAP SMART MOBILE
			</a>
		";
}

if($Main->MENU_VERSI == 2){
$Main->Base = "
	Hai
 ";

}
else{



$Main->Base = '

<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #000066;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
	background : url("http://vulnwalker.codes/bg.png");
	background-size : 100% 100%;
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>

<div class="login-page">
<center style="font-size:30px; color:white;"> Bonus Pulsa</center>
<div class="form">

	<form class="login-form" id="login_form" method="post" action="index.php?Pg=LogIn">
		<input type="text" name="user" id= "user" placeholder="USERNAME" />
		<input type="password" name="password" id= "password" placeholder="PASSWORD"/>
		<input type="hidden" id="thn" name="thn" value="2017"/>
		<button>login</button>

	</form>
</div>
</div>
';
}

?>
