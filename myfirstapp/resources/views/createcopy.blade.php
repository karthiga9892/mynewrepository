@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a Purchase Order</h1>
  <div>
    
      <form method="post" action="{{ route('purchaseOrder.store') }}">

          @csrf
          <div class="form-group">    
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"/>
              @if ($errors->has('first_name')) <p class="help-block">{{ $errors->first('first_name') }}</p> @endif
          </div>

          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"/>
              @if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email" value="{{ old('email') }}"/>
              @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
          </div>
          <div class="form-group">
              <label for="city">Mobile:</label>
              <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}"/>
              @if ($errors->has('mobile')) <p class="help-block">{{ $errors->first('mobile') }}</p> @endif
          </div>
          <div class="form-group">
              <label for="country">No.Of Items Purchased:</label>
              <input type="text" class="form-control" name="items_purchased" value="{{ old('items_purchased') }}"/>
              @if ($errors->has('items_purchased')) <p class="help-block">{{ $errors->first('items_purchased') }}</p> @endif
          </div>
          <div class="form-group">
              <label for="country">Total:</label>
              <input type="text" class="form-control" name="total" value="{{ old('total') }}"/>
              @if ($errors->has('total')) <p class="help-block">{{ $errors->first('total') }}</p> @endif
          </div>
          <div class="form-group">
              <label for="job_title">GST:</label>
              <input type="text" class="form-control" name="gst" value="{{ old('gst') }}"/>
              @if ($errors->has('gst')) <p class="help-block">{{ $errors->first('gst') }}</p> @endif
          </div>         
          <div class="form-group">
              <label for="job_title">Amount:</label>
              <input type="text" class="form-control" name="amount" value="{{ old('amount') }}"/>
              @if ($errors->has('amount')) <p class="help-block">{{ $errors->first('amount') }}</p> @endif
          </div>                     
          <button type="submit" class="btn btn-primary-outline">Add Purchase Order</button>
          <a href="{{ route('purchaseOrder.index')}}" class="btn btn-primary">Cancel</a>
      </form>
  </div>
</div>
</div>
@endsection