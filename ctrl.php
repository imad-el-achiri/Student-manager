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
            //require 'VHomeAdmin.php';
            require "index.html";
        }
	}
	public function classesAction()
	{
		$cls=$this->model->classes();
        require "VClasses.php";
	}
	public function ClassAddAction()
	{
		$class_info=array($_POST['NC']." ".$_POST['AC'],$_POST['SA'],$_POST['NE'],$_POST['DC']);
		$this->model->ClassAdd($class_info);

	}
	public function formMatAction()
	{
		$cats=$this->model->allCategories();
		require 'VFormMaterial.php';
	}
	public function ClassFormAction(){
        require "VClassForm.php";
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
			case 'add':$this->addMaterialAction();break;
		}
	}
}

$c=new ctrl();
$c->action();

?>
