var card;
var form = "<form class='factory' action='includes/purchase.inc.php' method='POST' enctype='multipart/form-data'>";
var button = "<button type='submit' name='submit' value='upload'>Purchase</button>";
var count = "";

// When the user clicks the button, open the modal 
$(document).ready(function(){
    $("span.popup").click(function(e){
        $("div.modal").css("display", "block")
        var modal = $("div.modal").children(".modal-content");
        card = $(this).parent().clone();

        modal.append(form); // add form header
        modal.append(card); // add card display

        card.children()[9].remove(); // Remove purchase span

        card.append(button); // add form purchase button
        modal.append("</form>");
    });

    $("span.close").click(function(e){
        $("div.modal").css("display", "none")
        card.remove();
    });
});