@extends('layouts.app')
@section('content')
<div class="container">
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
 				<a href="" class="btn btn-sm btn-info">Edit</a>
 				<a href="" class="btn btn-sm btn-danger">Delete</a>
 			</td>
 		</tr>
 		@endforeach
	</table>
	
</div>
@endsection