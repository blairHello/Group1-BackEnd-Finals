function showPage(pageId) {
    // Hide all pages
    document.getElementById('personal').style.display = 'none';
    document.getElementById('activity').style.display = 'none';
    document.getElementById('foodandwater').style.display = 'none';
    document.getElementById('sleep').style.display = 'none';
    document.getElementById('finish').style.display = 'none';
    // Show the selected page
    document.getElementById(pageId + 'Page').style.display = 'block';
  }