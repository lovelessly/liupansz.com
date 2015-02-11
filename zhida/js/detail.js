$(document).on("pageshow","#page2",function(){
	getDetailData();
});

function GetRequest() {
    var url = location.search; //获取url中"?"符后的字串
    var theRequest = new Object();
    if (url.indexOf("?") != -1) {
        var str = url.substr(1);
        if (str.indexOf("&") != -1) {
            strs = str.split("&");
            for (var i = 0; i < strs.length; i++) {
                theRequest[strs[i].split("=")[0]] = unescape(strs[i].split("=")[1]);
            }
        } else {
            theRequest[str.split("=")[0]] = unescape(str.split("=")[1]);
        }
    }
    return theRequest;
}

function getDetailData(){
	var id = GetRequest().id;
       $.ajax({
   timeout: 1000,
   async: true,
   dataType: "json",
   beforeSend: function () {
    	showLoader();
  	 },
 	  complete: function () {
 	 hideLoader();
  	},
 	 url: "http://cp01-centos43-rdqa036.epc.baidu.com:8702/zhida/API/get_one_info.php?id="+id,
  	success: function (data) {
                  format(data);
                },
  error: function(XMLHttpRequest, textStatus, errorThrown){
  alert("error"+textStatus);
          	         this;   
  }
        });
}

function showLoader() {  
    //loader展示  
    $.mobile.loading('show', {  
        text: 'loading', //展示文字  
        textVisible: true, //可见性  
        theme: 'a',        //主题  
        textonly: false,   //仅文字
        html: ""          
    });  
}  
function hideLoader()  
{  
    //隐藏loader
    $.mobile.loading('hide');  
} 

function format(data){
  $("#title").html(data.data[0].title);
  $("img").attr("src",data.data[0].image_url);
  $("#desc").html(data.data[0].desc);
  $("#charge_type").html("计费方式："+data.data[0].charging_type);
  $("#keyword").html("搜索关键词："+data.data[0].s_keyword);
  $("#belong").html("所属产品线："+data.data[0].belong);
  $("#detail_url").attr("href",data.data[0].detail_url);
  $("#toufang_url").attr("href",data.data[0].toufang_url+'');
}
