<?php

$formulaireInscription = new Formulaire('post', 'index.php', 'fInscription', 'fInscription');

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('mail', 'Mail :'), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('mail', 'mail', ''   , 1, '',0),1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('mdp', 'Mot de passe :'), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputPass('mdp', 'mdp', '' ,1),1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('nom', 'Nom :'), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('nom', 'nom', '' ,1, '',0),1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('prenom', 'Prenom :'), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('prenom', 'prenom', '' ,1, '',0),1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription-> creerInputSubmit('submitInscription', 'submitInscription', 'Valider'),2);
$formulaireInscription->ajouterComposantTab();



$formulaireInscription->creerFormulaire();



















require_once "vues/visiteurs/vueInscription.php";
