@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card ml-5">
                <div class="card-heading text-center" style="background-color: #999">
                    <h3>Sales Report</h3>
                </div>
                <div class="panel-body">
                    <a data-toggle="collapse" href="#model3" role="button" aria-expanded="false"
                        aria-controls="collapseExample">
                        <div class="col-2">
                            <h3 class="text-white btn btn-group-sm btn-secondary">Filter by</h3>
                        </div>
                    </a>
                    <div class="collapse" id="model3">
                        <div class="card card-body">
                            <a href="#" data-toggle="modal" data-target="#modelId"><b style="margin-left: 10%">Date</b></a>
                            <a href="#" data-toggle="modal" data-target="#byname"><b style="margin-left: 10%">Name</b></a>
                        </div>
                    </div>
                </div>
            </div>
            @if (session()->has('rudisha'))
                <div class="card-body">
                    <div class="col-3 offset-5">
                        <h3 class="btn btn-group-sm btn-secondary"><a
                                href="{{ route('getPDF', 'from=' . $from . '&to=' . $to) }}" class="text-white">Download
                                PDF</a></h3>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead class="table-inverse">
                            <tr>
                                <th>#</th>
                                <th>Item name</th>
                                <th>Sold price</th>
                                <th>Customer</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($byDate as $sale)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $sale->item->name ?? '' }}</td>
                                    <td>{{ $sale->amount }}</td>
                                    <td>{{ $sale->sale->customer_name }}</td>
                                    <td>{{ $sale->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @elseif (session()->has('rudisha2'))
                <div class="card-body">
                    <div class="col-3 offset-5">
                        <h3 class="btn btn-group-sm btn-secondary"><a
                                href="{{ route('namePDF', 'item_name=' . $item_name) }}" class="text-white">Download
                                PDF</a></h3>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead class="table-inverse">
                            <tr>
                                <th>#</th>
                                <th>Sold price</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $sale->amount }}</td>
                                    <td>{{ $sale->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal for filtering by date -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enter range of date</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('filterBy') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <label for="from">From</label>
                                <input type="date" name="from" class="form-control"> <br>
                            </div>
                            <div class="col-6">
                                <label for="to">To</label>
                                <input type="date" name="to" class="form-control">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">View</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- End modal for filtering by date -->

    <!-- Modal for filtering by name -->
    <div class="modal fade" id="byname" tabindex="-1" role="dialog" aria-labelledby="byNameId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enter name of the item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('filterBy') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <label for="from">Item Name</label>
                                <input type="text" name="item" class="form-control"> <br>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">View</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- End modal for filtering by name -->
@endsection
