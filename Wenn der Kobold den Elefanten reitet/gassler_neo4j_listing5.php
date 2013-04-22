//Der Index 'persons' ist bereits in der DB vorhanden
//Das NodeIndex Objekt dient uns zum Zugriff auf den Index
$personIndex = new Everyman\Neo4j\Index\NodeIndex($client, 'persons');

//Suche über den zuvor gespeicherten Spitznamen
$wolfgang = $personIndex->findOne('name', 'Wolfi');
//Gibt 'Wolfgang' aus
echo $wolfgang->getProperty('name');
