<table class="table">
  	<thead>
    	<tr>
      		<th scope="col">#</th>
     		<th scope="col">NIM</th>
			<th scope="col">NAMA</th>
			<th scope="col">TELPON</th>
			<th scope="col">ALAMAT</th>
    	</tr>
  	</thead>
  	<tbody>
  		<?php foreach($data as $row){ ?>
    		<tr>
				<th scope="row">
					<?php 
						echo anchor("member/delete/".$row->id,
							'<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>'); 
					?>
					<?php 
						echo anchor("member/form/".$row->id,
							'<button class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</button>'); 
					?>
					
					
				</th>
				<td><?php echo $row->nim; ?></td>
				<td><?php echo $row->nama; ?></td>
				<td><?php echo $row->telpon; ?></td>
				<td><?php echo $row->alamat; ?></td>
    		</tr>
		<?php } ?>
  	</tbody>
</table>