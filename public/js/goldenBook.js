// LIVRE D'OR

//--------------------RESET FORMULAIRE------

// $(".reset").bind("click", function () { Avec recharge que du formulaire
$("input[type=text], textarea,input[type=email]").val(""); //reset au chargement de la page
// });

// -------------END-------RESET FORMULAIRE------



var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    /* Bascule entre l'ajout et la suppression de la classe "active",
pour mettre en surbrillance le bouton qui contrôle le panneau */
    this.classList.toggle("active");

    
/* Basculer entre le masquage et l'affichage du panneau actif */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
