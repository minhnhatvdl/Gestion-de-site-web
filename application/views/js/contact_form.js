(function($){
	$(document).ready(function() {
		$('#submit-form').click(function(e){
		
			e.preventDefault();
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            var name  = $('#form_name').val(),
				email  = $('#form_email').val(),
				subject  = $('#form_subject').val(),
				message  = $('#form_message').val(),
				code=$('#form_name1').val(),
				data_html,
				success = $('#success');
				
    		if(name == "")
                $('#form_name').val('Veuillez entrer un nom SVP.');
				
			//if(subject == "")
               // $('#form_subject').val('Veuillez entrer un sujet');

            if(email == ""){
                $('#form_email').val('Adresse email réquise');
            }else if(reg.test(email) == false){
                $('#form_email').val('Email incorrect');
            }
			
            if(message == "")
                $('#form_message').val('Veuillez entrer un message SVP');
			if(code == "")
                $('#form_name1').val('Veuillez entrer le code de validation ci-dessus');

            if(message != "" && name != "" && code!="" && reg.test(email) != false) {
            	data_html = "name=" + name + "&email="+ email + "&message=" + message + "&subject="+ subject + "&code="+ code;

                //alert(data_html);
                $.ajax({
                    type: 'POST',
                    url: 'contact_form.php',
                    data: data_html,
                    success: function(msg){
						
						if (msg == 'sent'){
                        	success.html('<div class="alert alert-success">Message envoyé, merci !</div>')  ;
                            $('#form_name').val('');
							$('#form_email').val('');
							$('#form_message').val('');
							$('#form_subject').val('');
							$('#form_name1').val('');
							
                        }else if(msg =='failed'){
                            success.html('<div class="alert alert-error">Désolé, votre message <strong>n\'a pas pu</strong> etre envoyé. Si le problème persite n\'hésitez pas à nous écrire à : contact@filrouge-mode.fr</div>')  ; 
                        } else{ success.html('<div class="alert alert-error"> <strong>'+msg+'</strong> </div>');}
                    }
                });
    
            }
            return false;
        });
	});
})(jQuery);