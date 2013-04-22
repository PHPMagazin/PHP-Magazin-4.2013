//Startknoten über Index holen
$personIndex = new Everyman\Neo4j\Index\NodeIndex($client, 'persons');
$wolfgang = $personIndex->findOne('name', 'Wolfgang');

//Gremlin-Query definieren, nodeId ist dabei eine Variable
$queryString = "g.v(nodeId).outE('friends').inV";

//Initieren der Query und setzen der Variablen
$query = new Everyman\Neo4j\Gremlin\Query($client, $queryString, array(
    'nodeId' => $wolfgang->getId()
));

//Gremlin-Query ausführen
$result = $query->getResultSet();

//Ergebnistabelle ausgeben
foreach ($result as $row) {
	echo $row[0]->getProperty('name')."\n";
}