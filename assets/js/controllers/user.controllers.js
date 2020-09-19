angular.module('ctrl', [])
    .controller('PertanyaanController', PertanyaanController);


function PertanyaanController($scope, helperServices, PertanyaanService) {
    $scope.datas = [];
    $scope.model = {};
    $scope.dataa = true;
    $scope.aspek = {};
    $scope.stepData = {};
    PertanyaanService.get().then(x => {
        $scope.datas = x;
        $scope.showData();
    })
    $scope.showData = (item) => {
        if (item) {
            var grouplayanan = $scope.datas.group.filter(x => x.id_layanan == item.id_layanan);
            var data = angular.copy($scope.datas.aspek);
            data.forEach(aspek => {
                aspek.itemaspek.forEach(itemaspek => {
                    itemaspek.checked = false;
                    grouplayanan.forEach(group => {
                        if (itemaspek.id_kuisioner == group.id_kuisioner) {
                            itemaspek.checked = true;
                        }
                    });
                });
            });
            item.pertanyaan = data;
        } else {
            var set = $scope.datas.layanan[0];
            var grouplayanan = $scope.datas.group.filter(x => x.id_layanan == set.id_layanan);
            var data = angular.copy($scope.datas.aspek);
            data.forEach(aspek => {
                aspek.itemaspek.forEach(itemaspek => {
                    itemaspek.checked = false;
                    grouplayanan.forEach(group => {
                        if (itemaspek.id_kuisioner == group.id_kuisioner) {
                            itemaspek.checked = true;
                        }
                    });
                });
            });
            set.pertanyaan = data;
        }
    }
}