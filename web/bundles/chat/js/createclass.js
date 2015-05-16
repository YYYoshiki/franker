$(function(){
	
	
	$(".submit_btn").on("click", function(e){
		//フォームを取得
		$form = $("#createclass");
		//空判定
		$className = $form.find("#classname").val();　
		$classId = $form.find("#classid").val();　

		if($className == "" || $classId == ""){
			e.preventDefault();
			e.stopPropagation();
			$("#alert").html("＊クラス名または共通idが入力されていません。");
		}

});

