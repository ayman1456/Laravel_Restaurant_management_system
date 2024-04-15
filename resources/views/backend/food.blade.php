@extends('layouts.backendApp')
@section('content')
  

          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Food
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
                  <form action="{{ route('food.save', $editedFood->id ?? null) }}" method="POST">
                    @csrf
                      <div class="input-style-1 mb-2">
                        <input type="text" placeholder="Food Name" name="title" value="{{ $editedFood->title ?? null }}">
                        @error('title')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                          
                        @enderror
                        
                      </div>

                      <div class="input-style-1 mb-2">
                      <input type="number" placeholder="Food Price" name="price" value="{{ $editedFood->price ?? null }}">
                        @error('price')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                          
                        @enderror
                    </div>
                    <div class="input-style-1 mb-2">
                        <input type="file" placeholder="Food Price" name="image" value="">
                          @error('image')
                          <span class="text-danger">
                            {{ $message }}
                          </span>
                            
                          @enderror
                      </div>
                      <div class="input-style-1 mb-2">
                        <textarea placeholder="Details" name="detail" >{{ $editedFood->detail ?? null }}</textarea>

                          @error('detail')
                          <span class="text-danger">
                            {{ $message }}
                          </span>
                            
                          @enderror
                      </div>

                      <button type="submit" class="main-btn active-btn-light square-btn btn-hover">Submit</button>
                  </form>
                </div>
              </div>

              <!--right side stars-->
           
              <div class="col-lg-7 ">
                <div class="card-style">
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>details</th>
                        <th>Action</th>
                      </tr>
                      @foreach ($food as $key=>$food)
                        
                      

                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $food->title }}</td>
                        <td>{{ $food->image }}</td>
                        <td>{{ $food->price }}</td>
                        <td>{{ $food->detail }}</td>
                        <td>
                          <a href="{{ route('food.edit', $food->id) }}" class="text-primary"><i class="lni lni-pencil"></i></a>
                          <a href="{{ route('food.delete', $food->id) }}" class="text-danger"><i class="lni lni-trash-can"></i></a>
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