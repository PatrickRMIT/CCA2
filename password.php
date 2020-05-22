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
    $exists=0;
    $actualoldpassword = $user['password'];
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];

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

    $actualoldpassword = $user['password'];
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];

        if($oldpassword == $actualoldpassword){
        $exist = 2;
    }else{
        $exist = 1;
    }
    


    if($exist == 1){
        echo "User password is incorrect";
        }else{
            if($exist == 2){
                $projectId = 'cca2patrickjoel';
                $datastore = new DatastoreClient([
                'projectId' => $projectId
                ]);

                $transaction = $datastore->transaction();
                $key = $datastore->key('user', $_SESSION['username']);
                $task = $transaction->lookup($key);
                $task['password'] = $newpassword;
                $transaction->update($task);
                $transaction->commit();
                echo "<script> location.replace('https://cca2patrickjoel.ts.r.appspot.com')</script>";
            }else{   
        echo "ERROR";
        
            }
            }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>password change</title>
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

<p>Logged in as <?php echo $user['name']; ?></p><br> 
        <p>please enter your old password, then your new password</p>
        <form action = "https://cca2patrickjoel.ts.r.appspot.com/password" method="post">
            <p>Old Password: <input type="password" name="oldpassword"></p><br>
            <p>New Password: <input type="password" name="newpassword"></p><br>
            <div><input type="submit" name="change" class="button" value="CHANGE"></div>
        </form>
        <button type="button" class="button"href="https://cca2patrickjoel.ts.r.appspot.com/main">Return to Main</button>
    </body>

    <div class="footer">
  <p>Developed By Patrick Jones S3661943 & Joel Jacob 3660851 for Cloud Computing COSC2626/2640 Assignment 2</p>
</div>

</html>