<?php
$current_page = 'Product';
?>
@extends('layouts.app')
<?php
$title = 'Item Edit | ERP Bangalore';
?>
@section('content') 
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Items</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ url('ItemUpdate/'.$item->id) }}" enctype="multipart/form-data">
                            @csrf
                            @if (Auth::user()->usertype == 1)
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Select Branch
                                            <span style="color: red;">*</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <select class="form-control2" required name="user">
                                            <option value="">Select Branch</option>
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label class="col-form-label"> Quantity Type <span style="color: red;">*</span>
                                    </label>
                                </div>
                                <div class="col-lg-8">
                                    <select class="form-control2" required name="quantitytype">
                                        <option value=""> Please Select</option>
                                        @foreach ($qtytype as $Row)
                                            <option @if ($item->quantitytype == $Row->id) selected @endif value="{{ $Row->id }}">{{ $Row->quantityTypes }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label class="col-form-label"> Item Name <span style="color: red;">*</span></label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" name="itemname" type="text"
                                        value="{{$item->itemname}}"placeholder="Enter Item Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label class="col-form-label"> Item Code<span style="color: red;">*</span></label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" name="itemcode" type="text"
                                    value="{{$item->itemcode}}"placeholder="Enter Item Code">
                                </div>
                            </div><div class="form-group row">
                                <div class="col-lg-3">
                                    <label class="col-form-label"> Quantity  <span style="color: red;">*</span></label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" name="quantity"id="qty_1" type="text"
                                    value="{{$item->quantity}}"placeholder="Enter Quantity">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label class="col-form-label"> Price <span style="color: red;">*</span></label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" name="price"id="price_1" type="text"
                                    value="{{$item->price}}"placeholder="Enter Price ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label class="col-form-label"> Tax Rate <span style="color: red;">*</span></label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" name="taxrate" type="text"
                                    value="{{$item->taxrate}}"placeholder="Enter Tax Rate">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label class="col-form-label"> Image <span style="color: red;">*</span></label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" name="file" type="file"
                                       placeholder="Upload image" value="{{$item->file_path}}"  style="background-color:none;important">
                                       <img src="{{ $item->file_path }}" alt="" style="width:50px;height:50px;"
                                       srcset="">
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Total Amount <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" id="total_1"  name="totalamount" type="text"
                                        value="{{$item->totalamount}}"placeholder="Total Amount">
                                    </div>
                                </div>
                            </div>
                            <center><button type="submit"style="background-color:black;border-radius:10px;"
                                    class="btn btn-primary">Update</button>
                              
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
