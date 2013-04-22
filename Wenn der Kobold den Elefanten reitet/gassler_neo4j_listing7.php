//Neues Traversal-Programm anlegen
$traversal = new Everyman\Neo4j\Traversal($client);
$traversal->addRelationship('friends', Relationship::DirectionAll)
    ->setPruneEvaluator(Traversal::PruneNone)
    ->setReturnFilter(Traversal::ReturnAll)
    ->setMaxDepth(4);

$paths = $traversal->getResults($sarah, Traversal::ReturnTypeFullPath);
//Ausgabe des Pfades mit Funktion aus Listing 6
printPaths($paths);