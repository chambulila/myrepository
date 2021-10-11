@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Purchase') }}
                <a class="btn btn-info float-right" href="{{ route('purchase.index')}}"> Back</a>

                </div>
                <div class="card-body">
                    <form action="{{ route('purchase.store')}}" method="POST">
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
                                    <label for="">Item name</label>
                                    <input type="text" class="form-control" name="Item_name" value="{{old('Item_name')}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" class="form-control" name="Price" value="{{old('Price')}}" placeholder="">
                                </div>
                             
                                <div class="form-group">
                                    <label for="">Supplier name</label>
                                    <input type="text" class="form-control" name="Supplier_name" value="{{old('Supplier_name')}}" placeholder="">
                                </div>
                                   <div class="form-group">
                                    <label for="">Supplier contact</label>
                                    <input type="text" class="form-control" name="Supplier_contact" value="{{old('Supplier_contact')}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Other cost</label>
                                    <input type="text" class="form-control" name="other_Cost" value="{{old('other_Cost')}}" placeholder="">
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
</div>
@endsection