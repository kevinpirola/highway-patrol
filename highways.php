<?php
    global $wpdb;
    $highways_tbl = $wpdb->prefix . "highways";
    $highways = $wpdb->get_results( "SELECT *, concat(type, number, type, ' ', number) AS combinations FROM $highways_tbl" );
?>

<div class="container pt-2">
    <h2>Strade</h2>
    <small class="mb-2">Gestione delle strade disponibili nel programma</small>

    <div id="toolbar">
        <button id="remove" class="btn btn-danger" disabled>
            <i class="fa fa-times"></i> Delete
        </button>
    </div>
    <table id="highways"></table>
    
    <h3 class="mt-5">Aggiungi nuova strada</h3>
    <input/> 

    <script>
        $(document).ready(function () {
            var table = $('#highways');
            var remove = $('#remove');
            
            $('#highways').bootstrapTable({
                columns: [
                    {
                        checkbox: true
                    },{
                        field: 'type',
                        title: 'Tipo'
                    }, {
                        field: 'number',
                        title: 'Numero'
                    }, {
                        field: 'name',
                        title: 'Nome'
                    }, {
                        field: 'combinations',
                        visible: false
                    }, {
                        field: 'id',
                        visible: false
                    }
                ],
                data: <?php echo json_encode($highways) ?>,
                striped: true,
                search: true,
                showColumns: true,
                clickToSelect: true,
                singleSelect: true,
                toolbar: '#toolbar',
                checkboxHeader: false,
                idField: 'id'
            });
            
            table.on('check.bs.table uncheck.bs.table ' + 'check-all.bs.table uncheck-all.bs.table',
                    function () {
                        remove.prop('disabled', !table.bootstrapTable('getSelections').length
                    );
                // save your data, here just save the current page
                //selections = getIdSelections();
                // push or splice the selections if you want to save all data selections
            });
            
            remove.click(function () {
                var ids = getIdSelections();
                table.bootstrapTable('remove', {
                    field: 'id',
                    values: ids
                });
                remove.prop('disabled', true);
            });
            
            function getIdSelections() {
                return $.map(table.bootstrapTable('getSelections'), function (row) {
                    return row.id
                });
            }
        });
        
    </script>
</div>