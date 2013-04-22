//Anlegen der Städteknoten
$innsbruck = new Node($client);
$innsbruck->setProperty('name','Innsbruck')->save();
$berlin = new Node($client);
$berlin->setProperty('name','Berlin')->save();

//Beziehungen vom Typ livesIn anlegen und speichern
$wolfgang->relateTo($innsbruck, 'livesIn')->save();
$sarah->relateTo($innsbruck, 'livesIn')->save();
$eva->relateTo($berlin, 'livesIn')->save();

//Beziehungen mit zusätzlichen Properties speichern
$wolfgang->relateTo($sarah, 'friends')
		 ->setProperty('since','2005-01-01')
         ->save();

$wolfgang->relateTo($eva, 'friends')
		 ->setProperty('since','2001-01-01')
         ->save();