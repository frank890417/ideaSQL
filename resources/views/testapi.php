

<!DOCTYPE html>
<html >

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="https://production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
  <link rel="mask-icon" type="" href="https://production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
  <title>CodePen - ideaSQL</title>
  
  
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>

      <style>
      html, body {
  width: 100%;
}

.conatiner {
  width: 100%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  padding-top: 20px;
  margin-top: 150px;
}

.inputarea {
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #fff;
  z-index: 100;
}

.block {
  border: solid 1px;
  background-size: cover;
  font-size: 14px;
  line-height: 28px;
  letter-spacing: 1px;
  width: 250px;
  height: 250px;
  display: inline-block;
  color: rgba(255, 255, 255, 0.3);
  -webkit-transition: 0.5s;
  transition: 0.5s;
  padding: 20px;
  position: relative;
  cursor: pointer;
  background-position: center center;
  background-size: 100% auto;
}
.block:hover {
  color: rgba(255, 255, 255, 0.8);
  background-size: 110% auto;
}
.block:hover .mask {
  opacity: 0.9;
}
.block span {
  position: absolute;
  z-index: 5;
  width: 80%;
  width: calc(100% - 40px);
}
.block .mask {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  opacity: 0;
  mix-blend-mode: add;
}

.inputarea {
  -ms-grid-column: span 10;
      grid-column: span 10;
  padding: 25px;
}

    </style>

  
  
  
  
</head>

<body translate="no" >

  
<div class="wrapper" id="app">
  <div class="inputarea">
    <h4>關鍵字 ( {{filtered_post.length}} / {{pictures.length}} 筆資料 - API 網址：「 http://designav.io/api/image 」)</h4>
    <input class="form-control" v-model="filter" placeholder="請輸入關鍵字（以空白間隔）"/>
    <label>顯示數量 {{show_num}}：</label>
    <label>20
      <input type="radio" name="show_num" v-model="show_num" value="20"/>
    </label>
    <label>50
      <input type="radio" name="show_num" v-model="show_num" value="50"/>
    </label>
    <label>100
      <input type="radio" name="show_num" v-model="show_num" value="100"/>
    </label>
    <label>200
      <input type="radio" name="show_num" v-model="show_num" value="200"/>
    </label>
    <label>1000
      <input type="radio" name="show_num" v-model="show_num" value="1000"/>
    </label>
  </div>
  <div class="conatiner">
    <h2 v-if="!pictures.length">資料載入中</h2>
    <div class="block" v-for="(p,id) in filtered_post.slice(0,show_num)" v-bind:style="'background-image: url('+p.img_link+')'" v-bind:id="'img_'+id" :title="p.content"> <span>{{p.content.substr(0,70)}}</span>
      <div class="mask" v-bind:style="'background-color:rgb('+p.color_r+','+p.color_g+','+p.color_b+')'"></div>
    </div>
  </div>
</div>
  
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

    <script>
    var apiurl="/api/image/";
var vm = new Vue({
  el: "#app"
  ,computed: {
    filtered_post: function (){
      var vobj=this;
      var filter_split= this.filter.split(" ");
      console.log(filter_split);
      return this.pictures.filter(
        function(img){
          if (vobj.filter==""){
            return true
          }
          var flag=true;
          filter_split.forEach(function(f){
            if (f!=""){
               if (img.content.indexOf(f)==-1){
                 flag=false;
               }
            }
          });
          
          return flag;
        }
      );
    },
    splited_filter: function(){
      return this.filter.split(",");
    }
  },
  methods: {
    date_sec: function(txt){
      return (new Date).clearTime()
          .addSeconds(parseInt(txt))
          .toString('H:mm:ss');
    },
    get_color: (url)=>{
      // var url = 'http://lorempixel.com/g/400/200/';
      var imgObj = new Image();
      imgObj.src = url;
      imgObj.setAttribute('crossOrigin', '');
      var canvas = document.createElement('canvas');
      canvas.width = imgObj.width;
      canvas.height = imgObj.height;
      canvas.getContext('2d').drawImage(imgObj, 0, 0, imgObj.width, imgObj.height);
      var pixelData = canvas.getContext('2d').getImageData(100, 100, 1, 1).data;
      return pixelData[0]+","+pixelData[1]+","+pixelData[2];
    }
  },
  data: {
    filter: "",
    time_rank: 1,
    show_num: 50,
    pictures: []
  },
  mounted: function () {
    var vobj=this;
    $.ajax({
      url: apiurl,
      dataType: "json",
      success: function(res){
         // alert(res);
        Vue.set(vobj,"pictures",res);
      }
    });  
  }
});
  </script>

  
  

</body>
</html>
 