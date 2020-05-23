
    //   // User Submitted Variables
    //   var project_id = 'cca2patrickjoel';
    //   var client_id = '187281538421-4tgmp51dbr9faab2mch3ckets5v8mq8n.apps.googleusercontent.com';

    //   var config = {
    //     'client_id': client_id,
    //     'scope': 'https://www.googleapis.com/auth/bigquery'
    //   };

    //   function showProjects() {
    //     var request = gapi.client.bigquery.projects.list();
    //     request.execute(function(response) {     
    //         $('#result_box').html(JSON.stringify(response, null));
    //     });
    //   }

    //   function showDatasets() {
    //     var request = gapi.client.bigquery.datasets.list({
    //       'projectId':'publicdata'
    //     });
    //     request.execute(function(response) {     
    //         $('#result_box').html(JSON.stringify(response.result.datasets, null));
    //     });
    //   }

    //   function runQuery() {
    //    var request = gapi.client.bigquery.jobs.query({
    //       'projectId': project_id,
    //       'timeoutMs': '30000',
    //       'query': 'SELECT TOP(repository_language, 5) as language, COUNT(*) as count FROM [publicdata:samples.github_timeline] WHERE repository_language != "";'
    //     });
    //     request.execute(function(response) {     
    //         console.log(response);
    //         $('#result_box').html(JSON.stringify(response.result.rows, null));
    //     });
    //   }

    //   function auth() {
    //     gapi.auth.authorize(config, function() {
    //         gapi.client.load('bigquery', 'v2');
    //         $('#client_initiated').html('BigQuery client initiated');
    //         $('#auth_button').fadeOut();
    //         $('#projects_button').fadeIn();
    //         $('#dataset_button').fadeIn();
    //         $('#query_button').fadeIn();
    //     });
    //   }




      //----------------------------------------




  google.load('visualization', '1', {packages: ['geochart']});
// UPDATE TO USE YOUR PROJECT ID AND CLIENT ID
var project_id = 'cca2patrickjoel';
var client_id = '187281538421-4tgmp51dbr9faab2mch3ckets5v8mq8n.apps.googleusercontent.com';

var config = {
  'client_id': client_id,
  'scope': 'https://www.googleapis.com/auth/bigquery'
};

function runQuery() {
 var request = gapi.client.bigquery.jobs.query({
    'projectId': project_id,
    'timeoutMs': '30000',
    //'query': 'SELECT state, AVG(mother_age) AS theav FROM [publicdata:samples.natality] WHERE year=2000 AND ever_born=1 GROUP BY state ORDER BY theav DESC;'
    'query': 'SELECT country_code , midyear_population FROM [bigquery-public-data:census_bureau_international.midyear_population] WHERE year=2025 GROUP BY country_code, midyear_population;'
  });
  request.execute(function(response) {     
      console.log(response);
      var stateValues = [["State", "Pop"]];
      $.each(response.result.rows, function(i, item) {
        var state = item.f[0].v;
        var pop = parseFloat(item.f[1].v);
        var stateValue = [state, pop];
        stateValues.push(stateValue);
      });  
      var data = google.visualization.arrayToDataTable(stateValues);
      var geochart = new google.visualization.GeoChart(
          document.getElementById('map'));
      geochart.draw(data, {width: 756, height: 547});
  });
}

function auth() {
  gapi.auth.authorize(config, function() {
      gapi.client.load('bigquery', 'v2', runQuery);
      $('#client_initiated').html('BigQuery client initiated');
  });
  $('#auth_button').hide();
}