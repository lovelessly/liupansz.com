var id = -1;

$(document).on("pageshow","#page3",function(){
	$(document).unbind("scroll");
	$(document).bind("scroll", function(event){
		if( $(document).scrollTop() >= $(document).height()-$(window).height() ){
                       getMoreData();
    		 }
 	});
	$("#pcBtn").on("tap",function(){
		$("#mobile").hide();
		$("#pc").show();
	});
	$("#mBtn").on("tap",function(){
		$("#pc").hide();
		$("#mobile").show();
	});
	$("#pcListContent").html(getPcListData(id));
	$("#mListContent").html(getMListData(id));
 	});

$(document).on("pagehide","#mypage",function(){ 
 	$(document).unbind("scroll");
});

function getPcListData(id){
	var list = "";
       /////Params.....
       $.ajax({
   timeout: 1000,//����ʱʱ�䣨���룩
   async: false,//�첽
   dataType: "json",//����json��ʽ������
   beforeSend: function () {
    	showLoader();
  	 },
 	  complete: function () {
 	 hideLoader();
  	},
 	 url: "http://cp01-centos43-rdqa036.epc.baidu.com:8702/zhida/API/get_all_style.php?method=frontend_hot&limit=10&hot=1&type=0&id="+id,
  	success: function (data) {
                      list = formatToPC(data);
                },
  error: function(XMLHttpRequest, textStatus, errorThrown){
  alert("error:"+textStatus);
          	         this;   //���ñ���ajax����ʱ���ݵ�options����
  }
        });
	return list;
}

function getMListData(id){
	var list = "";
       /////Params.....
       $.ajax({
   timeout: 1000,//����ʱʱ�䣨���룩
   async: false,//�첽
   dataType: "json",//����json��ʽ������
   beforeSend: function () {
    	showLoader();
  	 },
 	  complete: function () {
 	 hideLoader();
  	},
 	 url: "http://cp01-centos43-rdqa036.epc.baidu.com:8702/zhida/API/get_all_style.php?method=frontend_hot&limit=10&hot=1&type=1&id="+id,
  	success: function (data) {
                       list = formatToM(data);
                },
  error: function(XMLHttpRequest, textStatus, errorThrown){
  alert("�쳣��Ϣ��"+textStatus);
          	         this;   //���ñ���ajax����ʱ���ݵ�options����
  }
        });
	return list;
}

function showLoader() {  
    //��ʾ������.for jQuery Mobile 1.2.0  ����
    $.mobile.loading('show', {  
        text: 'loading', //����������ʾ������  
        textVisible: true, //�Ƿ���ʾ����  
        theme: 'a',        //������������ʽa-e  
        textonly: false,   //�Ƿ�ֻ��ʾ����  
        html: ""           //Ҫ��ʾ��html���ݣ���ͼƬ�ȣ�Ĭ��ʹ��Theme���ajaxLoadͼƬ  
    });  
}  
function hideLoader()  
{  
    //���ؼ�����  
    $.mobile.loading('hide');  
} 

function formatToPC(data){
	var output = "";
	if(data.status==999){
		output = "";
	}else{
		for (var i=0;i<data.data.length;i++){
			var href = "<li id="+data.data[i].id+" class='ui-li-has-thumb ui-first-child'><a href='detail.html?id="+data.data[i].id+"' class='ui-btn ui-btn-icon-right ui-icon-carat-r' data-transition='slidefade'>";
			var img = "<img src="+data.data[i].image_url+">";
			var title = "<h2>"+data.data[i].title+"</h2>";
			var des = "<p>"+data.data[i].short_des+"</p></a></li>";
			output += href+img+title+des;
		}
		
	}
	return output;
}

function formatToM(data){
	var output = "";
	if(data.status==999){
		output = "";
	}else{
		for (var i=0;i<data.data.length;i++){
			var href = "<li id="+data.data[i].id+" class='ui-li-has-thumb ui-first-child'><a href='detail.html?id="+data.data[i].id+"' class='ui-btn ui-btn-icon-right ui-icon-carat-r' data-transition='slidefade'>";
			var img = "<img src="+data.data[i].image_url+">";
			var title = "<h2>"+data.data[i].title+"</h2>";
			var des = "<p>"+data.data[i].short_des+"</p></a></li>";
			output += href+img+title+des;
		}
	}
	return output;
}

function getMoreData(){
	
	if($("#pc").css("display")!="none"){
		id = $("#pc").children().children().last().attr("id");
		$("#pcListContent").html($("#pcListContent").html()+getPcListData(id));
	}
	else{
		id = $("#mobile").children().children().last().attr("id");
		$("#mListContent").html($("#mListContent").html()+getMListData(id));
	}
}
