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
                                      <b> <a href="{{ route('dashboard') }}">{{__('>Dashboard')}}</a></b>
                                </div>
                                </div>
                             
                            </div>
                        </div>
						
						
			
       <div class="form-box bg-white mt-4" id="men_Accessories_Wallets_details">
      <div class="form-box-content p-3 ">
      <div class="form-box-title px-3 py-2">Mandatory Information</div>
      <div class="form-box-content p-3 ">
          <div class="row"><div class="col-md-3"><label><b> Ideal For : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Ideal For"  id="men_Accessories_Wallets_ideal_for" name="men_Accessories_Wallets_ideal_for" required><option value="" >Select Ideal For</option>
		  <?php
		  
		$exp1=explode(',',$result[0]->Ideal_for);
		
			for($i=0;$i<count($exp1);$i++){ ?>
			<option value='<?php echo $exp1[$i];?>'><?php echo $exp1[$i];?></option><?php }?></select></div></div></div> 
        <div class="row">
            <div class="col-md-3">
            <label><b>Material :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="men_Accessories_Wallets_Material" id="men_Accessories_Wallets_Material" placeholder="Ex Genuine Leather"/>
            </div></div>  
		
					
            <div class="row"><div class="col-md-3"><label><b> Type : </b></label></div><div class="col-md-9"><div class="mb-3">
			
					<select class="form-control mb-3 selectpicker" data-placeholder="Select Type"  id="men_Accessories_Wallets_type" name="men_Accessories_Wallets_type" required>	<?php
		$exp=explode(',',$result[0]->Type);
		
			for($i=0;$i<count($exp);$i++){ ?><option value="<?php echo $exp[$i];?>" ><?php echo $exp[$i];?></option><?php }?></select>	</div></div></div>     
					
		 	
      </div>
      </div>
      </div>
       <div class="col-md-4 mx-auto">
                                <a class="dashboard-widget text-center plus-widget mt-4 d-block" href="{{ route('seller.products.upload')}}">
                                    <i class="la la-arrow"></i>
                                    <span class="d-block title heading-6 strong-400 c-base-1">{{ __('Submit') }}</span>
                                </a>
                            </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

   
@endsection
@section('script')

    <script>

        $(document).ready(function(){
			
				});
    </script>
@endsection