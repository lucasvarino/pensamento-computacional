<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BartleController extends Controller
{
    public function group(Request $request)
    {
        $data = [
            'labels' => ['Achiever', 'Explorer', 'Socializer', 'Killer'],
            'data' => [25, 30, 15, 10],
        ];

        return view('groupResult', compact('data'));
    }

    public function extended()
    {
        $data = [
            'labels' => ['Achiever', 'Explorer', 'Socializer', 'Killer'],
            'data' => [25, 30, 15, 10],
        ];
        return view('groupExtended', compact('data'));
    }
}
