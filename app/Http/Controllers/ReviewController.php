<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Product;
use App\Models\UserReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( )
    {
        // return $product;
        return view('admin.review.list', [
            'reviews' => UserReview::all(),
        ]);
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

        return back()->with('success', 'Reviwed Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserReview $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserReview $review)
    {
        return view('admin.review.edit', [
            'review' => $review,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserReview $review)
    {
        // return $request;
        $user_id = session()->get("customerId");
        if ($request->status == 1) {

            if ($review->status == 0) {

                $review->update([
                    "status" => 1,
                ]);
            } else {
                $review->update([
                    "status" => 0,
                ]);
            }

            return back()->with('success', 'Status Change Successfully!');
        } else {
            $review->update([
                "user_id" => $user_id,
                "product_id" => $request->product_id,
                "rating" => $request->score,
                "title" => $request->title,
                "comment" => $request->comment,
            ]);
            return back()->with('success', 'Review Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserReview $review)
    {
        //
    }
}
