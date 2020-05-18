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
  <li><a href="#news">News</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/files">Files</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/search">Search Videos</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/maps">Maps</a></li>
  <li><a class="active" href="https://cca2patrickjoel.ts.r.appspot.com/profile">Profile</a></li>
</ul>
<div class="main">
<p>Logged in as <?php echo $user['name'];?></p><br> 
<p>Change your display name: </p>
        <form action="https://cca2patrickjoel.ts.r.appspot.com/name">
    <input type="submit" class="button" value="Chane Name" />
</form>
<p>Change your passowrd: </p>
<form action="https://cca2patrickjoel.ts.r.appspot.com/password">
    <input type="submit" class="button" value="Chane Password" />
</form>
</div>
    </body>
</html>