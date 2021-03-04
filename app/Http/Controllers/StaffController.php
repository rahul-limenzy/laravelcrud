<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffEditRequest;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request )
    {
        $staff = new Staff();
        $staff->user_id = Auth::id();
        $staff->first_name =  $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->email = $request->email;
        $staff->address = $request->address;
        $staff->save();

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
        //dd($staff);
        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(StaffEditRequest $request, Staff $staff)
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
        $staff = Staff::find($staff['id']);
        $staff->delete();

        return redirect('/staff')->with('status', 'staff deleted!');

    }

    /*public function viewDetail(Staff $staff)
    {
        dd($staff);
    }*/

}