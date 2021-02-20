<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Http\Requests\StoreOfficerRequest;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officers = Officer::paginate();
        
        return view("officers.index", compact('officers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ranks = \App\Models\MilitaryRank::pluck('name', 'id');
        $officer = new Officer();
        return view("officers.create", compact('ranks', 'officer'));
    }
    //@param  \Illuminate\Http\Request  $request
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOfficerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficerRequest $request)
    {
        $validated = $request->validated();
       
        $officer = new Officer();
        $officer->fill($validated);
        $officer->save();
        //Technical debt: use laravel locale
        flash("Запись офицера по ОБИ успешно добавлена в базу данных")->success();

        return redirect()->route('officers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function show(Officer $officer)
    {
        return view("officers.show", compact('officer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function edit(Officer $officer)
    {
        $ranks = \App\Models\MilitaryRank::pluck('name', 'id');

        return view('officers.edit', compact('officer', 'ranks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOfficerRequest $request, Officer $officer)
    {
        $validated = $request->validated();

        $officer->fill($validated);
        $officer->save();
        return redirect()->route('officers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Officer $officer)
    {
        //
    }
}
