require.config({
	//基准目录
	 baseUrl: "js",
	 paths: {
	 	//解决依赖CSS的问题
	 	"css": "css.min",   
		"jquery": "jquery",  
		"util": "../app/util",
		'underscore':'http://cdn.bootcss.com/underscore.js/1.8.3/underscore-min',
		'bootstrap':'bootstrap.min',
		'kindeditor': '../component/kindeditor/lang/zh-CN', 
		'kindeditor.main': '../component/kindeditor/kindeditor-all-min',
	},
	shim: {
		'bootstrap': {
			exports: '$',
			deps: ['jquery','css!../css/bootstrap.min.css']
		},
		'kindeditor': {
			// exports: 'kindeditor',
			deps: ['kindeditor.main', 'css!../component/kindeditor/themes/default/default.css']
		},
	}
});






