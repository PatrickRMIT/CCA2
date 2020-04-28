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
<html>
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