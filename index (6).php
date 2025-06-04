<?php 
//ini_set("display_errors", 1);

$title = "Slowed and Reverb Generator - Generate Slow and Reverb Songs in mp3, wav & more - SSslowedAndReverb.com";
$path = "https://ssslowedandreverb.com/";
?>

<!DOCTYPE html>
<html lang="en">
<?php include($_SERVER['DOCUMENT_ROOT'].'/templates/head_ss.php'); ?>
    <main>
      <section id="main" class="jumbotron mb-0 pb-3 bg-primary">
  <div class="search-block-default-height">
    <div class="container text-white h-100 container-search">
      <div class="align-items-center text-center pl-lg-5">
        <h1 class="mb-3 mt-3 main_title">Slowed and Reverb Generator</h1>
        <p class="">Make slow & reverb music online. Slowed reverb converter. No Ads, Forever Free.</p>
        <div id="m-form" class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-6">
<div id="uploads">
   <div class="upload-container">
        <div class="drop-area" id="drop-area">
            <button>Upload Files <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z"/>
</svg></button>
            <p style="font-size: 12px; color: white; margin-top: 5px;">or drag & drop files here. Supported: mp3 & wav</p>
            <!-- <input type="file" id="fileInput" multiple> -->
           <input type="file" aria-label="upload files" accept="audio/mp3, audio/wav" id="inputFile" multiple>
        </div>
            <div style="display:none" id="process"><img loading="lazy" src="/assets/loader.svg" id="img" width="60" height="60"></div>
            <div style="display:none" id="error"></div>
		<div id="audioparams">
		<div class="xaudio-container">
        <span id="playBtn"> <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z"/>
</svg> </span>
        
        <!-- <input type="range" id="volumeSlider" min="0" max="1" step="0.01" value="1"> --> 
       <div id="waveform"></div>
       <input type="range" min="0" max="100" value="50" class="slider" id="sliderVol" aria-label="volume control">
    </div>
           
    <div class="slider-box">
    <div class="container mt-4">
        <div class="dropdown-container">
            <!-- Presets -->
            <select class="custom-dropdown" id="presets" aria-label="presets">
                <option id="presetNull" value="" disabled>Presets</option>
                <option id="preset0" value="[0,435,0,0]">No Preset</option>
                <option id="preset1" value="[-3,435,2,20]">Classic Slow & Reverb</option>
                <option id="preset2" value="[2,435,3,25]">Lil Faster, Lil Verb</option>
                <option id="preset3" value="[-6,350,1,60]">Off da Lean</option>
                <option id="preset4" value="[6,435,0,0]">Off da Addy</option>
                <option id="preset4" value="[0,268,1,80]">Bar Bathroom</option>
                <option id="preset4" value="[-2,435,2,40]">Slow & Reverb, Atti's Version</option>
            </select>

            <!-- semitones // wav files -->
            <select class="custom-dropdown" id="wavFiles" aria-label="reverb">
                <option id="noVerb" value="noVerb">No Reverb</option>
                <option id="option1" value="/basefiles/1_Large Long Echo Hall.wav">Large Long Echo Hall</option>
                <option id="option2" value="/basefiles/2_Large Wide Echo Hall.wav">Large Wide Echo Hall</option>
                <option id="option3" value="/basefiles/3_Right Glass Triangle.wav">Right Glass Triangle</option>
            </select>
<!-- UNDER MUSIC BOX -->
        </div>
    </div>
        <div id="waveformOffline"></div>
        <div class="slider-container">
            <label for="speedSlider">Speed</label>
            Speed: <span id="slider1-value">0</span> <span id="audioLength">(Audio Length: <span id="songLength"></span>)</span> <input aria-label="playbackspeed" type="range" min="-24" max="24" value="0" class="slider" id="slider1">
           Wet: <span id="slider2-value" style="margin: 0px; vertical-align: middle;">0%</span> <input aria-label="wet_reverb" type="range" min="0" max="100" value="0" class="slider" id="slider2">
	   Filter (Hz): <span id="slider3-value">22000</span> <input aria-label="filter" type="range" min="100" max="435" value="435" class="slider" id="slider3">
        </div>
		
			<div id="subMusic" style="font-size: 12px;color: snow; justify-content: center; text-align: center; align-content: center;">
            <!-- <button id="downloadButton"><span id="exportStatus">EXPORT</span></button> -->
           <br><center> <button type="button" class="btn btn-success" id="downloadButton"><span id="exportStatus">Download <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708"/>
</svg></span></button> </center>
            <span id="exportInProg" display="none"></span>
            <div class="progress-container">
        <div class="progress-bar"></div>
        <div class="progress-text">0%</div>
    </div>
        </div>

    </div>
	
    <audio id="audioPlayer"></audio>
		</div>
		<table id="fileTable">
            <thead>
                <tr>
                    <th><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-music-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M11 6.64v1.75l-2 .5v3.61c0 .495-.301.883-.662 1.123C7.974 13.866 7.499 14 7 14s-.974-.134-1.338-.377C5.302 13.383 5 12.995 5 12.5s.301-.883.662-1.123C6.026 11.134 6.501 11 7 11c.356 0 .7.068 1 .196V6.89a1 1 0 0 1 .757-.97l1-.25A1 1 0 0 1 11 6.64"/>
</svg> Filename</th>
                    <th>Action <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-thumb-fill" viewBox="0 0 16 16">
  <path d="M8.5 1.75v2.716l.047-.002c.312-.012.742-.016 1.051.046.28.056.543.18.738.288.273.152.456.385.56.642l.132-.012c.312-.024.794-.038 1.158.108.37.148.689.487.88.716q.113.137.195.248h.582a2 2 0 0 1 1.99 2.199l-.272 2.715a3.5 3.5 0 0 1-.444 1.389l-1.395 2.441A1.5 1.5 0 0 1 12.42 16H6.118a1.5 1.5 0 0 1-1.342-.83l-1.215-2.43L1.07 8.589a1.517 1.517 0 0 1 2.373-1.852L5 8.293V1.75a1.75 1.75 0 0 1 3.5 0"/>
</svg></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div> 
</div>
<div class="container mt-3">
  <form onsubmit="return false;" name="reportform">
           <p class=""><b>Send Your Feedback to Improve the tool.</b></p>
    <div class="mb-3 mt-3">
      <textarea class="form-control" rows="2" id="comment" name="comment" placeholder="Describe the issue..."></textarea>
    </div>
    <button type="submit" id="reportbutton" class="btn btn-success">Send Feedback</button>
  </form>
</div>
 <br><div style="display:none" id="error"><i class="fa-solid fa-triangle-exclamation fa-bounce fa-xl"></i> </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <!---->
      <!---->
      <!---->
    </div>
    <div>
      <!---->
      <!---->
    </div>
  </div>
</section>
      <section class="container mt-5 mb-5 align-items-center b-instruction how-to-mp4">
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <div class="media">
              <div class="media-body">
                <p>Create slower and reverb songs free in <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-music-fill" viewBox="0 0 16 16">
  <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-.5 4.11v1.8l-2.5.5v5.09c0 .495-.301.883-.662 1.123C7.974 12.866 7.499 13 7 13s-.974-.134-1.338-.377C5.302 12.383 5 11.995 5 11.5s.301-.883.662-1.123C6.026 10.134 6.501 10 7 10c.356 0 .7.068 1 .196V4.41a1 1 0 0 1 .804-.98l1.5-.3a1 1 0 0 1 1.196.98"/>
