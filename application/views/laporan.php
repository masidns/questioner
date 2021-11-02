<div ng-app="apps" ng-controller="LaporanController">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header nocetak">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Layanan</label>
                    <div class="col-sm-4">
                        <select class="form-control" ng-options="item as item.nama_layanan for item in datas.layanan"
                            ng-model="layanan" ng-change="showData(layanan)"></select>
                    </div>
                    <div class="col-sm-1 pull-right"><button class="btn btn-primary" ng-click="print()"><i
                                class="fas fa-print"></i>Print</button></div>
                </div>

            </div>
            <div class="card-body">
                <div class="text-center cetak" style="margin-bottom: 12px;">
                    <h3>LAPORAN TINGKAT KEPUASAN MAHASISWA</h3>
                </div>
                <canvas id="myChart" class="chartjs" width="770" height="385"
                    style="display: block; width: 100%; height: 385px;"><canvas>

            </div>
            <div class="">



                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Aspek yang Diukur</th>
                                <th colspan="4">Tingat Kepuasan Mahasiswa</th>
                                <th rowspan="2">Rencana Tidak Lanjut oleh UPPS/PS</th>
                            </tr>
                            <tr>
                                <th>Sangat Baik</th>
                                <th>Baik</th>
                                <th>Cukup</th>
                                <th>Kurang</th>
                            </tr>
                        </thead>
                        <tbody ng-repeat="itemm in dataPrint" class="text-center">
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{itemm.aspek}}</td>
                                <td ng-repeat="nilai in itemm.data track by $index">{{nilai | limitTo: 4}}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>