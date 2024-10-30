<div>
    <div class="container-fluid pt-5">
        <div class="container p-8 flex items-center justify-center" ng-controller="specificPostController">
            <div class="w-3/4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                
                <article class="flex bg-white transition hover:shadow-xl">
                    <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
                      <time
                        datetime="2022-10-10"
                        class="flex items-center justify-between gap-4 text-xs font-bold uppercase text-gray-900"
                      >
                        <span>2022</span>
                        <span class="w-px flex-1 bg-gray-900/10"></span>
                        <span>Oct 10</span>
                      </time>
                    </div>
                  
                    <div class="hidden sm:block sm:basis-56">
                      <img
                        alt=""
                        src="https://images.unsplash.com/photo-1609557927087-f9cf8e88de18?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80"
                        class="aspect-square h-full w-full object-cover"
                      />
                    </div>
                  
                    <div class="flex flex-1 flex-col justify-between">
                      <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">
                        <a href="#">
                          <h3 class="font-bold uppercase text-gray-900">
                            [[post.title]]
                          </h3>
                        </a>
                  
                        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-700">
                          [[post.body]]
                        </p>
                      </div>
                  
                      <div class="sm:flex sm:items-end sm:justify-end">
                        <a
                          href="#"
                          class="block bg-yellow-300 px-5 py-3 text-center text-xs font-bold uppercase text-gray-900 transition hover:bg-yellow-400"
                        >
                          Read Blog
                        </a>
                      </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    
    <script>
        var app = angular.module('FackApiTestApp', []);
        app.config(function($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        });
    
        app.controller('specificPostController', function($scope, $http) {
            $scope.post = {};

            // Fetch the specific post
            $http.get('https://jsonplaceholder.typicode.com/posts/1')
                .then(function(response) {
                    $scope.post = response.data;  
                    console.log($scope.post);
                }, function(error) {
                    console.error('Error fetching post:', error);
                });
        });
    </script>
</div>
