
$( document ).ready(function()
{
    var dialog;
    var form;
    
    var nombreAlumno = $("#nombreAlumno");
    var numAlumno = $("#numAlumno");
    var permisos = $("#permisos");
    var allFields = $( [] ).add( nombreAlumno ).add( numAlumno ).add( permisos );
    var error = $(".mensajeError");
    
    function mostrarError( t ) {
        error
            .text( t )
            .addClass( "ui-state-highlight" );
        setTimeout(function() {
            error.removeClass( "ui-state-highlight", 1500 );
        }, 500 );
    }
    
    function checkLength( columna, n, min, max ) {
        if ( columna.val().length > max || columna.val().length < min ) 
        {
            columna.addClass( "ui-state-error" );
            mostrarError( "La longitud had de estar entre" +
            min + " y " + max + "." );
            return false;
        } else 
        {
            return true;
        }
    }
    
    function checkRegexp( columna, caracteres, n ) {
        if ( !( caracteres.test( columna.val() ) ) ) 
        {
            columna.addClass( "ui-state-error" );
            mostrarError( n );
            return false;
        } else 
        {
            return true;
        }
    }
   
    function addAlumno(){
        
        var valid = true;

        allFields.removeClass("ui-state-error");
/*
        valid = valid && checkLength (nombreAlumno, "nombre", 3, 16 );
        valid = valid && checkLenght (numAlumno, "numero", 4, 6 );
        valid = valid && checkLenght (permisos, "permisos", 1, 3 );
        
        valid = valid && checkRegexp ( nombreAlumno, /^[a-z]([0-9a-z_\s])+$/i, "Caracteres inválidos" );
        valid = valid && checkRegexp ( numAlumno, /^[a-z]([0-9a-z_\s])+$/i, "Caracteres inválidos" );
        valid = valid && checkRegexp ( permisos, /^[a-z]([0-9a-z_\s])+$/i, "Caracteres inválidos" );
*/
        if (valid)
        {
            dialog.dialog("close");
        }
        return valid;

    }
    
    dialog = $( "#dialog" ).dialog({
        autoOpen: false,
        title: "EDITAR ALUMNO",
        modal: true,
        position: { my: "center", at: "center", of: window },
        resizable: true,
        width: 450,
        buttons: 
        {
            "Crear Alumno": addAlumno,
            Cancel: function(){
                dialog.dialog("close");
            }
        },
        close: function(){
            form[0].reset();
            allFields.removeClass("ui-state-error");
        }
    });
    
    form = dialog.find("form").on("submit", function(event){
        event.preventDefault();
        addAlumno();
    });
    
    $("#crearAlumno").button().on("click",(function(){
        dialog.dialog("open");
    }));


        $("#vuelta").click(function()
    {
        window.location.href = "index.php";
    });
   
        
});



