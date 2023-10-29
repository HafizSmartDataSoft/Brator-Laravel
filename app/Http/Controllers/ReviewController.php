<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\UserReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'score' => 'required',
        ]);
        $user_id = session()->get("customerId");
        // return $request;
        $rewiew = UserReview::create([
            "user_id" => $user_id,
            "product_id" => $request->product_id,
            "rating" => $request->score,
            "title" => $request->title,
            "comment" => $request->comment,
        ]);

        return back()->with('success','Reviwed Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(UserReview $userReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserReview $userReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserReview $userReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserReview $userReview)
    {
        //
    }
}
