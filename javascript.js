//função de validaçao de cadastro de usuario
function validacao(){
	
	if(document.form.nome.value == ""){
		alert('Digite um nome');
		document.form.nome.focus();
		return false;
	}
	if(document.form.sobrenome.value == ""){
		alert('Digite um sobrenome');
		document.form.sobrenome.focus();
		return false;
	}
	if(document.form.email.value =="" || document.form.email.value.indexOf('@')==-1 || document.form.email.value.indexOf('.')==-1){
		alert('Digite um email valido');
		document.form.email.focus();
		return false;
	}
	if(document.form.login.value==""){
		alert('Digite um login');
		document.form.login.focus();
		return false;
	}
	if(document.form.senha.value.length < 8 ){
		alert('Senha fraca no minimo 8 digitos');
		document.form.senha.focus();
		return false;
	}
}

//funcao de validação de cadastro de categoria

function validaCat(){
    
    if(document.formcat.nomeCat.value == ""){
		alert('Digite um nome para categoria');
		document.formcat.nomeCat.focus();
		return false;
	}
        
    
        return true;
        
}

//funcao de validação de cadastro de produtos

function validaProd(){
	 
    if(document.formprod.nomeProd.value == ""){
		alert('Digite um nome para produto');
		document.formprod.nomeProd.focus();
		return false;
	}
	
	 if(document.formprod.precoProd.value == ""){
		alert('Digite um preço para produto');
		document.formprod.precoProd.focus();
		return false;
	}
	
	if(document.formprod.quantProd.value == ""){
		alert('Digite uma quantidade para produto');
		document.formprod.quantProd.focus();
		return false;
	}
	
	
	
	return true;
}