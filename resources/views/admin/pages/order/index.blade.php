@extends('admin.layouts.master')

@section('title') Order List @endsection
@section('css')
@endsection
@section('content')


    <main class="flex-shrink-0">
        <!-- Page Content-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder">Admin order overview dashboard</h1>
                    <!-- <a href="logout.html">Logout</a> -->
                </div>
                <div class="row gx-5">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Order Number</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Moving Date</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($order as $row)
                            <tr>
                            <th scope="row"><a href="{{route('admin.order.detail', ['id' => $row->id])}}">{{$row->order_id}}</a></th>
                            <td>{{date("m.d.Y", strtotime($row->created_at))}}</td>
                            <td>{{$row->date}}</td>
                            <td>{{$row->first_name}} {{$row->last_name}}</td>
                            <td>Payment completed</td>
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="5">There are no any data.</p>
                            </tr>
                            @endforelse  
                        </tbody>
                        </table>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('script')
@endsection
