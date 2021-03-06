<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <title>My First PWA</title>
  <meta name="description" content="My first PWA"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#00897B"/>
  <link rel="manifest" href="manifest.json">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Vue js -->
  <script src="https://unpkg.com/vue@2.0.3/dist/vue.js"></script>
  <script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
  <script src="https://unpkg.com/lodash@4.13.1/lodash.min.js"></script>
  <style media="screen">
  .menutop{
    background-color: #1A6697;
  }
  .bottomnav > li { display: inline-block; margin-left: 10px; margin-right: 15px; padding-left: 2px; margin-top: 2px; padding: 5px;}
  a { text-decoration: none; color: black;}
  .container {
    height: 100%;
  }
  .bottomnav {
     position: fixed;
     left: 0;
     bottom: 0%;
     width: 100%;
     height: 60px;
     border-top: 1px solid rgb(175, 179, 175);
     /* padding-top: 10px; */
     /* background-color: red; */
     /* color: white; */
     text-align: center;
     background-color: #1A6697 !important;
  }
  .bottomnav:focus {
    background-color: #1A6697 !important;
  }
  .active {
    color: #1A6697;
  }
  </style>
</head>
<body>
  <!-- Navigasi -->
  <nav class="menutop" role="navigation">
    <div class="nav-wrapper container">
      <em style="font-size: 20px;" onclick="window.location.href = window.location.origin + '/pwa/layout.html'" class="fa fa-arrow-left"></em>
      <a href="#" class="brand-logo" id="logo-container">My App</a>
      <!-- <a href="#" class="sidenav-trigger" data-target="nav-mobile">☰</a> -->

      <!-- <ul class="topnav right hide-on-med-and-down"></ul> -->
    </div>
  </nav>
  <!-- Akhir Navigasi -->
  <div class="container" id="body-content">
    <br>
    <div class="row">
   <form class="col s12" id="formData">
   <input id="id" type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
     <div class="row">
       <div class="input-field col s12">
         <input id="title" type="text" name="title" class="validate clear" value="<?php echo $_GET['title']; ?>">
         <label for="title">Title</label>
       </div>
     </div>
     <div class="row">
       <div class="input-field col s12">
         <input id="content" type="text" name="content" class="validate clear" value="<?php echo $_GET['content']; ?>">
         <label for="content">Content</label>
       </div>
     </div>
 </div>
  </div>
  <button class="waves-effect bottomnav" type="submit" style="font-size: 25px; color:white" id="submit">
    Simpan <em class="fa fa-save"></em>
  </button>
  </form>
  <script src="js/jquery.js"></script>
  <script src="js/materialize.min.js"></script>

  <!-- <script src="js/closepwa.js"></script> -->
  <script>
    // REGISTER SERVICE WORKER
    // if ("serviceWorker" in navigator) {
    //   window.addEventListener("load", function() {
    //     navigator.serviceWorker
    //       .register("service-worker.js")
    //       .then(function() {
    //         console.log("Pendaftaran ServiceWorker berhasil");
    //       })
    //       .catch(function() {
    //         console.log("Pendaftaran ServiceWorker gagal");
    //       });
    //   });
    // } else {
    //   console.log("ServiceWorker belum didukung browser ini.");
    // }
    if (navigator.serviceWorker) {
      navigator.serviceWorker.register('service-worker.js').then(function(registration) {
        console.log('ServiceWorker registration successful with scope:',  registration.scope);
      }).catch(function(error) {
        console.log('ServiceWorker registration failed:', error);
      });
    }
  </script>

  <script type="text/javascript">
  $("#submit").click(function( event ) {
  
  if ($('#title').val() == "" || $('#title').val() == undefined) {
    M.toast({html: 'Title Kosong, Mohon diisi terlebih dahulu!', classes: 'rounded'});
    return false;
  }
  if ($('#content').val() == "" || $('#content').val() == undefined) {
    M.toast({html: 'Content Kosong, Mohon diisi terlebih dahulu!', classes: 'rounded'});
    return false;
  }

  event.preventDefault();
  $.ajax({
    type: 'get',
    url: "/pwa/php/update.php?id="+$('#id').val()+"&title="+$('#title').val()+'&content='+$('#content').val(),
    dataType: 'json',
    success : function(response){
      if (response == "sukses") {        
        M.toast({html: 'Data Berhasil Disimpan!', classes: 'rounded'});
        setTimeout(function() {
          window.location.href = window.location.origin + '/pwa/layout.html'
        }, 1000);
      }
    }
  });
  });
  </script>
  <script type="text/javascript">
    function clearform(){
      $('.clear').val('');
    }
  </script>
</body>
</html>
