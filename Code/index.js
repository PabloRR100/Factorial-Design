$( document ).ready(function()
{
    
    $("#loginalumnos").click(function()
    {
        $("#login").fadeIn();
        $("#loginprof").hide();
    });
        
});

$( document ).ready(function()
{
    
    $("#loginprofesores").click(function()
    {
        $("#loginprof").fadeIn();
        $("#login").hide();
    });
        
});
