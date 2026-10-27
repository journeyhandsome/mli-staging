<?php header("Content-Type:text/html;charset=utf-8"); ?>
<?php //error_reporting(E_ALL | E_STRICT);
##-----------------------------------------------------------------------------------------------------------------##
#
#
##-----------------------------------------------------------------------------------------------------------------##
if (version_compare(PHP_VERSION, '5.1.0', '>=')) {
	date_default_timezone_set('America/Los_Angeles');
}


$site_top = "https://www.mliesl.edu/lptf";

$to = "contact@mliesl.edu";

$from = "contact@mliesl.edu";

$Email = "email";

//---------------------------------------------------------------

$Referer_check = 0;

$Referer_check_domain = "";

$useToken = 1;

//---------------------------------------------------------------

//----------------------------------------------

$BccMail = "";

$subject = "Contact / Download from Transfer LP";

$confirmDsp = 1;

$jumpPage = 1;

$thanksPage = "https://mliesl.edu/tf_material/thanks";

$requireCheck = 1;

$require = array('name','email','phone','campus','start','media');


//----------------------------------------------------------------------
//  mail start
//----------------------------------------------------------------------

$remail = 1;

$refrom_name = "Mentor Language Institute";

$re_subject = "Thank you for contacting Mentor Language Institute";


$dsp_name = '';

$remail_text = <<< TEXT

Thank you for contacting Mentor Language Institute.

An admission staff member will respond to you shortly.
In the meantime, if you have any further questions, please contact us anytime.

We’re looking forward to welcoming you at MLI in the near future!!


Best regards,



MLI Admissions Team


TEXT;


$mailFooterDsp = 0;

$mailSignature = <<< FOOTER



FOOTER;


//----------------------------------------------------------------------
//  mail end
//----------------------------------------------------------------------


$mail_check = 1;

$hankaku = 0;

$hankaku_array = array();

$use_envelope = 0;



$replaceStr['before'] = array();

$replaceStr['after'] = array();

//----------------------------------------------------------------------------



//----------------------------------------------------------------------
//  関数実行、変数初期化
//----------------------------------------------------------------------
//トークンチェック用のセッションスタート
if($useToken == 1 && $confirmDsp == 1){
	session_name('PHPMAILFORMSYSTEM');
	session_start();
}
$encode = "UTF-8";//このファイルの文字コード定義（変更不可）
if(isset($_GET)) $_GET = sanitize($_GET);//NULLバイト除去//
if(isset($_POST)) $_POST = sanitize($_POST);//NULLバイト除去//
if(isset($_COOKIE)) $_COOKIE = sanitize($_COOKIE);//NULLバイト除去//
if($encode == 'SJIS') $_POST = sjisReplace($_POST,$encode);//Shift-JISの場合に誤変換文字の置換実行
$funcRefererCheck = refererCheck($Referer_check,$Referer_check_domain);//リファラチェック実行

//変数初期化
$sendmail = 0;
$empty_flag = 0;
$post_mail = '';
$errm ='';
$header ='';

if($requireCheck == 1) {
	$requireResArray = requireCheck($require);//必須チェック実行し返り値を受け取る
	$errm = $requireResArray['errm'];
	$empty_flag = $requireResArray['empty_flag'];
}
//メールアドレスチェック
if(empty($errm)){
	foreach($_POST as $key=>$val) {
		if($val == "confirm_submit") $sendmail = 1;
		if($key == $Email) $post_mail = h($val);
		if($key == $Email && $mail_check == 1 && !empty($val)){
			if(!checkMail($val)){
				$errm .= "<p class=\"error_messe\">【".$key."】Please enter a proper email address.</p>\n";
				$empty_flag = 1;
			}
		}
	}
}
  
