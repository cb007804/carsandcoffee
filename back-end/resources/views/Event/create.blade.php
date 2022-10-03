@extends('layouts.app')
 
@section('content')
<div class="row">
    <div class="col-lg-11">
        <h2>Add New Event</h2>
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

<form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="event_name">Event Name:</label>
        <input type="text" class="form-control" id="event_name" placeholder="Event Name" name="event_name">
    </div>
    <div class="form-group">
        <label for="image">Event Image:</label>
        <input type="file" class="form-control" id="image" placeholder="Item Image" name="image" accept="image/*">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" rows="4" placeholder="description"></textarea>
    </div>

    <br />
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection