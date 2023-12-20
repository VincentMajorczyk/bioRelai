<?php

$FormulaireGestionCompte = new Formulaire("post", "index.php", "gestionCompte", "gestionCompte");
$_SESSION['infosUtilisateur'] = utilisateurDAO::getInfoByID(utilisateurDAO::getIdByMail($_SESSION['identification']['mail']));
var_dump($_SESSION['infosUtilisateur']);

if(isset($_POST['modifierCompte'])){
    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerLabel("Mail : ", "mail"), 1);
    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerInputTexte("mailInput", "mailInput", $_SESSION['infosUtilisateur']['mail'], "1", "", "0"), 1);
    $FormulaireGestionCompte->ajouterComposantTab();

    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerLabel("Nom de l'utilisateur : ", "nomUtilisateur"), 1);
    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerInputTexte("nomUtilisateur", "nomUtilisateur", $_SESSION['infosUtilisateur']['nomUtilisateur'], "1", "", "0"), 1);
    $FormulaireGestionCompte->ajouterComposantTab();

    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerLabel("Prenom de l'utilisateur : ", "prenomUtilisateur"), 1);
    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerInputTexte("prenomUtilisateur", "prenomUtilisateur", $_SESSION['infosUtilisateur']['prenomUtilisateur'], "1", "", "0"), 1);
    $FormulaireGestionCompte->ajouterComposantTab();

    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerLabel("Mot de passe : ", "mdp"), 1);
    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerInputPass("mdp", "mdp", $_SESSION['infosUtilisateur']['mdp'], "1", "", "1"), 1);
    $FormulaireGestionCompte->ajouterComposantTab();

    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerInputSubmit("confirmerModifCompte", "confirmerModifCompte", "Confirmer"), 1);

    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerInputSubmit("annulerModifCompte", "annulerModifCompte", "Annuler"), 1);
    $FormulaireGestionCompte->ajouterComposantTab();
}
else{
    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerLabel("Mail : ", "mail"), 1);
    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerInputTexte("mailInput", "mailInput", $_SESSION['infosUtilisateur']['mail'], "1", "", "1"), 1);
    $FormulaireGestionCompte->ajouterComposantTab();

    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerLabel("Nom de l'utilisateur : ", "nomUtilisateur"), 1);
    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerInputTexte("nomUtilisateur", "nomUtilisateur", $_SESSION['infosUtilisateur']['nomUtilisateur'], "1", "", "1"), 1);
    $FormulaireGestionCompte->ajouterComposantTab();

    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerLabel("Prenom de l'utilisateur : ", "prenomUtilisateur"), 1);
    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerInputTexte("prenomUtilisateur", "prenomUtilisateur", $_SESSION['infosUtilisateur']['prenomUtilisateur'], "1", "", "1"), 1);
    $FormulaireGestionCompte->ajouterComposantTab();

    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerLabel("Mot de passe : ", "mdp"), 1);
    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerInputPass("mdp", "mdp", $_SESSION['infosUtilisateur']['mdp'], "1", "", "1"), 1);
    $FormulaireGestionCompte->ajouterComposantTab();

    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerInputSubmit("modifierCompte", "modifierCompte", "Modifier"), 1);
    $FormulaireGestionCompte->ajouterComposantTab();

    $FormulaireGestionCompte->ajouterComposantLigne($FormulaireGestionCompte->creerInputSubmit("suppprimerCompte", "suppprimerCompte", "Supprimer le compte"), 1);
    $FormulaireGestionCompte->ajouterComposantTab();

}


$FormulaireGestionCompte->creerFormulaire();

include_once 'vues/adherents/vueGestionComptes.php';
