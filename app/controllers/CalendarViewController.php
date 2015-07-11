<?php


// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use AsanaTeacher\Entity\User;
use AsanaTeacher\Entity\Schedule;

class CalendarViewController extends \BaseController {

	/**
	 * Default Layout
	 *
	 * @var string
	 */
	protected $layout = 'layouts.apps.calendar';

	/**
	 * Display a listing of the resource.
	 * GET /calendarview
	 *
	 * @return Response
	 */
	public function index($id = null)
	{

		if (is_null($id))
			$id = Auth::user()->id;

		$user = User::where('id', $id)->with(
			array(
				'category' => function($query) {

				}, 'joinGroupCollections' => function($query) {
					$query->with(
						array(
							'groupCollection' => function($query) {
								$query->with('group', 'teacher', 'course');
							}
						)
					);
				}
			)
		)->get();

		foreach ($user as $value) {	}

		$user = $value;

		$events = array();

		$nroDia = date( 'N' );

		$colors = array('greenLight','red', 'blue', 'darken', 'blueLight', 'orange');
		$faker = Faker::create();


		foreach ($user->joinGroupCollections as $joinGroupCollection)
		{
			$schedules = Schedule::Where('group_collection_id', $joinGroupCollection->groupCollection->id)->get();
			
			$color = $faker->randomElement($colors);

			foreach ($schedules as $schedule)
			{

				$day = date('Y-m-d');

				if ($nroDia > $schedule->day) 
				{
					$day = date("Y-m-d", strtotime($schedule->day - $nroDia . " day"));
				} else if($nroDia < $schedule->day) {
					$day = date("Y-m-d", strtotime("+" . $schedule->day - $nroDia. " day"));
				}

				$events[] = array(
					'title' => $joinGroupCollection->groupCollection->course->name,
					'description' => $schedule->building . " " . $schedule->classroom,
					'start' => $day . "T" .$schedule->from,
					'end' => $day . "T" .$schedule->to,
					'className' => ['event', 'bg-color-' . $color],
				);
			}
		}

		//return $events;

		$this->addParam('events', $events);

		return parent::index();
	}

}