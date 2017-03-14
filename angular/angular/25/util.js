var m = angular.module('util',[]);
m.directive('hdFooter', [function(){
	return {
		restrict: 'A',
		template:'<span>houdunwang.com{{name()}}</span>',
		scope:{name:'&data'},
		// replace:true
		// templateUrl:'.html'
	};
}]);
m.directive('hdRepeat', [function(){
	return {
		restrict: 'A',
		templateUrl:'2.1.html',
		scope:{data:'=data'},
		link: function($scope, iElm, iAttrs) {}
	};
}]);
m.directive('hdTab', [function(){
	return {
		restrict: 'AE',
		templateUrl:'hdTab.html',
		scope:{data:'=data'},
		link: function($scope, iElm, iAttrs) {
			$(iElm).delegate('a', 'click', function(event) {
				var index = $(this).index();
				$(iElm).find('p').hide();
				$(iElm).find('p').eq(index).show();
			});
		}
	};
}]);





