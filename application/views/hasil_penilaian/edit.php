<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Hasil Penilaian Edit</h3>
            </div>
			<?php echo form_open('hasil_penilaian/edit/'.$hasil_penilaian['npm']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="jumlah" class="control-label">Jumlah</label>
						<div class="form-group">
							<input type="text" name="jumlah" value="<?php echo ($this->input->post('jumlah') ? $this->input->post('jumlah') : $hasil_penilaian['jumlah']); ?>" class="form-control" id="jumlah" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_layanan" class="control-label">Id Layanan</label>
						<div class="form-group">
							<input type="text" name="id_layanan" value="<?php echo ($this->input->post('id_layanan') ? $this->input->post('id_layanan') : $hasil_penilaian['id_layanan']); ?>" class="form-control" id="id_layanan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_periode" class="control-label">Id Periode</label>
						<div class="form-group">
							<input type="text" name="id_periode" value="<?php echo ($this->input->post('id_periode') ? $this->input->post('id_periode') : $hasil_penilaian['id_periode']); ?>" class="form-control" id="id_periode" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_aspek" class="control-label">Id Aspek</label>
						<div class="form-group">
							<input type="text" name="id_aspek" value="<?php echo ($this->input->post('id_aspek') ? $this->input->post('id_aspek') : $hasil_penilaian['id_aspek']); ?>" class="form-control" id="id_aspek" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_range" class="control-label">Id Range</label>
						<div class="form-group">
							<input type="text" name="id_range" value="<?php echo ($this->input->post('id_range') ? $this->input->post('id_range') : $hasil_penilaian['id_range']); ?>" class="form-control" id="id_range" />
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