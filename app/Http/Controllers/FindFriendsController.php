<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class FindFriendsController extends Controller
{
    // fetch all users that are not friend of user with id = 1
    // and are from Bulgaria

    public function getData()
    {

        if (Request::has('findfriends')) {

            $data = DB::table('users')
                ->join('lang_table', function ($join) {
                    $join->on('lang_table.language_id', '=', 'users.country');
                })
                ->select('lang_table.country_name', 'users.user_id', 'users.real_name')
                ->whereRaw('not exists( select fr2 from friends where fr1 = 1 and fr2 = users.user_id and status = 1 )', [])
                ->whereRaw('not exists ( select fr1 from friends where fr2 = 1 and fr1 = users.user_id and status = 1 )', [], 'and')
                ->where('users.user_id', '<>', 1)
                ->where('users.country', '=', 1)
                ->paginate(25);

            return view('findfriends', ['ffriends' => $data]);
        } else {
            return view('findfriends');
        }
    }
}
