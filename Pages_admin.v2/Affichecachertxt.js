let mode; //permet de poser une conditions dans les fonctions

function avertis(){
	//lance la fonction afficherg
	let en=document.getElementById("imgpass");
	en.addEventListener('click', afficherg);
	mode=0; //permet de lancer la modification texte avec la première condition
}

function afficherg(){
	//change le champs de mot passe pour l'afficher ou le masquer
	if(mode==0){
		document.getElementById("password").setAttribute("type","text"); //ajoute un attribut texte à l'élément égal à l'id
		document.getElementById("imgpass").src="img/visible.png"; // change l'image de base
		mode=1;	//permet de lancer le else qui va permettre de pouvoir recacher le mot de passe
	}
	else{
		document.getElementById("password").setAttribute("type","password"); //remplace par un attribut password
		document.getElementById("imgpass").src="img/invisible.png"; //modifie l'image à nouveau
		mode=0;
	}
} 

window.addEventListener('load', avertis);