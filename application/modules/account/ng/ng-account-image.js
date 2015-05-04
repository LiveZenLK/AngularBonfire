var AccountImageCtrl = AngularBonfire.controller('AccountImageCtrl', ['$scope', 'Upload', 'AccountFactory', function ($scope, Upload, AccountFactory) {
    $scope.$watch('files', function () {
        $scope.upload($scope.files);
    });

    $scope.image = {}
    
    $scope.init = function(){
      AccountFactory.show().then(function(data) {
        console.log(data);
        $scope.image = data.image_path
      });
    }
    $scope.init();

    $scope.upload = function (files) {
        if (files && files.length) {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                Upload.upload({
                    url: AngularBonfireUrl+'/account/do_upload',
                    headers: {'Content-Type': file.type},
                    method: 'POST',
                    fileFormDataName: 'userfile', 
                    fields: {ci_csrf_token: ci_csrf_token(), userfile: file},
                    file: file
                }).progress(function (evt) {
                    var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                    console.log('progress: ' + progressPercentage + '% ' + evt.config.file.name);
                }).success(function (data, status, headers, config) {
                    console.log('file ' + config.file.name + 'uploaded. Response: ' + data);

                });
            }
        }
    };
}]);