if(($confirmDsp == 0 || $sendmail == 1) && $empty_flag != 1){
	
	//トークンチェック（CSRF対策）※確認画面がONの場合のみ実施
	if($useToken == 1 && $confirmDsp == 1){
		if(empty($_SESSION['mailform_token']) || ($_SESSION['mailform_token'] !== $_POST['mailform_token'])){
			exit('error');
		}
		if(isset($_SESSION['mailform_token'])) unset($_SESSION['mailform_token']);//トークン破棄
		if(isset($_POST['mailform_token'])) unset($_POST['mailform_token']);//トークン破棄
	}
	
	//差出人に届くメールをセット
	if($remail == 1) {
		$userBody = mailToUser($_POST,$dsp_name,$remail_text,$mailFooterDsp,$mailSignature,$encode);
		$reheader = userHeader($refrom_name,$from,$encode);
		$re_subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($re_subject,"JIS",$encode))."?=";
	}
	//管理者宛に届くメールをセット
	$adminBody = mailToAdmin($_POST,$subject,$mailFooterDsp,$mailSignature,$encode,$confirmDsp);
	$header = adminHeader($post_mail,$BccMail);
	$subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($subject,"JIS",$encode))."?=";
	
	//-fオプションによるエンベロープFrom（Return-Path）の設定(safe_modeがOFFの場合かつ上記設定がONの場合のみ実施)
	if($use_envelope == 0){
		mail($to,$subject,$adminBody,$header);
		if($remail == 1 && !empty($post_mail)) mail($post_mail,$re_subject,$userBody,$reheader);
	}else{
		mail($to,$subject,$adminBody,$header,'-f'.$from);
		if($remail == 1 && !empty($post_mail)) mail($post_mail,$re_subject,$userBody,$reheader,'-f'.$from);
	}
}
else if($confirmDsp == 1){ 

?>
<!DOCTYPE HTML>
<html>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WZ3ZXG4');</script>
<!-- End Google Tag Manager -->    
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">    
<meta name="format-detection" content="telephone=no">
<title></title>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" href="assets/css/normalize.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZ3ZXG4"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->    
    <header class="header">
        <div class="inner header__flexWrap">
            <div class="header__fixed">
                <h1 class="header__logoWrap"><a href="/"><img class="header__logo" src="assets/images/logo.png" alt="Mentor Language Institute"></a></h1>
                <div class="header__select" id="select">
                    <div class="ImageSelector__option header__option" data-value="en">
                      <img src="assets/images/en.png" alt="" class="header__flag">
                      English
                    </div>
                </div>
            </div>
            <div class="header__wrapper">
                <div class="header__upper">
                    <div class="header__btnWrap">
                        <a class="header__btn--westwood" href="tel:">WESTWOOD<br><span class="header__tel">(310) 887-0777</span></a>
                        <a class="header__btn--hollywood" href="tel:">HOLLYWOOD<br><span class="header__tel">(323) 870-7102</span></a>
                    </div>
                    <a class="header__app" href="../admission/">Online Application</a>
                </div>
                <nav class="nav">
                    <div class="nav__splab sp">
                        <label class="nav__label" for="menu"><div class="menu-trigger"><span></span><span></span><span></span></div></label>
                    </div>
                    <input type="checkbox" id="menu" class="on-off nav__checkbox">
                    <div class="nav__panel">
                        <ul class="nav__list">
                            <li class="nav__item"><a class="nav__link" href="/">MLI</a></li>
                            <li class="nav__item"><a class="nav__link" href="./#schedule">Schedule</a></li>
                            <li class="nav__item"><a class="nav__link" href="./#programs">Programs</a></li>
                            <li class="nav__item"><a class="nav__link" href="./#price">Price</a></li>
                            <li class="nav__item"><a class="nav__link" href="./#location">Campus</a></li>
                            <li class="nav__item"><a class="nav__link" href="./#howto">How to Apply</a></li>
                            <li class="nav__item"><a class="nav__link" href="./#contact">Contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
<main>
<div id="formWrap" class="confirm">
<div class="inner">
<?php if($empty_flag == 1){ ?>
<div align="center">
<h4 class="confirm__error">There are errors in your input, please go back to the previous page and fill in the correct information.</h4>
<?php echo $errm; ?><br /><br /><input class="confirm__btn" type="button" value=" Go back to the previous page. " onClick="history.back()">
</div>
<?php }else{ ?>
<h3 class="confirm__title">Confirm</h3>
<p class="confirm__text">Please click "Send" when the form is ready. </p>
<form action="<?php echo h($_SERVER['SCRIPT_NAME']); ?>" method="POST">
<table class="confirm__table">
<?php echo confirmOutput($_POST);//?>
</table>
<p align="center"><input type="hidden" name="mail_set" value="confirm_submit">
<input type="hidden" name="httpReferer" value="<?php echo h($_SERVER['HTTP_REFERER']);?>">
<input class="confirm__btn" type="submit" value="　Send　">
<input class="confirm__btn" type="button" value="Go back to the previous page." onClick="history.back()"></p>
</form>
<?php } ?>
</div>
</div>
</main>  
    <footer class="footer">
        <div class="inner">
            <div class="footer__upper">
                <p class="footer__logo"><img src="assets/images/logo.png" alt="Mentor Language Institute"></p>
                <ul class="footer__snsWrap">
                    <li class="footer__sns"><a class="footer__link--facebook" href="">MentorLanguageInstitute</a></li>
                    <li class="footer__sns"><a class="footer__link--instagram" href="">MentorLanguageInstitute</a></li>
                    <li class="footer__sns"><a class="footer__link--twitter" href="">@mlibh</a></li>
                </ul>
            </div>
            <small class="footer__copyright">Copyright© Mentor Language Institute , 2019 All Rights Reserved.</small>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
<?php
}

