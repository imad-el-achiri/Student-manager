<?php
require 'model.php';
class ctrl
{
	private $model;
	public function __construct()
	{
		$this->model=new model();
	}
	public function LoginAction(){
        require 'VLogin.php';
	}
	public function allMaterialsAction()
	{
		$materials=$this->model->allMaterials();
		require 'VAllMaterials.php';
	}
	public function verifAction(){
        $LOGIN=array($_POST['username'],$_POST['pass']);
        $res=$this->model->verif($LOGIN);
        if($res[0]==0){
            require "VfLogin.php";
        }
        else{
            session_start();
            $_SESSION['email']=$_POST['username'];
            $_SESSION['pass']=$_POST["pass"];
            $info=$this->model->infos($_SESSION['email']);
            $_SESSION['nom']=$info[1];
            $_SESSION['prenom']=$info[2];
            $_SESSION['fct']=$info[3];
            $_SESSION['photo']=$info[5];
            $_SESSION['classe']=$info[6];
            $_SESSION["classes"]=$this->model->classes($_SESSION['email']);
            require 'VClasses.php';
        }
	}
	public function classesAction()
	{
		$cls=$this->model->classes();
		//print_r($cls);
        require "VClasses.php";
	}
	public function ClassAddAction()
	{
		$class_info=array($_POST['NC']." ".$_POST['AC'],$_POST['SA'],$_POST['NE'],$_POST['DC']);
		$this->model->ClassAdd($class_info);

	}
	public function EdtFormAction(){
        $cls=$this->model->classes();
        $l=count($cls);
        require "VEdtForm.php";
	}
	public function ClasseChooseAction(){
        $cls=$this->model->classes();
        $l=count($cls);
        require 'VClsChoose.php';
	}
	public function EdtAction(){
        //$id_cls=$this->model->classe($_POST['cls'])[0];
	}
	public function AddEdtAction(){
        $id_cls=$this->model->classe($_POST['cls'])['id_cls'];
        $link1=$_POST['link'];
        echo gettype($id_cls);
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
        $id_cls=$this->model->classe($_POST['cls']);
        $info=$this->model->EdtInfo(array($id_cls[0]));
        require 'VEdt.php';
	}
	public function formMatAction()
	{
		$cats=$this->model->allCategories();
		require 'VFormMaterial.php';
	}
	public function ClassFormAction(){
        require "VClassForm.php";
	}
	public function ClasseEditAction(){
        $cls_info=$this->model->one_classe($_GET['id']);
        require 'VClsEdit.php';
	}
	public function ClasseUpdateAction(){
        $AC=$_POST['AC'];
        $class_info=array($_POST['NC']." ".$_POST['AC'],$_POST['SA'],$_POST['NE'],$_POST['DC'],$_GET['id']);
		$this->model->classe_update($class_info,$AC);
	}
	public function ClasseDeleteAction(){
        $this->model->classe_del($_GET['id']);
	}
	public function etudFormAction(){
		$cls=$this->model->classes();
        $l=count($cls);
        require "Vetudiantform.php";
	}
	public function etudAddAction()
	{
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
		$etud_info=array($_POST['PR'],$_POST['NOM'],$_POST['GE'],$id_cls,$_POST['EM'],$_POST['TEL'],$_POST['ADR'],$file_name);
		//print_r($etud_info);
		$this->model->etudAdd($etud_info);
	}	

	public function staffFormAction(){
		#$cls=$this->model->classes();
        #$l=count($cls);
        require "Vstaffform.php";
	}
	public function staffAddAction()
	{
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
		print_r($staff_info);
		$this->model->staffAdd($staff_info);
		require "Vdroitform.php";
	}

	/*public function droitFormAction(){
        require "Vdroitform.php";
	}*/
	public function droitAddAction()
	{
		$id_user=$this->model->id_user($_GET['eml']);
		print_r($id_user);
		$indx=array('cls','etd','anc','edt','mdl','note');
		$droit_info=array(isset($_POST['cls']),isset($_POST['etd']),isset($_POST['anc']),isset($_POST['edt']),isset($_POST['mdl']),isset($_POST['note']),$id_user);
		foreach($indx as $i){
            if(!isset($_POST[$i])){
                $_POST[$i]=0;
            }
		}
		$droit_info=array($_POST['cls'],$_POST['etd'],$_POST['anc'],$_POST['edt'],$_POST['mdl'],$_POST['note'],$id_user);
		print_r($droit_info);
		//$this->model->droitAdd($droit_info);
	}	
	public function addMaterialAction()
	{
		$material=array(null,$_POST['intitule'],$_POST['description'],$_POST['type'],$_POST['datedefabrication'],$_POST['prix'],$_POST['categorie']);
		$this->model->addMaterial($material);
		header('location:ctrl.php?action=allmat');
	} 
	public function action()
	{
		$action="login";
		if(isset($_GET['action'])) $action=$_GET['action'];
		switch($action)
		{
			case 'login' : $this->LoginAction();break;
			case 'verif': $this->verifAction();break;
			case 'class_add' : $this->ClassAddAction();break;
			case 'classes' : $this->ClassesAction(); break;
			case 'class_form' : $this->ClassFormAction(); break;
			case 'edt_form' : $this->EdtFormAction(); break;
			case 'Sh_Edt' : $this->EdtShowAction(); break;
			case 'AddEdt' : $this->AddEdtAction(); break;
			case 'Cls_Choose' : $this->ClasseChooseAction(); break;
			case 'class_edit' : $this->ClasseEditAction(); break;
			case 'class_update' : $this->ClasseUpdateAction(); break;
			case 'class_delete' : $this->ClasseDeleteAction(); break;
			case 'Addetud':$this->etudAddAction();break;
			case 'etud_form' : $this->etudFormAction(); break;
			case 'Addstaff':$this->staffAddAction();break;
			case 'staff_form' : $this->staffFormAction(); break;
			case 'Adddroit':$this->droitAddAction();break;
			case 'add':$this->addMaterialAction();break;
		}
	}
}

$c=new ctrl();
$c->action();

?>