</svg> MP3 & wav format effortlessly with our convenient tool! SSslowedAndReverb.com is a free website that allows you to make slow & <a href="https://en.wikipedia.org/wiki/Reverb_effect" target="_blank"> reverb effect </a> without paying any fees.</p>
                <p>Our tool is not only safe and user-friendly but also completely FREE! All converted songs can be downloaded online in the highest quality without any annoying ads.</p>
                <p>Compatible with popular browsers like Google Chrome, Mozilla Firefox, Safari, Opera, and all Chromium-based browsers, our software ensures a seamless experience.</p>
                <p>We support multiple files processing- allowing you to make slowed music of multiple songs at once! No need to download any software or random Apk apps (we hate them as much as you do.)</p>
              </div>
            </div>
          </div>
        </div>
        <h2 class="text-muted mb-0 text-center">Supported Platforms:</h2>
        <div class="row justify-content-center">
          <div class="col-6 col-sm-2 p-4 text-center">
            <img src="/assets/windows.svg" alt="" width="150" height="150">
          </div>
          <div class="col-6 col-sm-2 p-4 text-center">
            <img src="/assets/apple.svg" alt="" width="150" height="150">
          </div>
          <div class="col-6 col-sm-2 p-4 text-center">
            <img src="/assets/android.svg" alt="" width="150" height="150">
          </div>
          <div class="col-6 col-sm-2 p-4 text-center">
            <img src="/assets/linux.svg" alt="" width="150" height="150">
          </div>
        </div>
      </section>
      <section class="bg-08003a" style="overflow-wrap:anywhere">
        <div class="container pt-5 pb-5 align-items-center color-white bg-08003a">
          <div>
            <h2 class="col-12 text-center mb-3"> How to make slowed and reverb songs?</h2>
            <p>You can make a song with slow & reverb effect on your computer or mobile without putting it on pause. Just make sure you have the correct audio file in place.</p>
            <p>We hate PC software, APK or Chrome extensions as much as you do. Hence, you don't need to install any of them in order to use our services. Let's see how you can start generating slowed & reverb songs online.</p>
          </div>
        </div>
      </section>
      <section class="container mt-5 mb-5 align-items-center b-instruction media-height how-to-mp4">
        <h3 class="col-12 text-center mb-5">How to use our slowed and reverb generator website?</h3>
        <div class="row">
          <div class="col-sm-6 col-lg-3" id="instruction">
            <div class="media">
              <div class="text-center">
                <div class="iconbox iconmedium rounded-circle text-info mb-2">
                  <i class="fas fa-copy"></i>
                </div>
              </div>
              <div class="media-body">
                <h4>Keep your music file ready</h4>
                <p class="text-muted">Make sure you have the right audio file for the conversion. We support mp3 & wav formats (more formats soon).</p>
              </div>
            </div>
            <div class="img mx-auto mb-4 pr-0 mb-lg-0 col-10 col-sm-12">
              <picture>
                <br><img loading="lazy" src="/assets/keep-music-files-ready.webp?v=1" alt="locate music files to convert on your computer" width="225" height="180">
              </picture>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="media">
              <div class="text-center">
                <div class="iconbox iconmedium rounded-circle text-purple mb-2">
                  <i class="fas fa-mouse-pointer mouse-pointer-center"></i>
                </div>
              </div>
              <div class="media-body">
                <h4>Upload the file(s) to SSslowedAndReverb</h4>
                <p class="text-muted">Click on upload file button or drag & drop. You can upload multiple files at once. But make sure they are in correct formats: mp3 or wav.</p>
              </div>
            </div>
            <div class="img mx-auto mb-4 pr-0 mb-lg-0 col-10 col-sm-12">
              <picture>
                <br><img loading="lazy" src="/assets/upload-files-to-slowed-reverb-tool.webp?v=1" alt="upload files to slowed reverb tool" width="225" height="180">
              </picture>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="media">
              <div class="text-center">
                <div class="iconbox iconmedium rounded-circle text-info mb-2">
                  <i class="fas fa-sync-alt"></i>
                </div>
              </div>
              <div class="media-body">
                <h4>Select Presets, Reverb & other audio parameters</h4>
                <p class="text-muted">From the dropdowns & sliders, <a href="https://www.hollyland.com/blog/tips/slow-and-reverb-songs" target="_blank"> adjust the desired reverb,</a> playback speed, wet and filters.</p>
              </div>
            </div>
            <div class="img mx-auto mb-4 pr-0 mb-lg-0 col-10 col-sm-12">
              <picture>
                <br><img loading="lazy" src="/assets/customize-audio-select-presets-reverb-playbackspeed.webp?v=1" alt="customize audio select presets reverb playbackspeed and preview the song" width="225" height="180">
              </picture>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="media">
              <div class="text-center">
                <div class="iconbox iconmedium rounded-circle text-info mb-2">
                  <i class="fas fa-download"></i>
                </div>
              </div>
              <div class="media-body">
                <h4>Export the converted file</h4>
                <p class="text-muted">Preview the song in realtime before the final download. Play with the sliders & filters. Just click on Download & wait.</p>
              </div>
            </div>
            <div class="img mx-auto mb-4 pr-0 mb-lg-0 col-10 col-sm-12">
              <picture>
                <br><img loading="lazy" src="/assets/convert-song-to-slowed-and-reverb.webp?v=1" alt="convert song to slowed and reverb" width="225" height="180">
              </picture>
            </div>
          </div>
        </div>
      </section>
<section class="bg-08003a" style="overflow-wrap:anywhere">
    <div class="container pt-5 pb-5 align-items-center color-white bg-08003a">
        <div>
            <h2 class="col-12 text-center mb-3">
                Our Slowed Reverb Maker Key Features:</h2>
            <p>The best slowed and reverb generator with zero downtime. </p>
        <p>With our website, you’ll be able to:</p>
        <ul class="w-100">
            <li>Easily apply slowed and reverb effects to any audio file.</li>
           <li>Adjust playback speed and other audio parameters to get the perfect slow effect.</li>
           <li>Preview Before Download – Listen to the modified track before saving it.</li>
            <li>Listen slowed tracks with reverb effect and never get bored.</li>
            <li>No need to purchase third-party software.</li>
            <li>Process multiple files simultaneously.</li>
            <li>Enhance low frequencies for a fuller sound.</li>       
        </ul>
        </div>
    </div>
</section>
<section class="container">
    <h3 class="pb-4 pt-4 text-center">How to convert mutiple files at once?</h3>
    <p class="text-center">Follow these three easy steps to apply slow & reverb affect to multiple files at once:</p>
    <div class="row align-items-center how-it-works d-flex">
        <div class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center">
            <div class="circle font-weight-bold">1</div>
        </div>
        <div class="col-10 col-sm-8">
            <h4>Upload all the files at once or one-by-one.</h4>
            <p>Upload all the files you want to convert. All files must be either in mp3 or wav format.</p>
        </div>
    </div>
    <div class="row timeline">
        <div class="col-2">
            <div class="corner top-right"></div>
        </div>
        <div class="col-8">
            <hr>
        </div>
        <div class="col-2">
            <div class="corner left-bottom"></div>
        </div>
    </div>
    <!--second section-->
    <div class="row align-items-center justify-content-end how-it-works d-flex">
        <div class="col-10 col-sm-8 text-right">
            <h4>Adjust playback speed, presets, wet, frequency & reverb sliders</h4>
            <p>Play with these settings & preview the song in real time to achieve the desired slowed effect.</p>
        </div>
        <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
            <div class="circle font-weight-bold">2</div>
        </div>
    </div>
    <!--path between 2-3-->
    <div class="row timeline">
        <div class="col-2">
            <div class="corner right-bottom"></div>
        </div>
        <div class="col-8">
            <hr>
        </div>
        <div class="col-2">
            <div class="corner top-left"></div>
        </div>
    </div>
    <!--third section-->
    <div class="row align-items-center how-it-works d-flex">
        <div class="col-2 text-center top d-inline-flex justify-content-center align-items-center">
            <div class="circle font-weight-bold">3</div>
        </div>
        <div class="col-10 col-sm-8">
            <h4>Start exporting files</h4>
            <p>Scroll down a bit, & you will find the table listing all your uploaded files. Against each file, there will be a download button. Click on that. It will start applying the slow & reverb effect. Wait patiently for 30-60 seconds. Once done, it will initiate the download automatically. You can click on the individual process buttons located against each song. Do not click multiple process buttons at once, or refresh the page. </p>
        </div>
    </div>
