<?php


/**
 * Description of C_AdminPersonnes
 * CRUD Personnes
 * @author btssio
 */
class C_AdminPersonnes extends C_ControleurGenerique {
    // Fonction d'affichage du formulaire de création d'une personne
    function creerPersonne(){
        $this->vue = new V_Vue("../vues/templates/template.inc.php");
        $this->vue->ecrireDonnee('titreVue', 'Cr&eacute;ation d\'une personne');
        // ... depuis la BDD       
        $daoPers = new M_DaoPersonne();
        $daoPers->connecter();
        $pdo = $daoPers->getPdo();
       
        // Mémoriser la liste des spécialités disponibles
        $daoSpecialite = new M_DaoSpecialite();
        $daoSpecialite->setPdo($pdo);
        $this->vue->ecrireDonnee('lesSpecialites', $daoSpecialite->getAll());
               
        // Mémoriser la liste des rôles disponibles
        $daoRole = new M_DaoRole();
        $daoRole->setPdo($pdo);
        $this->vue->ecrireDonnee('lesRoles', $daoRole->getAll());
        
        $this->vue->ecrireDonnee('loginAuthentification',MaSession::get('login'));       
        $this->vue->ecrireDonnee('centre', "../vues/includes/adminPersonnes/centreCreerPersonne.inc.php");
               
        $this->vue->afficher();
    }
    
    //validation de création d'utilisateur 

    	
    	function validationcreerPersonne(){
        //Récupération données
        $specialite = $_POST["option"];
        $role = $_POST["role"];
        $civilite = $_POST["civilite"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $mail = $_POST["mail"];
        $numTel = $_POST["tel"];
        $mobile = $_POST["telP"];
        $etudes = $_POST["etudes"];
        $formation = $_POST["formation"];
       $login = $_POST["login"];
        $mdp = sha1($_POST["mdp"]);
        
        //On vérifie les données
        if (!empty($nom) && !empty($prenom) && !empty($mail) && !empty($login) && !empty($mdp) && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail) && preg_match('`^0[1-9]([-. ]?[0-9]{2}){4}$`', $numTel)) {
            //Création des objets
            $daoPers = new M_DaoPersonne();
            $daoPers->connecter();
            
            //Vérification données en bdd
            $verif = $daoPers->verif('adresse_mail', $mail);
            if ($verif == 0) {
                $message = "Erreur : l'adrese email existe déjà, recommencez !";
            }
            $verif = $daoPers->verif('loginutilisateur', $login);
            if ($verif == 0) {
                $message .= "Erreur : le login existe déjà, recommencez !";
            }
            $daoPers->getPdo();
           
            //Création des objets
            $objetRole = new M_Role($role, null, null);
            $pers = new M_Personne(null, $specialite, $objetRole, $civilite, $nom, $prenom, $numTel, $mail, $mobile, $etudes, $formation, $login, $mdp);
            //Connexion et insert bdd
            $daoPers->connecter();
            $pdo = $daoPers->getPdo();
            
            if ($verif != 0) {
                if ($daoPers->insert($pers) == true) {
                    header('Location: .');
                }
            } else {
            if(is_null($message)){
                $message = 'Erreur de création, veuillez saisir correctement les données';
            }
            $this::creerPersonne($message);
            }
        }
         
        }
        
        //Affichage de la liste des élèves
        function afficherEleves(){
            $this->vue = new V_Vue("../vues/templates/template.inc.php");
            $this->vue->ecrireDonnee('titreVue', 'Liste des élèves');
            // charger la liste des élèves pour l'envoyer vers la vue concernée      
            $daoPersonne = new M_DaoPersonne();
            $daoPersonne->connecter();
            
            $perPage = 20;
            $pageCourante=1;
            if(isset($_GET['page'])){
                $pageCourante=$_GET['page'];
            }
        
            $lesEleves = $daoPersonne->getAllElevesPagination($perPage,$pageCourante);
            $pages= ($daoPersonne->count()/$perPage);
            $this->vue->ecrireDonnee('lesEleves', $lesEleves);
            $this->vue->ecrireDonnee('pages', $pages);
            $daoPersonne->deconnecter();
            
            $this->vue->ecrireDonnee('centre', "../vues/includes/adminPersonnes/centreListeEleves.inc.php");
            $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
            $this->vue->afficher();
        }
        
        //Afficher les détails concernant un élève
        function afficherUnEleve(){
            $this->vue = new V_Vue("../vues/templates/template.inc.php");
            $this->vue->ecrireDonnee('titreVue', 'Détails concernant cet élève');
            // charger les détails concernant un élève     
            $daoPersonne = new M_DaoPersonne();
            $daoPersonne->connecter();
            $unEleve = $daoPersonne->getOneById($_GET['idEleve']);
            $this->vue->ecrireDonnee('unEleve', $unEleve);
            $daoPersonne->deconnecter();
            $this->vue->ecrireDonnee('centre', "../vues/includes/adminPersonnes/centreDetailsEleve.inc.php");
            $this->vue->ecrireDonnee('loginAuthentification', MaSession::get('login'));
            $this->vue->afficher();
        }
        
        //Supprimer un élève
        function supprimerEleve(){
            $this->vue = new V_Vue("../vues/templates/template.inc.php");
            //objet personne
            $daoPersonne = new M_DaoPersonne();
            //objet stage
            $daoStage = new M_DaoStage();
            $daoStage->connecter();
            $daoPersonne->connecter();
            //Suppression du/des stage associé à l'élève
            $daoStage->deleteStageEleve($_GET['idEleve']);
            //Suppression de l'élève
            $daoPersonne->delete($_GET['idEleve']);
            $daoStage->deconnecter();
            $daoPersonne->deconnecter();
            
            header('Location: ?controleur=AdminPersonnes&action=afficherEleves');
        }
   }
?>

