@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger btn-sm" style="float: right;">Add New</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @php
                        $post=App\Models\Post::all();
                    @endphp
                    <table class="table table-striped">
                        <tr>
                            <th>#ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Tags</th>
                            <th>Action</th>
                        </tr>
                        @foreach($post as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->author }}</td>
                            <td>{{ $row->tag }}</td>
                            <td>
                                <a href="{{ URL::to('edit-post/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ URL::to('delete-post/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ URL::to('insert-post') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Post Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Author</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="author">
                </div>
                 <div class="mb-3">
                    <label for="tag" class="form-label">Tag</label>
                    <input type="text" class="form-control" id="tag" name="tag">
                </div>
                 <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea type="text" class="form-control" id="description" name="description"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="submit">submit</button>
            </div>
        </form>
    </div>
  </div>
</div>

@endsection
