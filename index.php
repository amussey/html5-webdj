<?php
header("Access-Control-Allow-Origin: *");
require("client_id.php");
?><!DOCTYPE html>
<!--[if IE 8]>               <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>HTML5 DJ: DJ any of your favorite tracks from SoundCloud!</title>

  <link rel="stylesheet" href="css/normalize.css" />
  
  <link rel="stylesheet" href="css/foundation.css" />
  <style>
    body {
        background-color:#5c5c5c;
    }
    .waveform{
        
        background: #2ba6cb; /* #81D8D0; */
        height: 100px;
        width: 500px;
    }
  </style>

  <script src="js/vendor/custom.modernizr.js"></script>

</head>
<body>
  <script src="js/jquery-1.9.1.min.js"></script>

    <div class="row">
        <div class="large-12 columns">
            <div class="panel">
            <center><h1>HTML5 DJ</h1>(Works best in Chrome &amp; Safari, works well everywhere else)</center>
        </div>
            <hr />
        </div>
    </div>

    <div class="row">
        <div class="large-12 columns">




            <div class="row">
                <audio id="audio1" style="width:100%;" ontimeupdate="trackTimeDeck1(this.currentTime, this.duration);">
                  <source id="audio1src" src="http://api.soundcloud.com/tracks/87372970/stream?client_id=<?=$client_id ?>" type="audio/mpeg" >
                </audio>

                <audio id="audio2" style="width:100%;" ontimeupdate="trackTimeDeck2(this.currentTime, this.duration);">
                  <source id="audio2src" src="http://api.soundcloud.com/tracks/68980236/stream?client_id=<?=$client_id ?>" type="audio/mpeg" >
                </audio>
            </div>


            <div class="row">
                <div class="large-6 columns">
                    <div class="panel">
                        <div id="deck1Waveform" style="width:100%; height:78px; -webkit-mask-box-image: url(http://w1.sndcdn.com/kVZB5IB1t0Lc_m.png);" class="waveform"></div><br />
                        <input type="range" id="scanDeck1"    style="width:100%;" min="0" max="1000" value="0"><br />
                        <p id="titleDeck1">DJ Mu-Z - Back to the New Life</p>
                    </div>
                </div>
                <div class="large-6 columns">
                    <div class="panel">
                        <div id="deck2Waveform" style="width:100%; height:78px; -webkit-mask-box-image: url(http://w1.sndcdn.com/ybxJRr4LWR1J_m.png);" class="waveform"></div><br />
                        <input type="range" id="scanDeck2"    style="width:100%;" min="0" max="1000" value="0"><br />
                        <p id="titleDeck2">Krewella - Killin' It (Mutrix Remix)</p>
                    </div>
                </div>
                
            </div>

            <!-- <div class="row">
                <div class="large-12 columns">
                    <div class="panel">
                        <div id="deck1Waveforma" style="width:100%; height:125px; -webkit-mask-box-image: url(https://w1.sndcdn.com/cWHNerOLlkUq_m.png);" class="waveform"></div>
                        <div id="deck2Waveforma" style="width:100%; height:125px; -webkit-mask-box-image: url(https://w1.sndcdn.com/cWHNerOLlkUq_m.png);" class="waveform"></div>
                    </div>
                </div>
            </div> -->


            <div class="row">
                <div class="large-4 columns">
                    <div class="panel">
                        <center>Volume 1</center><br />
                        <input type="range" id="volume1"    style="width:100%;" min="0" max="100" value="100">
                    </div>
                </div>
                <div class="large-4 columns">
                    <div class="panel">
                        <center>Crossfader</center><br />
                        <input type="range" id="crossfader" style="width:100%;" min="0" max="100" value="50">
                    </div>
                </div>
                <div class="large-4 columns">
                    <div class="panel">
                        <center>Volume 2</center><br />
                        <input type="range" id="volume2"    style="width:100%;" min="0" max="100" value="100">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="large-2 columns">
                    <a href="javascript:setCue1Deck1();">
                        <div class="panel">
                            <center>
                                <font style="font-size:20px; color:#f00; font-weight:bold;">Cue 1</font><br />
                                (<font id="cueTime1Deck1">Not Set</font>)
                            </center>
                        </div>
                    </a>
                </div>
                <div class="large-2 columns">
                    <a href="javascript:setCue2Deck1();">
                        <div class="panel">
                            <center>
                                <font style="font-size:20px; color:#0f0; font-weight:bold;">Cue 2</font><br />
                                (<font id="cueTime2Deck1">Not Set</font>)
                            </center>
                        </div>
                    </a>
                </div>
                <div class="large-2 columns">
                    <a href="javascript:setCue3Deck1();">
                        <div class="panel">
                            <center>
                                <font style="font-size:20px; color:#00f; font-weight:bold;">Cue 3</font><br />
                                (<font id="cueTime3Deck1">Not Set</font>)
                            </center>
                        </div>
                    </a>
                </div>
                <div class="large-2 columns">
                    <a href="javascript:setCue1Deck2();">
                        <div class="panel">
                            <center>
                                <font style="font-size:20px; color:#f00; font-weight:bold;">Cue 1</font><br />
                                (<font id="cueTime1Deck2">Not Set</font>)
                            </center>
                        </div>
                    </a>
                </div>
                <div class="large-2 columns">
                    <a href="javascript:setCue2Deck2();">
                        <div class="panel">
                            <center>
                                <font style="font-size:20px; color:#0f0; font-weight:bold;">Cue 2</font><br />
                                (<font id="cueTime2Deck2">Not Set</font>)
                            </center>
                        </div>
                    </a>
                </div>
                <div class="large-2 columns">
                    <a href="javascript:setCue3Deck2();">
                        <div class="panel">
                            <center>
                                <font style="font-size:20px; color:#00f; font-weight:bold;">Cue 3</font><br />
                                (<font id="cueTime3Deck2">Not Set</font>)
                            </center>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="large-2 columns">
                    <a href="javascript:deleteCue1Deck1();">
                        <div class="panel">
                            <center>(Clear)</center>
                        </div>
                    </a>
                </div>
                <div class="large-2 columns">
                    <a href="javascript:deleteCue2Deck1();">
                        <div class="panel">
                            <center>(Clear)</center>
                        </div>
                    </a>
                </div>
                <div class="large-2 columns">
                    <a href="javascript:deleteCue3Deck1();">
                        <div class="panel">
                            <center>(Clear)</center>
                        </div>
                    </a>
                </div>
                <div class="large-2 columns">
                    <a href="javascript:deleteCue1Deck2();">
                        <div class="panel">
                            <center>(Clear)</center>
                        </div>
                    </a>
                </div>
                <div class="large-2 columns">
                    <a href="javascript:deleteCue2Deck2();">
                        <div class="panel">
                            <center>(Clear)</center>
                        </div>
                    </a>
                </div>
                <div class="large-2 columns">
                    <a href="javascript:deleteCue3Deck2();">
                        <div class="panel">
                            <center>(Clear)</center>
                        </div>
                    </a>
                </div>
            </div>


            <div class="row">
                <div class="large-2 columns">
                    <img src="http://i1.sndcdn.com/artworks-000045225787-pb2ek0-t300x300.jpg?e48997d" id="coverDeck1">
                </div>
                <div class="large-2 columns">
                    <div class="panel">
                        <p><img src="img/rewind.png" style="width:100%;" onclick="javascript:rewindDeck1();"></p>
                    </div>
                </div>
                <div class="large-2 columns">
                    <div class="panel">
                        <p><img src="img/play.png" style="width:100%;" id="playImgDeck1" onclick="javascript:playDeck1();" id="playDeck1"></p>
                    </div>
                </div>
                <div class="large-2 columns">
                    <div class="panel">
                        <p><img src="img/rewind.png" style="width:100%;" onclick="javascript:rewindDeck2();"></p>
                    </div>
                </div>
                <div class="large-2 columns">
                    <div class="panel">
                        <p><img src="img/play.png" style="width:100%;" id="playImgDeck2" onclick="javascript:playDeck2();"></p>
                    </div>
                </div>
                <div class="large-2 columns">
                    <img src="http://i1.sndcdn.com/artworks-000034988499-l6xjdn-t300x300.jpg?ca77017" id="coverDeck2" >
                </div>
            </div>

            <div class="row">
                <div class="large-6 columns">
                    <div class="panel">
                        <center>BPM (<font style="" id="bpm1_label">100</font>%) (<a href="javascript:resetBPMDeck1();">Reset</a>)</center><br />
                        <input type="range" name="bpm1" id="bpm1" style="width:100%;" min="500" max="2000" value="1000">
                    </div>
                </div>
                <div class="large-6 columns">
                    <div class="panel">
                        <center>BPM (<font style="" id="bpm2_label">100</font>%) (<a href="javascript:resetBPMDeck2();">Reset</a>)</center><br />
                        <input type="range" name="bpm2" id="bpm2" style="width:100%;" min="500" max="2000" value="1000">
                    </div>
                </div>
            </div>

            


            <div class="row">
                <div class="large-6 columns">
                    <div class="panel">
                        <p>Soundcloud Track URL:<br /><input type="text" name="loadDeck1" id="loadDeck1" value="https://soundcloud.com/dj-mu-z/back-to-the-new-life"><br /><input type="button" class="nice blue radius button" value="Load Track" onclick="javascript:fetchDeck1();"></p>
                    </div>
                </div>
                <div class="large-6 columns">
                    <div class="panel">
                        <p>Soundcloud Track URL:<br /><input type="text" name="loadDeck2" id="loadDeck2" value="https://soundcloud.com/krewella/killin-it-mutrix-remix"><br /><input type="button" class="nice blue radius button" value="Load Track"  onclick="javascript:fetchDeck2();"></p>
                    </div>
                </div>
            </div>

            <div class="row" style="color:#fff;">
                <div class="large-5 columns"></div>
                <div class="large-7 columns">
                    Developed by Andrew Mussey.  <a href="http://amussey.com">Check out some of the other cool stuff I do.</a>
                </div>
            </div>

            
        </div>
      
    </div>


    <script>
    var isDeck1Playing = false;
    var isDeck2Playing = false;
    var client_id = "<?=$client_id ?>";
    var deck1 = document.getElementById("audio1");
    var deck2 = document.getElementById("audio2");
    var cue1Deck1 = -1;
    var cue1Deck2 = -1;
    var cue2Deck1 = -1;
    var cue2Deck2 = -1;
    var cue3Deck1 = -1;
    var cue3Deck2 = -1;


    function playDeck1() {
        if (isDeck1Playing) {
            deck1.pause();
            $("#playImgDeck1").attr("src", "img/play.png");
        } else {
            deck1.play();
            $("#playImgDeck1").attr("src", "img/pause.png");
        }
        isDeck1Playing = !isDeck1Playing;
    }
    function playDeck2() {

        if (isDeck2Playing) {
            deck2.pause();
            $("#playImgDeck2").attr("src", "img/play.png");
        } else {
            deck2.play();
            $("#playImgDeck2").attr("src", "img/pause.png");
        }
        isDeck2Playing = !isDeck2Playing;
    }

    function rewindDeck1() {
        
        
        deck1.pause();
        $("#audio1src").attr("src", $("#audio1src").attr("src"));
        //deck1.load();
        $("#playImgDeck1").attr("src", "img/play.png");
        isDeck1Playing = false;
        $("#scanDeck1").val(0);
        deck1.currentTime = 0;
    }
    function rewindDeck2() {
        deck2.pause();
        $("#audio2src").attr("src", $("#audio2src").attr("src"));
        //deck2.load();
        $("#playImgDeck2").attr("src", "img/play.png");
        isDeck2Playing = false;
        $("#scanDeck2").val(0);
        deck2.currentTime = 0;
    }

    function resetBPMDeck1() {
        $('#bpm1').val('1000');
        setBPMDeck1(1000);
    }
    function resetBPMDeck2() {
        $('#bpm2').val('1000');
        setBPMDeck2(1000);
    }
    $("#volume1").change(function () {
       volumeSet($('#volume1').val(), $('#volume2').val(), $('#crossfader').val());

    });
    $("#volume2").change(function () {
       volumeSet($('#volume1').val(), $('#volume2').val(), $('#crossfader').val());
    });
    $("#crossfader").change(function () {
       volumeSet($('#volume1').val(), $('#volume2').val(), $('#crossfader').val());
    });

    function volumeSet(vol1, vol2, crossfader) {
        if (crossfader < 40) {
            deck1.volume = (vol1/100);
            deck2.volume = (vol2/100)*(crossfader/40);
        } else if (crossfader > 60) {
            deck1.volume = (vol1/100)*((100-crossfader)/40);
            deck2.volume = (vol2/100);
        } else {
            deck1.volume = (vol1/100);
            deck2.volume = (vol2/100);
        }
    }


    function setBPMDeck1(newValue) {
        $("#bpm1_label").html(newValue/10);
       deck1.playbackRate = newValue/1000;
    }
    function setBPMDeck2(newValue) {
        $("#bpm2_label").html(newValue/10);
       deck2.playbackRate = newValue/1000;
    }
    $("#bpm1").change(function () {
       setBPMDeck1($('#bpm1').val());
    });
    $("#bpm2").change(function () {
       setBPMDeck2($('#bpm2').val());
    });



    $("#scanDeck1").change(function () {
       setTimeDeck1($('#scanDeck1').val()/1000);
    });
    function setTimeDeck1(percentage) {
        deck1.currentTime = (percentage)*deck1.duration;
    }

    function trackTimeDeck1(current, total) {
        $("#scanDeck1").val(Math.floor((current/total)*1000));
    }

    $("#scanDeck2").change(function () {
       setTimeDeck2($('#scanDeck2').val()/1000);
    });
    function setTimeDeck2(percentage) {
        deck2.currentTime = (percentage)*deck2.duration;
    }
    function trackTimeDeck2(current, total) {
        $("#scanDeck2").val(Math.floor((current/total)*1000));
    }





    function setCue1Deck1() {
        if (cue1Deck1 == -1) {
            cue1Deck1 = deck1.currentTime;
            $("#cueTime1Deck1").html(Math.floor(cue1Deck1));
        } else {
            setTimeDeck1(cue1Deck1/deck1.duration);
            if (!isDeck1Playing) {
                deck1.play();
                $("#playImgDeck1").attr("src", "img/pause.png");
                isDeck1Playing = true;
            }
        }
    }
    function setCue2Deck1() {
        if (cue2Deck1 == -1) {
            cue2Deck1 = deck1.currentTime;
            $("#cueTime2Deck1").html(Math.floor(cue2Deck1));
        } else {
            setTimeDeck1(cue2Deck1/deck1.duration);
            if (!isDeck1Playing) {
                deck1.play();
                $("#playImgDeck1").attr("src", "img/pause.png");
                isDeck1Playing = true;
            }
        }
    }
    function setCue3Deck1() {
        if (cue3Deck1 == -1) {
            cue3Deck1 = deck1.currentTime;
            $("#cueTime3Deck1").html(Math.floor(cue3Deck1));
        } else {
            setTimeDeck1(cue3Deck1/deck1.duration);
            if (!isDeck1Playing) {
                deck1.play();
                $("#playImgDeck1").attr("src", "img/pause.png");
                isDeck1Playing = true;
            }
        }
    }

    function setCue1Deck2() {
        if (cue1Deck2 == -1) {
            cue1Deck2 = deck2.currentTime;
            $("#cueTime1Deck2").html(Math.floor(cue1Deck2));
        } else {
            setTimeDeck2(cue1Deck2/deck2.duration);
            if (!isDeck2Playing) {
                deck2.play();
                $("#playImgDeck2").attr("src", "img/pause.png");
                isDeck2Playing = true;
            }
        }
    }
    function setCue2Deck2() {
        if (cue2Deck2 == -1) {
            cue2Deck2 = deck2.currentTime;
            $("#cueTime2Deck2").html(Math.floor(cue2Deck2));
        } else {
            setTimeDeck2(cue2Deck2/deck2.duration);
            if (!isDeck2Playing) {
                deck2.play();
                $("#playImgDeck2").attr("src", "img/pause.png");
                isDeck2Playing = true;
            }
        }
    }
    function setCue3Deck2() {
        if (cue3Deck2 == -1) {
            cue3Deck2 = deck2.currentTime;
            $("#cueTime3Deck2").html(Math.floor(cue3Deck2));
        } else {
            setTimeDeck2(cue3Deck2/deck2.duration);
            if (!isDeck2Playing) {
                deck2.play();
                $("#playImgDeck2").attr("src", "img/pause.png");
                isDeck2Playing = true;
            }
        }
    }

    function deleteCue1Deck1() {
        cue1Deck1 = -1;
        $("#cueTime1Deck1").html("Not Set");
    }
    function deleteCue2Deck1() {
        cue2Deck1 = -1;
        $("#cueTime2Deck1").html("Not Set");
    }
    function deleteCue3Deck1() {
        cue3Deck1 = -1;
        $("#cueTime3Deck1").html("Not Set");
    }

    function deleteCue1Deck2() {
        cue1Deck2 = -1;
        $("#cueTime1Deck2").html("Not Set");
    }
    function deleteCue2Deck2() {
        cue2Deck2 = -1;
        $("#cueTime2Deck2").html("Not Set");
    }
    function deleteCue3Deck2() {
        cue3Deck2 = -1;
        $("#cueTime3Deck2").html("Not Set");
    }


    function fetchDeck1() {
        $.get('http://api.soundcloud.com/resolve.json?url=' + $("#loadDeck1").val() + '&client_id=' + client_id, function(data) {
            //alert(data.kind);
            $("#audio1src").attr("src", data.stream_url + "?client_id=" + client_id);
            deck1.pause();
            deck1.load();

            //document.getElementById("deck1Waveform").style["-webkit-mask-box-image"] = "url('" + data.waveform_url +"')";
            $("#deck1Waveform").css("-webkit-mask-box-image", "url('" + data.waveform_url +"')");
            $("#coverDeck1").attr("src", data.artwork_url.replace("-large.", "-t300x300."));
            $("#titleDeck1").html(data.title);
            $("#playImgDeck1").attr("src", "img/play.png");
            isDeck1Playing = false;
            deleteCue1Deck1();
            deleteCue2Deck1();
            deleteCue3Deck1();

//        $('.result').html(data);
//        alert('Load was performed.');
        });
    }

    function fetchDeck2() {
        $.get('http://api.soundcloud.com/resolve.json?url=' + $("#loadDeck2").val() + '&client_id=' + client_id, function(data) {

            $("#audio2src").attr("src", data.stream_url + "?client_id=" + client_id);
            deck2.pause();
            deck2.load();
            $("#deck2Waveform").css("-webkit-mask-box-image", "url('" + data.waveform_url +"')");
            $("#coverDeck2").attr("src", data.artwork_url.replace("-large.", "-t300x300."));
            $("#titleDeck2").html(data.title);
            $("#playImgDeck2").attr("src", "img/play.png");
            isDeck2Playing = false;
            deleteCue1Deck2();
            deleteCue2Deck2();
            deleteCue3Deck2();
        });
    }

    $(document).ready(function() {
        //fetchDeck1();
        //fetchDeck2();
    });
    //myVid.volume=0.2;
    </script>

  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>
