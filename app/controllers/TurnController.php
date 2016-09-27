<?php

class TurnController extends BaseController {

	public function postCheck()
	{
		$lastCommand = Input::get("lastcommand");
		$game = Auth::user();

		if ($game->crown) {
			if ($game->player_location_id == 1) {
				$return = $this->gameOver();
				return Response::json($return);
			}
		} 
		if ($this->isDead()) {
			$return = $this->isDead();
			return Response::json($return);
		}
		if ($lastCommand != "hit"){
			$return = $this->isSeen();
			return Response::json($return);
		}
		
	}

	public function sendBack($thing)
	{
		return Response::json($thing);
	}

	public function isDead()
	{
		$user = Auth::user();
		$health = $user->health;
		if ($health <= 0) {

			// move to game over room
			$update = Auth::user();
			$update->player_location_id = 22;
			$update->save();

			// fetch game over text
			$room = Map::where("id", 22)->firstOrFail();
			return $room->description;
		} else {
			return false;
		}
	}

	public function isSeen()
	{
		// are there guards?
		$game = Auth::user();
		$guard = $game->map->guards()
			->where('health', '>', 0)
			->where('user_id', Auth::id())
			->first();
		if ($guard) { // if so
			$stealth = $game->stealth;

			if ($stealth == 0){
				$stealth = 1;
			}
			
			$chance = (5/$stealth) * 100;
			$seen = mt_rand(1, 100);

			if ($seen < $chance) {
				$before = $game->health;
				$game->health = $game->health - 1;
				$after = $game->health;
				if ($game->stealth != 0) {
					$game->stealth = $game->stealth - 1;
				}

				$game->save();
				return "You have been spotted and a guard attacks you. -1 Health -1 Stealth";
			} else {
				return "The guards don't see you, but you might want to hurry.";
			}
		} else {
			return false;
		}
	}

	public function gameOver() 
	{
		// move to game over room
			$update = Auth::user();
			$update->player_location_id = 22;
			$update->save();

			$return = "You did it. You snuck in and back out again. And against all odds, you even stole the crown. You'd probably get a lot of money for this. As you walk out the gate, you start thinking of how you'll spend all that money. Maybe you'll buy a snow globe... You've always wanted a snow globe. <br><br>---Credits---<br>Developer: Timothy Birrell<br>Developer: Matt Reat<br>Developer: David Rodriguez<br><br>With thanks to Codeup";
			return $return;

	}
}
