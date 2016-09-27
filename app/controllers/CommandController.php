<?php

class CommandController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($command)
	{
		$array = explode(" ", $command);
		$base = strtolower($array[0]);

		switch ($base) {
			case 'move':
				# code...
				break;
			case 'take':
				# code...
				break;
			case 'hit':
				# code...
				break;
			case 'eat':
				# code...
				break;
			case 'use':
				# code...
				break;
			default:
				# code...
				break;
		}
	}
}
