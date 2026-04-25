<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $cities = City::with('country')->orderBy('id','desc')->paginate(10);

        return response()->view('cms.city.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
  public function create()
{
    $countries = Country::all();

    return view('cms.city.create', compact('countries'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
        'city_name' => 'required',
        'street' => 'required',
        'country_id' => 'required|exists:countries,id'

    ] , [
        'city_name.required' => 'city_name is required',
        'street.required' => 'street is required',
        'country_id.required' => 'country_id is required',
    ]);

    if( $validator->fails()){
        return response()->json([+
            'icon' => 'error' ,
            'title' => $validator->getMessageBag()->first(),
        ] , 400);
    }

    else{
       $cities = new City();
        $cities->city_name = $request->get('city_name');
        $cities->street = $request->get('street');
       $cities->country_id = $request->get('country_id');

        $isSaved = $cities->save();
       return response()->json([
            'icon' => 'success' ,
            'title' => 'Crearted is Successfully',
        ] , 200);


    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cities = City::findOrFail($id);
         return response()->view('cms.city.show',compact('cities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {     $countries = Country::all();
         $cities = City::findOrFail($id);
         return response()->view('cms.city.edit',compact('cities','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validator = Validator($request->all(),[
        'city_name' => 'required',
        'street' => 'required'

    ] , [
        'city_name.required' => 'This is required',
        'street.required' => 'This is required',
    ]);

    if(! $validator->fails()){
        $cities = City::findOrFail($id);
        $cities->city_name = $request->get('city_name');
        $cities->street = $request->get('street');

        $isUpdated = $cities->save();
         return response()->json([
            'icon' => 'success' ,
            'title' => 'Updated is Successfully',
        ] , 200);

        return ['redirect'=> route('cities.index')];
    }

    else{


 return response()->json([
            'icon' => 'error' ,
            'title' => $validator->getMessageBag()->first(),
        ] , 400);


    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::findOrFail($id);
    $isDeleted = $city->delete();

    if ($isDeleted) {
        return response()->json(['message' => 'Deleted successfully'], 200);
    } else {
        return response()->json(['message' => 'Failed to delete'], 400);
    }
    }
}
