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
<title>Main Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="/stylesheets/main.css" />
    <body>
    <div class="header">
  <h1>WECLOME BACK <?php echo $user['name'];?></h1>
  <h2>This is your social dashboard</h2>
</div>
<ul>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/main">Home</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/data">Growth Data</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/files">Files</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/search">Search Videos</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/maps">Maps</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/profile">Profile</a></li>
</ul>
<p>Logged in as <?php echo $user['name'];?></p><br> 
<div class="mainhome">
<h3>Welcome to social dashboard!</h3>

<h4>todays top trends are</h3>
</div>
    </body>
</html>