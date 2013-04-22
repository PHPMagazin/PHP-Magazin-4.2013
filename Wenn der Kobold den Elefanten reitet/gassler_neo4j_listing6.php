//Pfad zwischen zwei Personen mit maximaler Länge 3 finden
$paths = $sarah->findPathsTo($eva)->setMaxDepth(3)->getPaths();
//Funktion zur Ausgabe von Pfaden
function printPaths($paths) {
	foreach($paths as $path) {
		echo "\nPfadstart";
		foreach ($path as $node) {
			echo "->".$node->getProperty('name');
		}
		echo "\n";
	}
}
//Den Pfad ausgeben: 'Pfadstart->Sarah->Wolfgang->Eva'
printPaths($paths)