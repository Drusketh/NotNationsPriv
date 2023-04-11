$(document).ready(function() {
    var max = 10;
    var ct = 1;
    var wrapper = $(".input_fields_wrap");
    var add_button = $(".add_field_button");

    $(add_button).click(function(e) {
        e.preventDefault();
        if (ct < max) {
            ct++
            $(this).parent().children().first().clone().insertBefore($(this));
            console.log(ct)
        }
    });
    $(document).on('click', '.remove_field', function() {
        if($(this).parent().parent().children().length > 2) {
            $(this).parent().remove();
            ct--
        } else {
            alert('You can not delete all elements');  
        }
    });
});