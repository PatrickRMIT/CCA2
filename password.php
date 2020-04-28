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
<html>
    <body>
        Logged in as <?php echo $user['name']; ?><br> 
        <h1>Change password</h1>
        <p>please enter your old password, then your new password</p>
        <form action = "https://cca2patrickjoel.ts.r.appspot.com/password" method="post">
            Old Password: <input type="password" name="oldpassword"><br>
            New Password: <input type="password" name="newpassword"><br>
            <div><input type="submit" name="change" value="CHANGE"></div>
        </form>
<a href="https://cca2patrickjoel.ts.r.appspot.com/main">Return to Main</a>
    </body>
</html>