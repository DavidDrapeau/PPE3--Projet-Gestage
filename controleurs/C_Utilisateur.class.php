 <?php

class C_Utilisateur extends C_ControleurGenerique {

    /**
     * préparation et affichage des coordonnées de l'utilisateur courant
     */
    function coordonnees() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Vos informations');
        // charger les coordonnées de l'utilisateur connecté depuis la BDD       
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        $utilisateur = $daoPers->getOneByLogin(MaSession::get('login'));
        $daoPers->deconnecter();
        $this->vue->ecrireDonnee('utilisateur', $utilisateur);
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        // vue centrale à inclure
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreAfficherMesInformationsFormulaire.inc.php");
        $this->vue->afficher();
    }

    /**
     *  modification des coordonnées de l'utilisateur courant
     */
    function modifierCoordonnees() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Modification de vos informations');
        // charger les coordonnées de l'utilisateur connecté depuis la BDD       
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        $utilisateur = $daoPers->getOneByLogin(MaSession::get('login'));
        $daoPers->deconnecter();
        $this->vue->ecrireDonnee('utilisateur', $utilisateur);
        // transmettre le login        
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));

        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreModifierMesInformationsFormulaire.inc.php");
        $this->vue->afficher();
    }

    //validation de modification des donnée personelle à l'utilisateur
    function validerModifierCoordonnees() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', "Modification de vos informations");
        $this->vue->ecrireDonnee('centre',"../vues/includes/utilisateur/centreValiderModifierMesInformations.inc.php");
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        // récupérer les données du formulaire l'identifiant de l'utilisateur courant
        $id = $_GET["id"];

        // charger l'objet métier correspondant à l'utilisateur courant
//        $utilisateur = $daoPers->getOneByLoginEager($id);
        $utilisateur = $daoPers->getOneById($id);
