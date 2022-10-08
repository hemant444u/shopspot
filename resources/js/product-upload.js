        $(document).ready(function(){
            alert("hii");
     var category_name = "";
        var subcategory_name = "";
        var subsubcategory_name = "";

        var category_id = null;
        var subcategory_id = null;
        var subsubcategory_id = null;

            $('#usn_tbl').hide();
            $('#mobile_Product_desc_details').hide();
            $('#laptop_Product_desc_details').hide();
            $('#women_blose_desc_details').hide();
            $('#women_dhoti_desc_details').hide();
            $('#women_Duppttas_desc_details').hide();
            $('#women_Gowns_desc_details').hide();
            $('#women_Dress_material_desc_details').hide();
            $('#women_Kurta_set_Salwar_sets_desc_details').hide();
            $('#women_Kurtas_Kurtiss_desc_details').hide();
            $('#women_Lehnga_choli_desc_details').hide();
            $('#women_Plazzos_desc_details').hide();
            $('#women_Salwars_Patialas_desc_details').hide();
            $('#women_Saree_Shapewear_Petticoats_details').hide();
            $('#women_Sarees_details').hide();
            $('#women_Shararas_details').hide();
            $('#women_Sunglasses_details').hide();
            $('#women_Traveller_details').hide();
            $('#women_Wallets_Belts_details').hide();
            $('#women_Bath_Spa_details').hide();
            $('#women_Hair_Care_details').hide();
            $('#women_Handbags_details').hide();
            $('#women_MAkeup_details').hide();
            $('#women_CasualShoes_details').hide();
            $('#women_Flats_details').hide();
            $('#women_Slipper_Flip-Flops_details').hide();
            $('#women_SportShoes_details').hide();
            $('#women_Heels_details').hide();
            $('#women_Wedges_details').hide();
            $('#women_SkinCare_details').hide();
            $('#women_Boots_details').hide();
            $('#women_Ballerines_details').hide();
            $('#women_Deodorants_Perfume_details').hide();
            $('#women_Bras_details').hide();
            $('#women_Camisoles_Slip_details').hide();
            $('#women_Lingerie_sets_details').hide();
            $('#women_Smart_watches_details').hide();
            $('#women_Analog_watches_details').hide();
            $('#women_Artificial_Jewellery_details').hide();
            $('#subcategory_list').hide();
            $('#subsubcategory_list').hide();
            
            $('#categories').on('change', function() {
			var category_id = this.value;
			$.ajax({
				url: "get_subcategories_by_categoryId",
				type: "POST",
				data: {
					category_id: category_id,_token:'{{ csrf_token() }}'
				},
			
				success: function(dataResult){
				    
				//	$("#sub_category").html(dataResult);
					  $.each(JSON.parse(dataResult), function(idx, obj) {
           
                $('#sub_category').append('<option value='+obj.id+'>'+obj.name+'</option>');
            
          });
				}
				
			});
		
		
	});
	
	 $('#content1').hide();
	 $('#content2').hide();
              $('.timespan').click(function () {
               var selected = $(this).val();  
                  if(selected == 'yes') {
                      $('#content2').hide();
                   $('#content1').show();
                   
                  
                } else {
                   $('#content1').hide();
                   $('#content2').show();
                  
                 }
          });   
          
   // var max_fields      = 10; //maximum input boxes allowed
  /*   var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
   var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x ){ //max input box allowed
            x++; //text box increment div class="col-md-2
            $(wrapper).append('<div class="row rows"><div class="col-md-2"><button type="button"  class="btn btn-link btn-icon text-danger"onclick="remove_field(this);"><i class="fa fa-trash-o"></i></button></div><div class="col-md-10"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Unit" id="size_unit" name="size_unit"><option value="">{{ ('Select Unit') }}</option><option value="small ">{{ "Small  (S)" }}</option><option value="extra-small">{{ "Extra-Small  (XS)" }}</option><option value="medium">{{ "Medium  (M)" }}</option><option value="large">{{ "Large  (L)" }}</option><option value="extra-large">{{ "Extra-Large  (XL)" }}</option><option value="extra-large">{{"Extra-Extra-Large  (XXL)" }}</option></select></div><input type="text" class="form-control mb-3" name="size[]"placeholder="{{__('Size')}}"/></div></div>'); //add input box
            
        }
    }); */
   
    // $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    //     e.preventDefault(); $(this).parent('div').remove(); x--;
    // })


});

 var size_id = 2;
        function add_field_button(){
            var AddSize =  '<div class="row">';
            AddSize +=  '<div class="col-2">';
            AddSize +=  '<button type="button" onclick="remove_field_size(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button>';
            AddSize +=  '</div>';           
            AddSize += '<div class="col-8">';
            AddSize +=  '<input type="text" class="form-control mb-3" name="size[]"placeholder="Size"/></div><div class="col-2"></div>';           
            AddSize +=  '</div>';           
            $('#input_fields_wrap').append(AddSize);

            size_id++;
            
        }
        function remove_field_size(em){
            $(em).closest('.row').remove();
        }
         var color_id = 2;
        function add_field_colour(){
            var AddColor =  '<div class="row">';
            AddColor +=  '<div class="col-2">';
            AddColor +=  '<button type="button" onclick="remove_field_color(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button>';
            AddColor +=  '</div><div class="col-md-8"><div class="mb-3"><select class="form-control mb-3 selectpicker colorsnamecode" name="colors[]" id="colorsid" data-placeholder="Select colours"><option value="">Select Colours</option>';
               @foreach (\App\Color::orderBy('name', 'asc')->get() as $key => $color)
              AddColor += '<option value="{{ $color->code}}" style="background-color:{{$color->code}}" data-name="{{$color->name}}" >{{ $color->name}}</option>';
              @endforeach 
              AddColor += '</select></div></div><div class="col-md-2"></div></div>';

             $('#id-colour').append(AddColor);

            color_id++;
            
        }   
        function remove_field_color(em){
            $(em).closest('.row').remove();
        }


 	/* function remove_field(em){
    		$(em).closest('.rows').remove();
    	
    	} */

