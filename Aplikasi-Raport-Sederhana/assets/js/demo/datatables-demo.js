// Call the dataTables jQuery plugin
//$(document).ready(function() {
  //$('#dataTable').DataTable();
//});

$(document).ready(function () {
    $('#dataTable').DataTable({
        language : {
           url : 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
		}
    });
});
