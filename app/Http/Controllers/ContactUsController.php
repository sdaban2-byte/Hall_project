<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $contactUs = ContactUs::orderBy('id', 'desc')->paginate(10);

        return response()->view('cms.contactUs.index', compact('contactUs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('cms.contactUs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator($request->all(), [
            'name' => 'required',
            'email' => 'required'

        ], [
            'name.required' => 'title is required',
            'email.required' => 'image is required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {
            $contactUs = new ContactUs();
            $contactUs->name = $request->get('name');
            $contactUs->email = $request->get('email');
            $contactUs->massege = $request->get('massege');


            $isSaved = $contactUs->save();
            return response()->json([
                'icon' => 'success',
                'title' => 'Crearted is Successfully',
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $contactUs = ContactUs::findOrFail($id);
        return response()->view('cms.contactUs.show', compact('contactUs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $contactUs = ContactUs::findOrFail($id);
        return response()->view('cms.contactUs.edit', compact('contactUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator($request->all(), [
            'name' => 'required',
            'email' => 'required'

        ], [
            'name.required' => 'title is required',
            'email.required' => 'image is required',
        ]);

        if (! $validator->fails()) {
            $contactUs = ContactUs::findOrFail($id);
            $contactUs->name = $request->get('name');
            $contactUs->email = $request->get('email');
            $contactUs->massege = $request->get('massege');


            $isUpdated = $contactUs->save();
            return response()->json([
                'icon' => 'success',
                'title' => 'Updated is Successfully',
            ], 200);

            return ['redirect' => route('contactUs.index')];
        } else {


            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //  $country = Country::findOrFail($id);
        ContactUs::findOrFail($id)->delete();
        return response()->json([
            'icon' => 'success',
            'title' => 'Deleted successfully'
        ]);
    }
}
