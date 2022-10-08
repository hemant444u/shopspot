@extends('frontend.layouts.app')
@section('content')
    <style>
        .box {
        height: 20px;
        width: 20px;
        margin-bottom: 5px;
        border-radius: 50%;
        border: 1px #D3D3D3;
        }
        input[type="file"] {
        display: block;
        }
        .imageThumb {
        max-height: 75px;
        border: 2px solid grey;
        padding: 1px;
        cursor: pointer;
        }
        .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
        }
        .remove {
        display: block;
        background: #D3D3D3;
        border: 1px solid grey;
        color: white;
        text-align: center;
        cursor: pointer;
        }
        .remove:hover {
        background: white;
        color: #D3D3D3;
        }
        .button {
        background-color: #7db4ec; /* Green */
        color: white;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-weight: bold;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 4px;
        border: red;
        border: 2px solid #0b1702;
        width:50%;
        }
        .button3 {
        background-color: green; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        width: 100%;
        }
        .button2:hover {
        background-color: #167fea;
        color: red;
        border: red;
        }
    </style>
    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    @include('frontend.inc.seller_side_nav')
                </div>
                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="row">
                                        <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        {{__('Select Your Category')}}
                                        </h2>
                                        <b> <a href="{{ route('home') }}" style="margin-left:1rem;">{{__('>Home')}}</a></b>
                                        <b> <a href="{{ route('dashboard') }}">{{__('>Dashboard')}}</a>
                                        <b> <a onClick="yourFunction(); return false;" href=""id="getCatagory">{{__('>View Catagory')}}</a></b>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <form class="" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
                            @csrf
                            <input type="hidden" name="added_by" value="seller">
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    {{__('Product Catagory')}}
                                </div>
                                <div class="form-box-content p-3">
                                
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>{{__('Product Category')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-control mb-3 c-pointer" data-toggle="modal" data-target="#categorySelectModal" id="product_category">{{__('Select a category')}}</div>
                                            <input type="hidden" name="category_id" id="category_id" value="" required>
                                            <input type="hidden" name="subcategory_id" id="subcategory_id" value="" required>
                                        
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><br><br>
                </div>
            </div>
        </div>
    </section>
@endsection





