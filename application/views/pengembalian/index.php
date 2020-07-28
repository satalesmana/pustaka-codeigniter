<div class="card shadow mb-12">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Peminjaman</h6>
    </div>

    <div class="card-body">
        <button id="btn_reload" class="btn btn-primary">Relod</button>
        <br>
        <br>
        <table id="tbl_pinjaman" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID PINJAM</th>
                    <th>PEMINJAM</th>
                    <th>TANGGAL PINJAM</th>
                    <th>TGL KEMBALI</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID PINJAM</th>
                    <th>PEMINJAM</th>
                    <th>TANGGAL PINJAM</th>
                    <th>TGL KEMBALI</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    var tbl_pinjaman = $('#tbl_pinjaman').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo site_url('pinjam/getlist'); ?>",
        "columns":[
            {"data":"idpinjam"},
            {"data":"idpeminjam"},
            {"data":"tglPinjam"},
            {"data":"tglKembali"},
            {
                "data" : "status",
                render:function(data,type,row){
                    if(data>0)
                        return `<span class="badge badge-success">Close</span>`;
                    else
                        return `<span class="badge badge-secondary">Open</span>`;
                }
            },
            { data: null, "width": "10%",
                "className":'row-item',
                defaultContent: '<button class="btn-kembalikan-article btn btn-info btn-sm">Return</button>'
            }
        ]
    });

    $('#btn_reload').click(function(){
        tbl_pinjaman.ajax.reload();
    })
});
</script>