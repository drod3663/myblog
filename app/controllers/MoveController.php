<?php

class MoveController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public $nextRoom;	// id of next room

	public function findCurrent()
	{
		// find current room in DB

		$current = Auth::user();

		$current = $current->player_location_id;
		
		// find room in specified direction
		return Map::where("id", $current)->firstOrFail();
	}

	public function updateLocation($next)
	{
		// check if room exisits
		if ($this->nextRoom) {
			// send description ot console
			$return = $this->fetchDescription($this->nextRoom);

			// set as current room
			$update = Auth::user();
			$update->player_location_id = $this->nextRoom;
			$update->save();
		} else {
			$return = "You can not go that way.";
		}

		// return result
		return Response::json($return);
	}

	public function fetchDescription($id)
	{
		$room = Map::where("id", $id)->firstOrFail();
		return $room->description;
	}

	public function getIndex()
	{
		$currentMap = $this->findCurrent();

		return Response::json($currentMap);
	}

	public function postNorth()
	{
		$next = $this->findCurrent();

		$player = Auth::user();

		// exepction for winning
		if ($player->player_location_id == 20) {
			// check if locked
			if (!$player->crown){ // if does not have crown
				$return = "Why would you jump out the window without the crown?";
				return Response::json($return);
			}
		}
		$this->nextRoom = $next->north_map_id;
		return $this->updateLocation($next);
	}
	public function postSouth()
	{
		$next = $this->findCurrent();
		$this->nextRoom = $next->south_map_id;
		return $this->updateLocation($next);
	}
	public function postEast()
	{
		$next = $this->findCurrent();

		$player = Auth::user();

		// exepction for locked door
		if ($player->player_location_id == 2) {
			// check if locked
			if ($player->access_x){ // if unlocked
				$this->nextRoom = $next->east_map_id;
				return $this->updateLocation($next);
			} else { // if locked
				$return = "This door is locked";
				return Response::json($return);
			}
		}
		$this->nextRoom = $next->east_map_id;
		return $this->updateLocation($next);
	}
	public function postWest()
	{
		$next = $this->findCurrent();
		$this->nextRoom = $next->west_map_id;
		return $this->updateLocation($next);
	}

	public function missingMethod($parameters = array())
	{
		$return = "That is not a valid direction";
		return Response::json($return);
	}
}
