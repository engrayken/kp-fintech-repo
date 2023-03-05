     <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>


<script>

   $(document).ready(function(){

   $('#loading').hide();

                $('#identifier').on('change', function(e){
                    //Stop the form from submitting itself to the server.
                      e.preventDefault();
        
                        var identifier=$('#identifier').val();
        $.ajax({
            url:'price.php',
            data:{identifier:identifier},
            
            type:'POST',

   beforeSend:function(){
            $('#loading').show();
  $('#hidesubmit').hide();
            },


            success:function(data)
            {
              var serv=data;

         
                
        
                if(serv!=''){//Thats if signed up
         
      $('#loading').hide();
                 $('#serv').html(serv);

    

                }
                
               
                
            },




                    });


                }); //end of on change

  $('#hidesubmit').hide();

      $('#serv').on('change', function(e){


                    //Stop the form from submitting itself to the server.
        
          e.preventDefault();

                        var serv=$('#serv').val();

        $.ajax({
            url:'page.php',
            data:{page:serv},
            
            type:'POST',

   beforeSend:function(){
            $('#loading').show();

},

            success:function(data)
            {
              var servp=data;

         
                
        
                if(servp!=''){//Thats if signed up
                        $('#servp').val(servp);
  $('#loading').hide();
  $('#hidesubmit').show();

                }
                
               
                
            },




                    });
                }); //end of on change




$('#pay').hide();
$('#gen').hide();
$('#nogen').show();
$('#gen-button').show();

//when click on submite button paylog
   $('#gen-button').on('click', function(e){

$('#gen').show();
$('#nogen').hide();


});

//when click on submite button paylog
   $('#paylog').on('click', function(e){



                    //Stop the form from submitting itself to the server.
        
          e.preventDefault();

    var paylog=$('#paylog').val();
  var phone=$('#phone').val();
  var pin=$('#pin').val();
  var billersCode=$('#billersCode').val();
  var amount=$('#amount').val();

  var Insured=$('#Insured_Name').val();
  var Engine=$('#Engine_Number').val();
  var Chasis=$('#Chasis_Number').val();
  var Make=$('#Vehicle_Make').val();
  var Color=$('#Vehicle_Color').val();
  var Model=$('#Vehicle_Model').val();
  var Year=$('#Year_of_Make').val();
  var Address=$('#Contact_Address').val();

if(phone=='' || pin=='' || Insured=='' || Engine=='' || Chasis=='' || Make=='' || Color=='' || Model=='' || Year=='' || Address==''  || billersCode=='' || amount=='' || amount<50)
{

alert('Please make a valid selection in all fields Kindly also note that minimum amount for airtime is ₦50, electricity ₦500 others is been specify in amount Field','Hello !!'); 
} else { $('#pay').show();
$('#paylog').hide(); 

$('#gen-button').hide();


 }

    }); //end of on click


$('#vloading').hide();

   $('#check_verify').on('click', function(e){



                    //Stop the form from submitting itself to the server.
        
          e.preventDefault();

                        var check_verify=$('#check_verify').val();

  var billersCode=$('#billersCode').val();
  var service=$('#service').val();
  var variation_code=$('#variation_code').val();


        $.ajax({
            url:'v.php',
            data:{'billersCode':billersCode,'service':service,'type':variation_code},
            
            type:'POST',
  beforeSend:function(){
            $('#vloading').show();
            },

            success:function(data)
            {
              var verify_name=data;

      
                if(verify_name!=''){//Thats if signed up

 $('#vloading').hide();

                        $('#verify_name').html(verify_name);

                }
                
               
                
            },




                    });
                }); //end of on change


on='<?php if(empty($username)) {} else{ echo $row[9];  }?>';
if(on!='on') {     $('#showcheck').hide(); 
$('#hidecontent').hide(); 
} else {

 $('#hidecheck').hide(); }

  

/*below on the check box*/
   $('#checkbox').on('click', function(e){
//Stop the form from submitting itself to the server.
        e.preventDefault();
 var checkbox=$('#checkbox').val();
$.ajax({
            url:'api_setting.php',
            data:{'checkbox':checkbox},
            
            type:'POST',
 success:function(data)
            {
              var offcheckbox=data;
 if(offcheckbox!=''){//Thats if signed up
                     
 $('#showcheck').show();
 $('#hidecontent').show();
 $('#hidecheck').hide();

    }                
  },
  });
 }); //end of on change


/*below off the check box*/

   $('#oncheckbox').on('click', function(e){
//Stop the form from submitting itself to the server.
        e.preventDefault();
var oncheckbox=$('#oncheckbox').val();
$.ajax({
            url:'api_setting.php',
            data:{'checkbox':oncheckbox},
            
            type:'POST',
success:function(data)
            {
              var offcheckbox=data;
 if(offcheckbox!=''){//Thats if signed up
                     
 $('#showcheck').hide();
 $('#hidecheck').show();
 $('#hidecontent').hide();
                }   
            },
                    });
                }); //end of on change



/*below reload the sk api*/

   $('#sk').on('click', function(e){
//Stop the form from submitting itself to the server.
        e.preventDefault();
var sk=$('#sk').val();
$.ajax({
            url:'api_setting.php',
            data:{'skreload':"skreload"},
            
            type:'POST',
success:function(data)
            {
              var fetch_skresponse=data;
 if(fetch_skresponse!=''){//Thats if signed up
                     
    $('#fetch_skresponse').val(fetch_skresponse);

                }   
            },
                    });
                }); //end of on click


/*below reload the pk api*/

   $('#pk').on('click', function(e){
//Stop the form from submitting itself to the server.
        e.preventDefault();
var pk=$('#pk').val();
$.ajax({
            url:'api_setting.php',
            data:{'pkreload':"pkreload"},
            
            type:'POST',
success:function(data)
            {
              var fetch_pkresponse=data;
 if(fetch_pkresponse!=''){//Thats if signed up
                     
    $('#fetch_pkresponse').val(fetch_pkresponse);

                }   
            },
                    });
                }); //end of on click


/*below is the deposit amount of pin converter to money*/

   $('#select_amount').on('change', function(e){
//Stop the form from submitting itself to the server.
        e.preventDefault();
var select_amount=$('#select_amount').val();
$.ajax({
            url:'deposit_amount.php',
            data:{'select_amount':select_amount},
            
            type:'POST',
success:function(data)
            {
              var deposit_response=data;
 if(deposit_response!=''){//Thats if signed up
                     
    $('#deposit_response').val(deposit_response);
    $('#deposit_response2').html(deposit_response);
                }   
            },
                    });
                }); //end of on change



//when click on add new button to add account number

$('#new').hide();

   $('#addbank').on('click', function(e){



                    //Stop the form from submitting itself to the server.
        
          e.preventDefault();

$('#new').show();

$('#bankdetail').hide();




    }); //end of on click




/*below reload the acc_num api*/

   $('#acc_num').on('click', function(e){
//Stop the form from submitting itself to the server.
        e.preventDefault();
var acc_num=$('#acc_num').val();
$.ajax({
            url:'banklist.php',
            data:{'acc_num':"bank-transfer"},
            
            type:'POST',

 beforeSend:function(){
            $('#vloading').show();
            },

success:function(data)
            {
              var fetch_bank_list_response=data;

         if(fetch_bank_list_response!=' '){//Thats if signed up
                 $('#bank_list').html(fetch_bank_list_response);

 $('#vloading').hide();

                }

            },
                    });
                }); //end of on click




   $('#bank_list').on('change', function(e){
//Stop the form from submitting itself to the server.
        e.preventDefault();
var acc_num=$('#acc_num').val();
var bank_list=$('#bank_list').val();

$.ajax({
            url:'verify_bank.php',
            data:{'acc_num':acc_num, 'bank_list':bank_list},
            
            type:'POST',

 beforeSend:function(){
            $('#vloading').show();
            },

success:function(data)
            {
              var fetch_acc_name_response=data;

         if(fetch_acc_name_response!=' '){//Thats if signed up
                 $('#account_name').val(fetch_acc_name_response);

 $('#account1_name').html(fetch_acc_name_response);

 $('#vloading').hide();

                }

            },
                    });
                }); //end of on click





   $('#amount').on('keyup', function(e){
//Stop the form from submitting itself to the server.
        e.preventDefault();
var disc_amount=$('#amount').val();
var disc_serviceid=$('#service').val();

$.ajax({
            url:'comm_disc.php',
            data:{'disc_amount':disc_amount,'disc_serviceid':disc_serviceid},
            
            type:'POST',

 beforeSend:function(){
            $('#vloading').show();
            },

success:function(data)
            {
              var disc_list_response=data;

         if(disc_list_response!=' '){//Thats if signed up
                 $('#disc_list').html(disc_list_response);

 $('#vloading').hide();

                }

            },
                    });
                }); //end of on click




}); //end document ready
      
</script>


