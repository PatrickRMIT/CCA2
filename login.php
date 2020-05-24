<?php
require __DIR__ . '/vendor/autoload.php';
use Google\Cloud\Datastore\DatastoreClient;
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['login']))
{
    func();
}
function func()
{

session_start();
//Receive input from clint side
$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION["username"] = $username;

$projectId = 'cca2patrickjoel';
$datastore = new DatastoreClient([
    'projectId' => $projectId
]);
$key = $datastore->key('user', $_SESSION['username']);
$user = $datastore->lookup($key);
//check if the input exist
    $exist = 2;
        

        
        if($username == null && $password == null ){
        $exist = 2;
            }else{
            if($username == $user['id'] && $password == $user['password'] ){
                   $exist = 1;
                   $_SESSION['login'] = "YES";
        }else{
            $exist = 0;
    }		 
}

    if($exist == 1){
    echo "<script> location.replace('https://cca2patrickjoel.ts.r.appspot.com/main')</script>";

    }else{
        if($exist == 2){
        }else{   
    echo "incorrect username or password.";
    
    }

    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="/stylesheets/main.css" />
    <body>
    <div class="header">
  <h1>WECLOME TO SOCIAL DASHBOARD</h1>
  <h2>Please log in below</h2>
</div>
<div class="login">
        <form action = "https://cca2patrickjoel.ts.r.appspot.com" method="post">
            Email:  <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <div><input type="submit" name="login"value="Login"></div>
        </form>
        </div>

        <div class="footer">
  <p>Developed By Patrick Jones S3661943 & Joel Jacob 3660851 for Cloud Computing COSC2626/2640 Assignment 2</p>
</div>

    </body>
</html> 
