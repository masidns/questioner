<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Daftar Penilai Add</h3>
            </div>
            <?php echo form_open('daftar_penilai/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_mhs" class="control-label">Id Mhs</label>
						<div class="form-group">
							<input type="text" name="id_mhs" value="<?php echo $this->input->post('id_mhs'); ?>" class="form-control" id="id_mhs" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_periode" class="control-label">Id Periode</label>
						<div class="form-group">
							<input type="text" name="id_periode" value="<?php echo $this->input->post('id_periode'); ?>" class="form-control" id="id_periode" />
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