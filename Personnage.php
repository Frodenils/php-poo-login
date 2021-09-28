<?php
    class Personnage
    {
        private $_id = 0;
        private $_nom = 'Inconnu';
        private $_force = 50;
        private $_experience = 1;
        private $_degats = 0;
        private $_niveau = 0;

        const FORCE_PETITE = 20;
        const FORCE_MOYENNE = 50;
        const FORCE_GRANDE = 80;

        private static $_texteADire = 'La partie est démarrée. Qui veut se battre !';
        private static $_nbreJoueurs = 0;

        public function __construct(array $ligne)
        {
            $this->hydrate();
            self::$_nbreJoueurs++;
            print('<br/> Le personnage "' . $nom . '" est créé !');
        }

        public function hydrate(array $ligne)
        {
            $this->setNom($nom);
            $this->setForce($force);
            $this->setDegats($degats);
            $this->setExperience(1);
            self::$_nbreJoueurs++;

            print('<br/> Le personnage "' . $nom . '" est créé !');
        }

        public function __toString(): string
        {
            return '<br/>Joueur ' . $this->getNom() . ' : Force = ' . $this->getForce() . ' / Dégats = ' . $this->getDegats() . ' / Expérience = ' . $this->getexperience();
        }

        public function setId(int $id): Personnage
        {
            if (!is_int($id)) {
                trigger_error('L\'id d\'un personnage doit être un entier', E_USER_ERROR);

                return $this;
            }

            $this->_id = $id;
            return $this;
        }

        public function getId(): int
        {
            return $this->_id;
        }

        public function setNiveau(int $niveau): Personnage
        {
            if (!is_int($niveau)) {
                trigger_error('Le niveau d\'un personnage doit être un entier', E_USER_ERROR);

                return $this;
            }

            $this->_niveau = $niveau;
            return $this;
        }

        public function getNiveau(): int
        {
            return $this->_niveau;
        }

        public function setNom(string $nom): Personnage
        {
            if (!is_string($nom)) {
                trigger_error('Le nom d\'un personnage doit être un texte', E_USER_ERROR);
                return $this;
            }

            $this->_nom = $nom;
            return $this;
        }

        public function getNom(): string
        {
            return $this->_nom;
        }

        public function setForce(int $force): Personnage
        {
            if (!is_int($force)) {
                trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
                return $this;
            }

            if ($force > 100) {
                trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
                return $this;
            }

            if (in_array($force, array(self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE))) {
                $this->_force = $force;
            } else {
                trigger_error('La force n\'est pas correcte', E_USER_ERROR);
                return $this;
            }

            return $this;
        }

        public function getForce(): int
        {
            return $this->_force;
        }

        public function setDegats(int $degats): Personnage
        {
            if (!is_int($degats)) {
                trigger_error('Les degats d\'un personnage doit être un nombre entier', E_USER_WARNING);
                return $this;
            }

            $this->_degats = $degats;
            return $this;
        }

        public function getDegats(): int
        {
            return $this->_degats;
        }

        public function setExperience(int $experience): Personnage
        {
            if (!is_int($experience)) {
                trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
                return $this;
            }

            if ($experience > 100) {
                trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
                return $this;
            }
            $this->_experience = $experience;
            return $this;
        }

        public function getExperience(): int
        {
            return $this->_experience;
        }

        public function gagnerExperience(): Personnage
        {
            $this->_experience++;
            return $this;
        }

        public static function parler()
        {
            print('<br/><br/>Je suis le personnage n°' . self::$_nbreJoueurs . ' <br/>' . self::$_texteADire . '<br/>');
        }

        public function frapper(Personnage $persoAFrapper): Personnage
        {
            $persoAFrapper->_degats += $this->_force;
            $this->gagnerExperience();
            print('<br/> ' . $persoAFrapper->getNom() . ' a été frappé par ' . $this->getNom());
            return $this;
        }
    }
?>