<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Grup Kuisioner Edit</h3>
            </div>
			<?php echo form_open('grup_kuisioner/edit/'.$grup_kuisioner['id_grup']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_kuisioner" class="control-label">Id Kuisioner</label>
						<div class="form-group">
							<input type="text" name="id_kuisioner" value="<?php echo ($this->input->post('id_kuisioner') ? $this->input->post('id_kuisioner') : $grup_kuisioner['id_kuisioner']); ?>" class="form-control" id="id_kuisioner" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_layanan" class="control-label">Id Layanan</label>
						<div class="form-group">
							<input type="text" name="id_layanan" value="<?php echo ($this->input->post('id_layanan') ? $this->input->post('id_layanan') : $grup_kuisioner['id_layanan']); ?>" class="form-control" id="id_layanan" />
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