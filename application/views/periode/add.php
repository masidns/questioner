<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Periode Add</h3>
            </div>
            <?php echo form_open('periode/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_thakademik" class="control-label">Id Thakademik</label>
						<div class="form-group">
							<input type="text" name="id_thakademik" value="<?php echo $this->input->post('id_thakademik'); ?>" class="form-control" id="id_thakademik" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_prog_studi" class="control-label">Id Prog Studi</label>
						<div class="form-group">
							<input type="text" name="id_prog_studi" value="<?php echo $this->input->post('id_prog_studi'); ?>" class="form-control" id="id_prog_studi" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="jml_mhs_aktif" class="control-label">Jml Mhs Aktif</label>
						<div class="form-group">
							<input type="text" name="jml_mhs_aktif" value="<?php echo $this->input->post('jml_mhs_aktif'); ?>" class="form-control" id="jml_mhs_aktif" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="jml_responden" class="control-label">Jml Responden</label>
						<div class="form-group">
							<input type="text" name="jml_responden" value="<?php echo $this->input->post('jml_responden'); ?>" class="form-control" id="jml_responden" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="persentase_responden" class="control-label">Persentase Responden</label>
						<div class="form-group">
							<input type="text" name="persentase_responden" value="<?php echo $this->input->post('persentase_responden'); ?>" class="form-control" id="persentase_responden" />
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