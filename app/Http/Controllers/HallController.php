<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Hall;
use App\Models\HallOwner;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $halls = Hall::with('hall_owner.user')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('cms.hall.index', compact('halls'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        // $hall_owners = HallOwner::all();
        $hall_owners = HallOwner::with('user')->get();
        return response()->view('cms.hall.create', compact('hall_owners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator($request->all(), [
            'hall_owner_id' => 'required|exists:hall_owners,id',
            'name' => 'required|string',
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }

        $hall = new Hall();

        $hall->hall_owner_id = $request->hall_owner_id;
        $hall->name = $request->name;
        $hall->capacity = $request->capacity;
        $hall->price = $request->price;
        $hall->location = $request->location;
        $hall->description = $request->description;

        // ✅ image fix
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/halls', $imageName);
            $hall->image = $imageName;
        }



        $hall->save();

        return response()->json([
            'icon' => 'success',
            'title' => 'Created Successfully',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // $hall_owner_id = HallOwner::all();
        // $halls = Hall::findOrFail($id);

        $halls = Hall::with('hall_owner.user')->findOrFail($id);

        return view('cms.hall.show', compact('halls'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $halls = Hall::findOrFail($id);
        $hall_owners = HallOwner::with('user')->get();
        return view('cms.hall.edit', compact('halls', 'hall_owners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator($request->all(), [
            'hall_owner_id' => 'required|exists:hall_owners,id',
            'name' => 'required|string',
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $hall = Hall::findOrFail($id);

        $hall->update([
            'hall_owner_id' => $request->hall_owner_id,
            'name' => $request->name,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        return redirect()->route('halls.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $halls = Hall::destroy($id);
    }
}
