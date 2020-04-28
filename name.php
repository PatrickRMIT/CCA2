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

    echo $_POST['newname'];
    echo $newname;

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
<html>
    <body>
        Logged in as <?php echo $user['name']; ?><br> 
        <h1>Change Name</h1>
    <p>Change your name here:</p>
        <form action = "https://cca2patrickjoel.ts.r.appspot.com/name" method="post">
            Name: <input type="text" name="newname"><br>
            <div><input type="submit" name="change" value="CHANGE"></div>
        </form>
        <a href="https://cca2patrickjoel.ts.r.appspot.com/main">Return to Main</a>
    </body>
</html>