</section>
      <section class="container mt-5 mb-5 align-items-center">
        <div class="row p-3">
          <div class="col-12">
            <h3 class="text-center pb-2">Questions &amp; Answers</h3>
            <div class="accordion" id="accordion-mp4 br-25" itemscope itemtype="https://schema.org/FAQPage">
              <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading0">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse0" aria-expanded="false" aria-controls="collapse0"> What is the meaning of slowed and reverb? </button>
                  </h2>
                </div>
                <div id="collapse0" class="collapse" aria-labelledby="heading0" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p>Slowed and reverb is an audio effect where a song is slowed down and given a deep reverb, creating a dreamy and spacey atmosphere. This effect was popularized in the early 2010s, primarily by music remix communities on YouTube and <a href="https://soundcloud.com/slowed-down-songs" target="_blank"> SoundCloud </a>. It gives tracks a chill, relaxed vibe, making them more emotional and immersive.</p>
              
                  </div>
                </div>
              </div>
              <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading1">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1"> How to make a song slowed and reverb? </button>
                  </h2>
                </div>
                <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p>To create a slowed and reverb version of a song, just upload your original file to our tool.</p>
                 <ul>
                  <li>Adjust the speed, filter and other settings. Play with these modifiers to get the desired effect.</li>
                  <li>Apply reverb settings, tweaking intensity and depth to create an echo-like effect.</li>
                <li>Preview your edited track to ensure it sounds right.</li>
               <li> Download the final slowed + reverb version in your preferred audio format. </li>
                </ul>
                  </div>
                </div>
              </div>
              <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading2">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2"> Why slow and reverb? </button>
                  </h2>
                </div>
                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p>People love slowed and reverb because it makes music feel more emotional and nostalgic. Slowing a song highlights the vocals and instrumentals, giving it a unique vibe. </p>
                    <p> The added reverb enhances the depth, making it sound spacious and immersive. It’s great for chill, lo-fi, and relaxing music sessions.</p>
                  </div>
                </div>
              </div>
              <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading3">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Can I adjust the speed and reverb settings?</button>
                  </h2>
                </div>
                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p>Yes! our slowed and reverb generator lets you customize: playback speed, reverb effect, filter & presets. </p>
                  </div>
                </div>
              </div>
              <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading4">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4"> Can I preview my slowed and reverb track before downloading? </button>
                  </h2>
                </div>
                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p>Yes! our slowed and reverb tool allows real-time previews so you can hear how your edits sound as you go. Adjust the settings until you’re satisfied. Download only when you’re happy with the final output. 
             </p>
               <p> This ensures you get the perfect slowed and reverb effect without unnecessary downloads. </p>
                  </div>
                </div>
              </div>
              <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading5">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5"> What audio formats do you support? </button>
                  </h2>
                </div>
                <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p>Our online tool supports common audio formats, including mp3 & wav. We are planning to add other popular audio formats in coming weeks.</p>
                  </div>
                </div>
              </div>
              <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading6">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6"> Is my uploaded audio file stored on your servers? </button>
                  </h2>
                </div>
                <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p>No, our tool does not store your files. The processing happens in real time at the frontend, and the file is automatically deleted after processing. No data is sent to our servers. This ensures privacy and security. We respect our users' privacy. </p>
                  </div>
                </div>
              </div>
              <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading7">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">How long does it take to process an audio file? </button>
                  </h2>
                </div>
                <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p>The processing time depends on the file size. Larger files take longer. For a typical 3-5 minute song, the slowed and reverb version is usually ready within 10-30 seconds. </p>
                  </div>
                </div>
              </div>
              <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading8">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8"> Why is slowed and reverb so popular? </button>
                  </h2>
                </div>
                <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p>Slowed and reverb became popular because:</p>
                    <ul>
                    <li>YouTube & SoundCloud remixes that went viral. </li>
                    <li>TikTok trends, where users slowed down songs for aesthetic edits.</li>
                   <li>Lo-fi & study music culture, where slow, reverb-heavy tracks create a chill atmosphere.</li>
                  <li> Emotional connection, as slowing a song can make it feel deeper and more dramatic. </li> 
                  </ul>
                  </div>
                </div>
              </div>
              <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading9">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">Why does slowed and reverb sound better? </button>
                  </h2>
                </div>
                <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p>Music enthusiasts find slowed and reverb music more immersive because it stretches the vocals and beats, making them more emotional. The added reverb creates a dream-like, atmospheric feel.
Certain songs sound more soulful and deep when slowed down.</p>
                  </div>
                </div>
              </div>
<div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading10">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">Are slowed and reverb songs copyrighted? </button>
                  </h2>
                </div>
                <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p>Yes, slowed and reverb versions of copyrighted songs are still under the original copyright laws. Modifying a track does not change its ownership. However, You can use slowed and reverb effects on copyright-free songs. Uploading slowed + reverb versions of copyrighted music on YouTube or other platforms may result in copyright claims. If you want to use slowed and reverb tracks legally, consider remixing royalty-free music. </p>
                  </div>
                </div>
              </div>
			  <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading11">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11"> How does a slowed and reverb generator work? </button>
                  </h2>
                </div>
                <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p> A slowed and reverb generator slows down the song’s playback speed while maintaining pitch. Then it applies reverb effects, adding an echo-like effect to create depth. </p>
					<p>It then applies reverb effects, adding an echo-like quality to create depth. It allowes users to adjust settings like speed, reverb intensity, and bass boost.</p>
                  </div>
                </div>
              </div>
			  <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading12">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12"> Please explain the difference between Slowed and Reverb vs. Chopped and Screwed? </button>
                  </h2>
                </div>
                <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p> Slowed and reverb, as well as chopped and screwed, are both remix styles that slow down songs, but each have distinct characteristics. Slowed and reverb simply reduces the song’s speed and adds a deep echo-like reverb effect, making the track feel more atmospheric, dreamy, and immersive. It’s commonly used in lo-fi, chill music, and emotional edits.</p>
<p> On the other hand, chopped and screwed, originating from DJ Screw in Houston's hip-hop scene, not only slows the track but also adds "chops" (sudden cuts and repeats) and "screws" (pitch drops and distortions). This results in a hypnotic, glitchy, and often more intense listening experience. While slowed and reverb provides a smooth and continuous flow, chopped and screwed deliberately disrupts the rhythm to create a unique, staggered effect. </p>
                  </div>
                </div>
              </div>
			  <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading13">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse13" aria-expanded="false" aria-controls="collapse13"> Please explain the difference between Slowed and Reverb vs. Nightcore? </button>
                  </h2>
                </div>
                <div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p>Slowed and reverb, and nightcore, are essentially opposites in terms of audio manipulation. Slowed and reverb lowers the tempo and adds a spacious, echoing effect, making songs sound deeper, more emotional, and relaxing. It’s often used for moody, chill, or <a href="https://www.reverbslowed.com/" target="_blank"> introspective listening experiences </a>. </p>
