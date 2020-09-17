<div class="col-md-12" ng-app="apps" ng-controller="GroupDetailController">
  <div class="col-md-12">
    <div class="card card-danger card-tabs">
      <div class="card-header p-0 pt-1">
        <div class="d-flex justify-content-between">
          <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
            <li class="nav-item" ng-repeat="layanan in datas.layanan">
              <a ng-class="{'nav-link active': $index==0, 'nav-link': $index !==0}" id="custom-tabs-five-overlay-tab"
                data-toggle="pill" href="" data-target="#custom-tabs-five-overlay{{layanan.id_layanan}}" role="tab"
                aria-controls="custom-tabs-five-overlay" aria-selected="true" ng-click="showData(layanan)">{{layanan.nama_layanan}}</a>
            </li>
          </ul>
          <!-- <button class="btn btn-default btn-sm"><i class="fa fa-save"></i> Simpan</button> -->
        </div>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-five-tabContent">
          <div ng-repeat="layanan in datas.layanan"
            ng-class="{'tab-pane fade show active': $index==0, 'tab-pane fade': $index !==0}"
            id="custom-tabs-five-overlay{{layanan.id_layanan}}" role="tabpanel"
            aria-labelledby="custom-tabs-five-overlay-tab">
            <div class="overlay-wrapper">

              <div id="accordion">
                <div class="card" ng-repeat="itemaspek in layanan.pertanyaan">
                  <div class="card-header" id="heading{{itemaspek.id_aspek}}">
                    <h5 class="mb-0">
                      <button ng-class="{'btn btn-link': $index==0, 'btn btn-link collapsed': $index !==0}"
                        data-toggle="collapse" data-target="#collapse{{itemaspek.id_aspek}}" aria-expanded="true"
                        aria-controls="collapse{{itemaspek.id_aspek}}">
                        {{itemaspek.nm_aspek}}
                      </button>
                    </h5>
                  </div>

                  <div id="collapse{{itemaspek.id_aspek}}"
                    ng-class="{'collapse show': $index==0, 'collapse': $index!=0}"
                    aria-labelledby="heading{{itemaspek.id_aspek}}" data-parent="#accordion">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-sm table-striped">
                          <tr>
                            <th>
                              <!-- <div class="form-check">
                                <input type="checkbox" class="form-check-input" ng-model="itempertanyaan.checked" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1"></label>
                              </div> -->
                              #
                            </th>
                            <th>Pertanyaan</th>
                          </tr>
                          <tr ng-repeat="itempertanyaan in itemaspek.itemaspek">
                            <td>
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" ng-model="itempertanyaan.checked" ng-change="model.id_layanan=layanan.id_layanan; model.id_kuisioner=itempertanyaan.id_kuisioner; model.checked=itempertanyaan.checked; simpan()" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1"></label>
                              </div>
                            </td>
                            <td>{{itempertanyaan.pertanyaan}}</td>

                          </tr>
                        </table>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
