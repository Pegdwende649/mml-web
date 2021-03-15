// JavaScript Document

function verifNom() 
{
	var champ_nom = document.getElementById("user_name").value;
	
	  if(champ_nom != '')
		{
			div_user.innerHTML = "<span class='error'> </span>";
		} else 
		{
			div_user.innerHTML = "<span class='error'>Entrez votre nom !</span>";
		}
}

function checkPass()
{
var champA = document.getElementById("mdp").value;
var champB = document.getElementById("mdp_conf").value;
var longueur = document.getElementById("mdp_conf").value.length;
 
if(champA == champB)
{
	if (longueur < 6)
	{
	div_mdp.innerHTML = "<span class='error'>Six (6) caractères au moins</span>"; 
	} else 
	{
div_mdp.innerHTML = "<span class='correct'>Mots de passe identiques</span>";
div_mdp_conf.innerHTML = "<span class='correct'></span>";
	}
}
else
{
div_mdp.innerHTML = "<span class='error'>Mots de passe non identiques</span>";
}
}

function checkEmail()
{
var champA = document.getElementById("email").value;
var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
 
	if (!reg.test(champA))
	{
	  div_email.innerHTML = "<span class='error'>Email incorrect</span>";
	} else { div_email.innerHTML = "<span class='correct'>Email correct</span>"; }
	
	
	
	if(champA == '')
		{
			div_email.innerHTML = "<span class='error'> Entrez votre e-mail!</span>";
		}
}

