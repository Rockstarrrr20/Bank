<?php
$OTP_CODE=$_REQUEST['code'];
$url="https://verify.twilio.com/v2/Services/VA61cab20b3dc20e66424a61adad9e10df/VerificationCheck /
--data-urlencode \"To=+919352890191\" \;
--data-urlencode \"Code=$OTP_CODE\" \;
-u \"AC1f3a2580baefd6ec19a82732656ab10a:fd7d1987d186906c9c72348997945e94\"";


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'https://verify.twilio.com/v2/Services/VA61cab20b3dc20e66424a61adad9e10df/VerificationCheck /',
  'fd7d1987d186906c9c72348997945e94',
  'Content-Type: application/json'
]);?>