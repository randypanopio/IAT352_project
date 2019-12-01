
function openSidebar() {
  document.getElementById("mySidebar").style.width = "15%";
  document.getElementById("mySidebar").style.minWidth = "325px";
  // document.getElementById("gmap_canvas").style.marginLeft = "15%"; //bug where the zoom buttons disappear
}

function closeSidebar() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("mySidebar").style.minWidth = "0px";
  // document.getElementById("gmap_canvas").style.marginLeft= "0";
}

function profileDropdown() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}



// func to load Upload
function openUpload() {
     document.getElementById("hidden-content").style.visibility = "visible";
     document.getElementById("upload-content").innerHTML='<object type="text/html" data="upload.html" ></object>';
}

function closeUpload() {
     document.getElementById("hidden-content").style.visibility = "hidden";
}


//suggestions funcs
function loadSuggestion(suggestion){
  console.log("working: " + suggestion);
  document.getElementById("search-bar").value += " " + suggestion;

}
