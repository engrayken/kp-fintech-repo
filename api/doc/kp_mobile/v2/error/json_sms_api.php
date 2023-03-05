<?php
 file_put_contents('call.txt', $_GET);
$username=$_GET['username'];
$password=$_GET['password'];
$secpin=$_GET['secpin'];
$title=''.$_GET['sender'];//replace space with empty
$recipient=$_GET['dest'];
$message=$_GET['msg'];
$url = "https://kenspay.com.ng/api/doc/kp_mobile/v2/error/sms_api.php?username=$username&password=$password&secpin=$secpin&sender=".str_replace(" ","",$title)."&dest=$recipient&msg=".str_replace("_","%20",$message)."&";

$headers = array(
    'Content-Type: application/json',
);
$ch = curl_init();

// Set the url, number of GET vars, GET data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Execute request
$result = curl_exec($ch);

// Close connection
curl_close($ch);

// get the result and parse to JSON
//echo $result;

$resp=array();
array_push($resp, array("returnvalue"=>$result, "title"=>returnTitle($result)));
		echo json_encode(array("kpapi_resp"=>$resp));
		

function returnTitle($input)
{

		$title="No title";
	switch ($input) {
		case '146':
		$title="Message Sent";
			break;
			case '146':
	    $title="Message Sent";
	    break;
		case '140':
		$title="SMS Sending Failed";
			break;
		case '13':
		$title="Invalid Pin";
			break;
		case '141':
		$title="Credit exhausted";
			break;
		case '-2907':
		$title="Gateway unavailable";
			break;
		case '-2908':
		$title="Invalid schedule date format";
			break;
		case '-2909':
		$title="Unable to schedule";
			break;
		case '-2910':
		$title="Username is empty";
			break;
		case '-2911':
		$title="Password is empty";
			break;
		case '-2912':
		$title="Recipient is empty";
			break;
		case '-2913':
		$title="Message is empty";
			break;
		case '-2914':
		$title="Sender is empty";
			break;
		case '-2915':
		$title="One or more required fields are empty";
			break;
			case '146':
			    $title="Message Sent";
			    break;
			    case '141':
			        $title="Insufficient funds";
			        break;
		
		default:
		$title=$input;
			break;
	}
	return $title;
}
?>