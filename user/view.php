<?php
require_once("../app/config.php");
$title=addslashes("My Product");
require_once('include/user_header.php');
require_once('include/user_navbar.php');
require_once('include/user_sidebar.php');
?>
<div class="content-wrapper">

      <!-- Page header -->
      <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
          <h4><i class="icon-coins mr-2"></i> <span class="font-weight-semibold">My Product</span></h4>
          </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
            <div class="breadcrumb">
              <a href="./" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
              <a href="transaction" class="breadcrumb-item">My Transaction</a>
            </div>
          </div>

          <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
              <a href="./fund/0" class="breadcrumb-elements-item">
                <i class="icon-credit-card mr-2 text-success"></i>
                Fund account
              </a>
          
             <a href="ticket" class="breadcrumb-elements-item">
                <i class="icon-comment-discussion mr-2 text-info"></i>
                Support
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- /page header -->

<div class="content">




   <div class="card">

    <div class="card-header header-elements-inline">


      <h6 class="card-title font-weight-semibold">My Transaction</h6>
    </div>


<?php 
if($_POST['purchased_code']!="")
{ 
$purchased=$_POST['purchased_code'];
$product=$_POST['product'];

$message='Dear Customer,
Thank you for using kenspay Services. See details below:
<br/>'.$product.' <br/>'.$purchased.' ';
		//
$subject ='Transaction';

	$email=addslashes(mysqli_real_escape_string($dbc, trim($_POST['email'])));
	//$message=mysqli_real_escape_string($dbc, trim($_POST['message']));
	//$subject=mysqli_real_escape_string($dbc, trim($_POST['subject']));
	require '../lib/phpmailer/PHPMailerAutoload.php';

	require_once "../lib/mail/user.php";
	$mail = new PHPMailer(true);                            
	$mail->SMTPDebug = 0;                                
	$mail->isSMTP();                                      
	$mail->Host = $eset['hoste'];; 
	$mail->SMTPAuth = true;                        
	$mail->Username = $eset['username'];                 
	$mail->Password = $eset['password'];                          
	$mail->SMTPSecure = 'ssl';                            
	$mail->Port = $eset['porte'];
	$mail->setFrom($eset['frome'], $set['site_name']);
	$mail->addAddress($email, $set['site_name']);          
	$mail->addReplyTo($eset['reply_to'], $set['site_name']);
	$mail->isHTML(true);                               
	$mail->Subject = $subject;
	$mail->Body=$email_content;
	$mail->AltBody = $set['site_name'];
	if ($mail->send()) {
	    echo "<script>alert('Email Sent');</script>";
	} else {
	    echo "<script>alert('Email Not Sent, ensure smtp settings is properly configured');</script>";


	}

}


$view=(int)$_GET['view']; 

     if($view)

