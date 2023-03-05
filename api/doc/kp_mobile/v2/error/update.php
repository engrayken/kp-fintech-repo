<?php 


    //get rows
    $query = $db->query("SELECT * FROM user where username='$username' ");
    
    
            while($row = $query->fetch_assoc()){ 

 $id=$row['id'];
 $balance=$row['balance'];
 $username=$row['username'];
 $earning=$row['earning'];
 $agent=$row['type'];
 $sub_balance=$row['sub_balance'];
 $ragent=$row['ragent'];

 

}




if($agent=='agent') { 
// this code check if platform has charge the agent for registration fee and if not its proceed the charge process.

$sub='1000';

if($sub_balance<1000) {

if($balance>999) {



  $b=$balance-$sub;
  $sb=$sub_balance+$sub;
  
  $updated_balance=mysqli_query($connect,"UPDATE user SET 
	balance='$b' WHERE id='$id' ")or die();

  $updated_sub_balance=mysqli_query($connect,"UPDATE user SET 
	sub_balance='$sb' WHERE id='$id' ")or die();


}

} else { }

// this code check if user has paid this referral, if not he has to pay

//check if referral still exit on the agent account

if($ragent) {

//check if agent account is equato N1000 for registration fee

if($sub_balance=='1000') {

$ref_pay='500';

$ref_empty='';


    //get rows
    $bonus= $db->query("SELECT * FROM user where id='$ragent' ");
    
    
            while($row1 = $bonus->fetch_assoc()){ 

 $bonus_balance=$row1['bonus_balance'];
 $balance1=$row1['balance'];

}

//remove the referral bonus account
$bn=$bonus_balance-$ref_pay;

  $updated_bonus_balance=mysqli_query($connect,"UPDATE user SET 
	bonus_balance='$bn' WHERE id='$ragent' ")or die();


// and add it to referral main balance

$b1=$balance1+$ref_pay;

  $update_balance=mysqli_query($connect,"UPDATE user SET 
	balance='$b1' WHERE id='$ragent' ")or die();

if( $update_balance) {

//now delete user registral referral

  $updated_ragent=mysqli_query($connect,"UPDATE user SET 
	ragent='$ref_empty' WHERE id='$id' ")or die();
}





}

}

}
?>