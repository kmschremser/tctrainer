<?php
/**
 * the TriRunProvider provides triathlon-specific run workouts
 * @author clemens
 */
class TriRunProvider extends WorkoutProvider {
	
	protected $SPORT = 'RUN';
	
	/**
	 * generates an LSD Run, which will typically be an E2 workout
	 * @param $ldRace the next ld race from the schedule
	 * @return workout
	 */
	protected function generateLSDWorkout(Race $ldRace) {
		$NOW = new DateTime();
		$duration = RunWorkout::$LSD_TIMES[$this->athlete->getLevel()]
		[$ldRace->getWeeksTillRaceday(new DateTime())];
		if ($duration == 0) {
			return false;
		}
		return new RunWorkout(Workout::E2, $duration, true);
	}

	/*
	 * @see parent class
	 */
	protected function getWorkoutTypeSequence(Database $DB, $phase, Athlete $athlete, DateTime $week) {
		return new TriRunWorkoutTypeSequence(
			$this->DB, $this->phase["phase"], $this->athlete, $week);
	}
	
	/*
	 * @see parent class
	 */
	protected function newWorkout($type, $duration) {
		return new RunWorkout($this->athlete, $type, $duration);
	}
	
	/**
	 * determine workout duration based on
	 * - next A race, or your training target (Ironman, Half Marathon, ...)
	 * - personal modificator
	 * - the training type
	 * - past utilization of a specific training type (increase duration for repaetently used trainings)
	 * @param unknown_type $type
	 */
	protected function getDuration($trainingType, $raceType) {
		// the determined duration
		$d = -1;
		$distance = Race::getDistanceClass($raceType);
		switch($trainingType) {
			case "E1":
				switch($distance) {
					case "SPRINT":
						$d = 30;
						break;
					case "SHORT";
					$d = 40;
					break;
					default:
						$d = 50;
						break;
				}
				break;
			case "E2":
			case "S2":
				switch($distance) {
					case "SPRINT":
						$d = 45;
						break;
					case "SHORT";
					$d = 60;
					break;
					case "MIDDLE":
						$d = 75;
						break;
					case "LONG":
						$d = 90;
						break;
				}
				break;
			case "E3":
				switch($distance) {
					case "SPRINT":
						$d = 30;
						break;
					case "SHORT";
					$d = 40;
					break;
					case "MIDDLE":
						$d = 50;
						break;
					case "LONG":
						$d = 60;
						break;
				}
				break;
			case "F1":
			case "F2":
				switch($distance) {
					case "SPRINT":
						$d = 30;
						break;
					case "SHORT";
					$d = 40;
					break;
					case "MIDDLE":
						$d = 60;
						break;
					case "LONG":
						$d = 80;
						break;
				}
				break;
			case "F3":
				switch($distance) {
					case "SPRINT":
						$d = 30;
						break;
					case "SHORT";
					$d = 40;
					break;
					case "MIDDLE":
					case "LONG":
						$d = 60;
						break;
				}
				break;
			case "S1":
				switch($distance) {
					case "SPRINT":
						$d = 30;
						break;
					case "SHORT";
					$d = 45;
					break;
					case "MIDDLE":
						$d = 50;
						break;
					case "LONG":
						$d = 60;
						break;
				}
				break;
			case "M1":
				switch($distance) {
					case "SPRINT":
						$d = 30;
						break;
					case "SHORT";
					$d = 45;
					break;
					case "MIDDLE":
						$d = 60;
						break;
					case "LONG":
						$d = 80;
						break;
				}
				break;
			case "M2":
			case "M3":
			case "M4":
				switch($distance) {
					case "SPRINT":
						$d = 30;
						break;
					case "SHORT";
					$d = 45;
					break;
					case "MIDDLE":
						$d = 60;
						break;
					case "LONG":
						$d = 80;
						break;
				}
				break;
			case "M5":
				switch($distance) {
					case "SPRINT":
						$d = 30;
						break;
					case "SHORT";
					$d = 40;
					break;
					case "MIDDLE":
						$d = 50;
						break;
					case "LONG":
						$d = 60;
						break;
				}
				break;

		}

		// apply modificator past trainings
		$m = $this->getModificator($trainingType);
		$d = $d * $m;
		
		// TODO apply personal modificator for this kind of training

		// check if we've got a duration or if there is a typo in the spec above
		if ($d == -1) {
			throw new Exception("Could not determine training duration for training type " .
				"{$trainingType}, race type {$raceType}, distance {$distance}");
		}

		// round to nearest five
		$d = round($d / 5) * 5;
		return $d;
	}
}
?>