<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Teststation;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\Array_;
use Illuminate\Support\Facades\DB;

/**
 * 
 * admin dashboard hanlder class
 * 
 */

class DashboardController extends Controller
{

    /**
     * 
     * show admin dashboard page 
     * 
     * @return array[] of (users, patients,total_male and total female)
     * 
     */

    public function index()
    {
        $all_patients =  Patient::get()->groupBy(function ($d) {
            return Carbon::parse($d->created_at)->format('m');
        });

        //count male and female from last month data
        $counts_male_female =  Patient::whereMonth('created_at', Carbon::now()->month)->get()->groupBy(function ($d) {
            return Carbon::parse($d->created_at)->format('d');
        });

        //get count of male and female
        $total_male_female =  $this->count_male_female($counts_male_female);
        $users = User::orderBy('id', 'desc')->take(8)->get();
        $all_county = DB::table('counties')->get();

        $n_t_station = Teststation::count();
        $n_device = Device::count();
        $all_gps_pin = json_encode(DB::table('teststations')->select('gps_pin','location')->get());
        return view('admin.dashboard', ['title' => 'Dashboard', 'users' => $users, 'all_patients' => $all_patients,'total_male_female'=>$total_male_female, 'all_county' => $all_county,'n_t_station' => $n_t_station , 'n_device' => $n_device,'all_gps_pin'=>$all_gps_pin]);
    }


    /**
     * 
     * make new array whcih contain count of male and female
     * 
     * @param array of all patients who have register last month
     * 
     * @return new array which contain key(date) and values(count of male & count of female)
     * 
     */

    public function count_male_female($patients_of_last_month)
    {
        $males = []; $females = []; $count_of_male_female = [];
        foreach ($patients_of_last_month as $key => $patients) {

            $total_male   = 0; $total_female = 0;
            foreach ($patients as $patient) {
                if ($patient->gender == 'male') {
                    $total_male++;
                } elseif ($patient->gender == 'female') {
                    $total_female++;
                }
            }
            $count_of_male_female[$key] = ['male' => $total_male, 'female' => $total_female];
        }
        $sec = 1640909999999;
        for ($date = 1; $date <= date('d'); $date++) {
            $index = str_pad($date, 2, 0, STR_PAD_LEFT);
            
            if (isset($count_of_male_female[$index])) {
               
                $males[] = [$sec + ($index * 86400000),  $count_of_male_female[$index]["male"]];
                $females[] = [$sec + ($index * 86400000), $count_of_male_female[$index]["female"]];
            }
        }
        return [$males, $females];
    }

    /**
     * 
     * group data by datewise
     * 
     * @param $datas, $date
     * 
     * @return filtered array[]
     * 
     */

    public function group_data_by_date($datas, $date)
    {
        $filtered_arr = [];
        foreach ($datas as $data) {
            $date_of_current_data = Carbon::parse($data->created_at)->format('m-Y');
            if ($date == $date_of_current_data) {
                array_push($filtered_arr, $data);
            }
        }
        return $filtered_arr;
    }
}
