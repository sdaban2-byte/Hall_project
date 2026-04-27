<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sliders = Slider::orderBy('id', 'desc')->paginate(10);

        return response()->view('cms.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('cms.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator($request->all(), [
            'title' => 'required',
            'image' => 'required'

        ], [
            'title.required' => 'title is required',
            'image.required' => 'image is required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {
            $sliders = new Slider();
            $sliders->title = $request->get('title');
            $sliders->description = $request->get('description');

            if (request()->hasFile('image')) {

                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/slider', $imageName);
                $sliders->image = $imageName;
            }
            $isSaved = $sliders->save();
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
        $sliders = Slider::findOrFail($id);
        return response()->view('cms.slider.show', compact('sliders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $sliders = Slider::findOrFail($id);
        return response()->view('cms.slider.edit', compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator($request->all(), [
            'title' => 'required',
            'image' => 'required'

        ], [
            'title.required' => 'title is required',
            'image.required' => 'image is required',
        ]);

        if (! $validator->fails()) {
            $sliders = Slider::findOrFail($id);
            $sliders->title = $request->get('title');
            $sliders->description = $request->get('description');

            if (request()->hasFile('image')) {

                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/slider', $imageName);
                $sliders->image = $imageName;
            }
            $isUpdated = $sliders->save();
            return response()->json([
                'icon' => 'success',
                'title' => 'Updated is Successfully',
            ], 200);

            return ['redirect' => route('sliders.index')];
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
        Slider::findOrFail($id)->delete();

        return redirect()->route('sliders.index');
    }
}
