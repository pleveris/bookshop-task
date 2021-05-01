@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header">{{ __('Edit Book Details page') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.book.update', $book) }}" enctype="multipart/form-data">
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
                                    <input type="text" name="title" class="form-control" value="{{  $book->title  }}" placeholder="{{ __('Enter book title here...') }}" required >
                                </div>
                                <div class="form-group">
                                    <label for="author">{{ __('Author:') }} </label>
                                    @if ($errors->has('author'))
                                        <span class="text-danger">{{ $errors->first('author') }}</span>
                                    @endif
                                    <input type="text" name="author" class="form-control" value="{{  $book->authors  }}" placeholder="{{ __('Enter author/-s (auth1,auth2,...)...') }}" required >
                                </div>
                                <div class="form-group">
                                    <label for="genre">{{ __('Genre:') }} </label>
                                    @if ($errors->has('genre'))
                                    <span class="text-danger">{{ $errors->first('genre') }}</span>
                                    @endif
                                    <input type="text" name="genre" class="form-control"  value="{{  $book->genres  }}" placeholder="{{ __('Enter genre/-s here (gen1,gen2,...)...') }}" required >
                                </div>
                                <div class="form-group">
                                    <label for="desc">{{ __('Description:') }}</label>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                    <textarea id="myTextarea" class="form-control" name="description"  required rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('picture') }}</span>
                                    @endif
                                    <label for="cover">{{ __('Book cover:') }}</label>
                                    <input type="file" name="picture" value="{{ asset( $book->picture) }}" class="form-control-file" >
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('discount'))
                                        <span class="text-danger">{{ $errors->first('discount') }}</span>
                                    @endif
                                    <label for="dis">{{ __('Enter discount (%):') }}</label>
                                    <input type="number" min="0" max="100" name="discount" value="{{  $book->discount}}" class="form-control" >
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('price'))
                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    @endif
                                    <label for="price">{{ __('Price:') }}</label>
                                    <input type="number" min="0.10" step="0.10" name="price"  class="form-control" value="{{   $book->price   }}" placeholder="{{ __('Actual price of a book in euros') }}" required >
                                </div>

                                <button type="submit"  class="btn btn-primary btn-lg btn-block"> Add to checklist</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection