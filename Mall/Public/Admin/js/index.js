  $(function() {
  	//上传插件**********************************************
//	alert(1);
            $('#f').uploadify({
                'formData'     : session,
                'fileTypeDesc' : '上传文件',//上传描述
                'fileTypeExts' : '*.jpg;*.png',
                'swf'      : './Public/uploadify/uploadify.swf',
                'uploader' : './index.php?m=admin&c=Goods&a=upload',//指定服务器上传的方法
                'buttonText':'选择文件',
                'fileSizeLimit' : '2000KB',
                'uploadLimit' :10,//上传文件数
                'width':65,
                'height':25,
                'successTimeout':10,//等待服务器响应时间
                'removeTimeout' : 0.2,//成功显示时间
                'onUploadSuccess' : function(file, data, response) {
                    //转为json
                    data=$.parseJSON(data);
                    //获得图片地址
                    var imageUrl = data.url;
                    var li="<li>";
                    li += "<img style='width:400px;height:200px;' src='"+imageUrl+"'/>";
                    li += "<input type='hidden' name='listpic' value='"+data.path+"'/>";
                    li += "</li>";
                    $("#uploadList ul").prepend(li);
                }
            });
            
            
            
             $('#g').uploadify({
                'formData'     : session,
                'fileTypeDesc' : '上传文件',//上传描述
                'fileTypeExts' : '*.jpg;*.png',
                'swf'      : './Public/uploadify/uploadify.swf',
                'uploader' : './index.php?m=admin&c=Goods&a=uploads',//指定服务器上传的方法
                'buttonText':'选择文件',
                'fileSizeLimit' : '2000KB',
                'uploadLimit' : 10,//上传文件数
                'width':65,
                'height':25,
                'successTimeout':10,//等待服务器响应时间
                'removeTimeout' : 0.2,//成功显示时间
                'onUploadSuccess' : function(file, data, response) {
                    //转为json
                    data=$.parseJSON(data);
                    //获得图片地址
                    var imageUrl = data.url;
                    var li="<li>";
                    li += "<img style='width:400px;height:200px;' src='"+imageUrl+"'/>";
                    li += "<input type='hidden' name='gallery[]' value='"+data.path+"'/>";
                    li += "</li>";
                    $("#uploadList1 ul").prepend(li);
                }
            });
  	//上传插件**********************************************
            
    //分类异步**********************************************
   	//表单改变事件
  
    //分类异步**********************************************
    
});