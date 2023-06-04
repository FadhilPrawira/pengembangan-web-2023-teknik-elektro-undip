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
        "sAjaxSource": ADMIN_URL + "products/get_persediaans",
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
            { "data": "no_kuitansi" },
            { "data": "uraian" },
            { "data": "tanggal" },

            { "data": "tahun" },
            { "data": "subtotal" },
            { "data": "status" },
            { "data": "posisi_terakhir" },
            { "data": "kode_usulan_belanja" },

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
                    return '<a class="btn btn-outline-primary btn-sm cekBarang" data-no_kuitansi="'+row.no_kuitansi+'" href="#!" >Cek Barang <i class="far fa-hand-pointer"></i> </a>' ;
              },
              "targets": $('#myTable th#inventory').index(),
              "orderable": true,
              "bSortable": true
          },
          {
              "render": function (data, type, row) {
                    return '<a class="btn-primary btn-circle btn-sm" href="'+ADMIN_URL+'products/edit/'+row.no_kuitansi+'" ><i class="fas fa-pencil-alt"></i></a> <a class="btn-danger btn-circle btn-sm text-white"  data-no_kuitansi='+row.kode_usulan_belanja+' id="btnDelete"><i class="fas fa-trash-alt"></i></a>' ;
              },
              "targets": $('#myTable th#action').index(),
              "orderable": true,
              "bSortable": true
          }
        ]

    });
    $('.dataTables_filter input').attr('placeholder', 'Search...');

    $("#myTable").on('click','#btnDelete',function(){
      var kode_usulan_belanja=$(this).data('kode_usulan_belanja');
      if(confirm("Are you sure?")){
          var url=ADMIN_URL+'products/delete';
          var param={kode_usulan_belanja:kode_usulan_belanja};
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
          console.log("failed");
        });
      }
    })
    $("#myTable").on('click','.cekBarang',function(){
          var no_kuitansi=$(this).data('no_kuitansi');
          var url=ADMIN_URL+'products/get_persediaans_line';
          var param={no_kuitansi:no_kuitansi};
          trigger_ajax(url,param).done(function(res){
          var res = JSON.parse(res);
          console.log(res['data']);
          var html="";
          if(res['type'] === "success"){
             $.each(res['data'],function(key,val){
               //var sell_price=parseFloat(val.price)+parseFloat(val.price)*(parseInt(val.tax_rate)/100);
               // var imag="";
               // if(val.image_path == "" || val.image_path== null){
               //   imag=BASE_URL+"assets/img/not-found.png";
               // }else {
               //   imag=val.image_path;
               // }
            html +='<div class="row">\
                  <div class="col-sm-8">\
                <div class="row">\
                  <div class="col-sm-12">\
                    <div class="no"> <b>No: </b>'+val.no+'</div>\
                  </div>\
                  <div class="col-sm-12">\
                    <div class="barang"> <b>Barang: </b>'+val.barang+'</div>\
                  </div>\
                  <div class="col-sm-12">\
                    <div class="jumlah"> <b>Jumlah: </b>'+val.jumlah+'</div>\
                  </div>\
                  <div class="col-sm-12">\
                    <div class="satuan"> <b>Satuan: </b>'+val.satuan+'</div>\
                  </div>\
                  <div class="col-sm-12">\
                    <div class="harga"> <b>Harga: </b>'+val.harga+'</div>\
                  </div>\
                  <div class="col-sm-12">\
                    <div class="subtotal"> <b>Subtotal: </b>'+val.subtotal+'</div>\
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
          console.log("failed");
        });
    })
});
