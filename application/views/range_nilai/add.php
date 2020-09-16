<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Range Nilai Add</h3>
            </div>
            <?php echo form_open('range_nilai/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nilai" class="control-label">Nilai</label>
						<div class="form-group">
							<input type="text" name="nilai" value="<?php echo $this->input->post('nilai'); ?>" class="form-control" id="nilai" />
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