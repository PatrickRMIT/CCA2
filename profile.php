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

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Profile page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="/stylesheets/main.css" />
    <body>
    <div class="header">
  <h1>WECLOME BACK <?php echo $user['name'];?></h1>
  <h2>EDIT YOUR PROFILE</h2>
</div>
<ul>
<li><a href="https://cca2patrickjoel.ts.r.appspot.com/main">Home</a></li>
<li><a href="https://cca2patrickjoel.ts.r.appspot.com/data">Growth Data</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/files">Files</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/search">Trending Videos</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/maps">Maps</a></li>
  <li><a class="active" href="https://cca2patrickjoel.ts.r.appspot.com/profile">Profile</a></li>
</ul>
<div class="mainvideo">
<h4>Logged in as <?php echo $user['name'];?></h4><br> 
<h4>Change your display name: </h4>
        <form action="https://cca2patrickjoel.ts.r.appspot.com/name">
    <input type="submit" class="button" value="Chane Name" />
</form>
<h4>Change your passowrd: </h4>
<form action="https://cca2patrickjoel.ts.r.appspot.com/password">
    <input type="submit" class="button" value="Chane Password" />
</form>
</div>
<div class="footer">
  <p>Developed By Patrick Jones S3661943 & Joel Jacob 3660851 for Cloud Computing COSC2626/2640 Assignment 2</p>
</div>
    </body>
</html>