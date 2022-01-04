<?php require"stripe/init.php"; 
$Publishable_key="pk_test_51JRWbsI5zeaxhQRDid1ZtJ7upOxNGY5QOJ8ABGLB5y59wHYOi9V6RfTccxCOJmIMa8ayrIsZiVgmPLBuCO7Ex1nV00XvUzKmXy";
$Secret_key="sk_test_51JRWbsI5zeaxhQRD3UvfC5PHIlhPoymP39A4Qr37fDRdL0I4CgiWer2b04xv5A3eUQw7zsHtldky2jGQixTBf5uw00XboLqsgF";
\Stripe\Stripe::setApiKey($Secret_key);
?>