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
      <div class="card">
        <div class="card-body">
          <table class="table">
            <tr>
              <td>#</td>
              <td>image</td>
              <td>name</td>
              <td>price</td>
              <td>category</td>
              <td>quantity</td>
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
                <div class="btn-group">
                  <button data-id="#foodQuantity{{ $food->id }}" class="btn btn-sm btn-primary counter_btn"
                    data-type="dec">-</button>
                  <input type="text" size="2" value="1" class="form-control text-center">
                  <button data-id="#foodQuantity{{ $food->id }}" class="btn btn-sm btn-primary counter_btn"
                    data-type="inc">+</button>
                </div>
              </td>
              <td class="text-center">
                <a href="#" class="text-primary addFoodItems"><i class="lni lni-plus"></i></a>
                <form action="{{ route('pos.store') }}" method="get">
                  @csrf
                  <input type="hidden" value="{{ $food->id }}" name="food">
                  <input type="hidden" value="1" name="quantity" id="foodQuantity{{ $food->id }}">
                </form>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-4">

      <div class="card">
        <div class="card-header">
          orders
        </div>
        <form action="{{ route('pos.confirm.order') }}" method="POST">
          @csrf
          <div class="card-body">
            <select name="table" class="form-control">
              @foreach ($tables as $table)
              <option value="{{ $table->id }}">{{ $table->name }}</option>
              @endforeach
            </select>

            <hr>
            @php
            $total = 0;
            @endphp
            @foreach ($carts as $cart)
            <div class="foodItems my-3">
              <div class="row align-items-center">
                <div class="col-3">
                  <div class="position-relative">
                    <img src="{{ asset('storage/'. $cart->food->image) }}" alt="{{ $cart->food->title }}" width="100%"
                      class="rounded">
                    <a href="{{ route('pos.remove', $cart->id) }}">
                      <span style="top:-5px;left:-5px;position: absolute;cursor:pointer;" class="text-danger">
                        <i class="lni lni-cross-circle"></i>
                      </span>
                    </a>
                  </div>
                </div>
                <div class="col">
                  <h5>{{ $cart->food->title }}</h5>
                  <p>{{ $cart->qty }} * {{ $cart->food->price }}</p>
                </div>
                <div class="col text-end ">
                  <b>{{ $cart->food->price * $cart->qty}}
                    @php
                    $total += $cart->food->price * $cart->qty;
                    @endphp
                  </b>
                </div>
              </div>
            </div>

            @endforeach
            <input type="hidden" value="{{ $total }}" name="total_price">
            <input type="hidden" value="{{ $totalQty }}" name="qty">
            <hr>
            <h4>Total Price: <span class="float-end">{{ $total }} tk</span></h4>
            <div class="text-end mt-3"><button type="submit" class="btn btn-sm btn-success rounded-0 ">Confirm
                Order</button></div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

@push('customJs')
<script>
  $('.addFoodItems').click(function(e){
                e.preventDefault();
                $(this).next('form').submit()
              })

             $('.counter_btn').click(function(){
               let type = $(this).attr('data-type');
               let value = $(this).parent().children('input').val()
               
               if(type == 'inc'){
                let newVal = Number(value) + 1;
                $(this).parent().children('input').val(newVal)
                let qtyInput = $(this).attr('data-id')
                $(qtyInput).val(newVal)
              }else{
                
                if(value <= 1){
                 return false;
                }
                  let newVal = Number(value) - 1;
                  $(this).parent().children('input').val(newVal)
                  let qtyInput = $(this).attr('data-id')
                $(qtyInput).val(newVal)
               }
               console.log(type);
             })
</script>
@endpush
@endsection