
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['signin']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password,Status,id FROM tblemployees WHERE EmailId=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
 foreach ($results as $result) {
    $status=$result->Status;
    $_SESSION['eid']=$result->id;
  } 
if($status==0)
{
$msg="Votre compte est désactivé";
} else{
$_SESSION['emplogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'apply-leave.php'; </script>";
} }

else{
  
  echo "<script>alert('Détails non valides');</script>";

}

}

?><!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>RH_GCB | Authentification</title>
        <link href="https://fontawesome.com/icons/envelope" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <style>
* {
  box-sizing: border-box;
}
body {
  margin: 0;
  font-family: sans-serif;
}
a {
  color: #666;
  font-size: 14px;
  display: block;
}
.login-title {
  text-align: center;
}
#login-page {
  display: flex;
}
.notice {
  font-size: 13px;
  text-align: center;
  color: #666;
}
.login {
  width: 30%;
  height: 100vh;
  background: #FFF;
  padding: 70px;
  
}
.login a {
  margin-top: 25px;
  text-align: center;
}
.form-login {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  align-content: center;
}
.form-login label {
  text-align: left;
  font-size: 13px;
  margin-top: 10px;
  margin-left: 20px;
  display: block;
  color: #666;
}
.input-user,
.input-password {
  width: 100%;
  background: #DDD;
  border-radius: 10px;
  margin: 4px 0 10px 0;
  padding: 10px;
  display: flex;
}
.icon {
  padding: 4px;
  color: #666;
  min-width: 30px;
  text-align: center;
}
input[type="text"],
input[type="password"] {
  width: 100%;
  border: 0;
  background: none;
  font-size: 16px;
  padding: 4px 0;
  outline: none;
}
.submit{
  width: 100%;
  border-radius: 10px;
  padding: 14px;
  background:rgba(0, 0, 255, .7);
  color: #FFF;
  display: inline-block;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
  margin-top: 10px;
  
}
.submit :hover {
  opacity: 0.9;
}
.background {
  width: 70%;
  padding: 40px;
  height: 100vh;
  background: linear-gradient(60deg,rgba(0, 0, 255, .3), rgba(0, 0, 255, 0.7)), url('https://cdn.pixabay.com/photo/2016/03/09/09/22/workplace-1245776_960_720.jpg') center no-repeat;
  background-size: cover;
  display: flex;
  flex-wrap: wrap;
  align-items: flex-end;
  justify-content: flex-end;
  align-content: center;
  flex-direction: row;
}
.background h1 {
  max-width: 500px;
  color: lightblue;
  text-align: center;
  padding: 0;
  margin-top: 450px;
  margin-right:170px;
}
.background p {
  max-width: 650px;
  color: #1a1a1a;
  font-size: 15px;
  text-align: right;
  padding: 0;
  margin: 15px 0 0 0;
}
.created {
  margin-top: 10px;
  text-align: center;
}
.created h3{
  color:rgba(9, 42, 73, .7);
}
.created a {
  color: #666;
  font-weight: normal;
  text-decoration: none;
  margin-top: 0;
}
</style>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>
    <div id="login-page">
  <div class="login">
  <br><br><br><br>
    <h2 class="login-title">Connexion</h2>
    <form class="form-login" action="" method="post">
      <!--<label for="user">Nom d'utilisateur</label>-->
      <div class="input-user">
        <i class="fas fa-envelope icon"></i>
        <input type="text" placeholder="Nom d'utilisateur" id="username" name="username" required>
      </div>
      <!--<label for="password">Mot de passe</label>-->
      <div class="input-password">
        <i class="fas fa-lock icon"></i>
        <input type="password" placeholder="Mot de passe" id="password" name="password" required>
      </div>
      <input class="submit" type="submit" value="Se connecter" name="signin">
    </form>
    <div class="created">
      <h3>Veuillez vous connecter pour accéder à votre espace</h3>
    </div>
  </div>
  <div class="background">
    <!--<h1>Veuillez vous connecter pour accéder à votre espace</h1>-->
    <p></p>
  </div>
</div>
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        
    </body>
</html>