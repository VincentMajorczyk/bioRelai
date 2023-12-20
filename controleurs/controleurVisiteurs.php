<?php

$menuPrincipalBioRelai = new Menu("menuPrincipalBioRelai");

if($SESSION_['menuPrincipalBioRelai'] = 'visiteurs')
$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("Informations Générales" , "informationsGenerales"));
$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("Connexion" , "Connexion"));
$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("Inscription" , "Inscription"));

$menuPrincipalBioRelai = $menuPrincipalBioRelai->creerMenu2("menuPrincipalBioRelai",$_SESSION['menuPrincipalBioRelai']);
$_SESSION["menuPrincipal"] = $menuPrincipalBioRelai;


include_once 'vues/visiteurs/vueVisiteur.php';