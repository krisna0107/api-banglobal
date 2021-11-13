<?php

namespace App\Http\Controllers;

use App\Models\Banlist;
use Illuminate\Http\Request;

class BanlistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getBanList(Request $request)
    {
        if (!$request->steam) {
            return response()->json([
                "status" => "400",
                "message"   => "Bad Request"
            ], 500);
        }
        $banlist = Banlist::orWhere('steam', $request->steam);
        if ($request->license) {
            $banlist = $banlist->orWhere('license', $request->license);
        }

        if ($request->discord) {
            $banlist = $banlist->orWhere('discord', $request->discord);
        }

        if ($request->xbl) {
            $banlist = $banlist->orWhere('xbl', $request->xbl);
        }

        if ($request->liveid) {
            $banlist = $banlist->orWhere('liveid', $request->liveid);
        }

        $banlist = $banlist->first();

        if ($banlist!=null) {
            return response()->json([
                "status" => "200",
                "message"   => $banlist->reason
            ], 200);
        }

        return response()->json([
            "status" => "404",
            "message"   => "Not Banned"
        ], 200);
    }
}
