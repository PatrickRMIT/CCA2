google.load('visualization', '1', {packages: ['geochart']});
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