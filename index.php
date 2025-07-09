<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--chat-icons.css-->
    <link rel="stylesheet" href="assets/css/chat-icons.css">

    <!--chat-box-style.css-->
    <link rel="stylesheet" href="assets/css/chat-box-style.css">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <!-- chat-icons -->
    <div class="waz-chat-icons-box">
        <ul>
            <li>
                <a href="#" id="custom-chat-icon">
                    <img src="assets/images/chat-icons/chat-icon.png" alt="">
                    Chat
                </a>
            </li>
        </ul>
    </div>

    <div class="waz-chat-icon"></div>

    <div class="chatbox-wrapper">
        <section class="chat-area">
            <header>
                <div class="close-chat">X</div>
            </header>
            <div class="chat-box">

            </div>
            <form action="#" class="typing-area">
                <input type="text" class="incoming_id" name="incoming_id" value="1430280929" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
            <?php 
                
                if(isset($_SESSION['unique_id']) && $_SESSION['unique_id'] != ""){
                    
                }else{ ?>
            <div class="chat-require">

                <?php
                    
                    $exemail = "";
                    $exphone = "";
                    $exavatar = "";
                    $status = "Active now";

                    if(isset($_SESSION['username']) && $_SESSION['username'] != ""){
                        $UserId = $_SESSION['username'];
                        $sql = "SELECT EmailAddress, PhoneNumber, Avatar FROM accounts WHERE UserId='$UserId'";
                        $res = mysqli_query($link, $sql);
                        if(mysqli_num_rows($res) > 0){
                            $dat = mysqli_fetch_array($res);
                            $exemail = $dat['EmailAddress'];
                            $exphone = $dat['PhoneNumber'];
                            $exavatar = $dat['Avatar'];
                        }

                        $sqltwo = "SELECT unique_id FROM chat_users WHERE chat_email='$exemail'";
                        $restwo = mysqli_query($link, $sqltwo);
                        if(mysqli_num_rows($restwo) > 0){
                            $dattwo = mysqli_fetch_array($restwo);
                            $_SESSION['unique_id'] = $dattwo['unique_id'];
                        }
                        
                    }

                    
                ?>



                <form action="" method="post">
                    <input class="form-control" type="email" name="chat_email" id="" placeholder="Email Address" value="<?php if($exemail != ""){ echo $exemail; } ?>" required />
                    <input class="form-control" type="text" name="chat_phone" id="" placeholder="Phone Number" value="<?php if($exphone != ""){ echo $exphone; } ?>" required />
                    <button class="form-control btn btn-success">Start Chat</button>
                </form>
            </div>
            <?php } ?>
        </section>
    </div>
</body>
</html>