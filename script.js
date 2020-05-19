// var maxVideos = 5;
//    $(document).ready(function(){
//   $.get(
//     "https://www.googleapis.com/youtube/v3/videos",{
//       part: 'snippet',
//       chart: 'mostPopular',
//       kind: 'youtube#videoListResponse',
//       maxResults: maxVideos,
//       regionCode: 'AU',
//       key: 'AIzaSyB0nu7HabL4z8Pzb_S3LRnv0m8GHQaUU5Q'},
//       function(data){
//         var output;
//         $.each(data.items, function(i, item){
//           console.log(item);
//           videTitle = item.snippet.title;
//                 description = item.snippet.description;
//                 thumb = item.snippet.thumbnails.high.url;
//                 channelTitle = item.snippet.channelTitle;
//                 videoDate = item.snippet.publishedAt;
//                 Catagoryid = item.snippet.categoryId;
//                 cID = item.snippet.channelId;
//                 vidId =item.vidId


//                 var thumb = item.snippet.thumbnails.medium.url;
//                 var title = item.snippet.title;
//                 var desc = item.snippet.description.substring(0, 100);
//                 var vid = item.snippet.resourceId.videoId;

//                 $('main').append(`
//                 <article class="item" data-key="${vid}">
    
//                   <img src="${thumb}" alt="" class="thumb">
//                   <div class="details">
//                     <h4>${title}</h4>
//                     <p>${desc}</p>
//                   </div>
    
//                 </article>
//               `);
//           });
//   });
// }); 

  //         output = '<div class="maindiv"><div>' +
  //                       '<a data-fancybox-type="iframe" class="fancyboxIframe" href="watch.php?v=' + vidId + '" target="_blank" ><img src="' + thumb + '" class="img-responsive thumbnail" ></a>' +
  //                       '</div>' +
  //                       '<div class="input-group col-md-6">' +
  //                           '<h3 class="Vtitle"><a data-fancybox-type="iframe" class="fancyboxIframe" href="watch.php?v=' + vidId + '" target="_blank">' + videTitle + '</a></h3>'+
  //                       '</div><div  id="cTitle"><a href="https://www.youtube.com/channel/'+cID+'" target="_blank">'+channelTitle+'</a></div></div>' +
  //                   '<div class="clearfix"></div>';
  //         $('#trending').append(output);
  //       })


  // function resultsLoop(data) {

  //     $.each(data.items, function (i, item) {

  //         var thumb = item.snippet.thumbnails.medium.url;
  //         var title = item.snippet.title;
  //         var desc = item.snippet.description.substring(0, 100);
  //         var vid = item.snippet.resourceId.videoId;


        


















// YOU WILL NEED TO ADD YOUR OWN API KEY IN QUOTES ON LINE 5, EVEN FOR THE PREVIEW TO WORK.

// GET YOUR API HERE https://console.developers.google.com/apis/api


// https://developers.google.com/youtube/v3/docs/playlistItems/list

// https://console.developers.google.com/apis/api/youtube.googleapis.com/overview?project=webtut-195115&duration=PT1H

// <iframe width="560" height="315" src="https://www.youtube.com/embed/qxWrnhZEuRU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

// https://i.ytimg.com/vi/qxWrnhZEuRU/mqdefault.jpg


function GetSelectedTextValue(country) {
  var selectedText = country.options[country.selectedIndex].innerHTML;
  var selectedValue = country.value;
  }


