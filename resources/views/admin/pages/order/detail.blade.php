@extends('admin.layouts.master')

@section('title') Order List @endsection
@section('css')
<link href="{{ URL::asset('/assets/admin/css/order.css') }}"  rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <main class="flex-shrink-0">
        <!-- Page Content-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder">Order {{$order->order_id}}</h1>
                    <a href="{{route('admin.order')}}">Back</a>
                </div>
                <div class="row gx-5">
                    <h4>Customer Details</h4>
                    <table class="table table-striped table-hover">
                      <tr>
                        <th>Company name:</th>
                        <td>{{$order->company}}</td>
                      </tr>
                      <tr>
                        <th>Name:</th>
                        <td>{{$order->first_name}} {{$order->last_name}}</td>
                      </tr>
                      <tr>
                        <th>Address:</th>
                        <td>{{$order->street}}</td>
                      </tr>
                      <tr>
                        <th>ZIP Code:</th>
                        <td>{{$order->zip_code}}</td>
                      </tr>
                      <tr>
                        <th>Mail:</th>
                        <td>{{$order->email}}</td>
                      </tr>
                      <tr>
                        <th>Phone:</th>
                        <td>{{$order->phone}}</td>
                      </tr>
                    </table>
                    <h4>No-Parking zone Details</h4>
                    <table class="table table-striped table-hover">
                      <tr>
                        <th>Moving Date:</th>
                        <td>{{$order->date}}</td>
                      </tr>
                      <tr>
                        <th>Duration:</th>
                        <td>2 days (+ 10,00 €)</td>
                      </tr>
                      <tr>
                        <th>Length:</th>
                        <td>10 Meters (+9,50 €)</td>
                      </tr>
                      <tr>
                        <th>Special instrucions:</th>
                        <td>
                          <ul>
                              @if($order->same_addres == 'on')
                              <li>There is an absolute parking ban in front of the property</li>
                              @endif
                              @if($order->same_parking == 'on')
                              <li>There are parking meters or parking ticket machines in front of the property</li>
                              @endif
                              @if($order->same_addres == 'on')
                              <li>In front of the property is a resident parking zone</li>
                              @endif
                          </ul>
                        </td>
                      </tr>
                    </table>
                    <h4>Payment Details</h4>
                    <table class="table table-striped table-hover">
                        <tr>
                          <th>Order Date:</th>
                          <td>{{date("m.d.Y", strtotime($order->created_at))}}</td>
                        </tr>
                        <tr>
                          <th>Payment Method:</th>
                          <td>{{$order->payment}}</td>
                        </tr>
                        <tr>
                          <th>Transaction reference:</th>
                          <td>{{$order->transaction_id}}</td>
                        </tr>
                        <tr>
                            <th>Order status:</th>
                            <td>Payment completed</td>
                        </tr>
                    </table>
                    <h4>Update order status</h4>
                    <form action="{{route('admin.order.update')}}" method="post">
                      @csrf
                      <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id" value="{{$order->id}}">
                            <select class="form-select" name="payment_status" required>
                              <option value="">Choose...</option>
                              <option value="Payment completed">Payment completed</option>
                              <option value="Permission granted">Permission granted</option>
                              <option value="Order fullfilled">Order fullfilled</option>
                              <option value="Refunded">Refunded</option>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Update status</button>
                          </div> 
                      </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('script')
@endsection
