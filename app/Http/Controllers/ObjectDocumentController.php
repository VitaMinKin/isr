<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ObjectDocumentRequest;
use App\Models\InformatizationObject;
use App\Models\DocumentName;
use App\Models\ObjectDocument;
use Illuminate\Support\Facades\Storage;

class ObjectDocumentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $informatizationObject = InformatizationObject::findOrFail($request->object);

        $documentNames = DocumentName::pluck('title', 'id');

        return view('objectDocuments.create', compact('informatizationObject', 'documentNames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ObjectDocumentRequest $request)
    {
        $validated = $request->validated();

        $informatizationObject = InformatizationObject::findOrFail($request->input('informatization_object_id'));
        $document = $informatizationObject->documents()->make($validated);

        if ($request->hasFile('documentFile')) {
            $pathToFile = Storage::putFile('public/objectDocuments', $request->file('documentFile'), 'public');
            $document->file_path = $pathToFile;
            $document->file_name = $request->file('documentFile')->getClientOriginalName();
        }

        $document->save();

        return redirect()->route('objects.show', $informatizationObject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ObjectDocumentRequest $request, $documentId)
    {
        $validated = $request->validated();
        $document = ObjectDocument::findOrFail($documentId);

        if ($request->hasFile('documentFile')) {
            $pathToFile = Storage::putFile('public/objectDocuments', $request->file('documentFile'), 'public');
            Storage::delete($document->file_path);
            $document->file_path = $pathToFile;
            $document->file_name = $request->file('documentFile')->getClientOriginalName();
        }

        $document->fill($validated);

        $document->save();

        flash("Информация по документу {$document->documentName->title} обновлена!")->success();

        return redirect()->route('objects.show', $document->informatizationObject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($documentId)
    {
        $objectDocument = \App\Models\ObjectDocument::findOrFail($documentId);
        $documentNames = DocumentName::pluck('title', 'id');

        return view('objectDocuments.edit', compact('objectDocument', 'documentNames'));
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObjectDocument $document
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = \App\Models\ObjectDocument::findOrFail($id);
        if ($document) {
            Storage::delete($document->file_path);
            $document->delete();
        }
        
        flash("Документ '{$document->documentName->title}' удален!")->success();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function download($documentId) {
        $document = \App\Models\ObjectDocument::findOrFail($documentId);

        if (!($document->file_path && Storage::exists($document->file_path)))
        {
            flash("Файл '{$document->file_name}' не найден на сервере!")->error();
            return redirect()->back();
        }

        return Storage::download($document->file_path, $document->file_name);
    }

    public function fileDelete($documentId)
    {
        $document = \App\Models\ObjectDocument::findOrFail($documentId);

        if (!($document->file_path && Storage::exists($document->file_path)))
        {
            flash("Файл '{$document->file_name}' не найден на сервере!")->error();
            return redirect()->back();
        }

        Storage::delete($document->file_path);
        $document->file_path = null;
        $document->file_name = null;
        $document->save();
        flash("Файл '{$document->file_name}' удален!")->success();
        return redirect()->back();
    }
}
