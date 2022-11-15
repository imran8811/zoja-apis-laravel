<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
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
            'noOfSons' => 'required',
            'noOfDaughters' => 'required',
            'userId' => 'required' 
        ]);

        $profile = Profile::create([
            'contactNo' => $formFields['contactNo'],
            'professionType' => $formFields['professionType'],
            'income' => $formFields['income'],
            'religion' => $formFields['religion'],
            'caste' => $formFields['caste'],
            'degreeLevel' => $formFields['degreeLevel'],
            'institute' => $formFields['institute'],
            'country' => $formFields['country'],
            'city' => $formFields['city'],
            'status' => $formFields['status'],
            'age' => $formFields['age'],
            'complexion' => $formFields['complexion'],
            'weight' => $formFields['weight'],
            'feet' => $formFields['feet'],
            'inch' => $formFields['inch'],
            'motherLanguage' => $formFields['motherLanguage'],
            'requirements' => $formFields['requirements'],
            'jobTitle' => $formFields['jobTitle'],
            'noOfSons' => $formFields['noOfSons'],
            'noOfDaughters' => $formFields['noOfDaughters'],
            'userId' => $formFields['userId'] 
        ]);

        $response = [
            'type' => 'success'
        ];

        return response ($response);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
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
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
