/**
 * @Author: Sahebul
 * @Date:   2019-05-30T12:05:46+05:30
 * @Last modified by:   Sahebul
 * @Last modified time: 2019-05-30T12:24:32+05:30
 */
$(document).ready(function () {
  //add attributes
  $("#btnAddNewAttributes").on('click',function(){
    var attributes=$("#attributes option:selected").val();
    var attributes_text=$("#attributes option:selected").text();
    var attributes_value=$("#attributes_value option:selected").val();
    var sold_as=$("#sold_as option:selected").val();
    var price=$("#price").val();
    var inventory=$("#inventory").val();
    var tax_rate=$("#tax_rate option:selected").val();
    if(attributes == '' || attributes == null){
      $('#attributes').focus();
      if($('#attributes').parent('div').find('.text-danger').length == 0) {
          $('#attributes').after('<span class="text-danger">Select An Attributes.</span>');
      }
      return false;
    }else {
       $('#attributes').parent('div').find('.text-danger').remove();
    }
    if(attributes_value == '' || attributes_value == null){
      $('#attributes_value').focus();
      if($('#attributes_value').parent('div').find('.text-danger').length == 0) {
          $('#attributes_value').after('<span class="text-danger">Select An Attributes Value.</span>');
      }
      return false;
    }else {
       $('#attributes_value').parent('div').find('.text-danger').remove();
    }
    if(sold_as == '' || sold_as == null){
      $('#sold_as').focus();
      if($('#sold_as').parent('div').find('.text-danger').length == 0) {
          $('#sold_as').after('<span class="text-danger">Select a sold as.</span>');
      }
      return false;
    }else {
       $('#sold_as').parent('div').find('.text-danger').remove();
    }
    if(price == '' || price == null){
      $('#price').focus();
      if($('#price').parent('div').find('.text-danger').length == 0) {
          $('#price').after('<span class="text-danger">Enter price.</span>');
      }
      return false;
    }else {
       $('#price').parent('div').find('.text-danger').remove();
    }
    if(inventory == '' || inventory == null){
      $('#inventory').focus();
      if($('#inventory').parent('div').find('.text-danger').length == 0) {
          $('#inventory').after('<span class="text-danger">Enter Inventory.</span>');
      }
      return false;
    }else {
       $('#inventory').parent('div').find('.text-danger').remove();
    }
    if(tax_rate == '' || tax_rate == null){
      $('#tax_rate').focus();
      if($('#tax_rate').parent('div').find('.text-danger').length == 0) {
          $('#tax_rate').after('<span class="text-danger">Select Tax Rate.</span>');
      }
      return false;
    }else {
       $('#tax_rate').parent('div').find('.text-danger').remove();
    }
    var new_row='<tr >'+
      '<td><input type="hidden" class="form-control" readonly name="attributes[]" value="'+attributes+'"><input type="text" class="form-control" readonly name="attributes_text[]" value="'+attributes_text+'"></td>'+
      '<td><input type="text" class="form-control"  readonly name="attributes_value[]" value="'+attributes_value+'" ></td>'+
      '<td><input type="text" class="form-control" readonly name="sold_as[]" value="'+sold_as+'"></td>'+
      '<td><input type="text" class="form-control"  name="price[]" value="'+price+'"></td>'+
      '<td><input type="text" class="form-control"  name="inventory[]" value="'+inventory+'" ></td>'+
      '<td><input type="text" class="form-control"  name="tax_rate[]" value="'+tax_rate+'"></td>'+
      '<td><a href="#!" class="btn-danger btn-circle btn-sm text-white btn_remove_row" onclick="removeROW(this);" ><i class="fas fa-trash-alt"></i></a></td>'+
    '</tr>';
    $("#tbl_attributes tbody").append(new_row);
    clearText();
  });
  //end of add attributes
  clearText=function(){
    $("#attributes").val('');
    $("#attributes_value").val('');
    $("#sold_as").val('');
    $("#price").val('');
    $("#inventory").val('');
    $("#tax_rate").val('');
  }
  //remove an added table row
  removeROW=function(row){
    row.closest('tr').remove();
  }
  //change attributes
  $("#attributes").on('change',function(){
     var attributes = $(this).find(':selected').attr('data-attr_values');
     if(attributes !=null){
       var attributes_value=JSON.parse(attributes);
       var attrSelect=$("#attributes_value");
       attrSelect.html('');
       attrSelect.append(
       $('<option></option>').val('').html("Please Select")
      );
       $.each(attributes_value,function(key,val){
         attrSelect.append(
         $('<option></option>').val(val.value).html(val.value)
        );
       });
     }
  });
  // end of change attributes


});