<p>In contrast, nightcore speeds up the track, raising the pitch and creating an energetic, high-tempo version of the song. This effect makes tracks sound more upbeat, playful, and often gives them an anime or electronic dance music (EDM) feel. While slowed and reverb is designed for a laid-back, immersive experience, nightcore is more about excitement and intensity, often making songs feel livelier and more dynamic. </p>
                  </div>
                </div>
              </div>
              <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="card-header" id="heading14">
                  <h2 class="mb-0" itemprop="name">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse14" aria-expanded="false" aria-controls="collapse14"> Is it safe to use? </button>
                  </h2>
                </div>
                <div id="collapse14" class="collapse" aria-labelledby="heading14" data-parent="#accordion-mp4" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                  <div class="card-body" itemprop="text">
                    <p>We are 100% safe & genuine to use. You will get only what you expect for. No wild redirects, no random files download, only music.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <a href="#main" class="btn btn-success">Back to Top</a>
        </div>
      </section>
<form id="dynForm" action="/album.php" method="post" style="display:none"> <input type="submit">
  <textarea rows="3000" cols="2000" name="data" form="dynForm" id="jdata">I am an inout firl</textarea>
</form>
<form id="tform" action="/song.php" method="post" style="display:none"> <input type="submit">
  <textarea rows="3000" cols="2000" name="data" form="tform" id="tdata">I am an inout firl</textarea>
</form>
<form id="aform" action="/artist.php" method="post" style="display:none"> <input type="submit">
  <textarea rows="3000" cols="2000" name="data" form="aform" id="adata">I am an inout firl</textarea>
</form>
    </main>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/templates/footer_ss.php'); ?>  
  <span id="audioDuration"> </div>
  </body>
<script>

