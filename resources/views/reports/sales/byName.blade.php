@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card text-center">
                <div class="card-heading text-center mt-3">
                    <div class="row">
                        <div class="col-3">
                            <h3>Total sales</h3>
                        </div>
                        <div class="col-3 offset-5">
                            <h3 class="btn btn-group-sm btn-secondary"><a href="{{ route('getPDF', 'item_name='.'$item_name') }}" class="text-white">Download PDF</a></h3>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
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
            </div>
        </div>
    </div>
</div>

@endsection