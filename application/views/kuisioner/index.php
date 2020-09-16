<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kuisioner Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('kuisioner/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Kuisioner</th>
						<th>Pertanyaan</th>
						<th>Id Aspek</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($kuisioner as $k){ ?>
                    <tr>
						<td><?php echo $k['id_kuisioner']; ?></td>
						<td><?php echo $k['pertanyaan']; ?></td>
						<td><?php echo $k['id_aspek']; ?></td>
						<td>
                            <a href="<?php echo site_url('kuisioner/edit/'.$k['id_kuisioner']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('kuisioner/remove/'.$k['id_kuisioner']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
