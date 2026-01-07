<?php

use BcMath\Number;

    class Product {
        private ?int $id = null;
        private string $libelle;
        private string $description;
        private float $prix;
        private int $quantite;

        public function __construct($libelle, $description, $prix, $quantite) {
            $this->libelle = $libelle;
            $this->description = $description;
            $this->prix = $prix;
            $this->quantite = $quantite;
        }


        public function getId() {
            return $this->id;
        }

        public function getLibelle() {
            return $this->libelle;
        }
        public function getDescription() {
            return $this->description;
        }

        public function getPrix() {
            return $this->prix;
        }

        public function getQuantite() {
            return $this->quantite;
        }

    }