<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{config('app.name')}}</title>
<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.css')}}">
</head>
<body>
<div class="container bg-light" style="width: 500px">
	<p><h3>My Todo List Web App</h3></p>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success</strong> {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
</div>
<div class="container bg-light p-3" style="width: 500px">
	<form method="post" action="{{route('todo_list')}}">
	@csrf
	<div class="row">
	<div class="col-10">
		<div class="form-group">   	
    		<input type="text" class="form-control @error('body') is-invalid @enderror" id="formGroupExampleInput" placeholder="Enter your todo list item" name="body">
    	@error('body')
		<div class="invalid-feedback">{{ $message }}</div>
		@enderror
	  	</div>		
	</div>
	<div class="col-2">
		 <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	</div>
				
	</div>
	
  	</form><br>

  @forelse($todo_items as $todo_item)
  <div class="row">
	<div class="col-8">
		<ul class="list-group">
		  <li class="list-group-item disabled">{{$todo_item->body}}</li>
		</ul>
	</div>
	<div class="col-2">
		 <a href="{{route('edit', ['item_id'=>$todo_item->id])}}" class="btn btn-primary btn-sm" role="button" data-bs-toggle="button">Edit</a>
	</div>
	<div class="col-2">
	<form action="{{route('delete_item', ['item_id'=>$todo_item->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm mt-2 toggle-comments mb-2">Delete</button>
    </form>
	</div>
</div><br>
  @empty
  <div class= text-success role = 'alert'>No todo items already refresh later</div>
  @endforelse




</div>
</body>
</html>