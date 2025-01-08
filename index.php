<?php

require_once "./vendor/autoload.php";

use Bdtask\Tranzak\Tranzak;

// $baseUrl = 'https://dsapi.tranzak.me';
$sandBaseUrl = 'https://sandbox.dsapi.tranzak.me';
$appId = 'aphkkd703oo545';
$appKey = 'SAND_B2FA68B3D812432AA889AA0730B9C21B';

$tranzak = new Tranzak($appId, $appKey, $sandBaseUrl);

// Authenticate and get the token
// $authToken = $tranzak->authenticate();
// echo "Authenticated with token: $authToken\n";
// $expiryTime = $tranzak->getExpiryTime();
// echo "Authenticated with expiry Time: $expiryTime\n";

// $tranzak->setAuthToken('YW0TWE5YK10KE4XTEYKU1E5KYRYK1H5URPUKM42R1HU8EMD1');
// $accountData = $tranzak->accountDetails(100920);
// echo "<pre>";
// print_r($accountData);

// $tranzak->setAuthToken('YW0TWE5YK10KE4XTEYKU1E5KYRYK1H5URPUKM42R1HU8EMD1');
// $accountData = $tranzak->merchantSubAccountList();
// echo "<pre>";
// print_r($accountData);

// $tranzak->setAuthToken('YW0TWE5YK10KE4XTEYKU1E5KYRYK1H5URPUKM42R1HU8EMD1');
// $accountData = $tranzak->disbursementAccountDetails();
// echo "<pre>";
// print_r($accountData);

// $tranzak->setAuthToken('YW0TWE5YK10KE4XTEYKU1E5KYRYK1H5URPUKM42R1HU8EMD1');
// $accountData = $tranzak->collectionAccountDetails();
// echo "<pre>";
// print_r($accountData);

// $tranzak->setAuthToken('YW0TWE5YK10KE4XTEYKU1E5KYRYK1H5URPUKM42R1HU8EMD1');
// $accountData = $tranzak->accountAuthorizationCode();
// echo "<pre>";
// print_r($accountData);