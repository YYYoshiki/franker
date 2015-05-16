$(function(){
	
	//削除したいクラスを選択した場合本当に削除するか確認する
	$(".accordion p").click(function(){
	    $(this).next("ul").slideToggle("slow");
	    $(this).children("span").toggleClass("open");
	}); 
		

});

