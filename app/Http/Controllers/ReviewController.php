<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::orderBy('id', 'desc')->paginate(10);

        return response()->view('cms.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::with('user')->get();

        return response()->view('cms.review.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'client_id' => 'required',
            'rating' => 'required|integer|min:1|max:5'
        ], [
            'client_id.required' => 'This is required',
            'rating.required' => 'Rating is required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }

        Review::create([
            'client_id' => $request->client_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('reviews.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $reviews = Review::with('client.user')->findOrFail($id);
        return view('cms.review.show', compact('reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $reviews = Review::findOrFail($id);
        $clients = Client::with('user')->get();

        return view('cms.review.edit', compact('reviews', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator($request->all(), [
            'client_id' => 'required',
            'rating' => 'required|integer|min:1|max:5'
        ], [
            'client_id.required' => 'This is required',
            'rating.required' => 'Rating is required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {
            $reviews = Review::findOrFail($id);
            $reviews->client_id = $request->client_id;
            $reviews->rating = $request->get('rating');
            $reviews->comment = $request->get('comment');

            $isSaved = $reviews->save();
            return redirect()->route('reviews.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Review::findOrFail($id)->delete();

        return redirect()->route('reviews.index');
    }
}
