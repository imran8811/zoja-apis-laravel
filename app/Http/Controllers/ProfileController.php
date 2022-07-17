<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $formFields = $request->validate([
            'contactNo' => 'required',
            'professionType' => 'required',
            'income' => 'required',
            'religion' => 'required',
            'caste' => 'required',
            'degreeLevel' => 'required',
            'institute' => 'required',
            'country' => 'required',
            'city' => 'required',
            'status' => 'required',
            'age' => 'required',
            'complexion' => 'required',
            'weight' => 'required',
            'feet' => 'required',
            'inch' => 'required',
            'motherLanguage' => 'required',
            'requirements' => 'required',
            'jobTitle' => 'required',
            'noOfSone' => 'required',
            'noOfDaughters' => 'required',
            'userId' => 'required' 
        ]);
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
}
