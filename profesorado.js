
$( document ).ready(function()
{
    //  CREAR ALUMNOS  // 
    
    $("#crearAlumno").button().on("click",(function(){
        dialogo1.dialog("open");
    }));

    var dialogo1 = $("#dialogo1").dialog({
        open: function(){
            $(this).find("[type=submit]").hide();
        },
        
        autoOpen: false,
        title: "EDITAR ALUMNO",
        modal: true,
        position: { my: "center", at: "center", of: window },
        resizable: true,
        width: 650,
        buttons:[
            {
                text: "AÑADIR ALUMNO",
                type: "submit",
                form: "formularioRegistro"
            },
            {
                text: "CERRAR", 
                click: function(){
                    $(this).dialog("close");
                }
            }
        ]
    });
    
    // EDITAR ALUMNOS //
    
    $(".editar").button().on("click",(function(){

        var id = $(this).attr("data-alumno");
        $("#dilogEditarAlum").val(id);
        
        
        var nombre = $(".nombre_alumno[data-alumno='"+id+"']").text();
        var numero = $(".num_alumno[data-alumno='"+id+"']").text();
        
        var elemento = $("#nombreAlumnoEdit");
        elemento.val(nombre);
        $("#numAlumnoEdit").val(numero);
        
        
        
        dialogo2.dialog("open");
    }));

    
    var dialogo2 = $("#dialogo2").dialog({
        open: function(){
            $(this).find("[type=submit]").hide();
        },
        
        autoOpen: false,
        title: "EDITAR ALUMNO",
        modal: true,
        position: { my: "center", at: "center", of: window },
        resizable: true,
        width: 650,
        buttons:[
            {
                text: "EDITAR ALUMNO",
                type: "submit",
                form: "formularioEdicion",
            },
            {
                text: "CERRAR", 
                click: function(){
                    $(this).dialog("close");
                }
            }
        ]
    });
    
    //   ELIMINAR ALUMNOS   //
    
    $(".eliminar").button().on("click",(function(){
        var id = $(this).attr("data-alumno");
        $("#dilogElimAlumno").val(id);
        dialogo3.dialog("open");
    }));
    
    var dialogo3 = $("#dialogo3").dialog({
        open: function(){
            $(this).find("[type=submit]").hide();
        },
        
        autoOpen: false,
        title: "ELIMINAR ALUMNO",
        modal: true,
        position: { my: "center", at: "center", of: window },
        resizable: true,
        width: 650,
        buttons:[
            {
                text: "SI",
                type: "submit",
                form: "eleccionEliminar",
            },
            {
                text: "CERRAR", 
                click: function(){
                    $(this).dialog("close");
                }
            }
        ]
    });
    
    $("#vuelta").click(function()
    {
        window.location.href = "index.php";
    });

});
