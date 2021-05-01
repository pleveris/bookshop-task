@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($errors->all() as $error)
                        {!! $errors->first() !!}
                    @endforeach
                    <div class="card-header">{{ __('Add a new book to bookshop') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
                                @csrf
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
                                    <input type="text" name="title" class="form-control" value="{{  old('title')  }}" placeholder="{{ __('Enter book title here...') }}" required >
                                </div>
                                <div class="form-group">
                                    <label for="author">{{ __('Author:') }} </label>
                                    @if ($errors->has('author'))
                                        <span class="text-danger">{{ $errors->first('author') }}</span>
                                    @endif
                                    <input type="text" name="author" class="form-control" value="{{  old('author')  }}" placeholder="{{ __('Enter author/-s (auth1,auth2,...)') }}" required >
                                </div>
                                <div class="form-group">
                                    <label for="genre">{{ __('Genre:') }} </label>
                                    @if ($errors->has('genre'))
                                    <span class="text-danger">{{ $errors->first('genre') }}</span>
                                    @endif
                                    <input type="text" name="genre" class="form-control" value="{{  old('genre')  }}" placeholder="{{ __('Enter genre/-s (gen1,gen2,...)') }}" required >
                                </div>
                                <div class="form-group">
                                    <label for="desc">{{ __('Description:') }}</label>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                    <textarea class="form-control" name="description" value="{{   old('description')   }}" required rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                    <label for="cover">{{ __('Book Cover:') }}</label>
                                    <input type="file" name="picture" class="form-control-file" >
                                </div>
                                <div class="form-group">
                                    @if ($errors->has('price'))
                                        <span class="text-danger">{{ $errors->first('picture') }}</span>
                                    @endif
                                    <label for="price">{{ __('Price:') }}</label>
                                    <input type="number" min="1" step="0.01" name="price"  class="form-control" value="{{  old('price')  }}" placeholder="{{ __('Enter a price of a book in euros') }}" required >
                                </div>

                                <button type="submit"  class="btn btn-primary btn-lg btn-block"> Send to checklist</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection