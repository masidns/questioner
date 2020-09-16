<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Layanan Add</h3>
            </div>
            <?php echo form_open('layanan/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama_layanan" class="control-label">Nama Layanan</label>
						<div class="form-group">
							<input type="text" name="nama_layanan" value="<?php echo $this->input->post('nama_layanan'); ?>" class="form-control" id="nama_layanan" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>