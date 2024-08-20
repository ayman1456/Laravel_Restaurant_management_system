@extends('layouts.backendApp')
@section('content')


<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col">
            <div class="title">
                <h2>Delivery man Approval List
                </h2>
            </div>


            <div class="card w-100">
                <div class="table-responsive">
                    <table class="table text-center">
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        @foreach ($approvalLists as $key=>$approveList)
                            
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $approveList->name }}</td>
                            <td width="30%">
                                <div class="btn-group">
                                    <a href="{{ route('employee.approval', [true,$approveList->id]) }}" class="btn btn-success btn-sm">Approve</a>
                                    <a href="{{ route('employee.approval', [0,$approveList->id]) }}" class="btn btn-danger btn-sm">Decline</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

           


        </div>
        <!-- end col -->

    </div>
    <!-- end row -->
</div>
<!-- ========== title-wrapper end ========== -->
@endsection