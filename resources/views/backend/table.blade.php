@extends('layouts.backendApp')
@section('content')
  

          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Tables
                  </h2>
                </div>
              </div>
              <!-- end col -->
             
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->


          <div class="container">

            <div class="row">
              <div class="col-lg-5 ">
                <div class="card-style">
                  <form action="{{ route('table.save', $editedTable->id ?? null) }}" method="POST">
                    @csrf
                      <div class="input-style-1 mb-2">
                        <input type="text" placeholder="Table Name" name="name" value="{{ $editedTable->name ?? null }}">
                        @error('name')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                          
                        @enderror
                      </div>

                      <button type="submit" class="main-btn active-btn-light square-btn btn-hover">Submit</button>
                  </form>
                </div>
              </div>
              <div class="col-lg-7 ">
                <div class="card-style">
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Action</th>
                      </tr>
                      @foreach ($tables as $key=>$table)
                        
                      

                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $table->name }}</td>
                        <td>
                          <a href="{{ route('table.edit', $table->id) }}" class="text-primary"><i class="lni lni-pencil"></i></a>
                          <a href="{{ route('table.delete', $table->id) }}" class="text-danger"><i class="lni lni-trash-can"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>

  @endsection