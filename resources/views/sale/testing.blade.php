@extends('layouts.app')
@section('content')

<table class="table">
    <thead>
        <tr>
            <th>item</th>
            <th>price</th>
            <th>phone</th>
        </tr>
    </thead>
    <tbody id="dynamicTable">
        <tr>
            <td><input type="text" name="item[]" id="item" class="form-control"></td>
            <td><input type="text" name="price[]" id="price" class="form-control"></td>
            <td><input type="text" name="phone[]" id="phone" class="form-control"></td>
            <td><button type="button" id="add" class="btn-success">+</button> </td>
        </tr>
    </tbody>
</table>
@endsection
@section('script')

<script>
    $(document).ready(function(){
        var i = 1;
        $('#add').click(function(){
            i++;
            $('#dynamicTable').append('<tr id="row'+i+'"><td><input type="text" name="item[]"
             id="item" class="form-control"></td><td><input type="text" name="price[]"
              id="price" class="form-control"></td> <td><input type="text" name="phone[]"
                id="phone" class="form-control"></td><td><button type="button" id="+i+" class="btn-danger remove_row">-</button> </td></tr>');
        });
    });
</script>

@endsection