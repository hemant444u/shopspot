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
						
						
			
       <div class="form-box bg-white mt-4" >
      <div class="form-box-content p-3 ">
      <div class="form-box-title px-3 py-2">Mandatory Information</div>
      <div class="form-box-content p-3 ">
          <form id="addform" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
			  <input type="hidden" name="CatId" value="<?php echo $result[0]->cat_id?>">
                <input type="hidden" name="SubCatId" value="<?php echo $result[0]->subcat_id; ?>">
                <input type="hidden" name="SubSubCatId" value="<?php echo $result[0]->sub_subcat_id; ?>">
         <div class="row"><div class="col-md-3"><label><b>Fabric :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="fabric" id="fabric" placeholder="Ex Silk" required /></div></div>

		 	 <div class="row">
            <div class="col-md-10"></div>
                 <div class="col-md-2"> 
                                        <button type="submit" class="btn btn-danger mb-3"style="float:right;" id="addInfo">{{ __('Submit') }}</button>
                                    </div></div></form>
      </div>
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

var SubSubCatId="<?php echo $result[0]->sub_subcat_id;?>";    
        $(document).ready(function(){
      
        });

        $('#addform').on('submit', function (e) {

        e.preventDefault()
    $.ajax({
      url: 'addEthinicwearPetticoats',
      type: 'post',
      data: new FormData(this),
      catch : false,
      contentType:false,      
      processData: false,
      Async:false,      
      success: function(data)
      {
      
        if(data)
        {
          alert("Information Added Successfully..");
          window.location.href ='/shopspot/seller/product/upload?&SubSubCatId='+SubSubCatId;
        }
        else
        {
          alert("Opps Something Went Wrong..");
          window.location.reload();
          
        }
      }
    });
      });
    </script>
@endsection