@extends('layouts.app')
 
@section('content')
<div class="row">
    <div class="col-lg-11">
        <h2>Add New Image to Gallary</h2>
    </div>
    <div class="col-lg-1">
        <a class="btn btn-warning" href="{{ url('gallary') }}"> Back</a>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('gallary.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="image_namee">Heading Name:</label>
        <input type="text" class="form-control" id="image_name" placeholder="Heading Name" name="image_name">
    </div>
    <div class="form-group">
        <label for="image">Select Image:</label>
        <input type="file" class="form-control" id="image" placeholder="Item Image" name="image" accept="image/*">
    </div>

    <br />
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection