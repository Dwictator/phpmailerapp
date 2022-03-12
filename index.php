<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1 class="text-title">Email Compose</h1>
    <form action="submit.php" method="post" class="form-email">
        <input type="email" placeholder="Recipient" name="recipient" class="input-recipient" id="">
        <input type="text" placeholder="Subject" name="subject" class="input-subject" id="">
        <textarea placeholder="Message Body" name="message" class="message-body" id="" cols="30" rows="10"></textarea>
        <button type="submit" class="button-send">Send</button>
    </form>

    <script>
        document.querySelector(document).ready(function(){
            setTimeout(function() {
              <?php
                if( $_GET['status'] == 'success') {
                  echo 'alert("welldone");';
                }else{
                  echo 'alert("no good");';
                }
              ?>
            }, 500);
      });
    </script>
</body>
</html>