<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('kdate')) {
	function kdate($stamp)
	{
		return date('o년 n월 j일, G시 i분 s초', $stamp);
	}
}

if (!function_exists('days_to_today')) {
	function days_to_today($date)
	{
		$days = null;

		$last_date = $date;
		$today = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y')));

		$ee = strtotime($today);
		$ss = strtotime($last_date);
		$day = 86400;
		$days = ($ee - $ss) / $day;

		return $days;
	}
}

if (!function_exists('elapsed_days_span')) {
	function elapsed_days_span($l_date)
	{
		$days = null;

		$last_date = $l_date;
		$today = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y')));

		$ee = strtotime($today);
		$ss = strtotime($last_date);
		$day = 86400;
		$days = ($ee - $ss) / $day;

		if ($days > 60) {
			$color = "color:red";
		} else {
			$color = "color:blue";
		}

		$span = "<span style=" . $color . ">" . $days . "</span>";
		return $span;
	}
}
