<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffAddRequest;
use App\Http\Requests\StaffUpdateRequest;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use mysql_xdevapi\Exception;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Staff::where('user_id', Auth::id())->get();
//        dd($data);
        return view('staff.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffAddRequest $request )
    {
        $staff = new Staff();
        $staff->user_id = Auth::id();
        $staff->first_name =  $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->email = $request->email;
        $staff->address = $request->address;
        $staff->save();
        Mail::to($staff->email);
         Mail::raw('hello staff! welcome to sampleApp', function ($message)  {

         });
        return redirect('/staff')->with('status', 'staff created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        if(auth::id() == $staff->user_id) {
            return view('staff.show', compact('staff'));
        }
        else {
            return redirect('/staff')->with('status', 'invalid staff!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        if(auth::id() == $staff->user_id) {
            return view('staff.edit', compact('staff'));
        }
        else {
            return redirect('/staff')->with('status', 'invalid staff!');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(StaffUpdateRequest $request, Staff $staff)
    {
        $staff->first_name =  $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->email = $request->email;
        $staff->address = $request->address;
        $staff->save();

        return redirect('/staff')->with('status', 'staff details updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        try {
            $staff->delete();
        } catch (\Exception $e) {
        }

        return redirect('/staff')->with('status', 'staff deleted!');

    }


}