function trends(selectedValue) {

  var URL = 'https://www.googleapis.com/youtube/v3/videos';

  // var elem = document.getElementById('animals');
  // var currElem = document.getElementById('current');
  
  // currElem.innerHTML = elem.value;
  
  // animals.onchange = function(e) {
  //    currElem.innerHTML = e.target.value;
  // }
  // animals.onchange = loadVids();
  //selectedValue = document.getElementById('animals');

  var options = {
    part: 'snippet',
    chart: 'mostPopular',
    kind: 'youtube#videoListResponse',
    maxResults: 10,
    regionCode: selectedValue.value,
    key: 'AIzaSyB0nu7HabL4z8Pzb_S3LRnv0m8GHQaUU5Q',
  }

  
  loadVids();

  function loadVids() {
      $.getJSON(URL, options, function (data) {
          var id = data.items[0].id;
          mainVid(id);
          resultsLoop(data);
      });
  }

  function mainVid(id) {
      $('mainvideo').html(`
        <iframe width="560" height="315" src="https://www.youtube.com/embed/${id}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      `);
  }

  
  function resultsLoop(data) {

      $.each(data.items, function (i, item) {
        console.log(item);
          var thumb = item.snippet.thumbnails.medium.url;
          var title = item.snippet.title;
          var desc = item.snippet.description.substring(0, 100);
          var vid = item.id;
       

          $('main').append(`
            <article class="item" data-key="${vid}">

              <img src="${thumb}" alt="" class="thumb">
              <div class="details">
                <h4>${title}</h4>
                <p>${desc}</p>
              </div>

            </article>
          `);
      });
  }

  // CLICK EVENT
  $('main').on('click', 'article', function () {
      var id = $(this).attr('data-key');
      mainVid(id);
  });
};













































// var nextPageToken, prevPageToken;
// var firstPage=true;
// $(document).ready(function()
// {
       
//     $('#searchbutton').click(function()
//     {
//         // Called automatically when JavaScript client library is loaded.
//       //  alert('i am clicked');
//         gapi.client.load('youtube', 'v3', onYouTubeApiLoad);
 
//         // Called automatically when YouTube API interface is loaded .
       
 
//         // Called automatically with the response of the YouTube API request.
        
 
//           // $('#search').append("<div id=\"page\"><button type=\"button\" id=\"nextPageButton\">Next Page</button></div>");
//            //  $('#search').append("<div id=\"page\"><button type=\"button\" id=\"nextPageButton\">Next Page"+nextPageToken+"</button></div>");
 
//         });
//   $('#search').append("<div id=\"page\"><button type=\"button\" id=\"prevPageButton\">Prev Page "+prevPageToken+"</button></div>");
//     $('#search').append("<div id=\"page\"><button type=\"button\" id=\"nextPageButton\">Next Page "+nextPageToken+"</button></div>");
    
//      $('#nextPageButton').click(function()
//     {
//        // alert('i am clicked');
//         console.log(nextPageToken);
//         searchYouTubeApi(nextPageToken);
//     });
    
//      $('#prevPageButton').click(function()
//     {
//        // alert('i am clicked');
//         console.log(prevPageToken);
//         searchYouTubeApi(prevPageToken);
//     });
 
// });
 
//  function onYouTubeApiLoad() 
//         {
//             // See http://goo.gl/PdPA1 to get a key for your own applications.
//             gapi.client.setApiKey('AIzaSyB0nu7HabL4z8Pzb_S3LRnv0m8GHQaUU5Q');
//             searchYouTubeApi();
 
//         }
 
//         function searchYouTubeApi(PageToken)
//         {
//              var searchText= $('#searchtext').val();
//              //$('#response').append("<div id=\"searching\"><b>Searching for "+searchText+"</b></div>");
//           $('#response').replaceWith("<div id=\"searching\"><b>Searching for "+searchText+"</b></div>");
 
//             // Use the JavaScript client library to create a search.list() API call to Youtube's "Search" resource
//             var request = gapi.client.youtube.search.list(
//             {
//             part: 'snippet',
//             q:searchText,
//             maxResults:5,
//             pageToken:PageToken
//             });
            
//             // Send the request to the API server,
//             // and invoke onSearchRepsonse() with the response.
//             request.execute(onSearchResponse);
//            //  $('#response').append("<div id=\"page\"><button type=\"button\" id=\"nextPageButton\">Next Page return from request execute method is: "+nextPageToken+"</button></div>");
//         }
 
//         function onSearchResponse(response) 
//         {
         
