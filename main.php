<?php
// Initialize the session
session_start();
require __DIR__ . '/vendor/autoload.php';
use Google\Cloud\Datastore\DatastoreClient;
use google\appengine\api\cloud_storage\CloudStorageTools;
$projectId = 'cca2patrickjoel';
$datastore = new DatastoreClient([
    'projectId' => $projectId
]);

$key = $datastore->key('user', $_SESSION['username']);
$user = $datastore->lookup($key);


$options = ['size' => 100, 'crop' => false];
$option2 = ['size' => 250, 'crop' => false];
$image_file = "gs://socialdashboard/gcp.png";
$image_file2 = "gs://socialdashboard/gae.png";
$image_file3 = "gs://socialdashboard/gcd.png";
$image_file4 = "gs://socialdashboard/gcb.png";
$image_file5 = "gs://socialdashboard/ce.png";
$image_file6 = "gs://socialdashboard/yt.png";
$image_file7 = "gs://socialdashboard/gm.png";
$image_file8 = "gs://socialdashboard/gd.png";
$image_file9 = "gs://socialdashboard/gma.png";
$image_file10 = "gs://socialdashboard/cl.png";
$image_file11 = "gs://socialdashboard/cps.png";
$image_file12 = "gs://socialdashboard/bq.png";
$image_file13 = "gs://socialdashboard/gc.png";

$image_url = CloudStorageTools::getImageServingUrl($image_file, $option2);
$image_url2 = CloudStorageTools::getImageServingUrl($image_file2, $options);
$image_url3 = CloudStorageTools::getImageServingUrl($image_file3, $options);
$image_url4 = CloudStorageTools::getImageServingUrl($image_file4, $options);
$image_url5 = CloudStorageTools::getImageServingUrl($image_file5, $options);
$image_url6 = CloudStorageTools::getImageServingUrl($image_file6, $options);
$image_url7 = CloudStorageTools::getImageServingUrl($image_file7, $options);
$image_url8 = CloudStorageTools::getImageServingUrl($image_file8, $options);
$image_url9 = CloudStorageTools::getImageServingUrl($image_file9, $options);
$image_url10 = CloudStorageTools::getImageServingUrl($image_file10, $options);
$image_url11 = CloudStorageTools::getImageServingUrl($image_file11, $options);
$image_url12 = CloudStorageTools::getImageServingUrl($image_file12, $options);
$image_url13 = CloudStorageTools::getImageServingUrl($image_file13, $options);


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
<div class="mainvideo">
    <h4>Welcome To Your Social Dashboard!</h4>
    <h5>Powerd by the Google Cloud Platform</h5>
    <img src=<?php echo $image_url;?> alt="google">
    <h5>GCP Services we use...</h5>
  </div>

  <div class="row">
  <div class="column">
  <div class="mainvideo">
  <h5>Google App Engine</h5>
  <img src=<?php echo $image_url2;?> alt="google">
  <br>
  <br>
  <p>We use the google App Engine to power our web application. From hosting to deployment App Engine can run our application across mulitple servers providing fast global access to Social Dashboard</p>
  </div>
  </div>
  <div class="column">
  <div class="mainvideo">
  <h5>Google Cloud Datastore</h5>
  <img src=<?php echo $image_url3;?> alt="google">
  <br>
  <br>
  <p>Google Cloud Datastore managers our user credential information. Allowing us to save this data offsite and be fully scalable</p>
  </div>
  </div>
  <div class="column">
  <div class="mainvideo">
  <h5>Google Storage Buckets</h5>
  <img src=<?php echo $image_url4;?> alt="google">
  <br>
  <br>
  <p>We Buckets to store files that are used by Social Dashboard. This distributed approch allows for pictures to be loaded in from the cloud to Social Dashboard </p>
  </div>
  </div>
  </div>

  <div class="row">
  <div class="column">
  <div class="mainvideo">
  <h5>Compute Engine</h5>
  <img src=<?php echo $image_url5;?> alt="google">
  <br>
  <br>
  <p>Google Compute Engine is what runs our Infrastructure for Social Dashboard. It allows us to use spin up virtual machines on demand, giving us greater control over our infrastructure</p>
  </div>
  </div>
  <div class="column">
  <div class="mainvideo">
  <h5>YouTube Data API V3</h5>
  <img src=<?php echo $image_url6;?> alt="google">
  <br>
  <br>
  <p>Social Dashboard uses the YouTube Data API for our YouTube Trending video feature. We send the API a request for trending videos for a particular country and it returns a json file with the data we need. including thunails, titles, descriptions and ids</p>
  </div>
  </div>
  <div class="column">
  <div class="mainvideo">
  <h5>Google Maps API</h5>
  <img src=<?php echo $image_url7;?> alt="google">
  <br>
  <br>
  <p>We using Google Maps API to present the Geo Location of a using on the world map.</p>
  </div>
  </div>
  </div>
  
  <div class="row">
  <div class="column">
  <div class="mainvideo">
  <h5>Google Drive API</h5>
  <img src=<?php echo $image_url8;?> alt="google">
  <br>
  <br>
  <p>Using the Google Drive API a user can view files in their drive, allowing Socaial Dashboard users to keep monitor files for their projects.</p>
  </div>
  </div>
  <div class="column">
  <div class="mainvideo">
  <h5>Gmail API</h5>
  <img src=<?php echo $image_url9;?> alt="google">
  <br>
  <br>
  <p>We use the Gmail API to view Labels from a Socail Dashboard users own gmail account. in the future users will be able to send their google drive files via the Gmail API</p>
  </div>
  </div>
  <div class="column">
  <div class="mainvideo">
  <h5>Cloud Logging API</h5>
  <img src=<?php echo $image_url10;?> alt="google">
  <br>
  <br>
  <p>Google cloud logging is used in Social Dashboard to store, search, analyze, monitor, and alert on logging data and events from Google Cloud.</p>
  </div>
  </div>
  </div>

  <div class="row">
  <div class="column">
  <div class="mainvideo">
  <h5>BigQuery</h5>
  <img src=<?php echo $image_url12;?> alt="google">
  <br>
  <br>
  <p>Social Blade uses BigQuery to search and analysis large amounts of CSV Data, Current Social blade is querying Country Groth Data using Census Bureau International public midyear population data.</p>
  </div>
  </div>
  <div class="column">
  <div class="mainvideo">
  <h5>Cloud Pub Sub API</h5>
  <img src=<?php echo $image_url11;?> alt="google">
  <br>
  <br>
  <p>Google Cloud Pub Sub helps Social Dashboard deliver asynchronous messages that decouples services that produce events from services that process events.</p>
  </div>
  </div>
  <div class="column">
  <div class="mainvideo">
  <h5>Google Charts API</h5>
  <img src=<?php echo $image_url13;?> alt="google">
  <br>
  <br>
  <p>We use Google charts API to visualise BigQuery Data across a scale map of the globe. The data can then be visualised and view with colours, helping our users to understand and give a perspective of the information they are looking at.</p>
  </div>
  </div>
  </div>


<div class="footer">
  <p>Developed By Patrick Jones S3661943 & Joel Jacob 3660851 for Cloud Computing COSC2626/2640 Assignment 2</p>
</div>

    </body>
</html>