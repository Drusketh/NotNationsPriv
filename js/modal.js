// Get the modal
// var modal = document.getElementById("modal");

// Get the button that opens the modal
// var btn = document.getElementById("myBtn");

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
$(document).ready(function(){
    $("span.popup").click(function(e){
        $("div.modal").css("display", "block")
    });
    $("span.close").click(function(e){
        $("div.modal").css("display", "none")
    });
});

// When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }