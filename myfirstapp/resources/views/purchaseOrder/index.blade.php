@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Purchase Order</h1>    
    @if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   
                </button>
        </div>
    </div>
@endif
     <a href="{{ route('purchaseOrder.create')}}" class="btn btn-primary">Create</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Mobile</td>
          <td>No.Of Items purchased</td>
          <td>Total</td>
          <td>GST</td>
          <td>Amount</td>
          <td colspan = 4>Actions</td>
        </tr>
    </thead>
    <tbody>
      
        @foreach($purchaseOrders as $purchaseOrder)
        <tr>
            <td>{{ 1 }}</td>
            <td>{{$purchaseOrder->first_name}} {{$purchaseOrder->last_name}}</td>
            <td>{{$purchaseOrder->email}}</td>
            <td>{{$purchaseOrder->mobile}}</td>
            <td>{{$purchaseOrder->items_purchased}}</td>
            <td>{{$purchaseOrder->total}}</td>
            <td>{{$purchaseOrder->gst}}</td>
            <td>{{$purchaseOrder->amount}}</td>
            <td>
                <a href="{{ route('purchaseOrder.edit',$purchaseOrder->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('purchaseOrder.destroy', $purchaseOrder->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection

