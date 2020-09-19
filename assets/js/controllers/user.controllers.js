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
        setTimeout(() => {
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'arrows',
                autoAdjustHeight: true,
                transitionEffect: 'fade',
                showStepURLhash: false,

            });
        }, 500);
    })
    $scope.showData = () => {
        // var set = $scope.datas.layanan[0];
        $scope.datas.layanan.forEach(set => {
            set.pertanyaan=[];
            var grouplayanan = $scope.datas.group.filter(x => x.id_layanan == set.id_layanan);
            var data = angular.copy($scope.datas.aspek);
            data.forEach(aspek => {
                aspek.dataaspek = [];
                aspek.itemaspek.forEach(itemaspek => {
                    itemaspek.checked = false;
                    grouplayanan.forEach(group => {
                        if (itemaspek.id_kuisioner == group.id_kuisioner) {
                            aspek.dataaspek.push(angular.copy(itemaspek))
                        }
                    });
                });
                set.pertanyaan.push(angular.copy(aspek));
            });
            // set.pertanyaan = data;
        });

    }
}