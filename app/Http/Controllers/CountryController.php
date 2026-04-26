<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::withCount('cities')->orderBy('id', 'desc')->paginate(10);

        return response()->view('cms.country.index',compact('countries'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return response()->view('cms.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

    $validator = Validator($request->all(),[
        'country_name' => 'required',
        'code' => 'required'

    ] , [
        'country_name.required' => 'This is required',
        'code.required' => 'This is required',
    ]);
    if( $validator->fails()){
        return response()->json([
            'icon' => 'error' ,
            'title' => $validator->getMessageBag()->first(),
        ] , 400);
    }

    else{
       $countries = new Country();
        $countries->country_name = $request->get('country_name');
        $countries->code = $request->get('code');

        $isSaved = $countries->save();
       return response()->json([
            'icon' => 'success' ,
            'title' => 'Crearted is Successfully',
        ] , 200);


    }

    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $countries = Country::findOrFail($id);
         return response()->view('cms.country.show',compact('countries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $countries = Country::findOrFail($id);
         return response()->view('cms.country.edit',compact('countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
        'country_name' => 'required',
        'code' => 'required'

    ] , [
        'country_name.required' => 'This is required',
        'code.required' => 'This is required',
    ]);
    
    if(! $validator->fails()){
        $countries = Country::findOrFail($id);
        $countries->country_name = $request->get('country_name');
        $countries->code = $request->get('code');

        $isUpdated = $countries->save();
         return response()->json([
            'icon' => 'success' ,
            'title' => 'Updated is Successfully',
        ] , 200);
        
        return ['redirect'=> route('countries.index')];
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
   public function destroy($id)
{
    $country = Country::findOrFail($id);
    $isDeleted = $country->delete();

    if ($isDeleted) {
        return response()->json(['message' => 'Deleted successfully'], 200);
    } else {
        return response()->json(['message' => 'Failed to delete'], 400);
    }
}
}