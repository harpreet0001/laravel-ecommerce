@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
    <div class="content-card">
        <div class="card">
            <div class="card-body">
                <div class="tab-content p-0">
                    @include('msg')
                    <div class="order-list-header">
                        <div class="order-list-header_content">
                            <form>
                                <div class="form-group View-all-select">
                                    <label for="exampleFormControlSelect1">View:</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>All Orders</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="">
                                    <p>Your orders are shown below. Click the plus icon next to an order to see its complete details.</p>
                                </div>
                            </form>
                            <div class="order-search-header">
                                <div class="">
                                    <div class="form-group View-all-select">
                                        <label for="exampleFormControlSelect2">View:</label>
                                        <select class="form-control" id="exampleFormControlSelect2">
                                            <option>Choose an action</option>
                                            <option>Delete Selected</option>
                                            <option>Print Invoices for Selected</option>
                                            <option>Print Packing Slips for Selected</option>
                                        </select>
                                        <button class="btn main-btn">Go</button>
                                    </div>
                                </div>
                                <div class="search-wrapper">
                                    <div class="input-group">
                                        <div class="form-outline">                                            
                                            <input type="search" id="form1" class="form-control" placeholder="Search">
                                        </div>
                                        <button type="button" class="btn btn-primary main-btn">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                    <div class="search-inner-wrapper">
                                       <a href="javascript:void(0);">Advanced Search</a>
                                       <a href="javascript:void(0);">all Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" id="orderlist">
                        <table class="table table-bordered cstm-data-table">
                            <thead>
                                <tr>
                                    <th style="width: 60px;">Id</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Message</th>
                                    <th>Total</th>
                                    <th style="width:160px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection