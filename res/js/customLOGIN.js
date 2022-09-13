








$('#recover-final-form').on('submit', function(e) {

    e.preventDefault();
    var formValues = $(this).serializeArray();

    var newpass = formValues[0]['value'];
    var newpass_confirm = formValues[1]['value'];
    var code = formValues[2]['value'];


        $.ajax({
            url : "/recuperar-senha/redefinir",
            type : 'post',
            data : {
                codigo : code,
                newpass : newpass,          
                newpass_confirm : newpass_confirm
            },     
            beforeSend : function(){
               $('#conect-text').text("Carregando...");
            }
       })
       .done(function(msg){
      
	    swal(
            {
                title: msg['wellcomeMSG'],
                type: 'success',
                closeOnClickOutside: true,
                closeOnEsc: true,
                confirmButtonColor: "#fff",
                text: msg['DescriptionMSG'],
                timer: 5000,
            }
        )
        var counter = 0;
        setInterval(function () {
            window.location = msg['WEBSITEURL'];
            ++counter;
          }, 1000);

       
        $('#conect-text').text("Atualizar senha"); 
      })
       .fail(function(msg){
            
            swal(
                {
                    title: 'Epa! Ocorreu um erro..',
                    type: 'error',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: msg['responseJSON']['errorMSG'],
                }
            )

            $('#conect-text').text("Atualizar senha");
       });

      

    
});
























$('#recover-form').on('submit', function(e) {

    e.preventDefault();
    var formValues = $(this).serializeArray();

    var deslogin = formValues[0]['value'];
    var deslogin_confirm = formValues[1]['value'];


        $.ajax({
            url : "/recuperar-senha",
            type : 'post',
            data : {
                deslogin : deslogin,
                deslogin_confirm : deslogin_confirm
            },     
            beforeSend : function(){
               $('#conect-text').text("Carregando...");
            }
       })
       .done(function(msg){
      
        

	    swal(
            {
                title: 'E-mail de recuperação enviado com sucesso',
                type: 'success',
                closeOnClickOutside: true,
                closeOnEsc: true,
                confirmButtonColor: "#fff",
                text: 'Pode demorar até alguns minutos para a mensagem chegar',
                timer: 5000,
            }
        )

       
        $('#conect-text').text("Enviar recuperação de senha"); 
      })
       .fail(function(msg){
            
            swal(
                {
                    title: 'Epa! Ocorreu um erro..',
                    type: 'error',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: msg['responseJSON']['errorMSG'],
                }
            )

            $('#conect-text').text("Enviar recuperação de senha");
       });

      

    
});
























$('#login-form').on('submit', function(e) {

    e.preventDefault();
    var formValues = $(this).serializeArray();

    var Login = formValues[0]['value'];
    var Password = formValues[1]['value'];


        $.ajax({
            url : "/conectar-se",
            type : 'post',
            data : {
                deslogin : Login,
                despassword : Password
            },     
            beforeSend : function(){
               $('#conect-text').text("Carregando...");
            }
       })
       .done(function(msg){
      
	    swal(
            {
                title: msg['wellcomeMSG'],
                type: 'success',
                closeOnClickOutside: true,
                closeOnEsc: true,
                confirmButtonColor: "#fff",
                text: 'Vou te redirecionar para o site em breve..',
                timer: 2000,
            }
        )
        var counter = 0;
        setInterval(function () {
            window.location = msg['WEBSITEURL'];
            ++counter;
          }, 1000);

       
        $('#conect-text').text("Conectar-se"); 
      })
       .fail(function(msg){
            
            swal(
                {
                    title: 'Epa! Ocorreu um erro..',
                    type: 'error',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: msg['responseJSON']['errorMSG'],
                }
            )

            $('#conect-text').text("Conectar-se");
       });

      

    
});
