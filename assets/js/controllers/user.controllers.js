angular.module('ctrl', [])
    .controller('GroupDetailController', GroupDetailController);


function GroupDetailController($scope, GroupService, helperServices) {
    $scope.datas = [];
    $scope.model = {};
    $scope.dataa = true;
    $scope.aspek = {};
    $scope.tombol = "Simpan";
    $scope.tahunakademik = ''
    $scope.formSimpan = false;
    GroupService.getdetail().then(x => {
        $scope.datas = x;
        $scope.showData();
    });
    $scope.showData = (item) => {
        if(item){
            var grouplayanan = $scope.datas.group.filter(x=>x.id_layanan==item.id_layanan);
            var data = angular.copy($scope.datas.aspek);
            data.forEach(aspek => {
                aspek.itemaspek.forEach(itemaspek => {
                    itemaspek.checked = false;
                    grouplayanan.forEach(group => {
                        if(itemaspek.id_kuisioner == group.id_kuisioner)
                        {
                            itemaspek.checked = true;
                        }
                    });                    
                });
            });
            item.pertanyaan = data;
        }else{
            var set = $scope.datas.layanan[0];
            var grouplayanan = $scope.datas.group.filter(x=>x.id_layanan==set.id_layanan);
            var data = angular.copy($scope.datas.aspek);
            data.forEach(aspek => {
                aspek.itemaspek.forEach(itemaspek => {
                    itemaspek.checked = false;
                    grouplayanan.forEach(group => {
                        if(itemaspek.id_kuisioner == group.id_kuisioner)
                        {
                            itemaspek.checked = true;
                        }
                    });                    
                });
            });
            set.pertanyaan = data;
        }
    }
    $scope.simpan = (item) => {
        GroupService.postitem($scope.model).then(x => {
            // swal('Information!!', 'Data Berhasil di Tambah', 'success');
            $scope.model = {};
            $scope.formSimpan = true;
        })
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.tombol = "Ubah";
        var th = $scope.datas.tahunakademik.find(x => x.idtahunakademik == item.id_thakademik);
        $scope.tahunakademik = th.thakademik + ' - ' + th.gg;
        $scope.formSimpan = true;
    }
    $scope.clear = () => {
        $scope.model = {};
        $scope.tombol = "Simpan";
    }
    $scope.detail = (item) => {
        document.location.href=helperServices.url + "/group/detail";
    }
}