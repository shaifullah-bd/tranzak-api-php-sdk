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
// exit;
// $expiryTime = $tranzak->getExpiryTime();
// echo "Authenticated with expiry Time: $expiryTime\n";

// $tranzak->setAuthToken('4U0DH15XY2MXRM5HH4R4514HDMDKDYHPPR8W42UHYEM4XWXM');
// $accountData = $tranzak->accountDetails('PAXAF15OTHOYMRKT3FHU');
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

// $tranzak->setAuthToken('1C2PRT5EXHXTD4MEXW512YE1T2RCWWY1XU2PX151CHU11K50');
// $accountData = $tranzak->accountAuthorizationCode();
// echo "<pre>";
// print_r($accountData);

// $tranzak->setAuthToken('4U0DH15XY2MXRM5HH4R4514HDMDKDYHPPR8W42UHYEM4XWXM');
// $accountData = $tranzak->createWebRedirectPayment([
//     'mchTransactionRef' => 'order03',
//     'amount' => 1500,
//     'currencyCode' => 'XAF',
//     'description' => 'Test payment',
//     'returnUrl' => 'http://localhost/tranzak/returnUrl',
//     'cancelUrl' => 'http://localhost/tranzak/cancelUrl',
//     'logoUrl' => 'logoUrl',
//     'title' => 'Japap',
// ]);
// echo "<pre>";
// print_r($accountData);

// $tranzak->setAuthToken('4U0DH15XY2MXRM5HH4R4514HDMDKDYHPPR8W42UHYEM4XWXM');
// $accountData = $tranzak->requestDetails(requestId: 'REQ250109HRFERBJAXP0');
// echo "<pre>";
// print_r($accountData);

// $tranzak->setAuthToken('4U0DH15XY2MXRM5HH4R4514HDMDKDYHPPR8W42UHYEM4XWXM');
// $accountData = $tranzak->createMobilePayment([
//     'mchTransactionRef' => 'order06',
//     'mobileWalletNumber' => '237680657567',
//     'amount' => 800,
//     'currencyCode' => 'XAF',
//     'description' => 'Test payment',
//     'returnUrl' => 'http://localhost/tranzak/returnUrl',
//     'cancelUrl' => 'http://localhost/tranzak/cancelUrl',
//     'logoUrl' => 'logoUrl',
//     'title' => 'Japap',
// ]);
// echo "<pre>";
// print_r($accountData);

// $tranzak->setAuthToken('WCDTXPD8M1TYE45Y4T5EMYPCXEUUHEDE2DXYKMTMRD5X5RPR');
// $transferData = $tranzak->transferTranzakUser([
//     'customTransactionRef' => 'transfer02',
//     'amount' => 800,
//     'currencyCode' => 'XAF',
//     'description' => 'Test payment',
//     'payeeAccountId' => '100920',
// ]);
// echo "<pre>";
// print_r($transferData);

