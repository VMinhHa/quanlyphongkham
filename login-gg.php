<?php
require('vendor/autoload.php');

$clientID='565136117957-2eli3vrv3q691kcglvgp34i734srupo1.apps.googleusercontent.com';
$ClientSecret='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';
$redirectUrl= 'http://localhost:8080/quanlyphongkham/login.php';

//Create client request to google
$client = new Google_Client();
$client->setClientID($clientID);
$client->setClientSecret($ClientSecret);
$client->setRedirectUri($redirectUrl);
$client->addScope('profile');
$client->addScope('email');


if(isset($_GET['code'])):

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // getting profile information
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    // showing profile info
    echo "<pre>";
    var_dump($google_account_info);

else: 
    // Google Login Url = $client->createAuthUrl(); 
?>

    <a class="login-btn" href="<?php echo $client->createAuthUrl(); ?>">Login</a>

<?php endif; ?>

<?php
    $result = mysqli_query($conn,"SELECT * FROM ")

?>