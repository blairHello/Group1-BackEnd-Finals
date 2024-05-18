//AUTOMATIC SCROLL-------------------------------------------------------------------------------------------------------------------------------
let timeoutId;
let currentDiv; // Change from const to let

const inactiveTime = 5000; // 5 seconds in milliseconds

const handleActivity = () => {
  clearTimeout(timeoutId);
  timeoutId = setTimeout(scrollToNextDiv, inactiveTime);
};

const scrollToNextDiv = () => {
  if (!currentDiv) {
    currentDiv = document.querySelector("div"); // Fallback to first div
  }
  const nextDiv = currentDiv.nextElementSibling;
  if (nextDiv) {
    nextDiv.scrollIntoView({ behavior: "smooth" });
    currentDiv = nextDiv;
  }
};

window.addEventListener("mousemove", handleActivity);
window.addEventListener("keydown", handleActivity);
window.addEventListener("click", handleActivity);

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
/*window.onload = function() {
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
      window.location.href = 'src/question.php';
    }, 4000); // 4 seconds delay
  });
  */

  // BUTTONS

<<<<<<< HEAD:GabayGinhawa/js/land.js
  function redirectToRegistration() {
    window.location.href = 'registration.php';
}

document.getElementById('but1').addEventListener('click', redirectToRegistration);
document.getElementById('but2').addEventListener('click', redirectToRegistration);
document.getElementById('but3').addEventListener('click', redirectToRegistration);

// NAVBAR

    function toggleMenu() {
      var navLinks = document.querySelector('.nav-links');
      navLinks.classList.toggle('show');
      }
      
      // Add an event listener to close the menu when a link is clicked
      document.querySelectorAll('.nav-links a').forEach(function(link) {
      link.addEventListener('click', function() {
      var navLinks = document.querySelector('.nav-links');
      navLinks.classList.remove('show');
      });
      });
          document.addEventListener('DOMContentLoaded', function() {
              // Get the profile hover element
              var profileHover = document.querySelector('.profile-hover');
          
              // Add a click event listener to toggle the 'clicked' class
              profileHover.addEventListener('click', function(event) {
                  this.classList.toggle('clicked');
                  event.stopPropagation(); // Prevent the click event from reaching the document
              });
          
              // Add a click event listener to the document to close the dropdown when clicking outside
              document.addEventListener('click', function(event) {
                  var dropdownContent = document.querySelector('.profile-hover .dropdown-content');
                  var isClickedInsideDropdown = profileHover.contains(event.target) || dropdownContent.contains(event.target);
          
                  if (!isClickedInsideDropdown) {
                      profileHover.classList.remove('clicked');
                  }
              });
          });
=======
    document.getElementById("button1").onclick = function () {
       window.location.href = '/src/terms_of_use.html';
    };
      document.getElementById("button2").onclick = function () {
        window.location.href = "/src/terms_of_use.html";
    };
      document.getElementById("button3").onclick = function () {
        window.location.href = "/src/registration.php";
    };

>>>>>>> d8e852937feb1c509330a1fccefbdd64e8fb4fad:js/land.js

  