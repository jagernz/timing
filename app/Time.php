<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Time extends Model
{

    public static function getTime() {

	    $now = Carbon::now()->toTimeString();

	    return ($now);
    }

	public static function getDay() {

		$day = Carbon::now()->toFormattedDateString();

		return ($day);

	}
}
