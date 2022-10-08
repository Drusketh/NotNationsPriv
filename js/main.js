/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function drop(divid) {
    document.getElementById(divid).nextSibling.nextSibling.classList.toggle("show");
}
  
// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
    
    if (!e.target.matches('.dropbtn')) {
        var myDropdown = document.getElementById("myDropdown");
        if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
        }
        var reslist = document.getElementById("reslist");
        if (reslist.classList.contains('show')) {
            reslist.classList.remove('show');
        }
    }
    
    if (e.target.matches('.rsbasic')) {
        var fholder = document.getElementById("flora");
        if (fholder.classList.contains('show')) {
            fholder.classList.remove('show');
        }
        document.getElementById("basic").classList.toggle("show");
    }
    else if (e.target.matches('.rsflora')) {
        console.log("click");
        var bholder = document.getElementById("basic");
        if (bholder.classList.contains('show')) {
            bholder.classList.remove('show');
        }
        document.getElementById("flora").classList.toggle("show");
    }
}