if(($jumpPage == 0 && $sendmail == 1) || ($jumpPage == 0 && ($confirmDsp == 0 && $sendmail == 0))) { 


}

else if(($jumpPage == 1 && $sendmail == 1) || $confirmDsp == 0) { 
	if($empty_flag == 1){ ?>
<?php 
	}else{ header("Location: ".$thanksPage); }
}

//----------------------------------------------------------------------
//  関数定義(START)
//----------------------------------------------------------------------
function checkMail($str){
	$mailaddress_array = explode('@',$str);
	if(preg_match("/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-zA-Z]+(\.[!#%&\-_0-9a-zA-Z]+)+$/", "$str") && count($mailaddress_array) ==2){
		return true;
	}else{
		return false;
	}
}
function h($string) {
	global $encode;
	return htmlspecialchars($string, ENT_QUOTES,$encode);
}
function sanitize($arr){
	if(is_array($arr)){
		return array_map('sanitize',$arr);
	}
	return str_replace("\0","",$arr);
}
//Shift-JISの場合に誤変換文字の置換関数
function sjisReplace($arr,$encode){
	foreach($arr as $key => $val){
		$key = str_replace('＼','ー',$key);
		$resArray[$key] = $val;
	}
	return $resArray;
}
//送信メールにPOSTデータをセットする関数
function postToMail($arr){
	global $hankaku,$hankaku_array;
	$resArray = '';
	foreach($arr as $key => $val) {
		$out = '';
		if(is_array($val)){
			foreach($val as $key02 => $item){ 
				//連結項目の処理
				if(is_array($item)){
					$out .= connect2val($item);
				}else{
					$out .= $item . ', ';
				}
			}
			$out = rtrim($out,', ');
			
		}else{ $out = $val; }//チェックボックス（配列）追記ここまで
		
		if (version_compare(PHP_VERSION, '5.1.0', '<=')) {//PHP5.1.0以下の場合のみ実行（7.4でget_magic_quotes_gpcが非推奨になったため）
			if(get_magic_quotes_gpc()) { $out = stripslashes($out); }
		}
		
		//全角→半角変換
		if($hankaku == 1){
			$out = zenkaku2hankaku($key,$out,$hankaku_array);
		}
		if($out != "confirm_submit" && $key != "httpReferer") {
			$resArray .= "【 ".h($key)." 】 ".h($out)."\n";
		}
	}
	return $resArray;
}
//確認画面の入力内容出力用関数
function confirmOutput($arr){
	global $hankaku,$hankaku_array,$useToken,$confirmDsp,$replaceStr;
	$html = '';
	foreach($arr as $key => $val) {
		$out = '';
		if(is_array($val)){
			foreach($val as $key02 => $item){ 
				//連結項目の処理
				if(is_array($item)){
					$out .= connect2val($item);
				}else{
					$out .= $item . ', ';
				}
			}
			$out = rtrim($out,', ');
			
		}else{ $out = $val; }//チェックボックス（配列）追記ここまで
		
		if (version_compare(PHP_VERSION, '5.1.0', '<=')) {//PHP5.1.0以下の場合のみ実行（7.4でget_magic_quotes_gpcが非推奨になったため）
			if(get_magic_quotes_gpc()) { $out = stripslashes($out); }
		}
		
		//全角→半角変換
		if($hankaku == 1){
			$out = zenkaku2hankaku($key,$out,$hankaku_array);
		}
		
		$out = nl2br(h($out));//※追記 改行コードを<br>タグに変換
		$key = h($key);
		$out = str_replace($replaceStr['before'], $replaceStr['after'], $out);//機種依存文字の置換処理
		
		$html .= "<tr><th>".$key."</th><td>".$out;
		$html .= '<input type="hidden" name="'.$key.'" value="'.str_replace(array("<br />","<br>"),"",$out).'" />';
		$html .= "</td></tr>\n";
	}
	//トークンをセット
	if($useToken == 1 && $confirmDsp == 1){
		$token = sha1(uniqid(mt_rand(), true));
		$_SESSION['mailform_token'] = $token;
		$html .= '<input type="hidden" name="mailform_token" value="'.$token.'" />';
	}
	
	return $html;
}

