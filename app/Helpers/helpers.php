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
        $format = number_format($val,0,',','.');
        return $format;
    }
}

if (! function_exists('getRp')) {
    function getRp($val) {
        $format = str_replace(".", "", $val);
        return $format;
    }
}

if (! function_exists('getMonth')) {
    function getMonth() {
        $temp = [];
        array_push($temp,['name'=>'Januari','value'=>'01']);
        array_push($temp,['name'=>'Februari','value'=>'02']);
        array_push($temp,['name'=>'Maret','value'=>'03']);
        array_push($temp,['name'=>'April','value'=>'04']);
        array_push($temp,['name'=>'Mei','value'=>'05']);
        array_push($temp,['name'=>'Juni','value'=>'06']);
        array_push($temp,['name'=>'Juli','value'=>'07']);
        array_push($temp,['name'=>'Agustus','value'=>'08']);
        array_push($temp,['name'=>'September','value'=>'09']);
        array_push($temp,['name'=>'Oktober','value'=>'10']);
        array_push($temp,['name'=>'November','value'=>'11']);
        array_push($temp,['name'=>'Desember','value'=>'12']);
        $temp = collect($temp);
        return $temp;
    }
}