<div class="col-md-12" ng-app="apps" ng-controller="PeriodeController">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Form Input</h4>
                </div>
                <div class="card-body">
                    <form ng-submit="simpan()">
                        <div class="form-group">
                            <label for="" class="col-form-label-sm">Tahun Akademik</label>
                            <input type="text" class="form-control form-control-sm" ng-model="tahunakademik" placeholder="" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" class="form-control form-control-sm" ng-model="model.mulai" placeholder="" required ng-disabled="formSimpan">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Selesai</label>
                            <input type="date" class="form-control form-control-sm" ng-model="model.selesai" placeholder="" required ng-disabled="formSimpan">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" ng-disabled="formSimpan">{{tombol}}</button>
                            <button type="button" class="btn btn-warning" ng-click="clear()" ng-disabled="formSimpan">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="box-title">Data Aspek Penialian</h4>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <tr>
                            <th>No</th>
                            <th>Tahun Akademik</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th width="10%">Actions</th>
                        </tr>
                        <tr ng-repeat="item in datas.periode">
                            <td>{{$index+1}}</td>
                            <td>{{setTahunAkademik(item.id_thakademik)}}</td>
                            <td>{{item.mulai | date: 'yyyy/MM/dd'}}</td>
                            <td>{{item.selesai | date: 'yyyy/MM/dd'}}</td>
                            <td>
                                <div class="custom-control custom-switch" ng-if="formSimpan">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" ng-model="dataa"  ng-change="model.id_periode=item.id_periode; simpan(item)">
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                                <div ng-if="!formSimpan">
                                    Tidak Aktif
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
