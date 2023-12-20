<?php

$FormulaireAnciennesCommandes = new Formulaire("post", "index.php", "anciennesCommande", "anciennesCommande");
$_SESSION['infosAnciennesCommandes'] = utilisateurDAO::getAncienneCommandesById(utilisateurDAO::getIdByMail($_SESSION['identification']['mail']));
var_dump($_SESSION['infosAnciennesCommandes']);


$FormulaireAnciennesCommandes->ajouterComposantLigne($FormulaireAnciennesCommandes->creerLabel("Anciennes commandes ", "anciennesCom"), 1);
$FormulaireAnciennesCommandes->ajouterComposantTab();
$FormulaireAnciennesCommandes->ajouterComposantLigne($FormulaireAnciennesCommandes->creerLabel("Numéro commande : ", "numCommande"), 1);
$FormulaireAnciennesCommandes->ajouterComposantLigne($FormulaireAnciennesCommandes->creerInputTexte("nomCommandeInput", "nomCommandeInput", $_SESSION['infosAnciennesCommandes']['idCommande'], "1", "", "1"), 1);
$FormulaireAnciennesCommandes->ajouterComposantTab();
$FormulaireAnciennesCommandes->ajouterComposantLigne($FormulaireAnciennesCommandes->creerLabel("Nom du produit : ", "nomProduit"), 1);
$FormulaireAnciennesCommandes->ajouterComposantLigne($FormulaireAnciennesCommandes->creerInputTexte("nomProduitInput", "nomProduitInput", $_SESSION['infosAnciennesCommandes']['nomProduit'], "1", "", "1"), 1);
$FormulaireAnciennesCommandes->ajouterComposantTab();
$FormulaireAnciennesCommandes->ajouterComposantLigne($FormulaireAnciennesCommandes->creerLabel("Quantité : ", "quantite"), 1);
$FormulaireAnciennesCommandes->ajouterComposantLigne($FormulaireAnciennesCommandes->creerInputTexte("quantiteInput", "quantiteInput", $_SESSION['infosAnciennesCommandes']['quantite'], "1", "", "1"), 1);
$FormulaireAnciennesCommandes->ajouterComposantTab();

$FormulaireAnciennesCommandes->creerFormulaire();

include_once 'vues/adherents/vueAchats.php';

