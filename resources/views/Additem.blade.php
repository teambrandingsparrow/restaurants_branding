<?php
$current_page = 'Product';
?>
@extends('layouts.app')
<?php
$title = 'Add User | Mr:Rocks';
?>
@section('content')
    <div class="content-wrapper">
        <div class=" grid-margin">
            <div class="">
                <div class="panel" style="padding: 30px;">
                    <h4 class="panel-title">Product Add</h4>
                    <div class="panel-body">
                     
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
                        <form method="POST" action="{{ url('itemStore') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- @if (Auth::user()->usertype == 1)
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
                            @endif --}}
                            <div class="form-group row">
                               
                                    <label class="col-form-label"> Item Code<span style="color: red;">*</span></label>
                                
                                
                                    <input class="form-control" name="itemcode" type="text"
                                       placeholder="Enter Item Code" value="{{$number}}"  required>
                              
                            </div>
                            <div class="form-group row">
                               
                                    <label class="col-form-label"> Item Name <span style="color: red;">*</span></label>
                               
                                
                                    <input class="form-control" name="itemname" type="text"
                                        value="{{ old('itemname') }}"placeholder="Enter Item Name" required>
                               
                            </div>
                            <div class="form-group row">
                              
                                    <label class="col-form-label"> Quantity  <span style="color: red;">*</span></label>
                              
                               
                                    <input class="form-control" name="quantity" id="qty_1" type="text"
                                        value="{{ old('quantity') }}"placeholder="Enter Quantity" required>
                              
                            </div>
                            <div class="form-group row">
                               
                                    <label class="col-form-label"> Quantity Type <span style="color: red;">*</span>
                                    </label>
                               
                              
                                    <select class="form-control" required name="quantitytype" required>
                                        <option value=""> Please Select</option>
                                        @foreach ($qtytype as $Row)
                                            <option value="{{ $Row->id }}">{{ $Row->quantityTypes }}</option>
                                        @endforeach
                                    </select>
                             
                            </div>
                            <div class="form-group row">
                                
                                    <label class="col-form-label">Individual Price <span style="color: red;">*</span></label>
                             
                             
                                    <input class="form-control" name="price" id="price_1" type="number"
                                        value="{{ old('price') }}"placeholder="Enter Price " required>
                              
                            </div>
                           
                            <div class="form-group row">
                               
                                    <label class="col-form-label"> Tax % <span style="color: red;">*</span></label>
                                
                              
                                    <input class="form-control" name="taxrate" id="tax_1" type="number"
                                        value="{{ old('taxrate') }}"placeholder="Enter Tax Rate" required>
                              
                            </div>
                           
                           
                            <div class="form-group row">
                              
                                    <label class="col-form-label"> Image <span style="color: red;">*</span></label>
                              
                            
                                    <input class="form-control" name="file" type="file"
                                       placeholder="Upload image" style="background-color:none;important" required>
                            
                            </div>
                          
                           <button type="submit"style="background-color:black;border-radius:10px;"
                                    class="btn btn-primary">Add</button>
                                <button type="reset"
                                    style="background-color:black;border-radius:10px;"value="Reset"class="btn btn-primary">Clear</button>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>




@endsection

