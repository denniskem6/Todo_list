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
	<p><h3>Edit Todo List Item</h3></p>

</div>
@forelse($items as $item)
<div class="container bg-light p-3" style="width: 500px">
	<form method="post" action="{{route('edit', ['item_id'=>$item->id])}}">
	@csrf
	<div class="row">
	<div class="col-10">
		<div class="form-group">   	
    		<input type="text" class="form-control @error('body') is-invalid @enderror" id="formGroupExampleInput" value="{{$item->body}}" name="body">
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
 
</div>
@empty
@endforelse

</body>
</html>