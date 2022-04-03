<?php
require __DIR__ . "/vendor/autoload.php";
use Zendesk\API\HttpClient as ZendeskAPI;
use GuzzleHttp\Client;/*
$client = new GuzzleHttp\Client();
//$client->setAuth('basic', ['username' => 'davidbarba608@gmail.com', 'password' => 'david13579barba2468']);
$response  = $client->request('GET', 'https://testcompanie1265.zendesk.com/api/v2/tickets', [
    'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
        'auth' => ['username' => 'davidbarba608@gmail.com', 'password' => 'david13579barba2468']

   // 'body'    => '{"email":"davidbarba608@gmail.com", "pwd":"david13579barba2468"}',
   // 'auth' => ['username' => 'davidbarba608@gmail.com', 'password' => 'david13579barba2468']

]);*/
/*
echo $response ->getStatusCode();
// "200"
echo $response ->getHeader('content-type')[0];
// 'application/json; charset=utf8'
echo $response ->getBody();
print_r($response->json());
// {"type":"User"...'
*/

$subdomain = "testcompanie1265";
$username  = "davidbarba608@gmail.com"; 
$token     = "CYawgbU2XiVzjVWPM64qlTBULg12Ws8rx6fBLJcJ"; 

$client = new ZendeskAPI($subdomain);
$client->setAuth('basic', ['username' => $username, 'token' => $token]);
$tickets = $client->tickets()->findAll();

print_r($tickets);

$headers=array("Ticket ID","Description","Status","Priority","Agent ID","Agent Name","Agent Email","Contact ID","Contact Name","Contact Email","Group ID","Group Name","Company ID","Company Name","Comments");
$fh=fopen("file.csv",'w');
fputcsv($fh,$headers);
$data=array(
    get_object_vars($tickets)
);
foreach ($data as $line)
{
    fputcsv($fh,$line);
}
fclose($fh);
