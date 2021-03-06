@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <h3>My books:</h3>
</div>
@if($books->count() < 1)
<div class="row justify-content-center">
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Ouch, sorry... You haven't entered any book here!</h4>
    </div>
  </div>
@endif
@if(session()->has('message'))
<div class="row justify-content-center">
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
</div>
@endif
@foreach ($books->chunk(5) as $chunk)
    <div class="row justify-content-center">
        @foreach ($chunk as $book)
            <div class="card" style="width: 12rem; margin: 5px;">
            <img src="{{ asset( $book->picture) }}" style="width:100%; height:350px;" class="card-img-top" alt="cover">
            <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <h5 class="card-title">
                    @foreach ($book->authors as $author)
                        {{ $author->author . ' ' }}
                    @endforeach
                </h5>
                <h4 class="card-title"> {{ $book->price }} 	&euro;</h4>
                <h4 class="card-title"> Status:@if($book->approved) Confirmed @else Cancel @endif </h4>
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('book.edit', [ $book ]) }}" class="btn btn-sm btn-primary">Edit book details</a>             
                    </div>
                    <div class="col-6">
                        <a  class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">Delete book(TBD, admin) </a>
                    </div>
                </div>
            </div>
            <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eid">Remove book from bookshop</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('book.destroy', $book) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <h5 class="text-center">Are you sure you want to completely remove this book from bookshop? This action cannot be undone! </h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No, go back</button>
                            <button type="submit" class="btn btn-sm btn-danger">Yes, remove it!</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div >
@endforeach
<div class="row justify-content-center">
    {{ $books->links() }}
</div>

@endsection