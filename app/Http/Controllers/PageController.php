<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Mongo;
use App\Models\Sugg;

class PageController extends BaseController
{


    public function home() {
        return view('welcome');
    }

    public static function getPoint($id) {
        $point = Mongo::where('_id', '=', $id)->first()->point;
        return view('analytics_id')->with('data', $point);
    }

    public function getSuggestion() {
        $id = Mongo::where('_id', '=', session()->get('id'))->first()->loc_id;
        $sugg = Sugg::where('location', '=', $id)->pluck('text');
    }

    public function getFarmerList() {
        $z = [];
        $farmer_list = Mongo::where('_id', '=', session()->get('id'))->first()->farmer;
        foreach ($farmer_list as $x) {
            $y = Mongo::where('_id', '=', $x)->first()->point;
            if ($y == null) {
                array_push($z, array("id"=>$x, "name" => Mongo::where('_id', '=', $x)->first()->nome, "point" => 0)); ;
            } else {
                $count = 0;
                foreach($y as $hu) {
                    $count += $hu;
                }
                $h = count($y);
                array_push($z, array("id"=>$x, "name" => Mongo::where('_id', '=', $x)->first()->nome, "point" => $count/$h));    
            }
        }
       return view('analytics')->with('farmers', $z);
    }

    
}
