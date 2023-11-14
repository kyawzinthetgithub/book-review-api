<?php

namespace App\Http\Controllers;

use App\Models\reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewsController extends Controller
{
    public function review(Request $request){
        $findrating = reviews::where(['user_id'=>Auth::user()->id,'book_id'=>$request->bookId])->first();
        if ($findrating) {
            return back()->with(['error'=>'You already review!']);
        }else{
            $this->reviewValidation($request);
            reviews::create([
                'user_id' => Auth::user()->id,
                'book_id' => $request->bookId,
                'rating' => $request->rate,
                'review' => $request->review
            ]);
            return redirect()->back()->with(['success'=>'Review Success...']);
        }

    }

    // validate review
    private function reviewValidation($request){
        Validator::make($request->all(),[
            'rate' => 'required',
            'review' => 'required'
        ])->validate();
    }
}
