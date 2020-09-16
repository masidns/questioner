<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Kuisioner Add</h3>
            </div>
            <?php echo form_open('kuisioner/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="pertanyaan" class="control-label">Pertanyaan</label>
						<div class="form-group">
							<input type="text" name="pertanyaan" value="<?php echo $this->input->post('pertanyaan'); ?>" class="form-control" id="pertanyaan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_aspek" class="control-label">Id Aspek</label>
						<div class="form-group">
							<input type="text" name="id_aspek" value="<?php echo $this->input->post('id_aspek'); ?>" class="form-control" id="id_aspek" />
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