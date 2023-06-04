/**
 * @Author: Sahebul
 * @Date:   2019-05-29T12:05:46+05:30
 * @Last modified by:   Sahebul
 * @Last modified time: 2019-05-29T12:24:32+05:30
 */
$(document).ready(function () {
    var myTable = $('#myTable').dataTable({
        "bStateSave": true,
        "processing": true,
        "bPaginate": true,
        "serverSide": true,
        "bProcessing": true,
        "iDisplayLength": 10,
        "bServerSide": true,
        "sAjaxSource": ADMIN_URL + "products/get_products",
        'bPaginate': true,
        "fnServerParams": function (aoData) {
            var acolumns = this.fnSettings().aoColumns,
                columns = [];
            $.each(acolumns, function (i, item) {
                columns.push(item.data);
            })
            aoData.push({name: 'columns', value: columns});
        },
        "columns": [
            { "data": "prod_id" },
            { "data": "image_path" },
            { "data": "name" },
            { "data": "category_name" },
            { "data": "brand_name" },
            { "data": "prod_id" },
            { "data": "prod_id" },

        ],
        "order": [

            [ 0, "desc" ]

        ],
        "lengthMenu": [

            [10, 25, 50, 100],

            [10, 25, 50, 100]

        ],
        "oLanguage": {

            "sLengthMenu": "_MENU_"

        },
        "fnInitComplete": function () {
            //oTable.fnAdjustColumnSizing();
        },
        'fnServerData': function (sSource, aoData, fnCallback) {
            $.ajax
            ({
              'dataType': 'json',
                'type': 'POST',
                'url': sSource,
                'data': aoData,
                'success': fnCallback
            });
        },
        "fnDrawCallback": function () {
            $('body').css('min-height', ($('#table1 tr').length * 50) + 200);
            $(window).trigger('resize');

        },
        "columnDefs": [
          {
              "render": function (data, type, row) {
                if(row.image_path == "" || row.image_path == null){
                  return '<img src="'+BASE_URL+'assets/img/not-found.png" width="30" height="30"/>' ;
                }else {
                  return '<img src="'+row.image_path+'" width="30" height="30"/>' ;
                }

              },
              "targets": $('#myTable th#image').index(),
              "orderable": true,
              "bSortable": true
          },
          {
              "render": function (data, type, row) {
                    return '<a class="btn btn-outline-primary btn-sm checkInventory" data-prod_id="'+row.prod_id+'" href="#!" >Check Inventory & Price <i class="far fa-hand-pointer"></i> </a>' ;
              },
              "targets": $('#myTable th#inventory').index(),
              "orderable": true,
              "bSortable": true
          },
          {
              "render": function (data, type, row) {
                    return '<a class="btn-primary btn-circle btn-sm" href="'+ADMIN_URL+'products/edit/'+row.prod_id+'" ><i class="fas fa-pencil-alt"></i></a> <a class="btn-danger btn-circle btn-sm text-white"  data-prod_id='+row.prod_id+' id="btnDelete"><i class="fas fa-trash-alt"></i></a>' ;
              },
              "targets": $('#myTable th#action').index(),
              "orderable": true,
              "bSortable": true
          }
        ]

    });
    $('.dataTables_filter input').attr('placeholder', 'Search...');

    $("#myTable").on('click','#btnDelete',function(){
      var prod_id=$(this).data('prod_id');
      if(confirm("Are you sure?")){
          var url=ADMIN_URL+'products/delete';
          var param={prod_id:prod_id};
          trigger_ajax(url,param).done(function(res){
          var res = JSON.parse(res);
          if(res['type'] === "success"){
            var myTable = $('#myTable').DataTable();
            // If you want totally refresh the datatable use this
            // myTable.ajax.reload();
            // If you want to refresh but keep the paging you can you this
            myTable.ajax.reload( null, false );
          }
        }).fail(function(){
          console.log("falied");
        });
      }
    })
    $("#myTable").on('click','.checkInventory',function(){
          var prod_id=$(this).data('prod_id');
          var url=ADMIN_URL+'products/get_product_inventory';
          var param={prod_id:prod_id};
          trigger_ajax(url,param).done(function(res){
          var res = JSON.parse(res);
          console.log(res['data']);
          var html="";
          if(res['type'] === "success"){
             $.each(res['data'],function(key,val){
               var sell_price=parseFloat(val.price)+parseFloat(val.price)*(parseInt(val.tax_rate)/100);
               var imag="";
               if(val.image_path == "" || val.image_path== null){
                 imag=BASE_URL+"assets/img/not-found.png";
               }else {
                 imag=val.image_path;
               }
            html +='<div class="row">\
              <div class="col-sm-4">\
                <img width="100" height="100" src="'+imag+'" id="product_image"/>\
              </div>\
              <div class="col-sm-8">\
                <div class="row">\
                  <div class="col-sm-12">\
                    <div class="product_name"> <b>Product Name: </b>'+val.product_name+'</div>\
                  </div>\
                  <div class="col-sm-12">\
                    <div class="product_name"> <b>Sold As: </b>'+val.sold_as+'</div>\
                  </div>\
                  <div class="col-sm-12">\
                    <div class="product_attribute"><b>'+val.attributes_name+' : </b>'+val.attributes_value+'</div>\
                  </div>\
                  <div class="col-sm-12">\
                    <div class="product_price"><b>Price: </b>'+val.price+'</div>\
                  </div>\
                  <div class="col-sm-12">\
                    <div class="product_tax_rate"><b>Tax Rate: </b>'+val.tax_rate+' %</div>\
                  </div>\
                  <div class="col-sm-12">\
                    <div class="product_selling_price"><b>Selling Price: </b>'+sell_price+'</div>\
                  </div>\
                  <div class="col-sm-12">\
                    <div class="product_inventory"><b>Inventory Available: </b>'+val.inventory+'</div>\
                  </div>\
                </div>\
              </div>\
            </div>';
            if(res['data'].length>1 && key < res['data'].length-1){
              html +="<hr/>"
            }
          });
            $("#inventory_modal_body").html(html);
            $("#InventoryModal").modal('show');
          }
        }).fail(function(){
          console.log("falied");
        });
    })
});
