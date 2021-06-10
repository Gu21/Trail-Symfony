


// SCRIPT BARRE NAV      

$(document).ready(function(){
    $(document).scroll(function () {
      let  $nav = $(".fixed-top");
      let  $navCollapse = $(".collapse");
      let  $home =  $(".Home");
      
     
      $nav.toggleClass('scrolled', $(document).scrollTop() > $nav.height());
      $navCollapse.toggleClass('scrolled', $(document).scrollTop() > $navCollapse.height());
      $home.toggleClass('scrolled', $(document).scrollTop() > $home.height());
     
    });      

  });
// END SCRIPT BARRE NAV     



//  SCRIPT BARRE NAV ZOOM 

//   window.onscroll = function() {scrollFunction()};

// function scrollFunction() {
//   if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
//     document.getElementById("navbar").style.padding = "30px 10px";
//     document.getElementById("navbar").style.fontSize  = "4em";
//     console.log('test1');
//   } else {
//     document.getElementById("navbar").style.padding = "80px 10px";
//     document.getElementById("navbar").style.fontSize = "3em";
//     console.log('test2');
//   }
// }

// END SCRIPT BARRE NAV ZOOM 
         
  
  //  ----SCRIPT----COMPTEUR------      
     
       
jQuery(function($){

var launch = new Date('2021-09-27'); //  HORAIRES EN UTC
var days = $('#days');
var hours = $('#hours');
var minutes = $('#minutes');
var seconds = $('#seconds');

setDate();
function setDate(){

  var now = new Date();
  console.log(now.getTimezoneOffset());
 var s = ((launch.getTime() - now.getTime())/1000) - now.getTimezoneOffset()*60;
 var d = Math.floor(s/86400);
 days.html('<strong>'+d+'</strong>JR');
//  days.html('<strong>'+d+'</strong>JR'+(d>1?'s':''));
 s -= d*86400;

 var h = Math.floor(s/3600);
 hours.html('<strong>'+h+'</strong>HR');
//  hours.html('<strong>'+h+'</strong>HR'+(h>1?'s':''));
 s -= h*3600;

 var m = Math.floor(s/60);
 minutes.html('<strong>'+m+'</strong>MIN');
//  minutes.html('<strong>'+m+'</strong>MIN'+(m>1?'s':''));
 s -= m*60;

 s = Math.floor(s);
 seconds.html('<strong>'+s+'</strong>SEC');
//  seconds.html('<strong>'+s+'</strong>SEC'+(s>1?'s':''));


 setTimeout(setDate,1000);
}

});

 //  -END---SCRIPT----COMPTEUR------    
 
 



  // ---SCRIPT----PRESENTATION------  
 
//  var controller = new ScrollMagic.Controller();

//  var scene = new ScrollMagic.Scene({

// triggerElement: '.boxpresentation',
// reverse: false


//  })

//  .setClassToggle('.boxpresentation','fade-in')
//  .addIndicators({
// name: 'INDICATIONS',
// incident: 200,
// colorStart: '#fff'
//  })
//  .addTo(controller);



//  --END -SCRIPT----PRESENTATION------  