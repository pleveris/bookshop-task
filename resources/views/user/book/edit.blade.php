@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header">{{ __('Edit book details') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('book.update', $book) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="title">{{ __('Title:') }} </label>
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                    <input type="text" name="title" class="form-control" value="{{  $book->title  }}" placeholder="{{ __('Enter title of a book here...') }}" required >
                                </div>
                                <div class="form-group">
                                    <label for="author">{{ __('Author:') }} </label>
                                    @if ($errors->has('author'))
                                        <span class="text-danger">{{ $errors->first('author') }}</span>
                                    @endif
                                    <input type="text" name="author" class="form-control" value="{{  $book->authors  }}" placeholder="{{ __('Enter author/-s (auth1,auth2,...)') }}" required >
                                </div>
                                <div class="form-group">
                                    <label for="genre">{{ __('genre:') }} </label>
                                    @if ($errors->has('genre'))
                                    <span class="text-danger">{{ $errors->first('genre') }}</span>
                                    @endif
                                    <input type="text" name="genre" class="form-control"  value="{{  $book->genres  }}" placeholder="{{ __('Enter genre/-s (gen1,gen2,...)') }}" required >
                                </div>
                                <div class="form-group">
                                    <label for="desc">{{ __('Description:') }}</label>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                    <textarea id="myTextarea" class="form-control" name="description"  required rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                    <label for="cover">{{ __('Book Cover:') }}</label>
                                    <input type="file" name="picture" value="{{ asset( $book->picture) }}" class="form-control-file" >
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('picture'))
                                        <span class="text-danger">{{ $errors->first('picture') }}</span>
                                    @endif
                                    <label for="price">{{ __('Price:') }}</label>
                                    <input type="number" min="0.10" step="0.10" name="price"  class="form-control" value="{{   $book->price   }}" placeholder="{{ __('Enter a price of a book in euros') }}" required >
                                </div>

                                <button type="submit"  class="btn btn-primary btn-lg btn-block"> Send to check</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection