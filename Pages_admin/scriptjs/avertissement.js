function avertis(){
	let en=document.getElementById("enregi");
	en.addEventListener('click', fenetre);
}

function fenetre(evenement){
    let mdp=document.getElementById("mdp").value;
    let pseudo=document.getElementById("pseudo").value;
    if (mdp=="" || pseudo==""){
        evenement.preventDefault();
		window.alert('Un de vos champs est vide veuillez recommencer');
    } 
}

window.addEventListener('load', avertis);