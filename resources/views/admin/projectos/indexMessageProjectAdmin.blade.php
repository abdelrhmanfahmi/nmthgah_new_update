@extends('admin.index')
@section('main')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
.modalIndicator {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 9999; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  
  /* Modal Content/Box */
  .modal-contentIndicator {
    background-color: #fefefe;
    margin: 30% auto;
    /* padding: 30px; */
    /* border: 1px solid #888; */
    width: 55%;
    height: 265px;
    border-radius: 20px;
    margin-top: 170px;
  }
  #pModalIndicatorBox{
      position:relative;
      right:130px;
      top:50px;
      font-size:20px;
      
  }
  
  /* The Close Button */
  .closeIndicator {
    color: rgb(223, 16, 16);
    float: right;
    position: relative;
    bottom: 10px;
    left: -5px;
    font-size: 28px;
    font-weight: bold;
  }
  
  .closeIndicator:hover,
  .closeIndicator:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
  
  .bords{
      height:200px;
  }

.filesss {
    border: 2px dashed goldenrod;
    width: 630px;
    /* margin-right: 5px; */
    padding: 20px;
    position: relative;
    right: 35px;
    top: 30px;
    height: 170px;
    border-radius: 10px;
    cursor: pointer;
}
#uploadWaqf{
    color:goldenrod;
    position:relative;
    top: 65px;
    right: 210px;
}
#imgFileUpload{
    position:relative;
    right:265px;
    top:40px;
}
input[type="file"] {

     display:block;
    }
    .imageThumb {
     height: 45px;
     border: 0.5px solid goldenrod;
     padding: 1px;
     width:45px;
     
     }
     .pip{
         position:relative;
         top: -130px;
         right: 40px;
         display:inline-block;
         padding:5px;
     }
     .remove{
         font-size:18px;
         cursor:pointer;
     }

.textareaMessage textarea{
    height:59px;
    position:relative;
    width:710px;
    font-size:26px;
    resize:none;
    border:none;
    left:29px;
    top:99px;
    color:#919191;
}
.textareaMessage textarea::placeholder{
    text-align:center;
    font-size:20px;
    color:#CCCCCC;
    position:relative;
    top:15px;
    left:240px;
    outline:0;
}
.form-control{
    box-shadow:0px -5px 10px rgba(0,0,0,0.05);
}
.textareaMessage .img1{
    background-color: #919191;
    position: relative;
    right: 681px;
    bottom: -35px;
    width: 66px;
    height: 59px;
    padding: 22px;
}
.textareaMessage .img2{
    background-color: goldenrod;
    position: relative;
    right: 32px;
    bottom: -99px;
    padding: 22px;
    height: 59px;
    width: 74px;
}

.firstDownMessagesAdmin{
    position:relative;
    top:145px;
    right:490px;
    font-size:22px;
    color:goldenrod;
    z-index:1;
}

.secondDownAdmin{
    position:relative;
    top: 145px;
    right:490px;
    font-size:22px;
    color:goldenrod;
    z-index: 1;
}
.downloadSpan1Admin{
    position:relative;
    top: 140px;
    right: 420px;
    font-size:18px;
    z-index: 1;
    color:goldenrod;
}

.downloadSpan2Admin{
    position:relative;
    top: 140px;
    right: 420px;
    font-size:18px;
    z-index: 1;
    color:goldenrod;
}

.firstDownMessages{
    position:relative;
    top:155px;
    right:-140px;
    font-size:22px;
    color:goldenrod;
    z-index:1;
}

.secondDown{
    position:relative;
    top: 160px;
    right:-150px;
    font-size:22px;
    color:goldenrod;
    z-index: 1;
}
.downloadSpan1{
    position:relative;
    top: 150px;
    right: -210px;
    font-size:18px;
    z-index: 1;
    color:goldenrod;
}

.downloadSpan2{
    position:relative;
    top: 160px;
    right: -230px;
    font-size:18px;
    z-index: 1;
    color:goldenrod;
}
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px #fff; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #ddd; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #CCCCCC; 
}

.containers{
    margin: 0 auto;
    padding: 0 20px;
    max-width:950px;
    height:300px;
    position:relative;
    right:35px;
    overflow-y: scroll;
    overflow-x: hidden;
}
.messages {
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.messages p{
  float:left;
  border:none;
  border-radius: 5px 20px 5px;
  padding: 10px;
  margin: 10px 0;
  background-color:#F7F7F7;
  color:#9d9b9b;
  width:308px;
}
.darkerMessages .pFirstMessages{
    position:relative;
    height:180px;
}
.darkerMessages .pSecondMessages{
    position:relative;
    height:180px;
}

.darkerMessages {
  border-color: #ccc;
}
.darkerMessages p{
  float:right;
  background-color:#F7F7F7;
  color:#9d9b9b;
}
.messages::after {
  content: "";
  clear: both;
  display: table;
}

.messages img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.messages img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.messages img.imgRightMessages{
    position: relative;
    max-width: 400px;
    height: 120px;
    border-radius: 5px 20px 5px;
}
.messages embed.imgRightMessages2{
    position: relative;
    width: 290px;
    height: 120px;
    border-radius: 0%;
}

.time-right {
  float: right;
  color: #aaa;
  position:relative;
  top:60px;
  left:-160px;
}

.newTimeRight{
    position:relative;
    top:60px;
}

.time-left {
  float: left;
  color: #999;
  position:relative;
  top:40px;
  right:-160px;
}
.messages-form{
    background: #fff;
    padding: 30px;
    height: 490px;
    width:850px;
    position:relative;
    right:50px;
}
 #buttonUploadImageMessages{
    position: relative;
    background-color: goldenrod;
    color: white;
    right: 180px;
    top: 20px;
    width: 300px;
    border-radius: 20px;
    outline: 0;
    border: none;
  }
  #buttonUploadImageMessages:hover{
      background-color:white;
      color:goldenrod;
  }
  @media screen and (min-width:1025px) and (max-width:1200px) {
      .filesss{
          width:600px;
      }
      .pip{
          padding:7px;
      }
  }
  @media only screen and (width: 1024px){
      .messages-form{
    background: #fff;
    padding: 30px;
    height: 650px;
    width:890px;
    position:relative;
    right:-70px;
    box-shadow: 3px 3px 5px 3px rgba(232,232,232,0.3);
}

#buttonUploadImageMessages{
      position:relative;
      background-color:goldenrod;
      right: 60px;
      top: 30px;
      padding:10px;
      width: 400px;
      border-radius: 20px;
      outline:0;
      border:none;
  }
.borda {
        height:200px;
    }
    
    .filesss {
       border: 2px dashed goldenrod;
       width: 470px;
       padding: 20px;
       position: relative;
       top: 10px;
       height: 190px;
       border-radius: 10px;
       cursor: pointer;
    }
    .pip{
        padding:10px;
        top:-180px;
    }
    #imgFileUpload{
        right:190px;
    }
    #uploadWaqf{
        position:relative;
        top: 70px;
        right: 130px;
    }
.modalIndicator {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 9999; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  
  /* Modal Content/Box */
  .modal-contentIndicator {
    background-color: #fefefe;
    margin: 30% auto; /* 15% from the top and centered */
    padding: 30px;
    border: 1px solid #888;
    width: 60%; /* Could be more or less, depending on screen size */
    height:320px;
    border-radius:20px;
    margin-top:170px;
  }
  
  
  /* The Close Button */
  .closeIndicator {
    color: rgb(223, 16, 16);
    float: right;
    position:relative;
    bottom:34px;
    left:17px;
    font-size: 28px;
    font-weight: bold;
  }

.btnProjectManager7 button{
    border:2px solid goldenrod;
    border-radius:50px;
    width:150px;
    height:40px;
    color:#fff;
    background:goldenrod;
    transition: all .5s;
    outline:0;
    position:relative;
    left:0px;
    top:20px;
}


.containers{
    margin: 0 auto;
    padding: 0 20px;
    width:690px;
    height:500px;
    position:relative;
    right:90px;
    bottom:0px;
    overflow-y: scroll;
    overflow-x: hidden;
}

.messages {
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.messages p{
  float:left;
  border:none;
  border-radius: 5px 20px 5px;
  padding: 10px;
  margin: 10px 0;
  background-color:#F7F7F7;
  color:#CCCCCC;
  width:450px;
  font-family:'cr';
}
.darkerMessages {
  border-color: #ccc;
}
.darkerMessages p{
  float:right;
  background-color:#F7F7F7;
  color:#CCCCCC;
}

.messages embed.imgRightMessages2{
    width:430px;
}
.messages::after {
  content: "";
  clear: both;
  display: table;
}

.messages img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.messages img.right {
  float: right;
  position:relative;
  left:30px;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
  position:relative;
  top:40px;
  left:-5px;
}

.time-left {
  float: left;
  color: #999;
  position:relative;
  top:40px;
  right:-5px;
}
.allformsInOne{
    position:relative;
    width:700px;
    height:100px;
    bottom:670px;
}
.textareaMessage textarea{
    height:59px;
    position:relative;
    width:730px;
    resize:none;
    border:none;
    right:20px;
    top:60px;
    color:#919191;
}
.textareaMessage textarea::placeholder{
    text-align:center;
    font-size:20px;
    color:#CCCCCC;
    font-family:'cr';
    position:relative;
    top:15px;
    left:10px;
    outline:0;
}
.form-control{
    box-shadow:0px -5px 10px rgba(0,0,0,0.05);
}
.textareaMessage .img1{
    background-color: #919191;
    position: relative;
    right: 740px;
    top: -6px;
    width: 61.7px;
    height: 59px;
    padding: 18px;
}
.textareaMessage .img2{
    background-color: goldenrod;
    position: relative;
    right: 65px;
    top: 58px;
    padding: 19px;
    height: 59.4px;
    width: 64px;
}
.firstDownMessagesAdmin{
        right:310px;
    }
    
    .secondDownAdmin{
        right:310px;
    }
    .downloadSpan1Admin{
        right:230px;
    }
    
    .downloadSpan2Admin{
        right:235px;
    }
.firstDownMessagesManager{
    position:relative;
    top:145px;
    right:440px;
    font-size:22px;
    color:goldenrod;
    z-index:1;
}

.secondDownManager{
    position:relative;
    top: 145px;
    right:650px;
    font-size:22px;
    color:goldenrod;
    z-index: 1;
}
.downloadSpan1Manager{
    position:relative;
    top: 140px;
    right: 360px;
    font-size:18px;
    z-index: 1;
    color:goldenrod;
}

.downloadSpan2Manager{
    position:relative;
    top: 140px;
    right: 570px;
    font-size:18px;
    z-index: 1;
    color:goldenrod;
}

.firstDownMessages{
    position:relative;
    top:145px;
    right:-150px;
    font-size:22px;
    color:goldenrod;
    z-index:2;
}

.secondDown{
    position:relative;
    top: 145px;
    right:-150px;
    font-size:22px;
    color:goldenrod;
    z-index: 2;
}
.downloadSpan1{
    position:relative;
    top: 145px;
    right: -230px;
    font-size:18px;
    z-index: 2;
    color:goldenrod;
}

.downloadSpan2{
    position:relative;
    top: 145px;
    right: -230px;
    font-size:18px;
    z-index: 2;
    color:goldenrod;
}

.imageThumb{
        width:50px;
    }
    .ImageCenterMessages{
        position:relative;
        right:140px;
    }
  }
  @media screen and (min-width:600px) and (max-width:991px) {
      .messages-form{
    background: #fff;
    padding: 30px;
    height: 650px;
    width:690px;
    position:relative;
    right:-20px;
    box-shadow: 3px 3px 5px 3px rgba(232,232,232,0.3);
}

  #buttonUploadImageMessages{
      position:relative;
      background-color:goldenrod;
      right: 65px;
      top: 30px;
      padding:10px;
      width: 300px;
      border-radius: 20px;
      outline:0;
      border:none;
  }
  
    .pip{
        top:-150px;
        padding:3px;
        right:40px;
    }
.bords {
        height:180px;
    }
    
    .filesss {
       border: 2px dashed goldenrod;
       width: 400px;
       padding: 20px;
       right:20px;
       position: relative;
       top: 10px;
       height: 170px;
       border-radius: 10px;
       cursor: pointer;
    }
    #imgFileUpload{
        right:160px;
    }
    #uploadWaqf{
        position:relative;
        top: 70px;
        right: 95px;
    }
   