//        var_dump($utilisateur);
        // mettre à jour l'objet métier d'après le formilaire de saisie
        $utilisateur->setCivilite($_POST["civilite"]);
        $utilisateur->setNom($_POST["nom"]);
        $utilisateur->setPrenom($_POST["prenom"]);
        $utilisateur->setNumTel($_POST["tel"]);
        $utilisateur->setMail($_POST["mail"]);
        if (MaSession::get('role') == 4) {
            $utilisateur->setEtudes($_POST["etudes"]);
            $utilisateur->setFormation($_POST["formation"]);
        }
        $ok = $daoPers->update($id, $utilisateur);
        if ($ok) {
            $this->vue->ecrireDonnee('message',"Modifications enregistr&eacute;es");
        } else {
            $this->vue->ecrireDonnee('message',"Echec des modifications");
        }
        $this->vue->afficher();
    }
    
    function afficheListeStage() {
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Liste des stages');
        // charger la liste des stages pour l'envoyer vers la vue concernée      
        $daoStage = new M_DaoStage();
        $daoStage->connecter();
        $lesStages = $daoStage->getAll();
        $this->vue->ecrireDonnee('lesStages', $lesStages);
        $daoStage->deconnecter();
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreListeStage.inc.php");
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();
    }
    
    function afficherStage(){
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Détails du stage');
        //objet stage
        $daoStage = new M_DaoStage();
        //objet organisation
        $daoOrganisation = new M_DaoOrganisation();
        //objet personne
        $daoPersonne = new M_DaoPersonne();
        
        $daoStage->connecter();
        $daoOrganisation->connecter();
        $daoPersonne->connecter();
        //Récupération des id
            $unStage = $daoStage->getOneById($_GET['idStage']);
            $this->vue->ecrireDonnee('unStage', $unStage); 
            $unEtudiant = $daoPersonne->getOneById($_GET['idEtudiant']);
            $this->vue->ecrireDonnee('unEtudiant', $unEtudiant);
            $unProfesseur = $daoPersonne->getOneById($_GET['idProfesseur']);
            $this->vue->ecrireDonnee('unProfesseur', $unProfesseur);
            $uneOrganisation = $daoOrganisation->getOneById($_GET['idOrganisation']);
            $this->vue->ecrireDonnee('uneOrganisation', $uneOrganisation);
            $unMaitreStage = $daoPersonne->getOneById($_GET['idMaitreStage']);
            $this->vue->ecrireDonnee('unMaitreStage', $unMaitreStage);
        $daoPersonne->deconnecter();
        $daoOrganisation->deconnecter();
        $daoStage->deconnecter();
        
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreDetailsStage.inc.php");
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();
    }
    
    //Supprimer un stage
    function supprimerStage(){
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        //objet stage
        $daoStage = new M_DaoStage();
        $daoStage->connecter();
        //Suppression du/des stage associé à l'élève
        $daoStage->delete($_GET['idStage']);
        $daoStage->deconnecter();

        header('Location: ?controleur=Utilisateur&action=afficheListeStage');
    }
    
    //Liste des entreprises (organisations)
    function listeEntreprises(){
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Liste des entreprises');
        // charger la liste des entreprises pour l'envoyer vers la vue concernée      
        $daoEntreprise = new M_DaoOrganisation();
        $daoEntreprise->connecter();
        $lesEntreprises = $daoEntreprise->getAll();
        $this->vue->ecrireDonnee('lesEntreprises', $lesEntreprises);
        $daoEntreprise->deconnecter();
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreListeEntreprise.inc.php");
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();
    }
    
    //Afficher les détails d'une entreprise
    function afficherEntreprise(){
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', "Informations concernant l'entreprise");
        
        $daoEntreprise = new M_DaoOrganisation();
        $daoEntreprise->connecter();
        $uneEntreprise = $daoEntreprise->getOneById($_GET['idEntreprise']);
        $this->vue->ecrireDonnee('uneEntreprise', $uneEntreprise);
        $daoEntreprise->deconnecter();
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreDetailsEntreprise.inc.php");
        $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
        $this->vue->afficher();
    }
    
    //Ajout d'une nouvelle entreprise
    function creerEntreprise(){
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Cr&eacute;ation d\'une entreprise');
        
        $this->vue->ecrireDonnee('loginAuthentification',MaSession::get('login'));       
        $this->vue->ecrireDonnee('centre', "../vues/includes/utilisateur/centreCreerEntreprise.inc.php");
               
        $this->vue->afficher();
    }
    
    //Validation de l'ajout d'une nouvelle entreprise
    function validationCreerEntreprise(){
        //Récupération données
        $nom = $_POST["nom"];
        $ville = $_POST["ville"];
        $adresse = $_POST["adresse"];
        $cp = $_POST["cp"];
        $tel = $_POST["tel"];
        $fax = $_POST["fax"];
        $formeJ = $_POST["frmJu"];
        $activite = $_POST["activite"];
        
        //On vérifie les données
        if (!empty($nom) && !empty($ville) && !empty($adresse) && !empty($cp) && preg_match('`^0[1-9]([-. ]?[0-9]{2}){4}$`', $tel) && preg_match('`^0[1-9]([-. ]?[0-9]{2}){4}$`', $fax) && !empty($formeJ) && !empty($activite)) {
            //Création des objets
            $daoEntreprise = new M_DaoOrganisation();
            $daoEntreprise->connecter();
            
            //Vérification données en bdd
            $verif = $daoEntreprise->verif('tel_organisation', $tel);
            if ($verif == 0) {
                $message = "Erreur : le numéro de téléphone existe déjà, recommencez !";
            }
            $verif = $daoEntreprise->verif('fax_organisation', $fax);
            if ($verif == 0) {
                $message = "Erreur : le numéro du fax existe déjà, recommencez !";
            }
            $daoEntreprise->getPdo();
           
            //Création des objets
            $entre = new M_Organisation(null, $nom, $ville, $adresse, $cp, $tel, $fax, $formeJ, $activite);
            //Connexion et insert bdd
            $daoEntreprise->connecter();
            $pdo = $daoEntreprise->getPdo();
            
            if ($verif != 0) {
                if ($daoEntreprise->insert($entre) == true) {
                    header('Location: .');
                }
            } else {
            if(is_null($message)){
                $message = 'Erreur de création, veuillez saisir correctement les données';
            }
            $this::creerEntreprise($message);
            
            }
        }
         
        }
    
}

?>