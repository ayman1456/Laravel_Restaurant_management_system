@extends('layouts.backendApp')
@section('content')
<div class="container">
    <div class="card text-white p-3">
        <form action="" method="GET">

            <div class="row align-items-end">
                <div class="col-lg-4">
                    <label for="from" class="d-block">
                        <h4>From </h4>
                        <input name="from" type="date" class="form-control">
                    </label>
                </div>
                <div class="col-lg-4">
                    <label for="from" class="d-block">
                        <h4>To </h4>
                        <input type="date" name="to" class="form-control">
                    </label>
                </div>
                <div class="col-lg-4">
                    <button class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr class="text-center">
                        <th></th>
                        <th>Transition Id</th>
                        <th>Table No</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Phone</th>
                        <th></th>
                    </tr>

                    @foreach ($orders as $key=>$order)
                    <tr class="text-center">
                        <td>{{ ++$key }}</td>
                        <td>{{ $order->transaction_id }}</td>
                        <td>{{ $order->table?->name }}</td>
                        <td class="text-start">
                            <p>Name: <b>{{ $order->name ?? "Walking Customer" }}</b></p>
                            <p>State: <b>{{ $order->state ?? null }}</b></p>
                            <p>zip: <b>{{ $order->zip ?? null }}</b></p>
                            <p>Address: <b>{{ $order->address ?? null }}</b>

                                @if ($order->address2)
                                <br>
                                <b>{{ $order->address2 }}</b>
                                @endif
                            </p>

                            <p>Status: <b
                                    class="badge bg-{{ $order->status == 'Complete' || $order->status == 'Processing'  || $order->status == null ? 'success'  : 'danger'  }}">{{
                                    $order->status ?? 'Complete' }}</b></p>
                        </td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>
                            <a href="{{ route('invoice.view',$order->id) }}"
                                class="btn btn-primary d-flex align-items-center justify-content-center">View <span
                                    class="ms-2"><i class="lni lni-eye"></i></span></a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</div>
@endsection