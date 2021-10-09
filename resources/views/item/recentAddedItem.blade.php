@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="bg-secondary">
                    <th>#</th>
                    <th>Item Id</th>
                    <th>Item Name</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr scope="row">
                    
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection