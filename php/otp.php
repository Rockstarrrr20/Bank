<?php
if (isset($_REQUEST['num'])) {
$otp = rand(1111,9999);
$no = $_REQUEST['num'];
if(preg_match("/^\d+\.?\d*$/",$no) && strlen($no)==10){
$fields = array(
"variables_values" => "$otp",
"route" => "otp",
"numbers" => "$no",
);

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_SSL_VERIFYHOST => 0,
CURLOPT_SSL_VERIFYPEER => 0,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => json_encode($fields),
CURLOPT_HTTPHEADER => array(
"authorization: vQka74DI9itY5H6VqSubMAjcUKWfdNr2pZ0PgCeJwys1XOGlFTRQkhe1l3DwBjamAJpgyq4iuUO0Y9NS",
"accept: */*",
"cache-control: no-cache",
"content-type: application/json"
),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
$data = json_decode($response);
$sts = $data->return;
if ($sts == false) {
}else{
header("location: http://localhost/FITS/php/check.php?ot=$otp");
}
}
}else{
$err = "Invalied Mobile Number";
}

}

?>