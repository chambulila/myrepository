@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="div class-row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add item') }}
                    <a class="btn btn-info float-right" href="{{ route('item.index')}}"> Back</a>
                </div>
        
                <div class="card-body">
                    <form action="{{ route('item.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                               
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br />
                                @endif

                                @if (session()->has('success'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <strong>{{session('success')}}</strong> 
                                </div>
                                @endif
                                
                                <div class="form-group">
                                    <label for="">Item Name</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Buying price</label>
                                    <input type="text" class="form-control" name="buy_price" value="{{old('buy_price')}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Selling price</label>
                                    <input type="number" class="form-control" name="price" value="{{old('price')}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Quanity</label>
                                    <input type="number" class="form-control" name="quantity" value="{{old('quantity')}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <input type="text" class="form-control" name="description" value="{{old('description')}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Re-order level</label>
                                    <input type="text" class="form-control" name="reorder" value="{{old('reorder')}}" placeholder="">
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
               </div>
          </div>
        </div>    
    </div>

@endsection