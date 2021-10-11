@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">


            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <div class="icon">
                            <i class="fas fa-coins"></i>
                        </div>
                        <h1>{{ \App\Saledetail::sum('amount') }}</h1>
                        <b>Total sales</b><br>
                    </div>
               
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class=" small-box" style="background-color: rgb(104, 174, 214)">
                    <div class="inner">
                        <h1>{{ $purchasesCount }}</h1>
                        <b><a href="{{ route('purchase.index') }}"><h6 style="color: rgb(49, 41, 41)">Total Purchases</h6></a></b>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-check"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class=" small-box" style="background-color: rgb(177, 123, 8)">
                    <div class="inner">
                       <h1>{{ $idadi }}</h1>
                        <b><a href="{{ route('recentAddedItem') }}" class="added"> <h6 style="color: rgb(22, 20, 20)">Recently +items</h6> </a></b>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dolly"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class=" small-box bg-warning">
                    <div class="inner">
                        <h1>{{ $notifyCount }}</h1>
                        <b><a href="#"><h6 style="color: rgb(70, 60, 60)" data-toggle="modal" data-target="#modelId"><!-- Button trigger modal -->
                         Notifications
                        
                        <!-- Modal -->
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-warning">Stock alert</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        The items are running low, please re-stock.<br><br>
                                        @foreach ($notify as $item)
                                        <strong class="text-danger">The remaining {{ $item->name }}s is {{ $item->quantity }}</strong> <br>
                                    @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div></h6></a> </b>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bell"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class=" small-box" style="background-color: rgb(196, 221, 105)">
                    <div class="inner">
                        <h1>{{ \App\Item::count('id') }}</h1>
                        <b><a href="#"><h6 style="color: rgb(70, 60, 60)"><a href="{{ route('item.index') }}">Total available items</a></h6></a> </b>
                    </div>
                    <div class="icon">
                        <i class="fas fa-yin-yang"></i>
                    </div>
                </div>
            </div>      
        </div>
    </div>


@endsection
