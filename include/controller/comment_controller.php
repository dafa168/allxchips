<?php


/**
 * 发表评论
 */
class Comment_Controller
{
    // 上传文件
    public function uploadFile()
    {
        $up = new Upload();
        $up->set("path", EMO_ROOT . '/content/backup');
        $up->set("maxsize", 1048576);
        $up->set("allowtype", ['xlsx', 'xls']);
//        $up->set("israndname", false);

        //使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名子 pic, 如果成功返回true, 失败返回false
        if ($up->upload("inputFile")) {
            //获取上传后文件名子
            jsonExit(['code' => 1, 'msg' => 'OK', 'file' => $up->getFileName()]);
        }
        jsonExit(['code' => 0, 'msg' => $up->getErrorMsg()]);
    }

    // 添加询价
    public function addComment()
    {
        $way = $_POST['rfqKey'] ?? '';
        if (empty($way) && !in_array($way, [1, 2])) {
            jsonExit(['code' => 0, 'msg' => 'params is missing']);
        }

        $name = $_POST['contactName'] ?? '';
        if (empty($name)) {
            jsonExit(['code' => 0, 'msg' => 'contact name is required']);
        }

        $cname = $_POST['companyName'] ?? '';
        if (empty($cname)) {
            jsonExit(['code' => 0, 'msg' => 'company name is required']);
        }

        $email = $_POST['email'] ?? '';
        if (empty($email)) {
            jsonExit(['code' => 0, 'msg' => 'email address is required']);
        }
        if (!checkMail($email)) {
            jsonExit(['code' => 0, 'msg' => 'email address invalid']);
        }

        $phone = $_POST['phone'] ?? '';
        if (empty($phone)) {
            jsonExit(['code' => 0, 'msg' => 'tel number is required']);
        }

        $msg = $_POST['comment'] ?? '';
        $file = $_POST['fileUrl'] ?? '';
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $url = (isHttps() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $quote = [];
        if ($file === 'null' && $way == Inquiry_Model::WAY_INQUIRY) {
            if (isset($_POST['partNumber'])) {
                foreach ($_POST['partNumber'] as $k => $v) {
                    $quote[] = [
                        'partNumber' => $v,
                        'quantity' => $_POST['quantity'][$k] ?? 0,
                        'targetPrice' => $_POST['targetPrice'][$k] ?? '',
                        'manufacturer' => $_POST['manufacturer'][$k] ?? '',
                        'packaging' => $_POST['packaging'][$k] ?? '',
                        'remark' => $_POST['remark'][$k] ?? '',
                    ];
                }
            }
        }

        if ($way == Inquiry_Model::WAY_DETAIL) {
            $quote[] = [
                'partNumber' => $_POST['partNumber'] ?? '',
                'quantity' => $_POST['quantity'] ?? 0,
                'targetPrice' => $_POST['targetPrice'] ?? '',
                'manufacturer' =>  '',
                'packaging' => '',
                'remark' =>  '',
            ] ;
        }

        $Inquiry_Model = new Inquiry_Model();
        if ($Inquiry_Model->isInquiryTooFast()) {
            jsonExit(['code' => 0, 'msg' => 'The submission is too fast, please wait...']);
        }

        $id = $Inquiry_Model->addInquiry($name, $cname, $email, $phone, $msg,
            json_encode($quote, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            $url, $user_agent, $file, $way);

        if ($id > 0) {
            $this->sendEmail([
                'name' => $name,
                'cname' => $cname,
                'email' => $email,
                'phone' => $phone,
                'msg' => $msg,
                'file' => $file,
                'url' => $url,
                'quote' => $quote
            ]);
        }
        jsonExit(['code' => 1, 'msg' => 'OK']);
    }


    /**
     * 发送邮件
     * @param array $params
     */
    private function sendEmail($params = [])
    {
        $options = Cache::getInstance()->readCache('options');

        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        try {
            //Server settings
            if ($options['smtp_debug'] === 'y') {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;           //Enable verbose debug output
            } else {
                $mail->SMTPDebug = SMTP::DEBUG_OFF;                 //Disable verbose debug output
            }

            $mail->isSMTP();                                  //Send using SMTP
            $mail->Host = $options['smtp_host'];             //Set the SMTP server to send through
            $mail->SMTPAuth = true;                               //Enable SMTP authentication
            $mail->Username = $options['smtp_name'];            //SMTP username
            $mail->Password = $options['smtp_pass'];                //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = $options['smtp_port']; //465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($options['smtp_name'], $_SERVER['HTTP_HOST'] ?? 'mailer');
            $mail->addAddress($options['email'], $options['nickname']);

//            $mail->setFrom('dafa168@126.com', '126 Mailer');
//            $mail->addAddress('dafa168@163.com', '163 User');     //Add a recipient
//            $mail->addAddress('jennie@hitech-ic.com', 'test');               //Name is optional
//            $mail->addReplyTo('info@example.com', 'Information');
//            $mail->addCC('cc@example.com');
//            $mail->addBCC('bcc@example.com');
            //Attachments
//            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //如果有发送文件则增加附件
            if ($params['file'] !== 'null') {
                $mail->addAttachment(EMO_ROOT . '/content/backup/' . $params['file']);
            }

            //Content
            $mail->isHTML();                                  //Set email format to HTML
            $mail->Subject = 'From ' . ($_SERVER['HTTP_HOST'] ?? 'SEO') . ' Inquiry & Contact';
            $mail->Body = $this->htmlTemplate($params);

            $mail->send();
//            echo 'Message has been sent';
        } catch (Exception $e) {
            error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            error_log(json_encode([
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'msg' => $e->getMessage()
            ]), 0);
//            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    private function htmlTemplate($params = [])
    {
        $html = '';
        if (count($params['quote']) > 0) {
            foreach ($params['quote'] as $v) {
                $html .= "<tr> <td>{$v['partNumber']}</td> <td>{$v['quantity']}</td> <td>{$v['targetPrice']}</td> <td>{$v['manufacturer']}</td>  <td>{$v['packaging']}</td> <td>{$v['remark']}</td> </tr>";
            }
        } else {
            $html .= "<tr><td colspan='100'>no inquiry data.</td></tr>";
        }

        return <<<EOL
<table border="2" cellpadding="10">
    <caption> Contact </caption>
    <tr> <td>*Company Name:</td> <td>{$params['cname']}</td>  <td>*Contact Name:</td> <td>{$params['name']}</td> </tr>
    <tr> <td>*Email:</td> <td>{$params['email']}</td>   <td>*Tel:</td> <td>{$params['phone']}</td> </tr>
    <tr> <td>*Message:</td> <td colspan="3">{$params['msg']}</td> </tr>
</table>
<hr>
<table id="mytable" border="2" cellpadding="10">
    <caption> Inquiry </caption>
    <tr>
        <th scope="col" abbr="*Part Number">*Part Number</th>
        <th scope="col" abbr="*Quantity">*Quantity</th>
        <th scope="col" abbr="Target Price($)">Target Price($)</th>
        <th scope="col" abbr="Manufacturer">Manufacturer</th>
        <th scope="col" abbr="Packaging">Packaging</th>
        <th scope="col" abbr="Remark">Remark</th>
    </tr>
    {$html}
</table>
EOL;
    }

    public function addCommentBAK()
    {
        $name = isset($_POST['comname']) ? addslashes(trim($_POST['comname'])) : '';
        $content = isset($_POST['comment']) ? addslashes(trim($_POST['comment'])) : '';
        $mail = isset($_POST['commail']) ? addslashes(trim($_POST['commail'])) : '';
        $url = isset($_POST['comurl']) ? addslashes(trim($_POST['comurl'])) : '';
        $imgcode = isset($_POST['imgcode']) ? addslashes(strtoupper(trim($_POST['imgcode']))) : '';
        $blogId = isset($_POST['gid']) ? (int)$_POST['gid'] : -1;
        $pid = isset($_POST['pid']) ? (int)$_POST['pid'] : 0;

        if (ISLOGIN === true) {
            $CACHE = Cache::getInstance();
            $user_cache = $CACHE->readCache('user');
            $name = addslashes($user_cache[UID]['name_orig']);
            $mail = addslashes($user_cache[UID]['mail']);
            $url = addslashes(BLOG_URL);
        }

        if ($url && strncasecmp($url, 'http', 4)) {
            $url = 'http://' . $url;
        }

        doAction('comment_post');

        $Comment_Model = new Comment_Model();
        $Comment_Model->setCommentCookie($name, $mail, $url);
        if ($Comment_Model->isLogCanComment($blogId) === false) {
            emMsg('评论失败：该文章已关闭评论');
        } elseif ($Comment_Model->isCommentExist($blogId, $name, $content) === true) {
            emMsg('评论失败：已存在相同内容评论');
        } elseif (ROLE == ROLE_VISITOR && $Comment_Model->isCommentTooFast() === true) {
            emMsg('评论失败：您写评论的速度太快了，请稍后再试');
        } elseif (empty($name)) {
            emMsg('评论失败：请填写姓名');
        } elseif (strlen($name) > 20) {
            emMsg('评论失败：姓名不符合规范');
        } elseif ($mail != '' && !checkMail($mail)) {
            emMsg('评论失败：邮件地址不符合规范');
        } elseif (ISLOGIN == false && $Comment_Model->isNameAndMailValid($name, $mail) === false) {
            emMsg('评论失败：禁止使用管理员昵称或邮箱评论');
        } elseif (!empty($url) && preg_match("/^(http|https)\:\/\/[^<>'\"]*$/", $url) == false) {
            emMsg('评论失败：主页地址不符合规范', 'javascript:history.back(-1);');
        } elseif (empty($content)) {
            emMsg('评论失败：请填写评论内容');
        } elseif (strlen($content) > 60000) {
            emMsg('评论失败：内容不符合规范');
        } elseif (ROLE == ROLE_VISITOR && Option::get('comment_needchinese') == 'y' && !preg_match('/[\x{4e00}-\x{9fa5}]/iu', $content)) {
            emMsg('评论失败：评论内容需包含中文');
        } elseif (ISLOGIN == false && Option::get('comment_code') == 'y' && session_start() && (empty($imgcode) || $imgcode !== $_SESSION['code'])) {
            emMsg('评论失败：验证码错误');
        } else {
            $_SESSION['code'] = null;
            $Comment_Model->addComment($name, $content, $mail, $url, $imgcode, $blogId, $pid);
        }
    }

}
