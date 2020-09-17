angular.module('ctrl', [])
    .controller('RangeNilaiController', RangeNilaiController)
    .controller('AspekPenilaianController', AspekPenilaianController);

function RangeNilaiController($scope, RangeNilaiService) {
    $scope.datas = [];
    $scope.model = {};
    $scope.tombol = "Simpan";
    RangeNilaiService.get().then(x => {
        $scope.datas = x;
    });
    $scope.simpan = () => {
        swal({
                title: "Information !!!",
                text: "Anda yakin?",
                icon: "info",
                buttons: true,
                dangerMode: false,
            })
            .then((value) => {
                if ($scope.model.id_range) {
                    RangeNilaiService.put($scope.model).then(x => {
                        swal('Information!!', 'Data Berhasil di Tambah', 'success');
                        $scope.model = {};
                    })
                } else {
                    RangeNilaiService.post($scope.model).then(x => {
                        swal('Information!!', 'Data Berhasil di Tambah', 'success');
                        $scope.model = {};
                    })
                }

            });
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.tombol = "Ubah";
    }
    $scope.clear = () => {
        $scope.model = {};
        $scope.tombol = "Simpan";
    }
    $scope.hapus = (item) => {
        swal({
                title: "Information !!!",
                text: "Anda yakin?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((value) => {
                RangeNilaiService.delete(item.id_range).then(x => {
                    swal('Information!!', 'Data Berhasil di Hapus', 'success');
                })
            });
    }
}

function AspekPenilaianController($scope, AspekPenilaianService) {
    $scope.datas = [];
    $scope.model = {};
    $scope.tombol = "Simpan";
    AspekPenilaianService.get().then(x => {
        $scope.datas = x;
    });
    $scope.simpan = () => {
        swal({
                title: "Information !!!",
                text: "Anda yakin?",
                icon: "info",
                buttons: true,
                dangerMode: false,
            })
            .then((value) => {
                if ($scope.model.id_aspek) {
                    AspekPenilaianService.put($scope.model).then(x => {
                        swal('Information!!', 'Data Berhasil di Tambah', 'success');
                        $scope.model = {};
                    })
                } else {
                    AspekPenilaianService.post($scope.model).then(x => {
                        swal('Information!!', 'Data Berhasil di Tambah', 'success');
                        $scope.model = {};
                    })
                }

            });
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.tombol = "Ubah";
    }
    $scope.clear = () => {
        $scope.model = {};
        $scope.tombol = "Simpan";
    }
    $scope.hapus = (item) => {
        swal({
                title: "Information !!!",
                text: "Anda yakin?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((value) => {
                AspekPenilaianService.delete(item.id_aspek).then(x => {
                    swal('Information!!', 'Data Berhasil di Hapus', 'success');
                })
            });
    }
}