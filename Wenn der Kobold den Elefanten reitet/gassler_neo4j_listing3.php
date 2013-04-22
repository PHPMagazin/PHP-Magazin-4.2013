//Neue Person mit Namen Stefan anlegen
$stefan = $client->makeNode()
	->setProperty('name','Stfan')
	->setProperty('livesin','Berlin');
	->save();
$stefanID = $stefan->getId();

//Holt den Knoten mit der angegebenen ID aus der Datenbank
$person = $client->getNode($stefanID);

//Ändert und Löscht eine Property
$person->removeProperts('livesin')
       ->setProperty('name','Stefan')
       ->save();

//Löscht den gesamten Knoten Stefan in der Datenbank
$person->delete();