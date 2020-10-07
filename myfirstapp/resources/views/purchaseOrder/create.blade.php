@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Email Validation</h1>
  <div>
     @if (session('message'))
    <div class="col-sm-12">
        <div class="alert @if (session('message.true') == 1) alert-success else alert-error @endif">
            {{ session('message.success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   
                </button>
        </div>
    </div>
@endif
    <form method="post" action="{{ route('purchaseOrder.store') }}">

          @csrf
          <div class="form-group">    
              <label for="first_name">Email Address:</label>
              <input type="email" required class="form-control" name="email" value="@if (session('message')) {{session('message.email')}} @endif" /> 
          </div>
           <button type="submit" class="btn btn-primary-outline">Validate</button>
        </form>
     
  </div>
</div>
</div>
@endsection