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
  </head>
  <body>
  <link rel="stylesheet" href="upload_video.css">
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans' type='text/css'>
  <link type="text/css" rel="stylesheet" href="/stylesheets/main.css" />
    <body>
    <div class="header">
  <h1>WECLOME BACK <?php echo $user['name'];?></h1>
  <h2>View the trends</h2>
</div>
<ul>
<li><a href="https://cca2patrickjoel.ts.r.appspot.com/main">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a class="active" href="https://cca2patrickjoel.ts.r.appspot.com/files">Files</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/maps">Maps</a></li>
  <li><a href="https://cca2patrickjoel.ts.r.appspot.com/profile">Profile</a></li>
</ul>
    <p>Upload to YouTube</p>
  </head>
  <body>
    <span id="signinButton" class="pre-sign-in">
      <!-- IMPORTANT: Replace the value of the <code>data-clientid</code>
           attribute in the following tag with your project's client ID. -->
      <span
        class="g-signin"
        data-callback="signinCallback"
        data-clientid="187281538421-4tgmp51dbr9faab2mch3ckets5v8mq8n.apps.googleusercontent.com"
        data-cookiepolicy="single_host_origin"
        data-scope="https://www.googleapis.com/auth/youtube.upload https://www.googleapis.com/auth/youtube">
      </span>
    </span>

    <div class="post-sign-in">
      <div>
        <img id="channel-thumbnail">
        <span id="channel-name"></span>
      </div>

      <div>
        <label for="title">Title:</label>
        <input id="title" type="text" value="Default Title">
      </div>
      <div>
        <label for="description">Description:</label>
        <textarea id="description">Default description</textarea>
      </div>
      <div>
        <label for="privacy-status">Privacy Status:</label>
        <select id="privacy-status">
          <option>public</option>
          <option>unlisted</option>
          <option>private</option>
        </select>
      </div>

      <div>
        <input input type="file" id="file" class="button" accept="video/*">
        <button id="button">Upload Video</button>
      <div class="during-upload">
        <p><span id="percent-transferred"></span>% done (<span id="bytes-transferred"></span>/<span id="total-bytes"></span> bytes)</p>
        <progress id="upload-progress" max="1" value="0"></progress>
      </div>

      <div class="post-upload">
        <p>Uploaded video with id <span id="video-id"></span>. Polling for status...</p>
        <ul id="post-upload-status"></ul>
        <div id="player"></div>
      </div>
      <p id="disclaimer">By uploading a video, you certify that you own all rights to the content or that you are authorized by the owner to make the content publicly available on YouTube, and that it otherwise complies with the YouTube Terms of Service located at <a href="http://www.youtube.com/t/terms" target="_blank">http://www.youtube.com/t/terms</a></p>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//apis.google.com/js/client:plusone.js"></script>
    <script src="cors_upload.js"></script>
    <script src="upload_video.js"></script>

  </body>
</html>