.modalIndicator {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 9999; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  
  /* Modal Content/Box */
  .modal-contentIndicator {
    background-color: #fefefe;
    margin: 30% auto; /* 15% from the top and centered */
    padding: 30px;
    border: 1px solid #888;
    width: 70%; /* Could be more or less, depending on screen size */
    height:340px;
    border-radius:20px;
    margin-top:170px;
  }
  
  
  /* The Close Button */
  .closeIndicator {
    color: rgb(223, 16, 16);
    float: right;
    position:relative;
    bottom:34px;
    left:17px;
    font-size: 28px;
    font-weight: bold;
  }

.btnProjectManager7 button{
    border:2px solid goldenrod;
    border-radius:50px;
    width:150px;
    height:40px;
    color:#fff;
    background:goldenrod;
    transition: all .5s;
    outline:0;
    position:relative;
    left:0px;
    top:20px;
}


.containers{
    margin: 0 auto;
    padding: 0 20px;
    width:520px;
    height:500px;
    position:relative;
    right:55px;
    bottom:0px;
    overflow-y: scroll;
    overflow-x: hidden;
}

.messages {
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.messages p{
  float:left;
  border:none;
  border-radius: 5px 20px 5px;
  padding: 10px;
  margin: 10px 0;
  background-color:#F7F7F7;
  color:#CCCCCC;
  width:450px;
  font-family:'cr';
}
.messages embed.imgRightMessages2{
    width:430px;
}
.darkerMessages {
  border-color: #ccc;
}
.darkerMessages p{
  float:right;
  background-color:#F7F7F7;
  color:#CCCCCC;
}
.messages::after {
  content: "";
  clear: both;
  display: table;
}

.messages img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.messages img.right {
  float: right;
  position:relative;
  left:30px;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
  position:relative;
  top:40px;
  left:-5px;
}

.time-left {
  float: left;
  color: #999;
  position:relative;
  top:40px;
  right:-5px;
}
.allformsInOne{
    position:relative;
    width:700px;
    height:100px;
    bottom:670px;
}
.textareaMessage textarea{
    height:59px;
    position:relative;
    width:580px;
    resize:none;
    border:none;
    right:-25px;
    top:60px;
    color:#919191;
}
.textareaMessage textarea::placeholder{
    text-align:center;
    font-size:20px;
    color:#CCCCCC;
    font-family:'cr';
    position:relative;
    top:15px;
    left:10px;
    outline:0;
}
.form-control{
    box-shadow:0px -5px 10px rgba(0,0,0,0.05);
}
.textareaMessage .img1{
    background-color:#919191;
    position:relative;
    right:550px;
    top:-68px;
    width:51px;
    height:59px;
    padding:17px;
}
.textareaMessage .img2{
    background-color: goldenrod;
    position: relative;
    right: 600px;
    top: -5px;
    padding: 19px;
    height: 59px;
    width: 51px;
}
.firstDownMessagesAdmin{
        right:230px;
        top:200px;
    }
    
    .secondDownAdmin{
        right:230px;
        top:200px;
    }
    .downloadSpan1Admin{
        right:150px;
        top:199px;
    }
    
    .downloadSpan2Admin{
        right:160px;
        top:200px;
    }
.firstDownMessagesManager{
    position:relative;
    top:202px;
    right:240px;
    font-size:22px;
    color:goldenrod;
    z-index:1;
}

.secondDownManager{
    position:relative;
    top: 145px;
    right:650px;
    font-size:22px;
    color:goldenrod;
    z-index: 1;
}
.downloadSpan1Manager{
    position:relative;
    top: 200px;
    right: 160px;
    font-size:18px;
    z-index: 1;
    color:goldenrod;
}

.downloadSpan2Manager{
    position:relative;
    top: 140px;
    right: 570px;
    font-size:18px;
    z-index: 1;
    color:goldenrod;
}

.firstDownMessages{
    position:relative;
    top: 200px;
    right:165px;
    font-size:22px;
    color:goldenrod;
    z-index:2;
}

.secondDown{
    position:relative;
    top: 183px;
    right:165px;
    font-size:22px;
    color:goldenrod;
    z-index: 2;
}
.downloadSpan1{
    position:relative;
    top: 200px;
    right: 90px;
    font-size:18px;
    z-index: 2;
    color:goldenrod;
}

.downloadSpan2{
    position:relative;
    top: 180px;
    right: 90px;
    font-size:18px;
    z-index: 2;
    color:goldenrod;
}

.imageThumb{
        width:50px;
    }
    .ImageCenterMessages{
        position:relative;
        right:120px;
    }
  }
  
  @media (max-width: 500px){
    .messages-form{
    background: #fff;
    padding: 30px;
    height: 650px;
    width:350px;
    position:relative;
    right:-10px;
    box-shadow: 3px 3px 5px 3px rgba(232,232,232,0.3);
}
#buttonUploadImageMessages{
      position:relative;
      background-color:goldenrod;
      right: 15px;
      top: 110px;
      width: 200px;
      border-radius: 20px;
      outline:0;
      border:none;
  }

    .bords{
      height:95px;
    }
    
    .filesss {
       border: 2px dashed goldenrod;
       width: 230px;
       padding: 20px;
       right:0px;
       position: relative;
       top: 10px;
       height: 170px;
       border-radius: 10px;
       cursor: pointer;
    }
    .pip{
        position:relative;
        right:10px;
        padding:0px;
        top:-150px;
    }
    #imgFileUpload{
       right:80px;
    }
    #uploadWaqf{
        position:relative;
        right:20px;
        top:70px;
    }
