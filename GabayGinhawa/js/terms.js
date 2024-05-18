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