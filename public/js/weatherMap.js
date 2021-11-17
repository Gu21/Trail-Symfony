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