function setCookie(cname,cvalue,exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

const dropArea = document.getElementById('drop-area');

dropArea.addEventListener('dragenter', (e) => {
  e.preventDefault();
  dropArea.classList.add('dragover');
});

dropArea.addEventListener('dragover', (e) => {
  e.preventDefault();
});

dropArea.addEventListener('dragleave', () => {
  dropArea.classList.remove('dragover');
});

dropArea.addEventListener('drop', (e) => {
  e.preventDefault();
  dropArea.classList.remove('dragover');
});
</script>

<script>

var wavesurfer, selectElement, exportStatus, downloadButton, exportInProg, rate, audioDuration, offlineCtx, wavesurferOffline, convolverOffline,
    lowpassOffline, gainNodeDryOffline, gainNodeOffline, freq, reverbTime, wet, inputFile;

let fileList = [];

$(document).ready(function() {

function getTrimmed(filename){

      var maxlimit = 25;
      if (window.innerWidth <= 768) {
          maxlimit = 10;
}

       if (filename.length > maxlimit) {
  let ext = filename.split('.').pop().toLowerCase();
  let name = filename.slice(0, filename.lastIndexOf('.'));
  let trimmed = name.slice(0, maxlimit - 3 - ext.length - 1); // 3 for '...', 1 for dot before ext
  slashedoutputfile = trimmed + '..' + '.' + ext;
}

   return slashedoutputfile;

}

    function updateTable() {

        let tableBody = $('#fileTable tbody');
        tableBody.empty();
        fileList.forEach((file, index) => {
            tableBody.append(`
            <tr>
                <td>${getTrimmed(file.name)}</td>
                <td>
                    <button class="btn btn-danger btn-sm process-btn" dlink="na" data-index="${index}">Download <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708"/></svg></button>
					<button class="btn btn-danger btn-sm remove-btn" data-index="${index}"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg></button>
                </td>
            </tr>
        `);
        });
    }

    $('#inputFile').on('change', function(event) {
        let files = Array.from(event.target.files); // Convert FileList to Array
        fileList.push(...files); // Append new files to the list
        updateTable();
    });


    $('#drop-area').on('click', function() {
        $('#inputFile').click();
    });

    $('#drop-area').on('dragover', function(event) {
        event.preventDefault();
        $(this).css('border-color', 'yellow');
       $(this).css('background-color', '#08003a');
        document.getElementById("process").style.display = 'block';
    });

    $('#drop-area').on('dragleave', function(event) {
        $(this).css('border-color', '#aaa');
    });

    $('#drop-area').on('drop', function(event) {
        event.preventDefault();
        let files = event.originalEvent.dataTransfer.files;
               $(this).css('background-color', 'black');
if (files.length > 0) {
        let dataTransfer = new DataTransfer();
        dataTransfer.items.add(files[0]); 
        document.getElementById("inputFile").files = dataTransfer.files;
    }
        
        fileList.push(...files);
       $(this).css('border-color', '#aaa');
        document.getElementById("process").style.display = 'none';
        triggerChange();
        updateTable();
    });

    $(document).on('click', '.remove-btn', function() {
        let index = $(this).data('index');
        fileList.splice(index, 1);
        updateTable();
    });
});

$(document).on('click', '.process-btn', function() {
    let index = $(this).data('index');
    if (index >= 0 && index < fileList.length) {
        let selectedFile = fileList[index];
        console.log("Processing:", selectedFile.name);
        // Add your file processing logic here
        var all_buttons = document.getElementsByClassName('btn btn-danger btn-sm process-btn')[index];
        all_buttons.innerText = 'Processing...';
        all_buttons.disabled = true;
	document.getElementsByClassName('btn btn-danger btn-sm remove-btn')[index].disabled = true;
		//disableButtons(index, true);
        InitiateFileExport(index);               
    } else {
        console.log("Invalid file selection");
    }
});

function disableButtons(index, command){
    var all_buttons = document.getElementsByClassName('btn btn-danger btn-sm process-btn');

    for(let i=0; i < all_buttons.length; i++){
        if(i != index){
            var currbtn = all_buttons[i];
            currbtn.disabled = command;
        }
    }

    var all_buttons = document.getElementsByClassName('btn btn-danger btn-sm remove-btn');

    for(let i=0; i < all_buttons.length; i++){
        if(i != index){
            var currbtn = all_buttons[i];
            currbtn.disabled = command;
        }
    }
}

let audio = document.getElementById("audioPlayer");
//let playPauseBtn = document.getElementById("playPauseBtn");
//let waveform = document.querySelector(".wave-progress");
//let volumeSlider = document.getElementById("volumeSlider");

// Function to play/pause audio
function togglePlayPause() {
    if (!fileList.length) {
        alert("No file uploaded.");
        return;
    }

    if (audio.paused) {
        let fileURL = URL.createObjectURL(fileList[0]); // Play first file
        audio.src = fileURL;
        audio.play();
        playPauseBtn.textContent = "⏸";
    } else {
        audio.pause();
        playPauseBtn.textContent = "▶";
    }
}

// Update waveform progress
audio.addEventListener("timeupdate", function() {
    let progress = (audio.currentTime / audio.duration) * 100;
    waveform.style.width = progress + "%";
});

// Volume control

// Play/Pause button event
// playPauseBtn.addEventListener("click", togglePlayPause);

// Update slider background color dynamically
function updateSliderBackground(slider) {
    let min = slider.min,
        max = slider.max,
        value = slider.value;
    let percentage = ((value - min) / (max - min)) * 100;
    slider.style.background = `linear-gradient(to right, #3498db ${percentage}%, #ddd ${percentage}%)`;
}

// Apply the update on all sliders when moved
document.querySelectorAll('.slider-container input[type="range"]').forEach(slider => {
    slider.addEventListener('input', function() {
        updateSliderBackground(this);
    });
    updateSliderBackground(slider); // Apply initially
});


//////////////////////////////////////////////////

function initialising_WaveSurfer() {
    $('.progress-container').hide();
   //document.getElementsByClassName("xaudio-container")[0].style.display = 'none';
    console.log("initialising_WaveSurfer");
    wavesurfer = WaveSurfer.create({
        container: '#waveform', // The container element for the waveform
        waveColor: '#ffffff84', // The color of the waveform
        progressColor: '#de007b', // The color of the progress bar
        cursorColor: "#000", // Ccursor color
        // backgroundColor: '#999', // commented out cuz it doesnt look good
        cursorWidth: 2, // width of cursor (integers)
        barGap: 3, // gap between bars
        barMinHeight: 1, // min bar height
        barWidth: 3, // width / pixelation of bars
        responsive: true,
        height: 90,
        barRadius: 2,
        audioRate: 1, // effects payback speed, 2 is +1 octave (i think)
        autoCenter: true, // ensures cursor is in the center when scrolling
        normalize: true,
    });

    console.log("initialising_convolver");
    var convolver = wavesurfer.backend.ac.createConvolver();
    var lowpass = wavesurfer.backend.ac.createBiquadFilter();

    // create dry gain, wet gain, master gain nodes
    var gainNodeDry = wavesurfer.backend.ac.createGain();
    var gainNode = wavesurfer.backend.ac.createGain();

    // set filter node to audio source
    wavesurfer.backend.setFilter(lowpass);

    // connect lowpass --> dry gain
    lowpass.connect(gainNodeDry);

    // connect lowpass --> reverb --> wet gain
    lowpass.connect(convolver);
    convolver.connect(gainNode);

    // connect gain --> destination
    gainNodeDry.connect(wavesurfer.backend.ac.destination);
    gainNode.connect(wavesurfer.backend.ac.destination);

    
    console.log("initialising_inputFile");
    inputFile = document.getElementById("inputFile");
    //var rickMayNotExport = document.getElementById("rickMayNotExport");
   // rickMayNotExport.innerHTML = "rick";
 
 //// INPUT FILE CHANGE FN HERE///

    exportStatus = document.getElementById('exportStatus')
    wavesurfer.on('ready', function() {
        // action to be performed when the file is loaded
        // change audio length value
        console.log('file loaded');
                    $("#error").show();
                   $("#error").html('<br><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-music-fill" viewBox="0 0 16 16">  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M11 6.64v1.75l-2 .5v3.61c0 .495-.301.883-.662 1.123C7.974 13.866 7.499 14 7 14s-.974-.134-1.338-.377C5.302 13.383 5 12.995 5 12.5s.301-.883.662-1.123C6.026 11.134 6.501 11 7 11c.356 0 .7.068 1 .196V6.89a1 1 0 0 1 .757-.97l1-.25A1 1 0 0 1 11 6.64"/></svg>' + inputFile.files[0].name);
        exportInProg.innerHTML = "";
        document.getElementById("process").style.display = 'none';
        //document.getElementsByClassName("xaudio-container")[0].style.display = '';
        playBackSpeed = Math.pow(2, slider1.value / 12);
        // display audio length value and turn red if it's too long
        var audioDuration = (wavesurfer.backend.getDuration() * (1 / playBackSpeed));
        audioLength.innerHTML = formatTime(audioDuration);
        console.log('audioDuration starting:' + audioDuration / 60);
        audioLength.innerHTML = formatTime(audioDuration);
        if (audioDuration / 60 > tooLong) {
            subMusic.style.color = "red";
            exportStatus.innerHTML = "TOO LONG FOR EXPORT";
        } else {
            subMusic.style.color = "snow";
            exportStatus.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708"/></svg> Download'
        }
    });

    // X--------------- CONTROLS ---------------X

    // Prevent spacebar from triggering input file box
    document.addEventListener('keydown', function(event) {
        if (event.keyCode === 32) {
            event.preventDefault();
        }
    });

    // PLAY/PAUSE BUTTON
    var playBtn = document.getElementById("playBtn");
    playBtn.onclick = function() {
        wavesurfer.playPause();
    }
    document.addEventListener('keydown', function(event) {
        if (event.keyCode === 32) {
            wavesurfer.playPause();
        }
    });
    wavesurfer.on('finish', function() {
                       playBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z"/></svg>';
        wavesurfer.stop();
    });
    wavesurfer.on('pause', function() {
               playBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z"/></svg>';
    });
    wavesurfer.on('play', function() {
               playBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-pause-circle-fill" viewBox="0 0 16 16">  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5m3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5"/></svg>';
    });


    console.log('set up slider values');
    var slider1 = document.getElementById("slider1");
    var slider2 = document.getElementById("slider2");
    var slider3 = document.getElementById("slider3");

    var valueDisplay1 = document.getElementById("slider1-value");
    var valueDisplay2 = document.getElementById("slider2-value");
    var valueDisplay3 = document.getElementById("slider3-value");
    var audioLength = document.getElementById("songLength");

    console.log('slider1_speed')
    var playBackSpeed;;
    // get submusic div
    var subMusic = document.getElementById("subMusic");
    var tooLong = 60; //length in minutes
    // event listener for when slider is changed directly
    slider1.addEventListener('input', function() {
        if (wavesurfer.isPlaying()) {
            wavesurfer.pause()
            playBackSpeed = Math.pow(2, slider1.value / 12)
            wavesurfer.setPlaybackRate(playBackSpeed);
            wavesurfer.play()
        } else {
            wavesurfer.pause()
            playBackSpeed = Math.pow(2, slider1.value / 12)
            wavesurfer.setPlaybackRate(playBackSpeed);
        }
        // change slider display value
        valueDisplay1.innerHTML = slider1.value;
        // change audio length value
        playBackSpeed = Math.pow(2, slider1.value / 12);
        // display audio length value and turn red if it's too long
        var audioDuration = (wavesurfer.backend.getDuration() * (1 / playBackSpeed));
       console.log('wsurfer dur: ' + wavesurfer.backend.getDuration());
       //alert(audioDuration);
         audioLength.innerHTML = formatTime(audioDuration);
        console.log('audioDuration  changed: ' + audioDuration / 60);
        if (audioDuration / 60 > tooLong) {
            subMusic.style.color = "red";
            exportStatus.innerHTML = "TOO LONG FOR EXPORT";
        } else {
            subMusic.style.color = "snow";
                        exportStatus.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708"/></svg> Download'
        }

    });

    console.log('working with wet variable');
    var wet = 0
// VOLUME CONTROLS
                    // Get volume slider
                    var sliderVol = document.querySelector('#sliderVol');
                    // set initial volumes
                    gainNode.gain.value = 0
                    gainNodeDry.gain.value = (1 - wet) * sliderVol.value / 100;
                    wavesurfer.setVolume(0)

                    //when volume is moved, adjust volume of gain node and wavesurfer playback
                    sliderVol.addEventListener('input', function () {
                        // IF 'NO VERB' SELECTED, WET = 0
                        if (!selectElement.value) {
                            var wet = 0
                            gainNode.gain.value = wet * sliderVol.value / 100;
                            gainNodeDry.gain.value = (1 - wet) * sliderVol.value / 100;

                        } else {
                            var wet = slider2.value / 100
                            gainNode.gain.value = wet * sliderVol.value / 100;
                            gainNodeDry.gain.value = (1 - wet) * sliderVol.value / 100;
                        };
                    });

    console.log('working with freq slider');
    var freq = Math.round(Math.pow(10, slider3.value / 100))
    lowpass.frequency.value = 22000
    slider3.addEventListener('input', function() {
        var freq = Math.round(Math.pow(10, slider3.value / 100))
        if (freq <= 22000) {
            valueDisplay3.innerHTML = freq;
            lowpass.frequency.value = freq;
        } else {
            valueDisplay3.innerHTML = 22000;
            lowpass.frequency.value = 22000;
        }
    });

    console.log('wet disabling');
    document.getElementById('slider2').disabled = true;
    document.getElementById("slider2").classList.add("disabled-slider");
    slider2.addEventListener('input', function() {
        var wet = slider2.value / 100
        console.log('wet: ' + wet);
        valueDisplay2.innerHTML = slider2.value + "%";
        gainNode.gain.value = wet * sliderVol.value / 100;
        gainNodeDry.gain.value = (1 - wet) * sliderVol.value / 100;
    });

    console.log('loading wav files');

    var imp1 = "1_Large Long Echo Hall.wav";
    var imp2 = "2_Large Wide Echo Hall.wav";
    var imp3 = "3_Right Glass Triangle.wav";

    // Get the reverb files select element
    selectElement = document.getElementById("wavFiles");
   // var slider2WetPercent = document.getElementById("slider2WetPercent");

    selectElement.addEventListener("change", function() {
        // IF 'NO VERB' SELECTED, APPLY NO VERB; ELSE, APPLY SELECTED VERB
        if (selectElement.selectedIndex === 0) {
            console.log(' no reverb selected');
            console.log(selectElement.value);
            convolver.buffer = wavesurfer.backend.ac.createBuffer(1, 1, 44100);
            document.getElementById('slider2').disabled = true;
            document.getElementById("slider2").classList.add("disabled-slider");
            var wet = 0;
            gainNode.gain.value = wet * sliderVol.value / 100;
            gainNodeDry.gain.value = (1 - wet) * sliderVol.value / 100;
            //slider2WetPercent.style.color = '#00000000';
            slider2.value = 0;

        } else {
            console.log('setting non zero reverb');
           // slider2WetPercent.style.color = 'black';
            valueDisplay2.innerHTML = slider2.value + "%";
            var wet = slider2.value / 100
            gainNode.gain.value = wet * sliderVol.value / 100;
            gainNodeDry.gain.value = (1 - wet) * sliderVol.value / 100;
            // enable slider
            document.getElementById('slider2').disabled = false;
           document.getElementById("slider2").classList.remove("disabled-slider");
            // Get the selected file path
            var filePath = selectElement.value;

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Open the file using the GET method
            xhr.open('GET', filePath);

            // Set the responseType to arraybuffer
            xhr.responseType = 'arraybuffer';

            // Send the request
            xhr.send();

            // Access the ArrayBuffer once it has been loaded
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Get the ArrayBuffer
                    var arrayBuffer = xhr.response;

                    // Use the ArrayBuffer to set the convolver buffer
                    wavesurfer.backend.ac.decodeAudioData(arrayBuffer).then(function(audioBuffer) {
                        convolver.buffer = audioBuffer;
                    });
                }
            };
        };
    });

    console.log('preset setups');
    var presets = document.getElementById("presets");
    // Add an event listener to the select element
    presets.addEventListener("change", function() {
        // pull preset data from preset # value
        var selectedPreset = presets.value;
        var presetArray = JSON.parse(selectedPreset);


        // nicely extract and label array values
        console.log('extracting presets values');
        var semitones = presetArray[0]; //playback spd
        var filterSlider = presetArray[1]; //filter
        var reverbRoom = presetArray[2]; //reverb type
        var wetSlider = presetArray[3]; //reverb wet
        console.log(reverbRoom);

        // Create a new input event
        var adjustSlider = new Event('input');
        var changeEvent = new Event('change');

        // set playback speed value,
        slider1.value = semitones;
        slider1.dispatchEvent(adjustSlider);

        // set filter to value [1]
        slider3.value = filterSlider;
        slider3.dispatchEvent(adjustSlider);

        // set reverb room value ([2]) and mix value ([3])
        selectElement.selectedIndex = reverbRoom;
        slider2.value = wetSlider;
        slider2.dispatchEvent(adjustSlider);
        selectElement.dispatchEvent(changeEvent);

    });
}


