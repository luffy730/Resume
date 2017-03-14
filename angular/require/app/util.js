define(['bootstrap','underscore'],function($,_){
	// function util(){
	// 	this.show=function(){
	// 		alert(3);
	// 	}
	// }
	//return  new util;
	return {
		show:function(){
			alert(3);
		},
		keditor:function(id){
			require(['kindeditor'],function(){
				KindEditor.create('#'+id);
			});
		}
	}
});