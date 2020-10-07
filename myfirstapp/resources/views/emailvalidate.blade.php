@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Email Validation</h1>
  <div>
    <form method="post" action="{{ route('emailvalidation.validateemail') }}">

          @csrf
          <div class="form-group">    
              <label for="first_name">Email Address:</label>
              <input type="text" class="form-control" name="email" /> 
          </div>
           <button type="submit" class="btn btn-primary-outline">Validate</button>
        </form>
     
  </div>
</div>
</div>
@endsection