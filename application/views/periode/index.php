<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Periode Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('periode/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Periode</th>
						<th>Id Thakademik</th>
						<th>Id Prog Studi</th>
						<th>Jml Mhs Aktif</th>
						<th>Jml Responden</th>
						<th>Persentase Responden</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($periode as $p){ ?>
                    <tr>
						<td><?php echo $p['id_periode']; ?></td>
						<td><?php echo $p['id_thakademik']; ?></td>
						<td><?php echo $p['id_prog_studi']; ?></td>
						<td><?php echo $p['jml_mhs_aktif']; ?></td>
						<td><?php echo $p['jml_responden']; ?></td>
						<td><?php echo $p['persentase_responden']; ?></td>
						<td>
                            <a href="<?php echo site_url('periode/edit/'.$p['id_periode']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('periode/remove/'.$p['id_periode']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
