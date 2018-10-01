$(document).ready(function() {
    
    
    $('a.dropdown-toggle').on('click', function(e) {
        var $el = $(this);
        var $parent = $(this).offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        $('.nav li.open').not($(this).parents("li")).removeClass("open");

        return false;
    });
    
    $('#tabs a').click(function (e) {
        e.preventDefault()
        $(this).tab();
    });
});
