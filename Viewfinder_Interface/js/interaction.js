
// onboarding Check

window.onload = function () {
    if (localStorage.getItem("firstVisit") === null) {
        displayOnboarding();
        localStorage.setItem("firstVisit", true);
    }
}

var onboardingStage = 0;
function displayOnboarding () {
  document.getElementById("hidden-onboarding").style.visibility = "visible";
  document.getElementById("onboard-screen-1").style.display = "flex";
  onboardingStage = 1;
  console.log("first time user");
}

function closeOnboarding() {
  document.getElementById("hidden-onboarding").style.visibility = "hidden";
  document.getElementById("onboard-screen-1").style.display = "none";
  document.getElementById("onboard-screen-2").style.display = "none";
  document.getElementById("onboard-screen-3").style.display = "none";
  document.getElementById("onboard-screen-4").style.display = "none";
  document.getElementById("onboard-screen-5").style.display = "none";
}

function nextOnloadingScreen() {
  onboardingStage++;
  console.log(onboardingStage);

  switch (onboardingStage) {
    case 1:
      document.getElementById("onboard-screen-1").style.display = "flex";

      break;
    case 2:
      document.getElementById("onboard-screen-2").style.display = "flex";
      document.getElementById("onboard-screen-1").style.display = "none";

      break;
    case 3:
      document.getElementById("onboard-screen-3").style.display = "flex";
      document.getElementById("onboard-screen-2").style.display = "none";

      break;
    case 4:
      document.getElementById("onboard-screen-4").style.display = "flex";
      document.getElementById("onboard-screen-3").style.display = "none";

      break;
    case 5:
      document.getElementById("onboard-screen-5").style.display = "flex";
      document.getElementById("onboard-screen-4").style.display = "none";
      break;
    case 6:
      closeOnboarding();
      break;
    default:
    document.getElementById("onboard-screen-1").style.display = "flex";
  }
}

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
function previewImage(data) {
  document.getElementById("hidden-image-content").style.visibility = "visible";
  document.getElementById("image-content-container").style.display = "flex";
  document.getElementById("preview-image").src = "img/gallery/" + data + ".jpg";
  if (data == "morning") {
    document.getElementById("image-content-title").innerHTML = "Early Morning Rise";

    document.getElementById("image-content-uploader").innerHTML = "Mary Witherspoon";
    document.getElementById("image-content-likes").innerHTML = "93";
  }

  switch (data) {
    case "building":
      document.getElementById("image-content-title").innerHTML = "Appliance hanging by building";
      document.getElementById("image-content-uploader").innerHTML = "Annie Spratt";
      document.getElementById("image-content-likes").innerHTML = "43";
      break;
    case "suspension":
      document.getElementById("image-content-title").innerHTML = "Tree Ladder in Forest";
      document.getElementById("image-content-uploader").innerHTML = "Ivana Cajina";
      document.getElementById("image-content-likes").innerHTML = "202";
      break;
    case "forest":
      document.getElementById("image-content-title").innerHTML = "Early Morning Rise";
      document.getElementById("image-content-uploader").innerHTML = "Mary Witherspoon";
      document.getElementById("image-content-likes").innerHTML = "93";
      break;
    case "bridge1":
      document.getElementById("image-content-title").innerHTML = "Bridge at Nighttime";
      document.getElementById("image-content-uploader").innerHTML = "Priscilla Du Preez";
      document.getElementById("image-content-likes").innerHTML = "367";
      break;
    case "mountain":
      document.getElementById("image-content-title").innerHTML = "Pickup Truck on Bridge";
      document.getElementById("image-content-uploader").innerHTML = "James Walsh";
      document.getElementById("image-content-likes").innerHTML = "93";
      break;
    case "park1":
      document.getElementById("image-content-title").innerHTML = "Aerial Photo of Island";
      document.getElementById("image-content-uploader").innerHTML = "Gabriel Santiago";
      document.getElementById("image-content-likes").innerHTML = "11";
      break;
    case "bridge2":
      document.getElementById("image-content-title").innerHTML = "Aerial View of Island with Bridge";
      document.getElementById("image-content-uploader").innerHTML = "Lee Robinson";
      document.getElementById("image-content-likes").innerHTML = "102";
      break;
    default:
      document.getElementById("image-content-title").innerHTML = "Early Morning Rise";
      document.getElementById("image-content-uploader").innerHTML = "Mary Witherspoon";
      document.getElementById("image-content-likes").innerHTML = "93";
  }
}

function closeImage(){
  document.getElementById("hidden-image-content").style.visibility = "hidden";
}


//suggestions funcs
function loadSuggestion(suggestion){
  console.log("working: " + suggestion);
  document.getElementById("search-bar").value += " " + suggestion;
}
