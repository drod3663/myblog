<?php

class EatController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function postFood()
	{
		$food = strtolower(Input::get("food"));

		if ($food == "shoe") {
			$update = Auth::user();
			$update->health = 10;
			$update->save();

			$return = "Congrats, you get all your HP back, now you won't look dumb losing your own game. You also only have one shoe now, so there is that...";
			return Response::json($return);
		}

		// check if item is edible
		if ($this->canEat($food)) {
			// fetch health
			$currentHp = Auth::user();
			$currentHp = $currentHp->health;
			if ($currentHp > 8) {
				$newHp = 10;
				$this->updateHp($newHp);
				$difference = 10 - $currentHp;
				$return = ucfirst($food) . " eaten. +" . $difference . " HP";
				$this->clearItem($food);
			} else {
				$newHp = $currentHp + 2;
				$this->updateHp($newHp);
				$return = ucfirst($food) . " eaten. +2 HP";
			}
		} else {
			if ($food == "apple") {
				$return = "You don't have an apple."; 
			} else if ($food == "bread") {
				$return = "You don't have any bread."; 
			} else {
				$return = "You can't eat that.";
			}
		}

		// return result
		return Response::json($return);
	}

	public function canEat($food)
	{
		if ($food == "apple" || $food == "bread") {
			if ($this->hasItem($food)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function updateHp($newHp)
	{
		$update = Auth::user();
		$update->health = $newHp;
		$update->save();
	}

	public function hasItem($food)
	{
		$inventory = Auth::user();
		$thing = $inventory->$food;

		if ($thing) {
			return true;
		} else {
			return false;
		}
	}

	public function clearItem($food)
	{
		$update = Auth::user();
		$update->$food = NULL;
		$update->save();
	}
}
