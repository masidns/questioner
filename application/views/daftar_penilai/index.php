<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Penilai Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('daftar_penilai/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Penilai</th>
						<th>Id Mhs</th>
						<th>Id Periode</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($daftar_penilai as $d){ ?>
                    <tr>
						<td><?php echo $d['id_penilai']; ?></td>
						<td><?php echo $d['id_mhs']; ?></td>
						<td><?php echo $d['id_periode']; ?></td>
						<td>
                            <a href="<?php echo site_url('daftar_penilai/edit/'.$d['id_penilai']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('daftar_penilai/remove/'.$d['id_penilai']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
