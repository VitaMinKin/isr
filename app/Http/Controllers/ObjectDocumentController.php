<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ObjectDocumentRequest;
use App\Models\InformatizationObject;
use App\Models\DocumentName;

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

        dump($document);

        $document->save();

        return redirect()->route('objects.show', $informatizationObject);
    }
}