{
  
$view=(int)$_GET['view'];


?>
    
 <?php   
    //get rows
  //  $query = mysqli_query($dbc, "SELECT * FROM transaction WHERE id='$view' and user_id = '".$row['id']."' ");
    
    $queryt =$dbc->prepare("SELECT * FROM transaction WHERE id= ? and user_id = ?");
 $queryt->bind_param("ii", $view, $row['id']);
 $queryt->execute();
 $query= $queryt->get_result();
 $queryt->close();
    

    if($query->num_rows > 0){ ?>


     <?php
            while($row = $query->fetch_assoc()){ 
        
  $id = $row['id'];   

        $serviceID =$row ['net'];
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
//$amount_charge=$row['amount_charge'];
       $status =$row['status'];
  $rstatus =$row['rstatus'];
     if($status=='1') { $d='Delivered'; } else  { $d='Failed'; } 
    




    //get rows
   // $query1= mysqli_query($dbc, "SELECT * FROM pidentifier WHERE identifier_serviceID='$serviceID' ");

  $query1t =$dbc->prepare("SELECT * FROM pidentifier WHERE identifier_serviceID= ? ");
 $query1t->bind_param("s", $serviceID);
 $query1t->execute();
 $query1= $query1t->get_result();
 $query1t->close();
    
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
    //$query1=mysqli_query($dbc, "SELECT * FROM pcat WHERE cat_id='$identifier_cat' ");

  $query1t =$dbc->prepare("SELECT * FROM pcat WHERE cat_id= ? ");
 $query1t->bind_param("i", $identifier_cat);
 $query1t->execute();
 $query1= $query1t->get_result();
 $query1t->close();

    
    if($query1->num_rows > 0){ ?>
        
        <?php
            while($row1 = $query1->fetch_assoc()){ 



$cat_name= $row1['cat_name']; 


}}	


?>	







<br/>
<b style="color:green">Your Transaction Was <?php  if($status!="1") { echo 'Not'; } ?> Successful :</b><br/>

<b style="color:green"> <?php  if($purchased!='') { echo '<br/><br/>purchased_code has been sent to your mail box'; } ?> </b><br/>
<table><tr><td>
<h3>
<?php //below  code is for Data for//
echo clean($servicename); 
echo'<br/><br/><small>';  echo clean($slogan); echo'</small>';
?> </h3>
</td><td style="padding-left:20px;">
 <img src="../asset/images/dashboard/<?php echo $img; ?>" height="100" width="100" />
</td></tr></table>

<br/>
Transaction Status: <font color='green'><i><?php echo clean($d); ?></i></font>


<hr/>


<?php if($cat_name=='airtime-money'// || $cat_name=='airtime-pin' 
) { ?>
<font color="green"><i>
<?php


//{"code":"000","content":{"transactions":{"status":"delivered","product_name":"9Mobile Airtime Pin","unique_element":"08138442969","unit_price":100,"quantity":1,"service_verification":null,"channel":"api","commission":4,"total_amount":96,"discount":null,"type":"Airtime Recharge","email":"kennethayogu@gmail.com","phone":"08138442969","name":null,"convinience_fee":0,"amount":100,"platform":"api","method":"api","transactionId":"16056724616088897372392293"}},"response_description":"TRANSACTION SUCCESSFUL","requestId":"kp2020111805061","amount":"100.00","transaction_date":{"date":"2020-11-18 05:07:41.000000","timezone_type":3,"timezone":"Africa\/Lagos"},"purchased_code":"Serial No:4850006260638344, PIN: 378569273414634, Expiry Date: 2022-10-09","cards":[{"serialNumber":"4850006260638344","pin":"378569273414634","expiresOn":"2022-10-09"}]}

$no1=json_decode($rstatus);
$no=$no1->{'code'};
//if($no=='') { 
$jsonIterator =new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($rstatus, TRUE)),
  RecursiveIteratorIterator::SELF_FIRST);

echo'<form action="view" method="post">';

foreach ($jsonIterator as $key => $val) {
    if(!is_array($val)) {
       if($key == "serial" || $key =="serialNumber") {
$quan=$amount/$quantity;

           print "  <br/> SERVICE: Kenspay <br/>
Amount: N$quan <br/>
Network: ".str_replace('Airtime Pin','',$servicename)." <br/>";

        }

       if($key == "pin" ||  $key == "serial" ||  $key == "USSD"  || $key =="serialNumber")
 {  echo $key."    : ".$val."<input type='hidden' name='purchased_code' value=' ".$key."    ".$val." '><br/>" ;
}



    }

} 

if($d!="Failed") {

?> 
<input type="hidden" name="product" value="<?php echo clean($serviceID.' N'.$amount); ?>">



<hr/>



  <p>EMAIL</p>
              <div class="form-group row">
               <div class="col-lg-6">
                  <!--input type="email" class="form-control" name="email" value="" placeholder="insert email address" required /-->
           
                  </div>
                </div>

<input type="submit" value="Send as mail" class="btn bg-orange"></form>
<br/>
<a href="print.php?id='.$id.'">  <button class="btn bg-orange">Print<i class="icon-paperplane ml-2" id="hideicon"></i></button>
</a> <hr/>

<?php
}

// }  else { }
  ?>


</i></font><br/>
<?php } elseif($cat_name=='education'  || $cat_name=='electricity') {
// $rstatuse= substr($rstatus,952,46); 
 $jsonDecoded=json_decode($rstatus, true);

echo'<form action="" method="post">';

foreach($jsonDecoded as $key => $value) {
if($key=='purchased_code' || $key=='pin') {
    echo'<font color="green"><i>'. $key.': '. $value.'<input type="hidden" name="purchased_code" value="'.$key.':'.$value.'"></i></font><br/><br/>';
}


}

if($d!="Failed") {
echo'
<input type="hidden" name="product" value="'.$serviceID.' N'.$amount.'">

  <p>EMAIL</p>
              <div class="form-group row">
               <div class="col-lg-6">
                  <!--input type="text" class="form-control" name="email" value="" placeholder="insert email address" required /-->
           
                  </div>
                </div>

<input type="submit" value="Send as mail" class="btn bg-orange"></form>
<br/>
<a href="print.php?id='.$id.'">  <button class="btn bg-orange">Print<i class="icon-paperplane ml-2" id="hideicon"></i></button>
</a> <hr/>';

}

}

 ?>

Order Id: <?php echo clean($request_id); ?>


<hr/>

Date: <?php echo clean($date); ?>


<hr/>



<?php
if($billersCode)
{
?>
<?php if($serviceID=='gotv')
{ echo'IUC Number'; } elseif($serviceID=='dstv')
{ echo'SMART Card'; } elseif($serviceID=='startimes')
{ echo'SMART Card'; } else { echo 'Meter Number '; } ?>: <?php echo clean($billersCode); echo'<hr/>'; ?><?php } ?> 



<?php if($recepient) { echo'Phone Number: '. $recepient.'<hr/>'; } ?>



<?php if($email) { echo'Email: '.$email.'<hr/>';  } ?>



Amount: NGN
<?php echo clean($amount); ?>

<hr/>

<?php
}
}} else { echo' Error occur please contact admin <br/>'; }
?>





</div>
<a href="transaction.php">  <font color="black"><span class="glyphicon glyphicon-circle-arrow-left"></span>  Back </font></a>
<br/><br/>






  </div>

<?php require_once('include/user_footer.php');?>