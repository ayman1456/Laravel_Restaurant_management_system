@extends('layouts.backendApp')
@section('content')
  

          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Pos
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
              <div class="col-lg-8">
                <table class="table">
                    <tr>
                        <td>#</td>
                        <td>image</td>
                        <td>name</td>
                        <td>price</td>
                        <td>category</td>
                        <td>action</td>
                    </tr>
                    

                    
                        @foreach ($food as $key=>$food)



                        <tr>
                          <td>{{ ++$key }}</td>
                          <td><img src="{{ asset('storage/'.$food->image) }}" alt="" style="height: 50px"></td>
                          <td class="text-center">{{ $food->title }}</td>
                          <td>{{ $food->price }}</td>
                          <td>
                            @foreach ($food->categories as $item)
            
                            <span class="badge bg-primary text-white m-2">
                              {{ $item->title }}
                            </span>
                            @endforeach
                          </td>
                          <td>
                            <a href="{{ route('food.edit', $food->id) }}" class="text-primary"><i class="lni lni-plus"></i></a>
                            
                          </td>
                        </tr>
                        @endforeach
                    
                    </table>
              </div>
              <div class="col-lg-4">
                
                <div class="card">
                    <div class="card-header">
                        orders
                    </div>
                    <div class="card-body">
                        <select id="cars" name="carlist" form="carform">
                            <option value="table1">table1</option>
                            <option value="table2">table2</option>
                            <option value="table3">table3</option>
                            <option value="box">box</option>
                          </select>
                    </div>
                </div>
              </div>
            </div>

          </div>

  @endsection