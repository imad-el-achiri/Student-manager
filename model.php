<?php

class model
{
	private $db;

	public function __construct()
	{
		define('USER','root');
		define('PASS','0000');
		$this->db= new PDO('mysql:host=localhost;dbname=Projet_web',USER,PASS);
	}
	public function verif($LOGIN){
        $query=$this->db->prepare('select count(*) from users_Al_Khawarizmi where E_mail=? and mdp=?');
        $query->execute($LOGIN);
        return $query->fetch();
	}
	public function ClassAdd($class_info)
	{
		$query=$this->db->prepare('insert into classe(nom_classe,semestre_actuel,nb_etud,delegue) values(?,?,?,?)');
		$query->execute($class_info);
	}
	public function infos($email){
        $query=$this->db->prepare("select * from users_Al_Khawarizmi where E_mail='$email'");
        $query->execute();
        return $query->fetch();
	}
	public function droits($email){
        $query=$this->db->prepare("select * from droits where id_user='$email'");
        $query->execute();
        return $query->fetch();
	}
	public function classe($email){
        $query=$this->db->prepare("select classe from users_Al_Khawarizmi  where E_mail=$email");
        $query->execute();
        return $query->fetch();
	}
	public function classes(){
        $query=$this->db->prepare("select nom_classe,delegue,semestre_actuel,nb_etud from classe");
        $query->execute();
        return $query->fetchall();
	}
	public function allMaterials()
	{
		$query=$this->db->prepare('SELECT `nummat`,`intitule`,materials.`description`,`type`,`datefab`,`prix`,categories.designation FROM materials,categories WHERE materials.`numcat`=categories.`numcat`');
		$query->execute();
		return $query->fetchAll();
	}
	public function allCategories()
	{
		$query=$this->db->prepare('SELECT * FROM categories');
		$query->execute();
		return $query->fetchAll();
	}

	public function addMaterial($material)
	{
		$query=$this->db->prepare('insert into materials values(?,?,?,?,?,?,?)');
		$query->execute($material);
	}
}

?>
