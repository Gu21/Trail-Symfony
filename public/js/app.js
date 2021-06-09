


//        
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
         
  
         
     
       
    
  
    