//             var responseString = JSON.stringify(response, '', 2);
//             var resultCount = response.pageInfo.totalResults;
//                 nextPageToken=response.nextPageToken;
//                 prevPageToken=response.prevPageToken;
//               // document.getElementById('response').innerHTML += responseString;
//                 //$('#response').append("<div id=count><b>Found "+resultCount+" Results.</b></div>");
//             $('#count').replaceWith("<div id=count><b>Found "+resultCount+" Results.</b></div>");
//           //$('#searching').append("<div id=length><b>Length "+response.items.length+" </b></div>");
           
             
//             for (var i=0; i<response.items.length;i++)
//             {
//                 //store each JSON value in a variable
//                 var publishedAt=response.items[i].snippet.publishedAt;
//                 var channelId=response.items[i].snippet.channelId;
//                 var title=response.items[i].snippet.title;
//                 var description=response.items[i].snippet.description;
//                 var thumbnails_default=response.items[i].snippet.thumbnails.default.url;
//                 var thumbnails_medium=response.items[i].snippet.thumbnails.medium.url;
//                 var thumbnails_high=response.items[i].snippet.thumbnails.high.url;
//                 var channelTitle=response.items[i].snippet.channelTitle;
//                 var liveBroadcastContent=response.items[i].snippet.liveBroadcastContent;
//                 var videoID=response.items[i].id.videoId;
//                  //var firstPage=true;
 
//               //  console.log(thumbnails_default);
//                 //A HTTP call to this URL with videoID will give all XML info of that video: 
//                 //http://gdata.youtube.com/feeds/api/videos?q=videoID
//               //  console.log(videoID);
                
//                 //replace the first search button with a 'more' button
//                 //$('button').replaceWith("<button type='button' id=More"+i+">More...</button>");
              
//                if(firstPage===true)
//                {
//                //print the stored variables in a div element
//                 $('#snipp').append("<div id=T><b>Title:</b> "+title+"</div><div id=C><b>Channel ID: </b>"+channelId+"</div><div id=D><b>Description </b>"+description+"</div><div id=P><b>Published on: </b>"+publishedAt+"</div><div id=CT><b>Channel Title: </b>"+channelTitle+"</div><a id=linktoVid href='http://www.youtube.com/watch?v="+videoID+"'><img id=imgTD src=\""+thumbnails_default+"\"/></a><br/><br/><a id=linktoVid1 href='http://www.youtube.com/watch?v="+videoID+"'><video id=vidTD width=\"320\" height=\"240\" controls poster="+thumbnails_default+"><source src='http://www.youtube.com/watch?v="+videoID+">Your browser does not support the video tag.</video></a><br/><br/>");
                
//                 }
//                 else
//                 {
//                   $('#T').replaceWith("<div id=T><b>Title:</b> "+title+"</div>");
//                   $('#C').replaceWith("<div id=C><b>Channel ID: </b>"+channelId+"</div>");
//                   $('#D').replaceWith("<div id=D><b>Description </b>"+description+"</div>");
//                   $('#P').replaceWith("<div id=P><b>Published on: </b>"+publishedAt+"</div>");
//                   $('#CT').replaceWith("<div id=CT><b>Channel Title: </b>"+channelTitle+"</div>");
//                   $('#linktoVid').replaceWith("<a id=linktoVid href='http://www.youtube.com/watch v="+videoID+"'><img id=imgTD src=\""+thumbnails_default+"\"/></a><br/><br/><a id=linktoVid1 href='http://www.youtube.com/watch?v="+videoID+"'><video id=vidTD width=\"320\" height=\"240\" controls poster="+thumbnails_default+"><source src='http://www.youtube.com/watch?v="+videoID+">Your browser does not support the video tag.</video></a><br/><br/>");
//                 }
 
//             //  $('#snipp').append("<div id=C"+i+">Channle ID: "+channelId+"</div><br/>");
 
//             //link rel='alternate' type='text/html' href='http://www.youtube.com/watch?v=76TlUlPZQfQ&amp;feature=youtube_gdata'/>
              
 
//             }
//              // $('#search').append("<div id=\"page\"><button type=\"button\" id=\"nextPageButton\" onclick=\"alert('Hello world!')\">Next Page "+nextPageToken+"</button></div>");
//              // return nextPageToken;
//              firstPage=false;
//         }