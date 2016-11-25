<?php

namespace App\Http\Controllers\Core;

use App\Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session;
use App\User;
use App\Day;

class IndexController extends Controller
{
/*
 * Страница по умолчанию для Юзера
 */
    public function index(Request $request)
    {

        $now = Time::getTime();
        $day = Time::getDay();
        $userName = Auth::user()->name;
        $user = DB::table('users')
                ->where('name', $userName)
                ->first();

        return view('core.index', compact('user','now','day'));

    }
/*
 * Начало работы
 */
    public function startWork(Request $request)
    {

        if ($request->ajax()) {

            $data = $request->all();
        $user = User::where('id', $data['id'])->get();

        Day::create([
                'day' => $data['day'],
                'user_id' => $user[0]['id'],
                'start_day' => Time::getTime()
        ]);

            return response()->json([
                        'message' => 'Начало рабочего дня'
            ]);
        }

    }
/*
 * Конец работы
 */
    public function endWork(Request $request)
    {

        if ($request->ajax()) {

            return response()->json([
                        'message' => 'Конец рабочего дня'
            ]);

        }

    }
/*
 * Перерыв
 */
    public function rest(Request $request)
    {

        if ($request->ajax()) {

            $data = $request->all();

            dd($data);

            $user = User::where('id', $data['id'])->get();

            Events::create([
                    'day' => $data['day'],
                    'user_id' => $user[0]['id'],
                    'start_day' => Time::getTime()
            ]);

            return response()->json([
                        'message' => 'Перерыв'
            ]);

        }

    }

}
