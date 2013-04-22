//Direktes Ansprechen eines Indizes
$queryString = "g.idx('persons')[[name:'Wolfgang']].bothE('friends').inV.filter{it.age > 28}.name";

//Query erzeugen und ausführen
$query = new Everyman\Neo4j\Gremlin\Query($client, $queryString, array());
$result = $query->getResultSet();

//Ergebnistabelle mit Namen in erster Spalte ausgeben
foreach ($result as $row) {
	echo $row[0]."\n";
}