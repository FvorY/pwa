  // Load page content
  var page = window.location.hash.substr(1);
  if (page == "") page = "home";
  loadPage(page);

  function loadPage(page) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4) {
        var content = document.querySelector("#body-content");
        if (this.status == 200) {
          content.innerHTML = xhttp.responseText;
        } else if (this.status == 404) {
          content.innerHTML = "<p>Halaman tidak ditemukan.</p>";
        } else {
          content.innerHTML = "<p>Ups.. halaman tidak dapat diakses.</p>";
        }
      }
    };
    xhttp.open("GET", "pages/" + page + ".html", true);
    xhttp.send();

    if (localStorage['menu'] == '#home') {
      setTimeout(function () {
        //Vue
    Vue.component('data-list', {
      template: '<div class="row">'+
                 '<div class="col s12 m6" v-for="todo in data">'+
                   '<div class="card #006064 cyan darken-4">'+
                     '<div class="card-content white-text">'+
                       '<span class="card-title">{{todo.title}}</span>'+
                       '<p>{{todo.content}}</p>'+
                     '</div>'+
                     '<div class="card-action">'+
                       '<a href="#" onclick="editdata(this)" v-bind:data-id="todo.id"><em class="fa fa-pencil"></em> Edit</a>'+
                       '<a href="#" onclick="deletedata(this)" v-bind:data-id="todo.id"><em class="fa fa-trash"></em> Delete</a>'+
                     '</div>'+
                   '</div>'+
                 '</div>'+
               '</div>',
      props: ['data']
    });

    Vue.component('button-add', {
        template: '<a onclick="window.location.href = window.location.origin + \''+"/pwa/forminput.html"+'\'" class="waves-effect waves-light btn" style="margin-top:50%; background-color:#1A6697;">Add <i class="fa fa-plus"></i></a>',
        // props: ['linkform']
      });
          vue = new Vue({
             el: '#app',
             data: {
               data: "",
               search: "",
             },
             mounted() {
               if (localStorage['menu'] == '#home') {
                 setTimeout(function () {
                   vue.getdata();
                 }, 1);
               }
             },
             methods: {
               getdata: function(){
                 axios.get('/pwa/php/show.php')
                  .then(function (response) {
                    vue.data = response.data;
                  })
                  .catch(function (error) {
                    console.log(error);
                  })
               },
               getsearch : function(){
                 axios.get('/pwa/php/search.php?search='+vue.search)
                  .then(function (response) {
                    vue.data = response.data;
                  })
                  .catch(function (error) {
                    console.log(error);
                  })
               },
               deletedata : function(id){
                alert(id);
               }
             },
             computed: {

             }
          })
      }, 1000);
    }
  }
  
