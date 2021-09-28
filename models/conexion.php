<?php

class Conexion{

		private $host = "localhost";
		private $db = "cursophp";
		private $user = "root";
		private $password = "";
		private $conect;
		
	       static public function conectar(){
		
	       	$link = new PDO("mysql:host=localhost;dbname=cursophp","root","");
	       	$link ->exec("set names utf8");
	       	
	       	$conect = "Conexion exitosa ";
	       	return  $link;

	    }


	}

//	$conect = new Conexion();
//var_dump($conect)."<br>";
//	$conect->conectar();
//var_dump($conect);	   

/*
			//$conectionstring = "mysql:hos=localhost;dbname=cursophp";
	    	$conectionstring = "mysql:hos=".$this->host.";dbname=".$this->db.";charset=utf8";
	    	try {
	    		$this->conect = new PDO($conectionstring,$this->user,$this->password);
	    		$this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    		echo "Conexion exitosa...";
	    	} catch (Exception $e) {
	    		$this->conect = 'Error de conexion...';
	    		echo "ERROR: ". $e->getMessage();

	    	}*/
