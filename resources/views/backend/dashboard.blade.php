@extends('layouts.backendApp')
@section('content')


<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
  <div class="row align-items-center">
    <div class="col">
      <div class="title">
        <h2>Dashboard {{ auth()->user()->getRoleNames()->first() }}
        </h2>
      </div>

      <div class="row w-100">
        <div class="col-lg-4">
          <div class="card border-0 text-center py-3">
            <h3>{{ $revenew }} tk</h3>
            <p>Revenew</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card border-0 text-center py-3">
            <h3>{{ $categories }}</h3>
            <p>Categories</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card border-0 text-center py-3">
            <h3>{{ $tables }}</h3>
            <p>Tables</p>
          </div>
        </div>
        <div class="col-lg-6 my-3">
          <div class="card border-0 text-center py-3">
            <h3>{{ $food }} items</h3>
            <p>Foods</p>
          </div>
        </div>
        <div class="col-lg-6 my-3">
          <div class="card border-0 text-center py-3">
            <h3>{{ $employees }} person</h3>
            <p>Employee</p>
          </div>
        </div>
      </div>


    </div>
    <!-- end col -->

  </div>
  <!-- end row -->
</div>
<!-- ========== title-wrapper end ========== -->
@endsection