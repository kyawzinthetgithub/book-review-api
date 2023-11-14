<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    //direct home page
    public function homePage(){
        $books = Books::select('books.*','users.name as user_name')->join('users','users.id','books.user_id')->paginate(10);
        return view('home',compact('books'));
    }

    // goto book details page
    public function details($id){
        $findrating = reviews::where(['user_id'=>Auth::user()->id,'book_id'=>$id])->get()->last();
        $avgrating = reviews::where('book_id',$id)->avg('rating');
        $reviewAndRating = reviews::select('reviews.*','users.name as user_name')->where('reviews.book_id',$id)->leftJoin('users','reviews.user_id','users.id')->paginate(6);
        $book = Books::select('books.*','users.name as user_name')->where('books.id',$id)->join('users','users.id','books.user_id')->first();
        return view('details',compact('book','avgrating','reviewAndRating','findrating'));
    }
}
