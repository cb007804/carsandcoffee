@extends('layouts.app')
 
@section('content')
<div class="row">
    <div class="col-lg-11">
        <h2>Add New Item</h2>
    </div>
    <div class="col-lg-1">
        <a class="btn btn-warning" href="{{ url('item') }}"> Back</a>
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

<form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="item_name">Item Name:</label>
        <input type="text" class="form-control" id="item_name" placeholder="Item Name" name="item_name">
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" class="form-control" id="price" placeholder="Price" name="price">
    </div>
    <div class="form-group">
        <label for="image">Item Image:</label>
        <input type="file" class="form-control" id="image" placeholder="Item Image" name="image" accept="image/*">
    </div>
    <div class="form-group">
        <label for="note">Note:</label>
        <textarea class="form-control" id="note" name="note" rows="4" placeholder="note"></textarea>
    </div>

    <br />
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection