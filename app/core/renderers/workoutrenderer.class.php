<?php
/**
 * workout renderer
 * is capable of rendering workouts
 * @author clemens
 */
class WorkoutRenderer {
	/**
	 * render a list of workouts
	 * @param array $workouts array of workouts to be rendered
	 */
	public static function render($workouts) {
		$html = "<table class=\"workouts\">";
		// overall training length
		$length = 0;
		$trimps = 0;
		foreach ($workouts as $k => $w) {
			$html .= "
<tr>
	<td class=\"sport\">" . __($w->getSport(), true) . "</td>
	<td class=\"type " . $w->getShortCategory() . "\">
		" . __($w->getTypeLabel(), true) . "<br />
		<span class=\"category br\">" . __($w->getCategory(), true) . "</span>
	<td class=\"duration\">" . self::formatTime($w->getDuration()) . "<small>h</small></td>
	<td class=\"trimp\">" . $w->getTRIMP() . "<small>pts.</small></td>
</tr>
<tr>
	<td class=\"description\" colspan=\"4\">
		<div>
			Suche Dir, nachdem Du gut aufgewärmt bist einen steilen Hügel,
			den Du in etwa einer Minute hinauf laufen kannst. Laufe bis zu
			acht Mal möglichst Schnell hinauf (bis in Zone 5), und zur
			Erholung ganz locker wieder herunter.
		</div>
	</td>
</tr>";
			$length += $w->getDuration();
			$trimps += $w->getTRIMP();
		}
		
		$html .= "<tr><td class=\"nobg\"></td><td class=\"nobg\"></td>
	<td class=\"duration sum\">" . self::formatTime($length) . "<small>h</small></td>
	<td class=\"trimp sum\">" . $trimps . "<small>pts.</small></td>
</tr>";
		
		$html .= "\n</table>";
		return $html;
	}

	/**
	 * nicely format a time given in minutes
	 * examples:
	 * 75 will become 1:15
	 * 45 will become 45
	 * 133 will become 2:13
	 * date() can't be used for formatting as different locales (GMT+2 etc...) will vary the output
	 * @param unknown_type $minutes
	 * @return formatted time string
	 */
	public static function formatTime($minutes) {
		// get hours
		$h = intval($minutes / 60);
		// minutes
		$m = $minutes - ($h * 60);
		// zerofill
		if ($m < 10) {
			$m = '0' . $m;
		}
		
		return "$h:$m";
	}
}
?>