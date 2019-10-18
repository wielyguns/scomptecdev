<?php

use Carbon\Carbon;

if (! function_exists('tgl_id')) {
    function tgl_id($tgl)
    {
        $dt = new Carbon($tgl);
        // return $dt->formatLocalized('%d %b %Y');   
        return $dt->format('d M Y');
    }
}

if (! function_exists('dateStore')) {
    function dateStore($tgl)
    {
        $ds = new Carbon($tgl);
        return $ds->format('Y-m-d');
    }
}

if (! function_exists('getTime')) {
	function getTime($gt)
	{
		$t = new Carbon($gt);
		return $t->format('H:i');
	}
}

if (! function_exists('setRp')) {
    function setRp($val) {
        $format = "Rp " . number_format($val,0,',','.');
        return $format;
    }
}

if (! function_exists('getRp')) {
    function getRp($val) {
        $format = str_replace(".", "", $val);
        return $format;
    }
}