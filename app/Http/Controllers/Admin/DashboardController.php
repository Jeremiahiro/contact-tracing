<?php

namespace App\Http\Controllers\Admin;

use App\Charts\UserChart;
use App\Http\Controllers\Controller;
use App\Model\Activity;
use App\Model\Location;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $years = User::pluck('created_at')->map(function ($date) {
            return $date->format('Y');
        })->unique();

        $gender = User::orderBy('gender', 'asc')->get()->groupBy('gender')
            ->map(function ($item) {
            return ($item->count());
        });

        $usersGender = new UserChart;
        $usersGender->height(250);
        $usersGender->loader(false);
        $usersGender->displayLegend(false);
        $usersGender->labels($gender->keys());
        $usersGender->dataset('Gender', 'pie', $gender->values())
                    ->color($this->borderColors)
                    ->backgroundcolor($this->fillColors);

        $age_range = User::orderBy('age_range', 'asc')->get()->groupBy('age_range')
            ->map(function ($item) {
            return ($item->count());
        });

        $usersAge = new UserChart;
        $usersAge->height(200);
        $usersAge->loader(false);
        $usersAge->minimalist(true);
        $usersAge->labels($age_range->keys());
        $usersAge->displayLegend(true);
        $usersAge->dataset('Age Range', 'pie', $age_range->values())
                    ->color($this->borderColors)
                    ->backgroundcolor($this->fillColors);

        $user_chart_api = url('/backend/users_ajax_chart');

        $userChart = new UserChart;
        $userChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])->load($user_chart_api);
    
        $activities_chart_api = url('/backend/activities_ajax_chart');

        $activityChart = new UserChart;
        $activityChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])->load($activities_chart_api);

        return view('admin.dashboard.index', compact([
            'usersAge', 'usersGender', 'userChart', 'activityChart', 'years'
            ]));
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function userChartAjax(Request $request)
    {
        $year = $request->has('year') ? $request->year : date('Y');

        // working example 2
        $users = User::selectRaw('count(id) as count, month(created_at) as month')
            ->whereYear('created_at', $year)
                ->groupBy('month')
                ->orderBy('month')
                ->get();
        
        $data = collect(range(1, 12))->map(
            function ($data) use ($users) {
              $match = $users->firstWhere('month', $data);
              return $match ? $match['count'] : 0;
            }
          );

        // // working example 1
        // $users = User::selectRaw('monthname(created_at) as month')
        //     ->whereYear('created_at', $year)
        //     ->orderBy('created_at', 'asc')->get()->groupBy('month')
        //     ->map(function ($item) {
        //     return ($item->count());
        // });

        $userChart = new UserChart;
        $userChart->loader(false);
        $userChart->height(250);
        $userChart->displayLegend(false);
        $userChart->dataset('Registered Users', 'line', $data->values())
                ->color($this->borderColors)
                ->backgroundcolor($this->fillColors);
  
        return $userChart->api();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function activityChartAjax(Request $request)
    {
        $year = $request->has('year') ? $request->year : date('Y');

        $activities = Activity::selectRaw('count(id) as count, month(created_at) as month')
            ->whereYear('created_at', $year)
                ->groupBy('month')
                ->orderBy('month')
                ->get();
        
        $data = collect(range(1, 12))->map(
            function ($data) use ($activities) {
              $match = $activities->firstWhere('month', $data);
              return $match ? $match['count'] : 0;
            }
          );

        $chart = new UserChart;
        $chart->loader(false);
        $chart->height(250);
        $chart->displayLegend(false);
        $chart->dataset('Activities', 'bar', $data->values())
                ->color($this->borderColors)
                ->backgroundcolor($this->fillColors);


  
        // $chart = new UserChart;
  
        // $chart->dataset('New User Register Chart', 'line', $users)->options([
        //             'fill' => 'true',
        //             'borderColor' => '#51C1C0'
        //         ]);
  
        return $chart->api();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function __construct()
    {
        // colors for chart 
        $this->borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];

        $this->fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"
        ];
    }
}
