<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;
use App\Models\Officer;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::paginate();

        return view("departments.index", compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = new Department();

        $officers = Officer::get();

        $officersObi = $officers->filter(function ($item) {
            return $item['information_security'];
        })->sortBy('surname')
            ->mapWithKeys(function ($item) {
                return [$item['id'] => "{$item->militaryRank->name} {$item['surname']} {$item['name']} {$item['patronymic']}"];
            });

        $officersOzi = $officers->reject(function ($item) {
            return $item['information_security'];
        })->sortBy('surname')
            ->mapWithKeys(function ($item) {
                return [$item['id'] => "{$item->militaryRank->name} {$item['surname']} {$item['name']} {$item['patronymic']}"];
            });

        return view("departments.create", compact('department', 'officersObi', 'officersOzi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        $validated = $request->validated();

        $department = new Department();

        $department->fill($validated);
        $department->save();

        $officersObi = empty($request->input('officersObi')) ? [] : $request->input('officersObi');
        $officersOzi = empty($request->input('officersOzi')) ? [] : $request->input('officersOzi');

        $responsibles = [...$officersObi, ...$officersOzi];

        $department->officers()->attach($responsibles, ['order_id' => 1]);

        flash("Информация по управлению '{$department->name}' успешно сохранена")->success();

        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);

        return view("departments.show", compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);

        $officers = Officer::get();

        $officersObi = $officers->filter(function ($item) {
            return $item['information_security'];
        })->mapWithKeys(function ($item) {
            return [$item['id'] => "{$item->militaryRank->name} {$item['surname']} {$item['name']}  {$item['patronymic']}"];
        });

        $officersOzi = $officers->reject(function ($item) {
            return $item['information_security'];
        })->mapWithKeys(function ($item) {
            return [$item['id'] => "{$item->militaryRank->name} {$item['surname']} {$item['name']}  {$item['patronymic']}"];
        });

        return view('departments.edit', compact('department', 'officersObi', 'officersOzi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepartmentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDepartmentRequest $request, $id)
    {
        $validated = $request->validated();

        $department = Department::findOrFail($id);

        $department->fill($validated);
        $department->save();

        $officersObi = empty($request->input('officersObi')) ? [] : $request->input('officersObi');
        $officersOzi = empty($request->input('officersOzi')) ? [] : $request->input('officersOzi');

        $responsibles = [...$officersObi, ...$officersOzi];

        $department->officers()->detach();
        $department->officers()->attach($responsibles, ['order_id' => 1]);

        flash("Информация по управлению '$department->name' сохранена!")
            ->success();

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);

        if ($department) {
            $department->officers()->detach();
            $department->delete();
        }

        flash("Данные управления (отдела (отделения), службы) '$department->name' удалены!")->success();

        return redirect()->route('departments.index');
    }
}
