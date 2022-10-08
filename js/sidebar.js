var buttonvalue = 0;

function sideToggle() {
    buttonvalue = !buttonvalue;

    switch (buttonvalue) {
        case true:
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("page-container").style.marginLeft = "250px";
        break;
     
        case false:
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("page-container").style.marginLeft = "0";
        break;
    }
}