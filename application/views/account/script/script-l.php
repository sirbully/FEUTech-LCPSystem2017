    <script>
    $(document).ready(function() {
        $('#logs').DataTable({
            "ajax": {
                url: "<?=base_url()?>dashboard/jsonl",
                dataSrc: "logs",
            },
            "columns": [
                { "data": "timestamp" },
                { "data": "user" },
                { "data": "activity" }
            ],
            "columnDefs": [
                { "width": "15%", "targets": 0 },
                { "width": "20%", "targets": 1 }
            ],
            "order": [ 0, 'desc']
        });
    });
    </script>
