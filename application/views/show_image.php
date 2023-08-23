<!DOCTYPE html>
<html lang="en">
<head>
   <title>Show Image</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body ng-app="imageApp">
    <div class="container" ng-controller="ImageController">
        <h1 style='text-align:center'>Show Images</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                </tr>
            </thead>

            <tbody>
                <tr ng-repeat="img in images">
                    <td>{{ img.id }}</td>
                    <td>
                       <div>
                            <video controls class="img-thumbnail"
                                ng-if="img.image.indexOf('.mp4') !== -1">
                                <source ng-src="{{ img.image }}" type="video/mp4">
                            </video>

                            <img ng-src="{{ img.image }}" class="img-thumbnail" style="max-width: 100px;"

                                ng-if="img.image.indexOf('.mp4') === -1">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"></script>

    <script>

        var app = angular.module('imageApp', []);

 

        app.controller('ImageController', function ($scope, $http) {

            $http.get('<?php echo base_url('Upload/getImageData') ?>')

                .then(function (response) {

                    $scope.images = response.data;

                })

                .catch(function (error) {

                    console.log('Error fetching image data:', error);

                });

        });

    </script>

</body>
</html>
