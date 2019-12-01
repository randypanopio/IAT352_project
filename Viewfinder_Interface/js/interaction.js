
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

var suggestionState = false;
function reloadSuggestions(){
  if(suggestionState){
    document.getElementById("suggestions1").style.display = "flex";
    document.getElementById("suggestions2").style.display = "none";
  } else {
    document.getElementById("suggestions1").style.display = "none";
    document.getElementById("suggestions2").style.display = "flex";
  }

  suggestionState = !suggestionState;
  console.log(suggestionState);
}

// func to load Upload
function openUpload() {
     document.getElementById("hidden-content").style.visibility = "visible";
     document.getElementById("upload-screen").style.display = "flex";
     // document.getElementById("upload-content").innerHTML='<object type="text/html" data="upload.html" ></object>';
}

function closeUpload() {
     document.getElementById("hidden-content").style.visibility = "hidden";
     document.getElementById("upload-screen").style.display = "none";
     document.getElementById("upload-review-screen").style.display = "none";
     document.getElementById("upload-success-screen").style.display = "none";
}

function loadReviewScreen() {
    document.getElementById("upload-review-screen").style.display = "flex";
    document.getElementById("upload-screen").style.display = "none";
}

function loadSuccessScreen() {
  document.getElementById("upload-success-screen").style.display = "flex";
  document.getElementById("upload-review-screen").style.display = "none";
  setTimeout(function() {
    closeUpload();
  }, 1000)
}

//not working
// function function1(callback){
//   document.getElementById("hidden-content").style.visibility = "hidden";
// }
//
// //failsafe func
// function reloadCurrentPage() {
//   window.location.reload();
//   function1(function() {
//     closeUpload();
//   });
// }


//suggestions funcs
function loadSuggestion(suggestion){
  console.log("working: " + suggestion);
  document.getElementById("search-bar").value += " " + suggestion;
}
