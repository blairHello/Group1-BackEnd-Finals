<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GabayGinhawa | Health Wellnes Tracker</title>
    <link rel="icon" type="image/x-icon" href="/assets/GabayGinhawa-logo.png" />
    <link type="css" rel="stylesheet" href="/css/land.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <div id="Container1">
      <div id="landcont1" class="hidden">
        <h1 class="welcome poppins-black hidden">Ang iyong</h1>
        <h1 class="welcome poppins-black-italic hidden">Health Kasanga!</h1>
      </div>
      <div id="landcont2">
        <div class="landtext1cont hidden">
          <h1 class="landtext1 poppins-black">MANATILING</h1>
          <h1 class="landtext1 poppins-black">MALUSOG</h1>
        </div>
        <div class="landtext2cont">
          <h3 class="landtext2 poppins-semibold hidden">Sa Pagkain.</h3>
          <h3 class="landtext2 poppins-semibold hidden">Sa Pagtulog.</h3>
          <h3 class="landtext2 poppins-semibold hidden">Sa Pag-ensayo.</h3>
          <h3 class="landtext2 poppins-semibold hidden">Sa Pang-Kabuoan.</h3>
        </div>

        <div id="landimgbox">
          <div class="landimg1 hidden">
            <img class="img1" src="/assets/food-img.jpg" alt="" />
          </div>
          <div class="landimg2 hidden">
            <img class="img1" src="/assets/workout-img2.jpg" alt="" />
          </div>
          <div class="landimg3 hidden">
            <img class="img1" src="/assets/sleep-img.jpg" alt="" />
          </div>
        </div>

        <div class="button1 hidden">
          <button id="but1" class="start poppins-semibold">
            Get Started
            <div class="arrow-wrapper">
              <div class="arrow"></div>
            </div>
          </button>
        </div>
      </div>

      <div id="landcont3">
        <div class="landcont4">
          <div class="slider">
            <div class="slide-track">
              <div class="slide">
                <img class="slideimg" src="/assets/infinite-img.jpg" />
              </div>
              <div class="slide">
                <img class="slideimg" src="/assets/infinite-img2.jpg" />
              </div>
              <div class="slide">
                <img class="slideimg" src="/assets/infinite-img3.jpg" />
              </div>
              <div class="slide">
                <img class="slideimg" src="/assets/infinite-img4.jpg" />
              </div>
              <div class="slide">
                <img class="slideimg" src="/assets/infinite-img5.jpg" />
              </div>
              <div class="slide">
                <img class="slideimg" src="/assets/infinite-img6.jpg" />
              </div>
              <div class="slide">
                <img class="slideimg" src="/assets/infinite-img7.jpg" />
              </div>
              <div class="slide">
                <img class="slideimg" src="/assets/infinite-img.jpg" />
              </div>
            </div>
          </div>
        </div>
        <div class="landcont5">
          <div id="landtext3" class="poppins-black hidden">
            Taasan ang Hangad
          </div>
          <div id="button2" class="button2 hidden">
            <button class="start2 poppins-semibold">
              Sign-up
              <div class="arrow-wrapper2">
                <div class="arrow2"></div>
              </div>
            </button>
          </div>
        </div>
      </div>

      <div id="landcont4">
        <div class="landtext5">
          <h1 class="landtext4 poppins-black hidden">
            Ano pang hinihintay mo?
          </h1>
          <h1 class="landtext4 poppins-black hidden">Libre 'To!</h1>
        </div>

        <div id="button3" class="button3 poppins-semibold hidden">
          <button class="start3 poppins-semibold">Sign up Now!</button>
        </div>
      </div>
    </div>

    <div id="loader" style="display: none">
      <img id="loadimage" src="/assets/GabayGinhawa-logo.png" />
    </div>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
  ></script>
  <script src="/js/land.js"></script>
</html>
