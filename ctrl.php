<?php
require 'model.php';
class ctrl
{
	private $model;
	public function __construct()
	{
		$this->model=new model();
	}
	
	//Logging
	
	public function LoginAction(){
        require 'VLogin.php';
	}
	
	public function verifAction(){
        $LOGIN=array($_POST['username'],$_POST['pass']);
        $res=$this->model->verif($LOGIN);
        if($res[0]==0){
            require "VfLogin.php";
        }
        else{
            session_start();
            //$_SESSION['email']=$_POST['username'];
            //$_SESSION['pass']=$_POST["pass"];
            $info=$this->model->infos($_POST['username']);
            $droits=$this->model->droits($info['id_usr']);
            //echo $droits;
            //echo $info['id_usr'];
            $_SESSION['info']=$info;
            $_SESSION['droits']=$droits;
            if($_SESSION['info']['fonction']=='Etudiant'){
                $_SESSION['droits']=array("edt"=>0,"annonce"=>0,"module"=>0,"creer_classe"=>0,"creer_compte"=>0,"modif_droits"=>0);
            }
            //print_r($_SESSION['info']);
            //echo "<br> Droits : <br>";
        //print_r($_SESSION['droits']);
         //require 'VClasses.php';
         header("Location: ctrl.php?action=profile");
        }
	}
	
