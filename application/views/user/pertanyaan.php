<div ng-app="apps" ng-controller="PertanyaanController">
  <div id="smartwizard">
    <ul>
      <li ng-repeat="item in datas.layanan"><a href="#step-{{$index+1}}" class="sw-tabdata">Group
          {{$index+1}}<br /><small>{{item.nama_layanan}}</small></a></li>
      <!-- <li><a href="#step-2">Step 2<br /><small>Personal Info</small></a></li>
            <li><a href="#step-3">Step 3<br /><small>Payment Info</small></a></li>
            <li><a href="#step-4">Step 4<br /><small>Confirm details</small></a></li> -->
    </ul>
    <div>
      <div ng-repeat="layanan in datas.layanan" id="step-{{$index+1}}">
          <div id="accordion">
            <div class="card" ng-repeat="itemaspek in layanan.pertanyaan">
              <div class="card-header" id="heading{{itemaspek.id_aspek}}">
                <h5 class="mb-0">
                  <button ng-class="{'btn btn-link': $index==0, 'btn btn-link collapsed': $index !==0}"
                    data-toggle="collapse" data-target="#collapse{{itemaspek.id_aspek}}{{layanan.id_layanan}}" aria-expanded="true"
                    aria-controls="collapse{{itemaspek.id_aspek}}{{layanan.id_layanan}}">
                    {{itemaspek.nm_aspek}}
                  </button>
                </h5>
              </div>

              <div id="collapse{{itemaspek.id_aspek}}{{layanan.id_layanan}}" ng-class="{'collapse show': $index==0, 'collapse': $index!=0}"
                aria-labelledby="heading{{itemaspek.id_aspek}}" data-parent="#accordion">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <tr>
                        <th width="50%">Pertanyaan</th>
                        <th colspan="3" class="text-center">Nilai</th>
                      </tr>
                      <tr ng-repeat="itempertanyaan in itemaspek.dataaspek">
                        <td>
                          {{itempertanyaan.pertanyaan}}
                        </td>
                        <td  class="text-right align-middle">Kurang</td>
                        <td class="text-center align-middle">
                          <!-- <div class="form-group clearfix d-flex justify-content-between align-middle ml-4">
                            <div class="icheck-primary d-inline" ng-repeat="range in datas.rangenilai">
                              <input type="radio" id="customRadio{{itemaspek.id_aspek}}{{ range.id_range}}{{ itempertanyaan.id_kuisioner}}{{ layanan.id_layanan}}" name="nilai{{itemaspek.id_aspek}}{{ itempertanyaan.id_kuisioner}}" ng-model="itempertanyaan.checked" ng-change="model.id_periode=periode.id_periode;model.id_range=range.id_range;model.id_grup = itempertanyaan.id_grup; addItem()" required>
                              <label for="customRadio{{itemaspek.id_aspek}}{{ range.id_range}}{{ itempertanyaan.id_kuisioner}}{{layanan.id_layanan}}">{{$index+1}}&nbsp;&nbsp;&nbsp;
                              </label>
                            </div>
                          </div> -->
                          <div class="form-check form-check-inline  d-flex justify-content-between ml-4">
                            <div class="custom-control custom-radio" ng-repeat="range in datas.rangenilai">
                              <input class="custom-control-input" type="radio"
                                id="customRadio{{itemaspek.id_aspek}}{{ range.id_range}}{{ itempertanyaan.id_kuisioner}}{{ layanan.id_layanan}}"
                                name="nilai{{itemaspek.id_aspek}}{{ itempertanyaan.id_kuisioner}}"
                                ng-model="itempertanyaan.checked" ng-change="model.id_periode=periode.id_periode;model.id_range=range.id_range;model.id_grup = itempertanyaan.id_grup; addItem()" value="{{range.id_range}}">
                              <label
                                for="customRadio{{itemaspek.id_aspek}}{{ range.id_range}}{{ itempertanyaan.id_kuisioner}}{{ layanan.id_layanan}}"
                                class="custom-control-label">{{$index+1}}&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                          </div>
                        </td>
                        <td class="text-left align-middle">Sangat Baik</td>
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
  <div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-body text-center">
          Anda Yakin ???
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary btn-sm" ng-click="simpan()">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
