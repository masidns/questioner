<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Grup Kuisioner Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('grup_kuisioner/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Grup</th>
						<th>Id Kuisioner</th>
						<th>Id Layanan</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($grup_kuisioner as $g){ ?>
                    <tr>
						<td><?php echo $g['id_grup']; ?></td>
						<td><?php echo $g['id_kuisioner']; ?></td>
						<td><?php echo $g['id_layanan']; ?></td>
						<td>
                            <a href="<?php echo site_url('grup_kuisioner/edit/'.$g['id_grup']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('grup_kuisioner/remove/'.$g['id_grup']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
