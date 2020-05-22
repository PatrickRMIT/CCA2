function GetSelectedTextValue(country) {
  var selectedText = country.options[country.selectedIndex].innerHTML;
  var selectedValue = country.value;
  }


function trends(selectedValue) {

  var URL = 'https://www.googleapis.com/youtube/v3/videos';

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
        <iframe width="560" height="315" src="https://www.youtube.com/embed/${id}?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      `);
  }

  
  function resultsLoop(data) {
    $('main').empty()
      $.each(data.items, function (i, item) {
        console.log(item);
          var thumb = item.snippet.thumbnails.medium.url;
          var title = item.snippet.title;
          var desc = item.snippet.description.substring(0, 150);
          var vid = item.id;
       

          $('main').append(`
            <article class="item" data-key="${vid}">
              <img src="${thumb}" alt="" class="thumb">
              <div class="details">
                <h4 align="left">${title}</h4>
                <p id="vid">${desc}</p>
              </div>
            </article>
          `);
      });
  }

  $('main').on('click', 'article', function () {
      var id = $(this).attr('data-key');
      mainVid(id);
  });
};
