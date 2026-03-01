<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\Shipment;
use App\Models\ShipmentDocument;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ShipmentController extends Controller
{

    use ImageUpload;

    public function index()
    {
        //
    }

    public function create()
    {
        return view('shipments.create');
    }

    public function store(StoreShipmentRequest $request)
    {

        $shipment = Shipment::create($request->validated());

        $allowedImageMimes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
        $allowedDocMimes   = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

        foreach ($request->file('documents') as $document) {
            $mime = $document->getMimeType();

            if (in_array($mime, $allowedImageMimes)) {

               $name = $this->uploadImage($document, 'documents/' . $shipment->id);

               $path = $shipment->id . '/' . $name ;

               ShipmentDocument::create([
                    'shipment_id'  => $shipment->id,
                    'path'         => $path,
                    'original_name' => $document->getClientOriginalName(),
                    'mime_type'    => $document->getMimeType(),
                    'size'         => $document->getSize(),
                ]);


            } elseif (in_array($mime, $allowedDocMimes)) {

                $extension = $document->getClientOriginalExtension();
                $filename = uniqid() . '.' . $extension;

                $path = $document->storeAs('documents/' . $shipment->id, $filename, 'public');
                $path = str_replace('documents/', '', $path);

                ShipmentDocument::create([
                    'shipment_id'  => $shipment->id,
                    'path'         => $path,
                    'original_name' => $document->getClientOriginalName(),
                    'mime_type'    => $document->getMimeType(),
                    'size'         => $document->getSize(),
                ]);
            } else {
                echo 'unsupported';
            }
        }


        Cache::forget('unassignedShipments');

        return back()->with('success', 'Successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment)
    {

        $shipment_documents = $shipment->documents()->get();
        return view('shipments.show', compact('shipment', 'shipment_documents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipment)
    {
        $shipment_documents = $shipment->documents()->get();
        return view('shipments.edit', compact('shipment', 'shipment_documents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        $shipment->update($request->validated());
        Cache::forget('unassignedShipments');
        
        return redirect()->back()->with('success', 'Shipment has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipment)
    {
        //
    }
}
