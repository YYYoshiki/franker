$(function(){
	var lastId = null;
	var timer = null;

	//定期的にデータを取得する
	commentLoad();
	
	function commentLoad(){
		//画面に表示されていないものだけを取得するため、最新のidを取得する。
		if(lastId == null){
			var $lastComment = $("#body").find(".state:last");
		
			lastId = $lastComment.data("auto_num");
			

			

		}

		// コメント取得
		$.post(
			"/franker/web/get_comment",
			{auto_num:lastId}, 
			function(json){
				//jsonを展開
				var data = JSON.parse(json); 
				//受け取った最新のIDを入れる。
				var newId = lastId;
				// 最新データを使ってhtmlにコメントを挿入する
				for(var key in data){
					//日付のフォーマットを変更
					var date = new Date(data[key].post_time.timestamp * 1000);
					var created = date.getFullYear() + "/" + zeroBind(date.getMonth() + 1) + "/" + zeroBind(date.getDate()) + 
							" " +  zeroBind(date.getHours()) + ":" + zeroBind(date.getMinutes()) + ":" + zeroBind(date.getSeconds());
					//コメントタグを作成
					var images;
					var url = location.href;
					var params    = url.split("/");
				if(params[params.length-1] == data[key].common_id){
					//コメントタイプごとにアイコンとクラスを分ける
					switch(data[key].state_type){
					case 0:
						var $comment = $('<div class="comm state" id=" '+data[key].auto_num+'"  />');
						images = '<img src="/franker/web/img/good_on.png" class="quest_icon">';
						break;
					case 1:
						var $comment = $('<div class="quest state" id=" '+data[key].auto_num+'" data-type="2" data-text ='+data[key].text+' />');
						images = '<img src="/franker/web/img/question.png" class="quest_icon">';
						break;
					case 2:
						var $comment = $('<div class="add state" data-par_id='+data[key].par_id+' id=" '+data[key].auto_num+'" />');
						images = '<img src="/franker/web/img/add.png" class="quest_icon" id=" '+data[key].auto_num+'">';
						break;
					case 3:
						var $comment = $('<div class="good state" id=" '+data[key].auto_num+'"/>');
						images = '<img src="/franker/web/img/good_sample.png" class="quest_icon" >';
						break;
					case 4:
						var $comment = $('<div class="bad state" id=" '+data[key].auto_num+'" />');
						images = '<img src="/franker/web/img/bad.png" class="quest_icon" >';
						break;
					default:
						var $comment = $('<div class="me state" id=" '+data[key].auto_num+'" />');
						images = '<img src="/franker/web/img/i.png" class="quest_icon">';
						break;
					}
					
					//引用コメントは引用部分とコメント部分を分ける
					if(!data[key].par_id || data[key].par_id == "0"){
						var text = nl2br(data[key].text);
						
					}else{
						console.log(data[key].par_id);
						var text = "<span>" +  nl2br(data[key].parentcomment) + "</span>" + " " + nl2br(data[key].childcomment);
					}

					$comment.html(
							//data[key].auto_num + ":"　+　//コメントに連番をつける際に使用する
								images +
								"   " +
								text 
							)
							.data("auto_num",data[key].auto_num);
					$("#body").append($comment).scrollTop($("#body")[0].scrollHeight); //コメント反映
					newId = data[key].auto_num;
					
				}
				//最新のIDを保持
				lastId = newId;
				
				
				}
			}
			
		);
		timer = setTimeout(commentLoad, 7000);
	}
	
	//送信ボタンを押した時の処理
	$("#submit_btn_chat").on("click", function(e){
		e.preventDefault();
		var url = location.href;
		var params    = url.split("/");
		//ボタン類の表示をデフォルトに戻す
		$(".opinion,.question , .maru , .batsu").show("slow");
		$(".post , .reset").hide("slow");
		$("#common_id").val(params[params.length-1]);
		var hatena = $("#hatena").html();
		var textval = $("#chat").val();
		if($("#par_id").val() == false ){
			$("#chat").val(hatena + "" + textval);
		}else{
			$("#chat").val(hatena + "<_PARENT_>" + "" + textval);
		}
		//引用部分のdiv内を空にする
		$("#hatena").empty();
		$("#hatena_img").empty().removeClass("hatena_img");
		//textareaの高さを元に戻す
		$("textarea#chat").attr("rows", "1");
		//placeholderをデフォルトの文字列に戻す
		$("textarea#chat").attr({placeholder: "思ったことを自由に"});
		$(".question").css('background-color' , '#F8823C');
		$(".question").css('box-shadow' , '2px 2px 2px #555');
		//フォームを取得
		$form = $("#send_form");
		//空判定
		$commentText = $form.find("#chat").val();　
		if($commentText == ""){
			return false;
		}
		
		//コメント登録後データをすぐに取得するため定期実行をクリア
		if(timer){
			clearTimeout(timer);
			//console.log(0);
	     }
		
	
		$.post($form.attr("action"),$form.serialize(),function(){
			commentLoad();
		});
		
		//登録後入力したデータを削除
		$form.find("#chat").val("");
		
		//発言のタイプをデフォルトの意見に戻す
		$("#state_type").val("0");
		
		//親IDの値をゼロに戻す
		$("#par_id").val("0");
		
		$(".question").css('background-color' , '#F8823C');
		$(".question").css('box-shadow' , '2px 2px 2px #555');
		
		
		//setTimeout(submit(),5000);

		
	});
	
	$("#send_form").on("submit", function(e){
		e.preventDefault();
		$("#submit_btn_chat").trigger("click");
		
	});
	//質問ボタンを押した時の処理
	$(".chat_btn li , .quest").on("click", function(){
		var $this = $(this);
		var type = $this.data("type");
		$("#state_type").val(type); ;		
	});
	//質問コメントを押した時の処理
	$("#body").on("click", ".quest" ,function(){
		//質問コメントのステータスを取得
		var $this = $(this);
		var type = $this.data("type");
		var auto_num = $this.data("auto_num");
		var text = $this.data("text");
		//取得したステータスを現在のコメントに追加
		$("#par_id").val(auto_num);
		$("#state_type").val(type);
		$("#hatena_img").html('<img src="/franker/web/img/add.png" height="15px" id="re_icon">').addClass("hatena_img");
		$("#hatena").html(text);
		$(".opinion , .question , .maru , .batsu").hide("slow");
		$(".post").show("slow"); 
		$(".reset").show("slow");
		$("textarea#chat").attr({placeholder: "引用して発言する"});
	})
	
	//意見ボタンを押した時の処理
	$(".opinion").on("click", function(){
		$(".question").hide("slow");
		$(".reset").show("slow");
	})
	
	$(".question").on("click", function(){
		$(".opinion").hide("slow");
		$(".reset").show("slow");
		$(".question").css('background-color' , '#995126');
		$(".question").css('box-shadow' , '0px 0px 0px #555');
		$("textarea#chat").attr({placeholder: "疑問を自由に質問"});
	})
	
	//○ボタンを押した時の処理
	$(".maru").one("click",function(){
		$("#chat").val("わかりました！！");
		$("#submit_btn_chat").trigger("click");
		$(".maru").css('background-color' , '#bf5551');
		$(".maru").css('box-shadow' , '0px 0px 0px #555');
		$("textarea#chat").attr("rows", "1");
		setTimeout(maru,10000);
	})
	
	//×ボタンを押した時の処理
	$(".batsu").one("click",function(){
		$("#chat").val("わかりません。。");
		$("#submit_btn_chat").trigger("click");
		$(".batsu").css('background-color' , '#085285');
		$(".batsu").css('box-shadow' , '0px 0px 0px #555');
		$("textarea#chat").attr("rows", "1");
		setTimeout(batsu,10000);
	})
	
	//戻るボタンを押した時の処理
	$(".reset").on("click",function(){
		$(".opinion,.question , .maru , .batsu").show("slow");
		$(".reset , .post").hide("slow");
		$("textarea#chat").attr("rows", "1");
		$("textarea#chat").attr({placeholder: "思ったことを自由に"});
		$(".question").css('background-color' , '#F8823C');
		$(".question").css('box-shadow' , '2px 2px 2px #555');
		$("#hatena").empty();
		$("#hatena_img").empty().removeClass("hatena_img");
	})
	
	//textareaの高さを高くする
	$("textarea#chat").on("click" , function(){
		$("textarea#chat").attr("rows", "3");
	})
	
	//form以外のところを押すとフォームの高さを1に戻す
	$("#body").on("click",function(){
		$("textarea#chat").attr("rows" , "1");
	})
	
	//headerを押すとコメントの一番上に戻る
    $("h1").click(function(){
        $("#body").animate({scrollTop:0},'slow');
        return false;
    });
	
	//○ボタンの連打防止
	function maru(){
		$(".maru").css('background-color' , '#F26964');
		$(".maru").css('box-shadow' , '2px 2px 2px #555');
		$(".maru").one("click",function(){
			$("#chat").val("わかりました！！");
			$("#submit_btn_chat").trigger("click");
			$(".maru").css('background-color' , '#bf5551');
			$(".maru").css('box-shadow' , '0px 0px 0px #555');
			$("textarea#chat").attr("rows", "1");
			setTimeout(maru,10000);
		})
	}
	
	//×ボタンの連打防止
	function batsu(){
		$(".batsu").css('background-color' , '#0E7AC4');
		$(".batsu").css('box-shadow' , '2px 2px 2px #555');
		$(".batsu").one("click",function(){
			$("#chat").val("わかりません。。");
			$("#submit_btn_chat").trigger("click");
			$(".batsu").css('background-color' , '#085285');
			$(".batsu").css('box-shadow' , '0px 0px 0px #555');
			$("textarea#chat").attr("rows", "1");
			setTimeout(batsu,10000);
		})
	}
	
	function submit(){
		$("#submit_btn_chat").removeAttr('disabled');
	}
	
	
	$(document).ready( function(){
		$("#body").scrollTop($("#body")[0].scrollHeight); //ページ読み込み時一番下から表示
		});
	

});
//時刻で10以下の時間だった場合、時間の前に0をつける
function zeroBind(num){
	if(num < 10){
		return "0" + num;
	}
	return num;
}

//改行挿入
function nl2br(str) {
	 return str.replace(/(\r\n|\r|\n)/g, "<br />");
	}






