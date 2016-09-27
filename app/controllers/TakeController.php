<?php

class TakeController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function postTake()
	{
		$item = strtolower(Input::get("thing"));

		// check if object is takeable
		if ($this->isTakable($item)) {
			if ($this->doesHave($item)) {
				$return = "You already have that.";
			} else {
				// add object to backpack
				$update = Auth::user();
				$update->$item = true;
				$update->save();

				$return = ucfirst($item) . " taken.";
			}
		} else {
			$return = "You can't take that.";
		}

		// return result
		return Response::json($return);
	}

	public function isTakable($item)
	{
		if ($this->isItem($item) && $this->isRoom($item)) {
			return true;
		} else {
			return false;
		}
	}

	public function isItem($item)
	{
		$thing = Item::where("name", $item)->count();
		if ($thing) {
			return true;
		} else {
			return false;
		}
	}

	public function isRoom($item)
	{
		// player location
		$currentRoom = Auth::user();
		$currentRoom = $currentRoom->player_location_id;
		$itemRoom = Item::where("name", $item)->firstOrFail();
		$itemRoom = $itemRoom->map_id;

		if ($currentRoom == $itemRoom) {
			return true;
		} else {
			return false;
		}
	}

	public function doesHave($item)
	{
		// player location
		$inventory = Auth::user();
		$thing = $inventory->$item;

		if ($thing) {
			return true;
		} else {
			return false;
		}
	}
}