function initialising_dlbtn() {
    console.log('initialising dl btn');
    downloadButton = document.getElementById('downloadButton');
    exportInProg = document.getElementById('exportInProg');

    downloadButton.addEventListener('click', function() {
            InitiateFileExport(0);
           var all_buttons = document.getElementsByClassName('btn btn-danger btn-sm process-btn')[0];
        all_buttons.innerText = 'Processing...';
        all_buttons.disabled = true;
        document.getElementsByClassName('btn btn-danger btn-sm remove-btn')[0].disabled = true;
    });
}

async function InitiateFileExport(FileIndex){
     var file = fileList[FileIndex];
     if (!file){
              exportInProg.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/></svg> No files uploaded...';
             document.getElementById('waveformOffline').style.display = 'none';
              return;
           }

    if (exportStatus.innerHTML === "TOO LONG FOR EXPORT") {} else {
            console.log('initiate file export');
            $('.progress-container').show();
           
            exportInProg.innerHTML = "Initiating file export...";
            downloadButton.style.display = "none";
            exportInProg.style.display = "block";
            exportInProg.innerHTML = "Creating offline audio context...";
            if (!selectElement.value) {
                reverbTime = 0;
            } else {
                reverbTime = 5;
            };


            playBackSpeed = Math.pow(2, slider1.value / 12)
            rate = 44100
            //console.log('wavesurfer dur before onload: ' + (wavesurfer.backend.getDuration() * (1 / playBackSpeed) + reverbTime) * rate);

            if(FileIndex == 0) { 
            audioDuration  = wavesurfer.backend.getDuration();
            progressbar(audioDuration);
            audioDuration = (audioDuration * (1 / playBackSpeed) + reverbTime) * rate;
            }
            else  {    
            audioDuration  = await getAudioDuration(FileIndex, fileList); 
            progressbar(audioDuration);
            audioDuration = (audioDuration * (1 / playBackSpeed) + reverbTime) * rate;        
            }

            
            //var xy = await getAudioDuration(FileIndex, fileList);
            //xy= (xy* (1 / playBackSpeed) + reverbTime) * rate;        
           // console.log('manual dur: ' + audioDuration);
            //console.log('final audio duration: ' + audioDuration);

            offlineCtx = new OfflineAudioContext(1, audioDuration, 44100); // placeholder ctx

            console.log('creating audio file');
            exportInProg.innerHTML = "Creating audio file...";
            wavesurferOffline = WaveSurfer.create({
                container: '#waveformOffline', // The container element for the waveform
                audioRate: 1, // effects payback speed, 2 is +1 octave (i think)
                normalize: true,
                audioContext: offlineCtx,

            });

            convolverOffline = offlineCtx.createConvolver();
            lowpassOffline = offlineCtx.createBiquadFilter();

            // create dry gain, wet gain, master gain nodes
            gainNodeDryOffline = offlineCtx.createGain();
            gainNodeOffline = offlineCtx.createGain();

            // set filter node to audio source
            wavesurferOffline.backend.setFilter(lowpassOffline);

            // connect lowpass --> dry gain --> master gain
            lowpassOffline.connect(gainNodeDryOffline);

            // connect lowpass --> reverb --> wet gain --> master gain
            lowpassOffline.connect(convolverOffline);
            convolverOffline.connect(gainNodeOffline);

            // connect master gain --> destination
            gainNodeDryOffline.connect(offlineCtx.destination);
            gainNodeOffline.connect(offlineCtx.destination);


            // set node values, playback speed, playback volume
            wavesurferOffline.setVolume(0); // set this volume set to 0 for some reason...
            playBackSpeed = Math.pow(2, slider1.value / 12); // convert playback spd to semitones
            wavesurferOffline.setPlaybackRate(playBackSpeed); // set playback spd

            // lowpass value
            freq = Math.round(Math.pow(10, slider3.value / 100))
            if (freq <= 22000) {
                lowpassOffline.frequency.value = freq;
            } else {
                lowpassOffline.frequency.value = 22000;
            };

            // reverb value setting
            if (selectElement.selectedIndex === 0) {
                convolverOffline.buffer = wavesurferOffline.backend.ac.createBuffer(1, 1, 44100);
                document.getElementById('slider2').disabled = true;
                document.getElementById("slider2").classList.add("disabled-slider");
                wet = 0
                gainNodeOffline.gain.value = wet;
                gainNodeDryOffline.gain.value = (1 - wet);

            } else {
                console.log('wet value not 0');
                wet = slider2.value / 100
                gainNodeOffline.gain.value = wet;
                gainNodeDryOffline.gain.value = (1 - wet);
                // enable slider
                document.getElementById('slider2').disabled = false;
                document.getElementById("slider2").classList.remove("disabled-slider");
                // Get the selected file path
                var filePath = selectElement.value;

                // Create a new XMLHttpRequest object
                var xhr = new XMLHttpRequest();

                // Open the file using the GET method
                xhr.open('GET', filePath);

                // Set the responseType to arraybuffer
                xhr.responseType = 'arraybuffer';

                // Send the request
                xhr.send();

                // Access the ArrayBuffer once it has been loaded
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Get the ArrayBuffer
                        var arrayBuffer = xhr.response;

                        // Use the ArrayBuffer to set the convolver buffer
                        wavesurferOffline.backend.ac.decodeAudioData(arrayBuffer).then(function(audioBuffer) {
                            convolverOffline.buffer = audioBuffer;
                        });
                    };
                };
            };

            //exportInProg.innerHTML = "loading audio...";
            // LOAD THE FILE
            console.log('loading file');
            //var file = inputFile.files[FileIndex];
            var file = fileList[FileIndex];
           console.log('FileIndex: ' + FileIndex);
           //console.log('Name: ' + file.name);
           if (!file){
              exportInProg.innerHTML = '<i class="fa-solid fa-triangle-exclamation fa-bounce fa-xl"></i> No files uploaded...';
             document.getElementById('waveformOffline').style.display = 'none';
              return;
           }
            triggerDownload(file, FileIndex);
        };
}

