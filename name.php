<?php
// Initialize the session
session_start();
require __DIR__ . '/vendor/autoload.php';
use Google\Cloud\Datastore\DatastoreClient;
$projectId = 'cca2patrickjoel';
$datastore = new DatastoreClient([
    'projectId' => $projectId
]);
$key = $datastore->key('user', $_SESSION['username']);
$user = $datastore->lookup($key);

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['change']))
{
    func();
}
function func()
{
    
    session_start();
    $projectId = 'cca2patrickjoel';
    $datastore = new DatastoreClient([
    'projectId' => $projectId
    ]);
    $key = $datastore->key('user', $_SESSION['username']);
    $user = $datastore->lookup($key);

    $exists=0;

    $newname = $_POST['newname'];

   // echo $_POST['newname'];
   // echo $newname;
    echo "Changing Username....";

    if($newname == null){
        $exist = 1;
    }else{
        $exist = 2;
    }


    if($exist == 1){
        echo "User name cannot be empty";
        }else{
            if($exist == 2){
                $transaction = $datastore->transaction();
                $key = $datastore->key('user', $_SESSION['username']);
                $task = $transaction->lookup($key);
                $task['name'] = $newname;
                $transaction->update($task);
                $transaction->commit();
                echo "<script> location.replace('https://cca2patrickjoel.ts.r.appspot.com/main')</script>";
            }else{   
        echo "ERROR";
        
            }
            }
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>name change</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="/stylesheets/main.css" />
    <body>
    <div class="header">
  <h1>Change Name <?php echo $user['name'];?></h1>
  <h2>EDIT YOUR PROFILE</h2>
</div>
<ul>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/main">Home</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/data">Growth Data</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/files">Files</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/search">Search Videos</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/maps">Maps</a></li>
  <li><a href="#about">About</a></li>
  <li><a class="active" href="https://cca2patrickjoel.ts.r.appspot.com/profile">Profile</a></li>
</ul>
<div class="mainvideo">
<p>Logged in as <?php echo $user['name']; ?></p><br> 
    <p>Change your name here:</p>
        <form action = "https://cca2patrickjoel.ts.r.appspot.com/name" method="post">
            <p>Name: <input type="text" name="newname"></p><br>
            <div><input type="submit" name="change" class="button" value="CHANGE"></div>
        </form>
        <button type="button" class="button" href="https://cca2patrickjoel.ts.r.appspot.com/main">Return to Main</button>
    </div> 
        <div class="footer">
  <p>Developed By Patrick Jones S3661943 & Joel Jacob 3660851 for Cloud Computing COSC2626/2640 Assignment 2</p>
</div>
    </body>
</html>
