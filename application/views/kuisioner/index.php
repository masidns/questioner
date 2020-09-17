<div class="col-md-12" ng-app="apps" ng-controller="QuestionerController">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h4>Form Input</h4>
        </div>
        <div class="card-body">
          <form ng-submit="simpan()">
            <div class="form-group">
              <label for="" class="col-form-label-sm">Aspek</label>
              <select class="form-control" ng-options="item as item.nm_aspek for item in datas.aspek" ng-model="aspek" ng-change="model.id_aspek = aspek.id_aspek; model.nm_aspek = aspek.nm_aspek" required ng-disabled="model.id_kuisioner"></select>
            </div>
            <div class="form-group">
              <label for="" class="col-form-label-sm">Pertanyaan</label>
              <textarea class="form-control form-control-sm" rows="3" ng-model="model.pertanyaan"></textarea>
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
          <h4 class="box-title">Daftar Pertanyaan</h4>
        </div>
        <div class="card-body">
          <div id="accordion">
            <div class="card" ng-repeat="itemaspek in datas.aspek">
              <div class="card-header" id="heading{{itemaspek.id_aspek}}">
                <h5 class="mb-0">
                  <button ng-class="{'btn btn-link': $index==0, 'btn btn-link collapsed': $index !==0}"
                    data-toggle="collapse" data-target="#collapse{{itemaspek.id_aspek}}" aria-expanded="true"
                    aria-controls="collapse{{itemaspek.id_aspek}}">
                    {{itemaspek.nm_aspek}}
                  </button>
                </h5>
              </div>

              <div id="collapse{{itemaspek.id_aspek}}" ng-class="{'collapse show': $index==0, 'collapse': $index!=0}"
                aria-labelledby="heading{{itemaspek.id_aspek}}" data-parent="#accordion">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-sm table-striped">
                      <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th width="10%">Actions</th>
                      </tr>
                      <tr ng-repeat="item in datas.questioner | filter: {id_aspek: itemaspek.id_aspek}">
                        <td>{{$index+1}}</td>
                        <td>{{item.pertanyaan}}</td>
                        <td>
                          <a href="" class="btn btn-info btn-xs" ng-click="edit(item)"><span class="fa fa-pencil"></span>
                            Edit</a>
                          <!-- <a href="" class="btn btn-danger btn-xs" ng-click="hapus(item)"><span
                              class="fa fa-trash"></span>
                            Delete</a> -->
                        </td>
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
</div>
