


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


  // ---SCRIPT----PRESENTATION------  
 
 var controller = new ScrollMagic.Controller();

 var scene = new ScrollMagic.Scene({

triggerElement: '.boxpresentation ',
reverse: false


 })

 .setClassToggle('.boxpresentation ','fade-in')
//  .addIndicators({
// name: 'INDICATIONS',
// incident: 200,
// colorStart: '#fff'
//  })
 .addTo(controller);



 var scene2 = new ScrollMagic.Scene({

  triggerElement: '.boxActualityNew ',
  reverse: false
  
  
   })
  
   .setClassToggle('.boxActualityNew ','fade-in')
  //  .addIndicators({
  // name: 'INDICATIONS',
  // incident: 200,
  // colorStart: '#fff'
  //  })
   .addTo(controller);


   




//  --END -SCRIPT----PRESENTATION------  

    // ---SCRIPT----TABLE ADMIN------ 

    $(document).ready( function () {
      $('#myTable').DataTable({responsive:true});
  } );
    
    //  --END -SCRIPT---TABLE ADMIN------
    
    

    //DEFILEMENT FLUIDE DES PAGES
    
    $(function () { /**
           * Défilement fluide
           **/
$("a[href*='#']:not([href='#'])").click(function () {
if (location.hostname == this.hostname && this.pathname.replace(/^\//, "") == location.pathname.replace(/^\//, "")) {
var anchor = $(this.hash);
anchor = anchor.length ? anchor : $("[name=" + this.hash.slice(1) + "]");
if (anchor.length) {
$("html, body").animate({
scrollTop: anchor.offset().top
}, 1500);
}
}
});
});
 