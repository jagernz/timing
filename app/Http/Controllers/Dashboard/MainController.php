<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Time;

class MainController extends Controller
{

	public function index()
	{
		$now = Time::getTime();
		return view('dashboard.main', compact('now'));
	}

    public function showUsers()
    {
	    $now = Time::getTime();
	    $users = User::getUsers();
	    return view('dashboard.users', compact('users','now'));
    }

	public function showStatistic()
	{
		$now = Time::getTime();
		return view('dashboard.statistic', compact('now'));
	}
}
