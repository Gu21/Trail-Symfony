// $(function () {
//     var apiKey = '4e11ba606bb15b5ae8ec413a71931faf';
//     var baseUrl = 'http://api.openweathermap.org/data/2.5/weather?APPID=' + apiKey + '&units=metric&lang=fr';
  

//     $('#weather button').click(function (e) {
//         e.preventDefault();

//         var cityValue = $('#city').val();
//         var city =  $('#city');

//         var params = {
//             url: baseUrl + '&q=' + cityValue,
//             method: 'GET'
//         };

//         $.ajax(params).done(function (response) {
          

//                 //show card
//                 $('.card').removeClass('d-none');

//                  //Error
//                  city.removeClass('is-invalid');
//                  $('.invalid-feedback').slideUp();
//                  $('.card').show();
                 

//                 //Title
//                 $('.card-title').text(response.name)


//                 //Description
//                 $('.description-weather').text(response.weather[0].description);

//                   //Températures
//                 var temp = Math.round(response.main.temp) + '°';
//                 var tempMax = Math.round(response.main.temp_max) + '°';
//                 var tempMin = Math.round(response.main.temp_min) + '°';

//                   $('.temp-weather').text(temp);
//                   $('.temp-max-weather').text(tempMax);
//                   $('.temp-min-weather').text(tempMin);

//                    //Images

//                    var image = response.weather[0].icon;
//                    $('.image-weather').attr('src', 'https://openweathermap.org/img/wn/' + image + '.png');
//                    $('.image-weather').attr('alt', response.name);

//             })
//             .fail(function () {
//                 $('.invalid-feedback').slideDown();
//                 city.addClass('is-invalid');
//                 $('.card').hide();
               

//             });
//     });


// });

   // get meteo
   if($('#weather').length) {

    var weather_lat = "47.63752";
    var weather_lon = "-2.16324";
    var weather_key = "4e11ba606bb15b5ae8ec413a71931faf";

    var weather_url = "https://api.openweathermap.org/data/2.5/weather?lat="+ weather_lat +"&lon="+weather_lon+"&appid="+ weather_key + "&units=metric"
   
     
     $.getJSON(weather_url,function(data){

        icon = data["weather"][0]["icon"];       
        temp = data["main"]["temp"];       
        $(".weather_temperature").html(temp.toFixed(0) + '°'+ '|');
        // $(".weather_ico").css({'background':'url("https://openweathermap.org/img/wn/'+icon+'.png") no-repeat center center'});
        $('.weather_ico').attr('src', 'https://openweathermap.org/img/wn/' + icon + '.png');
      })

      var allaireTime = new Date().toLocaleString("en-FR", {timeZone: "Europe/Paris"});
      allaireTime = new Date(allaireTime);

      if(allaireTime.getMinutes() < 10) {
        allaire_min = '0' + allaireTime.getMinutes()
      }
      else {
        allaire_min = + allaireTime.getMinutes()
      }

      $(".weather_hour").html(allaireTime.getHours() + ':'+ allaire_min);

   }