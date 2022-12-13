@extends('layouts.app')
@section('content')

<div class="container">

	 	@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
	
	 <form action="{{ URL::to('update-post/'.$post->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Post Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="{{ $post->title }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Author</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="author" value="{{ $post->author }}">
                </div>
                 <div class="mb-3">
                    <label for="tag" class="form-label">Tag</label>
                    <input type="text" class="form-control" id="tag" name="tag" value="{{ $post->tag }}">
                </div>
                 <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea type="text" class="form-control" id="description" name="description">{{ $post->description }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </div>
        </form>
</div>

@endsection