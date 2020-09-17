angular.module('admin.services', [])
    .factory('RangeNilaiService', RangeNilaiService)
    .factory('AspekPenilaianService', AspekPenilaianService);

function RangeNilaiService($q, $http, helperServices) {
    var url = helperServices.url + '/range_nilai/';
    var service = {
        Items: []
    };

    service.get = function() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.Items);
        } else {
            $http({
                method: 'Get',
                url: url + 'getdata'
            }).then(
                (response) => {
                    service.instance = true;
                    service.Items = response.data;
                    def.resolve(service.Items);
                },
                (err) => {
                    message.error(err.data);
                    def.reject(err);
                }
            );
        }

        return def.promise;
    };

    service.post = function(param) {
        var def = $q.defer();
        $http({
            method: 'Post',
            url: url + "add",
            data: param
        }).then(
            (response) => {
                service.Items.push(response.data)
                def.resolve(response.data);
            },
            (err) => {
                swal('Warning', err.data, 'error');
                def.reject(err);
            }
        );

        return def.promise;
    };

    service.put = function(param) {
        var def = $q.defer();
        $http({
            method: 'Put',
            url: url + "edit",
            data: param
        }).then(
            (response) => {
                var data = service.Items.find((x) => x.id_range == param.id_range);
                if (data) {
                    data.nilai = param.nilai;
                    data.deskripsi = param.deskripsi;
                }
                def.resolve(response.data);
            },
            (err) => {
                swal('Warning', err.data, 'error');
                def.reject(err);
            }
        );
        return def.promise;
    };

    service.delete = function(id) {
        var def = $q.defer();
        $http({
            method: 'Delete',
            url: url + '/remove/' + id
        }).then(
            (response) => {
                var data = service.Items.find((x) => x.id_range == id);
                if (data) {
                    var index = service.Items.indexOf(data);
                    service.Items.splice(index, 1);
                    def.resolve(true);
                }
            },
            (err) => {
                swal('Warning', err.data, 'error');
                def.reject(err);
            }
        );
        return def.promise;
    };

    return service;
}

function AspekPenilaianService($q, $http, helperServices) {
    var url = helperServices.url + '/aspek_penilaian/';
    var service = {
        Items: []
    };

    service.get = function() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.Items);
        } else {
            $http({
                method: 'Get',
                url: url + 'getdata'
            }).then(
                (response) => {
                    service.instance = true;
                    service.Items = response.data;
                    def.resolve(service.Items);
                },
                (err) => {
                    message.error(err.data);
                    def.reject(err);
                }
            );
        }

        return def.promise;
    };

    service.post = function(param) {
        var def = $q.defer();
        $http({
            method: 'Post',
            url: url + "add",
            data: param
        }).then(
            (response) => {
                service.Items.push(response.data)
                def.resolve(response.data);
            },
            (err) => {
                swal('Warning', err.data, 'error');
                def.reject(err);
            }
        );

        return def.promise;
    };

    service.put = function(param) {
        var def = $q.defer();
        $http({
            method: 'Put',
            url: url + "edit",
            data: param
        }).then(
            (response) => {
                var data = service.Items.find((x) => x.id_aspek == param.id_aspek);
                if (data) {
                    data.nm_aspek = param.nm_aspek;
                    data.deskripsi = param.deskripsi;
                }
                def.resolve(response.data);
            },
            (err) => {
                swal('Warning', err.data, 'error');
                def.reject(err);
            }
        );
        return def.promise;
    };

    service.delete = function(id) {
        var def = $q.defer();
        $http({
            method: 'Delete',
            url: url + '/remove/' + id
        }).then(
            (response) => {
                var data = service.Items.find((x) => x.id_aspek == id);
                if (data) {
                    var index = service.Items.indexOf(data);
                    service.Items.splice(index, 1);
                    def.resolve(true);
                }
            },
            (err) => {
                swal('Warning', err.data, 'error');
                def.reject(err);
            }
        );
        return def.promise;
    };

    return service;
}