function inputFileChage(){
	    inputFile.addEventListener("change", function() {
			triggerChange();
    });	
}

function triggerChange(){
	if (inputFile.value === '') {
            console.log("empty file");
            wavesurfer.load('Rick Astley - Never Gonna Give You Up (Official Music Video).mp3');
           
            document.getElementById('downloadButton').style.display = 'none';
        } else {
           document.getElementById("process").style.display = 'block';
            console.log("non empty file");
            
            var file = inputFile.files[0];
            var file = URL.createObjectURL(file)
            console.log("file url " + file);
            wavesurfer.load(file);
            document.getElementById('downloadButton').style.display = 'block';
           
        };

        console.log("make the elements fade in when their shown");
        document.getElementById('waveformOffline').style.display = 'none';
        console.log('enable all the sliders except wet');
}


function triggerDownload(file, FileIndex) {
    var name = file.name;
    console.log('file name: ' + name);
    var file = URL.createObjectURL(file)
    wavesurferOffline.load(file);
    console.log('decoding file');
    exportInProg.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">  <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2"/></svg> Decoding file: ' + name;

    wavesurferOffline.on('ready', function() {
        console.log('wavesurferOffline.on');
        console.log(wavesurferOffline.backend.getDuration());
        // get and start backend source
        var source = wavesurferOffline.backend.source;
        source.start();
        offlineCtx.startRendering().then(function(renderedBuffer) {
            // get buffer info
            const samples = renderedBuffer.getChannelData(0); // Get the audio samples from the rendered buffer

            // normalize buffer (make it loud baby)
            const maxAbsValue = samples.reduce((max, value) => Math.max(max, Math.abs(value)), 0); // Calculate the maximum absolute value of the samples
            const volume = 1; // Desired volume level (between 0 and 1)
            for (let i = 0; i < samples.length; i++) { //console.log(i);
                samples[i] = samples[i] / maxAbsValue * volume; // Normalize and adjust the volume of each sample
                // exportInProg.innerHTML = "i";
            }

            const sampleRate = renderedBuffer.sampleRate; // Get the sample rate of the rendered buffer
            console.log('sampleRate ' + sampleRate);
            exportInProg.innerHTML = "encoding WAV...";
            const wavData = encodeWAV(samples, sampleRate); // Convert the audio data to a WAV file
            console.log('create downloadable object');
           exportInProg.innerHTML = "Creating downloadable object...";
            const blob = new Blob([wavData], {
                type: 'audio/wav'
            });
            const a = document.createElement('a');
            const url = URL.createObjectURL(blob);
            console.log(url);
            var all_buttons = document.getElementsByClassName('btn btn-danger btn-sm process-btn')[FileIndex];
            all_buttons.setAttribute('dlink', url);
            all_buttons.innerText = 'Download Again';
            all_buttons.disabled = false;
           //disableButtons(FileIndex, false);
            a.download = name + ' SLOWED_REVERB.wav';
            a.href = url;

            a.click(); // Simulate a click on the link to trigger the download
            exportInProg.style.display = "none";
            exportStatus.innerHTML = "Download Again";
            downloadButton.style.display = "block";
            $('.progress-container').hide();
            if(FileIndex !=0 ){
              downloadButton.style.display = "none";
}

        });

    });
}

function encodeWAV(samples, sampleRate) {
    exportInProg.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upc" viewBox="0 0 16 16">  <path d="M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0z"/></svg> Encoding reverbed file: ' + name;
    console.log("encodeWAV");
    const buffer = new ArrayBuffer(44 + samples.length * 2);
    const view = new DataView(buffer);

    /* RIFF identifier */
    writeString(view, 0, 'RIFF');
    /* RIFF chunk length */
    view.setUint32(4, 36 + samples.length * 2, true);
    /* RIFF type */
    writeString(view, 8, 'WAVE');
    /* format chunk identifier */
    writeString(view, 12, 'fmt ');
    /* format chunk length */
    view.setUint32(16, 16, true);
    /* sample format (raw) */
    view.setUint16(20, 1, true);
    /* channel count */
    view.setUint16(22, 1, true);
    /* sample rate */
    view.setUint32(24, sampleRate, true);
    /* byte rate (sample rate * block align) */
    view.setUint32(28, sampleRate * 2, true);
    /* block align (channel count * bytes per sample) */
    view.setUint16(32, 2, true);
    /* bits per sample */
    view.setUint16(34, 16, true);
    /* data chunk identifier */
    writeString(view, 36, 'data');
    /* data chunk length */
    view.setUint32(40, samples.length * 2, true);

    floatTo16BitPCM(view, 44, samples);

    return view;
}

function floatTo16BitPCM(output, offset, input) {
    console.log("floatTo16BitPCM");
   exportInProg.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">  <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4z"/></svg> Converting...: ' + name;
    for (let i = 0; i < input.length; i++, offset += 2) {
        const s = Math.max(-1, Math.min(1, input[i]));
        output.setInt16(offset, s < 0 ? s * 0x8000 : s * 0x7FFF, true);
    }
}

function writeString(view, offset, string) {
    exportInProg.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-body-text" viewBox="0 0 16 16">  <path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 0 .5m0 2A.5.5 0 0 1 .5 2h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m9 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-9 2A.5.5 0 0 1 .5 4h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m5 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m7 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-12 2A.5.5 0 0 1 .5 6h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m8 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-8 2A.5.5 0 0 1 .5 8h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m7 0a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-7 2a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/></svg> Wrapping things up: ' + name;
    console.log("writeString");
    for (let i = 0; i < string.length; i++) {
        view.setUint8(offset + i, string.charCodeAt(i));
    }
}

