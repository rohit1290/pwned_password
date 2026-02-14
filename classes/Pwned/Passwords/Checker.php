<?php

namespace Pwned\Passwords;

use Elgg\Event;
use Dragonbe\Hibp\HibpFactory;

class Checker {

	public function __invoke(Event $event): void {
    
    $password = get_input('password1', null, false);
    if (!$password) {
      $password = get_input('password', null, false);
    }
		error_log("Password: $password");
    if (!$password) {
      return; // nothing to check
    }
            
    $hibp = HibpFactory::create();
    $isPwned = $hibp->isPwnedPassword($password);
    if ($isPwned) {
      $count = $hibp->count();
      elgg_error_response("Your current password has appeared in data breaches ($count times). Please choose a stronger password.");
    }
    return;
	}
}






