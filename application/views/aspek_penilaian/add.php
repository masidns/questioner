<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Aspek Penilaian Add</h3>
            </div>
            <?php echo form_open('aspek_penilaian/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nm_aspek" class="control-label">Nama Aspek</label>
						<div class="form-group">
							<input type="text" name="nm_aspek" value="<?php echo $this->input->post('nm_aspek'); ?>" class="form-control" id="nm_aspek" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="deskripsi" class="control-label">Deskripsi</label>
						<div class="form-group">
							<input type="text" name="deskripsi" value="<?php echo $this->input->post('deskripsi'); ?>" class="form-control" id="deskripsi" />
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