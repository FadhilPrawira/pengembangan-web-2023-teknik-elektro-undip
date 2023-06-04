/**
 * @Author: Sahebul
 * @Date:   2019-05-24T14:30:15+05:30
 * @Last modified by:   Sahebul
 * @Last modified time: 2019-05-25T10:25:50+05:30
 */



$(document).ready(function () {
    var actvityTable = $('#myTable').dataTable({
        "bStateSave": true,
        "processing": true,
        "bPaginate": true,
        "serverSide": true,
        "bProcessing": true,
        "iDisplayLength": 10,
        "bServerSide": true,
        "sAjaxSource": ADMIN_URL + "activity/get_activities",
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
            { "data": "activity_id" },
            { "data": "activity" },

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

        ]

    });
    $('.dataTables_filter input').attr('placeholder', 'Search...');


});
