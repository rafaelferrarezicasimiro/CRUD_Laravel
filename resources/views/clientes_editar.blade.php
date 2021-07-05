<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>
<body>
    <div ng-controller="myCtrl">
        <div class="container">
            <input type="text" ng-model='obj.nome' placeholder="nome">
            <input type="text" ng-model='obj.cpf' placeholder="cpf">
            <input type="text" ng-model='obj.email' placeholder="email">
            <input type="text" ng-model='obj.telefone' placeholder="telefone">
            <input type="text" ng-model='obj.data_nasc' placeholder="data_nasc">
            <button ng-click="alterar()">alterar</button>
            <button ng-click="voltar()">voltar</button>
        </div>
    </div>

    <script>
        var app = angular.module('myApp', []);

        app.controller('myCtrl', function($scope, $http) {
            $scope.obj = {
                nome: null,
                cpf: null,
                email: null,
                telefone: null,
                data_nasc: null
            };

            $scope.alterar = function() {
                $http.post("/clientes/alterar", $scope.obj)
                    .then(function(response) {
                        window.location.href = '/clientes';
                    });
            }

            $http.get("/clientes/carregar/{{request()->route('id')}}")
                    .then(function(response) {
                        $scope.obj = response.data;
                    });

            $scope.voltar = function() {
                window.location.href = '/clientes';

            }
        });
    </script>
</body>
</html>