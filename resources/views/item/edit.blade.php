@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit items') }}
                    <a class="btn btn-info float-right" href="{{ route('item.index')}}"> Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('item.update', $item->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
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
                                    <label for="">item Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $item->name }}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="number" class="form-control" name="price" value="{{  $item->price }}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" value="{{ $item->quantity }}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Type</label>
                                    <input type="text" class="form-control" name="type" value="{{ $item->type }}" placeholder="">
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