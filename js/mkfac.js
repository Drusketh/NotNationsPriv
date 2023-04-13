$(document).ready(function() {
    var max = 10;
    var ct = 1;
    var wrapper = $(".input_fields_wrap");
    var add_button = $(".add_field_button");

    $(add_button).click(function(e) {
        e.preventDefault();
        if ($(this).parent().children().length < max+1) {
            ct = $(this).parent().children().length - 1
            var button = this;
            var test = $(this).parent().children().first().clone().insertBefore($(this));
            var resource = $(test).children()[0];
            var count = $(test).children()[1];

            console.log($(this).parent().children().length);

            $(resource).attr('name', $(resource).attr('name') + ct);
            $(count).attr('name', $(count).attr('name') + ct);
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