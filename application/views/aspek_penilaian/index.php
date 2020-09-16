<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Aspek Penilaian Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('aspek_penilaian/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Aspek</th>
						<th>Nm Aspek</th>
						<th>Deskripsi</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($aspek_penilaian as $a){ ?>
                    <tr>
						<td><?php echo $a['id_aspek']; ?></td>
						<td><?php echo $a['nm_aspek']; ?></td>
						<td><?php echo $a['deskripsi']; ?></td>
						<td>
                            <a href="<?php echo site_url('aspek_penilaian/edit/'.$a['id_aspek']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('aspek_penilaian/remove/'.$a['id_aspek']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