//全角→半角変換
function zenkaku2hankaku($key,$out,$hankaku_array){
	global $encode;
	if(is_array($hankaku_array) && function_exists('mb_convert_kana')){
		foreach($hankaku_array as $hankaku_array_val){
			if($key == $hankaku_array_val){
				$out = mb_convert_kana($out,'a',$encode);
			}
		}
	}
	return $out;
}
//配列連結の処理
function connect2val($arr){
	$out = '';
	foreach($arr as $key => $val){
		if($key === 0 || $val == ''){//配列が未記入（0）、または内容が空のの場合には連結文字を付加しない（型まで調べる必要あり）
			$key = '';
		}elseif(strpos($key,"円") !== false && $val != '' && preg_match("/^[0-9]+$/",$val)){
			$val = number_format($val);//金額の場合には3桁ごとにカンマを追加
		}
		$out .= $val . $key;
	}
	return $out;
}

//管理者宛送信メールヘッダ
function adminHeader($post_mail,$BccMail){
	global $from;
	$header="From: $from\n";
	if($BccMail != '') {
	  $header.="Bcc: $BccMail\n";
	}
	if(!empty($post_mail)) {
		$header.="Reply-To: ".$post_mail."\n";
	}
	$header.="Content-Type:text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
	return $header;
}
//管理者宛送信メールボディ
function mailToAdmin($arr,$subject,$mailFooterDsp,$mailSignature,$encode,$confirmDsp){
	$adminBody .="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$adminBody.= postToMail($arr);//POSTデータを関数からセット
	$adminBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	if($mailFooterDsp == 1) $adminBody.= $mailSignature;
	return mb_convert_encoding($adminBody,"JIS",$encode);
}

//ユーザ宛送信メールヘッダ
function userHeader($refrom_name,$to,$encode){
	$reheader = "From: ";
	if(!empty($refrom_name)){
		$default_internal_encode = mb_internal_encoding();
		if($default_internal_encode != $encode){
			mb_internal_encoding($encode);
		}
		$reheader .= mb_encode_mimeheader($refrom_name)." <".$to.">\nReply-To: ".$to;
	}else{
		$reheader .= "$to\nReply-To: ".$to;
	}
	$reheader .= "\nContent-Type: text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
	return $reheader;
}
//ユーザ宛送信メールボディ
function mailToUser($arr,$dsp_name,$remail_text,$mailFooterDsp,$mailSignature,$encode){
	$userBody = '';
	if(isset($arr[$dsp_name])) $userBody = h($arr[$dsp_name]). " 様\n";
	$userBody.= $remail_text;
	$userBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$userBody.= postToMail($arr);//POSTデータを関数からセット
	$userBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	if($mailFooterDsp == 1) $userBody.= $mailSignature;
	return mb_convert_encoding($userBody,"JIS",$encode);
}
//必須チェック関数
function requireCheck($require){
	$res['errm'] = '';
	$res['empty_flag'] = 0;
	foreach($require as $requireVal){
		$existsFalg = '';
		foreach($_POST as $key => $val) {
			if($key == $requireVal) {
				
				//連結指定の項目（配列）のための必須チェック
				if(is_array($val)){
					$connectEmpty = 0;
					foreach($val as $kk => $vv){
						if(is_array($vv)){
							foreach($vv as $kk02 => $vv02){
								if($vv02 == ''){
									$connectEmpty++;
								}
							}
						}
						
					}
					if($connectEmpty > 0){
						$res['errm'] .= "<p class=\"error_messe\">【".h($key)."】 require</p>\n";
						$res['empty_flag'] = 1;
					}
				}
				//デフォルト必須チェック
				elseif($val == ''){
					$res['errm'] .= "<p class=\"error_messe\">【".h($key)."】 require</p>\n";
					$res['empty_flag'] = 1;
				}
				
				$existsFalg = 1;
				break;
			}
			
		}
		if($existsFalg != 1){
				$res['errm'] .= "<p class=\"error_messe\">【".$requireVal."】 require</p>\n";
				$res['empty_flag'] = 1;
		}
	}
	
	return $res;
}
//リファラチェック
function refererCheck($Referer_check,$Referer_check_domain){
	if($Referer_check == 1 && !empty($Referer_check_domain)){
		if(strpos($_SERVER['HTTP_REFERER'],$Referer_check_domain) === false){
			return exit('<p align="center"></p>');
		}
	}
}
//----------------------------------------------------------------------
//  関数定義(END)
//----------------------------------------------------------------------
?>