<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploading</title>
</head>
<body>
    
   <h1>File upload</h1>
   <form action="<?= base_url('Upload/addData') ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="image" id="image">
    <input type="hidden" name="action" value="do_upload">
    <input type="submit" value="Upload">
</form>
<script>

        var app = angular.module('myapp', []);

 

        app.controller('ImageController', function ($scope, $http) {

            $scope.fileList = '';

            const fileSelector = document.getElementById('image');

            fileSelector.addEventListener('change', (event) => {

                $scope.fileList = event.target.files;

            });

            $scope.uploadFile = function () {

                var formData = new FormData();

                formData.append('image', $scope.fileList[0]);

 

                $http.post('<?php echo base_url("Upload/addData"); ?>', formData, {

                    transformRequest: angular.identity,

                    headers: { 'Content-Type': undefined }

                }).then(function (response) {

                    window.location.href = "<?php echo base_url('Upload/showImage'); ?>";

                }, function (error) {

 

                });

            };

        });

    </script>
</body>
</html>