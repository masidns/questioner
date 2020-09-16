<div class="col-md-12" ng-app="apps" ng-controller="RangeNilaiController">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Form Input</h4>
                </div>
                <div class="card-body">
                    <form ng-submit="simpan()">
                        <div class="form-group">
                            <label for="" class="col-form-label-sm">Nilai</label>
                            <input type="text" class="form-control form-control-sm" ng-model="model.nilai" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Descripsi</label>
                            <input type="text" class="form-control form-control-sm" ng-model="model.deskripsi" placeholder="" required>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{tombol}}</button>
                            <button type="button" class="btn btn-warning" ng-click="clear()">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="box-title">Data Range Nilai</h4>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <tr>
                            <th>No</th>
                            <th>Nilai</th>
                            <th>Deskripsi</th>
                            <th>Actions</th>
                        </tr>
                        <tr ng-repeat="item in datas">
                            <td>{{$index+1}}</td>
                            <td>{{item.nilai}}</td>
                            <td>{{item.deskripsi}}</td>
                            <td>
                                <a href="" class="btn btn-info btn-xs" ng-click ="edit(item)"><span class="fa fa-pencil"></span> Edit</a> 
                                <a href="" class="btn btn-danger btn-xs" ng-click="hapus(item)"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                        </tr>
                    </table>
                                    
                </div>
            </div>
        </div>
    </div>
</div>
