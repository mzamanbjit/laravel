<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DB;
use carbon\carbon;
use DateTime;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
     
        
    }

    public function index()
    {
        $data = [];

        /*
        Carbon::macro('diffFromYear', function ($year, $absolute = false, $short = false, $parts = 1) {
    return $this->diffForHumans(Carbon::create($year, 1, 1, 0, 0, 0), $absolute, $short, $parts);
});
        echo Carbon::parse('2019-02-12 12:00:00')->diffFromYear(2019); 
        */
        
       echo $current = Carbon::tomorrow();


        $date1 = new \DateTime("2019-11-23");
        $date2 = new \DateTime("2018-11-23");
        $interval = $date1->diff($date2);
        echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 
        echo "difference " . $interval->days . " days ";



       
        DB::listen(function($query) {
            Log::info(
                $query->sql,
                $query->bindings,
                $query->time
            );
        });

        $from_date = '2018-11-16';
        $to_date = '2018-11-16 17:09:02';

        //$data['users'] = \App\Department::has('employees')->get();
        


        /*
            $data['users'] = \App\Employee::whereHas(
                                'department', function ($query) {
                                    $query->where('id',  1);
                                    $query->where('department_name', '!=', 'test');
                                   
                                }
                            )
                        ->whereBetween('created_at', [$from_date, $to_date] )
                        ->orderBy('id', 'DESC')
                        ->get()
                        ->sortBy('department.sort_order');        
        */

        $data['users'] = \App\Employee::with('department')
                        ->whereBetween('created_at', [$from_date, $to_date] )
                        ->orderBy('id', 'DESC')
                        ->get()
                        ->sortBy('department.sort_order');



        return view('welcome', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        /* try {
            $this->buildXMLHeader;
        }
        catch (\Exception $e) {

            abort(404, 'Unauthorized action.'); 
            return $e->getMessage();
        }
        */

        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        //
        $insertData = [
                    'name'=>$request->name,
                    'address'=>$request->address,
                    'joining_date'=>$request->joining_date,
                    'size'=>$request->size,
            ];       
       // DB::Table('users')->insert($insert);
       \App\Employee::insert($insertData);
        return redirect('/employees');
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
}
