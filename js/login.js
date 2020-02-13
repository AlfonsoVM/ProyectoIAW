$("#signup").click(function() {
$("#first").fadeOut("fast", function() {
$("#second").fadeIn("fast");
});
});

$("#signin").click(function() {
$("#second").fadeOut("fast", function() {
$("#first").fadeIn("fast");
});
});


    
            $(function() {
            $("form[name='login']").validate({
                rules: {
                
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    
                }
                },
                messages: {
                email: "Por favor introduzca un correo válido",
                
                password: {
                    required: "Por favor introduzca una contraseña",
                
                }
                
                },
                submitHandler: function(form) {
                form.submit();
                }
            });
            });
            


$(function() {
    
    $("form[name='registration']").validate({
    rules: {
        firstname: "required",
        email: {
        required: true,
        email: true
        },
        password: {
        required: true,
        minlength: 5
        }
    },
    
    messages: {
        firstname: "Por favor introduzca su nombre",
        password: {
        required: "Por favor escriba una contraseña",
        minlength: "La contraseña tiene que tener una longitud mínima de 5 caracteres"
        },
        email: "Por favor introduzca un correo electrónico válido"
    },
    
    submitHandler: function(form) {
        form.submit();
    }
    });
});
    