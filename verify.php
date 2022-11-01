<?php
$ref = $_GET['reference'];

//return $ref;

if ($ref = "") {
  header("Location:javascript://history.go(-1)");

}
?>

<?php
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: sk_test_70564fe3335c98cc8d5fe8a454846f935ef9502b",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    //echo $response;
    $result = json_decode($response);
  }
  if ($result->data->status == 'success') {
    $status = $result->data->status;
    $reference = $result->data->reference;
    // $cus_email = $result->data->customer->email;
    // date_default_timezone_set('Africa/Accra');
    // $date_time = date('m/d/Y h:i:s a', time());

  if (!$status) {
    echo 'Something is wrong with your code';
  }

  else{
    header('Location: success.php?status=success');
  }

  }
  else{
    header("Location: error.html");
  }
?>