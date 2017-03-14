// JavaScript Document
// ajax 异步添加
$(function(){
	//表单提交事件
	$('form').submit(function(){
		//抓多个数据的时候用序列化
		var d=$(this).serilize();
		//发异步
		$.ajax({
			//请求地址
			url:'./index.php?a=add',
			//请求方式
			type:'post',
			//发送数据
			data:d,
			//指定php返回的数据类型
			dataType:'json',
			//服务器  的响应 phpData就是服务器返回的信息
			success:function(phpData){
				$('#dv').append(phpData.title phpData.time phpData.content);
			}
		});
	})
})
