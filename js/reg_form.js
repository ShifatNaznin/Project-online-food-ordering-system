 function check(){
            var name=document.getElementById('name');  
            var phone=document.getElementById('phone');  
            var username=document.getElementById('username');  
            var email=document.getElementById('email');  
            var pass=document.getElementById('pass');  
            var repass=document.getElementById('repass');   
      
            if(name.value==''){
                document.getElementById('name_error').innerHTML='plese enter your name';
               name.focus();
                return false;
            }
            else{
                document.getElementById('name_error').innerHTML='';
            }
             if(phone.value==''){
                document.getElementById('phone_error').innerHTML="plese enter your name";
                 phone.focus();
                 return false;
            }
            else{
                document.getElementById('phone_error').innerHTML='';
            }
            if(username.value==''){
                document.getElementById('usernme_error').innerHTML="plese enter your name";
                 phone.focus();
                 return false;
            }
            else{
                document.getElementById('usernme_error').innerHTML='';
            }
            if(email.value==''){
                document.getElementById('email_error').innerHTML="plese enter your name";
                 phone.focus();
                 return false;
            }
            else{
                document.getElementById('email_error').innerHTML='';
            }
            if(pass.value ==''){
                document.getElementById('pass_error').innerHTML="plese enter your name";
                 phone.focus();
                 return false;
            }
            else{
                document.getElementById('pass_error').innerHTML='';
            }
            if(repass.value==''){
                document.getElementById('repass_error').innerHTML="plese enter your name";
                 phone.focus();
                 return false;
            }
            else{
                document.getElementById('repass_error').innerHTML='';
            }
          }