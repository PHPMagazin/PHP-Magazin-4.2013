<?php

require("phar://neo4jphp.phar");

use Everyman\Neo4j\Client,
    Everyman\Neo4j\Transport,
    Everyman\Neo4j\Node;

//Verbindungdaten setzen
$client = new Client(new Transport('localhost', 7474));

//Neuen Knoten erstellen
$wolfgang = new Node($client);
//Eigenschaften des Knoten setzen und speichern
$wolfgang->setProperty('name','Wolfgang')
		 ->setProperty('age',30)->save();
echo "Wolfgang saved: ID ".$wolfgang->getId()."\n";

//Weitere Personen anlegen
$sarah = new Node($client);
$sarah->setProperty('name','Sarah')
      ->setProperty('age',28)->save();
$eva = new Node($client);
$eva->setProperty('name','Eva')
      ->setProperty('age',29)->save();