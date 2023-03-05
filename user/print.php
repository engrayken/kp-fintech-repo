

<?php 

require_once("../app/config.php");

$page="Print"; 


?>



<?php

$view=(int)addslashes($_GET['id']); 

     if($view)

{
  
$view=(int)addslashes($_GET['id']); 





?>
    
 <?php   
    //get rows
   // $query = mysqli_query($dbc, "SELECT * FROM transaction WHERE id='$view' ");

    $queryt =$dbc->prepare("SELECT * FROM transaction WHERE id= ?");
$queryt->bind_param("i", $view);
$queryt->execute();
$query=$queryt->get_result();
    $queryt->close();

    if($query->num_rows > 0){ ?>


     <?php
            while($row = $query->fetch_assoc()){ 
        
  $id = $row['id'];   

        $serviceID =$row ['net'];
$pin =$row ['pin'];
$quantity =$row ['quantity'];
               $billersCode = $row ['billersCode'];
       $variation_code = $row ['variation_code'];
        $user_id =$row['user_id'];
 $user=$row['user'];
        $request_id= $row['trans_id'];
       $recepient =$row['phone'];
       $email = $row['email'];
      $date =$row['date'];
      $amount =$row['amount'];
      $status =$row['status'];
    $rstatus =$row['rstatus'];
     if($status=='1') { $d='Delivered'; } else { $d=$status; } 

}
}


      //get rows
  //  $query1= mysqli_query($dbc, "SELECT * FROM pidentifier WHERE identifier_serviceID='$serviceID' ");

$da = $dbc->prepare("SELECT * FROM pidentifier where identifier_serviceID= ?");
$da->bind_param("s", $serviceID);
$da->execute();
$query1=$da->get_result();
$da->close();
    
    if($query1->num_rows > 0){ ?>
        
        <?php
            while($row1 = $query1->fetch_assoc()){ 

$conv= $row1['identifier_conveniencefee']; 
$slogan= $row1['identifier_slogan']; 
$servicename= $row1['identifier_name']; 
$img= $row1['identifier_img']; 

 $identifier_cat= $row1['identifier_cat']; 


}}	

    //get rows
   // $query1= mysqli_query($dbc, "SELECT * FROM pcat WHERE cat_id='$identifier_cat' ");

$query1t = $dbc->prepare("SELECT * FROM pcat where cat_id= ?");
$query1t->bind_param("i", $identifier_cat);
$query1t->execute();
$query1=$query1t->get_result();
    $query1t->close();

    if($query1->num_rows > 0){ ?>
        
        <?php
            while($row1 = $query1->fetch_assoc()){ 



$cat_name= $row1['cat_name']; 


}}	

?>


<body>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

<body onLoad="javscript:window.close( window.print() )"><div style="padding:4px"><font color="black"><small style='font-size:12px'><?php

if($cat_name=='airtime-pin' || $cat_name=='airtime-money') { 

$jsonIterator =new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($rstatus, TRUE)),
  RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(!is_array($val)) {


       if($key == "serial" || $key =="serialNumber") {
$quan=$amount/$quantity;

           echo "<br/><img style='background:lavender' src='../images/logo.png' width='50' height='20'><br />
<font color='orange'>". str_replace('Airtime Pin','',$servicename)." </font> ₦$quan <br/>";

        }

       if($key == "pin" ||  $key == "serial" ||  $key == "USSD" || $key =="serialNumber")
 {  echo $key."    : ".$val."<br/>";
}


    }

}




?></small></font></div></body>

<?php } 

elseif($cat_name=='education'  || $cat_name=='electricity') {
// $rstatuse= substr($rstatus,952,46); 
 $jsonDecoded=json_decode($rstatus, true);

foreach($jsonDecoded as $key => $value) {
if($key=='purchased_code' || $key=='pin') {
    echo '<img src="../images/logo.png" width="100" height="40"> kenspay.com<br/>'.$servicename.'<br/>'.$key.': '. $value;
}
}

}








}  
?>
</html>