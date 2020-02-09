@extends('layouts.app')

@section('content')

     <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Products</h3>
            <div class="card">
            <div class="card-header">Products <a href="{{route('new-product')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i></a> </div>
                  <div class="card-body">
                    <div class="row">
                     @foreach ($products as $product)
                      <div class="col-md-4">
                        <div class="alert alert-primary">
                            <p>Products Name:{{$product->title}}</p>
                            <p>Category: {{ is_object($product->category) ? $product->category->name : ''}}</p>
                            <p>Product price: {{ $currency_code }}{{$product->price}}</p>
                                {!! ( count($product->images) > 0) ? '<img class="img-thumbnail card-img" src ="'.url($product->images[0]->url) . '">' : '' !!}
                            {{-- <img src="{{ ( count($product->images) > 0) ?  $product->images[0]->url : ''}} " alt="" class="img-thumbnail" > --}}

                        <a  class="btn btn-success mt-2" href="{{route('update-new-product' , ['id' => $product->id])}}">Update Product</a>

                        </div>
                    </div>   
                      @endforeach
                    </div>
                    {{$products->links()}}
                  </div>
                </div>
               </div>
            </div>
         </div>

@endsection