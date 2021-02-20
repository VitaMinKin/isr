<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruls = [
            'military_rank' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'patronymic' => 'required',
            'military_position' => 'required'
        ];

        $messages = [//Technical debt: must use laravel localization
            'required' => 'Поле :attribute обязательно для заполнения!'
        ];

        $attributes = [
            'military_position' => 'Должность',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество'
        ];

        $validator = Validator::make(
            $request->all(),
            $ruls,
            $messages,
            $attributes
        );

        dump($validator->errors()->all());

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                flash($error)->error()->important();
            }

            return redirect()->route('officers.create')->withInput();
        }
        
        $officer = new Officer();
        $officer->fill($request->all());
        $officer->save();

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Officer $officer)
    {
        //
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
