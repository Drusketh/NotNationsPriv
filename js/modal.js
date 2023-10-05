var card;
var form = "<form class='factory faccard' action='includes/purchase.inc.php' method='get' enctype='multipart/form-data'>";
var button = "<button type='submit' name='submit' value='upload'>Purchase</button>";
var count = "";

// When the user clicks the button, open the modal 
$(document).ready(function(){
    $("span.popup").click(function(e){
        card = $(this).parent();
        $("div.modal").css("display", "block")
        var modal = $("div.modal").children(".modal-content")
        var card = $(this).parent().clone();

        modal.append(form); // add form header
        
        $("div.modal-content").children(".factory").append(card); // add card display

        card.children()[11].remove(); // Remove purchase span

        card.append(button); // add form purchase button
        modal.append("</form>");
    });

    $("span.close").click(function(e){
        $("form.factory").remove();
        $("div.modal").css("display", "none")
    });
});