
@extends('frontend.layouts.app')

@section('content')

<section class="gry-bg py-4 profile">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
            <div class="col-lg-3 d-none d-lg-block">
                @include('frontend.inc.seller_side_nav')
            </div>

            <div class="col-lg-9">
			
                                
                                <div class="float-md-left"><div class="row">
                                   <h4 class="mb-0 h6">Shipping</h4>
                                      <b> <a href="{{ route('home') }}" style="margin-left:1rem;">{{__('>Home')}}</a></b>
                                      <b> <a href="{{ route('dashboard') }}">{{__('>Dashboard')}}</a></b>
                                   
                                </div>
                                </div>
<div class="card no-border mt-5">
    <div class="card-header py-3">
        <h4 class="mb-0 h6">Shipping</h4>
    </div>
    <div class="card-body">
      <div class="row mt-3">
        <div class="col-md-6">
            <div class="col">
                <label class="heading-5">Courier Processing time
               </label>
            </div>
            <div class="col-md-10">
               <div class="form-check">
                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                   <label class="form-check-label" for="inlineCheckbox1">One Business day</label>
               </div>
               <div class="form-check">
                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                   <label class="form-check-label" for="inlineCheckbox1">Two Business day</label>
               </div>
               <div class="form-check">
                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                   <label class="form-check-label" for="inlineCheckbox1">Three Business day</label>
               </div>
               <div class="form-check">
                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                   <label class="form-check-label" for="inlineCheckbox1">One week</label>
               </div>
               <div class="form-check">
                   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                   <label class="form-check-label" for="inlineCheckbox1">Two – three weeks</label>
               </div>
   
             {{-- <input type="type" class="form-control" readonly> --}}
             {{-- <select class="form-control">
             <option value="">One Business day</option>
             <option value="">Two Business day</option>
             <option value="">Three Business day</option>
             <option value="">One week</option>
             <option value="">Two – three weeks</option>
             </select> --}}
            </div>
          
              
             </div>
          <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                <label class="form-check-label" for="inlineCheckbox1">Enable shipping</label>
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