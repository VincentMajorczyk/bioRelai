<?php

$messageErreurConnexion = '';



if(isset($_GET['menuPrincipalBioRelai'])){
	$_SESSION['menuPrincipalBioRelai']= $_GET['menuPrincipalBioRelai'];
}
else
{
	if(!isset($_SESSION['menuPrincipalBioRelai'])){
		$_SESSION['menuPrincipalBioRelai']="visiteurs";
	}
}


if(isset($_GET['menuAdherentBioRelai'])){
	$_SESSION['menuAdherentBioRelai2']= $_GET['menuAdherentBioRelai'];
}
else
{
	if(!isset($_SESSION['menuAdherentBioRelai2'])){
		$_SESSION['menuAdherentBioRelai2']="adherents";
	}
}



/***********************************************************************
 * Vérification de la connexion (login + mdp)
 * indentification de l'utilisateur connecté (nom + prénom) statut conservés dans une variable de session.
 * par défaut le statut est visiteur.
 * Appel du controleur correspondant au statut.
*********************************************************************** */
if(isset($_POST['submitConnex'])){
    $unUtilisateur = new Utilisateur($_POST['login'] , $_POST['mdp']);
    $_SESSION['identification'] = utilisateurDAO::verification($unUtilisateur);
    var_dump($_SESSION['identification']);
    $_SESSION['menuPrincipalBioRelai'] =   $_SESSION['identification']['statut'];
  
    /******************************************************************
     * Erreur de connexion
     * Affichage du message d'erreur
     ******************************************************************/
    if(!$_SESSION['identification']){
        $_SESSION['menuPrincipalBioRelai']  = "connexion";
        $messageErreurConnexion = 'Login ou mot de passe incorrects  !';
    }
}
else if(!isset( $_SESSION['identification'])){
    $_SESSION['identification']['statut']= "visiteurs";
    $_SESSION['menuPrincipalBioRelai'] =   $_SESSION['identification']['statut'];
    $_SESSION['identification']['nom']= null;
    $_SESSION['identification']['prenom']= null;
    $_SESSION['identification']['login']= null;
}


if(isset($_POST['submitInscription'])){
    utilisateurDAO::inscription($_POST['mail'], $_POST['mdp'], "adherents", $_POST['nom'], $_POST['prenom']);
    $_SESSION['menuPrincipalBioRelai']  = "visiteurs";
}

if(isset($_POST['confirmerModifCompte'])){
    utilisateurDAO::updateInfos(utilisateurDAO::getIdByMail($_SESSION['identification']['mail']), $_POST['mailInput'], $_POST['nomUtilisateur'], $_POST['prenomUtilisateur'], $_POST['mdp']);
}

if(isset($_POST['suppprimerCompte'])){
    utilisateurDAO::delUtilisateur(utilisateurDAO::getIdByMail($_SESSION['identification']['mail']));
    $_SESSION['menuPrincipalBioRelai'] = "visiteurs";
}


/*****************************************************************
 * Appel des controleurs de connexion et d'insciption.
 *****************************************************************/
//Demande de connexion
else if(isset($_GET['demandeConnexion'])){
    $_SESSION['menuPrincipalBioRelai']= "connexion";
}

//Demande d'inscription
else if(isset($_GET['demandeInscription'])){
    $_SESSION['menuPrincipalBioRelai']= "inscription";
}

/**************************************************************************
 * Gestion des demandes de déconnexion.
 * Retour au statut visiteur - controleur visiteurs
 **************************************************************************/
else if(isset($_GET['demandeDeconnexion'])  
|| (isset($_GET['menuProducteurs']) && $_GET['menuProducteurs']=='deconnexion')
|| (isset($_GET['menuAdherents']) && $_GET['menuAdherents']=='deconnexion')
|| (isset($_GET['menuBioRelai']) && $_GET['menuBioRelai']=='deconnexion')
){
    $_SESSION['identification']['statut']= "visiteurs";
    $_SESSION['identification']['nom']= null;
    $_SESSION['identification']['prenom']= null;
    $_SESSION['identification']['login']= null;
    $_SESSION['menuPrincipalBioRelai'] =   $_SESSION['identification']['statut'];
}

/***********************************************************************
 * Appel du controleur sélectonné
 ***********************************************************************/
$_SESSION['identification'];
var_dump(("menu principal ".$_SESSION['menuPrincipalBioRelai']));

//$_SESSION['idUtilisateur'] = utilisateurDAO::getIdByMail($_SESSION['identification']['mail']);
//var_dump($_SESSION['idUtilisateur']);
include_once Dispatcher::dispatch($_SESSION['menuPrincipalBioRelai']);





























    