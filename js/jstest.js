$(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".input_fields_wrap");
    var add_button = $(".add_field_button");
    var x = 1;
    $(add_button).click(function(e) {
      e.preventDefault();
      if (x < max_fields) {
        x++;
        $(".aaaa").first().clone().appendTo(".input_fields_wrap");
        }
    });
    $(wrapper).on("click", ".remove_field", function(e) {
      e.preventDefault();
      if($(".aaaa").length > 1) {
        $(this).parent('div').remove();
        x--
      } else {
        alert('You can not delete all elements');  
      }
    })
});