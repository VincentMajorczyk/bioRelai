<?php

if(isset($_GET['menuAdherentBioRelai'])){
    $_SESSION['menuAdherentBioRelai']= $_GET['menuAdherentBioRelai'];
}
else
{
    if(!isset($_SESSION['menuAdherentBioRelai'])){
        $_SESSION['menuAdherentBioRelai']="visiteurs";
    }
}
$menuAdherentBioRelai = new Menu("menuAdherentBioRelai");

$menuAdherentBioRelai->ajouterComposant($menuAdherentBioRelai->creerItemLien("Achats" , "Achats"));
$menuAdherentBioRelai->ajouterComposant($menuAdherentBioRelai->creerItemLien("Panier" , "Panier"));
$menuAdherentBioRelai->ajouterComposant($menuAdherentBioRelai->creerItemLien("Mon Compte" , "GestionComptes"));
$menuAdherentBioRelai->ajouterComposant($menuAdherentBioRelai->creerItemLien("Deconnexion" , "Connexion"));


$menuAdherentBioRelai = $menuAdherentBioRelai->creerMenu2("menuPrincipalBioRelai",$_SESSION['menuAdherentBioRelai']);
$_SESSION["menuPrincipal"] = $menuAdherentBioRelai;


include_once 'vues/adherents/vueAdherents.php';

