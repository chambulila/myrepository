@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="float-right">
            <a href="{{ route('sale.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="row">
            <table class="table table-bordered table-hover col-10">
                <thead>
                    <tr class="bg-dark">
                        <th>#</th>
                        <th>name</th>
                        <th>qty</th>
                        <th>price</th>
                        <th>Disc (%)</th>
                        <th>total</th>
                        <th><a href="#" class="btn btn-sm btn-success add_more"><i class="fa fa-plus"></i> </a> </th>
                    </tr>
                </thead>
                <form action="{{ route('sale.store') }}" method="POST" id="my-form">
                    @csrf
                    @if (session()->has('status'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ session('status') }}</strong>
                        </div>
                    @endif
                    <tbody class="addMoreItem">
                        <tr>
                            <td class="no">1</td>
                            <td>
                                <select name="item_id[]" id="item_id" class="form-control item_id">
                                    <option value="select item">Select item</option>
                                    @foreach ($items as $item)

                                        <option data-price="{{ $item->price }}" value="{{ $item->id }}">
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </td>


                            <td>
                                <input type="number" name="quantity" id="quantity" class="form-control quantity ">
                            </td>
                            <td>
                                <input type="number" name="price" id="price" class="form-control price">
                            </td>

                            <td>
                                <input type="number" name="discount" id="discount" class="form-control discount">
                            </td>
                            <td>
                                <input type="text" name="total_amount" id="total_amount" class="form-control total_amount">
                            </td>
                            <td><a href="#" class="btn btn-sm btn-danger><i class=" fa fa-times"></i> </a>
                            </td>
                        </tr>
                    </tbody>
            </table>
            <div class="col-2">
                <div class="card">
                    <div class="card-header  bg-dark">
                        <strong>Total <b class="total">0.00</b> </strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control customer_name" name="customer_name" id="customer_name"
                                placeholder="custome name">
                            <br>
                            <input type="text" class="form-control customer_name" name="customer_phone" id="customer_phone"
                                placeholder="custome phone">
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="text-center ">
            <input type="submit" value="Save" class="btn btn-sm btn-success">
        </div>
        </form>
        <div class="col-6 text-center">
            @if (session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <strong>{{ session('success') }}</strong>
                </div>
        </div>
        @elseif (session()->has('sms'))
        <strong>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('sms') }}
            </div>
           
        </strong>
    @endif
    </div>
@endsection


@section('script')


    <script>
        $('.add_more').on('click', function() {
            var item = $('.item_id').html();
            var numberofrow = ($('.addMoreItem tr').length - 0) + 1;
            var tr = '<tr><td class"no"">' + numberofrow + '</td>' +
                '<td> <select class="form-control item_id" name="item_id[]">' + item +
                '</select></td>' +
                '<td><input type="number" name="quantity[]" class="form-control quantity"></td>' +
                '<td><input type="number" name="price[]" class="form-control price"></td>' +
                '<td><input type="number" name="discount[]" class="form-control discount"></td>' +
                '<td><input type="number" name="total_amount[]" class="form-control total_amount"></td>' +
                '<td> <a class="btn btn-danger btn-sm delete rounded-circle"><i class="fa fa-times-circle"</a> </td>';
            $('.addMoreItem').append(tr);
        });

        $('.addMoreItem').delegate('.delete', 'click', function() {
            $(this).parent().parent().remove();
        })

        function TotalAmount() {
            var total = 0;
            $('.total_amount').each(function(i, e) {
                var amount = $(this).val() - 0;
                total = total + amount;
            });

            $('.total').html(total);

        }

        $('.addMoreItem').delegate('.item_id', 'change', function() {
            var tr = $(this).parent().parent();
            var price = tr.find('.item_id option:selected').attr('data-price');
            tr.find('.price').val(price);
            var qty = tr.find('.quantity').val() - 0;
            var disc = tr.find('.discount').val() - 0;
            var price = tr.find('.price').val() - 0;
            var total_amount = (qty * price) - (qty * price * disc) / 100;
            tr.find('.total_amount').val(total_amount);
            TotalAmount();
        });

        $('.addMoreItem').delegate('.quantity, .discount', 'keyup', function() {
            var tr = $(this).parent().parent();
            var qty = tr.find('.quantity').val() - 0;
            var disc = tr.find('.discount').val() - 0;
            var price = tr.find('.price').val() - 0;
            var total_amount = (qty * price) - (qty * price * disc) / 100;
            tr.find('.total_amount').val(total_amount);
            TotalAmount();
        });

        // $(document).ready(function() {
        //         $("#my-form").submit(function(e) {
        //             $("#btn-submit").attr("disabled", true);
        //             return true;
        //         });
        //         alert(0)
        //     });
    </script>
@endsection
