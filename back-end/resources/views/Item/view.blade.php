@extends('layouts.app')
 
@section('content')
<a type="button"  href="{{ route('item.create') }}" class="btn btn-success">Create Item</a>
<br><br><br>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br> 

    <div class="row">
        @foreach ($items as $item)
        <div class="col-4 mt-5">
            <div class="card ">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                  <img src="{{ $item->image_url }}" class="img-fluid w-100 " style="height: 150px" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ $item->item_name }}</h5>
                  <p class="card-text">{{ $item->price }} </p>
                  
                  <form action="{{ route('item.destroy',$item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </div>
              </div>
        </div>
        @endforeach
        
        
    </div>
@endsection