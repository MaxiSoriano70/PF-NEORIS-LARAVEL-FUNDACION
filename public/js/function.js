$(document).ready(()=>{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#Loguearse").click((e)=>{
        e.preventDefault();
        var email=$("#Email_L").val();
        var clave=$("#Clave_L").val();
        $.ajax({
            url:'Login/diferenciar',
            type: 'post',
            data: {"Correo":email,"Clave":clave},
            success:function(response){
                console.log(response);
            },
            error:function(){
                console.log("Error Animal!");
            }
        });
    });

    $("#Registrarse").click((e)=>{
        e.preventDefault();
        var nombre=$("#Nombre_R").val();
        var apellido=$("#Apellido_R").val();
        var dni=$("#Dni_R").val();
        var email=$("#Email_R").val();
        var clave1=$("#Clave_R").val();
        var clave2=$("#Clave_R_C").val();
        var codigo_area=$("#Codigo_Area_R").val();
        var telefono=$("#Telefono_R").val();
        var fecha_de_nacimiento=$("#Fecha_de_Nacimiento_R").val();
        var direccion=$("#Direccion_R").val();
        $.ajax({
            url:'Estudiantes',
            type: 'post',
            data: {"Nombre":nombre,"Apellido":apellido,"Dni":dni,"Email":email,"Clave":clave1,"Clave_c":clave2,"Codigo_Area":codigo_area,"Telefono":telefono,"Fecha_de_nacimiento":fecha_de_nacimiento,"Direccion":direccion},
            success:function(response){
                console.log(response);
            },
            error:function(){
                console.log("Error Animal!");
            }
        });
    });
});
