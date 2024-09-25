<?php
require 'vendor/autoload.php';

$uri = 'mongodb+srv://jeangeraldcentaure:aokGtNbjGsZArc2H@centserv.xmycx.mongodb.net/?retryWrites=true&w=majority&appName=centserv';

$client =new MongoDB\Client($uri);

$zooarcadiadb = $client->zooarcadia;

$animalDataCollection = $zooarcadiadb->animalData;
$name = "ours";
$click= 0;

$result = $animalDataCollection->insertOne(['_id'=>10,$name=>'poppy','click'=>$click]
);

var_dump($result);
/*$empcollection = $companydb->empcollection;

$updateResult =$empcollection->updateMany(
['skill'=> 'mongodb'],
['$inc'=>['age'=> 30]],

); */



/*printf("Matched %documents \n",$updateResult->getMatchedCount() );
printf("Modified %documents \n",$updateResult->getModifiedCount() );
*/

/*
$documentlist = $empcollection->find(
['skill'=> 'mongodb'],
['projection'=>['_id'=>0,'name'=>1]]


);


foreach($documentlist as $doc){
    var_dump($doc);
}*/

/*$document = $empcollection->findOne(['_id'=> 1]);


var_dump($document);*/
/*
$insertManyResult =$empcollection->insertMany([  
    ['_id'=>10,'name'=>'Andrew','age'=>'28','skill'=>'mongodb'],
    ['_id'=>9,'name'=>'JIM','age'=>'30','skill'=>'java'],
    ['_id'=>11,'name'=>'CARLOS','age'=>'31','skill'=>'HTML'],


]);
var_dump($insertManyResult);*/

/*
$insertOneResult = $empcollection->insertOne(
    ['_id'=>2,'name'=>'Andrew','age'=>'28','skill'=>'mongodb']
)
printf("Inserted % documents",$insertOneResult->getInsertedCount());
var_dump($insertManyResult->getInsertedId());*/


/*
$result2 = $companydb->createCollection("newcollection");
var_dump($result2);*/

/*
foreach($companydb->listCollections() as $collection){

    var_dump($collection);
} */

/*$result1 = $companydb->createCollection('mycollection');

var_dump($result1); */

?>