//   $("input").on("change", function() {
            
//           var tot = 0;   
//         tot += parseInt($("#product_commission").val()) + parseInt($("#product_logistic")) + parseInt($("#product_convenience"))+ parseInt($("#product_price"))
//         $("#seller_price").val(tot);
//       });
      
      $("input").on("change", function() {
    var tot = parseInt($("#product_price").val() || '0') + parseInt($("#product_commission").val() || '0')+ parseInt($("#product_logistick").val() || '0') + parseInt($("#product_convenience").val() || '0')
    $("#seller_price").val(tot);
    
     var  gst_total = parseFloat($("#gst").val() || '0') / parseFloat(100);
        var  seller_total= parseFloat(gst_total) * parseFloat($("#seller_price").val() || '0')
        var  display_total= parseFloat(seller_total) + parseFloat($("#seller_price").val() || '0');
       
       $("#display_price").val(parseFloat(display_total.toFixed(2)));
       
       
       var  minus_total = parseFloat($("#mrp").val() || '0') - parseFloat($("#display_price").val() || '0')
        var devide_total= parseFloat(minus_total) / parseFloat($("#mrp").val() || '0')
        var discount_total= parseFloat(devide_total) * parseFloat(100);
       
      if(discount_total!=isNaN){ 
      	
      $("#discount").val(parseFloat(discount_total));
      $("#product_discount").val(parseFloat(discount_total));
      
      }
  });
    function update_price(){
       $('.price_class').html($('#product_price').val());

    }
 

    totalrow = 1000;
  function add_field_variant() { 
    $('#usn_bdy').empty();
       $('#usn_tbl').show();
    //  var choice = document.getElementsByName('choice_options[]');
      var size = document.getElementsByName('size[]');
      var colors = document.getElementsByName('colors[]');
      var group_id = document.getElementById('group_id').value;
	  var myElements = $(".colorsnamecode option:selected");

             var addrow='';
			
           		for(var i=0; i < colors.length; i++){
            	for(var j=0; j < size.length; j++){
				
				for (var i=0;i<myElements.length;i++) {
     
            		totalrow++;
            		
            var a = colors[i];

            addrow = '<tr id='+totalrow+'><td style="width:10%;" ><input type="text" name="product_id" id="product_id"> </td><td class="text-center"><center><div class="box"style="background-color:'+a.value+'"></div></center>'+myElements.eq(i).attr("data-name")+'</td><td class="text-center">'; 
            			var b = size[j];
            			addrow = addrow + b.value+'</td><td style="width:10%;" ><input type="text" name="sku_id" id="sku_id"> </td><td style="width:10%;" ><input type="text" name="quantity" id="quantity"> </td><td class="text-center" style="width:10%;"><span class=" badge badge-md badge-pill bg-red" id="span_outstock'+totalrow+'">Out of stock</span><span style="display:none" class="badge badge-md badge-pill bg-green replaceme" id="span_instock'+totalrow+'">In stock</span><div class="col-4 col-xl-1 col-md-2 order-2 order-md-0" style="margin-top:.5rem;"><label class="switch" style="margin-top:5px;"><input  type="checkbox" class="stock_details" name="stock_details'+totalrow+'" id="stock_details'+totalrow+'" onclick="update_checked('+totalrow+')"><span class="slider round"></span></label></div></td></tr>';
            			$('#usn_bdy').append(addrow);		

					}

            		//}

            	}

            }  
                 
 }   
 

  $('#product_price').change(function () { 
$('#group_id').change(function (){});
 });   
   function update_checked(row_id) {

  var checkBox = document.getElementById("stock_details"+row_id);
  //alert(checkBox.checked);
  if (checkBox.checked == true){
  	$('#span_instock'+row_id).show();
  	$('#span_outstock'+row_id).hide();
  	//$('.replaceme').html('<span class="badge badge-md badge-pill bg-green replaceme">In stock</span>');

  } else {
  	$('#span_outstock'+row_id).show();
  	$('#span_instock'+row_id).hide();
   //$('.replaceme').html('<span class="badge badge-md badge-pill bg-red replaceme">Out of stock</span>');
  }
}  
      
      
        
        function list_item_highlight(el){
            $(el).parent().children().each(function(){
                $(this).removeClass('selected');
            });
            $(el).addClass('selected');
        }

        function get_subcategories_by_category(el, cat_id){
            list_item_highlight(el);
            category_id = cat_id;
            subcategory_id = null;
            subsubcategory_id = null;
            category_name = $(el).html();
            $('#subcategories').html(null);
            $('#subsubcategory_list').hide();
            $.post('{{ route('subcategories.get_subcategories_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
                for (var i = 0; i < data.length; i++) {
                    $('#subcategories').append('<li onclick="get_subsubcategories_by_subcategory(this, '+data[i].id+')">'+data[i].name+'</li>');
					
                }
                $('#subcategory_list').show();
            });
        }

        function get_subsubcategories_by_subcategory(el, subcat_id){
            list_item_highlight(el);
            subcategory_id = subcat_id;	
			
			
            subsubcategory_id = null;
            subcategory_name = $(el).html();
			
			
			if(subcategory_name=="Mobile" || subcategory_name=="Mobiles" ){
				//alert("hi..");
				
				$('#laptop_Product_desc_details').hide();
				$('#mobile_Product_desc_details').show();
				
				
			}
			if(subcategory_name=="Laptop" || subcategory_name=="Laptops" ){
				//alert("hi..");
				
				$('#mobile_Product_desc_details').hide();
				$('#laptop_Product_desc_details').show();
				
				
			}
            $('#subsubcategories').html(null);
            $.post('{{ route('subsubcategories.get_subsubcategories_by_subcategory') }}',{_token:'{{ csrf_token() }}', subcategory_id:subcategory_id}, function(data){
                for (var i = 0; i < data.length; i++) {
                    $('#subsubcategories').append('<li onclick="confirm_subsubcategory(this, '+data[i].id+')">'+data[i].name+'</li>');
                }
                $('#subsubcategory_list').show();
            });
        }

        function confirm_subsubcategory(el, subsubcat_id){
            list_item_highlight(el);
            subsubcategory_id = subsubcat_id;
            subsubcategory_name = $(el).html();
			$('#women_blose_desc_details').hide();
			$('#women_dhoti_desc_details').hide();
			$('#women_Dress_material_desc_details').hide();
			$('#women_Duppttas_desc_details').hide();
			$('#women_Gowns_desc_details').hide();
			$('#women_Kurta_set_Salwar_sets_desc_details').hide();
			$('#women_Lehnga_choli_desc_details').hide();
			$('#women_Plazzos_desc_details').hide();
			$('#women_Salwars_Patialas_desc_details').hide();
			$('#women_Saree_Shapewear_Petticoats_details').hide();
			$('#women_Sarees_details').hide();
			$('#women_Handbags_details').hide();
			$('#women_Shararas_details').hide();
			$('#women_Sunglasses_details').hide();
			$('#women_Traveller_details').hide();
			$('#women_Wallets_Belts_details').hide();
			$('#women_Bath_Spa_details').hide();
			$('#women_Hair_Care_details').hide();
			$('#women_Deodorants_Perfume_details').hide();
			$('#women_MAkeup_details').hide();
			$('#women_CasualShoes_details').hide();
			$('#women_Flats_details').hide();
			$('#women_Slipper_Flip-Flops_details').hide();
			$('#women_Wedges_details').hide();
			$('#women_Heels_details').hide();
			$('#women_SportShoes_details').hide();
			$('#women_Boots_details').hide();
			$('#women_Ballerines_details').hide();
			$('#women_SkinCare_details').hide();
			$('#women_Artificial_Jewellery_details').hide();
			$('#women_Analog_watches_details').hide();
			$('#women_Smart_watches_details').hide();
			$('#women_Bras_details').hide();
			$('#women_Camisoles_Slip_details').hide();
			$('#women_Lingerie_sets_details').hide();
			var sub_sub_catagory=subsubcategory_name;
			
			if(sub_sub_catagory=="Lenga Choli" || sub_sub_catagory=="Lehenga Choli" ){
				//alert("hi..");
				
				
				$('#women_Lehnga_choli_desc_details').show();
				
				
			}
			
			if(sub_sub_catagory=="Wedges" || sub_sub_catagory=="Wedge" ){
				alert("hi..Wedges");
				
				
				$('#women_Wedges_details').show();
				
				
			}
			if(sub_sub_catagory=="Plazzos" || sub_sub_catagory=="Palazzos" ){
				//alert("hi..");
				
				
				$('#women_Plazzos_desc_details').show();
				
				
			}
			
			if(sub_sub_catagory=="Smart Bands" || sub_sub_catagory=="Smart Band" ){
				//alert("hi.. Bands");
				
				
				//$('#women_Handbags_details').show();
				
				
			}
			
			if(sub_sub_catagory=="Blouse" || sub_sub_catagory=="Blouses" ){
				//alert("hi..");
				
				
				$('#women_blose_desc_details').show();
				
				
			}
			if(sub_sub_catagory=="Dhoti Pants" || sub_sub_catagory=="Dhoti Pant" ){
				//alert("hi..");
				
				
				$('#women_dhoti_desc_details').show();
				
				
			}
			if(sub_sub_catagory=="Dupatta" || sub_sub_catagory=="Dupattas" ){
				
				
				
				$('#women_Duppttas_desc_details').show();
				
				
			}
			if(sub_sub_catagory=="Gown" || sub_sub_catagory=="Gowns" ){
				
				
				
				$('#women_Gowns_desc_details').show();
				
				
			}
			if(sub_sub_catagory=="Dress Material" || sub_sub_catagory=="Dress Materials" ){
				//alert("hi..");
				
				
				$('#women_Dress_material_desc_details').show();
				
				
			}
			if(sub_sub_catagory=="Salwars &amp; Patiala" || sub_sub_catagory=="Salwars&amp;Patiala" ){
				
				
				
				$('#women_Salwars_Patialas_desc_details').show();
				
				
			}if(sub_sub_catagory=="Saree Shapewear &amp; Petticoats" || sub_sub_catagory=="Saree Shapewear&amp;Petticoats" ){
				
				
				//alert("hiii..");
				$('#women_Saree_Shapewear_Petticoats_details').show();
				
				
			}
			if(sub_sub_catagory=="Handbags" || sub_sub_catagory=="Handbag" ){
				
				
				//alert("Handbags..");
				$('#women_Handbags_details').show();
				
				
			}
			if(sub_sub_catagory=="Sarees" || sub_sub_catagory=="Saree" ){
				
				
				//alert("hiii..");
				$('#women_Sarees_details').show();
				
				
			}
			if(sub_sub_catagory=="Shararas" || sub_sub_catagory=="Sharara" ){
				
				
				//alert("hiii..");
				$('#women_Shararas_details').show();
				
				
			}
			if(sub_sub_catagory=="Sunglasses" || sub_sub_catagory=="Sunglasse" ){
				
				
				//alert("Sunglasses..");
				$('#women_Sunglasses_details').show();
				
				
			}
			if(sub_sub_catagory=="Traveller" || sub_sub_catagory=="Travellers" ){
				//alert("Traveller..");
				
			
				$('#women_Traveller_details').show();
				
				
			}
			if(sub_sub_catagory=="Wallets &amp; Belts" || sub_sub_catagory=="Wallets&amp;Belts" ){
				//alert("hi..Belts");
				
				
				$('#women_Wallets_Belts_details').show();
				
				
			}
			if(sub_sub_catagory=="Bath &amp; Spa" || sub_sub_catagory=="Bath&amp;Spa" ){
				//alert("hi..Bath");
				
				
				$('#women_Bath_Spa_details').show();
				
				
			}
			if(sub_sub_catagory=="Make up" || sub_sub_catagory=="Make Up" ){
				//alert("hi..MakeUp");
				
				
				$('#women_MAkeup_details').show();
				
				
			}
			if(sub_sub_catagory=="Sport Shoes" || sub_sub_catagory=="Sports Shoes" ){
				//alert("hi..Sport");
				
				
				$('#women_SportShoes_details').show();
				
				
			}
			if(sub_sub_catagory=="Casual Shoes" || sub_sub_catagory=="Casual Shoe" ){
				//alert("hi..Casual");
				
				
				$('#women_CasualShoes_details').show();
				
				
			}
			if(sub_sub_catagory=="Flats" || sub_sub_catagory=="Flat" ){
				//alert("hi..Flats");
				
				
				$('#women_Flats_details').show();
				
				
			}
			
			if(sub_sub_catagory=="Slippers &amp; Flip-Flops" || sub_sub_catagory=="Slippers&amp;Flip-Flops" ){
				//alert("hi..women_Slipper_Flip-Flops_details");
				
				
				$('#women_Slipper_Flip-Flops_details').show();
				
				
			}
			
			if(sub_sub_catagory=="Heels" || sub_sub_catagory=="Heel" ){
				//alert("hi..Heels");
				
				
				$('#women_Heels_details').show();
				
				
			}
			if(sub_sub_catagory=="Ballerines" || sub_sub_catagory=="Ballerine" ){
				//a/lert("hi..Ballerines");
				
				
				$('#women_Ballerines_details').show();
				
				
			}
			if(sub_sub_catagory=="Boots" || sub_sub_catagory=="Boot" ){
				//alert("hi..Boots");
				
				
				$('#women_Boots_details').show();
				
				
			}
			if(sub_sub_catagory=="Artificial Jewellery" || sub_sub_catagory=="Artificial Jewelleries" ){
				//alert("hi..Jewelleries");
				
				
				$('#women_Artificial_Jewellery_details').show();
				
				
			}
			if(sub_sub_catagory=="Analog Watches" || sub_sub_catagory=="Analog Watch" ){
				//alert("hi..Analog");
				
				
				$('#women_Analog_watches_details').show();
				
				
			}
			if(sub_sub_catagory=="Smart Watches" || sub_sub_catagory=="Smart Watch" ){
				//alert("hi..Smart");
				
				
				$('#women_Smart_watches_details').show();
				
				
			}
			
			if(sub_sub_catagory=="Bras" || sub_sub_catagory=="Bra" ){
				alert("hi..Bra");
				
				
				$('#women_Bras_details').show();
				
				
			}
			
			if(sub_sub_catagory=="Camisoles &amps; Slips" || sub_sub_catagory=="Camisoles&amps;Slips" ){
				alert("hi..Camisoles");
				
				
				$('#women_Camisoles_Slip_details').show();
				
				
			}
			
			if(sub_sub_catagory=="Lingerie sets" || sub_sub_catagory=="Lingerie set" ){
				alert("hi..Lingerie");
				
				
				$('#women_Lingerie_sets_details').show();
				
				
			}
			if(sub_sub_catagory=="Skin Care" || sub_sub_catagory=="SkinCare" ){
				//alert("hi..SkinCare");
				
				
				$('#women_SkinCare_details').show();
				
				
			}
			if(sub_sub_catagory=="Hair Care" || sub_sub_catagory=="Hairs Care" ){
			//	alert("hi..Hair");
				
				
				$('#women_Hair_Care_details').show();
				
				
			}
			if(sub_sub_catagory=="Deodorants &amp; Perfumes" || sub_sub_catagory=="Deodorants&amp;Perfumes" ){
			//alert("hi..Deodorants");
				
				
				$('#women_Deodorants_Perfume_details').show();
				
				
			}
			if(sub_sub_catagory=="Leggings &amp; Salwars" || sub_sub_catagory=="Leggings and Salwars" ){
				//alert("hi..");
				
				
				$('#women_Kurta_set_Salwar_sets_desc_details').show();
				
				
			}
			if(sub_sub_catagory=="Kurtas &amp; Kurtis" || sub_sub_catagory=="Kurtas and Kurtis" ){
				//alert("hi..");
				
				
				$('#women_Kurtas_Kurtiss_desc_details').show();
				
				
			}
    	}

        function get_attributes_by_subsubcategory(subsubcategory_id){
    		$.post('{{ route('subsubcategories.get_attributes_by_subsubcategory') }}',{_token:'{{ csrf_token() }}', subsubcategory_id:subsubcategory_id}, function(data){
    		    $('#choice_attributes').html(null);
    		    for (var i = 0; i < data.length; i++) {
    		        $('#choice_attributes').append($('<option>', {
    		            value: data[i].id,
    		            text: data[i].name
    		        }));
    		    }
    		});
    	}

        function filterListItems(el, list){
            filter = el.value.toUpperCase();
            li = $('#'+list).children();
            for (i = 0; i < li.length; i++) {
                if ($(li[i]).html().toUpperCase().indexOf(filter) > -1) {
                    $(li[i]).show();
                } else {
                    $(li[i]).hide();
                }
            }
        }
        $(function () {
  $('#addbrand').on('submit',function(e)
  {
    
    e.preventDefault()
    $.ajax({
      url: 'addBrand',
      type: 'post',
      data: new FormData(this),
      catch : false,
      contentType:false,      
      processData: false,
      Async:false,      
      success: function(data)
      {
        if(data==1)
        {
          alert("Brand Sent Successfully..");
          window.location.reload();
        }
        else
        {
          alert("Brand Not Added..");
          window.location.reload();
          
        }
      }
    });
  });
  });

        function closeModal(){
            if(category_id > 0 && subcategory_id > 0){
                $('#category_id').val(category_id);
                $('#subcategory_id').val(subcategory_id);
                $('#subsubcategory_id').val(subsubcategory_id);
                $('#product_category').html(category_name+'>'+subcategory_name+'>'+subsubcategory_name);
                $('#categorySelectModal').modal('hide');
            }
            else{
                alert('Please choose categories...');
                // console.log(category_id);
                // console.log(subcategory_id);
                // console.log(subsubcategory_id);
            }
        }

        var i = 0;
        function add_more_customer_choice_option(i, name){
    		$('#customer_choice_options').append('<div class="row mb-3"><div class="col-8 col-md-3 order-1 order-md-0"><input type="hidden" name="choice_no[]" value="'+i+'"><input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="Choice Title" readonly></div><div class="col-12 col-md-7 col-xl-8 order-3 order-md-0 mt-2 mt-md-0"><input type="text" class="form-control tagsInput choice-values" name="choice_options_'+i+'[]" placeholder="Enter choice values" onchange="update_sku()"></div><div class="col-4 col-xl-1 col-md-2 order-2 order-md-0 text-right"><button type="button" onclick="delete_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button></div></div>');
    		 i++;
            $('.tagsInput').tagsinput('items');
    	}

    	$('input[name="colors_active"]').on('change', function() {
    	    if(!$('input[name="colors_active"]').is(':checked')){
    			$('#colors').prop('disabled', true);
    		}
    		else{
    			$('#colors').prop('disabled', false);
    		}
    		update_sku();
    	});

    	$('#colors').on('change', function() {
    	    update_sku();
    	});

    	$('input[name="unit_price"]').on('keyup', function() {
    	    update_sku();
    	});

        $('input[name="name"]').on('keyup', function() {
    	    update_sku();
    	});

        $('#choice_attributes').on('change', function() {
    		$('#customer_choice_options').html(null);
    		$.each($("#choice_attributes option:selected"), function(){
                add_more_customer_choice_option($(this).val(), $(this).text());
            });
    		update_sku();
    	});

    	function delete_row(em){
    		$(em).closest('.row').remove();
    		update_sku();
    	}

    	function update_sku(){
    	    
            $.ajax({
    		   type:"POST",
    		   url:'{{ route('products.sku_combination') }}',
    		   data:$('#choice_form').serialize(),
    		   success: function(data){
    			   $('#sku_combination').html(data);
    			   if (data.length > 1) {
    				   $('#quantity').hide();
    			   }
    			   else {
    			   		$('#quantity').show();
    			   }
    		   }
    	   });
    	}
    	
        var photo_id = 2;
        function add_more_slider_image(){
			if(photo_id!=6){
            var photoAdd =  '<div class="row">';
            photoAdd +=  '<div class="col-2">';
            photoAdd +=  '<button type="button" onclick="delete_this_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button>';
            photoAdd +=  '</div>';
            photoAdd +=  '<div class="col-10">';
            photoAdd +=  '<input type="file" name="photos[]" id="photos-'+photo_id+'" class="custom-input-file custom-input-file--4 multiImage" data-multiple-caption="{count} files selected" multiple accept="image/*" />';
            photoAdd +=  '<label for="photos-'+photo_id+'" class="mw-100 mb-3">';
            photoAdd +=  '<span></span>';
            photoAdd +=  '<strong>';
            photoAdd +=  '<i class="fa fa-upload"></i>';
            photoAdd +=  "{{__('Choose image')}}";
            photoAdd +=  '</strong>';
            photoAdd +=  '</label>';
            photoAdd +=  '</div>';
            photoAdd +=  '</div>';
            $('#product-images').append(photoAdd);

            photo_id++;
            imageInputInitialize();
			}
        }
        function delete_this_row(em){
            $(em).closest('.row').remove();
        }


        var file_id=1;
    	if (window.File && window.FileList && window.FileReader) {
    	$("#photos-1").on("change", function(e) {   	

      var files = e.target.files,
        filesLength = files.length;   
        if(file_id<=4){    
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\"><i class='fa fa-window-close' aria-hidden='true'></i></span>" +
            "</span>").insertBefore("#photos-1");
          file_id++;
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
           // file_id--;
			$("#img_count").empty();
			 var el = $('.pip');
			file_id =el.length;
			
			var count_left= 5-file_id;
			 $("#img_count").append('<b>Choose<b style="color:red;"> '+ count_left +' </b> More Images</b>');
            
          });

           
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
       
        fileReader.readAsDataURL(f);
        var el = $('.pip');
			file_id =el.length;
			var count_more=file_id+1;
			var coun_left=5-count_more;
			$("#img_count").empty();
			if(coun_left!=0){
    		 $("#img_count").append('<b>Choose<b style="color:red;"> '+ coun_left +' </b> More Images</b>');
			}else {
				   $("#img_count").append('<b>You Choosed All 5 Images</b>');
				  }
    		 
      }
  }  else {
    alert("maximum 5 Images..")
  }
    });
    	 } else {
    alert("Your browser doesn't support to File API")
  }

 