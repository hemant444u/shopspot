
@extends('frontend.layouts.app')

@section('content')
<style>
.list-unstyled {
    padding-left: revert;
}
    </style>
<section class="gry-bg py-4 profile">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
            <div class="col-lg-3 d-none d-lg-block">
                @include('frontend.inc.seller_side_nav')
            </div>

            <div class="col-lg-9">
<div class="card no-border mt-5">
    <div class="card-header py-3">
        <h4 class="mb-0 h6">Welcome</h4>
    </div>
    <div class="card-body">
        <div class="row">
<div class="col-md-6">
<ul class="list-unstyled">
            <li>
            <div class="col heading-4 mb-2">Account details</div>
        </li>
        <ul class="list-unstyled">
            <li class="my-2"><div class="d-flex">
                <div title="PENDING" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#DBAF2C" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                <div class="ml-1">Email Verification</div>
            </div>
        </li>
        <li><div class="d-flex">
        <div title="SUCCESS" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#27AC70" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                <div class="ml-1">Phone Verification</div>
            </div>
        </li>
            </ul>
        </ul>
        <ul class="list-unstyled">
            <li>
            <div class="col heading-4 mb-2">Business details</div>
        </li>
        <ul class="list-unstyled">
            <li class="my-2"><div class="d-flex">
                <div title="PENDING" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#DBAF2C" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                <div class="ml-1">GSTIN</div>
            </div>
        </li>
        <li><div class="d-flex">
        <div title="SUCCESS" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#27AC70" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                <div class="ml-1">TAN</div>
            </div>
        </li>
       
            </ul>
        </ul>

        <ul class="list-unstyled">
        <li>
            <div class="col heading-4 mb-2">Store details</div>
        </li>
        <ul class="list-unstyled">
        <li><div class="d-flex">
        <div title="SUCCESS" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#27AC70" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                <div class="ml-1">Store detail</div>
            </div>
        </li>
        </ul>
        </ul>
</div>

<div class="col-md-6">
<ul class="list-unstyled">
            <li>
            <div class="col heading-4 mb-2">Bank details</div>
        </li>
        <ul class="list-unstyled">
            <li class="my-2"><div class="d-flex">
                <div title="PENDING" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#DBAF2C" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                <div class="ml-1">Bank account verification</div>
            </div>
        </li>
        <li><div class="d-flex">
        <div title="SUCCESS" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#27AC70" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                <div class="ml-1">Cancelled cheque</div>
            </div>
        </li>
        
            </ul>
        </ul>




        <ul class="list-unstyled">
            <li>
            <div class="col heading-4 mb-2">Product details</div>
        </li>
        <ul class="list-unstyled">
            <li class="my-2"><div class="d-flex">
                <div title="PENDING" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#DBAF2C" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                <div class="ml-1">Listing created</div>
            </div>
        </li>
        <li><div class="d-flex">
        <div title="SUCCESS" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#27AC70" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                <div class="ml-1">Product added</div>
            </div>
        </li>
        
            </ul>
        </ul>
</div>

</div>
       
        </div>
    </div>
    </div>
    </div>

</div>
</div>
</div>
</div>
</section>


@endsection
