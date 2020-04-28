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
        Logged in as <?php echo $user['name'];?><br> 
        <h1>Main content</h1>
        <form action="https://cca2patrickjoel.ts.r.appspot.com/name">
    <input type="submit" value="Chane Name" />
</form>
<form action="https://cca2patrickjoel.ts.r.appspot.com/password">
    <input type="submit" value="Chane Password" />
</form>
    </body>
</html>