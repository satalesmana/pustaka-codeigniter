<table class="table">
  	<thead>
    	<tr>
      		<th scope="col">#</th>
     		<th scope="col">GAMBAR</th>
			<th scope="col">JUDUL</th>
			<th scope="col">PENGARANG</th>
    	</tr>
  	</thead>
  	<tbody>
  		<?php foreach($data as $row){ ?>
    		<tr>
				<th scope="row">
					<?php 
						echo anchor("buku/delete/".$row->id,
							'<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>'); 
					?>
					<?php 
						echo anchor("buku/form/".$row->id,
							'<button class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</button>'); 
					?>
				</th>
				<td><img src="<?php echo $row->gambar; ?>" width="100px"></td>
				<td><?php echo $row->judul; ?></td>
				<td><?php echo $row->pengarang; ?></td>
    		</tr>
		<?php } ?>
  	</tbody>
</table>