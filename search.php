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
<html>
  <head>
    <title>test</title>
	  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="/stylesheets/main.css" />
  </head>
  <body>
    <div class="header">
  <h1>WECLOME BACK <?php echo $user['name'];?></h1>
  <h2>View the trends</h2>
</div>
<ul>
<li><a href="https://cca2patrickjoel.ts.r.appspot.com/main">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/files">Files</a></li>
  <li><a class="active" href="https://cca2patrickjoel.ts.r.appspot.com/search">Search Videos</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/maps">Maps</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/profile">Profile</a></li>
</ul>
    <p>YouTube Search</p>
    <div id="search">
      <input type="text"  value="eureka" id="searchtext"><button type="button" id="searchbutton">Find</button>
      </div>
        <button type="button">Search Me...</button>
        
        <pre id="response">
        </pre>
      <pre id="count"></pre>
        <pre class="vID"></pre>
        <div id="snipp">
          <div id=T0>
        </div>
        <br/><br/><br/>
<!-- scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="script"></script>
        <script src="https://apis.google.com/js/client.js?onload=init"></script>
        <script src="https://apis.google.com/js/client.js?onload=onClientLoad" type="text/javascript"></script>
        <script src="script" type="text/javascript"></script>

  </body>
</html>