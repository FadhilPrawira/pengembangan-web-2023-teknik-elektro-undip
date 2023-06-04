/**
 * @Author: Sahebul
 * @Date:   2019-06-11T16:48:25+05:30
 * @Last modified by:   Sahebul
 * @Last modified time: 2019-06-11T16:48:42+05:30
 */

$(document).ready(function () {
  //add attributes
  $("#btnAddProduct").on('click',function(){
    var prod_id=$("#product option:selected").val();
    var category_id=$("#product_category option:selected").val();
    var brand_id=$("#prod_brand option:selected").val();
    var attributes_value=$("#product option:selected").attr('data-attributes_value');
    var sold_as=$("#product option:selected").attr('data-sold_as');
    var price=$("#product option:selected").attr('data-price');
    var product_name=$("#product option:selected").attr('data-product_name');
    var tax_rate=$("#product option:selected").attr('data-tax_rate');

    var qty=$("#quantity").val();
    var total_amount=parseFloat(price) + parseFloat(price)*parseFloat(tax_rate)/100;
    total_amount=(parseFloat(total_amount)*parseInt(qty));
    if(category_id == '' || category_id == null){
      $('#product_category').focus();
      if($('#product_category').parent('div').find('.text-danger').length == 0) {
          $('#product_category').after('<span class="text-danger">Select a category.</span>');
      }
      return false;
    }else {
       $('#product_category').parent('div').find('.text-danger').remove();
    }
    if(brand_id == '' || brand_id == null){
      $('#prod_brand').focus();
      if($('#prod_brand').parent('div').find('.text-danger').length == 0) {
          $('#prod_brand').after('<span class="text-danger">Select a brand.</span>');
      }
      return false;
    }else {
       $('#prod_brand').parent('div').find('.text-danger').remove();
    }
    if(prod_id == '' || prod_id == null){
      $('#product').focus();
      if($('#product').parent('div').find('.text-danger').length == 0) {
          $('#product').after('<span class="text-danger">Select a product.</span>');
      }
      return false;
    }else {
       $('#product').parent('div').find('.text-danger').remove();
    }
    if(qty == '' || qty == null){
      $('#quantity').focus();
      if($('#quantity').parent('div').find('.text-danger').length == 0) {
          $('#quantity').after('<span class="text-danger">Enter quantity.</span>');
      }
      return false;
    }else {
       $('#quantity').parent('div').find('.text-danger').remove();
    }

    var new_row='<tr >'+
      '<td>'+product_name+'<input type="hidden" class="form-control" readonly name="prod_id[]" value="'+prod_id+'"></td>'+
      '<td>'+attributes_value+'<input type="hidden" class="form-control"  readonly name="attributes_value[]" value="'+attributes_value+'" ></td>'+
      '<td>'+sold_as+'<input type="hidden" class="form-control" readonly name="sold_as[]" value="'+sold_as+'"></td>'+
      '<td>'+price+'<input type="hidden" class="form-control"  name="price[]" value="'+price+'"></td>'+
      '<td>'+qty+'<input type="hidden" class="form-control"  name="qty[]" value="'+qty+'"></td>'+
      '<td>'+tax_rate+'<input type="hidden" class="form-control"  name="tax_rate[]" value="'+tax_rate+'"></td>'+
      '<td>'+total_amount.toFixed(2)+'<input type="hidden" class="form-control"  name="total_amount[]" value="'+total_amount.toFixed(2)+'"></td>'+
      '<td><a href="#!" class="btn-danger btn-circle btn-sm text-white btn_remove_row" onclick="removeROW(this);" ><i class="fas fa-trash-alt"></i></a></td>'+
    '</tr>';

    $("#tbl_attributes tbody").append(new_row);
    // clearText();
  });

  //remove an added table row
  removeROW=function(row){
    row.closest('tr').remove();
  }

  // end of change attributes
  $("#prod_brand").on('change',function(){
    var category_id=$("#product_category option:selected").val();
    var brand_id=$("#prod_brand option:selected").val();
    $.ajax({
        type: "post",
        url: ADMIN_URL+"sales/get_product_by_filter",
        data: {
            category_id: category_id,
            brand_id: brand_id
        },
        success: function(data) {
            $("#product").html(data);
        }
    });
  })

});
