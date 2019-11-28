function location_lookup() {
  var search_string = document.getElementById("search_string").value;
  var filter_choice = document.getElementById("filter_choice").value;

  var xhr;
  if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
  } else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  var data =
    "search_string=" + search_string
    + "&" + "filter_choice=" + filter_choice ;
  console.log(data);
  xhr.open("POST", "database_list.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(data);
  xhr.onreadystatechange = display_data;

  function display_data() {
    if (xhr.readyState == 4) {
      if (xhr.status == 200) {
        //alert(xhr.responseText);
        document.getElementById("locations").innerHTML = xhr.responseText;
      } else {
        alert('There was a problem with the request.');
      }
    }
  }
}
