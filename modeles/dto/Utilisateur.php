<?php

class Utilisateur{
    private ?int $idUtilisateur;
    private ?string $mail;

    private ?string $mdp;

    private ?string $statut;

    private ?string $nomUtilisateur;

    private ?string $prenomUtilisateur;

    public function __construct(?string $mail, ?string $mdp)
    {
        $this->mail = $mail;
        $this->mdp = $mdp;
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?int $idUtilisateur): void
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): void
    {
        $this->mail = $mail;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(?string $mdp): void
    {
        $this->mdp = $mdp;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): void
    {
        $this->statut = $statut;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nomUtilisateur;
    }

    public function setNomUtilisateur(?string $nomUtilisateur): void
    {
        $this->nomUtilisateur = $nomUtilisateur;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenomUtilisateur;
    }

    public function setPrenomUtilisateur(?string $prenomUtilisateur): void
    {
        $this->prenomUtilisateur = $prenomUtilisateur;
    }




}
