<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Nilai Kepuasan Add</h3>
            </div>
            <?php echo form_open('nilai_kepuasan/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_periode" class="control-label">Id Periode</label>
						<div class="form-group">
							<input type="text" name="id_periode" value="<?php echo $this->input->post('id_periode'); ?>" class="form-control" id="id_periode" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_kuisioner" class="control-label">Id Kuisioner</label>
						<div class="form-group">
							<input type="text" name="id_kuisioner" value="<?php echo $this->input->post('id_kuisioner'); ?>" class="form-control" id="id_kuisioner" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_range" class="control-label">Id Range</label>
						<div class="form-group">
							<input type="text" name="id_range" value="<?php echo $this->input->post('id_range'); ?>" class="form-control" id="id_range" />
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