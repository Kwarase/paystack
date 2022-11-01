<?php
if ($_GET['status'] !== "success") {
    header('Location:javascript://history.go(-1)');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
Verification Successful
</head>

<body>
You have successfully made your payment
</body>

</html>

