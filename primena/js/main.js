$(function()
{
    var config = {
        transition: 500,
        scrollTop: 800,
    };
    
    $("body").fadeIn(config.transition);
    $("a.transition").click(function()
    {
        event.preventDefault();
        var href = this.href;
        $("body").fadeOut(config.transition, function(){ window.location.href = href; });
    });
    $("#back-top").hide();
    $(function()
    {
        $(window).scroll(function()
        {
            if ($(this).scrollTop() > 100) $('#back-top').fadeIn();
            else $('#back-top').fadeOut();
        });
    });
    $('#back-top').click(function()
    {
        $('body,html').animate({
            scrollTop: 0
        }, config.scrollTop);
        return false;
    });
    $(".internal").click(function(e)
    {
        $(".site-container").fadeOut();
        $.get($(e.target).data().href, function(data)
        {
            $(".site-container").html(data);
            $(".site-container").fadeIn();
        });
    });
    $(".slide").hover(function(e)
    {
        var id = $(e.target).data().id
        if(e.type === "mouseenter")
        {
            $(".slide[data-id=" + id + "]").fadeTo("slow", 0.5);
            $(".slide[data-id=" + id + "] .caption").fadeTo("slow", 1);
        }
        else
        {
            $(".slide[data-id=" + id + "]").fadeTo("slow", 1);
            $(".slide[data-id=" + id + "] .caption").fadeTo("slow", 0);
        }
    });
});