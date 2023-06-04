/**
 * @Author: Sahebul
 * @Date:   2019-05-30T12:05:46+05:30
 * @Last modified by:   Sahebul
 * @Last modified time: 2019-05-30T12:24:32+05:30
 */
$(document).ready(function () {
  var maxValue = 0;
  var maxValuerem = 0;
  //add attributes
  $('#jumlah, #harga').on('keyup', function() {
    var jumlah = $('#jumlah').val();
    var harga = $('#harga').val();
    var subtotal = jumlah * harga;
    $('#subtotal').val(subtotal);
  });
  function calculateTotal() {
  var subtotalInputs = document.getElementsByName("subtotalline[]");
  var total = 0;

  for (var i = 0; i < subtotalInputs.length; i++) {
    total += parseFloat(subtotalInputs[i].value);
    //console.log(parseFloat(subtotalInputs[i].value));

  }
  $('#total_harga').val(total);

}
  $("#tambahbarang").click(function() {

    $("input[name='no[]']").each(function(index, value) {
    var currentValue = parseInt($(value).val());

  if (currentValue > maxValue) {
    maxValue = currentValue;
  }
  });
  if (maxValuerem==1)
  {
    $('#no').val(maxValue);
    maxValuerem = 0;

  }
  else {
    $('#no').val(maxValue+1);
  }
});
  $("#btnAddNewAttributes").on('click',function(){

    var no=$("#no").val();
    var barang=$("#barang").val();
    var jumlah=$("#jumlah").val();
    var satuan=$("#satuan").val();
    var harga=$("#harga").val();
    var subtotal=$("#subtotal").val();


    if(no == '' || no == null){
      $('#no').focus();
      if($('#no').parent('div').find('.text-danger').length == 0) {
          $('#no').after('<span class="text-danger">Nomor belum diinput.</span>');
      }
      return false;
    }else {
       $('#no').parent('div').find('.text-danger').remove();
    }
    if(barang == '' || barang == null){
      $('#barang').focus();
      if($('#barang').parent('div').find('.text-danger').length == 0) {
          $('#barang').after('<span class="text-danger">Barang belum diinput.</span>');
      }
      return false;
    }else {
       $('#barang').parent('div').find('.text-danger').remove();
    }
    if(jumlah == '' || jumlah == null){
      $('#jumlah').focus();
      if($('#jumlah').parent('div').find('.text-danger').length == 0) {
          $('#jumlah').after('<span class="text-danger">Jumlah belum diinput.</span>');
      }
      return false;
    }else {
       $('#jumlah').parent('div').find('.text-danger').remove();
    }
    if(satuan == '' || satuan == null){
      $('#satuan').focus();
      if($('#satuan').parent('div').find('.text-danger').length == 0) {
          $('#satuan').after('<span class="text-danger">Satuan belum diinput.</span>');
      }
      return false;
    }else {
       $('#satuan').parent('div').find('.text-danger').remove();
    }
    if(harga == '' || harga == null){
      $('#harga').focus();
      if($('#harga').parent('div').find('.text-danger').length == 0) {
          $('#harga').after('<span class="text-danger">Harga belum diinput.</span>');
      }
      return false;
    }else {
       $('#harga').parent('div').find('.text-danger').remove();
    }

    var new_row='<tr >'+
      '<td><input type="text" class="form-control"  name="no[]" value="'+no+'" ></td>'+
      '<td><input type="text" class="form-control"  name="barang[]" value="'+barang+'"></td>'+
      '<td><input type="text" class="form-control"  name="jumlah[]" value="'+jumlah+'"></td>'+
      '<td><input type="text" class="form-control"  name="satuan[]" value="'+satuan+'" ></td>'+
      '<td><input type="text" class="form-control"  name="harga[]" value="'+harga+'"></td>'+
      '<td><input type="text" class="form-control"  name="subtotal[]" value="'+subtotal+'"></td>'+
      '<td><a href="#!" class="btn-danger btn-circle btn-sm text-white btn_remove_row" onclick="removepersediaanlineROW(this);" ><i class="fas fa-trash-alt"></i></a></td>'+
    '</tr>';
    $("#tbl_attributes tbody").append(new_row);
    clearText();
    $("input[name='no[]']").each(function(index, value) {
    var currentValue = parseInt($(value).val());

  if (currentValue > maxValue) {
    maxValue = currentValue;
  }
  });
      if (maxValuerem==1)
      {
        $('#no').val(maxValue);

      }
      else {
        $('#no').val(maxValue+1);

      }
      calculateTotal();

  });
  //end of add attributes
  clearText=function(){
    $("#no").val('');
    $("#barang").val('');
    $("#jumlah").val('');
    $("#satuan").val('');
    $("#harga").val('');
    $("#subtotal").val('');
  }

  //remove an added table row
  removepersediaanlineROW=function(row){
    row.closest('tr').remove();
    var currentValuerem = $('#no').val();
    if (currentValuerem)
    {
maxValuerem = 1;
    }
calculateTotal();
  }
  //change attributes

  // end of change attributes


});
