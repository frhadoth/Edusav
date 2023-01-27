<?php 
if ( isset($token) ):
define("5982601203:AAENr4fuwi5107rcrUb5gwALd8is0KJIaVA", $token);
echo file_get_contents("https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);

function bot($method, $datas = [])
{
$url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
$res = curl_exec($ch);
if (curl_error($ch)) {
var_dump(curl_error($ch));
} else {
return json_decode($res);
}
}
@$update = json_decode(file_get_contents("php://input"));
@$info = json_decode(file_get_contents("stor/info.json"),1);
@$numbers = json_decode(file_get_contents("stor/numbers.json"),1);
@$readynumber = json_decode(file_get_contents("stor/readynum.json"),1);
@$static = json_decode(file_get_contents("stor/static.json"),1);
@$point = json_decode(file_get_contents("stor/point.json"),1);
@$check = json_decode(file_get_contents("stor/check.json"),1);
@$chart = json_decode(file_get_contents("data/$chat_id.json"),1);
@$refral = json_decode(file_get_contents("stor/refral.json"),1);
@$favourite = json_decode(file_get_contents("stor/favourite.json"),1);

$ApiKey5sim        = "96037df350074ac19e9d7a6a5bbb1835";//5sim
$api_key_super        = "RqgDdFyjmThjbo69iJ9WDSSg1jOQnPT4DKrzEgc5En_k9Pxte8iyZA";//super
$ApiKeySmsMan = "ujmS-g9WYu-0JNT2fOUtr2IAcM4vyYi5";//man
if(isset($update)):
        $channel ="-1001780566403";
    @$a = explode("\n",$text);
    @$home=[[["text"=>"القائمة الرئيسية","callback_data"=>"home"]]];
    @$bak=[[["text"=>"رجوع 🔙","callback_data"=>"home"]]];
    @$cancel=[[["text"=>"إلغاء ❌","callback_data"=>"home"]]];
    if($text == '/setRev'){
    	bot('sendMessage',[
    	'chat_id'=>$chat_id,
    	'text'=>"💯 أرسل عدد نقاط الرابط ( ارقام فقط ) \n ❌ للإلغاء أرسل /cancel"
    ]);
    $info[$chat_id]['mode']='setRev';
      save($info);
       exit;
    }
    if($info[$chat_id]['mode']=='setRev'){
    	if($text != '/cancel'){
    	if(preg_match("/^[0-9]+$/",$text)){
    	bot('sendMessage',[
    	'chat_id'=>$chat_id,
    	'text'=>"✅ تم تعيين نقاط الدعوة إلى $text نقطة"
        ]);
    $info[$chat_id]['mode']=null;
    $info['revral'] = $text;
    save($info);
       exit;
       } else {
       	bot('sendMessage',[
    	'chat_id'=>$chat_id,
    	'text'=>"☄️ ارسل ارقاما فقط ، للإلغاء /cancel"
    ]);
    }
    } else {
    	bot('sendMessage',[
    	'chat_id'=>$chat_id,
    	'text'=>"☑️ تم الإلغاء"
    ]);
    $info[$chat_id]['mode']=null;
    save($info);
    exit;
    }
    }
    if ( $text == "/start" ):
    $balance = explode(":",file_get_contents("http://api2.5sim.net/stubs/handler_api.php?api_key=".$ApiKey5sim."&action=getBalance"))[1];
    $balance2 = explode(":",file_get_contents("http://api.sms-man.com/stubs/handler_api.php?api_key=".$ApiKeySmsMan."&action=getBalance"))[1];
        send(
            "
🪗 - اهلا وسهلا مطوري 🜼𝙰𝚂𝙴𝙴𝙻  🖤.

☑️ - هذة هي قائمة التحكم الخاصه بالبوت 💁🏻.
♻️ لتعيين عدد نقاط الرابط قم بإرسال الأمر التالي /setRev
💯 نقاط الدعوة حاليا هي $setCoinURL 💸
",
            [
                [["text" => 'اضافه دولة ✔', "callback_data" => 'addnum'],                                
                ["text" => 'حذف دولة ❌', "callback_data" => 'delcon']],
                [["text" => 'اضافه رقم جاهز ☎️', "callback_data" => 'make_ready'],
                ["text" => 'حذف رقم جاهز ❌', "callback_data" => 'del_ready']],
                [["text"=>"اضافة رصيد 💲","callback_data"=>"addpoint"],
                ["text"=>"خصم رصيد 💱","callback_data"=>"delpoint"]],
                [["text"=>"⌯ اضافة وكيل⭐️.","callback_data"=>"add_wak"],
                ["text"=>"⌯ حذف وكيل💥.","callback_data"=>"del_wak"]],
                [["text"=>"اضافة مورد 📮","callback_data"=>"add_operator"],
                ["text"=>"احذف مورد ✖","callback_data"=>"del_operator"]],
                [["text"=>"⌯ اضافات عروض⭐️.","callback_data"=>"add_offer"],
                ["text"=>"⌯ حدف  العروض 💥.","callback_data"=>"del_offer"]],
                [["text" => 'اضافه كرت 🛄', "callback_data" => 'make_card']],
				[["text" => " تقييد عضو 🔧", "callback_data" => "unban"],
                ["text" => "فك تقييد عضو 🔧", "callback_data" => "unban"]], 
                [["text" => "اذاعه", "callback_data" => "sha"],
                ["text" => "اذاعه بالتوجيه", "callback_data" => "shar"]], 
                [["text"=>"اضافة نسبة 💯","callback_data"=>"add-n"]], 
                [["text"=>"$stat البوت","callback_data"=>"changeState"]],
                [["text"=>"رصيدك 5sim: ".$balance,"callback_data"=>" l"],
				["text"=>"رصيدك man : ".$balance2,"callback_data"=>" l"]],
            ]
        );
        $info[$chat_id]['mode']=null;
        save($info);
        exit;
    elseif ( $data == "home" ):
    $balance = explode(":",file_get_contents("http://api2.5sim.net/stubs/handler_api.php?api_key=".$ApiKey5sim."&action=getBalance"))[1];
    $balance2 = explode(":",file_get_contents("http://api.sms-man.com/stubs/handler_api.php?api_key=".$ApiKeySmsMan."&action=getBalance"))[1];
        edit(
            "اهلا وسهلا بك عزيزي المطور". 
            "الاوامر امامك اختر ماتريد",
            [
                [["text" => 'اضافه دولة ✔', "callback_data" => 'addnum'],                                
                ["text" => 'حذف دولة ❌', "callback_data" => 'delcon']],
                [["text" => 'اضافه رقم جاهز ☎️', "callback_data" => 'make_ready']],                                
                [["text" => 'حذف رقم جاهز ❌', "callback_data" => 'del_ready']],
                [["text" => 'اضافه كرت 🛄', "callback_data" => 'make_card']],                           
                [["text" => "فك تقييد عضو 🔧", "callback_data" => "unban"]],                               
                [["text"=>"اضافة رصيد 💲","callback_data"=>"addpoint"],                              
                ["text"=>"خصم رصيد 💱","callback_data"=>"delpoint"]],                               
                [["text"=>"اضافة نسبة 💯","callback_data"=>"add-n"]], 
                [["text"=>"اضافة مورد 📮","callback_data"=>"add_operator"],
                ["text"=>"احذف مورد ✖","callback_data"=>"del_operator"]],
                [["text"=>"⌯ اضافات عروض⭐️.","callback_data"=>"add_offer"],
                ["text"=>"⌯ حدف  العروض 💥.","callback_data"=>"del_offer"]],
                [["text"=>"⌯ اضافة وكيل⭐️.","callback_data"=>"add_wak"],
                ["text"=>"⌯ حذف وكيل💥.","callback_data"=>"del_wak"]],
                [["text"=>"$stat البوت","callback_data"=>"changeState"]],
                [["text"=>"رصيدك 5sim: ".$balance,"callback_data"=>" l"]],
                [["text"=>"رصيدك man : ".$balance2,"callback_data"=>" l"]],
            ]
        );
        $info[$chat_id]['mode']=null;
        save($info);
        exit;
        elseif($data == "delcon") :
           edit("
ارسل مفتاح الدوله المراد حذفها
" , 
            );    
           $info[$chat_id]["mode"] = "delcon";
           save($info);
exit;
elseif(isset($text) && $info[$chat_id]["mode"] == "delcon"):
if(isset($numbers["num"][$text])){
          
          send("تم حذف دوله ".$numbers["num"][$text]["name"]);
          unset($numbers["num"][$text]);
          save($numbers , "numbers");
          }else{
          send("هذه الدوله غير موجوده");
          }
         
             $info[$chat_id]["mode"] = null;
             save($info);
exit;
        elseif($data == "sha") :
           edit("
ارسل ما تريد ارساله للجميع
" , 
            );    
           $info[$chat_id]["mode"] = "sha";
           save($info);
exit;
elseif(isset($message) && $info[$chat_id]["mode"] == "sha"):
          send("تمت الاذاعه" , );
             for($i=0;$i<count($members); $i++){
bot('copyMessage', [
'chat_id'=>$members[$i],
'from_chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
             $info[$chat_id]["mode"] = null;
             save($info);
exit;
elseif($data == "shar") :
           edit("
ارسل ما تريد تحويله للجميع
" , 
            );    
           $info[$chat_id]["mode"] = "shar";
           save($info);
exit;
elseif(isset($message) && $info[$chat_id]["mode"] == "shar"):
          send("تمت التحويل" , );
             for($i=0;$i<count($members); $i++){
bot('forwardMessage', [
'chat_id'=>$members[$i],
'from_chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
             $info[$chat_id]["mode"] = null;
             save($info);
exit;
        elseif($data == "add_wak") :
           edit("
🪗 - مرحبا بك عزيزي المطور بقسم الوكلاء لضافه وكيل جديد يرجئ ارسال حقوق حساب الوكيل ليتم اضافتة.👇🏻
اسم الوكيل
ايدي حسابه
يوزر الوكيل
كمثال 
𝙰𝚂𝙴𝙴𝙻🜼 .
1370788972
@EFZFF
" , 
            );    
           $info[$chat_id]["mode"] = "add_wak";
           save($info);
exit;
elseif(isset($a[2]) && $info[$chat_id]["mode"] == "add_wak"):
          send("تم حفظ الوكيل" , );
             $numbers["wak"][$a[1]]["name"] = $a[0];
             $numbers["wak"][$a[1]]["user"] = str_replace('@','',$a[2]);
             $numbers["wak"]["ids"][] = $a[1];
             save($numbers , "numbers");
             $info[$chat_id]["mode"] = null;
             save($info);
exit;
elseif($data == "del_wak") :
           edit("
قم بارسال ايدي الوكيل المراد حذفه
" , 
            );    
           $info[$chat_id]["mode"] = "del_wak";
           save($info);
exit;
elseif(preg_match("/[0-9]+/",$text) && $info[$chat_id]["mode"] == "del_wak"):
          send("تم حذف الوكيل" , );
             unset($numbers["wak"][$text]);
             for($i=0;$i<count($numbers["wak"]["ids"]);$i++)
             {
             	if($numbers["wak"]["ids"][$i] == $text)
             	{
             		unset($numbers["wak"]["ids"][$i] );
        	     }
             }
             save($numbers , "numbers");
             $info[$chat_id]["mode"] = null;
             save($info);
exit;
        elseif($data == "changeState") :
        file_put_contents("stat.txt",$stat == "تشغيل"?"ايقاف":"تشغيل");
           edit($stat == "تشغيل"?"تم تشغيل البوت" :"تم ايقاف البوت", 
            [
                  [['text'=>'القائمة الرئيسية 🏡',"callback_data"=>"home"]],                            
          ]);    
           $info[$chat_id]["mode"] = "addnum";
           save($info);
exit;
elseif($data == "addnum") :
           edit("إرسل إسم أو رقم الدولة حسب ما هو في الموقع  لمعرفة الرموز اضغط على الزر أدناه" , 
            [
                  [["text" => 'دول 5sim', "callback_data" => '5sim']],                                
                  [["text" => 'دول sms-man', "callback_data" => 'sms-man']],
                  [["text" => 'دول super', "callback_data" => 'vak']],
          ]);    
           $info[$chat_id]["mode"] = "addprice";
           save($info);
exit;

elseif(preg_match("/[0-9]+/",$text) && $info[$chat_id]["mode"] == "addprice"):
send("حسنا عزيزي قم بإرسال سعر الرقم");
$numbers[$chat_id]["name"] = $text;
save($numbers , "numbers");
             $info[$chat_id]["mode"] = "addnum";
             save($info);
exit;

elseif(preg_match("/[A-z0-9]+/",$text) && $info[$chat_id]["mode"] == "addnum"):
          send("حسنا عزيزي اختر القارة 🚩" , [
          
                    [["text" => 'آسياء 🏁',   "callback_data"   => 'con#Asia']],    
                    [["text" => 'افريقيا 🏴', "callback_data" => 'con#Africa']],
                    [["text" => 'أوروبا 🚩',  "callback_data"  => 'con#Erub']],    
                    [["text" => 'أمريكا 🏳',  "callback_data"  => 'con#Amrica']],    
         ]);
             $numbers[$chat_id]["price"] = $text;
             save($numbers , "numbers");
             $info[$chat_id]["mode"] = "addcon";
             save($info);
exit;

elseif($ex[0] == "con" &&  preg_match("/[A-z]+/",$ex[1]) && $info[$chat_id]["mode"] == "addcon"):
          edit("حسنا عزيزي قم باختيار السيرفر 💻" , [
          
                  [["text" => '5sim 🔴', "callback_data" => 'ser#5sim']],                                
                  [["text" => 'Sms-Man 🔵', "callback_data" => 'ser#man']],
                  [["text" => 'super ⚪', "callback_data" => 'ser#super']],
             ]);
             $numbers[$chat_id]["con"] = $ex[1];
             save($numbers , "numbers");
             $info[$chat_id]["mode"] = "addser";
             save($info);
exit;      


elseif($ex[0] == "ser" &&  preg_match("/[A-z0-9]+/",$ex[1]) && $info[$chat_id]["mode"] == "addser"):
          edit("حسنا قم بإرسال مفتاح الدولة مثال :-\n اليمن ( 967 )" , [
          
                    [["text" => 'مفاتيح الدول 🚩', "callback_data" => 'countrys']],                                                  
         ]);
         
             $numbers[$chat_id]["ser"] = $ex[1];
             save($numbers , "numbers");
             $info[$chat_id]["mode"] = "addkey";
             save($info);
exit;

elseif(preg_match("/[0-9]+/",$text) && $info[$chat_id]["mode"] == "addkey"):
          send("تم الحفظ ✔" , $home);
                     
                      
             $numbers["num"][$text]["con"]            = $numbers[$chat_id]["con"];
             $numbers["num"][$text]["price"]         = $numbers[$chat_id]["price"];
             if(!in_array($numbers[$chat_id]["ser"],$numbers["num"][$text]["ser"])){
             	$numbers["num"][$text]["ser"][]            = $numbers[$chat_id]["ser"];
             }
             if($numbers[$chat_id]["ser"] == "5sim"){
             	$numbers["num"][$text]["site-name"] = $numbers[$chat_id]["name"];
             }
             $con = array_flip($country);
             $numbers["num"][$text]["con-key"]     = $con[$text];
             save($numbers , "numbers");
             unset($info[$chat_id]["mode"]); 
             save($info);
exit;
            
#//////#
elseif($data == "add_offer") :
           edit("ارسل اسم الدوله" , 
            );    
           $info[$chat_id]["mode"] = "add_offer";
           save($info);
exit;

elseif(preg_match("/[A-z0-9]+/",$a[1]) && $info[$chat_id]["mode"] == "add_offer"):
          send("حسنا عزيزي اختر البرنامج 🚩" , [
          
                    [                
                    ["text"=>"-  واتساب . 🌧", "callback_data"=>"con#wa#whatsapp"]
                ],
                [
                    ["text"=>"-  تيليجرام . ☂", "callback_data"=>"con#tg#telegram"],
                    ["text"=>"-  فيسبوك . 🚀", "callback_data"=>"con#fb#facebook"]
                ],
                [
                    ["text"=>"- إيمو . 💥", "callback_data"=>"con#im#imo"],
                    ["text"=>"- جوجل .  💫", "callback_data"=>"con#go#google"]
                ],
                [
                    ["text"=>"-  انستقرام . ⛱", "callback_data"=>"con#ig#instagram"],
                    ["text"=>"-  تويتر . 🧳", "callback_data"=>"con#tw#twitter"]
                ],
                [
                    ["text"=>"-  يلاشات . ☄", "callback_data"=>"con#yl#yalla"],
                    ["text"=>"-  فايبر . 💫", "callback_data"=>"con#fa#viber"]
                ],
                [                
                    ["text"=>"القائمة الرئيسية 🏡", "callback_data"=>"home"]
                ]
         ]);
             $numbers[$chat_id]["name"] = $a[0];
             $numbers[$chat_id]["name2"] = $a[1];
             save($numbers , "numbers");
             $info[$chat_id]["mode"] = "addcon2";
             save($info);
exit;

elseif($ex[0] == "con" &&  preg_match("/[A-z]+/",$ex[1]) && $info[$chat_id]["mode"] == "addcon2"):
          edit("حسنا عزيزي قم باختيار السيرفر 💻" , [
          
                  [["text" => '5sim 🔴', "callback_data" => 'ser#5sim']],                                
                  [["text" => 'Sms-Man 🔵', "callback_data" => 'ser#man']],
                  [["text" => 'Vak ⚪', "callback_data" => 'ser#vak']],                           
             ]);
             $numbers[$chat_id]["con"] = $ex[1]."#".$ex[2];
             save($numbers , "numbers");
             $info[$chat_id]["mode"] = "addser2";
             save($info);
exit;      


elseif($ex[0] == "ser" &&  preg_match("/[A-z0-9]+/",$ex[1]) && $info[$chat_id]["mode"] == "addser2"):
          edit("حسنا قم بإرسال مفتاح الدولة مثال :-\n اليمن ( 967 )" , [
          
                    [["text" => 'مفاتيح الدول 🚩', "callback_data" => 'countrys']],                                                  
         ]);
         
             $numbers[$chat_id]["ser"] = $ex[1];
             save($numbers , "numbers");
             $info[$chat_id]["mode"] = "addkey2";
             save($info);
exit;

elseif(preg_match("/[0-9]+/",$text) && $info[$chat_id]["mode"] == "addkey2"):
          send("قم بارسال السعر" , $home);
             $numbers[$chat_id]["key"] = $text;
             save($numbers , "numbers");
             $info[$chat_id]["mode"] = "addprice";
             save($info);
exit;
elseif(preg_match("/[0-9]+/",$text) && $info[$chat_id]["mode"] == "addprice"):
          send("تم الحفظ" , $home);
             $numbers["offers"][$numbers[$chat_id]["key"]]["name"]         = $numbers[$chat_id]["name"];
             $numbers["offers"][$numbers[$chat_id]["key"]]["con"]            = $numbers[$chat_id]["con"];
             $numbers["offers"][$numbers[$chat_id]["key"]]["ser"]            = $numbers[$chat_id]["ser"];
             $numbers["offers"][$numbers[$chat_id]["key"]]["site-name"] = $numbers[$chat_id]["name2"];
             $numbers["offers"][$numbers[$chat_id]["key"]]["price"]     = $text;
             $numbers["offers"][$numbers[$chat_id]["key"]]["con-key"]     = $numbers[$chat_id]["name"];
             save($numbers , "numbers");
             unset($info[$chat_id]["mode"]);
exit;
#//////#
elseif($ex[0] == "send") :
edit("ارسل رسالتك الآن",$home);
$info[$chat_id]["mode"]    =   "id";
$info[$chat_id]['mid']     = $ex[2];
$info[$chat_id]['idmem']   = $ex[1];
save($info);
exit;
elseif($message && $chat_id == $admin && $info[$chat_id]["mode"]  == "id") :
       bot('sendmessage',[
       'chat_id' => $info[$chat_id]['idmem'],
       'text' => "تم الرد على رسالتك الرد 👇👇",
       'reply_to_message_id' => $info[$chat_id]['mid']
       ]);
       bot(copymessage,[
            chat_id=>$info[$chat_id]['idmem'],
            message_id=>$message_id,
           from_chat_id=>$admin,
'reply_to_message_id' => $info[$chat_id]['mid']
       ]);
     exit;

elseif($data == "unban"):
edit("ارسل آيدي العضو",$home);
$info[$chat_id]['mode'] = "ok";
save($info);
exit;

elseif(preg_match("/\d+/",$text) && $info[$chat_id]['mode'] =="ok" ) :
send("تم الغاء التقييد بنجاح ✅",$home);
unset($info[$text]['check']);
save($info);
unset($readynumber[$text]["buy"]);
save($readynumber , "readynum");
exit;
    
    elseif ( $data == "make_card" ) :
        edit("قم بارسال فئة الكرت ",$home);
        $info[$chat_id]["mode"]     =   "make_code";
        save($info);
        exit;
       elseif (  $text and $text != null && $info[$chat_id]['mode'] == "make_code" ) :
       send ( "قم بإرسال الكمية");

        $info[$chat_id]['price']    =   filter_var($text,FILTER_VALIDATE_INT);
        $info[$chat_id]['mode'] = "amount";
        save($info);
    elseif ( $text && $text != null && $info[$chat_id]['mode'] == "amount" ) :
        send("جاري الانشاء....");
        $info[$chat_id]['amount'] = filter_var($text, FILTER_VALIDATE_INT);
        $info[$chat_id]["mode"]     =   null;
        save($info);
        send("تم الانشاء");
        send("تم انشاء " . $info['amount'] . " بطاقة وبسعر" . $info['price'] ." يمكنك الآن تنويه المستخدمين لشراء بطائق من متجر كروت الشحن"
        ,$home);
        $codes  =   substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOBQRSTUVWXYZ"), 1, 10);
        $numbers['cards'][$codes]['price'] = $info[$chat_id]['price'];
        $numbers['cards'][$codes]['amount'] = $info[$chat_id]['amount'];
        save($numbers,"numbers");
        exit;
    elseif($data == 'make_ready'):
edit("
🌷 اضف الرقم بالشكل التالي
💢 الاسم :-
💯 السعر :-
⁉️ الحالة :-
⚠️ ملاحظة :-
🌷 الرقم :-
♻ الكود :-
",$home );
$info[$chat_id]['mode'] = 'ready';
save($info);
exit;

elseif($text && $info[$chat_id]['mode'] == 'ready' ) :
$explode        = explode("\n",$text);
if(isset($explode[4])){
$country         = $explode[0];
$price             = $explode[1];
$now             = $explode[2];
$what             = $explode[3];
$number             = $explode[4];
$num =              substr($number, 0,-4)."••••";
$code             = $explode[5];
$pk                  = rand(1,100980077);
$readynumber['ready'][$pk]['country'] = $country;
$readynumber['ready'][$pk]['price'] = $price;
$readynumber['ready'][$pk]['now'] = $now;
$readynumber['ready'][$pk]['what'] = $what;
$readynumber['ready'][$pk]['number'] = $number;
$readynumber['ready'][$pk]['code'] = $code;
save($readynumber,"readynum");
sendd($channel , "

☑ ¦ تم إضافه رقم جاهز لقسم الأرقام الجاهزة🍁

🌏 ¦ الدولة:  $country
💰 ¦ السعر: $price
☎️ ¦  الرقم:  $num
🌀 ¦ الحالة: $now
", [
   [
         ["text"=>"⏮ ⁞ إضغط هنا لشراء الرقم. ☑️","url"=>"https://t.me/$bot?start=buy#$pk"]]
 ]);

send("*تم إضافة رقم جديد الى قسم الأرقام الجاهزة بنجاح! ✅

🏴 الدولة: $country
💸 السعر: ₽ $price
📞 الرقم: $num
✨ الحالة: $now
💳 كود السلعة  $pk *
",$home);
$info[$chat_id]['mode'] = null;
save($info);
}
exit;

elseif($data == "del_ready") :
$keyboad['inline_keyboard'][] = [['text'=>'حذف السلعة ⛔','callback_data'=>'no'],['text'=>'السعـــر💲','callback_data'=>'no'],['text'=>'الدولة 🏴','callback_data'=>'no']];
foreach($readynumber['ready'] as $key => $nhh ):
$con =   $nhh["country"];
$price = $nhh["price"];
$code = substr($key,0,8);

$keyboad['inline_keyboard'][] = [['text'=>"$key",'callback_data'=>"del#$key"],['text'=>$price . ".00₽",'callback_data'=>"no"],['text'=>"$con",'callback_data'=>"no"]];
endforeach;
$keyboad['inline_keyboard'][] = [['text'=>'تحديث الصفحة 🔂',"callback_data"=>"readynumbers"],['text'=>'القائمة الرئيسية 🏡',"callback_data"=>"home"]];
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text' => "
اختر الدولة الذي تريد حذفها ❌
",
'reply_markup'=>json_encode($keyboad)
]);
exit;

elseif($ex[0] == "del" ):
edit("تم حذف السلعة بنجاح ✔",$home);
unset($readynumber["ready"][$ex[1]]);
save($readynumber,"readynum");
exit;

    elseif ( $data == "addpoint" ):
        edit("قم بإرسال إيميل الشخص المراد إرسال النقاط له",$cancel);
        $info[$chat_id]["mode"] =   "sendpoint";
        save($info);
        exit;
    elseif ( preg_match("/^[A-z0-9\.]*@*[A-z]+\.[A-z]+$/",$text) && $info[$chat_id]["mode"] == "sendpoint" ):
        $info[$chat_id]["mode"] =   "sendpoint";
        $info[$chat_id]["email"] =   $text;
        save($info);
        send("قم باسال الرصيد الذي تريد اضافته",$cancel);
        exit;
    elseif ( preg_match("/\d+/",$text) && $info[$chat_id]["mode"] == "sendpoint" ):
        if( is_numeric($text) ):
            $donor   =   $check[$info[$chat_id]["email"]]["idd"];
            $receive = $refral[$check[$info[$chat_id]["email"]]["idd"]]["ref"];
            $idrec     = $check[$receive]["idd"];
            $point["members"][$info[$chat_id]["email"]]["point"]  +=   $text;
            save($point , "point");
            if($point["members"][$receive]["point"] >= 50) {
            $point["members"][$receive]["point"] += 0.1 * $text;
            save($point , "point"); }
            $info[$chat_id]["mode"]             =   null;     
            save($info);
            send(" اكتملت عملية الشحن بنجاح ✔",$home);
            sendd($donor , "☑️ تم إعادة شحن حسابك بـ مبلغ  $text روبل\n ↩️ رصيدك الأن : " .
            $point["members"][$info[$chat_id]["email"]]["point"] . " روبل" );
            
            sendd($idrec , "🎊 مفاجأه  \n 💡 لقد قام أحد فريقك بشحن حسابة وربحت $po روبل 💰");
            unset($info[$chat_id]["email"]);
            unset($info[$chat_id]["mode"]);
            save($info);
           else :
           send("قم بارسال قيمة رقمية وليس نص ",$home);
           endif;
        
    elseif ( $data == "delpoint" ):
        edit("قم بإرسال إيميل الشخص المراد خصم النقاط منه",$cancel);
        $info[$chat_id]["mode"] =   "delpoint";
        save($info);
        exit;
    elseif ( preg_match("/^[A-z0-9\.]*@*[A-z]+\.[A-z]+$/",$text) && $info[$chat_id]["mode"] == "delpoint" ):
        $info[$chat_id]["mode"] =   "delpoint2";
        $info[$chat_id]["email"] =   $text;
        save($info);
        send("قم باسال الرصيد الذي تريد خصمه",$cancel);
        exit;
    elseif ( preg_match("/\d+/",$text) && $info[$chat_id]["mode"] == "delpoint2" ):
        if( is_numeric($text) ):
            $donor   =   $check[$info[$chat_id]["email"]]["idd"];
            $receive = $refral[$check[$info[$chat_id]["email"]]["idd"]]["ref"];
            $idrec     = $check[$receive]["idd"];
            $point["members"][$info[$chat_id]["email"]]["point"]  -=   $text;
            save($point , "point");
            $info[$chat_id]["mode"]             =   null;     
            save($info);
            send("تم الخصم",$home);
            sendd($donor , "☑️ تم خصم رصيد من حسابك مبلغ  $text روبل\n ↩️ رصيدك الأن : " .
            $point["members"][$info[$chat_id]["email"]]["point"] . " روبل" );
            unset($info[$chat_id]["email"]);
            unset($info[$chat_id]["mode"]);
            save($info);
           else :
           send("قم بارسال قيمة رقمية وليس نص ",$home);
           endif;
        
    elseif ( $data == "getcodes" ):
        foreach ( $numbers["numbers"] as $code=>$num ):
            $result .=   $num["name"] . " [ <code> " . $code . "</code><br/>]";
        endforeach;
        edit($result,$home);
    

elseif($data == "add_operator" ):
edit("قم بارسل اسم وقيمة المورد بالطريقة التالية
`مورد 1
virt1`

",$cancel);
$info[$chat_id]["mode"] = "op";
save($info);
exit;

elseif($text && $info[$chat_id]["mode"] == "op" ) :
$pk = rand(1,100980077);
$exx = explode( "\n" , $text);
if(preg_match("/[A-z]/" , $exx[1]) ){
send("تم الحفظ \n اسم المورد $exx[0] \n الكود : `$pk`",$home);
$info["operator"][$pk]["name"] = $exx[0];
$info["operator"][$pk]["val"] = $exx[1];
save($info);
unset($info[$chat_id]["mode"]);
save($info);
}
exit;

elseif($data == "del_operator") :
$json["inline_keyboard"][]  =   [["text"=>"اسم المورد ♨️","callback_data"=>"hello"],["text"=>"القيمة 🛑","callback_data"=>"hmm"]];
foreach($info["operator"] as $k => $v):
$name = $info["operator"][$k]["name"];
$val  = $info["operator"][$k]["val"];
$json["inline_keyboard"][]  =   [["text"=>"$name","callback_data"=>"hello"],["text"=>"","callback_data"=>"delope#$k"]];
endforeach;
bot("editmessagetext",[
                "chat_id"=>$chat_id,
                "text"=>"اختر المورد الذي تريد حذفه 🗑",
                "message_id" => $message_id,
                "reply_markup" => json_encode($json)
        ]);
     exit;
     
elseif($ex[0] == "delope"):
unset($info["operator"][$ex[1]]);
save($info);
edit("تم الحذف بنجاح ✔");
exit;

elseif(preg_match("/[0-9]/", $text)&& $info[$chat_id]["mode"] == "del_op" ) :
if($info["operator"][$text]["name"] != null){
unset($info["operator"][$text]["name"]);
unset($info["operator"][$text]["val"]);
unset($info[$chat_id]["mode"]);
save($info);
send("تم الحذف");
} else {
send("المورد الذي قمت بارسالة غير موجود",$home);
}

elseif($data == "add-n"):
edit("ارسل النسبة التي تريد اضافتها الآن",$cancel);
$info[$chat_id]["mode"] = "hmm";
save($info);
exit;

elseif(is_numeric($text) and $info[$chat_id]["mode"] == "hmm"):
if($text >= 1 && $text < 99 ){
send("تم حفظ النسبة بنجاح✔");
$info["nesbah"] = $text;
unset($info[$chat_id]["mode"]);
save($info);
} else {
send("الرجال ادخال رقم اقل من 100");
}
#==============#
elseif($ex[0] == "deloffer") :
edit("تم الحذف");
                unset($numbers["offers"][$ex[1]]);
                save($numbers , "numbers");
                exit;
elseif($data == "del_offer") :
$e = 0;
$json = [];
                $json["inline_keyboard"][$e]  =   [["text"=>"🌎 ⌯ الدولة.","callback_data"=>"hello"],["text"=>"⏬ ⌯ البرنامج.","callback_data"=>"hmm"],["text"=>"💰⌯ السعر.","callback_data"=>"Alwalidee"]];
                $e++;
foreach($numbers["offers"] as $key => $val) :    
                       
                       $ser  = $numbers["offers"][$key]["ser"];   
                       $con = $numbers["offers"][$key]["con"];   
                      
                       
if($ser == "5sim")  : $app  = explode("#",$con)[1];  else   : $app  = explode("#",$con)[0];
                      endif;   
                  	$name      = $numbers["offers"][$key]["name"];
                  	$price      = $numbers["offers"][$key]["price"];
                      $json["inline_keyboard"][$e][]  =   ["text"=>$name ,"callback_data"=>"deloffer#$key"];
                      $json["inline_keyboard"][$e][]  =   ["text"=>explode("#",$con)[1] ,"callback_data"=>"deloffer#$key"];
                      $json["inline_keyboard"][$e][]  =   ["text"=>$price ,"callback_data"=>"deloffer#$key"];
                      $e++;
endforeach;
                $json["inline_keyboard"][]  =   [["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]] ;
                 bot("editmessagetext",[
                "chat_id"=>$chat_id,
                "text"=>"⏬ - قائمة العروض المتوفرة بالبوت. ☑️",
                "message_id" => $message_id,
                "reply_markup" => json_encode($json)
        ]);
        
     exit;
#==============#
endif;
    #====================================================================#
else:
    die("@Baageel_Programmer");
endif;
/*
$info["members"][$chat_id]["point"] نقاط العضو
*/
@$token = '5982601203:AAENr4fuwi5107rcrUb5gwALd8is0KJIaVA';

/*

المقبض في السطر ٣٤٤ في ملف login.php

*/



$defCoinURL = 1;  #نقاط الرابط الإفتراضية


$setCoinURL = $info['revral'] != null ? $info['revral'] : $defCoinURL;


$nnn = [
"371" => "49",
"21" => "21",
"43" => "50",
"62" => "6",
"855" => "24",
"357" => "77",
"36" => "84",
"61" => "175",
"40" => "32",
"994" => "35",
"687" => "185",
"58" => "70",
"52" => "54",
"504" => "88",
"258" => "80",
"250" => "140",
"265" => "137",
"244" => "76",
"234" => "19",
"223" => "69",
"251" => "71",
"225" => "27",
"221" => "61",
"218" => "102",
"228" => "99",
"249" => "98",
"269" => "133",
"213" => "58",
"216" => "89",
"222" => "114",
"27" => "31",
"992" => "143",
"975" => "158",
"995" => "128",
"98" => "57",
"856" => "25",
"92" => "66",
"880" => "60",
"7" => "0",
"380" => "1",
"86" => "3",
"63" => "4",
"95" => "5",
"60" => "7",
"254" => "8",
"255" => "9",
"84" => "10",
"996" => "11",
"852" => "14",
"48" => "15",
"20" => "21",
"853" => "20",
"261" => "17",
"91" => "22",
"353" => "23",
"856" => "25",
"509" => "26",
"967" => "30",
"57" => "33",
"1" => "36",
"212" => "37",
"54" => "39",
"233" => "38",
"235" => "43",
"235" => "42",
"964" => "47",
"370" => "44",
"385" => "45",
"46" => "46",
"43" => "50",
"966" => "53",
"66" => "52",
"886" => "55",
"34" => "56",
"90" => "62",
"386" => "59",
"420" => "63",
"94" => "64",
"51" => "65",
"64" => "67",
"224" => "68",
"976" => "72",
"55" => "73",
"256" => "75",
"33" => "78",
"32" => "82",
"977" => "81",
"359" => "83",
"39" => "86",
"595" => "87",
"670" => "91",
"506" => "93",
"971" => "95",
"591" => "92",
"263" => "96",
"965" => "100",
"503" => "101",
"593" => "105",
"968" => "107",
"963" => "110",
"974" => "111",
"507" => "112",
"53" => "113",
"232" => "115",
"962" => "116",
"351" => "117",
"229" => "120",
"501" => "124",
"30" => "129",
"973" => "145",
"231" => "135",
"1" => "187",
"81" => "182",
"211" => "177",
"61" => "175",
"47" => "174",
"41" => "173",
"1" => "169",
"240" => "167",
"1" => "166",
"352" => "165",
"1" => "164",
"358" => "163",
"594" => "162",
"993" => "161",
"590" => "160",
"960" => "159",
"230" => "157",
"598" => "156",
"355" => "155",
"241" => "154",
"961" => "153",
"226" => "152",
"686" => "186",
"56" => "151",
"242" => "150",
"252" => "149",
"374" => "148",
"250" => "141",
];
$sup = [
"93" => "AF",
"385" => "AX",
"355" => "AL",
"213" => "DZ",
"1" => "AD",
"244" => "AO",
"54" => "AR",
"297" => "AW",
"61" => "AU",
"43" => "AT",
"994" => "AZ",
"1" => "BS",
"973" => "BH",
"880" => "BD",
"1" => "BB",
"32" => "BE",
"39" => "IT",
"81" => "JP",
"965" => "KW",
"996" => "KG",
"95" => "MM",
"968" => "OM",
"966" => "SA",
"211" => "SS",
"963" => "SY",
"90" => "TR",
"971" => "AE",
"1" => "US",
"967" => "YE",
"66" => "TH",
"212" => "MA",
"218" => "LY",
"963" => "JO",
"44" => "GB",
"20" => "EG",
"975" => "BT",
"1" => "CA",
"86" => "CN",
"682" => "CK",
"253" => "DJ",
"852" => "HK",
"98" => "IR",
"964" => "IQ",
"670" => "TL",
"228" => "TG",
"216" => "TN",
"974" => "QA",
"63" => "PH",
"351" => "PT",
"675" => "PG",
"501" => "PA",
"92" => "PK",
"225" => "CI",
"506" => "CR",
"291" => "ER",
"372" => "EE",
"251" => "ET",
"500" => "FK",
"33" => " FR",
"298" => "FO",
"995" => "GE",
"49" => "DE",
"509" => "HT",
"972" => "IL",
"60" => "MY",
"960" => "MV",
"47" => "NO",
"51" => "PE",
"677" => "SB",
"252" => "SO",
"211" => "SS",
"34" => "ES",
"421" => "SK",
"386" => "SI",
"46" => "SE",
"992" => "TJ",
"260" => "ZM",
"263" => "ZW",
"598" => "UY",
"998" => "UZ",
"678" => "VU",
"297" => "AW",
"375" => "BY",
"1" => "KY",
"238" => "CV",
"269" => "KM",
"45" => "DK",
"687" => "NC",
"21" => "EG",
];
if(!is_dir("data")) mkdir("data");
if(!file_exists("stat.txt")) file_put_contents("stat.txt","ايقاف");
if(!file_exists("wak.php")) file_put_contents("wak.php","ايقاف");
if(!is_dir("stor")) mkdir("stor");
if(!is_dir("mem")) mkdir("mem");
@$stat = file_get_contents("stat.txt");
function done($array){
	global $chat_id;
@file_put_contents("data/$chat_id.json",json_encode($array));
}
function save($array,$file="info"){
@file_put_contents("stor/$file.json",json_encode($array));
}
function decrypt($tex){
    return @openssl_decrypt($tex,"AES-256-CFB1", 1 );}
function encrypt($a){
    return @openssl_encrypt($a,"AES-256-CFB1", 1 );}


$message=$update->message;
$call=$update->callback_query;
$text = $message->text;
$data = $call->data;
$chat_id = $message->chat->id ?? $call->message->chat->id;
$id = $message->from->id ?? $call->from->id;
$message_id = $message->message_id ?? $call->message->message_id;
$fname = $message->from->first_name ?? $call->from->first_name;
$user = $message->from->username ?? $call->from->username;
$photo = $message->photo;
$photo_id = $photo->file_id;
$calid = $update->callback_query->id;
$bot   =   bot('getme',['bot'])->result->username;
$el = explode(" " , $text);
$channel ="-1001713807557";
$key = [1,2,3,4,5,6,7,8,9 ,"♻️",0, "❌","✅"];

if($user == null) $user = "no user name";
$admin = 5155261599;
//$admin = 5155261599;
@$members = explode("\n",file_get_contents('mem/members.txt'));
@$ex = explode("#",$data);
@$tet =  explode(" " , $text);

$Asia              = ["البحرين 🇧🇭" => "973" ,"الصين 🇨🇳" => "86"  , "كازاخستان 🇰🇿" => "+7" , "السعودية 🇸🇦" => "966"  , "عمان 🇴🇲" => "968" , "قطر 🇶🇦" => "974"  , "أندونيسيا 🇮🇩" => "62"  , "الكويت 🇰🇼" => "965" , "الأردن 🇯🇴" => "962" , "نيبال 🇳🇵" => "977" , "قرغيزستان 🇰🇬" => "996"  , "الهند 🇮🇳" => "91" , "ماليزيا 🇲🇾" => "60" , "منغوليا 🇲🇳" => "974"  , "سيريلانك 🇱🇰" => "94"  , "باكستان 🇵🇰" => "92" , "أوزبكستان🇺🇿" => "998" , "العراق 🇮🇶" => "964" , "أفغانستان 🇦🇫" => "93"  , "الإمارات 🇦🇪" => "971" , "هونغ 🇭🇰" => "852"  , "اليمن 🇾🇪" => "967" , "ميانمار 🇲🇲" => "95" , "تايوان 🇹🇼" => "886" , "بنغلاديش🇧🇩" => "880"  ,"جورجيا 🇬🇪" => "995" , "الفلبين 🇵🇭" => "63"  , "كمبوديا 🇰🇭" => "855" , "لاوس 🇱🇦" => "856"  , "تايلاند 🇹🇭" => "66" , "فيتنام 🇻🇳" => "84" , "ارمينيا 🇦🇲" => "374"  , "المالديف 🇲🇻" => "960" , "طاجيكستان 🇹🇯" => "992" , "تركمانستان🇹🇲" => "993" ];
$Africa           = ["مصر 🇪🇬" => "20", "أثيوبيا 🇪🇹" => "251", "تونس 🇹🇳" => "216" , "توجو 🇹🇬" => "228" , "ليبيا 🇱🇾" => "218", "كينيا 🇰🇪" => "254", "السودان 🇸🇩" => "249", "الجزائر 🇩🇿" => "213", "المغرب 🇲🇦" => "212", "موريتانيا 🇲🇷" => "222", "الصومال 🇸🇴" => "252", "الكاميرون 🇨🇲" => "237", "ناميبيا 🇳🇦" => "264" , "انغولا 🇦🇴" => "244", "مدغشقر 🇲🇬" => "261" , "زامبيا 🇿🇲" => "260", "جزر القمر 🇰🇲" => "269" , "السنغال 🇸🇳" => "221" , "ليبيريا 🇱🇷" => "231", "مالي 🇲🇱" => "223", "أوغندا 🇺🇬" => "256", "نيجيريا 🇳🇬" => "234", "غامبيا 🇬🇲" => "220", "ملاوي 🇲🇼" => "265", "تنزانيا 🇹🇿" => "255", "جنوب افريقيا 🇿🇦" => "27"];
$Erub              = [ "استونيا 🇪🇪" => "372" , "بولندا 🇵🇱" => "48", "روسيا 🇷🇺" => "7" , "البرتغال 🇵🇹" => "351", "اسبانيا 🇪🇸" => "34" , "أيرلندا 🇮🇪" => "353" , "فرنسا 🇫🇷" => "33", "قبرص 🇨🇾" => "357" , "تركيا 🇹🇷" => "90" , "المانيا 🇩🇪" => "49", "مولدوفا 🇲🇩" => "373" , "النرويج 🇳🇴" => "47" , "بلجيكا 🇧🇪" => "32", "السويد 🇸🇪" => "46", "لاتفيا 🇱🇻" => "371" , "رومانيا 🇷🇴" => "40", "هولندا 🇳🇱" => "31", "بلغاريا 🇧🇬" => "359" , "استراليا 🇦🇺" => "61", "النمسا 🇦🇹" => "43"];
$Amrica         = [ "فنزويلا 🇻🇪" => "58" , "كولومبيا 🇨🇴" =>"57" , "امريكا 🇺🇲" => "1", "الأرجنتين 🇦🇷" => "54" , "البرازيل 🇧🇷" => "55" , "بيرو 🇵🇪" => "51", "المكسيك 🇲🇽" => "52" , "بوليفيا 🇧🇴" => "391", "بابو 🇵🇬" => "675" , "الإكوادور 🇪🇨" => "593" , "كندا 🇨🇦" => "+1", "باراغواي 🇵🇾" => "595", "هايتي 🇭🇹" => "509" , "بنما 🇵🇦" => "507" , "هندوراس 🇭🇳" => "504", "سيلفادور 🇸🇻" => "salvador", "نيكاراغو 🇳🇮" => "505", "كاليدونيا 🇳🇨" => "687" ];
#=======5sim_country========#
$Asia5sim      = [ "bahrain" , "china" ,  "kazakhstan" ,  "saudiarabia" ,  "oman" ,  "qatar" ,  "indonesia",  "kuwait" ,  "jordan" ,  "nepal" ,  "kyrgyzstan" ,  "india" ,  "malaysia",  "mongolia" ,  "srilanka" ,  "pakistan" ,  "uzbekistan",  "iraq" ,  "afghanistan" ,  "uae",  "hongkong" ,  "yemen" ,  "myanmar",  "taiwan" ,  "bangladesh" , "georgia",  "philippines" ,  "cambodia" ,  "laos",  "thailand",  "vietnam" ,  "armenia" ,  "maldives",  "tajikistan" ,  "turkmenistan" ];
$Africa5sim   = [ "egypt",  "ethiopia",  "tunisia" ,  "togo" ,  "libya",  "kenya",  "sudan",  "algeria",  "morocco",  "mauritania",  "somalia",  "cameroon",  "namibia" ,  "angola",  "madagascar" ,  "zambia",  "comoros" ,  "senegal" ,  "liberia",  "mali",  "uganda",  "nigeria",  "gambia",  "malawi",  "tanzania",  "southafrica"];
$Erub5sim      = [ "estonia" ,  "poland",  "russia" ,  "portugal",  "spain" ,  "ireland" ,  "france",  "cyprus" ,  "turkey" ,  "germany" , "moldova" , "norway" ,  "belgium",  "sweden",  "latvia" , "romania",  "netherlands",  "bulgaria" ,  "australia",  "austria"];
$Amrica5sim = [  "venezuela" , "colombia" ,  "usa",  "argentina" ,  "brazil",  "peru",  "mexico" ,  "bolivia",  "papuanewguinea" ,  "ecuador" ,  "canada",  "paraguay",  "haiti" ,  "banama" ,  "honduras",  "salvador",  "nicaragua" ,  "newcaledonia" ];
#=====SmsMan_country======#
$Erubsms      = [ "34","15","0","117","56","23","78","77","62","43","85","174","82","46","49","32","48","83","175","50"];
$Amricasms = ["70","33","187","39","73","65","54","92","79","105","36","87","26","112","88","101","90","185" ];
$Africasms   = ["21","71","89","99","102","8","98","58","37","114","149","41","138","76","17","147","133","61","135","69","75","19","28","137","9","31"];
$Asiasms      = ["145","3","2","53","107","111","6","100","116","81","11","22","7","72","64","66","40","47","74","95","14","30","5","55","60","128","4","24","25","52","10","148","159","143","161" ];
#==========function========#
function send($text, $list = [])
{
global $chat_id;
$result = bot("sendmessage", [
"chat_id" => $chat_id,
'text' => $text,
"parse_mode"=>"markdown",
'disable_web_page_preview'=>true,
"reply_markup" => json_encode([
"inline_keyboard" => $list
])
])->result;
return $result;
}
function answer($text) {
global $calid;
bot('answercallbackquery',[
'callback_query_id' => $calid,
'text'=>$text,
'show_alert'=>true,
]);
}

function sendd($chat_id,$text, $list = [])
{
$result = bot("sendmessage", [
"chat_id" => $chat_id,
'text' => $text,
"parse_mode"=>"markdown",
"reply_markup" => json_encode([
"inline_keyboard" => $list
])
])->result;
return $result;
}
function keys($val,$arr) {
        if(empty ($val)) $z ="كلمة المرور";
        else $z=$val;
        $a =1;
        $nhh[inline_keyboard][0][] = ['text' => $z, callback_data => "nothing"];

        foreach($arr as $i => $va) :
        if(preg_match("/\d/",$va)){
        $b ="ok#$val#$va";
        } elseif($va =="❌") {$b ="del#$val";
        $nhh[inline_keyboard][$a][] = ['text' => $va, callback_data => $b];
        continue;
        } elseif($va =="♻️") {$b ="ok#-----"; 
        } elseif($va =="✅") {$b ="true#$val"; 
        $nhh[inline_keyboard][$a][] = ['text' => $va, callback_data => $b];
        continue;}
       $nhh[inline_keyboard][$a][] = ['text' => $va, callback_data => $b];
       if(($i+1)%3==0)$a++;
       endforeach;
        return json_encode($nhh);
   }
   
   function jelloAppend($recentText,$type){
   	if($type == 'en'){
   		$oneArr = array("+","/");
   		$towArr = array("jelPlus","jelSlash");
   		return str_replace($oneArr,$towArr,$recentText);
   	} else if($type == 'de'){
   		$oneArr = array("+","/");
   		$towArr = array("jelPlus","jelSlash");
   		return str_replace($towArr,$oneArr,$recentText);
   }
  }
   
   
function edit($text, $list = [])
{
global $chat_id;
global $message_id;
$result = bot("editmessagetext", [
"chat_id" => $chat_id,
'text' => $text,
"message_id" => $message_id,
"parse_mode"=>"markdown",
"reply_markup" => json_encode([
"inline_keyboard" => $list
])
])->result;
return $result;
}

if($chat_id==$admin){
require_once "admin.php";
} elseif(in_array($chat_id,$numbers["wak"]["ids"])){
	require_once "user-section.php";
	require_once "login.php";
	require_once "wak.php";
	
}
else{
require_once "user-section.php";
require_once "login.php";
}

#===============
#api_key
#5sim
$ApiKey5sim        = "96037df350074ac19e9d7a6a5bbb1835";//5sim
#sms
$ApiKeySmsMan = "ujmS-g9WYu-0JNT2fOUtr2IAcM4vyYi5";//man


#functions
#5sim============================================================================
function getBalance5sim(){
$api = file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=getBalance");
if ( $api == "BAD_KEY" || $api == "ERROR_SQL" ):
$result = "false";
else :
$result = $api;
endif;
return $result;
}
function getNumber5sim($service,$country,$operator){
$api = file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=getNumber&service=$service&forward=forward&operator=$operator&country=$country") ;
if ( $api == "BAD_ACTION" || $api == "BAD_SERVICE" || $api == "BAD_KEY" || $api == "ERROR_SQL" ):
$result = ["result"=>$api];
elseif( $api == "NO_NUMBERS" || $api == "NO_BALANCE" ):
$result = ["result"=>$api];
else:
$ApiExploded = explode(":",$api);
$result = ["result"=>"true","number" => $ApiExploded[2], "idnumber" => $ApiExploded[1]];
endif;
return $result;
}
function setStatus5sim($idnum,$status){ #هذا لالغاء الرقم او حظره او انهاء الطلب
/*
-1 = cencel older
6 = finish older
8 = ban number
*/
$api = file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=setStatus&status=$status&id=$idnum");
if ( $api == "ACCESS_ACTIVATOIN" ):
$result = ["resutl"=>"true","action"=>$api];
else:
$result = ["result"=>"false","ation"=>$api];
endif;
return $result;
}
function getCode5sim( $idnum ) { #get the code
$api = file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=getStatus&id=$idnum");
$explodedApi = explode(":",$api);
if ( $explodedApi[0] == "STATUS_OK" ):
$result = ["result"=>"true","code"=>$explodedApi[1]];
else:
$result = ["result"=>"false","action"=>$api];
endif;
return $result;
}
#vak===============================================================================
function getBalanceVak(){
$api = json_decode(file_get_contents("https://vak-sms.com/api/getBalance/?apikey=$api_key_vak"));
if ( $api->error == null ):
$result = $api->balance;
else:
$result = $api->error;
endif;

return $result;
}
function getNumberVak($service,$country){
$vak = json_decode(file_get_contents("https://vak-sms.com/api/getNumber/?apikey=$api_key_vak&service=$service&country=$country"));
if ( $vak->tel != null ):
$result = ["result"=>"true","number"=>$vak->tel, "idnum" =>$vak->idNum] ; 
else:
$result = ["result"=>$api->error];
endif;
return $result;
}
function getStatusVak($status,$idnum){
/*
status:
end = cancel the number
bad = banned
send = the number is ready



*/
$api = json_decode(file_get_contents("https://vak-sms.com/api/setStatus/?apikey=$api_key_vak&status=$status&idNum=$idnum"));
//$api->error == null

}
function getSmsVak($idnum){
$vak = json_decode(file_get_contents("https://vak-sms.com/api/getSmsCode/?apiKey=$api_key_vak&idNum=$idnum&all"));
if ( $vak->error != null ):
$result = ["result"=>"false"];
elseif ( $vak->smsCode == null ):
$result = ["result"=>"NoCode"];
else:
$result = ["result"=>"true","code"=>$vak];//some time code be as an array
endif;
return $result;
}
#sms======================================================================================
function getBalance(){
$sms = file_get_contents("https://sms-activate.ru/stubs/handler_api.php?api_key=$api_key_sms&action=getBalance");
$explodedApi = explode(":",$sms);
if ( $explodedApi[0] == "ACCESS_BALANCE" ):
$result = ["result"=>"true","balance"=>$explodedApi[0]];
else:
$result = ["result"=>$sms];
endif;
return $result;
}
function getNumberSms($service,$country){
$sms = file_get_contents("https://sms-activate.ru/stubs/handler_api.php?api_key=$api_key_sms&action=getNumber&service=$service&country=$country");
$explodedApi = explode(":",$api);
if ( $explodedApi[0] == "ACCESS_NUMBER" ):
$result = ["result"=>"true","number"=>$explodedApi[2], "idnum"=>$explodedApi[1]];
elseif($sms == "NO_BALANCE"):
$result = ["result" => "NO_BALANCE"];
else:
$result = ["result"=>$api];
endif;
return $result;
}
function getStatusSms($idnum ,$status){
$sms = file_get_contents("https://sms-activate.ru/stubs/handler_api.php?api_key=$api_key_sms&action=setStatus&id=$idnum&status=$status"); 
/*
status
6 done
8 band
*/
if ( $sms == "ACCESS_ACTIVATION" || $sms == "ACCESS_CANCEL" ):
$result = ["result"=>"true"];
else:
$result = ["result"=>$sms];
endif;
return $result;
}
function getSmsSms($idnum){
$sms = file_get_contents("https://sms-activate.ru/stubs/handler_api.php?api_key=$api_key_sms&action=getStatus&id=$idnum");
$explodedApi = explode(":",$sms);
if ( $explodedApi[1] != null ):
$result = ["result"=>"true","code"=>$explodedApi[1]];
elseif( $api == "STATUS-WAIT_CODE" ):
$result = ["result"=>"nocode"];
else:
$result = ["result"=>$api];
endif;
return $result;
}
#================
else:
die("@Baageel_Programmer");
endif;
$tex = explode(" " ,$text);
@$hom=[[["text"=>"إلغاء ⛔","callback_data"=>"settings"]]]; //home
@$backk=[[["text"=>"رجوع ⏯","callback_data"=>"settings"]]]; //home






if($data == "login_pannel") :
$info["members"][$chat_id]["mode"] =   null;
        $info[$chat_id]['mode'] = null; 
        save($info);
        edit( " 
🥇 •  هلاً بك عزيزي [$fname](tg://user?id=$chat_id)

🎗 •  في بوت تانجرو الأفضل في التليجرام. 
💎 •  يقوما البوت بتوفير أرقام وهمية لأكثر من 180 دولة  ولتفعيل برامج التواصل الإجتماعي مثل واتساب، فيسبوك..الخ ورشق جميع السويشال ميدميا.. انستجرام.. تيليجرام.. تويتر.. الخ.. وبأفضل الأسعار ✅

🛍️  • أسعار رخيصة، توفر ممتاز، دعم متواجد، خدمة سريعة ☑️.
                مــع تانجرو
🎖 •  اتقان - سرعة - اسعار منافسه
" , [
            [
                ["text"=>'☑️ ⌯ تسجيل الدخول.',"callback_data"=>"login"],
				["text"=>"♻️ ⌯ إنشاء حساب.","callback_data"=>"creatacount"],
            ],
            [
                ["text"=>"📊 ⌯ الإحصائيات.","callback_data"=>"botstatic"],
                ["text"=>"❓⌯ التعليمات.","callback_data"=>"infouse"]
            ],
            [
                ["text"=>"⁞ قناة البوت📡","url"=>"https://t.me/fffff282"],
                ["text"=>"🙅🏽‍♂⌯ الادارة.","url"=>"t.me/K_o_ll"]
            ],                       
            [
                ['text'=>"📮 ⌯ تواصل معنا.",'callback_data'=>"help"]
            ]
            ]);      
        exit;
        
        
exit;
elseif($data == "creatacount") :
$pass = rand(1, 100000);
            if($check[$chat_id]["mail"] == null) {        	
            $info[$chat_id]["check"] = $pass;
            save($info);
        
           $keyboard = keys("",$key);
           bot('editmessagetext',[
           'chat_id' => $chat_id,
           'message_id' => $message_id,
           'text' =>"⭕️ للأمان 
🔆 | سيتم التحقق من أنك لست روبوت
🔑 | قم بإدخال كلمة المرور التالية :- 

🗝 * $pass * 🗝",
'parse_mode' => "markdown",
          reply_markup => $keyboard,
    ]);
} else { 
       	answer("لقد قمت بانشاء حساب مسبقا");
       }
    exit;

elseif($ex[0] =="ok" && $info[$chat_id]["stop"] == null) :
$co = $ex[1];
$co .= $ex[2];
$pass = $info[$chat_id]["check"];
         if($ex[1] == "-----")$co="";
         $keyboard = keys($co,$key);
         bot('editmessagetext',[
         'chat_id' => $chat_id,
         'message_id' => $message_id,
         'text' =>"⭕️ للأمان 
🔆 | سيتم التحقق من أنك لست روبوت
🔑 | قم بإدخال كلمة المرور التالية :- 

🗝 * $pass * 🗝",
'parse_mode' => "markdown",
          reply_markup => $keyboard,
    ]);
 exit;
  
elseif(preg_match("/(del)#(\d+)/",$data,$res) && $info[$chat_id]["stop"] == null) :
         $pass = $info[$chat_id]["check"];
         $result = substr($res[2],0,strlen($res[2])-1);
         $keyboard = keys($result,$key);
         bot(editmessagetext,[
         chat_id=>$chat_id,
         'message_id' => $message_id,
         text =>"⭕️ للأمان 
🔆 | سيتم التحقق من أنك لست روبوت
🔑 | قم بإدخال كلمة المرور التالية :- 
 
🗝 * $pass * 🗝",
        "reply_markup" => $keyboard
  ]);
 exit;

elseif(preg_match("/(true)#(\d+)/",$data,$pass) && $info[$chat_id]["stop"] == null) :
           $password = rand(1, 100000);
           $email = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOBQRSTUVWXYZ"), 1, 8);
           $email = "$email@sms.net";
if($pass[2] == $info[$chat_id]["check"]){
edit("تم التحقق بنحاح ✅
وتم إنشاء الحساب ❇️

🅿️ | البربد الألكتروني : *$email*
🔑 | كلمة المرور  : *$password*

🛑 ملاحظة يمكنك تغيير كلمة المرور بأي وقت",[
[
                ["text"=>'¦ تسجيل الدخول ♻️',"callback_data"=>"home"]
            ],
            ]);      
        

unset($info[$chat_id]["check"]);
unset($info[$chat_id]["mode"] );
save($info);
$check[$chat_id]["mail"] = $email;
$check[$chat_id]["pass"] = $password;
$check[$check[$chat_id]["mail"]]["idd"] = $chat_id;
save($check , "check");
exit;
} else {
answer("خطأ يرجى المحاولة مجددا ☹");
}
exit;
       
       	
        elseif($data == "login"):
        if($check[$chat_id]["mail"] != null){
        $email = $check[$chat_id]["mail"];
        edit("🗝 | يمكنك تسجيل الدخول عبر حسابك

🔘 | اضغط على تسجيل الدخول ✅" , [
           [
                
                ["text"=>"$email","callback_data"=>"null"]
           ],
           [
                ["text"=>"تسجيل الدخول 🔘","callback_data"=>"home"]
            ]
        ]);
      } else { 
      	answer("لم تقم بإنشاء حساب 🙄");
      }
        
        elseif($data == "log") :
        $info[$chat_id]["stop"] = "!";
        save($info);
          $keyboard = keys("",$key);
         bot('editmessagetext',[
         'chat_id' => $chat_id,
         'message_id' => $message_id,
         'text' => "الرجاء إدخال كلمة المرور 🔑

🎛 لنتأكد من أنك صاحب الحساب ☎️",
          reply_markup => $keyboard,
    ]);
       
     elseif($ex[0] == "ok" && $info[$chat_id]["stop"] != null) :
     $co = $ex[1];
     $co .= $ex[2];
         if($ex[1] == "-----")$co="";
        $keyboard = keys($co,$key);
         bot(editmessagetext,[
         'message_id' => $message_id,
         'chat_id' => $chat_id,
         'text' => "الرجاء إدخال كلمة المرور 🔑

🎛 لنتأكد من أنك صاحب الحساب ☎️ ",
          'reply_markup' => $keyboard,
    ]);
    
  exit;
       elseif(preg_match("/(del)#(\d+)/",$data,$res) && $info[$chat_id]["stop"] != nul) :
       $result = substr($res[2],0,strlen($res[2])-1);
       $keyboard = keys($result,$key);
       bot(editmessagetext,[
       'message_id' => $message_id,
        'chat_id' => $chat_id,
         'text' =>"الرجاء إدخال كلمة المرور 🔑

🎛 لنتأكد من أنك صاحب الحساب ☎️",
         'reply_markup' => $keyboard
  ]);
exit;

elseif(preg_match("/(true)#(\d+)/",$data,$pass) && $info[$chat_id]["stop"] != nul) :
         if($pass[2] == $check[$chat_id]["pass"]){
         edit("جار التحقق ...");
         edit("تم التحقق بنجاح ✔" , [
     [
         ["text"=>'⁞ متابعة الدخول ✅',"callback_data"=>"home"]
     ]
   ]);
        unset($info[$chat_id]["stop"]);
        save($info);
} else {
answer("خطأ يرجى المحاولة مجددا ☹");
}
exit;
       
       elseif($data == "infouse") :
       edit("
- مرحباً عزيزي.

- اولاً: هذا البوت مخصص لعمل ارقام وهمية لجميع مواقع التواصل الإجتماعي.
- ثانياً: هذا البوت لايتحمل مسؤولية الارقام في حالة أنها انسرقت او انحظرت , بمعنى: البوت غير مسؤول عن الرقم بعد شرائه.
- يرجى عدم استعمال الارقام في أشياء قد تغضب الله عزوجل او تنحرف عن المسار الاسلامي كالإختراقات والإبتزازات والمعاكسات وغيرها.

- تعليمات بسيطة حول البوت:

- اولاً: البوت يقوم بشراء الأرقام تلقائياً من موردين بالجملة, ثم يقوم بتجزئتها وبيعها لعملائنا الأكارم, لذلك ياعزيزي نحن لا نستطيع فحص جميع الارقام في حالة كانت مستخدمة او جديدة, ببساطه, يمكنك إلغاء الارقام المستخدمة من قبل وشراء الارقام الجديده فقط.
https://t.me/fffff282- ثانياً: قد لاتصل الأكواد البعض الأرقام, لذلك ياعزيزي يمكنك دائماً إستخدام واتساب أعمال تم نشره في قناتنا على التيليجرام, [إضغط هنا](

- ثالثاً: يوجد نظام تصنيف في حالة كنت تبحث عن أرقام مميزة, تبحث عن رقم مختار, تلعب بالارقام (شراء,الغاء,شراء,إلغاء..الخ), سوف يتم خصم رصيد حسابك كاملاً تلقائياً.

- تعليمات بسيطة ومبدأيه:

- عند شراء رقم, قم بفحصه أولاً, ماإذا كان الرقم جديداً أو لا.
- لفحص الرقم, أضغط على زر (رؤية الرقم في واتساب) بعد شراء الرقم, سيقوم بتوجيهك الى الواتساب, في حالة قال لك ( الرقم ليس في واتساب ) هذا يعني ان الرقم جديد, ولم يستخدم في واتساب من قبل.
- اما في الحالات الأخرى فهذا يعني أن الرقم مستخدم في واتساب ولا نتحمل مسؤولية تفعيله في اي حال من الاحوال.
https://t.me/fffff282) أما بالنسبة لوصول الكود, بعض الارقام لايصل لها الكود احياناً, لذلك عليك اولاَ استخدام نسخه واتساب اعمال خاصه بطلب الأكواد ام نشرها بالفعل على قناتنا [إضغط هنا لتحميل 
- في حالة انه لم يصل الكود في هذه النسخه, قم بعمل ارسال رسالة مجدداً في الواتساب وانتظر نصف دقيقة واضغط تحديث, في حالة انه لم يصل بعد, قم بإلغائه وشرا رقم آخر.

- اللستفسار تواصل معنا: [@W_2_2w
" , [
           [
                ['text'=>"رجوع ⏪",'callback_data'=>"login_pannel"]
           ],
           [
                ['text'=>"❗️تواصل مع الإدارة 🎬",'callback_data'=>"help"]
            ]
      ]);
    exit;
       
elseif($data == "settings") :
edit("¦ - 🏆 الاعددادات الخاصه لبوت  𝙏𝘼𝙉𝙂𝙍𝙊
¦ - 🪗يرجئ التحكم في الازرار بالاسفل .
" , [
          [
                ['text'=>"¦ - تغيير كلمه السر ??.",'callback_data'=>"chang"]],
         [
                ['text'=>"¦ - معلومات حسابي 🗞.",'callback_data'=>"inf"]],
         [
                ['text'=>"¦ - مسح سجل الارقام 🗑." ,'callback_data'=>"del_num"]],
         [
                ['text'=>"¦ - حذف حسابي ❎.",'callback_data'=>"delete_account"]],
         [
                ['text'=>"¦ - سجل حسابك الشخصي♻️.",'callback_data'=>"my_chart"]], 
         [
                ['text'=>"¦ - تسجيل الخروج ❌.",'callback_data'=>"login_pannel"]],
         [
                ['text'=>"رجوع ⏪",'callback_data'=>"home"]]
         ]);
       exit;
elseif($data == "inf") :
 edit( "👨‍✈️ ⁞  اهلا بك:
 [$fname](tg://user?id=$chat_id)  🤍🌺

🧩 ⁞  ايدي حسابك: $id 🆔
🏛️ ⁞  رصيدك: ₽ " . $info["members"][$check[$chat_id]['mail']]["point"] . " 💰
☎️ ⁞ الإيميل : " .$check[$chat_id]['mail'] . "
🔑 ⁞ كلمة المرور : " . $check[$chat_id]['pass'] , $hom);
exit;

elseif($data == "chang"):
edit("ارسل كلمة المرور الجديدة 🗝",$hom);
$info[$chat_id]["mode"] = "chang";
save($info);

elseif(preg_match("/\d+/",$text) && $info[$chat_id]["mode"] == "chang") :
send("تم تغيير كلمة المرور بنجاح ✅",$backk);
$check[$chat_id]["pass"] = $text;
save($check,"check");
unset($info[$chat_id]["mode"]);
save($info);

elseif($data == "del_num"):
edit("هل أنت متأكد من أنك تريد الحذف سيتم حذف سجل كل الأرقام الذي قمت بشرائها 🙄" , [
    [
         ['text'=>"نعم 😎",'callback_data'=>"yesIneed"],
         ['text'=>"إلغاء ⛔",'callback_data'=>"settings"]],
    ]);
  exit;
  
  elseif($data == "yesInedd"):
  edit("تم حذف الحساب ✅",$backk);
  unset($get[$chat_id]["numbers"]);
  done($get);
  
  elseif($data == "delete_account"):
edit("سيتم حذف حسابك من البوت 🙄 هل تود المتابعة" , [
    [
         ['text'=>"نعم ??",'callback_data'=>"yes"],
         ['text'=>"إلغاء ⛔",'callback_data'=>"settings"]],
    ]);
  exit;
  
  elseif($data == "yes"):
  edit("تم حذف الحساب بنجاح ✔",$backk);
  unset($check[$chat_id]["mail"]);
  unset($check[$chat_id]["pass"]);
  save($check , "check");
  
  elseif($data == "my_chart") :
  edit("إليك سجل حسابك الشخصي 👇👇",$backk);
  bot('senddocument',[ 'chat_id'=>$chat_id,
      'document'=>new CURLFile("data/$chat_id.json")
     ]);
     
     elseif( $data == "collect") :      
        $link = "https://t.me/$bot?start=".jelloAppend(encrypt($check[$chat_id]['mail']),'en');
        edit("☑️ اهلا بك عزيزي 🖤☺️

📬 الميزة هذي تقدم لك كسب رصيد مجانا وذلك عبر رابط إحالتك الذي ستقوم بنشرة عند أصدقائك وعندما يقوم أحد أصدقائك ب التسجيل في البوت عبر رابط إحالتك سيكون من ضمن فريقك في البوت وستحصل على $setCoinURL روبل 💸

💠 رابط إحالتك: 
$link
🫂 عدد أعضاء فريقك: " . 
$refral[$check[$chat_id]["mail"]]["invit"] , 
            [                
                [["text"=>"▼ القائمة الرئيسيه 🏡 ▲","callback_data"=>"home"]
            ],
]);
exit;

elseif($tex[0] == "/start") : 
$link = decrypt(jelloAppend($tex[1],'de')); 
$art = $check[$link]["idd"];
send($check[$link]["idd"] . " elias"); 
if($refral[$chat_id]["ref"] == null && $link != $check[$check[$chat_id]["mail"]]["idd"]) {                
$refral[$link]["invit"]++;         
###$point["members"][$link]["point"] += $setCoinURL;
$point["refrals"][$chat_id] = $link;
 save($point , "point");
 /* 
 Use a handle / $point["refrals"][$chat_id] /
 when charging
examble :-
if(Charge){
	if($point["refrals"][$chat_id] != null){
		$linkID = $point["refrals"][$chat_id];
		$point["members"][$linkID]["point"] += $setCoinURL;
		save($point , "point");
	}
}
 */
 
#$refral[$chat_id]["ref"] = $link;         
save($refral , "refral"); 
sendd($link , "قام " . "[$chat_id](tg://user?id=$chat_id)  وحصلت على $setCoinURL روبل 🎉" . " بالدخول إلى فريقك عدد أعضاء فريقك الحالي " . $refral[$link]["invit"] ); send("شكرا لإنضمامك إلى البوت الخاص بنا يمكنك إنشاء حساب والتمتع بخدماتنا 
$link () $art" , [            
        [                 
              ["text"=>" 🔘 اضغط هنا للدخول للبوت🏅","callback_data"=>"login_pannel"]             
        ]     
   ]); 
}
exit;

elseif($data == "search") :
edit("☑️ للبحث ارسل نداء أو رمز الدوله التي تريد العثور عليها 😉

🔍 كمثال: نداء اليمن: 967 | نداء روسيا: 7 | نداء كازاخستان: +7 | نداء أمريكا: +1 | نداء كندا: 1000" , $home);
$info[$chat_id]["mode"] = "search";
save($info); exit;

elseif($tex[0] == "نداء" && $info[$chat_id]["mode"] == "search") :
if($numbers["num"][$tex[1]] != null):
              $name     = $numbers["num"][$tex[1]]["name"];
              $country  = $numbers["num"][$tex[1]]["site-name"];
              $web        = $numbers["num"][$tex[1]]["ser"];
              $json["inline_keyboard"][]  =   [["text"=>"الدولة 🌐","callback_data"=>"hello"],["text"=>"السيرفر 📟","callback_data"=>"hmm"],["text"=>"السعر 💰","callback_data"=>"Alwalidee"]];
if($web == "5sim"){ 
foreach($info["operator"] as  $pk => $hmm ):
               $opname = $info["operator"][$pk]["name"] ;
               $opvalue = $info["operator"][$pk]["val"] ; 
	           $pric = json_decode(file_get_contents("https://5sim.net/v1/guest/products/$country/$opvalue"))->whatsapp->Price ; 
	if($pric == null):
	          $json["inline_keyboard"][] = null;
	else: 
               $price = $info["nesbah"] / 100 * $pric +$pric;
               $json["inline_keyboard"][]  =   [["text"=>"$name","callback_data"=>"hello"],["text"=>"$opname","callback_data"=>"hmm"],["text"=>"$price ₽","callback_data"=>"B-N#$tex[1]#whatsapp#$web#$price#$opvalue"]];
    endif;
endforeach;
} else {
                $chart = json_decode(file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=getPrices&api_key=$ApiKeySmsMan&country=$country&service=wa"));
                $cost   =  $chart->$country->cost ;
                $price = $info["nesbah"] / 100 * $cost + $cost;
                $json["inline_keyboard"][]  =   [["text"=>"$name","callback_data"=>"hello"],["text"=>"سيرفر 2⃣","callback_data"=>"B-N#$tex[1]#wa#$web#$price"],["text"=>"$price ₽","callback_data"=>"B-N#$tex[1]#wa#$web#$price"]];
}
$json["inline_keyboard"][]  =   [["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]];
bot("sendmessage",[
            "chat_id"=>$chat_id,
            "text"=>"$country $opvalue $web $name",
            "message_id" => $message_id,
            "reply_markup" => json_encode($json)
        ]);
else :
send("لا يتوفر أرقام لهذه الدولة او أنه لم يتم إدراجها من قبل الأدمن 🤷‍♂️",$home);
unset($info[$chat_id]['mode']);
save($info);
endif;

elseif($data == "fav"):
$json["inline_keyboard"][]  =   [["text"=>"الدولة 🌐","callback_data"=>"hello"],["text"=>"السيرفر 📟","callback_data"=>"hmm"],["text"=>"السعر 💰","callback_data"=>"Alwalidee"]];
foreach($favourite["number"] as $k => $v):
if($k = "5sim"):
$key = $favourite["number"][$k]["key"];
$operator = $favourite["number"][$k]["ope"];
$app         = $favourite["number"][$k]["app"];
else :
$key = $favourite["number"][$k]["key"];
$operator = $favourite["number"][$k]["ope"];
$app         = $favourite["number"][$k]["app"];
endif;
$name      =  $numbers["num"][$key]["name"];
$country   =  $numbers["num"][$key]["site-name"];
$ser          =  $numbers["num"][$key]["ser"];
$key         =  $numbers["num"][$key]["con-key"];
if($ser == "5sim") {
	$price = json_decode(file_get_contents("https://5sim.net/v1/guest/products/$country/$operator"))->$app->Price ; 
    $json["inline_keyboard"][]  =   [["text"=>"$name","callback_data"=>"hello"],["text"=>"$operator" ,"callback_data"=>"hmm"],["text"=>"$price ₽","callback_data"=>"B-N#$key#$app#$price#$operator"]];
    
   } else {
            	$chart = json_decode(file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=getPrices&api_key=$ApiKeySmsMan&country=$country&service=$app"));
                $cost   =  $chart->$country->cost ;
                $price = $info["nesbah"] / 100 * $cost + $cost;
                $json["inline_keyboard"][]  =   [["text"=>"$name","callback_data"=>"hello"],["text"=>"سيرفر 2" ,"callback_data"=>"hmm"],["text"=>"$price ₽","callback_data"=>"B-N#$key#$app#$price"]];   
 }
endforeach;
$json["inline_keyboard"][]  =   [["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]];
 bot("editmessagetext",[
            "chat_id"=>$chat_id,
            "text"=>"😁🌸 ⌯ الدولة: $name
🤧♥️ ⌯ التطبيق : $ex[2]. ☑️

☑️ ⌯ إختر احد السيرفرات للشراء منه. ☺️🌸

🛍️ ⌯ كل سيرفر يقوم بتوفير عدد من الارقام وكل سيرفر له سعر خاص به. 😌🌼" ,
            "message_id" => $message_id,
            "reply_markup" => json_encode($json)
        ]);              
        
endif;      
$sharh="1- أهلا بك في شرح بوت $bot 

2- لإستخدام هذا البوت عليك أولاً شحن حسابك بإحدى طرق الدفع المقبولة بالبوت ✅

3- لشحن حسابك قم بالضغط على زر 💰شحن الرصيد ومن ثم عليك إختيار طريقة دفع متوفرة لديك ومقبولة بالبوت ✅

4- بعد شحن رصيدك قم بالضغط على زر ☎ شراء رقم من البوت ومن ثم قم بإختيار التطبيق المطلوب ومن ثم الدولة التي تريد رقم لها ✅

5- في حال عدم وصول الكود يمكنك 🚫 حظر الرقم، لا تقلق لن يتم خصم سعر الرقم من رصيدك إلا بعد وصول الكود ✅

6- لتحويل رصيد إلى مستخدم آخر قم بالضغط على زر 🔄 تحويل رصيد ثم أرسل أيدي الشخص الذي تريد تحويل الرصيد له ثم أرسل الكمية التي تريد تحويلها، بالتوفيق 🌸✅";//شرح البوت
#================#
$ApiKey5sim        = "";//5sim
$api_key_super        = "";//super
$ApiKeySmsMan = "";//sms
#==============#
if(isset($update)):
if(!in_array($chat_id,explode("\n",file_get_contents('mem/members.txt')))){
	file_put_contents('mem/members.txt',$chat_id."\n",FILE_APPEND);
}
if(in_array($chat_id,explode("\n",file_get_contents('ban.txt')))){
	send("تم تقييدك من استخدام البوت");
	exit;
}
if((isset($text) || isset($data)) and $stat == "تشغيل"){
	send("البوت تحت الصيانة حاليا , سوف يتم إشعاركم في قناة البوت عند الإكتمال , ونشكر انتظاركم 💙🙂",
[
            [
                ["text"=>"✥ قناة البوت📢","url"=>"t.me/SIM5SC"]
            ],
            ]);      
    exit;
	
}
if(($data == "home" || $text) && $info[$chat_id]["checker"] == "stop"){
	send("لا يمكنك استخدم البوت نظرا لانه لديك طلب معلق قم بحظر الرقم الذي طلبته او حظره لتتمكن من استخدام البوت");
    exit;
    }
    @$home=[[["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]]]; //home
#==============#
if( $point["members"][$check[$chat_id]['mail']]['point'] == null ):
            $point["members"][$check[$chat_id]['mail']]["point"] = 0;//نقاط العضو
            save($point,"opint");
endif;
#==============#

#===CHECK_MAIL======#
if($data=="home" && $check[$chat_id]["mail"] == null):
answer("لا يمكنك استخدام البوت قم بإنشاء حساب أولا 🛑");
exit; endif;
#===CHECK_MAIL======#

if( $text == "/start" ):    
    
        $info["members"][$chat_id]["mode"] =   null;
        save($info);
        send("
🙋‍♂️ • أهلاً بكم في بوت تانجرو الاول والأقوائ علئ التليجرام. 

https://t.me/fffff282🤚 • اضغط هنا للإنضمام الئ  [قناة البوت](

🙅🏼 اداره لبوت] محمد] @W_2_2w

☑️  •  اضغط على زر لبدء الإستخدام. ⏬
",
[
            [
                ["text"=>"☑️ • بدء الإستخدام .","callback_data"=>"login_pannel"]
            ],
            [
                ["text"=>"↗️ • قناة البوت الرسمية .","url"=>"t.me/SIM5SC"]
            ]
            ]);      
         exit; 
#==============#     
elseif ( $data == "home"):
              $info["members"][$chat_id]["mode"] =   null;
              $info[$chat_id]['mode'] =null;
              save($info);
              edit( "👨‍✈️ ⁞  اهلا بك:[$fname](tg://user?id=$chat_id)  🤍🌺
👨🏻‍✈️ ⌯ إليك تفاصيل حسابك 📋👇
🏦 ⌯ حسابك: " .$check[$chat_id][ mail ] . "
🗃 ⌯ ايدي حسابك: $id 🆔
💸 ⌯ رصيدك: ₽ " . $point["members"][$check[$chat_id][ mail ]]["point"] . " 💰
☑ ⌯  قناة البوت : @ffff282

♻️ ⌯  تحكم الان عبر الأزرار بالأسفل. 🤗🌸" ,
 [
            [
                ["text"=>'⌯  شراء أرقام ☎️.',"callback_data"=>"numbers"]
            ],
            [
                
                ["text"=>"⌯ الأرقام الجاهزة🎗.","callback_data"=>"readynumbers"],
                ["text"=>"⌯ شحن رصيدك 💰.","callback_data"=>"shahn"]
            ],
            [
                ["text"=>'🎉 دعوة الأصدقاء',"callback_data"=>"collect"]
            ],
            [
                ["text"=>"⌯ عروض البوت 💫.","callback_data"=>"offers"],
                ["text"=>"⌯ البحث السريع🔍.","callback_data"=>"search"],
                
            ],       
            [
                ['text'=>"⌯ قسم الـرشـق 👤.",'callback_data'=>"rash"]
            ],
            
            [
                ["text"=>"⌯ سجل حسابك 🗄.","callback_data"=>"info"],
                ["text"=>"⌯ تحويل روبل 🔄.","callback_data"=>"transfer"],
            ],
                [["text"=>"⁞ المفضلة 🌟","callback_data"=>"fav"]],
            [
                ["text"=>"⌯ قسم الإعدادات ⚙.","callback_data"=>"settings"],
                ["text"=>"⌯ قسم الوكلاء 🧑🏼‍💻.","callback_data"=>"wak"],
            ],       
            [
                ['text'=>"⌯ تواصل مع الادارة 📮.",'callback_data'=>"help"]
            ]
            ]);      
        exit;
#==============#        
elseif($el[0] == "/start" && !preg_match("/\d+/",$el[1])) :
$link = base64_decode($el[1]);
$idd =  $check[$link]["idd"];
if($refral[$chat_id]["ref"] == null && $idd != $chat_id) {       
        $refral[$idd]["invit"]++;
        $refral[$chat_id]["ref"] = $link;
        save($refral , "refral");
sendd($idd , "قام " . "[$chat_id](tg://user?id=$chat_id) " . " بالدخول إلى فريقك عدد أعضاء فريقك الحالي " . $refral[$idd]["invit"] );
send("شكرا لإنضمامك إلى البوت الخاص بنا يمكنك إنشاء حساب والتمتع بخدماتنا " , [
            [
                ["text"=>" 🔘 اضغط هنا للدخول للبوت🏅","callback_data"=>"login_pannel"]
            ]
    ]);
  }
exit;
elseif ($ex[0] =="numbers" ):
edit("
✅ - يرجى إختيار البرنامج الذي تريد تفعيله. ⏬

☑️ - جميع البرامج تستقبل كود لمرة واحدة فقط.
",[           
                [                
                    ["text"=>"-  واتساب . 🌧", "callback_data"=>"con#wa#whatsapp"]
                ],
                [
                    ["text"=>"-  تيليجرام . ☂", "callback_data"=>"con#tg#telegram"],
                    ["text"=>"-  فيسبوك . 🚀", "callback_data"=>"con#fb#facebook"]
                ],
                [
                    ["text"=>"- إيمو . 💥", "callback_data"=>"con#im#imo"],
                    ["text"=>"- جوجل .  💫", "callback_data"=>"con#go#google"]
                ],
                [
                    ["text"=>"-  انستقرام . ⛱", "callback_data"=>"con#ig#instagram"],
                    ["text"=>"-  تويتر . 🧳", "callback_data"=>"con#tw#twitter"]
                ],
                [
                    ["text"=>"-  يلاشات . ☄", "callback_data"=>"con#yl#yalla"],
                    ["text"=>"-  فايبر . 💫", "callback_data"=>"con#fa#viber"]
                ],
                [                
                    ["text"=>"القائمة الرئيسية 🏡", "callback_data"=>"home"]
                ]
                ]);
#==============#               
elseif( $ex[0]  == "rash") :
        answer ("- قسم الرشق مغلق من الادارة موقتاً . 🚫");
       exit;
        elseif( $ex[0]  == "con") :
        edit(" •  يرجى اختيار أحد السيرفرات التالية اولاَ⬇️.
 • يوجد اكتر من 180 دولة متوفرة ☑️." , [
        
              [['text'=>' ⁞ خدمة البحث السريع 🔎','callback_data'=>"searching"]],
              [['text'=>'- سيرفر آسيا. ','callback_data'=>"server#Asia#$ex[1]#$ex[2]"],
              ['text'=>'- سيرفر أفريقيا.','callback_data'=>"server#Africa#$ex[1]#$ex[2]"]],                
              [['text'=>'- سيرفر إمركيا. ','callback_data'=>"server#Amrica#$ex[1]#$ex[2]" ],
              ['text'=>'- سيرفر أوروبا.','callback_data'=>"server#Erub#$ex[1]#$ex[2]" ]],
              [['text'=>'رجوع للخلف 🔙','callback_data'=>"numbers" ],
              ['text'=>'القائمة الرئيسية 🏡',"callback_data"=>"home"]
          ]
          ]);
       exit;
#==============#
#==============#
elseif($data == "searching"):
	send("ارسل النداء");
	$info[$chat_id]["mode"]  =   "search";
     save($info);
exit;
elseif(preg_match("/[0-9]+/",$text) && $info[$chat_id]["mode"] == "search"):
if(isset($numbers["num"][$text])){
	$ser  = $numbers["num"][$text]["ser"]; 
	$cont = $numbers["num"][$text]["name"];
	$list = "";
                      foreach($ser as $k) :    
                      	$list .= $k."-";
                      endforeach;
	send("
¦ يرجئ اختيار التطبيق التي تريد تفعيل الرقم عليه لدولة ".$cont."✅
¦ يوجد تطبيقات متنوعه للتفعيل ♻️☺️🍁
",[           
                [                
                    ["text"=>"¦ واتساب 🪗", "callback_data"=>"Buy#$text#$list#wa#whatsapp"]
                ],
                [
                    ["text"=>"¦ تليجرام  🎬", "callback_data"=>"Buy#$text#$list#tg#telegram"],
                    ["text"=>"¦ فيس بوك  🎲", "callback_data"=>"Buy#$text#$list#fb#facebook"]
                ],
                [
                    ["text"=>"¦ ايمو  🎼", "callback_data"=>"Buy#$text#$list#im#imo"],
                    ["text"=>"¦ جوجل 🎯", "callback_data"=>"con2#$text#go#google"]
                ],
                [
                    ["text"=>"¦ انستجرام ⛱", "callback_data"=>"Buy#$text#$list#ig#instagram"],
                    ["text"=>"¦ تويتر 📲", "callback_data"=>"Buy#$text#$list#tw#twitter"]
                ],
                [
                    ["text"=>"¦ يلا شات 🔋", "callback_data"=>"Buy#$text#$list#yl#yalla"],
                    ["text"=>"¦ فايبر 💡", "callback_data"=>"Buy#$text#$list#fa#viber"]
                ],
                [                
                    ["text"=>"القائمة الرئيسية 🏡", "callback_data"=>"home"]
                ]
                ]);
}else{
	send("لم يتم اضافه");
}
exit;
#==============#
elseif($data == "wak") :
$json["inline_keyboard"][]  =   [["text"=>"👨‍✈️ الوكيل.","callback_data"=>"."],["text"=>"🛒 الرابط. ","callback_data"=>"."]] ;
$e = 1;
foreach($numbers["wak"] as $key => $val) :    
                       
                       $name  = $numbers["wak"][$key]["name"];   
                       $user = $numbers["wak"][$key]["user"];    
                      
        if(isset($name) ) :
        
                      $json["inline_keyboard"][$e][]  =   ["text"=>"$name" ,"callback_data"=>"wakel#$key"];
                      $json["inline_keyboard"][$e][]  =   ["text"=>"اضغط" ,"url"=>"t.me/$user"];

                      
                      $e++;
                      else : $name = null;
         endif;                     
endforeach;
                $json["inline_keyboard"][]  =   [["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]] ;
                 bot("editmessagetext",[
                "chat_id"=>$chat_id,
                "text"=>"🔰 - مرحباً بك عزيزي العميل في قسم وكلاء البوت الرسميين لـ بوت ⌯ تانجرو ✅.",
                "message_id" => $message_id,
                "reply_markup" => json_encode($json)
        ]);
        
     exit;
     elseif($ex[0] == "wakel") :
     $nam  = $numbers["wak"][$ex[1]]["name"];   
                       $usr = $numbers["wak"][$ex[1]]["user"];    
     $json["inline_keyboard"][]  =   [["text"=>"🛑 -  الابلاغ !","url"=>"t.me/EFZFF"]] ;
     $json["inline_keyboard"][]  =   [["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]] ;
     bot("editmessagetext",[
                "chat_id"=>$chat_id,
                "text"=>"
🧑‍✈️ - الوكيل:- $nam
🛒 - يوزر الوكيل:- @$usr

🎁 - وكيل معتمد من إدارة البوت✅.

",
                "message_id" => $message_id,
                "reply_markup" => json_encode($json)
        ]);
    
       exit;
#==============#
elseif($ex[0] == "server") :
$e = 0;
foreach($numbers["num"] as $key => $val) :    
                       
                       $ser  = $numbers["num"][$key]["ser"];   
                       $con = $numbers["num"][$key]["con"];    
                      $list = "";
                      foreach($ser as $k) :    
                      	$list .= $k."-";
                      endforeach;
        if($numbers["num"][$key]["con"] == $ex[1] ) :
        			$i++;
                      if($i % 3 == 0) $e++;
                  	$name      = $numbers["num"][$key]["name"];
                      $json["inline_keyboard"][$e][]  =   ["text"=>$name ,"callback_data"=>"Buy#$key#$list#$ex[2]#$ex[3]"];
                      else : $name = null;
         endif;                     
endforeach;
                $json["inline_keyboard"][]  =   [["text"=>"للخلف ⏯","callback_data"=>"con#$ex[2]#$ex[3]"],["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]] ;
                 bot("editmessagetext",[
                "chat_id"=>$chat_id,
                "text"=>"أختر الدولة الذي تريد شراء رقم لها يوجد أكثر من 100 دولة وبسيرفرات مختلفة اختر ما يناسبك",
                "message_id" => $message_id,
                "reply_markup" => json_encode($json)
        ]);
        
     exit;
     #==============#
elseif($data == "offers") :
$e = 0;
$json = [];
                $json["inline_keyboard"][$e]  =   [["text"=>"🌎 ⌯ الدولة.","callback_data"=>"hello"],["text"=>"⏬ ⌯ البرنامج.","callback_data"=>"hmm"],["text"=>"💰⌯ السعر.","callback_data"=>"Alwalidee"]];
                $e++;
foreach($numbers["offers"] as $key => $val) :    
                       
                       $ser  = $numbers["offers"][$key]["ser"];   
                       $con = $numbers["offers"][$key]["con"];   
                      
                       
					  $list = "";
                      foreach($ser as $k) :    
                      	$list .= $k."-";
                      endforeach;
                  	$name      = $numbers["offers"][$key]["name"];
                  	$price      = $numbers["offers"][$key]["price"];
                      $json["inline_keyboard"][$e][]  =   ["text"=>$name ,"callback_data"=>"B-N#$key#$list#$price"];
                      $json["inline_keyboard"][$e][]  =   ["text"=>explode("#",$con)[1] ,"callback_data"=>"Buy2#$key#$list#$con"];
                      $json["inline_keyboard"][$e][]  =   ["text"=>$price ,"callback_data"=>"Buy2#$key#$list#$con"];
                      $e++;
endforeach;
                $json["inline_keyboard"][]  =   [["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]] ;
                 bot("editmessagetext",[
                "chat_id"=>$chat_id,
                "text"=>"⏬ - قائمة العروض المتوفرة بالبوت. ☑️",
                "message_id" => $message_id,
                "reply_markup" => json_encode($json)
        ]);
        
     exit;
#==============#
elseif($ex[0] == "Buy") :
$ser  = $numbers["num"][$ex[1]]["ser"];
$con = $numbers["num"][$ex[1]]["con"];
$app1 = $ex[3];
$app2 = $ex[4];
                $json = [];
                $json["inline_keyboard"][]  =   [["text"=>"السيرفر⏬","callback_data"=>"hello"],["text"=>"الكمية🔺.","callback_data"=>"hmm"],["text"=>"السعر 💰","callback_data"=>"Alwalidee"]];
if(in_array("5sim",$ser)) {                     
                $ok = $favourite["number"][$ser]["ok"];
                $country    = $numbers["num"][$ex[1]]["site-name"];
                $name       = $numbers["num"][$ex[1]]["name"];                    
               $price       = $numbers["num"][$ex[1]]["price"];       
               if($price != null)
               $json["inline_keyboard"][]  =   [["text"=>" سيرفر1⚡️." , "callback_data"=>"nothings"],["text" => "$count" ,"callback_data"=>"add#$ex[1]#$ex[2]#$opvalue"],["text"=>$price ." ₽"  ,"callback_data"=>"B-N#$ex[1]#5sim#$price#$app2"]]; 

 }  if(in_array("man",$ser)) {      
            	$ok = $favourite["number"][$ser]["ok"];
                $country    = $numbers["num"][$ex[1]]["site-name"];
                $price       = $numbers["num"][$ex[1]]["price"];       
                $json["inline_keyboard"][]  =   [["text" => "سيرفر2⚡️." ,"callback_data"=>"nothings"],["text"=>"$count" ,"callback_data"=>"add#$ex[1]#$ex[2]"],["text"=>"$price ₽","callback_data"=>"B-N#$ex[1]#man#$price#$app1"]]; 
  }
  if(in_array("super",$ser) and ($app2 == "whatsapp" or $app2 == "telegram")) {
  	if($app2 == "whatsapp"){
  		$ap = 2;
  		$cost = 16;
  	}
  	elseif($app2 == "telegram"){
  		$ap = 5;
  		$cost = 14;
  	}
            	$ok = $favourite["number"][$ser]["ok"];
                $country    = $numbers["num"][$ex[1]]["site-name"];
                $name       = $numbers["num"][$ex[1]]["name"];                
                $price        = $info["nesbah"] + $cost;
                $json["inline_keyboard"][]  =   [["text" => "سيرفر3⚡️." ,"callback_data"=>"nothings"],["text"=>"$price ₽","callback_data"=>"B-N#$ex[1]#super#$price#$ap"]]; 
  }
                $json["inline_keyboard"][]  =   [["text" => "تحديث الصفحة 🔁","callback_data"=>"Buy#$ex[1]#$ex[2]#$ex[3]#$ex[4]"]];
                $json["inline_keyboard"][]  =   [["text" => "للخلف ⏯","callback_data"=>"server#$con#$ex[3]#$ex[4]"],["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]];
bot("editmessagetext",[
            "chat_id"=>$chat_id,
            "text"=>"😁🌸 ⌯ الدولة: $name
🤧♥️ ⌯ التطبيق : $app2. ☑️
☑️ ⌯ إختر احد السيرفرات للشراء منه. ☺️🌸

🛍️ ⌯ كل سيرفر يقوم بتوفير عدد من الارقام وكل سيرفر له سعر خاص به. 😌🌼" ,
            "message_id" => $message_id,
            "reply_markup" => json_encode($json)
        ]);
exit;
#==============#
elseif($ex[0] == "add"):
$web = $numbers["num"][$ex[1]]["ser"];
if($web == "5sim") { $elias = $favourite["number"][$web]["key"];
} else { $elias = $favourite["number"][$web]["key"]; }
if($elias == null) :
if($web == "5sim"):
$favourite["number"][$web]["app"] = $ex[2];
$favourite["number"][$web]["ok"] = "🌟";
$favourite["number"][$web]["ope"] = $ex[3];
$favourite["number"][$web]["key"] = $ex[1];
save($favourite , "favourite");

else:
$favourite["number"][$web]["key"] = $ex[2];
$favourite["number"][$web]["ok"] = "🌟";
$favourite["number"][$web]["key"] = $ex[1];
save($favourite , "favourite");
endif;
answer("تم إضافة الرقم الى قسم الأرقام المفضلة 🌟 \n اعمل تحديث للصفحة 🔃");

else : 
answer("تم حذف الرقم من الأرقام المفضلة 🗑");
if($web == "5sim") :
unset($favourite["number"][$web]);
save($favourite , "favourite");
else :
unset($favourite["number"][$web]);
save($favourite , "favourite");
endif;
endif;
#==============#
        elseif ( $data == "shahn" ) :
        edit("
☑️  • قسم شحن رصيد الروبل الخاص بك:

🌀 • يمكنك شحن رصيدك من الإدارة مباشرة او عبر التواصل مع الوكلاء.
🪗 • نقبل جميع طرق الدفع المذكورة بالأسفل: ⬇️

@W_2_2w • إذا كنت لا تملك طريقة دفع من الأسفل، تواصل مع الإدارة الخاصة بالبوت: 
" ,[
           [
                 
                 ['text'=>'💲 • إيداع كريمي {شمال - جنوب}.', "url"=>"https://t.me/W_2_2w"]
           ],
          [
                ['text'=>'💲 • تحويل صرافات { شمال - جنوب}. ','url'=>"https://t.me/W_2_2w"]
          ],
          [
                ['text'=>'💲 • كروت شحن { سوا - مبايلي }.', "url"=>"https://t.me/W_2_2w"],
           ],
           [
                ['text'=>'💲 • العملات رقمية {جميعها مقبولة}.', "url"=>"https://t.me/W_2_2w" ]
          ],
          [
                ['text'=>'💲 • البنوك الإكترونية {بايير - بايبال}.','url'=>"https://t.me/W_2_2w"]
          ],
          [
                ['text'=>'👨🏻‍💻 • ادارة البوت{ لشحن حسابك}.', "url"=>"https://t.me/W_2_2w"]
          ],
          [
                ['text'=>'🔙 الرجوع إلى الصفحة الرئيسية','callback_data'=>'home']
         ]
         
    ]);                  
 exit;
 #==============#
elseif (preg_match("/buycard#([0-9]+)#([0-9]+)#([A-z0-9]+)/",$data,$res)) :
          edit("⛔️ سيتم خصم ₽ $ex[1] من رصيد حسابك ✅🔄 مقابل شراء كرت شحن ₽ $ex[1] روبل ♈️
💳 رصيدك الان هو:"  . $point["members"][$check[$chat_id]['mail']]["point"]
. "💰\n

☑️ هل أنت موافق على ذالك أم لا!! ⬇️
" , [
           [
                ["text"=>"موافق | ✅","callback_data"=>"okk#$res[1]#$res[2]#$res[3]"],
                ["text"=>"الإلغاء والرجوع | ⛔","callback_data"=>"home"]
            ]
]);                         
exit;
#==============#
       elseif ( preg_match("/okk#([0-9]+)#([0-9]+)#([A-z0-9]+)/",$data,$res)) :
        if($res[2] > 0) {
        if($res[1] <=  $point["members"][$check[$chat_id]['mail']]["point"] ) :
        $numbers['baageel'] += 1;
        save($numbers,'numbers');
        $acode  =   substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOBQRSTUVWXYZ"), 1, 10);
        $code   =   $numbers['baageel'].$acode;
        $balance = $point['members'][$check[$chat_id]['mail']]['point'] - $res[1];
        edit("✳️ ⁞ تم شراء الكرت بنجاح!

☎️ ⁞ الكود: $code
💬 ⁞ السعر: $res[1]
🌀 ⁞ رصيدك الحالي:  " . $members['members'][$check[$chat_id]['mail']]['point'] . "\n
💰 ⁞ رصيدك السابق: ₽ $balance

✅ تمت العملية  بنجاح. 😉♥️",
$home);
       $point["members"][$check[$chat_id]['mail']]["point"] -= $res[1];
        save($point , "point");
        $numbers[$code]['price'] = $res[1];
        save($numbers,"numbers");
        $static['cards']++;
        $static[$chat_id]['cards']++;
        save($static,"static");
        $chart[$chat_id]["buycards"][] = $code;
          done($chart);
        else : 
       answer("رصيدك غير كافي لإتمام العملية");
                  endif;
                }  else {
                  answer("لقد انتهت الكروت لهذه الفئه انتظر حتى يتم توفيرها");         
                }
        
       elseif($data == "help"):
       edit("👨‍✈|أهلاً صديقي.

📍|أنت الأن في التواصل مع الدعم، أي رسالة ارسلها سيتم إيصالها الئ الأدارة فوراً.
📊|أي مشكلة واجهتك في البوت فقط قم بإرسالها هنا الان،ولااتنسئ إرفاقها مع الأيدي الخاص بك بالبوت.
🕐|متواجدون علئ مدار الساعة.

❎|تجنب إرسال الاساءات إن أمكن.", [
            [               
                ["text"=>"الغاء التواصل ⛔","callback_data"=>"login_pannel"]
            ],
            ]);
            $info[$chat_id]['mode'] = "help";
            save($info);           
exit;
elseif(preg_match("/send#([0-9])+#([0-9])+/",$data , $s)) :
send("ارسل رسالتك الآن");
$info[$chat_id]["mode"]  =   "id";
$info[$chat_id]['mid']  = $s[2];
$info[$chat_id]['idmem'] = $s[1];
save($info);
exit;
elseif($message && $chat_id == $admin && $info[$chat_id]["mode"]  == "id") :
       bot('sendmessage',[
       'chat_id' => $info[$chat_id]['idmem'],
       'text' => "تم الرد على رسالتك الرد 👇👇",
       'reply_to_message_id'=> $info[$chat_id]['mid']
       ]);
       bot(copymessage,[
            chat_id=>$info[$chat_id]['idmem'],
            message_id=>$message_id,
           from_chat_id=>$admin,
       ]);
     exit;
            elseif ($message && $info[$chat_id]['mode'] =="help") : 
            if(isset($text)) : $type = "نص"; else : $type ="ميديا"; endif;          
            bot(copymessage,[
            chat_id=>$admin,
            message_id=>$message_id,
           from_chat_id=>$chat_id,
       ]);
sendd($admin, "📨 | رسالة جديدة 
-----------------------------
🧑‍✈️ | المرسل :- $fname
🆔 | ايدي المرسل :- $chat_id
🗒 | نوع الرسالة :- $type
-----------------------------
هل تريد الرد على الرسالة 🙄🙄" , 
          [
            [
                ["text"=>"الرد على الرسالة ✅","callback_data"=>"send#$chat_id#$mid"],                
            ],
            ]);
            unset($info[$chat_id]["idmem"]);
            unset($info[$chat_id]["mid"]);
            save($info);
            send("تم وصول رسالتك الى الإدارة انتظر حتى يتم الرد عليك");

#==============#
    elseif ( $data == "card" ):
               edit("قم باسال الكرت",$home);
               $info[$chat_id]["mode"]  =   "card";
               save($info);
     exit;
#==============#     
    elseif ( preg_match("/([A-z0-9])+/",$text) && $info[$chat_id]["mode"] == "card" ):
               $price = $numbers[$text]['price'];
               $last = $point["members"][$check[$chat_id]['mail']]["point"] - $price;
    if ( $numbers[$text]['price'] == null ):
               send("الكرت هذا غير موجود أو تم استخدامه",$home);
   else :
              $point["members"][$check[$chat_id]['mail']]["point"] += $price;
               save($point , "point");
              send("تم شحن حسابك ب $price
--------------------------
💰 ⁞ رصيدك السابق :-  $last
💵 ⁞ رصيدك الحالي :- " . $point["members"][$check[$chat_id]['mail']]["point"] . "
-------------------------
شكرا لاستخدامك البوت🌟"
, $home);
            $info[$chat_id]["mode"]   =   null;
            save($info);
            sendd($admin,"⚜ New Card has discharge  :\n\n📝 Code: $text\n🧭 ID: $chat_id
🎫 Name:\n[$fname](tg://user?id=$chat_id)\n💰 Price: ₽ 5");
            $static[$chat_id]['cards']++;
            $static[$chat_id]['cardcount']++;
            $static[$chat_id]['shahn']++;
            save($static,"static");
            unset($numbers[$text]['price']);
            $numbers['cards'][$code]['amount']--;
            save($numbers,"numbers");
            $chart[$chat_id]["cards"][] = $text;
            done($chart);
        endif;
        exit;
#==============#     
elseif ( $data == "How" ):
                  edit($sharh,$home);
#==============#
        elseif($data == "transfer") :
        edit("
✅ | يمكنك الأن شحن حسابك العميل خصمها من حسابك!. 
⚠️ | أقل مبلغ للشحن:  20.00روبل✅.

✳️ | هل تريد شحن رصيد الئ حساب أخر؟.
",  [
           [
                ["text"=>"تأكيد ✅","callback_data"=>"continue"],
                ["text"=>"الإلغاء والرجوع ⛔","callback_data"=>"home"]
            ],
            ]);
#==============#         
elseif ($data == "info") :
if($static['conum']==null) { $static['conum']=0; }  if($static['bot']['balance']) $static['bot']['balance'] =0;
if($static['cards']==null) { $static['cards']=0; } if($static[$chat_id]['unconum']==null) { $static[$chat_id]['unconum'] =0; } 
        $mem = count($members);
        $complete = $static['conum'];
        $incomplete = $static['unconum'];
        $cardnum = $static['cards'];
        $botba = $static['bot']['balance'];
        $ready = $static['ready'];
        //user static //
if($static[$chat_id]['conum']==null) { $static[$chat_id]['conum']=0; } if($static[$chat_id]['ready']==null) { $static[$chat_id]['ready']=0; }
if($static[$chat_id]['cards']==null) { $static[$chat_id]['cards']=0; } if($static['unconum']==null) { $static['unconum'] =0; }
        $usco = $static[$chat_id]['conum'];
        $usready = $static[$chat_id]['ready'];
        $uscards = $static[$chat_id]['cards'];
        $minus    = $static[$chat_id]["minus"] ;
        $usrobel = $point["members"][$check[$chat_id]['mail']]['point'];
        $member =  count($members);
        edit("☑️ ⁞ إحصائيات استخدام بوت : 🌻🌞

👬 ⁞ عدد المستخدمين النشطين: { $member } 
✅ ⁞ عدد الأرقام المكتملة: { $complete } 
🏷 ⁞ عدد الكروت التي تم شراوها: { $cardnum } 

🌞 ⁞ عدد الأرقام الجاهزة المشتراة:  $ready  ☑️

☑️ ⁞ سجل حسابك الشخصي:
❇️ ⁞ عدد الأرقام الجاهزة التي تم شراؤها: { $usready } 
✅ ⁞ إحصائيات أرقامك المكتملة: { $usco } 
🏦 ⁞ إحصائيات كروتك المشترى: { $uscards } 
💰 ⁞ إحصائيات الروبل المتبقي: { $usrobel ₽ } 

💹 ⁞ تم بدء نظام الحوسبة 2022/9/23م "
, [
[
                ['text'=>"✥ - معلومات حسابي 🗞.",'callback_data'=>"inf"]],
                            [
                            ['text'=>"✥ - تغيير كلمه السر 🔐.",'callback_data'=>"chang"]
                            ],
                   
                   [
                            ['text'=>'✥القائمه الرئيسية🔷',"callback_data"=>"home"]
            ]
 ]);
exit;
#==============#
            elseif($data == "continue") :
           if($point["members"][$check[$chat_id]['mail']]["point"] >20){        
            edit("حسنا قم بإرسال ايدي الشخص",$home);
            $info[$chat_id]['mode'] = "send";
            save($info);
                  } else {
        	bot("answercallbackquery",[
                "callback_query_id"=>$update->callback_query->id,
                "text"=>"رصيدك لا يكفي لهذه العملية",
                "show_alert"=>true
            ]);
                  }
            elseif( is_numeric($text) && $info[$chat_id]['mode'] == "send") :
                        $chartchat = bot('getchat',['chat_id'=>$text ])->ok;
            if($chartchat == "true") {
                        send("حسنا قم بإرسال النقاط الآن");
                        $info[$chat_id]['mode'] = "point";
                        $info[$chat_id]['idm'] = $text;
                        save($info);
        } else {
           send("هذا المستخدم غير موجود في البوت أو أنه قام بحظره"); 
           }
                 
        elseif( is_numeric($text) && $info[$chat_id]['mode'] == "point") :
        if($text >20){ 
                if($text > $point['members'][$check[$chat_id]['mail']]['point'])exit;  
                $point['members'][$check[$chat_id]['mail']]['point'] -= $text;
                //$point['members'][$info[$check[$chat_id]['mail']]['idm']]['point'] += $text;
                $point["members"][$check[$info[$chat_id]['idm']][ mail ]]["point"] += $text;
        save($point , "point");
        $last = $point['members'][$check[$chat_id]['mail']]['point'];
        $idm =$info[$chat_id]['idm'];
        send("تم شحن حساب العميل بنجاح ✅.
📟 المرسل : $fname
🧭 المستلم : [$idm](tg://user?id=$idm)
💵 المبلغ المحول : $text
💰 الرصيد المتبقي : $last
===================");
                sendd($info[$chat_id]['idm'] , "💰 ⁞ تم تحويل ₽ $text إليك!✅ ⁞ من  $fname ");
                $info[$chat_id]['idm'] =null;
                $info[$chat_id]['mode'] =null;
                save($info);
        } else {
        	send("عذرا لا يمكنك التحويل برصيد اقل من المسموح به");
        }
        
#====BUY_NUMBER====#

elseif($el[0] == "/start") :
$code = explode("#"  , $el[1]);
if($code[0] == "buy") {
$number           = $readynumber['ready'][$code[1]]['number'];
$price                = $readynumber['ready'][$code[1]]['price'];
$now                = $readynumber['ready'][$code[1]]['now'];
$country          = $readynumber['ready'][$code[1]]['country'];
$what               = $readynumber['ready'][$code[1]]['what'];
$numbery = substr($number, 0,-6)."••••";
 if($number != null ){
 	      $keyboad['inline_keyboard'][] = [['text'=>'االحالة ⁉️','callback_data'=>'no'],['text'=>'السعـــر💲','callback_data'=>'no'],['text'=>'الدولة 🏴','callback_data'=>'no']];
           $keyboad['inline_keyboard'][] = [['text'=>"$now",'callback_data'=>"Noyesnum#$code[1]"],['text'=>$price . ".00₽",'callback_data'=>"Noyesnum#$code[1]"],['text'=>"$country",'callback_data'=>"Noyesnum#$code[1]"]];
           $keyboad['inline_keyboard'][] = [['text'=>'القائمة الرئيسية 🏡',"callback_data"=>"home"]];
           bot('sendmessage', [
           'chat_id' => $chat_id,
           'text' => "💯 إليك قائمة الأرقام الجاهزة للواتس اب\n👇 اضغط على احدها للشراء",
           'reply_markup'=>json_encode($keyboad)
     ]);
} else {
	send("الرقم غير موجود او قد تم شراءه");
	}}
exit;
    
elseif($data == 'readynumbers') :
if($readynumber['ready'] != null ){
               $keyboard = [];
               $keyboad['inline_keyboard'][] = [['text'=>'االحالة ⁉️','callback_data'=>'no'],['text'=>'السعـــر💲','callback_data'=>'no'],['text'=>'الدولة 🏴','callback_data'=>'no']];
foreach($readynumber['ready'] as $zero=>$val) :
               $now = $val['now'];
               $country = $val['country'];
               $price = $val['price'];
               $keyboad['inline_keyboard'][] = [['text'=>"$now",'callback_data'=>"Noyesnum#$zero"],['text'=>$price . ".00₽",'callback_data'=>"Noyesnum#$zero"],['text'=>"$country",'callback_data'=>"Noyesnum#$zero"]];
endforeach;
               $keyboad['inline_keyboard'][] = [['text'=>'تحديث الصفحة 🔂',"callback_data"=>"readynumbers"],['text'=>'القائمة الرئيسية 🏡',"callback_data"=>"home"]];
               bot('EditMessageText',[
               'chat_id'=>$chat_id,
               'message_id'=>$message_id,
               'text' => "💯 إليك قائمة الأرقام الجاهزة للواتس اب \n 👇 اضغط على احدها للشراء",
               'reply_markup'=>json_encode($keyboad)
            ]);
       } else {
              answer("❌ لا يتوفر أرقام جاهزة حاليا ");
  }
exit;

//قبول ورفض شراء الأرقام الجاهزة
elseif(preg_match('/(Noyesnum)/',$data)) :
$zero              = $ex[1];
$num              = $readynumber['ready'][$zero]['number'];
$price             = $readynumber['ready'][$zero]['price'];
$now              = $readynumber['ready'][$zero]['now'];
$country        = $readynumber['ready'][$zero]['country'];
$what             = $readynumber['ready'][$zero]['what'];
$number        = substr($num, 0,-6) . "••••";
$Balancee     = $point["members"][$check[$chat_id]['mail']]['point'];
$Balance       = $Balancee - $price;

if($readynumber[$chat_id]["buy"] == "stop") {
answer(" لا يمكنك شراء الرقم الجاهز في نفس وقت شراء رقم آخر قم بإلغاء الرقم السابق ثم حاول مجدداً 🌚" );

} elseif($price > $point["members"][$check[$chat_id]['mail']]['point']) {
send("⚠️ ⌯ لايوجد لديك رصيد كافي لشراء هذا الرقم!
💰 ⌯ رصيدك المتوفر ⪼ ₽". $point["members"][$check[$chat_id][ mail ]]["point"]
);
} elseif($zero == null) {
send("
❌ هذا الرقم لم يعد متاحا
♻ اضغط تحديث الصفحة
");
} else {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*☑️ أنت الان تقوم بشراء رقم جاهز من البوت 🌚
⚠️ معلومات عن الرقم الذي تريد شرائه:
🏴 الدولة: $country
📞 الرقم: $number
📲 التطبيق: واتساب - (Whatsapp)
💰 السعر: $price ₽
✨ الحالة: $now ✅
⁉️ ملاحظة: $what

🛃 رصيدك الان هو: ₽ $Balancee 💰
🔄 سيكون رصيدك بعد الشراء: ₽ $Balance 🧭

📮 هل أنت موافق على ذالك أو لا!! ⬇️*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'نعم ✅','callback_data'=>"readdd#$zero"],['text'=>'لا ❌','callback_data'=>"readynumbers"]],
[['text'=>'القائمة الرئيسية 🏡','callback_data'=>"home"]]
]
])
]);
$readynumber[$chat_id]["buy"] = "stop";
save($readynumber , "readynum");

}
exit;

// التحقق من الرصيد عند شراء الرقم الجاهز
elseif(preg_match('/(readdd)/',$data)) :
$zero                 = $ex[1];
$num                 = $readynumber['ready'][$zero]['number'];
$code                = $readynumber['ready'][$zero]['code'];
$price                = $readynumber['ready'][$zero]['price'];
$country            = $readynumber['ready'][$zero]['country'];
$now                  = $readynumber['ready'][$zero]['now'];
$what                 = $readynumber['ready'][$zero]['what'];
$idnum              = substr(str_shuffle('12345689807'),1,9);


if($price > $point["members"][$check[$chat_id]['mail']]['point']) {
answer("⚠️ ⌯ لايوجد لديك رصيد كافي لشراء هذا الرقم!
💰 ⌯ رصيدك المتوفر ⪼ ₽". $point["members"][$check[$chat_id][ mail ]]["point"]
);
} elseif( $zero == null) {
answer("
❌ هذا الرقم لم يعد متاحا
♻ اضغط تحديث الصفحة
");
} else {
edit("
*تم شراء الرقم بنجاح ☑️

🔶 الدولة: $country
📞 الرقم: $num
♻️ الكود: $code
💰 السعر: $price ₽
🆔 ايدي معاملتك: $idnum
✨ الحالة: $now ✅
⁉️ ملاحظة: $what

*
",$home);
unset($readynumber['ready'][$zero]);
unset($readynumber[$chat_id]["buy"]);
save($readynumber , "readynum");
$point["members"][$check[$chat_id]['mail']]["point"] -= $price;
save($point , "point");
$static['ready']++;             
$static[$chat_id]['ready']++;             
$static['bot']['balance'] +=  $price;     
$static[$chat_id]["minus"] += $price;        
save($static,"static");             
$chart[$chat_id]["numbers"][] = $num;             
done($chart);
} 


    
elseif( $ex[0] == "B-N" ) :    
if ( $ex[3] <= $point["members"][$check[$chat_id]['mail']]["point"] ) {
	
            $name        =    $numbers["num"][$ex[1]]["name"]; //اسم السلعة//
            $price         =     $ex[3] ; //السعر//
            
            $service      =     $ex[4];//اسم الخدمة//
            $web            =     $ex[2]; //اسم الموقع//
            
            
if ( $web == "5sim" ) {
	$country     =     $numbers["num"][$ex[1]]["site-name"];
          $sim5 = file_get_contents("https://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=getNumber&service=$service&forward=forward&operator=any&country=$country");            
          $ex_api = explode(":",$sim5);
          $idnumber = $ex_api[1];
          $num = "+" ."`$ex_api[2]`";
          
if($sim5 == "NO_NUMBERS" || $sim5 == "BAD_ACTION" || $sim5 == "BAD_SERVICE" || $sim5 == "ERROR_SQL" || $sim5 == "" || $num == null ){
          answer("⚠️ ◐ لاتوجد أرقام لهذا السيرفر في الوقت الحالي
✅ ◐ أعد الضغط علية مجددا او حاول مرة اخرئ.");
} elseif($sim5 == "NO_BALANCE" || $sim5 == "BAD_KEY"){
                	answer("عذرا عزيزي المشترك لقد انتهى الرصيد في الموقع تخلى بالصبر سيتم اعادة شحن الموقع قريبا 🙃 $service $country");
                    sendd($admin,"تم إيقاف النقل، إما بسبب تغير api الحساب أو بسبب نقصان الرصيد في الموقع ❌");
                    sendd($usapi["user_id"],"لقد اكتملت عملية النقل وتم الرصيد اضافة الرصيد الى حسابك");
                    unlink("stor/Api.kson");
                  } else {
                    edit("
                    
🛍 ¦ تم شراء الرقم بنجاح. ✅
☎️ ¦ الرقم: $num
🎪 ¦ الدولة :$country
💭 ¦ الكود:  *Loading*
🪗 ¦ الحالة: *غير مكتمل ❌*
💰 ¦ السعر: ₽ : $price

✳️ ¦ تم شراء الرقم بنجاح!

☑️ ¦ إضغط على الرقم لنسخة!
🧩 ¦ أدخل الرقم في الواتسأب لوصول الكود، ثم أضغط على زر جلب الكود
",             [
                        [
                        	[
                                "text"=>"🪗 ¦ عرض الرقم في واتساب ↖️",
                                "url"=>"http://wa.me/$num"
                            ]
                            
                        ],
                        [
                            [
                                "text"=>"💬 ¦ طلب الكود",
                                "callback_data"=>"getcode#$num#$idnumber#5sim"
                            ]
                        ],
                        [
                            [
                                "text"=>"⚠️ ¦ الغاء الرقم",
                                "callback_data"=>"bandnumber#$num#$idnumber#$price#5sim"
                            ]
                        ]
                    ]);
sendd("-1001511657264","
- تم شراء جديد رقم من البوت  ✅.
☎️ - الرقم: $num
🤸‍♂ - التطبيق: $service
🎗 - الدوله: $country
🆔 - الحساب:  $chat_id
🔥 - السعر: $price  ₽
🎟 - الرصيد المتبقي: ".($point["members"][$check[$chat_id]['mail']]["point"] - $price)."
🏋‍♂ - الايميل : ".$check[$chat_id][ mail ]."
🪗- الموقع: 5sim.net
");                       
            $info[$chat_id][$web]['check'] = "ban"; 
            save($info);
            $static["info"]["numbers"]["count"]  +=  1;
            $static["info"]["numbers"]["point"]  +=  $price;
            save($static,"static");
            $point["members"][$check[$chat_id]['mail']]["point"] -= $price;
            save($point, "point");
            $info[$chat_id]["checker"] = "stop";
             save($info);
       }
 }
                
        
        if ( $web == "man" ) {
        	
        	$country     =     $nnn[$ex[1]]; //الدولة//
            	$man = file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=getNumber&api_key=$ApiKeySmsMan&service=$service&country=$country");
            
                $sms = explode(":",$man);
                $num = "+" ."`$sms[2]`";
                $idnumber = $sms[1];
                if ($man == "NO_NUMBERS" ) {
                answer("لا يتوفر أرقام حاليا حاول مجددا 😉");
                exit;
       } elseif($man =="NO_BALANCE" ) {
               answer("انتهى الرصيد في الموقع انتظر حتى يتم الشحن");                       
                  
                   } elseif($sms[0] == "ACCESS_NUMBER" ) {
                    edit("
🛍 ¦ تم شراء الرقم بنجاح. ✅
☎️ ¦ الرقم: $num
💭 ¦ الكود:  *Loading*
🪗 ¦ الحالة: *غير مكتمل ❌*
💰 ¦ السعر: ₽ : $price

✳️ ¦ تم شراء الرقم بنجاح!

☑️ ¦ إضغط على الرقم لنسخة!
🧩 ¦ أدخل الرقم في الواتسأب لوصول الكود، ثم أضغط على زر جلب الكود
",[
                        
                        [
                        	[
                                "text"=>"⚜️ ⌯ عرض رقم في واتساب. ↖️",
                                "url"=>"http://wa.me/$num"
                            ]
                            
                        ],
                        [
                            [
                                "text"=>"❇️ ⌯ جلب الكود.",
                                "callback_data"=>"getcode#$num#$idnumber#man"
                            ]
                        ],
                        [
                            [
                                "text"=>"⚠️ ⌯ إلغاء الرقم.",
                                "callback_data"=>"bandnumber#$num#$idnumber#$price#man"
                            ]
                        ]
                    ]);
                $info[$chat_id][$web]['check'] = "ban"; 
            save($info);
            $static["info"]["numbers"]["count"]  +=  1;
            $static["info"]["numbers"]["point"]  +=  $price;
            save($static,"static");
            $point["members"][$check[$chat_id]['mail']]["point"] -= $price;
            save($point, "point");
            $info[$chat_id]["checker"] = "stop";
             save($info);
sendd("-1001511657264","
- تم شراء رقم ✅.
☎️ - الرقم: $num
🚹 - التطبيق: $service
🌐 - دولة: $country
🆔 - حسابه: [$chat_id](tg://user?id=$chat_id)
🔥 - السعر: $price ₽
💴 - الرصيد المتبقي: ".($point["members"][$check[$chat_id]['mail']]["point"] - $price)."
🏋🏽 - الايميل: ".$check[$chat_id][ mail ]."
🎫 - الموقع: sms-activate.ru
");            
        
      }  else {
      	
      	answer("لا يوجد أرقام حاليا حاول مجددا ( hmm🙂 )");
      }
   }          
   ///////
   if ( $web == "super" ) {
   	$country     =     $sup[$ex[1]]; //الدولة//
		$url = "https://www.supersms.ml/api/getnumber?channel=1&country=".$country."&pid=".$service."&secret_key=$api_key_super";
          $sim5 = json_decode(file_get_contents($url), true);
          $num = str_replace('+','',$sim5["phone"]);
          $taskid = $sim5["taskid"];
if($sim5["message"] == "Phone number not found. Please try again later. (Suggestion: Try another country or another channel)" || $sim5["message"] == "8 per 1 minute" || $sim5["message"] == "The phone number is not available. Please try again later. (Suggestion: Try another country or another channel)"){
          answer("⚠️ ◐ لاتوجد أرقام لهذا السيرفر في الوقت الحالي
✅ ◐ أعد الضغط علية مجددا او حاول مرة اخرئ.");
} elseif($sim5["message"] == "Insufficient Balance" || $sim5["message"] == "No user found."){
                	answer("عذرا عزيزي المشترك لقد انتهى الرصيد في الموقع تخلى بالصبر سيتم اعادة شحن الموقع قريبا 🙃");
                    sendd($admin,"تم إيقاف النقل، إما بسبب تغير api الحساب أو بسبب نقصان الرصيد في الموقع ❌");
                    sendd($usapi["user_id"],"لقد اكتملت عملية النقل وتم الرصيد اضافة الرصيد الى حسابك");
                    unlink("stor/Api.kson");
                  } elseif($num != null) {
                    edit("
                    
🛍 ¦ تم شراء الرقم بنجاح. ✅
☎️ ¦ الرقم: +$num
🎪 ¦ الدولة :$country
💭 ¦ الكود:  *Loading*
🪗 ¦ الحالة: *غير مكتمل ❌*
💰 ¦ السعر: ₽ : $price

✳️ ¦ تم شراء الرقم بنجاح!

☑️ ¦ إضغط على الرقم لنسخة!
🧩 ¦ أدخل الرقم في الواتسأب لوصول الكود، ثم أضغط على زر جلب الكود
",             [
                        [
                        	[
                                "text"=>"🪗 ¦ عرض الرقم في واتساب ↖️",
                                "url"=>"http://wa.me/$num"
                            ]
                            
                        ],
                        [
                            [
                                "text"=>"💬 ¦ طلب الكود",
                                "callback_data"=>"getcode#$num#$taskid#super"
                            ]
                        ],
                        [
                            [
                                "text"=>"⚠️ ¦ الغاء الرقم",
                                "callback_data"=>"bandnumber#$num#$taskid#$price#super"
                            ]
                        ]
                    ]
);
sendd("-1001511657264","
- تم شراء جديد رقم من البوت  ✅.
☎️ - الرقم: $num
🤸‍♂ - التطبيق: $service
🎗 - الدوله: $country
🆔 - الحساب:  $chat_id
🔥 - السعر: $price  ₽
🎟 - الرصيد المتبقي: ".($point["members"][$check[$chat_id]['mail']]["point"] - $price)."
🏋‍♂ - الايميل : ".$check[$chat_id][ mail ]."
🪗- الموقع: 5sim.net
");                       
            $info[$chat_id][$web]['check'] = "ban"; 
            save($info);
            $static["info"]["numbers"]["count"]  +=  1;
            $static["info"]["numbers"]["point"]  +=  $price;
            save($static,"static");
            $point["members"][$check[$chat_id]['mail']]["point"] -= $price;
            save($point, "point");
            $info[$chat_id]["checker"] = "stop";
             save($info);
       }
 }
   //////
        } else {
        answer("⚠️ ⌯ لايوجد لديك رصيد كافي لشراء هذا الرقم!
💰 ⌯ رصيدك المتوفر ⪼ ₽ ". $point["members"][$check[$chat_id][ mail ]]["point"]
);
        }
        exit;
#================================#
    elseif ( $ex[0] == "getcode" && $ex[3] == "5sim" ) :
        $chartcode5sim  =   file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=getStatus&id=$ex[2]");
        $exx    =   explode(":",$chartcode5sim);
        if ( $exx[0] == "STATUS_OK" ) {
            $num = $ex[1];
            $code = $exx[1];
            edit("✳️ ⁞ تم شراء الرقم بنجاح!

☎️ ⁞ الرقم: $num
💬 ⁞ الكود: $code
🌀 ⁞ الحالة: مكتملة ✅

✅ تم وصول الكود بنجاح. 😉♥️");
            file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=setStatus&status=6&id=$ex[2]");
            $static['conum'] ++;
            $static[$chat_id]['conum']++;
            $static[$chat_id]['robel']++;
            $static['bot']['balance'] +=  $price;
            save($static,"static");
            
            unset($info[$chat_id]["checker"]);
             save($info);
            $chart[$chat_id]["numbers"][] = $code;
            done($chart);
        } else {
            answer("لم يصل الكود يرجى المحاولة بعد 5 ثواني");
        }
                                 
    elseif ( $ex[0] == "getcode" && $ex[3] == "man" ):
        $man    =   file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=getStatus&api_key=$ApiKeySmsMan&id=$ex[2]");
        if( $man == "STATUS_WAIT_CODE" || $man == "STATUS_WAIT_RETRY"  ) {
        	answer("لم يصل الكود يرجى المحاولة بعد 5 ثواني");
        } elseif($sms == "STATUS_CANCEL") {
        	answer("انتهت مهلة الرقم حاول مرة أخرى");
        } else {
        	$sms = explode(":",$man);
            $num = $ex[1];
            $code = $sms[1];  
  if($code == null) :       
           answer("لم يصل الكود الى الآن تأكد من ان الرقم غير محظور او تم استخدامه");
  else :
            edit("✳️ ⁞ تم شراء الرقم بنجاح!
       
☎️ ⁞ الرقم: $num
💬 ⁞ الكود: $code
🌀 ⁞ الحالة: مكتملة ✅


✅ تم وصول الكود بنجاح. 😉♥️");
            file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=setStatus&api_key=$ApiKeySmsMan&id=$ex[2]&status=6");  
            $static['conum'] ++;
            $static[$chat_id]['conum']++;
            $static[$chat_id]['robel']++;
            $static['bot']['balance'] +=  $price;
            save($static,"static");
            $chart[$chat_id]["numbers"][] = $code;
            done($chart);
            unset($info[$chat_id]["checker"]);
             save($info);
            endif;
        }
        elseif ( $ex[0] == "getcode" && $ex[3] == "super" ):
        $url    =   "https://www.supersms.ml/api/getcode?taskid=$ex[2]&secret_key=$api_key_super";
        $super = json_decode(file_get_contents($url), true);
        $mes = $super["message"];
        if( $mes == "SMS not yet received. Try again!") {
        	answer("لم يصل الكود يرجى المحاولة بعد 5 ثواني");
        } elseif($mes == "Task ID is invalid.") {
        	answer("انتهت مهلة الرقم حاول مرة أخرى");
        } else {
        	
            $num = $super["phone"];
            $code = $super["code"];  
  if($code == null) :       
           answer("لم يصل الكود الى الآن تأكد من ان الرقم غير محظور او تم استخدامه");
  else :
            edit("✳️ ⁞ تم شراء الرقم بنجاح!
☎️ ⁞ الرقم: $num
💬 ⁞ الكود: $code
🌀 ⁞ الحالة: مكتملة ✅
💰 ⁞ السعر: ₽ $ex[2]

✅ تم وصول الكود بنجاح. 😉♥️");
            $static['conum'] ++;
            $static[$chat_id]['conum']++;
            $static[$chat_id]['robel']++;
            $static['bot']['balance'] +=  $price;
            save($static,"static");
            $chart[$chat_id]["numbers"][] = $code;
            done($chart);
            unset($info[$chat_id]["checker"]);
             save($info);
            endif;
        }
 #=================================#
    elseif ( $ex[0] == "bandnumber" && $ex[4] == "5sim" ):
        $sim5    =   file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=getStatus&id=$ex[2]");
        $exx    =   explode(":",$sim5);
        if ( $exx[0] == "STATUS_OK" ) {
            $num = $ex[1];
            $code = $exx[1];
            edit("لم يتم الحظر لانك طلبت الكود وتم استلامه في الموقع الرقم : $num \nالكود : $code \nالحالة مكتملة");
            file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=setStatus&status=6&id=$ex[2]");
            $static['conum'] ++;
            $static[$chat_id]['conum']++;
            save($static,"static");
            unset($info[$chat_id]["checker"]);
             save($info);
        }else{
            //عند الحظر
            edit("تم الحظر بنجاح وتمت استعادة اموالك ",$home);
            $point["members"][$check[$chat_id]['mail']]["point"]    += $ex[3];
            save($point, "point");
            file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=setStatus&status=8&id=$ex[2]");
            $static['unconum'] ++;
            $static[$chat_id]['unconum']++;
            save($static,"static");
            unset($info[$chat_id]["checker"]);
             save($info);
        }
           #//////#
           elseif ( $ex[0] == "bandnumber" && $ex[4] == "super" ):
        $url    =   "https://www.supersms.ml/api/getcode?taskid=$ex[2]&secret_key=$api_key_super";
        $super = json_decode(file_get_contents($url), true);
        if ( $super["code"] != null ) {
            $num = $super["phone"];
            $code = $super["code"];
            edit("لم يتم الحظر لانك طلبت الكود وتم استلامه في الموقع الرقم : $num \nالكود : $code \nالحالة مكتملة");
            file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$ApiKey5sim&action=setStatus&status=6&id=$ex[2]");
            $static['conum'] ++;
            $static[$chat_id]['conum']++;
            save($static,"static");
            unset($info[$chat_id]["checker"]);
             save($info);
        }else{
            //عند الحظر
            edit("تم الحظر بنجاح وتمت استعادة اموالك ",$home);
            $point["members"][$check[$chat_id]['mail']]["point"]    += $ex[3];
            save($point, "point");
            file_get_contents("https://www.supersms.ml/api/releasenumber?secret_key=$api_key_super&phone=$ex[1]");
            $static['unconum'] ++;
            $static[$chat_id]['unconum']++;
            save($static,"static");
            unset($info[$chat_id]["checker"]);
             save($info);
        }
           #//////#
    elseif ( $ex[0] == "bandnumber" && $ex[4] == "man" ):
        $man    =   file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=getStatus&api_key=$ApiKeySmsMan&id=$ex[2]");
        $sms = explode(":",$man);
            $num = $ex[1];
            $code = $sms[1];  
        if ( $code != null ){//عند استلام الكود في حالة وجوده لكن تم ضغط زر الحظر
            $num = $ex[1];
            edit("لم يتم الحظر لانك طلبت الكود وتم استلامه في الموقع الرقم : $num \nالكود : $code \nالحالة مكتملة");
            file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=setStatus&api_key=$ApiKeySmsMan&id=$ex[2]&status=6");  
            $static['conum'] ++;
            $static[$chat_id]['conum']++;
            save($static,"static");
            unset($info[$chat_id]["checker"]);
             save($info);
        } else {
            //عند الحظر
            edit("تم الحظر بنجاح وتمت استعادة اموالك ",$home);
            $point["members"][$check[$chat_id]['mail']]["point"]    += $ex[3];
            save($point, "point");
            file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=setStatus&api_key=$ApiKeySmsMan&id=$ex[2]&status=8"); 
            $static['unconum'] ++;
            $static[$check[$chat_id]['mail']]['unconum']++;
            save($static,"static");
            unset($info[$chat_id]["checker"]);
             save($info);
        }
        exit;
        
        elseif($data == "market_cards") : 
        $json = [];
        $json["inline_keyboard"][]  =   [["text"=>"الــكود 📩","callback_data"=>"card_price"],["text"=>"لسعـــر💲","callback_data"=>"card_amount"],["text"=>"الــكمية 📮","callback_data"=>"elias"]];
        
        foreach ($numbers['cards'] as $code => $card  ) :
        if($code != null){
        $amount = $numbers['cards'][$code]['amount'];
        $price      = $numbers['cards'][$code]['price'];
        $cod        = substr($code, 0,-6)."••••";
        $json["inline_keyboard"][]  =   [["text"=>"$cod","callback_data"=>"nothing"],["text"=>"$price ₽", "callback_data"=>"nothing"],["text"=>"$amount","callback_data"=>"buycard#$price#$amount#$code"]];
        }
        endforeach;
        $json["inline_keyboard"][]  =   [['text'=>'تحديث الصفحة 🔂',"callback_data"=>"market_cards"],['text'=>'القائمة الرئيسية 🏡',"callback_data"=>"home"]];
        bot("editmessagetext",[
            "chat_id"=>$chat_id,
             "message_id" => $message_id,
            "text" => "🛄 إليك متجر الكروت الجاهزة الشحن الخاص بالبوت
⁉️ يمكنك شراء الكرت وشحنه في حساب آخر ♻️
✳️ هذا المتجر مخصص لبيع كروت الشحن فقط ✔️",
            "reply_markup" => json_encode($json)
        ]);
        exit;
  
elseif($data == "fav"):
$json["inline_keyboard"][]  =   [["text"=>"الدولة 🌐","callback_data"=>"hello"],["text"=>"السيرفر 📟","callback_data"=>"hmm"],["text"=>"السعر 💰","callback_data"=>"Alwalidee"]];
foreach($favourite["number"] as $k => $v):
if($k = "5sim"):
$key = $favourite["number"][$k]["key"];
$operator = $favourite["number"][$k]["ope"];
$app         = $favourite["number"][$k]["app"];
else :
$key = $favourite["number"][$k]["key"];
$operator = $favourite["number"][$k]["ope"];
$app         = $favourite["number"][$k]["app"];
endif;
$name      =  $numbers["num"][$key]["name"];
$country   =  $numbers["num"][$key]["site-name"];
$ser          =  $numbers["num"][$key]["ser"];
$key         =  $numbers["num"][$key]["con-key"];
if($ser == "5sim") {
	$price = json_decode(file_get_contents("https://5sim.net/v1/guest/products/$country/$operator"))->$app->Price ; 
    $json["inline_keyboard"][]  =   [["text"=>"$name","callback_data"=>"hello"],["text"=>"$operator" ,"callback_data"=>"hmm"],["text"=>"$price ₽","callback_data"=>"B-N#$key#$app#$price#$operator"]];
    
   } else {
            	$chart = json_decode(file_get_contents("http://api.sms-man.com/stubs/handler_api.php?action=getPrices&api_key=$ApiKeySmsMan&country=$country&service=$app"));
                $cost   =  $chart->$country->cost ;
                $price = $info["nesbah"] / 100 * $cost + $cost;
                $json["inline_keyboard"][]  =   [["text"=>"$name","callback_data"=>"hello"],["text"=>"سيرفر 2" ,"callback_data"=>"hmm"],["text"=>"$price ₽","callback_data"=>"B-N#$key#$app#$price"]];   
 }
endforeach;
$json["inline_keyboard"][]  =   [["text"=>"القائمة الرئيسية 🏡","callback_data"=>"home"]];
 bot("editmessagetext",[
            "chat_id"=>$chat_id,
            "text"=>"😁🌸 ⌯ الدولة: $name
🤧♥️ ⌯ التطبيق : $ex[2]. ☑️

☑️ ⌯ إختر احد السيرفرات للشراء منه. ☺️🌸

🛍️ ⌯ كل سيرفر يقوم بتوفير عدد من الارقام وكل سيرفر له سعر خاص به. 😌🌼" ,
            "message_id" => $message_id,
            "reply_markup" => json_encode($json)
        ]);              
        
exit;       
      
        elseif($data == "cCard") :
             	if($chart[$chat_id]["cards"] != null) :
             	foreach($chart[$chat_id]["cards"] as $val):
                 $cards .= "`$val`" . "\n";
                 endforeach;
       edit("سجل الكروت الذي قمت بشحنها  \n $cards");
       else : 
       answer("أنت لم تقم بشحن كرت الى الآن 🤔🤔");
       endif;
       exit;
       
elseif($data == "cNumber") :
             	if($chart[$chat_id]["numbers"] != null) :
foreach($chart[$chat_id]["numbers"] as $val):
                 $nums .= "`$val`" . "\n";
                 endforeach;
       edit("سجل الأرقام الذي قمت بشرائها \n $nums");
else : 
       answer("❌ لا يوجد سجل لك! 👌 لم تقم بشراء أي رقم حتى الآن");
       endif;
       exit;
       elseif($data == "cCardBuy"):
       if($chart[$chat_id]["buycards"] != null) :
             	foreach($chart[$chat_id]["buycards"] as $val):
                 $buycards .= "`$val`" . "\n";
                 endforeach;
       edit("سجل الكروت الذي قمت بشرائها \n $buycards");
       else : 
       answer("❌ لا يوجد سجل لك! 👌 لم تقم بشراء أي كرت حتى الآن");
       endif;
       exit;
    endif;
    
    
#=========================================================================#
else:
    die("@Baageel_Programmer");
endif;
include("login.php");

if(isset($update)):
        $channel ="-1001780566403";
    @$a = explode("\n",$text);
    @$home=[[["text"=>"القائمة الرئيسية","callback_data"=>"home"]]];
    @$bak=[[["text"=>"رجوع 🔙","callback_data"=>"home"]]];
    @$cancel=[[["text"=>"إلغاء ❌","callback_data"=>"home"]]];
    if ( $text == "/admin" ):
        send(
            "اهلا وسهلا بك عزيزي المطور". 
            "الاوامر امامك اختر ماتريد",
            [
			[["text" => " تقييد عضو 🔧", "callback_data" => "ban"]],
                [["text" => "فك تقييد عضو 🔧", "callback_data" => "unban"]],                               
                [["text"=>"اضافة رصيد 💲","callback_data"=>"addpoint"],                              
                ],                               
                
            ]
        );
        $info[$chat_id]['mode']=null;
        save($info);
        exit; 
        elseif ( $data == "home2" ):
        edit(
            "اهلا وسهلا بك عزيزي المطور". 
            "الاوامر امامك اختر ماتريد",
            [
                
                [["text" => " تقييد عضو 🔧", "callback_data" => "ban"]],
                [["text" => "فك تقييد عضو 🔧", "callback_data" => "unban"]],                               
                [["text"=>"اضافة رصيد 💲","callback_data"=>"addpoint"],                              
                ], 
            ]
        );
        $info[$chat_id]['mode']=null;
        save($info);
        exit;
        elseif($data == "addpoint") :
        edit("✅ | يمكنك الأن تحويل رصيد من حسابك الئ حساب شخص أخر بشكل مباشر .
👨‍✈️ | عمولة التحويل:  0%.
⚠️ | أقل مبلغ للتحويل:  20.00✅.\n
✳️ | هل تريد تحويل رصيد الئ حساب أخر؟",  [
           [
                ["text"=>"تأكيد ✅","callback_data"=>"continue2"],
                ["text"=>"الإلغاء والرجوع ⛔","callback_data"=>"home"]
            ],
            ]);
        elseif($data == "continue2") :
           if($point["members"][$check[$chat_id]['mail']]["point"] >20){        
            edit("حسنا قم بإرسال ايدي الشخص",$home);
            $info[$chat_id]['mode'] = "send2";
            save($info);
                  } else {
        	bot("answercallbackquery",[
                "callback_query_id"=>$update->callback_query->id,
                "text"=>"رصيدك لا يكفي لهذه العملية",
                "show_alert"=>true
            ]);
                  }
            elseif( is_numeric($text) && $info[$chat_id]['mode'] == "send2") :
                        $chartchat = bot('getchat',['chat_id'=>$text ])->ok;
            if($chartchat == "true") {
                        send("حسنا قم بإرسال النقاط الآن");
                        $info[$chat_id]['mode'] = "point2";
                        $info[$chat_id]['idm'] = $text;
                        save($info);
        } else {
           send("هذا المستخدم غير موجود في البوت أو أنه قام بحظره"); 
           }
                 
        elseif( is_numeric($text) && $info[$chat_id]['mode'] == "point2") :
        if($text >20){ 
                if($text > $point['members'][$check[$chat_id]['mail']]['point'])exit;  
                $point['members'][$check[$chat_id]['mail']]['point'] -= $text;
                $point["members"][$check[$info[$chat_id]['idm']][ mail ]]["point"] += $text;
        save($point , "point");
        $last = $point['members'][$check[$chat_id]['mail']]['point'];
        $idm =$info[$chat_id]['idm'];
        send("تم التحويل بنجاح ✅

📟 المرسل : $fname
🧭 المستلم : [$idm](tg://user?id=$idm)
💵 المبلغ المحول : $text
💰 الرصيد المتبقي : $last
===================");
                sendd($info[$chat_id]['idm'] , "
🔄 - تم إعادة شحن حسابك بمبلغ ₽ $text  روبل. ✅
🎁 - بواسطة الوكيل:[$fname](tg://user?id=$chat_id) 🤎.
");
                $info[$chat_id]['idm'] =null;
                $info[$chat_id]['mode'] =null;
                save($info);
        } else {
        	send("عذرا لا يمكنك التحويل برصيد اقل من المسموح به");
        }
        
        
        elseif($data == "ban") :
            edit("حسنا قم بإرسال ايدي الشخص المراد تقييده",$home);
            $info[$chat_id]['mode'] = "ban";
            save($info);
            exit;
            elseif(preg_match("/[0-9]+/",$text) && $info[$chat_id]["mode"] == "ban"):
          send("تم تقييد المستخدم" , $home);
          sendd($text , "
 - تم تقيدك  من استخدم البوت⛔️.
- الدي قام بتقيدك الوكيل:- [$fname](tg://user?id=$chat_id)
");
             if(!in_array($text,explode("\n",file_get_contents('ban.txt')))){
				file_put_contents('ban.txt',$text."\n",FILE_APPEND);
			 }
             $info[$chat_id]["mode"] = null;
             save($info);
			exit;
			elseif($data == "unban") :
            edit("حسنا قم بإرسال ايدي الشخص المراد الغاء تقييده",$home);
            $info[$chat_id]['mode'] = "unban";
            save($info);
            exit;
            elseif(preg_match("/[0-9]+/",$text) && $info[$chat_id]["mode"] == "unban"):
          
             if(in_array($text,explode("\n",file_get_contents('ban.txt')))){
             	send("تم الغاء تقييد المستخدم" , $home);
          	sendd($text , "
 - تم الغاء تقيدك من استخدم البوت⛔️.
- الدي قام بالغاء بتقيدك الوكيل:- [$fname](tg://user?id=$chat_id)
");

				$s = str_replace($text . "\n",'',file_get_contents('ban.txt'));
				file_put_contents('ban.txt',$s);
			 }
             $info[$chat_id]["mode"] = null;
             save($info);
			exit;
			//str_replace('12','',explode("\n",$arr));
endif;
    #====================================================================#
else:
    die("@Baageel_Programmer");
endif;