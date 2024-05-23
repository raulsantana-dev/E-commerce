function validarSenha(){
    var senha = document.getElementById("exampleInputPassword1").value;
    var confirm = document.getElementById("exampleInputPassword2").value;
    
    if (confirm !== senha ){
        alert("As senhas inseridas não correspondem. Por Favor, digite novamente")
        return false;
    }
    return true;
}
function validarCampos(){
    var email = document.getElementById("exampleInputEmail1").value;
    var senha = document.getElementById("exampleInputPassword1").value;
    var nome = document.getElementById("exampleInputtext1").value;
    var data = document.getElementById("exampleInputdate").value
    

    if (!nome || !email || !senha || !data ) {
        alert("Preencha os campos corretamente");
        return false;
    }
    return true;
 } 

function validarFormulario() {
    var senhaValida = validarSenha();

    var camposValido = validarCampos();
    
    return senhaValida && camposValido;
}

$(function(){
   var input = $('#cep');
    input.on('focusout', function(){

   
    console.log("https://viacep.com.br/ws/"+input.val()+"/json")
        $.ajax({
            method: "GET",
            url: "https://viacep.com.br/ws/"+input.val()+"/json"
            
           }).done(function(msg){
            console.log(msg)
            $('#rua').val(msg.logradouro) 
            $('#cidade').val(msg.localidade)
            $('#bairro').val(msg.bairro)
            $('#estado').val(msg.uf)
       })
    })
});


