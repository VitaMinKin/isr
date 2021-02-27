<?php

namespace App\Http\Controllers;

use App\Models\InformatizationObject;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInformatizationObjectRequest;
use App\Models\Department;

class InformatizationObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = InformatizationObject::paginate();

        return view('objects.index', compact('objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $object = new InformatizationObject();
        $departments = Department::get();
        return view('objects.create', compact('object', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInformatizationObjectRequest $request)
    {
        $validated = $request->validated();
        InformatizationObject::create($validated);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $object = InformatizationObject::findOrFail($id);

        return view('objects.show', compact('object'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(InformatizationObject $object)
    {
        $departments = Department::get();

        return view('objects.edit', compact('object', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreInformatizationObjectRequest $request, InformatizationObject $object)
    {
        $validated = $request->validated();

        $object->update($validated);

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InformatizationObject $object)
    {
        $department = $object->department;

        $object->delete();

        return redirect()->route('departments.show', $department);
    }
}
