<?php
$current_page = 'Sale';
?>
@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.3.4/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
    <style>
        .dataTables_info,
        .dt-button,
        #example_previous,
        #example_next {
            color: black !important;
        }

        .dataTables_info {
            margin-top: 1.8% !important;
        }

        #example_paginate>span>a {
            color: black !important;
        }

        .dataTables_filter>label {
            color: black !important
        }
    </style>
@endsection
<?php
$title = 'User LIst |';
?>
@section('content')
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sale List</h4>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        {{-- <div class="col-md-2">
                            @if (Auth::user()->usertype == 1)
                                <form action="" method="GET">
                                    <select class="form-control2" name="user" onchange="this.form.submit()">
                                        <option value="">All</option>
                                        @foreach ($users as $item)
                                            <option @if ($userId == $item->id) selected @endif
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            @endif
                        </div> --}}
                        <div class="table-responsive pt-3">
                             <form method="get" class="form-horizontal">
                                        @csrf
                                        <h5 style="display: flex;" >
                                        <div><label>Date From</label>

                                            <div style="margin-left: 3px;"><input type="date" required 
                                                name="fromDate" value="{{ $from }}"
                                           onchange="this.form.submit()" autocomplete="dob">
                                       </div>
                                       
                                        </div><br>
                                        <div><label >Date To</label>

                                            <div style="margin-left: 3px;" ><input type="date" required name="toDate" value="{{ $to }}"
                                                onchange="this.form.submit()" autocomplete="dob">
                                        </div>
                                        </div><br>
                                        </h5>
                                       
                                       
                                    </form>
                            <table id="example"class="table table-bordered table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th> #</th>
                                        {{-- @if (Auth::user()->usertype == 1)
                                            <th>Branch</th>
                                        @endif --}}
                                        <th>Invoice No:</th>
                                        {{-- <th></th> --}}
                                        <th>Sale Date</th>
                                        <th style="text-align: center">Product Details</th>
                                        <th>Tax Total</th>
                                        <th>Gross Total</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        <th> </th>
                                        @if (Auth::user()->usertype == 1)
                                            <th></th>
                                        @endif
                                        <th></th>
                                        {{-- <th></th> --}}
                                        {{-- <th></th> --}}
                                        <th><span style="float: left;min-width: 300px;" >Product Name</span><span style="float: center;">Price</span>&nbsp; &nbsp; &nbsp; &nbsp; <span >Net Total</span>  <span style="float: right;">QTY</span></th>
                                        <th></th>
                                    </tr>
                                    @php
                                        $cnt = 1;
                                    @endphp
                                    @if (count($data) > 0)
                                        @foreach ($data as $sales)
                                            <tr>
                                                <td>{{ $cnt++ }}</td>
                                                @if (Auth::user()->usertype == 1)
                                                    {{-- <td>{{ $sales->name }}</td> --}}
                                                @endif
                                                <td>{{ $sales->invoice }}</td>
                                                <td>{{ $sales->created_at }}</td>
                                                {{-- <td>{{ $sales->created_at }}</td> --}}
                                                <td>
                                                    @foreach ($sales->product as $item)
                                                        <p>
                                                            <span style="float: left;min-width: 300px;">{{ $item->itemname }}</span>
                                                            <span
                                                                style="float: right;padding-right: 0%;">{{ $item->qty }}</span>
                                                                <span style="float: left;padding-right: 10%;">{{ $item->price }}</span>
                                                                <span >{{ $item->nettotal }}</span><br>
                                                        </p>
                                                    @endforeach
                                                </td>
                                                <td>{{ $sales->taxtotal }}</td>
                                                <td>{{ $sales->grosstotal }}</td>
                                                {{-- <td>
                                                    <h3 style="display: flex;">
                                                        <a href="{{ url('saleedit', $sales->id) }}"
                                                            style="margin-left:3%;margin-right:3%;border:none;color:green;"><i
                                                                class="fas fa-edit"></i></a>
                                                        <form action="{{ url('saledestroy', $sales->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                type="submit"style="border:none; color: red;background-color: Transparent;
                                                            background-repeat:no-repeat;"
                                                                onclick="return confirm('Are you sure?')"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
                                                    </h3>
                                                </td> --}}



                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">No Data</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.3.4/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        text: '<i style="color:green" class="fa fa-file-excel-o"></i>',
                        titleAttr: 'Excel',
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i style="color:red" class="fa fa-file-pdf-o"></i>',
                        titleAttr: 'PDF'
                    }
                ]
            });
        });
    </script>
@endsection
