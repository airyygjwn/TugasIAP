<?php
function get_Curl($url)

{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
  $result = curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);
}

$result = get_Curl("https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCwfZQDkygmgxOOUGv0WddbA&key=AIzaSyCSJ_a9PTL9ojuNP3LJuwD5l3-NrO88OWM");

$youtubeProfilePic = $result['items'][0]['snippet'] ['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

//latest video
$urlLatestVideo = "https://www.googleapis.com/youtube/v3/search?key=AIzaSyCSJ_a9PTL9ojuNP3LJuwD5l3-NrO88OWM&channelId=UCwfZQDkygmgxOOUGv0WddbA&maxResult=1&order=date&part=snippet";
$result = get_Curl($urlLatestVideo);
$latestVideoId = $result['items'][0]['id']['videoId'];

// Channel Kedua
$result2 = get_Curl("https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCArLZtok93cO5R9RI4_Y5Jw&key=AIzaSyCSJ_a9PTL9ojuNP3LJuwD5l3-NrO88OWM");
$youtubeProfilePic2 = $result2['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName2 = $result2['items'][0]['snippet']['title'];
$subscriber2 = $result2['items'][0]['statistics']['subscriberCount'];

$urlLatestVideo2 = "https://www.googleapis.com/youtube/v3/search?key=AIzaSyCSJ_a9PTL9ojuNP3LJuwD5l3-NrO88OWM&channelId=UCArLZtok93cO5R9RI4_Y5Jw&maxResult=1&order=date&part=snippet";
$result2 = get_Curl($urlLatestVideo2);
$latestVideoId2 = $result2['items'][0]['id']['videoId'];


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">Nelsi Ramanda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/profile3.png" class="rounded-circle img-thumbnail">
          <h1 class="display-4">Nelsi Ramanda</h1>
          <h3 class="lead">Sistem Informasi | 2217020003 | Angkatan 22 </h3>
        </div>
      </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <p>Saya Nelsi Ramanda, saya adalah seorang mahasiswa sistem informasi, sekarang saya berada di semester 6, saya aktif mengikuti kegiatan di fakultas ataupun universitas, dan saya juga suka olahraga terutama di cabang Tenis Meja.</p>
          </div>
          <div class="col-md-5">
            <p>Saya senang mengembangkan diri tidak hanya di bidang akademik, tetapi juga melalui berbagai kegiatan organisasi dan olahraga. Dengan semangat belajar yang tinggi, saya terus berusaha meningkatkan pengetahuan dan keterampilan di bidang Sistem Informasi. </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Youtube -->
<section class="social bg-light" id="social">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Vidio Playlist</h2>
      </div>
    </div>

    <div class="row justify-content-center">
      <!-- Channel YouTube Pertama -->
      <div class="col-md-5">
        <div class="row">
          <div class="col-md-4">
            <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle img-thumbnail">
          </div>
          <div class="col-md-8">
            <h5><?= $channelName; ?></h5>
            <p><?= $subscriber; ?> Subscriber.</p>
            <div class="g-ytsubscribe" data-channelid="UCwfZQDkygmgxOOUGv0WddbA" data-layout="default" data-count="default"></div>
          </div>
        </div>
        <div class="row mt-3 pb-3">
          <div class="col">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId; ?>" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>

      <!-- Channel YouTube Kedua -->
      <div class="col-md-5">
        <div class="row">
          <div class="col-md-4">
            <img src="<?= $youtubeProfilePic2; ?>" width="200" class="rounded-circle img-thumbnail">
          </div>
          <div class="col-md-8">
            <h5><?= $channelName2; ?></h5>
            <p><?= $subscriber2; ?> Subscriber.</p>
            <div class="g-ytsubscribe" data-channelid="UCArLZtok93cO5R9RI4_Y5Jw" data-layout="default" data-count="default"></div>
          </div>
        </div>
        <div class="row mt-3 pb-3">
          <div class="col">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId2; ?>" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <!-- Portfolio -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Portfolio</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/7.png" alt="Movie Project">
              <div class="card-body">
                <h5 class="card-title">Movie Search Project</h5>
                <p class="card-text">Project aplikasi pencarian film menggunakan API, Bootstrap, dan JavaScript.</p>
                <a href="index.html" class="btn btn-primary">Lihat Projek WPU Movie</a>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/11.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Daftar Menu</h5>
                <p class="card-text">Melihat daftar menu serta harga di fizza Hut Menggunakan Json. disini bisa filter sesuai kategori</p>
                <a href="../wpu-hut/latihan2.html" class="btn btn-primary">Lihat Projek WPU HUT</a>
              </div>
            </div>
          </div>

          
        
      </div>
    </section>


    <!-- Contact -->
    <section class="contact bg-light" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p class="card-text">Jangan ragu untuk menghubungi saya jika Anda memiliki pertanyaan, masukan, atau ingin bekerja sama.</p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">UIN Imam Bonjol</li>
              <li class="list-group-item">Sungai Bangek</li>
              <li class="list-group-item">Padang, Sumatera Barat</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2018.</p>
          </div>
        </div>
      </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
  </body>
</html>