.modalIndicator {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 9999; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  
  /* Modal Content/Box */
  .modal-contentIndicator {
    background-color: #fefefe;
    margin: 30% auto; /* 15% from the top and centered */
    padding: 30px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
    height:310px;
    border-radius:20px;
    margin-top:170px;
  }
  
  
  /* The Close Button */
  .closeIndicator {
    color: rgb(223, 16, 16);
    float: right;
    position:relative;
    bottom:34px;
    left:17px;
    font-size: 28px;
    font-weight: bold;
  }

.btnProjectManager7 button{
    border:2px solid goldenrod;
    border-radius:50px;
    width:90px;
    height:40px;
    color:#fff;
    background:goldenrod;
    transition: all .5s;
    outline:0;
    position:relative;
    left:13px;
    top:20px;
}


.containers{
    margin: 0 auto;
    padding: 0 20px;
    width:270px;
    height:420px;
    position:relative;
    right:20px;
    bottom:0px;
    overflow-y: scroll;
    overflow-x: hidden;
}

.messages {
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.messages p{
  float:left;
  border:none;
  border-radius: 5px 20px 5px;
  padding: 10px;
  margin: 10px 0;
  background-color:#F7F7F7;
  color:#CCCCCC;
  width:130px;
  font-family:'cr';
}
.darkerMessages {
  border-color: #ccc;
}
.darkerMessages p{
  float:right;
  background-color:#F7F7F7;
  color:#CCCCCC;
}
.darkerMessages embed.imgRightMessages2{
    width:110px;
}
.messages::after {
  content: "";
  clear: both;
  display: table;
}

.messages img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.messages img.right {
  float: right;
  position:relative;
  left:30px;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
  position:relative;
  top:55px;
  left:-5px;
  width:150px;
}

.time-left {
  float: left;
  color: #999;
  position:relative;
  top:40px;
  right:-5px;
}
.allformsInOne{
    position:relative;
    width:700px;
    height:100px;
    bottom:670px;
}
.textareaMessage textarea{
    height: 59px;
    position: relative;
    width: 250px;
    resize: none;
    border: none;
    right: -25px;
    top: 120px;
    color: #919191;
}
.textareaMessage textarea::placeholder{
    text-align:center;
    font-size:20px;
    color:#CCCCCC;
    font-family:'cr';
    position:relative;
    top:15px;
    left:10px;
    outline:0;
}
.form-control{
    box-shadow:0px -5px 10px rgba(0,0,0,0.05);
}
.textareaMessage .img1{
    background-color: #919191;
    position: relative;
    right: 220px;
    bottom: 7px;
    width: 51px;
    height: 59px;
    padding: 18px;
}
.textareaMessage .img2{
    background-color: goldenrod;
    position: relative;
    right: 270px;
    top: 57px;
    padding: 18px;
    height: 59px;
    width: 46px;
}
.firstDownMessagesAdmin{
        right: 140px;
        top: 202px;
    }
    
    .secondDownAdmin{
        right: 140px;
        top: 202px;
    }
    .downloadSpan1Admin{
        right: 60px;
        top: 200px;
    }
    
    .downloadSpan2Admin{
        right: 60px;
        top: 200px;
    }
.firstDownMessagesManager{
        right: 120px;
        top: 210px;
    }
    
    .secondDownManager{
        right: 140px;
        top: 202px;
    }
    .downloadSpan1Manager{
        right: 40px;
        top: 210px;
    }
    
    .downloadSpan2Manager{
        right: 60px;
        top: 200px;
    }
    .firstDownMessages{
        position:relative;
        right: 5px;
        top: 215px;
    }
    .downloadSpan1{
        position:relative;
        top: 215px;
        right: -70px;
    }
    
    .downloadSpan2{
        position:relative;
        top: 220px;
        right: -70px;
    }
    .secondDown{
        position:relative;
        right: 5px;
        top: 220px;
    }

    .imageThumb{
        width:30px;
    }
    .ImageCenterMessages{
        position:relative;
        right: 70px;
        top: 40px;
    }
}
@media only screen and (width: 360px){
    .messages-form{
        right:-20px;
    }
}
@media only screen and (width :375px){
    #buttonUploadImageMessages{
        right:30px;
    }
}
@media only screen and (width: 393px){
    
}
@media only screen and (width: 411px){
    .filesss{
        right:20px;
    }
    .pip{
        right:30px;
    }
    #buttonUploadImageMessages{
        right:30px;
    }
}
@media only screen and (width: 412px){
    
}
@media only screen and (width: 414px){
    
}
@media only screen and (width: 320px){
    .messages-form{
        background: #fff;
        padding: 30px;
        height: 590px;
        width:300px;
        position:relative;
        right:-20px;
    }
   .rowReduce{
        width:300px;
    }
    .borda {
        height:70px;
    }
    
    .filesss {
       border: 2px dashed goldenrod;
       width: 195px;
       /*margin-right: 5px;*/
       padding: 20px;
       position: relative;
       top: 10px;
       height: 170px;
       border-radius: 10px;
       cursor: pointer;
    }
    
    #buttonUploadImageMessages{
        right:0px;
    }
    
    .ImageCenterMessages{
        position:relative;
        right:45px;
    }
    #imgFileUpload{
        right:60px;
    }
    #uploadWaqf{
        position:relative;
        right:-10px;
    }
    
    .containers{
        margin: 0 auto;
        padding: 0 20px;
        max-width:250px;
        height:450px;
        position:relative;
        right:10px;
        overflow-y: scroll;
        overflow-x: hidden;
    }

    .messages {
      border-radius: 5px;
      padding: 10px;
      margin: 10px 0;
      position:relative;
      left:10px;
    }
    
    .messages p{
      float:left;
      border:none;
      border-radius: 5px 20px 5px;
      padding: 10px;
      margin: 10px 0;
      background-color:#F7F7F7;
      width:150px;
      font-family:'cr';
    }
    .darkerMessages {
      border-color: #ccc;
      position:relative;
      right:0px;
    }
    .darkerMessages p{
      float:right;
      background-color:#F7F7F7;
      width:150px;
    }
    .messages::after {
      content: "";
      clear: both;
      display: table;
    }
    
    .messages img {
      float: left;
      max-width: 60px;
      width: 100%;
      margin-right: 20px;
      border-radius: 50%;
    }
    
    .messages .imgRightMessages{
        width:130px;
    }
    
    .messages img.right {
      float: right;
      margin-left: 20px;
      margin-right:0;
    }
    
    .messages embed.imgRightMessages2{
        width:130px;
    }
    .time-right {
      float: right;
      color: #aaa;
      position:relative;
      top:60px;
      left:-40px;
    }
    
    .time-left {
      float: left;
      color: #999;
      position:relative;
      top:40px;
      right:-40px;
    }
    .textareaMessage textarea{
        height:55px;
        position:relative;
        width:190px;
        resize:none;
        border:none;
        top:50px;
        left:26px;
        color:#919191;
    }
    .textareaMessage textarea::placeholder{
        text-align:center;
        font-size:20px;
        color:#CCCCCC;
        font-family:'cr';
        position:relative;
        top:15px;
        left:20px;
        outline:0;
    }
    
    .textareaMessage .img1{
        background-color:#919191;
        position:relative;
        right:165px;
        bottom:70px;
        padding:18px;
        width:55px;
    }
    .textareaMessage .img2{
        background-color:goldenrod;
        position:relative;
        right:220px;
        top:-6px;
        width:49px;
        padding:19px;
    }
    
    .downloadSpan1Admin{
        right:10px;
    }
    .firstDownMessagesAdmin{
        right:90px;
    }
    .downloadSpan2Admin{
        right:20px;
        top:210px;
    }
    .secondDownAdmin{
        right:100px;
        top:205px;
    }
    .downloadSpan2{
        top:207px;
        right:0px;
    }
    .secondDown{
        right:80px;
        top:205px;
    }
    .pip{
        padding:1px;
    }
    .imageThumb{
        width:22px;
        height:30px;
    }
}
</style>
</head>
@if ($errors->any())
    <div class="alert alert-danger" id="scripts">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="messages-form">
    <div class="col-md-12 containers" id="containers">
        @foreach($messageAdminProject as $msg)
        @if($msg->isAdmin == 1)
        <div class="messages">
            <img src="{{asset('assets/images/Group 3291.png')}}" class="imgAdmin" alt="Avatar">
            <!--<p>أهلا بك في نمذجة .. يمكنك ترك رسالتك وسوف نقوم بالرد عليك في أقرب وقت:)<span class="time-left">11:03pm|2020/06/21</span></p>-->
            @if($msg->message != null)
            <p>{{$msg->message}} <span class="time-right">{{$msg->created_at}}</span></p>
            @else
            
            @endif
            
            @if($msg->files != null)
            @if(pathinfo($msg->files, PATHINFO_EXTENSION) == 'pdf')
                <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="secondDownAdmin mdi mdi-download"></i> </a><span class="downloadSpan2Admin">تحميل</span> <p class="pSecondMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><embed class="imgRightMessages2" src="{{asset('uploads/' . $msg->files)}}" /> </a> <span class="time-right">{{$msg->created_at}}</span></p>
            @elseif(pathinfo($msg->files, PATHINFO_EXTENSION) == 'docx' || pathinfo($msg->files, PATHINFO_EXTENSION) == 'doc')
                <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="firstDownMessagesAdmin mdi mdi-download"></i> </a><span class="downloadSpan1Admin">تحميل</span> <p class="pFirstMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('assets/images/wordForPreview.jpg')}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
            @elseif(pathinfo($msg->files, PATHINFO_EXTENSION) == 'pptx' || pathinfo($msg->files, PATHINFO_EXTENSION) == 'ppt')
                <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="firstDownMessagesAdmin mdi mdi-download"></i> </a><span class="downloadSpan1Admin">تحميل</span> <p class="pFirstMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('assets/images/pptxForPreview.jpg')}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
            @else
                <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="firstDownMessagesAdmin mdi mdi-download"></i> </a><span class="downloadSpan1Admin">تحميل</span> <p class="pFirstMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('uploads/' . $msg->files)}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
            @endif
            @else
            
            @endif
        </div>
        @else
        <div class="messages darkerMessages">
            <img src="{{asset('assets/images/Group 3292.png')}}" alt="Avatar" class="right imgUser">
            @if($msg->message != null)
            <p>{{$msg->message}} <span class="time-right">{{$msg->created_at}}</span></p>
            @else
            
            @endif
            
            @if($msg->files != null)
            @if(pathinfo($msg->files, PATHINFO_EXTENSION) == 'pdf')
                <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="secondDown mdi mdi-download"></i> </a><span class="downloadSpan2">تحميل</span> <p class="pSecondMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><embed class="imgRightMessages2" src="{{asset('uploads/' . $msg->files)}}" /> </a> <span class="time-right">{{$msg->created_at}}</span></p>
            @elseif(pathinfo($msg->files, PATHINFO_EXTENSION) == 'docx' || pathinfo($msg->files, PATHINFO_EXTENSION) == 'doc')
                <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="firstDownMessages mdi mdi-download"></i> </a><span class="downloadSpan1">تحميل</span> <p class="pFirstMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('assets/images/wordForPreview.jpg')}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
            @elseif(pathinfo($msg->files, PATHINFO_EXTENSION) == 'pptx' || pathinfo($msg->files, PATHINFO_EXTENSION) == 'ppt')
                <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="firstDownMessages mdi mdi-download"></i> </a><span class="downloadSpan1">تحميل</span> <p class="pFirstMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('assets/images/pptxForPreview.jpg')}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
            @else
                <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="firstDownMessages mdi mdi-download"></i> </a><span class="downloadSpan1">تحميل</span> <p class="pFirstMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('uploads/' . $msg->files)}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
            @endif
            @else
            
            @endif
        </div>
        @endif
        @endforeach
        
    </div>
    <div class="row">
        <div class="col-md-12 textareaMessage">
            <form action="{{route('ProjectStoreMsg2')}}" id="myFormID" method="POST">
                @csrf
                <!--<img src="{{asset('assets/images/ic_send_24px.png')}}" class="img2">-->
                <textarea name="message" id="textareaMessageId" class="form-control" rows="1" cols="50" wrap="physical" placeholder="اكتب مراسلتك هنا..."></textarea>
                <input type="hidden" name="projectos_id" value="{{request()->id1}}">
                <input type="hidden" name="request_id" value="{{request()->id2}}">
                <input type="hidden" name="project_manager_id" value="{{request()->id3}}">
                <input type="image" id="imageForDisabled" disabled src="{{asset('assets/images/ic_send_24px.png')}}" class="img2">
            </form>
            <img src="{{asset('assets/images/ic_link_24px.png')}}" style="cursor:pointer" id="img1FileUploadMessages11" class="img1">
        </div>
    </div>
    <div id="myModalIndicator" class="modalIndicator">
        <div class="modal-contentIndicator">
            <span class="closeIndicator">&times;</span>
                <form id="registerFilesHere3" enctype="multipart/form-data">
                    @csrf
                    <div class="bords">
                        <div class="filesss" id="files">
                            <input type="file" onclick="removePreviousImages(this)" id="imgInp" accept="image/jpg,image/jpeg,image/png,.doc, .docx,.ppt, .pptx,.pdf" style="width: 0px;height:0px;overflow: hidden;" name="files[]" multiple />
                            <img src="{{asset('assets/images/Namthga-05.png')}}" id="imgFileUpload" width="30px" height="30px" />
                            <input type="hidden" name="projectos_id" value="{{request()->id1}}">
                            <input type="hidden" name="request_id" value="{{request()->id2}}">
                            <input type="hidden" name="project_manager_id" value="{{request()->id3}}">
                            <span id="uploadWaqf">إرسال ملفات</span>
                        </div>
                    </div>
                    <button type="submit" class="btn" id="buttonUploadImageMessages">إرسال<span class="loader_area"></span></button>
                </form>
        </div>
    </div>
    <div class="modal" id="variableModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-sm modal-notify modal-success" role="document" style="max-width: 400px;background-color: wheat;z-index: 1;">
    
                <div class="modal-content text-center" style="background:white";>
    
                <div class="modal-header2 d-flex justify-content-center text-center ">
    
                </div>
    
                <div class="modal-body">
                    <h6 class="heading text-center" id="modal_message2"></h6>
                </div>
    
            </div>
    
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
       $('#textareaMessageId').on('input' , function(e){
        if(e.target.value != ""){
          document.getElementById('imageForDisabled').disabled = false;
        }else{
            document.getElementById('imageForDisabled').disabled = true;
        }
          
    });
    $('#img1FileUploadMessages11').on('click' , function(e){
        
		var modal = document.getElementById("myModalIndicator");
		
        var btn = document.getElementById('img1FileUploadMessages11');
        
        modal.style.display = "block";
        
        $('.loginco').css('z-index' , '0');

        var span = document.getElementsByClassName("closeIndicator")[0];
        
        var loginco = document.getElementsByClassName("loginco");

        // btn.onclick = function () {
        //     modal.style.display = "block";
        //     $(loginco).css('z-index' , '0');
        // }

        span.onclick = function () {
            modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        
	});
	var fullLength=0;
	if (window.File && window.FileList && window.FileReader) {
        $("#imgInp").on("change", function(e) {
            
            document.getElementById('uploadWaqf').style.display = "none";
            $('#imgFileUpload').css('display' , 'none');
            // $('#buttonUploadImageMessages').css({'top' : '45px'});
            
          var files = e.target.files,
            filesLength = files.length;
            fullLength += filesLength;
            
            if (fullLength > 12) {
                alert("You are only allowed to upload a maximum of 12 files");
                document.getElementById('uploadWaqf').style.display="block";
                // $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                if($(window).width() < 600){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '70px' , 'left' : '0px' , 'bottom' : '0px'});
                }else if($(window).width() == 768){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '140px' , 'left' : '0px' , 'bottom' : '0px'});
                }else if($(window).width() == 1024){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'160px'});
                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '190px' , 'left' : '0px' , 'bottom' : '0px'});
                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                }else{
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                }
                
                $(window).on('resize' , function(){
                    if($(window).width() < 600){
                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '70px' , 'left' : '0px' , 'bottom' : '0px'});
                    }else if($(window).width() == 768){
                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '140px' , 'left' : '0px' , 'bottom' : '0px'});
                    }else if($(window).width() == 1024){
                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'160px'});
                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '190px' , 'left' : '0px' , 'bottom' : '0px'});
                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                    }else{
                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                    }
                });
                
                $('#imgFileUpload').attr('src' , '/assets/images/Namthga-05.png');
                // $('#buttonUploadImageMessages').css('top' , '45px');
                document.getElementById("imgInp").value = "";
                $('.pip').remove();
                fullLength = 0;
                return false;
            }else{
                for (var i = 0; i < filesLength; i++) {
                  
                  if(files[i].type == 'application/pdf'){
                      var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                          var file = e.target;
                          $("<span class=\"pip\">"+
                            "<img class=\"imageThumb\" src=\"/assets/images/pdfIconMessage.png\" title=\"file\"/>" +
                            "&nbsp;&nbsp;<span class=\"remove\">x</span>&nbsp;&nbsp;" +
                            "</span>").insertAfter("#files");
                          $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                            if($(".pip").length == 0){
                                document.getElementById('uploadWaqf').style.display="block";
                                // $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                if($(window).width() < 600){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'position' : 'relative' , 'left' : '0px' ,  'top' : '40px'});
                                }else if($(window).width() == 768){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '140px' , 'left' : '0px' , 'bottom' : '0px'});
                                }else if($(window).width() == 1024){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'160px'});
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '190px' , 'left' : '0px' , 'bottom' : '0px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'position' : 'relative' , 'left' : '0px' ,  'top' : '40px'});
                                    }else if($(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '140px' , 'left' : '0px' , 'bottom' : '0px'});
                                    }else if($(window).width() == 1024){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'160px'});
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '190px' , 'left' : '0px' , 'bottom' : '0px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                });
                                $('#imgFileUpload').attr('src' , '/assets/images/Namthga-05.png');
                                // $('#buttonUploadImageMessages').css({'top' : '45px' , 'right' : '180px'});
                                fullLength = 0;
                            }else{
                                // $('#buttonUploadImageMessages').css({'top' : '0px' , 'right' : '0px'});
                            }
                            if($(".pip").length == 0 || $(window).width >= 1024){
                                document.getElementById('uploadWaqf').style.display="block";
                                // $('#uploadWaqf').css({'position':'relative' ,'top':'40px' , 'right':'240px'});
                                if($(window).width() < 600){
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'position' : 'relative' , 'left' : '0px' ,  'top' : '40px'});
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                }else if($(window).width() == 768){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '140px' , 'left' : '0px' , 'bottom' : '0px'});
                                }else if($(window).width() == 1024){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'160px'});
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '190px' , 'left' : '0px' , 'bottom' : '0px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'position' : 'relative' , 'left' : '0px' ,  'top' : '40px'});
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '140px' , 'left' : '0px' , 'bottom' : '0px'});
                                    }else if($(window).width() == 1024){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'160px'});
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '190px' , 'left' : '0px' , 'bottom' : '0px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                });
                                
                                $('#imgFileUpload').attr('src' , '/assets/images/Namthga-05.png');
                                // $('#buttonUploadImageMessages').css({'top' : '45px' , 'right' : '180px'});
                                fullLength = 0;
                            }else{
                                // $('#buttonUploadImageMessages').css({'top' : '0px' , 'right' : '0px'});
                            }
                          });
                        });
                  }else if(files[i].type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || files[i].type == 'application/msword'){
                      var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                          var file = e.target;
                          $("<span class=\"pip\">"+
                            "<img class=\"imageThumb\" src=\"/assets/images/wordForPreview.jpg\" title=\"file\"/>" +
                            "&nbsp;&nbsp;<span class=\"remove\">x</span>&nbsp;&nbsp;" +
                            "</span>").insertAfter("#files");
                          $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                            if($(".pip").length == 0){
                                document.getElementById('uploadWaqf').style.display="block";
                                // $('#uploadWaqf').css({'position':'relative' ,'top':'40px' , 'right':'240px'});
                                if($(window).width() < 600){
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'position' : 'relative' , 'left' : '0px' ,  'top' : '40px'});
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                }else if($(window).width() == 768){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '140px' , 'left' : '0px' , 'bottom' : '0px'});
                                }else if($(window).width() == 1024){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'160px'});
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '190px' , 'left' : '0px' , 'bottom' : '0px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'position' : 'relative' , 'left' : '0px' ,  'top' : '40px'});
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '140px' , 'left' : '0px' , 'bottom' : '0px'});
                                    }else if($(window).width() == 1024){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'160px'});
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '190px' , 'left' : '0px' , 'bottom' : '0px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                });
                                
                                $('#imgFileUpload').attr('src' , '/assets/images/Namthga-05.png');
                                // $('#buttonUploadImageMessages').css({'top' : '45px' , 'right' : '180px'});
                                fullLength = 0;
                            }else{
                                // $('#buttonUploadImageMessages').css({'top' : '0px' , 'right' : '0px'});
                            }
                          });
                        });
                  }else if(files[i].type == 'application/vnd.openxmlformats-officedocument.presentationml.presentation' || files[i].type == 'application/vnd.ms-powerpoint'){
                      var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                          var file = e.target;
                          $("<span class=\"pip\">"+
                            "<img class=\"imageThumb\" src=\"/assets/images/pptxForPreview.jpg\" title=\"file\"/>" +
                            "&nbsp;&nbsp;<span class=\"remove\">x</span>&nbsp;&nbsp;" +
                            "</span>").insertAfter("#files");
                          $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                            if($(".pip").length == 0){
                                document.getElementById('uploadWaqf').style.display="block";
                                // $('#uploadWaqf').css({'position':'relative' ,'top':'40px' , 'right':'240px'});
                                if($(window).width() < 600){
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'position' : 'relative' , 'left' : '0px' ,  'top' : '40px'});
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                }else if($(window).width() == 768){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '140px' , 'left' : '0px' , 'bottom' : '0px'});
                                }else if($(window).width() == 1024){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'160px'});
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '190px' , 'left' : '0px' , 'bottom' : '0px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'position' : 'relative' , 'left' : '0px' ,  'top' : '40px'});
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '140px' , 'left' : '0px' , 'bottom' : '0px'});
                                    }else if($(window).width() == 1024){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'160px'});
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '190px' , 'left' : '0px' , 'bottom' : '0px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                });
                                
                                $('#imgFileUpload').attr('src' , '/assets/images/Namthga-05.png');
                                // $('#buttonUploadImageMessages').css({'top' : '45px' , 'right' : '180px'});
                                fullLength = 0;
                            }else{
                                // $('#buttonUploadImageMessages').css({'top' : '0px' , 'right' : '0px'});
                            }
                          });
                        });
                  }else{
                      var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                          var file = e.target;
                          $("<span class=\"pip\">"+
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"file\"/>" +
                            "&nbsp;&nbsp;<span class=\"remove\">x</span>&nbsp;&nbsp;" +
                            "</span>").insertAfter("#files");
                          $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                            if($(".pip").length == 0){
                                document.getElementById('uploadWaqf').style.display="block";
                                // $('#uploadWaqf').css({'position':'relative' ,'top':'40px' , 'right':'240px'});
                                if($(window).width() < 600){
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'position' : 'relative' , 'left' : '0px' ,  'top' : '40px'});
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                }else if($(window).width() == 768){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '140px' , 'left' : '0px' , 'bottom' : '0px'});
                                }else if($(window).width() == 1024){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'160px'});
                                    $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '190px' , 'left' : '0px' , 'bottom' : '0px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'position' : 'relative' , 'left' : '0px' ,  'top' : '40px'});
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '140px' , 'left' : '0px' , 'bottom' : '0px'});
                                    }else if($(window).width() == 1024){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'160px'});
                                        $('#imgFileUpload').css({'display' : 'block' , 'width' : '30px' , 'height' : '30px' , 'right' : '190px' , 'left' : '0px' , 'bottom' : '0px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                });
                                $('#imgFileUpload').attr('src' , '/assets/images/Namthga-05.png');
                                // $('#buttonUploadImageMessages').css({'top' : '45px' , 'right' : '180px'});
                                fullLength = 0;
                            }else{
                                // $('#buttonUploadImageMessages').css({'top' : '0px' , 'right' : '0px'});
                            }
                          });
                        });
                  }
                fileReader.readAsDataURL(files[i]);
              }
            }
        });
      } else {
        alert("Your browser doesn't support to File API");
        document.getElementById('uploadWaqf').style.display = "block";
            $('#imgFileUpload').css('display' , 'block');
      }
      
      $(window).on('load' , function(){
        $("#containers").animate({ scrollTop: $('#containers').prop("scrollHeight")}, 1000); 
      });
    
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#registerFilesHere3').submit(function(e) {
        e.preventDefault();
        
        let TotalImages = $('#imgInp')[0].files.length; //Total Images
        let files = $('#imgInp')[0];
        
        if(TotalImages == ""){
            $('#modal_message2').text('من فضلك أدخل الملفات بصورة صحيحة').css('font-family', 'cr');
            $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
            $('#variableModal2').fadeIn().show();
            setTimeout(function (){
                $('#variableModal2').fadeOut("slow").hide();
            },4000);
        }else{
            $('.loader_area').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
            $(".remove").remove();
            
            $('#buttonUploadImageMessages').attr('disabled' , true);
            $('#buttonUploadImageMessages').css('pointer-events','none');
            var formData = new FormData(this);
            for (let i = 0; i < TotalImages; i++) {
                formData.append('files' + i, files.files[i]);
            }
            $.ajax({
                type:'POST',
                url: "/admin/storeAdminToProjectFiles",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function(response){
                    $('#imgInp').attr('readonly' , true);
                    if(response == 1){
                        setTimeout(function(){
                                location.reload();
                            },5000);
                    }else{
                        console.log('Something Wrong In Request')
                    }
                },
                error: function(response){
                    console.log(response);
                    $('.loader_area').empty();
                    $('#buttonUploadImageMessages').attr('disabled' , false);
                    $('#modal_message2').text('حدث خطأ من السيرفر').css('font-family', 'cr');
                    $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                    $('#variableModal2').fadeIn().show();
                    setTimeout(function (){
                        $('#variableModal2').fadeOut("slow").hide();
                    },4000);
                }
            });
        }
    });
      
      //action="{{route('ProjectStoreFile2')}}" method="POST"
    });
    
    function removePreviousImages(e){
            document.getElementById("imgInp").value = "";
            $('.pip').remove();
            document.getElementById('uploadWaqf').style.display = "block";
            $('#imgFileUpload').css('display' , 'block');
            $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
            if($(window).width() > 1200){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
            }else if($(window).width() == 1025 || $(window).width() == 1200){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'200px'});
            }else if($(window).width() == 1024){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'170px'});
            }else if($(window).width() == 768){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'130px'});
            }else if($(window).width() == 414){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            }else if($(window).width() == 412){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            }else if($(window).width() == 411){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            }else if($(window).width() == 393){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            }else if($(window).width() == 375){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            }else if($(window).width() == 360){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            }else if($(window).width() == 320){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'20px'});
            }else{
                console.log('no width');
            }
            
            $(window).on('resize' , function(){
                console.log('fahmy');
                if($(window).width() > 1200){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                }else if($(window).width() == 1025 || $(window).width() == 1200){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                }else if($(window).width() == 1024){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'170px'});
                }else if($(window).width() == 768){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'130px'});
                }else if($(window).width() == 414){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                }else if($(window).width() == 412){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                }else if($(window).width() == 411){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                }else if($(window).width() == 393){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                }else if($(window).width() == 375){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                }else if($(window).width() == 360){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                }else if($(window).width() == 320){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'20px'});
                }else{
                    console.log('no width');
                }
            });
        }
</script>
@endsection