<?php

namespace Pwned\Password;

class Checker {

	public function __invoke(\Elgg\Event $event): void {
    
    $password = get_input('password1', null, false);
    if (!$password) {
      $password = get_input('password', null, false);
    }
		// error_log("Password: $password");
    if (!$password) {
      return; // nothing to check
    }
            
    $hibp = \Dragonbe\Hibp\HibpFactory::create();
    $isPwned = $hibp->isPwnedPassword($password);
    if ($isPwned) {
      $count = $hibp->count();
      elgg_error_response(elgg_echo("pwned:usermessage", [$count]));
    }
    return;
	}
}






