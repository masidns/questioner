<div class="row" ng-app="apps" ng-controller="HomeController">
    <div class="col-lg-6 col-6">
    <!-- small box -->
        <div class="small-box bg-info">
        <div class="inner">
            <h4>Respondent</h4>
            <h3>{{datas.penilai}}</h3>
        </div>
        <div class="icon">
            <i class="fas fa-user"></i>
        </div>
        </div>
    </div>
    <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
        <div class="inner">
            <h4>Presentase</h4>
            <h3>{{presentase + '%'}}</h3>
        </div>
        <div class="icon">
            <i class="fas fa-database"></i>
        </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card card-default">
        <div class="card-header d-flex">
            <div class="col-md-9">
                <h3 class="card-title">Grafik</h3>
            </div>
            <div class="col-md-3 pull-right">
                <select class="form-control" ng-options="item as item.nama_layanan for item in datas.layanan" ng-model="layanan" ng-change="showData(layanan)"></select>
            </div>
        </div>
        <div class="card-body">
            <canvas id="myChart" class="chartjs" width="770" height="385"
            style="display: block; width: 770px; height: 385px;"></canvas>
        </div>
    </div>
  </div>
</div>

