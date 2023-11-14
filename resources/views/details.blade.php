@extends('layout.master')
@section('content')
    <div class="container">
        <h3 class="text-muted text-center my-3">Book Review</h3>
        <a href="{{ route('home') }}" class="btn btn-dark">back</a>
        @if (session('success'))
            <div class="row">
                <div class="col-6 offset-6">
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <small class="text-dark">{{ session('success') }}</small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th class="text-capitalize">uploaded user</th>
                                <td>{{ $book->user_name }}</td>
                            </tr>
                            <tr>
                                <th>Author Name</th>
                                <td>{{ $book->author }}</td>
                            </tr>
                            <tr>
                                <th>Book Name</th>
                                <td>{{ $book->book_name }}</td>
                            </tr>
                            <tr>
                                <th>Book Detail</th>
                                <td>{{ $book->description }}</td>
                            </tr>
                            <tr>
                                <th>Average Rating</th>
                                <td>{{round($avgrating,2)}} stars</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="shadow-sm rounded px-5 py-2">
                    <h5 class="text-center">User Review</h5>

                    @if ($findrating)
                        <h6>You Already review !</h6>
                    @else
                    <form action="{{ route('book#review') }}" method="post">
                        @csrf
                        <input type="hidden" name="bookId" value="{{ $book->id }}">
                        <div class="rate">

                            @error('rate')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <h5 class="text-muted">Write a review</h5>
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        <br style="clear:both;">
                        <div class="review-box mt-5">
                            <div class="form-group">
                                <label for="review" class="my-2">Your Review</label>
                                @error('review')
                                    <small class="text-danger d-block">{{ $message }}</small>
                                @enderror
                                <textarea name="review" id="review" cols="30" rows="3" class="form-control"
                                    placeholder="Enter Your Review"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mt-3">Submit</button>
                        </div>
                    </form>
                    @endif

                </div>
            </div>
        </div>
        <div class="row my-5">
            <h3>Total Review and Rating - {{$reviewAndRating->total()}}</h3>
            <div class="col-6 offset-3 mt-3">
                @foreach ($reviewAndRating as $reviews)
                <div class="card my-3">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex justify-content-between">
                                <h6>{{$reviews->user_name}}</h6>
                                <p>{{$reviews->rating}}/5 star</p>
                            </div>
                                <p>{{$reviews->review}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="">{{$reviewAndRating->links()}}</div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
    </script>
@endsection
