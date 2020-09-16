<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Hasil Penilaian Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('hasil_penilaian/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Npm</th>
						<th>Jumlah</th>
						<th>Id Layanan</th>
						<th>Id Periode</th>
						<th>Id Aspek</th>
						<th>Id Range</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($hasil_penilaian as $h){ ?>
                    <tr>
						<td><?php echo $h['npm']; ?></td>
						<td><?php echo $h['jumlah']; ?></td>
						<td><?php echo $h['id_layanan']; ?></td>
						<td><?php echo $h['id_periode']; ?></td>
						<td><?php echo $h['id_aspek']; ?></td>
						<td><?php echo $h['id_range']; ?></td>
						<td>
                            <a href="<?php echo site_url('hasil_penilaian/edit/'.$h['npm']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('hasil_penilaian/remove/'.$h['npm']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
