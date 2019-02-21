<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Helpers\Helper;
use App\GetApi;

class HomeController extends Controller
{
    public $getApi;

    public function __construct(){
        $this->getApi = new GetApi();
    }

    public function weather(Request $request){

        if ($request->ajax()){
            
            //declare variable
            $output = "";
            $temp = 0;
            $tempDiff = 0;
            $tempCity = [];
            
            // calls api from getApi with method getWeatherById
            $getWeather = $this->getApi->getWeatherById($request->checkid);

            $output .= "<thead>";
            $output .= "<tr><th>".$getWeather->city->name."</th><th>Suhu</th><th>Perbedaan</th></tr>";
            $output .= "</thead>";
            $output .= "<tbody>";

                foreach ($getWeather->list as $getWeatherList) {
                    $output .= "<tr>";
                    $output .= "<td>".date("Y-m-d H:i:s", substr($getWeatherList->dt, 0, 10))."</td>";
                    $output .= "<td>".round($getWeatherList->main->temp,2)."</td>";
                    $output .= "<td>".round(($getWeatherList->main->temp_max - $getWeatherList->main->temp_min),2)."</td>";
                    $temp+= round($getWeatherList->main->temp,2);
                    $tempDiff+= round(($getWeatherList->main->temp_max - $getWeatherList->main->temp_min),2); 
                    $sumTemp['sumTemp'] = round($temp, 2);
                    $sumTemp['sumTempDiff'] = round($tempDiff, 2);
                    $tempCity= $sumTemp;
                    $output .= "</tr>";
                }

            $output .= "</tbody>";
            $output .= "<tfoot>";
            $output .= "<tr><th>Rata-Rata</th>";
            $output .= "<th>".json_encode(round($tempCity['sumTemp']/5),2)."</th>";
            $output .= "<th>".json_encode(round($tempCity['sumTempDiff']/5),2)."</th></tr>";
            $output .= "</tfoot>";

            return $output;

        }
    }
}
