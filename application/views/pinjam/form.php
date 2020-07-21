<div class="card" >
    <div class="card-header ">Form Peminjaman Buku</div>
    <div class="card-body">
        <form id="FormPeminjaman">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Peminjam </label>
                <div class="col-sm-4 ">
                    <select name="" class="form-control" id="nama_peminjam">
                        <option value="">0</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Pinjam </label>
                <div class="col-sm-3">
                    <input type="text" name="tanggal" class="form-control datepicker" id="tglPinjam">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Pengembalian </label>
                <div class="col-sm-3">
                    <input type="text" class="form-control datepicker_dua" id="tglKembali">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Buku yang dipinjam </label>
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <select name="" class="form-control" id="cmb_buku">
                            <option value="">0</option>
                        </select>
                        <input type="number" id="txt_jumlah" class="form-control " placeholder="Jml Pinjam"  >
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" id="btn_add">Add Item</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">&nbsp;</label>
                <div class="col-sm-3">
                    <button id="proses_pinjam" class="btn btn-success" type="button">Proses Pinjam</button>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">&nbsp; </label>
                <div class="col-sm-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Pengarang</th>
                                <th scope="col">Jumlah Pinjam</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="DataItem">
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        
        $('.datepicker').datepicker({
            onSelect: function(dateText, inst){
                $(".datepicker_dua").datepicker('option', 'minDate', dateText);
            },
            dateFormat:"yy-mm-dd",
        });


        $('.datepicker_dua').datepicker({
            dateFormat:"yy-mm-dd",
        });

        $.ajax({
            url:'<?php echo site_url('member') ?>',
            dataType:'json',
            type:'GET',
            success:function(res){
                let option ="";
                for(let i=0; i<res.data.length; i++){
                    option +="<option value='"+res.data[i].nim+"'>"+res.data[i].nama+"</option>"
                }
                $('#nama_peminjam').html(option);
            }
        });

        $.ajax({
            url:'<?php echo site_url('buku') ?>',
            dataType:'json',
            type:'GET',
            success:function(res){
                let option ="<option value='0'>--Select Buku--</option>";
                for(let i=0; i<res.data.length; i++){
                    option +="<option value='"+res.data[i].id+"'>"+res.data[i].judul+"</option>"
                }
                $('#cmb_buku').html(option);
            }
        });

        var rowItem = [];

        $.fn.showItem=function(){
            let html ="";
            for(let i=0; i<rowItem.length; i++){
                let no = i+1;
                html += '<tr>';
                html += '<td scope="row">'+no+'</td>';
                html += '<td>'+rowItem[i].judul+'</td>';
                html += '<td>'+rowItem[i].pengarang+'</td>';
                html += '<td>'+rowItem[i].jml+'</td>';
                html += '<td><button type="button" data-id="'+i+'" onclick="$(this).deleteItem()" class="btn btn-danger">Delete</button></td>';
                html += '</tr>';

            }
            $('#DataItem').html(html);
        }

        $.fn.deleteItem = function(){
            let id = $(this).data('id');
            let newItem =[];
            
            for(let i=0; i<rowItem.length; i++){
                if(i !=id)
                    newItem.push(rowItem[i])
            }
            rowItem = newItem;
            $(this).showItem();
        }
        
        $('#btn_add').click(function(){
            let idbuku = $('#cmb_buku').val();
            let jml     = $('#txt_jumlah').val();
            $.ajax({
                url:'<?php echo site_url('buku') ?>',
                data:{id:idbuku},
                dataType:'json',
                type:'POST',
                success:function(res){
                    var item = res.data[0];
                    item['jml'] = jml;
                    
                    rowItem.push(item);

                    $(this).showItem();

                    $('#txt_jumlah').val('')
                    $('#cmb_buku').val(0);
                }
            });
        });

        $('#proses_pinjam').click(function(){
            let data = {
                peminjam  : $('#nama_peminjam').val(),
                tglpinjam : $('#tglPinjam').val(),
                tglkembali: $('#tglKembali').val(),
                detail    : rowItem 
            }
            
            $.ajax({
                url:'<?php echo site_url('pinjam/add'); ?>',
                data:data,
                dataType:'json',
                type:'POST',
                success:function(res){
                    alert(res.messages)
                    $('#nama_peminjam').val('')
                    $('#tglPinjam').val('')
                    $('#tglKembali').val('')
                    rowItem = [];
                    $(this).showItem();
                    // let title = (res.status==true)?"Success":"Error";
                    // let icon = (res.status==true)?"success":"error";
                    // Swal.fire({
                    //     title: title,
                    //     text: res.messages,
                    //     icon: icon,
                    //     confirmButtonText: 'Ok'
                    // });
                }
            });
        });
    });
</script>