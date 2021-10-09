@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">


            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h1>{{ \App\Saledetail::sum('amount') }}</h1>
                        <b>Total sales</b><br>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class=" small-box bg-info">
                    <div class="inner">
                        <h1>{{ \App\Purchase::sum('price') }}</h1>
                        <b>Total Purchases</b>
                    </div>
                    <div class="icon">
                        <i class="fas fa-th-large"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class=" small-box bg-warning">
                    <div class="inner">
                       <h1>{{ $idadi }}</h1>
                        <b><a href="{{ route('recentAddedItem') }}" class="added"> Recently +items </a></b>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dolly"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class=" small-box bg-danger">
                    <div class="inner">
                        <h1>345</h1>
                        <b><a href="#">notifications</a> </b>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bell"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Router</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                        <td>Ethernet</td>
                        <td><span class="badge badge-info">CISCO</span></td>
                        <td>
                            <div class="sparkbar" data-color="#f39c12" data-height="20">90</div>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                        <td>Firewall</td>
                        <td><span class="badge badge-info">SOPHOS</span></td>
                        <td>
                            <div class="sparkbar" data-color="#f39c12" data-height="20">80</div>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                        <td>Laptop</td>
                        <td><span class="badge badge-info">DELL</span></td>
                        <td>
                            <div class="sparkbar" data-color="#f56954" data-height="20">10</div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection
