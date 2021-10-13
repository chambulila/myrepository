@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-8">
        <div class="card ml-5">
            <div class="card-heading text-center" style="background-color: #999">
                <h3>Sales Report</h3>
            </div>
            <div class="panel-body">
                <strong>Filter by</strong>  <a href="#" data-toggle="modal" data-target="#modelId"><b style="margin-left: 10%">Date</b></a>
                <a href="#" data-toggle="modal" data-target="#byname"><b style="margin-left: 10%">Name</b></a>
            </div>
        </div>
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
                        <div class = "alert alert-danger">
                           <ul>
                              @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                              @endforeach
                           </ul>
                        </div>
                     @endif

                        <label for="from">From</label>
                        <input type="date" name="from"> <br>
                       </div>
                       <div class="col-6">
                        <label for="to">To</label>
                        <input type="date" name="to">
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
                        <div class = "alert alert-danger">
                           <ul>
                              @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                              @endforeach
                           </ul>
                        </div>
                     @endif

                        <label for="from">Item Name</label>
                        <input type="text" name="item[]"> <br>
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
