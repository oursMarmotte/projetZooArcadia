
<?php

require 'vendor/autoload.php';
use MongoDB\Driver\ServerApi;

$uri = 'mongodb+srv://jeangeraldcentaure:aokGtNbjGsZArc2H@centserv.xmycx.mongodb.net/?retryWrites=true&w=majority&appName=centserv';



// Create a new client and connect to the server
$client = new MongoDB\Client($uri);


