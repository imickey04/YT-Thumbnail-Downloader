<?php
  if(isset($_POST['button'])){

    $imgUrl = $_POST['imgurl'];

    $ch = curl_init($imgUrl);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $downloadImg = curl_exec($ch);
    
    curl_close($ch);

    header('Content-type: image/jpg');

    header('Content-Disposition: attachment;filename="thumbnail.jpg"');
    
    echo $downloadImg;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thumbnail Downloader</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <header>Get Your Favourite Thumbnail</header>
        <div class="url-input">
          <span class="title">Paste YT video url:</span>
          <div class="field">
            <input type="text" placeholder="https://www.youtube.com/watch?v=HSmjdnH8gQs" required>
            <input class="hidden-input" type="hidden" name="imgurl">
            <span class="bottom-line"></span>
          </div>
        </div>
        <div class="preview-area">
          <img class="thumbnail" src="" alt="">
          <i class="icon fas fa-cloud-download-alt"></i>
          <span>Paste Here YT Video url to See Perview</span>
        </div>
        <button class="download-btn" type="submit" name="button">Get Your Thumbnail</button>
      </form>

    <script src="script.js"></script>

</body>
</html>