<?php
$current_page = 'Product';
?>
@extends('layouts.app')
@section('css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
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
        .dataTables_info{
            margin-top: 1.8% !important;
        }
        #example_paginate>span>a {
            color: black !important;
        }

        .dataTables_filter>label {
            color: black !important
        }
    </style> --}}
@endsection


@section('content')
    
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Item list</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_1" class="table table-hover display  pb-30" >
                                    <thead>
                                        <tr>
                                            <th> #</th>
                                           
                                            <th> itemcode </th>
                                            <th> itemname </th>
                                            <th> quantity </th>
                                            <th> price </th>
                                            <th> quantityTypes </th>
                                            <th> taxrate </th>
                                            <th>Image</th>
                                           
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @php
                                            $cnt = 1;
                                        @endphp
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ $cnt++ }}</td>
                                               
                                               
                                                <td>{{ $item->itemcode }}</td>
                                                <td>{{ $item->itemname }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->quantityTypes }}</td>
                                                <td>{{ $item->taxrate }}</td>
                                                <td><img src="{{ $item->file_path }}" width="50" alt=""
                                                    srcset=""></td>
                                              
                                                <td>
                                                    <h3 style="display: flex;">
                                                        {{-- class="btn btn-primary" --}}
                                                        <a href="{{ url('Itemedit', $item->id) }}"
                                                            style="margin-left:3%;margin-right:3%;border:none;color:green;"><svg xmlns="http://www.w3.org/2000/svg" fill="green" height="20" width="20"><path d="M4.25 15.75h1.229l7-7-1.229-1.229-7 7Zm11.938-8.208-3.73-3.73 1.021-1.02q.521-.521 1.24-.521t1.239.521l1.25 1.25q.5.5.5 1.239 0 .74-.5 1.24Zm-1.23 1.229L6.229 17.5H2.5v-3.729l8.729-8.729Zm-3.083-.625-.625-.625 1.229 1.229Z"/></svg></a>
                                                        <form action="{{ url('ItemDestroy', $item->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button style="border:none; color: red;background-color: Transparent;
                                                            background-repeat:no-repeat;"type="submit"
                                                                onclick="return confirm('Are you sure?')"
                                                                style="border:none;"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="red"><path d="M6.5 17q-.625 0-1.062-.438Q5 16.125 5 15.5v-10H4V4h4V3h4v1h4v1.5h-1v10q0 .625-.438 1.062Q14.125 17 13.5 17Zm7-11.5h-7v10h7ZM8 14h1.5V7H8Zm2.5 0H12V7h-1.5Zm-4-8.5v10Z"/></svg></button>
                                                            {{-- class="btn btn-danger" --}}
                                                        </form>
                                                    </h3>
    
                                                </td>
    
    
    
                                            </tr>
                                        @endforeach
    
    
                                    </tbody>
                                
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
        </div>
    </div>
@endsection
@section('script')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
    </script> --}}
@endsection
