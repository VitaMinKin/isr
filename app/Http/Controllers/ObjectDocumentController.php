<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ObjectDocumentRequest;
use App\Models\InformatizationObject;
use App\Models\DocumentName;
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
     * Display the specified resource.
     *
     * @param  \App\Models\ObjectDocument  $document
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ObjectDocument $document)
    {
        $documentNames = DocumentName::pluck("title", "id");

        return view("documents.show", compact('document', 'documentNames'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($documentId)
    {
        $document = \App\Models\ObjectDocument::findOrFail($documentId);
        $documentNames = DocumentName::pluck('title', 'id');

        return view('documents.edit', compact('document', 'documentNames'));
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

        return Storage::download($document->file_path, $document->file_name);
    }
}
