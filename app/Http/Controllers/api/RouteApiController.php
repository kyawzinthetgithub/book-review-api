<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\Books;
use App\Models\reviews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RouteApiController extends Controller
{
    // get all book
    public function getallbooks(){
        $books = Books::select('books.*','users.name as user_name')->join('users','users.id','books.user_id')->get();
        return $books;
    }

    //get all review
    public function getallreviews(){
        $reviews = reviews::select('reviews.*','users.name as user_name','books.book_name')->leftJoin('users','reviews.user_id','users.id')->leftJoin('books','reviews.book_id','books.id')->get();
        return $reviews;
    }

    //get all user
    public function getallusers(){
        $users = User::all();
        return $users;
    }
}
