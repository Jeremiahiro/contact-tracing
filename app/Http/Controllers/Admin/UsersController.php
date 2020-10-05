<?php

namespace App\Http\Controllers\Admin;

use App\Charts\UserChart;
use App\Http\Controllers\Controller;
use App\Model\Activity;
use Illuminate\Http\Request;
use App\Model\User;
use DataTables;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity as ActivityLog;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = User::count();
        if($request->ajax()){
            $data = User::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '<a href="/backend/users/'. $row->uuid .'" class="edit btn btn-primary btn-sm py-1">View</a>';
                    })
                    ->addColumn('registered', function($row){
                        return $row->created_at->diffForHumans();
                    })
                    ->rawColumns(['action', 'registered'])
                    ->make(true);
        }
        return view('admin.users.index', compact('count'));
    }

    public function activityChart($uuid)
    {
        $user = User::where('uuid', $uuid);
        
        $data = $user->activity()->get();

        return response()->json($data);
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
    public function show(Request $request, $uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        $activity_logs = ActivityLog::where('causer_id', $user->id)->get();

        $activity = Activity::where('user_id', $user->id)
                        ->groupBy('date')
                        ->orderBy('date', 'desc')
                            ->get(array(
                                DB::raw('Date(created_at) as date'),
                                DB::raw('COUNT(*) as "count"')
                            ));

        // to json
        $activity_stat = json_encode($activity);

        return view('admin.users.show', compact(['user', 'activity_logs', 'activity_stat']));
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
}
