<?php

namespace Chat\ChatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Chat\ChatBundle\Entity\DatChat;
use Chat\ChatBundle\Entity\DatCreateclass;
use \DateTime;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Chat\ChatBundle\Entity\Chat;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\SecurityContext;


class ChatController extends Controller{
	
	//他コメントを引用してコメントしている場合、引用部分とコメント部分を親部分と子部分に分ける
	public function explode(&$chat){
		foreach($chat as $key=>$value){
			$par =  $chat[$key]->getPar_id();
			if(empty($par)){
				continue;
			}
			$text =  $value->getText();
			$array = explode("<_PARENT_>" , $text);
			if(count($array) > 1){
				$chat[$key]->setChildcomment($array[1]);
			}

			$chat[$key]->setParentcomment($array[0]);
		
		}
	}
	
	//chat画面の処理
	public function indexAction($common_id){
		$em = $this->getDoctrine()->getManager();
		
		//全データの取得idで降順にソート
		$class = $em->getRepository('ChatChatBundle:DatCreateclass')->findBy(array(), array("auto_num" => "desc"));
		$chat = $em->getRepository('ChatChatBundle:DatChat')->findBy(array('common_id' => $common_id ), array("auto_num" => "asc"));
		 // var_dump($chat);
		$this->explode($chat);
		return $this->render('ChatChatBundle:Chat:index.html.twig', array('chat' => $chat));
	}
	
	//PC用画面の処理
	public function pcAction(){
		$em = $this->getDoctrine()->getManager();
	
		//全データの取得idで降順にソート
		$chat = $em->getRepository('ChatChatBundle:DatChat')->findBy(array(), array("auto_num" => "asc"));
		$rank =  $em->getRepository('ChatChatBundle:DatChat')->findBy(array('state_type' => 1 ), array("auto_num" => "asc"));	//ascは昇順　descは降順		
		return $this->render('ChatChatBundle:Chat:index_pc.html.twig', array('chat' => $chat,'rank'=>$rank));
	}
	
	//login画面の処理
	public function loginAction()
	{
		$request = $this->getRequest();
		$session = $request->getSession();
	
		// ログインエラーがあれば、ここで取得
		if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
			$error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
		} else {
			$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
		}
	
		return $this->render('ChatChatBundle:Chat:login_sp.html.twig', array(
				// ユーザによって前回入力された username
				'last_username' => $session->get(SecurityContext::LAST_USERNAME),
				'error'         => $error,
		));
	}
	
	//top画面
	public function topAction(){
		$em = $this->getDoctrine()->getManager();
		$class = $em->getRepository('ChatChatBundle:DatCreateclass')->findBy(array(), array("auto_num" => "desc"));
		return $this->render('ChatChatBundle:Chat:top.html.twig', array('class' => $class));
	}
	
	//講義一覧画面
	public function classTopAction(){
		$em = $this->getDoctrine()->getManager();
	
		//全データの取得idで降順にソート
		$class = $em->getRepository('ChatChatBundle:DatCreateclass')->findBy(array(), array("auto_num" => "desc"));
		$chat = $em->getRepository('ChatChatBundle:DatChat')->findBy(array());
		return $this->render('ChatChatBundle:Chat:class_top.html.twig', array('class' => $class , 'chat' => $chat));
	}
	
	//menu画面
	public function menuAction(){
		return $this->render('ChatChatBundle:Chat:menu.html.twig');
	}
	
	//講義削除画面
	public function deleteclassAction(){
		$em = $this->getDoctrine()->getManager();
		
		//全データの取得idで降順にソート
		$class = $em->getRepository('ChatChatBundle:DatCreateclass')->findBy(array(), array("auto_num" => "desc"));
		
		return $this->render('ChatChatBundle:Chat:deleteclass.html.twig', array('class' => $class));
	}
	
	
	public function roomdeleteAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		$post = $em->find('ChatChatBundle:DatCreateclass', $id);
		if (!$post) {
			throw new NotFoundHttpException('The post does not exist.');
		}
		$em->remove($post);
		$em->flush();
		return $this->redirect($this->generateUrl('chat_chat_deleteclass'));
	}
	
	//講義作成画面
	public function createclassAction(){
		return $this->render('ChatChatBundle:Chat:createclass.html.twig');
	}
	
	
	public function setCreateclassAction(){
		$request = $this->getRequest();
		$classname = $request->request->get("classname");
		$classid = $request->request->get("classid");
		//データを追加する
		$class = new DatCreateclass();
		$class->setClassname($classname);
		$class->setClassid($classid);
		$class->setCreate_time(new DateTime('now'));
		//保存
		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($class);
		$em->flush();
		$em->close();
		
		return $this->redirect($this->generateUrl('chat_chat_classTop',array()));
		
		exit;
	}
	
	public function getCommentAction(){

		//リクエストを取得
		$request = $this->getRequest();
		
		$repository = $this->getDoctrine()->getRepository('ChatChatBundle:DatChat');
		$query = $repository->createQueryBuilder('c')
			->where('c.auto_num > :auto_num')
			->setParameter('auto_num', $request->request->get('auto_num'))
			->getQuery();
		
		$chat = $query->getResult();
		$this->explode($chat);
		//entityオブジェクトをjsonに変換する
		$serializer = new Serializer(
				array(new GetSetMethodNormalizer()),
				array(new JsonEncoder())
		);
		return new JsonResponse($serializer->serialize($chat, 'json'));
		exit;
	}
	
	public function setCommentAction(){
		$attend_code = 3;
		$num_sympathy = 4;
		$request = $this->getRequest();
		$comment = $request->request->get('text');
		$state_type = $request->request->get("state_type");
		$par_id = $request->request->get('par_id');
		$common_id = $request->request->get('common_id');
		//空コメント判定
		if(empty($comment)){
			exit;
		}
		//引用コメント判定
		if(preg_match("/^<_PARENT_>/", $comment)){
			exit;
		}
		if (preg_match("/^[ 　\t\r\n]+$/", $comment)) {
			exit;
		}
		//データを追加する
		$chat = new DatChat();
		$chat->setText($comment);
		$chat->setPost_time(new DateTime('now'));
		$chat->setState_type($state_type);
		$chat->setPar_id($par_id);
		$chat->setAttend_code($attend_code);
		$chat->setNum_sympathy($num_sympathy);
		$chat->setCommon_id($common_id);
		//保存 
		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($chat);
		$em->flush();
		$em->close();
		
		exit;
	}
	
}