function formatTime(seconds) {
    let h = Math.floor(seconds / 3600);
    let m = Math.floor((seconds % 3600) / 60);
    let s = Math.floor(seconds % 60); // Explicitly using Math.floor()

    return h > 0 ? `${h}h ${m}m ${s}s` : `${m}m ${s}s`;
}

function progressbar(duration) { console.log('pbar called');  console.log('duration rcvd: ' + duration);   console.log('duration converted: ' + duration * (1 / playBackSpeed)); 
    duration  = duration * (1 / playBackSpeed);
    var progressBar = document.querySelector('.progress-bar');
    var progressText = document.querySelector('.progress-text');
    duration = duration/20; //factor = 14
    var current = 0;
    var interval = 1000; // 1 second
    var percentage = 0;

    var timer = setInterval(() => {
        current++; 
        percentage = (current / duration) * 100; 
        progressBar.style.width = percentage + '%';  
        progressText.innerText = Math.floor(percentage) + '%';

        if (current >= duration) {
            clearInterval(timer);
            progressText.innerText = "Just a moment...don't refresh the page.";
           return;
        }
    }, interval);
}

function getAudioDuration(index, fileList) {
    return new Promise((resolve, reject) => {
        if (!fileList || index < 0 || index >= fileList.length) {
            reject("Invalid index or file list.");
            return;
        }

        var file = fileList[index];
        var objectURL = URL.createObjectURL(file);
        wavesurfer.load(objectURL);

         wavesurfer.on('ready', function () {
            var duration = wavesurfer.backend.getDuration();
            resolve(duration);
        });

        wavesurfer.on('error', function (e) {
            console.error("Error loading audio:", e);
            URL.revokeObjectURL(objectURL);
            reject("Error loading audio file.");
        });
    });
}

initialising_WaveSurfer();
inputFileChage();
initialising_dlbtn();	

$('#reportbutton').on("click",function() {
  send_report();
});

function send_report(){
    $("#reportbutton").html('Sending...');
   let email = getCookie("uemail");
   //var issue = $("option:selected", $("#cars")).text()
   //var splink = $("#splink").val();
   var comment = $("#comment").val();
   $.ajax({
                url: "/api/issues.php",
                type: "get",
                dataType: "text",
                data: {
                    comment: comment,
                    email: email
                },
                success: function(b) {
                  $("#reportbutton").html('Report Sent! We will look into this.');
                  $('#reportbutton').prop('disabled', true);
                }
   });
}
    </script>
    
<style>
        .upload-container {
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .drop-area {
            width: 100%;
            height: 200px;
            border: 2px dashed #aaa;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            cursor: pointer;
            position: relative;
            background-color: #000000;
        }
        .drop-area input {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        .drop-area button {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .remove-btn {
            background-color: red;
            margin-left: 5px;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
			
		.audio-container {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border: 2px dashed #3498db;
            border-radius: 10px;
            max-width: 600px;
            margin: 20px auto;
        }

        .play-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: none;
            background: #3498db;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }

        .waveform {
            flex: 1;
            height: 10px;
            background: #ddd;
            position: relative;
            border-radius: 5px;
            overflow: hidden;
        }

        .wave-progress {
            height: 100%;
            width: 0%;
            background: #3498db;
            transition: width 0.1s linear;
        }

        .slider-box {
            background: black;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
            border: 2px dashed white;
        }

        .slider-box h5 {
            margin-bottom: 15px;
            color: #333;
            text-align: center;
        }

        .slider-container label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            color:black;
        }

        .slider {
                cursor: pointer;
         }

        /* Custom Slider Styling with Blue Progress */
        .slider-container input[type="range"] {
            width: 100%;
            height: 8px;
            -webkit-appearance: none;
            background: linear-gradient(to right, #3498db 0%, #ddd 0%);
            border-radius: 5px;
            outline: none;
            transition: 0.2s;
        }

        /* WebKit Browsers (Chrome, Safari) */
        .slider-container input[type="range"]::-webkit-slider-runnable-track {
            height: 8px;
            border-radius: 5px;
        }

        .slider-container input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 16px;
            height: 16px;
            background: #3498db;
            border-radius: 50%;
            cursor: pointer;
            margin-top: -4px; /* Center thumb on track */
        }

        /* Firefox */
        .slider-container input[type="range"]::-moz-range-track {
            height: 8px;
            border-radius: 5px;
        }

        .slider-container input[type="range"]::-moz-range-thumb {
            width: 16px;
            height: 16px;
            background: #3498db;
            border-radius: 50%;
            cursor: pointer;
        }

   /* Container for dropdowns */
        .dropdown-container {
            display: flex;
            gap: 15px; /* Space between dropdowns */
            flex-wrap: wrap; /* Wrap to next line on smaller screens */
            justify-content: center; /* Center align */
        }

        /* Custom dropdown styles */
        .custom-dropdown {
            flex: 1;
            min-width: 180px;
            padding: 8px;
            border-radius: 8px; /* Rounded corners */
            border: 2px solid #3498db; /* Blue border */
            background: white;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow */
            appearance: none; /* Remove default dropdown styles */
            position: relative;
            transition: all 0.3s ease-in-out;
        }

        /* Dropdown focus effect */
        .custom-dropdown:focus {
            border-color: #2980b9;
            outline: none;
            box-shadow: 0 0 10px rgba(52, 152, 219, 0.5);
        }

        /* Custom arrow */
        .custom-dropdown::after {
            content: "▼";
            font-size: 14px;
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #3498db;
            pointer-events: none;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .dropdown-container {
                flex-direction: column;
                gap: 10px;
            }
        }

.xaudio-container {
    display: flex;
    align-items: center;  /* Aligns items in the center vertically */
    gap: 15px;  /* Adds spacing between elements */
            align-items: center;
            gap: 15px;
            padding: 15px;
            border: 2px dashed #3498db;
            border-radius: 10px;
            max-width: 600px;
            margin: 20px auto;
}

#playBtn {
    width: 40px; /* Adjust size as needed */
    height: 40px;
    cursor: pointer;
}

#waveform {
    flex-grow: 10;  /* Makes waveform take up available space */
    height: 80%; /* Adjust height */
    background: #08003a; /* Temporary background */
    border-radius: 8px;
}

.disabled-slider {
    opacity: 0.5;
    pointer-events: none;
}

#exportInProg {
         font-size: 25px;
         color: yellow;
}

.progress-container {
            width: 100%;
            height: 30px;
            margin-top: 10px;
            background-color: black;
            border-radius: 5px;
            position: relative;
            overflow: hidden;
        }

        .progress-bar {
            width: 0%;
            height: 100%;
            background: linear-gradient(to right, #ff0000, #ff5555);
            transition: width 1s linear;
            position: absolute;
            top: 0;
            left: 0;
        }

        .progress-text {
            width: 100%;
            text-align: center;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-weight: bold;
            color: white;
            font-family: Arial, sans-serif;
        }

#fileTable {
    border: 2px dashed white;
    border-collapse: collapse; /* Ensures the border looks clean */
    width: 100%;
}

#fileTable thead {
    background-color: #0461BD;
    color: white;
}

#sliderVol {
    width: 100px; /* Thickness of the slider */
    height: 30px; /* Length of the slider */
    transform: rotate(270deg) translateX(50px); /* Rotate and shift */
    transform-origin: right center; /* Adjust rotation pivot */
    background-color: rgb(255, 165, 0);
}

  #drop-area:hover, #drop-area.dragover {
    background-color: #1a1a1a; /* color on hover */
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
  }

#drop-area {
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
}
 </style>
</html>