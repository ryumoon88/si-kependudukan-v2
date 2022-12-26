// import $ from 'jquery';
// import 'bootstrap';
import DataTable from 'datatables.net-bs5';
import 'datatables.net-buttons-bs5';
import 'datatables.net-select-bs5';
import 'datatables.net-responsive-bs5';
import './dataTables.buttons.js';
import './dataTables.renderers.js';

window.jQuery = window.$ = $
window.DataTable = DataTable;

$.extend(true, DataTable.defaults, {
    dom:
        // "<'row'<'col-sm-12 mb-4'B>>" +
        "<'d-flex justify-content-between'<l><f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
});

$.extend(true, DataTable.Buttons.defaults, {
    dom: {
        buttonLiner: {
            tag: ''
        },
    },
});

$.extend(DataTable.ext.classes, {
    sTable: "dataTable table table-borderless table-hover w-100 responsive",
});
