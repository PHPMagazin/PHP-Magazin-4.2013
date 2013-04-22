$traversal = new Traversal($client);
$traversal->addRelationship('friends', Relationship::DirectionAll)
    ->setPruneEvaluator('javascript', "(function() { 
		var rel = position.lastRelationship();
		if (rel != null) {
			var since = rel.getProperty('since');
			if (since && (parseInt(since.substr(0,4))+10) == new Date().getFullYear()) {
				return true;
			} else {
				return false;
			}
		} else {
			//continue
			return false;
		}
	})()")
    ->setReturnFilter('javascript',"position.length() != 20")
	->setUniqueness(Traversal::UniquenessRelationshipPath)
    ->setMaxDepth(10);