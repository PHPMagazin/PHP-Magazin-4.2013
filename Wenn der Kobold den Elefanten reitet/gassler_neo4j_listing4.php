//Neuen Index definieren
$personIndex = new Everyman\Neo4j\Index\NodeIndex($client, 'persons');
//Index in der Datenbank erstellen
$personIndex->save();

//Alle Personen mit ihrem Namen dem Index hinzufügen
foreach(array($wolfgang,$sarah,$eva) as $person) {
	$personIndex->add($person, 'name', $person->getProperty('name'));
}

//Spitznamen und Wohnort im Index speichern
$personIndex->add($wolfgang, 'name', 'Wolfi');
$personIndex->add($wolfgang, 'wohnort', 'Innsbruck');