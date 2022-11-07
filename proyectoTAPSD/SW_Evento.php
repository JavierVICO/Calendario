<?php 
require("Evento.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Calendario</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="" src="Index.js"></script>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
<script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>
	<link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
 
  

</head>
<body>
<?php 

//Formato JSON:
$success='true';
$data='';
$msg='';


$events=array();
$data=Evento::__find();

foreach($data as $row){
$events[]=[
  "id"=> $row['id'],
  "title"=> $row['evento'],
  "start"=> $row['fecha_inicio'],
  "end"=> $row['fecha_fin'],
  "color"=> $row['color_evento']
];
}

$salida=array(
    "data"=>$events,
    "success"=>$success,
    "msg"=>"ok" 
);

if ($salida=json_encode($salida,true)){

     echo $salida;
    
}else{
    echo "msg:error"; 
    $success='false';
}
 ?>


<div class="mt-5"></div>

<div class="container">
  <div class="row">
    <div class="col msjs">
      <?php
        include('msjs.php');
      ?>
    </div>
  </div>

<div class="row">
  <div class="col-md-12 mb-3">
  <h3 class="text-center" id="title">Calendario TAPSD</h3>
  </div>
</div>
</div>



<div id="calendar"></div>

<?php  
  include('modalNuevoEvento.php');
  include('modalUpdateEvento.php');
?>

</body>
</html>

	
