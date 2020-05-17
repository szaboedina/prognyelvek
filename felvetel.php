<!DOCTYPE html>

<html>

<head>

	<title>Nyelvek felvétele</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.kozep {
				text-align: center;
				color:grey;
			}
		td{
		  border-collapse: collapse;
		  /*border: 1px solid black;*/
		  text-align: center;
		}

		table {
		  border: 1px solid black;
		  text-align: center;
		}

		form {
			text-align: center;
			padding-top: 20px;
			padding-bottom: 20px;
		}
		div {
			padding-top: 20px;
		}
		body{
			background-color: #F8F9F9;
		}
		h1 {
			text-shadow: 2px 2px 8px #000000;
		}
		input{
			align: left;
			width: 100%;
		}
		p{
			text-align: left;
		}
	</style>
	<nav class="navbar navbar-expand-sm bg-light justify-content-center">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="kilistazas.php">Nyelvek listája</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="felvetel.php">Nyelvek felvétele</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="kezeles.php">Nyelvek kezelése</a>
    </li>    
    <li class="nav-item">
      <a class="nav-link" href="onertekeles.php">Önértékelés</a>
    </li>
  </ul>
</nav>

</head>
<body>

<h1 align="center">Prog nyelvek</h1>

</body>

</html>

<?php
error_reporting(E_ALL ^ E_NOTICE);


if (isset($_POST["action"]) and $_POST["action"] == "adatfelvetel"){
	$insert = new Adatbazis();
	$insert -> insert();
}

$select = new Adatbazis();
$select->insert();

?>
	<form method="POST">
		<p>Név:</p><br />
		<input type="text" name="input_nyelv"><br />
		<p>Leírás:</p> <br />
		<input type="text" name="input_leiras"><br />
		<p>Pont:</p><br />
		<input type="number" name="input_pont"><br />
		<p>Megjelenítés:</p><br />
		<input type="number" name="input_megjelenites"><br />

		<input type="hidden" name="action" value="insert"><br />
		<input type="submit" class='btn btn-primary' value="Felvétel">
	</form>
<?php

class Adatbazis{

	public $servername ="localhost";
	public $username="root";
	public $password="";
	public $dbname="prog_nyelvek";
	public $sql=NULL;
	public $result=NULL;
	public $row=NULL;
	public $conn=NULL;


	public function __construct(){
		self::connect();
	}

	public function __destruct(){
		self::disconnect();
	}	

	public function connect(){
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		$this->conn->set_charset("utf8");
	}

	public function disconnect(){
		$this->conn->close();
	}


	public function insert(){
			$this->sql="INSERT INTO nyelvek (nyelv, leiras, pont, megjelenites) 
					VALUES ('".$_POST["input_nyelv"]."', 
							'".$_POST["input_leiras"]."', 
							 ".$_POST["input_pont"].",
							 ".$_POST["input_megjelenites"]."

							)";
		$this->result = $this->conn->query($this->sql);		

		
		
		
	}

}

?>
