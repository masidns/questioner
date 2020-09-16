<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Nilai Kepuasan Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('nilai_kepuasan/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Nilai</th>
						<th>Id Periode</th>
						<th>Id Kuisioner</th>
						<th>Id Range</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($nilai_kepuasan as $n){ ?>
                    <tr>
						<td><?php echo $n['id_nilai']; ?></td>
						<td><?php echo $n['id_periode']; ?></td>
						<td><?php echo $n['id_kuisioner']; ?></td>
						<td><?php echo $n['id_range']; ?></td>
						<td>
                            <a href="<?php echo site_url('nilai_kepuasan/edit/'.$n['id_nilai']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('nilai_kepuasan/remove/'.$n['id_nilai']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
