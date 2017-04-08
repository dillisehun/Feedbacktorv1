<?php
error_reporting(E_ALL ^ ~E_WARNING);
session_start(); // Starting Session
include 'sessions.php';
include 'connection.php';


?><!DOCTYPE html>
<html>
  <head>
    <title>Register user with QR code</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.2.0.min.js"></script>
	<script src="js/xml2json.js"></script>
	<script src="js/cons.js"></script>
   <style>
  body{font-family: "Ropa Sans", sans-serif; color:#666; font-size:14px; color:#333;  background-image: url("img/bg2.jpg");}</style>s
  </head>
  <body>
<div class="container">
  <div class="rows">
  <div class="col-sm-12">
  <div class="col-sm-9">
  
  <video autoplay   class="embed-responsive16by9" controls></video><br/>
  <button class="btn btn-primary" id="reset">Reset</button>
  <button id="stop" class="btn btn-danger" >Stop</button>
  <button id="ref" class="btn btn-info" onclick="window.location.href='register.php'">Refresh</button>
  <form method="post" class="responsive" action="registercheck.php">
    <div class="form-group">
  <textarea id="jsonArea"  cols="55" class="form-control" style="display:none;" rows="5" name="data" required></textarea>
    </div>
    <div class="form-group">
  <input type="text" class="form-control" name="xdata" style="display:none;" id="xmldata" value="" required>
    </div><center>
    <input type="submit"  class="btn btn-success btn-lg" value="SUBMIT"></center>
  </form>
</div>
<div class="col-sm-3"><center><h4> <u>User Manual</u></h4></center><ul>
<li>Put Your <b>Adhaar QR Code</b> Infront of Camera.</li>
<li> It will take <b>3 seconds</b> if you place it at right distance.</li>
<li>After <b>2 Pop Ups Press the SUBMIT Button</b> down Below</li>
</ul>
</div>
</div>
  </div>
   </div>

  <script src="js/qcode-decoder.min.js"></script>
  <script type="text/javascript">

  (function () {
    //'use strict';

    var qr = new QCodeDecoder();

    if (!(qr.isCanvasSupported() && qr.hasGetUserMedia())) {
      alert('Your browser doesn\'t match the required specs.');
      throw new Error('Canvas and getUserMedia are required');
    }

    var video = document.querySelector('video');
    var reset = document.querySelector('#reset');
    var stop = document.querySelector('#stop');


    function resultHandler (err, result) {
      if (err)
        return console.log(err.message);

      //window.location.href="qrhandler.php?data="+result ;
	  
	  //result = result.replace(/"/g, "'")
	  alert(result)
	  //dataj = xml2json(result,'')
	  //$.post('qrhandler.php',{data: result});
	  var pos = result.indexOf('>')
	  result = result.substring(pos+1)
	  alert(result)
	  $("#xmldata").val(result)
	  document.getElementById('xmldata').value=result
	  
	  var x2js = new X2JS();
	  
function convertXml2JSon() {
	
    $("#jsonArea").val(JSON.stringify(x2js.xml_str2json($("#xmldata").val())));
} //converting to json format
convertXml2JSon()
var akshdjas = $("#jsonArea").val()
var obj = JSON.parse(akshdjas)
var dat = obj.PrintLetterBarcodeData
 $("#jsonArea").val(JSON.stringify(dat))

    }

    // prepare a canvas element that will receive
    // the image to decode, sets the callback for
    // the result and then prepares the
    // videoElement to send its source to the
    // decoder.

    qr.decodeFromCamera(video, resultHandler);


    // attach some event handlers to reset and
    // stop whenever we want.

    reset.onclick = function () {
      qr.decodeFromCamera(video, resultHandler);
    };

    stop.onclick = function () {
      qr.stop();
    };

  })();
  </script>
  </body>
</html>
 