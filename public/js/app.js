


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



//  --END -SCRIPT----PRESENTATION------  

    // ---SCRIPT----TABLE ADMIN------ 

    $(document).ready( function () {
      $('#myTable').DataTable();
  } );
    
    //  --END -SCRIPT---TABLE ADMIN------ 
    