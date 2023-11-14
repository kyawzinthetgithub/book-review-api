@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <h1 class="text-center text-muted my-3">Book Review</h1>

        <div class="row">
            <div class="col">
                <p>Total Books = {{count($books)}} books</p>
            </div>
            <div class="col-1">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <input type="submit" class="btn btn-sm btn-secondary" value="logout">
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr class="text-center">
                    <th>User Name</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($books as $book)
                <tr class="text-center">
                    <td class="align-middle">{{$book->user_name}}</td>
                    <td class="align-middle">{{$book->book_name}}</td>
                    <td class="align-middle">{{$book->author}}</td>
                    <td class="align-middle"><a href="{{route('details',$book->id)}}" class="nav-link text-primary">Details</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        <div class="mt-3">{{$books->links()}}</div>
    </div>
@endsection
