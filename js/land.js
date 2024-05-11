//AUTOMATIC SCROLL-------------------------------------------------------------------------------------------------------------------------------
let timeoutId;
const inactiveTime = 5000; // 5 seconds in milliseconds

const handleActivity = () => {
  clearTimeout(timeoutId);
};

const scrollToNextDiv = () => {
  const currentDiv = document.querySelector(":focus"); // Get currently focused div (if any)
  if (!currentDiv) {
    currentDiv = document.querySelector("div"); // Fallback to first div
  }
  const nextDiv = currentDiv.nextElementSibling;
  if (nextDiv) {
    nextDiv.scrollIntoView({ behavior: "smooth" });
  }
};

window.addEventListener("mousemove", handleActivity);
window.addEventListener("keydown", handleActivity);
window.addEventListener("click", handleActivity);

// Start the timer initially
timeoutId = setTimeout(scrollToNextDiv, inactiveTime);

//Welcome screen-------------------------------------------------------------------------------------------------------------------------------
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    console.log(entry)
    if (entry.isIntersecting) {
      entry.target.classList.add('show');
    } else { 
      entry.target.classList.remove('show');
    }
  });
});
const hiddenElements = document.querySelectorAll('.hidden');
hiddenElements.forEach((el) => observer.observe(el));

//LOADER-------------------------------------------------------------------------------------------------------------------------------
window.onload = function() {
  var loader = document.getElementById('loader');
  var content = document.getElementById('Container1');

  // Show loader
  loader.style.display = 'block';

  // Simulate time for content to load (you can replace this with actual loading logic)
  setTimeout(function() {
    // Hide loader
    loader.style.opacity = '0'; // Fade out loader
    content.style.display = 'block'; // Show content
    setTimeout(function() {
      loader.style.display = 'none'; // Hide loader completely after fade out animation
    }, 1000); // Adjust the duration of the fade out animation
  }, 3000); // Adjust the time for the content to load
};


document.getElementById('start').addEventListener('click', function() {
    // Hide the button
    this.style.display = 'none';
  
    // Show the loader
    var loader = document.getElementById('loader');
    loader.style.display = 'flex';
  
    // After some delay, redirect to the next page
    setTimeout(function() {
      window.location.href = '/WEBDEB2/wow/question.html';
    }, 4000); // 4 seconds delay
  });
  

  // BUTTONS

    document.getElementById("button1").onclick = function () {
        location.href = "www.yoursite.com";
    };
      document.getElementById("button2").onclick = function () {
        location.href = "www.yoursite.com";
    };
      document.getElementById("button3").onclick = function () {
        location.href = "www.yoursite.com";
    };


  