	public function profileAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        session_start();
        require 'Vprofile.php';
    }
    
    public function LogoutAction(){
        session_start();
        session_destroy();
        header("Location: ctrl.php?action=login");
    }
	
	
	//Classes
	
	public function ClassesAction()
	{
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
		$cls=$this->model->classes();
		//print_r($cls);
        require "VClasses.php";
	}
	
	public function ClassAddAction()
	{
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
		$class_info=array($_POST['NC']." ".$_POST['AC'],$_POST['SA'],$_POST['NE'],$_POST['DC']);
		$this->model->ClassAdd($class_info);

	}
	
	public function ClasseChooseAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        $cls=$this->model->classes();
        $l=count($cls);
        require 'VClsChoose.php';
	}
	
	public function ClassFormAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        require "VClassForm.php";
	}
	
	public function ClasseEditAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        $cls_info=$this->model->one_classe($_GET['id']);
        require 'VClsEdit.php';
	}
	
	public function ClasseUpdateAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        $AC=$_POST['AC'];
        $class_info=array($_POST['NC']." ".$_POST['AC'],$_POST['SA'],$_POST['NE'],$_POST['DC'],$_GET['id']);
		$this->model->classe_update($class_info,$AC);
	}
	
	public function ClasseDeleteAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        $this->model->classe_del($_GET['id']);
	}
	
	//EDT
	
	public function EdtFormAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        $cls=$this->model->classes();
        $l=count($cls);
        require "VEdtForm.php";
	}
	
	public function AddEdtAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        $id_cls=$this->model->classe($_POST['cls'])['id_cls'];
        $link1=$_POST['link'];
       // echo gettype($id_cls);
        $link="";
        $length = strlen($link1);
        for ($i = 0; $i < $length; $i++){
            if($link1[$i]=='s' && $link1[$i+1]=='r' && $link1[$i+2]=='c'){
                while($link1[$i+5]!='"'){
                    $link=$link.$link1[$i+5];
                    $i=$i+1;
                }
                break;
            }
        }
        setlocale(LC_TIME, "fr_FR.utf8",'fra');
        $info=array($id_cls,$link,strftime('%A, %d/%m/%Y à %H:%M'));
        $this->model->AddEdt($info);
	}
	
	public function EdtShowAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        $id_cls=$this->model->classe($_POST['cls']);
        $info=$this->model->EdtInfo(array($id_cls[0]));
        require 'VEdt.php';
	}
	

	
	//Create users
	
	public function etudFormAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
		$cls=$this->model->classes();
        $l=count($cls);
        require "Vetudiantform.php";
	}
	
	public function etudAddAction()
	{
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
		require "image_compression.php";
			  //Getting file name
			  $filename = $_FILES['IMAGE']['tmp_name'];
			  // Valid extension
			  $valid_ext = array('png','jpeg','jpg');
			  // Location
			  $id=uniqid();
			  $location = "images/".$id.".jpeg";
			  $file_name = $id.".jpeg";

			  // file extension
			  $file_extension = pathinfo($location, PATHINFO_EXTENSION);
			  $file_extension = strtolower($file_extension);
			  // Check extension
			  if(in_array($file_extension,$valid_ext)){
			    // Compress Image
			    compressImage($_FILES['IMAGE']['tmp_name'],$location,60);
			  }
			  else{
			    echo "Invalid file type.";
			  }
		$id_cls=$this->model->classe($_POST['cls'])['id_cls'];
		$etud_info=array($_POST['PR'],$_POST['NOM'],$_POST['GE'],$id_cls,$_POST['EM'],$_POST['TEL'],$_POST['ADR'],$file_name);
		//print_r($etud_info);
		$this->model->etudAdd($etud_info);
	}	

	public function staffFormAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
		#$cls=$this->model->classes();
        #$l=count($cls);
        require "Vstaffform.php";
	}
	
	public function staffAddAction()
	{
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
		require "image_compression.php";
			  //Getting file name
			  $filename = $_FILES['IMAGE']['tmp_name'];
			  // Valid extension
			  $valid_ext = array('png','jpeg','jpg');
			  // Location
			  $id=uniqid();
			  $location = "images/".$id.".jpeg";
			  $file_name = $id.".jpeg";

			  // file extension
			  $file_extension = pathinfo($location, PATHINFO_EXTENSION);
			  $file_extension = strtolower($file_extension);
			  // Check extension
			  if(in_array($file_extension,$valid_ext)){
			    // Compress Image
			    compressImage($_FILES['IMAGE']['tmp_name'],$location,60);
			  }
			  else{
			    echo "Invalid file type.";
			  }
		#$id_cls=$this->model->classe($_POST['cls'])['id_cls'];
		$staff_info=array($_POST['FO'],$_POST['PR'],$_POST['NOM'],$_POST['GE'],$_POST['EM'],$_POST['TEL'],$_POST['ADR'],$file_name);
		//print_r($staff_info);
		$this->model->staffAdd($staff_info);
		require "Vdroitform.php";
	}

	public function droitAddAction()
	{
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
		$id_user=$this->model->id_user($_GET['eml']);
		$indx=array('cls','etd','anc','edt','mdl','note');
		$droit_info=array(isset($_POST['cls']),isset($_POST['etd']),isset($_POST['anc']),isset($_POST['edt']),isset($_POST['mdl']),isset($_POST['note']),$id_user);
		foreach($indx as $i){
            if(!isset($_POST[$i])){
                $_POST[$i]=0;
            }
		}
		$droit_info=array($_POST['cls'],$_POST['etd'],$_POST['anc'],$_POST['edt'],$_POST['mdl'],$_POST['note'],$id_user[0]);
		$this->model->droitAdd($droit_info);
	}
	
	
	//Users show-delete-update
	
	
	public function staffViewAction(){
      if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
      $v=$_GET['v'];
      $stf=$this->model->AllUsers($v);
      require 'VStaff.php';
	}
	
	public function UserDeleteAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        $id=$_GET['id_user'];
        $this->model->UserDelete($id);
        header("Location: ctrl.php?action=staff_view");
	}

	public function userEditAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
		$v=$_GET['v'];
        $user_info=$this->model->one_user($_GET['id']);
		#$className=$this->model->className($etud_info['id_cls']);
		#$etud_info=array_merge ($info,$className);
		$cls=$this->model->classes();
        $l=count($cls);
        require 'VuserEdit.php';
	}
	
	public function userUpdateAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
		$file_name=0;
		$id_user=$_GET['id'];
		#$fct=$_POST['FO'];
		
		$v=$_GET['v'];
		#var_dump(isset($_FILES['IMAGE']['name']));
		#print_r($_FILES['IMAGE']['name']);
		#var_dump(!isset($_FILES['IMAGE']['name']));

		if($_FILES['IMAGE']['size']!=0)
		{
			require "image_compression.php";
			  $filename = $_FILES['IMAGE']['tmp_name'];
 			  $valid_ext = array('png','jpeg','jpg');
 			  $id=uniqid();
			  $location = "images/".$id.".jpeg";
			  $file_name = $id.".jpeg";
 			  $file_extension = pathinfo($location, PATHINFO_EXTENSION);
			  $file_extension = strtolower($file_extension);

 			  if(in_array($file_extension,$valid_ext)){
 			    compressImage($_FILES['IMAGE']['tmp_name'],$location,60);}
			  else{ echo "Invalid file type.";}
			}
		if($v==1){
			$cls=$_POST['cls'];
		$user_info=array($_POST['PR'],$_POST['NOM'],$_POST['GE'],$_POST['cls'],$_POST['EM'],$_POST['TEL'],$_POST['ADR'],$file_name);
		$this->model->user_update($user_info,$v,$id_user);}
		if($v==2){
		$user_info=array($_POST['PR'],$_POST['NOM'],$_POST['GE'],$_POST['FO'],$_POST['EM'],$_POST['TEL'],$_POST['ADR'],$file_name);
		$this->model->user_update($user_info,$v,$id_user);}
        header("Location: ctrl.php?action=staff_view");
		#$id_cls=$this->model->classe($_POST['cls'])['id_cls'];
		#$this->model->classe_update($user_info,$IMAGES,$fct,$cls);
	}
	
	
	
	//Modules
	
	public function moduleFormAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        $cls=$this->model->classes();
        $l=count($cls);
        $prf=$this->model->AllUsers(3);
        $l2=count($prf);
        require 'VModuleForm.php';
	}
	
	public function moduleAddAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        $infos=array($_POST['nom'],$_POST['prf'],$_POST['cls']);
        $this->model->addModule($infos);
        header("Location: ctrl.php?action=Module_view");
	}
	
	public function ModulesViewAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        $mdl=$this->model->AllModules();
        $l=count($mdl);
        for($i=0;$i<$l;$i++){
			$mdl[$i][3]=$this->model->one_classe($mdl[$i][3])['nom_classe'];
			$pr_inf=$this->model->OneUser($mdl[$i][2]);
			$mdl[$i][2]=$pr_inf['nom'].' '.$pr_inf['prenom'];
        }
        require 'VModules.php';
	}
	
	public function ModuleDelAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        $id=$_GET['id'];
        $this->model->delModule($id);
        header("Location: ctrl.php?action=Module_view");
	}
	
	public function ModuleEditAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        $id=$_GET['id'];
        $mdl=$this->model->OneModule($id);
        $tmp=$this->model->OneUser($mdl['id_prof']);
        $nom_prof=$tmp['nom'].' '.$tmp['prenom'];
        $nom_cls=$this->model->one_classe($mdl['id_cls'])['nom_classe'];
        $nom_module=$mdl['nom_module'];
        $id_prof=$mdl[2];
        $id_cls=$mdl[3];
        $cls=$this->model->classes();
        $l=count($cls);
        $prf=$this->model->AllUsers(3);
        $l2=count($prf);
        require 'VModuleEdit.php';
        header("Location: ctrl.php?action=Module_view");
	}
	
	public function ModuleUpdateAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        $infos=array($_POST['nom'],$_POST['prf'],$_POST['cls']);
        $this->model->UpdateModule($infos,$_GET['id']);
	}
	
	
	//Announces
	
	
	public function ancAddAction()
	{
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
		require "image_compression.php";
			  //Getting file name
			  $filename = $_FILES['IMAGE']['tmp_name'];
			  // Valid extension
			  $valid_ext = array('png','jpeg','jpg');
			  // Location
			  $id=uniqid();
			  $location = "images/".$id.".jpeg";
			  $file_name = $id.".jpeg";

			  // file extension
			  $file_extension = pathinfo($location, PATHINFO_EXTENSION);
			  $file_extension = strtolower($file_extension);
			  // Check extension
			  if(in_array($file_extension,$valid_ext)){
			    //Compress Image
			    compressImage($_FILES['IMAGE']['tmp_name'],$location,60);
			  }
			  else{
			    echo "Invalid file type.";
			  }
		$id_cls=$this->model->classe($_POST['cls'])['id_cls'];
		$anc_info=array($_POST['OB'],$id_cls,$_POST['CO'],$file_name);
		print_r($anc_info);
		$this->model->ancAdd($anc_info);
	}
	
	public function ancFormAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
		//$anc=$this->model->annonces();
		$cls=$this->model->classes();
        $l=count($cls);
        require "Vancform.php";
	}
	
	public function ancshowAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
		$anc=$this->model->annonces();
        $l=count($anc);
	        //print_r($anc[0]);

        require "Vannonce.php";
	}	
	
	//The rest
	
	public function absform2Action()
	{
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
		$users=$this->model->AllUsers(1);
		$l=count($users);
		$timeinfo=array($_POST['dtabs'],$_POST['debut'],$_POST['fin']);
        require "Vabsenceform2.php";
	}
	public function absform1Action()
	{
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
		$modules=$this->model->moduleduprof($_SESSION['id_usr']);
		$m=count($modules);
        require "Vabsenceform1.php";          
        //print_r($_SESSION['id_usr']);

	}
	
    public function resetpassAction(){
        if(!isset($_SESSION['info'])){
            header("Location: ctrl.php?action=login");
        }
        //session_start();
        $pass_info=array($_POST['new'],$_SESSION['id_usr']);
        $this->model->resetpass($pass_info);
    }
    
	public function action()
	{
		$action="login";
		if(isset($_GET['action'])) $action=$_GET['action'];
		switch($action)
		{
            //Logging
 			case 'login' : $this->LoginAction();break;           
			case 'verif': $this->verifAction();break;
            case 'profile' : $this->profileAction(); break;
            case 'resetpass' : $this->resetpassAction(); break;
            case 'logout' : $this->LogoutAction(); break;
            //Classes
 			case 'class_add' : $this->ClassAddAction();break;
			case 'classes' : $this->ClassesAction(); break;
			case 'class_form' : $this->ClassFormAction(); break;           
            case 'Cls_Choose' : $this->ClasseChooseAction(); break;
			case 'class_edit' : $this->ClasseEditAction(); break;
			case 'class_update' : $this->ClasseUpdateAction(); break;
			case 'class_delete' : $this->ClasseDeleteAction(); break;           
            //EDT
			case 'edt_form' : $this->EdtFormAction(); break;
			case 'Sh_Edt' : $this->EdtShowAction(); break;
			case 'AddEdt' : $this->AddEdtAction(); break;
            //Create users
			case 'Addetud':$this->etudAddAction();break;
			case 'etud_form' : $this->etudFormAction(); break;
			case 'Addstaff':$this->staffAddAction();break;
			case 'staff_form' : $this->staffFormAction(); break;
			case 'Adddroit':$this->droitAddAction();break;			
            //Users show-delete-update
			case 'user_edit' : $this->userEditAction(); break;
			case 'user_update' : $this->userUpdateAction(); break;
			case 'staff_view' : $this->staffViewAction(); break;
			case 'user_delete' : $this->UserDeleteAction(); break;			
			//Announces
			case 'Addanc':$this->ancAddAction();break;
			case 'anc_form' : $this->ancFormAction(); break;
			case 'ancshow' : $this->ancshowAction(); break;
			//absence
			case 'etudiants' : $this->absform2Action(); break;
			case 'timeinfo' : $this->absform1Action(); break;
			//Modules
			case 'AddModule':$this->moduleAddAction();break;
			case 'Module_form':$this->moduleFormAction();break;
			case 'Module_view':$this->ModulesViewAction();break;
			case 'Module_delete':$this->ModuleDelAction();break;
			case 'Module_edit':$this->ModuleEditAction();break;
			case 'UpdateModule':$this->ModuleUpdateAction();break;

		}
	}
}

$c=new ctrl();
$c->action();

?>
