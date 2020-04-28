<?php
require __DIR__ . '/vendor/autoload.php';
use Google\Cloud\Datastore\DatastoreClient;
session_start();
// $key = $datastore->key(user, 's3661943');
// $user = $datastore->lookup($key);
// echo '$user';
// $key2 = $datastore->key(user, 's36619431');
// $entity = $datastore->lookup($key2);
// echo '$entity';

// $query = $datastore->query()
//         ->kind('user')
//         ->order('id', 'DESCENDING')
//         ->limit(10);
//     $results = $datastore->runQuery($query);
//     $visits = [];
//     foreach ($results as $entity) {
//         $visits[] = sprintf('ID: %s name: %s',
//             $entity['id'],
//             $entity['name']);
//     }
//     # [END gae_flex_datastore_query]
//     echo $visits;

// $task = $datastore->entity('Task', [
//     'category' => 'Personal',
//     'done' => false,
//     'priority' => 4,
//     'description' => 'Learn Cloud Datastore'
// ]);

// $key = $datastore->key('Task', 'sampleTask');
// $task = $datastore->entity($key, [
//     'category' => 'Personal',
//     'done' => false,
//     'priority' => 4,
//     'description' => 'Learn Cloud Datastore'
// ]);
// $datastore->upsert($task);


#------------------------------------------------------------------------------------------------------------

// $key = $datastore->key('user', 's3661943');
// $user = $datastore->entity($key, [
//     'id' => 's3661943',
//     'name' => 'Patrick Jones',
//     'password' => 123456,
// ]);
// $datastore->upsert($user);

// echo 'Saved ' . $user->key() . ': ' . $user['name'] . PHP_EOL;

// $key2 = $datastore->key('user', 's36619431');
// $user2 = $datastore->entity($key2, [
//     'id' => 's36619431',
//     'name' => 'Patrick Jones A',
//     'password' => 234567,
// ]);
// $datastore->upsert($user2);

// echo 'Saved ' . $user2->key() . ': ' . $user2['name'] . PHP_EOL;


// $key3 = $datastore->key('user', 's36619432');
// $user3 = $datastore->entity($key3, [
//     'id' => 's36619432',
//     'name' => 'Patrick Jones B',
//     'password' => 345678,
// ]);
// $datastore->upsert($user3);

// echo 'Saved ' . $user3->key() . ': ' . $user3['name'] . PHP_EOL;

#--------------------------------------------------------------------------------------------------------


// $key = $datastore->key('Task', 'sampleTask');
// $task = $datastore->lookup($key);
   
// echo 'Saved ' . $task->key() . ': ' . $task['description'] . PHP_EOL;

// $key2 = $datastore->key('user', '5632499082330112');
// $task2 = $datastore->lookup($key2);
   
// echo 'Saved ' . $task2->key() . ': ' . $task2['name'] . PHP_EOL;
    // # The kind for the new entity
    // $kind = 'user';

    // # The name/ID for the new entity
    // $name = 's3661943';

    // # The Cloud Datastore key for the new entity
    // $userKey = $datastore->key($kind, $name);
    // echo 'test' . ': ' . $user['password'] . PHP_EOL;


   
// $query = $datastore->query();
// $query->kind('user');
// $res = $datastore->runQuery($query);
// $flag = false;
// foreach ($res as $users) {
// if ($users['id'] == 's3661943') {
// echo $users['name'];
// echo $users['password'];
// $flag = true;
// break;
// }
// }
// if ($flag == false) {
// echo 'wrong';
// }

// $task = $datastore->entity('user', [
//     'id' => 's366666',
//     'name' => 'patrick j',
//     'password' => 4,
// ]);

#$entity = $datastore->lookup($key);
#if (!is_null($entity)) {
#echo $entity['password'];
#echo $entity['name'];
#} else echo 'wrong'

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
            UserID: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <div><input type="submit" name="login"value="Login"></div>
        </form>
        </div>
    </body>
</html> 
