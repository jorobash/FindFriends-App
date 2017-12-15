<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class FindFriendsController extends Controller
{

    public function index()
    {
        return view('index');
    }
    //fetch all county names

    public function getCountryName()
    {
        $countryName = DB::table('lang_table')->pluck('country_name');
        return response($countryName);
    }

    // fetch all users that are not friend of user with id = 1
    // and are from Bulgaria

    public function getData(Request $request)
    {
        if (Input::has('findfriends') || $_GET) {

            $countryName = DB::table('lang_table')->pluck('country_name');

            $data = DB::table('users')
                ->join('lang_table', function ($join) {
                    $join->on('lang_table.language_id', '=', 'users.country');
                })
                ->select('lang_table.country_name', 'users.user_id', 'users.real_name')
                ->whereRaw('not exists( select fr2 from friends where fr1 = 1 and fr2 = users.user_id and status = 1 )', [])
                ->whereRaw('not exists ( select fr1 from friends where fr2 = 1 and fr1 = users.user_id and status = 1 )', [], 'and')
                ->where('users.user_id', '<>', 1)
            // ->where('users.country', '=', 1)
                ->paginate(25);

            if ($request->ajax()) {
                return view('ajaxfindfriends', ['ffriends' => $data, 'countryname' => $countryName])->render();

            }

            return view('findfriends', ['ffriends' => $data, 'countryname' => $countryName]);
        }
        return view('findfriends');
    }

}
