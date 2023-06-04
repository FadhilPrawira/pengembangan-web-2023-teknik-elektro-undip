/**
 * @Author: Sahebul
 * @Date:   2019-05-27T10:05:46+05:30
 * @Last modified by:   Sahebul
 * @Last modified time: 2019-05-27T10:24:32+05:30
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
        "sAjaxSource": ADMIN_URL + "attributes/get_attributes",
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
            { "data": "attributes_id" },
            { "data": "name" },
            { "data": "values" },

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
                var stringValue="";
                var num=1;
                if(row.values){

                  var dataValue=JSON.parse(row.values);

                  for(var i=0;i<dataValue.length;i++){
                      stringValue += dataValue[i].value;
                      if(num !=dataValue.length)
                      stringValue +=","
                      num=num+1;
                  }
                }
                return stringValue ;
              },
              "targets": $('#myTable th#attr_values').index(),
              "orderable": true,
              "bSortable": true
          },
          {
              "render": function (data, type, row) {
                    return '<a class="btn-primary btn-circle btn-sm" href="'+ADMIN_URL+'attributes/edit/'+row.attributes_id+'" ><i class="fas fa-pencil-alt"></i></a> <a class="btn-danger btn-circle btn-sm text-white"  data-attributes_id='+row.attributes_id+' id="btnDelete"><i class="fas fa-trash-alt"></i></a>' ;
              },
              "targets": $('#myTable th#action').index(),
              "orderable": true,
              "bSortable": true
          }
        ]

    });
    $('.dataTables_filter input').attr('placeholder', 'Search...');

    $("#myTable").on('click','#btnDelete',function(){
      var attributes_id=$(this).data('attributes_id');
      if(confirm("Are you sure?")){
          var url=ADMIN_URL+'attributes/delete';
          var param={attributes_id:attributes_id};
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
});
