function location_lookup(page_number) {
  var search_string = document.getElementById("search_string").value;
  var filter_choice = document.getElementById("filter_choice").value;
  var pagination_limit = document.getElementById("pagination_limit").value;
  var last_page = 1;

  var pagination_control = document.getElementById("pagination_control");

  document.getElementById("locations").innerHTML = "loading results...";

  var xhr;
  if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
  } else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  var data =
    "search_string=" + search_string +
    "&" + "filter_choice=" + filter_choice +
    "&" + "pagination_limit=" + pagination_limit +
    "&" + "page_number=" + page_number;
  console.log(data);
  xhr.open("POST", "database_list.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(data);
  xhr.onreadystatechange = display_data;

  function display_data() {
    if (xhr.readyState == 4) {
      if (xhr.status == 200) {
        document.getElementById("locations").innerHTML ="";
        var result_data = xhr.responseText;
        var dataArray = xhr.responseText.split("|%$%|");
        var table = document.getElementById("locations");

        var rows;
        if(filter_choice == "parks"){
          console.log("itisparks")
          rows ="<tr><th>Park Name</th><th>Address</th><th>Website URL</th></tr>"
          for (i = 0; i < dataArray.length - 1; i++) {
            var itemArray = dataArray[i].split("%$%");
            console.log(itemArray);
            rows += "<tr>";
            itemArray.forEach(function(item) {
              rows += "<td>" + item + "</td>";
            })
            rows += "</tr>";
          }
          rows += "</tr>"
        } else if (filter_choice == "public_arts") {
          console.log("its arts")
          rows ="<tr><th>Site Name</th><th>Address</th><th>Status</th><th>Website URL</th></tr>"
          for (i = 0; i < dataArray.length - 1; i++) {
            var itemArray = dataArray[i].split("%$%");
            console.log(itemArray);
            rows += "<tr>";
            if(itemArray.length = 4){
              itemArray.forEach(function(item) {
                rows += "<td>" + item + "</td>";
              })
            } else {
              for (k = 0; k < 3; k++){
                rows += "<td>" + itemArray[k] + "</td>";
              }
              rows += "<td>unavailable</td>"
            }
            rows += "</tr>";
          }
          rows += "</tr>"
        }

        table.innerHTML = rows;

      } else {
        alert('There was a problem with the request.');
      }
    }
    var affix = "^^lp";
    var parsed_last_page = result_data.substr(result_data.lastIndexOf(affix) + affix.length);
    last_page = parsed_last_page;
    console.log(parsed_last_page + "yoooo");
    var paginationCtrls = "";
    if (last_page != 1) {
      if (page_number > 1) {
        paginationCtrls += '<button onclick="location_lookup(' + (page_number - 1) + ')">&lt;</button>';
      }
      paginationCtrls += ' &nbsp; &nbsp; <span>Page ' + page_number + ' of ' + last_page + '</span> &nbsp; &nbsp; ';
      if (page_number != last_page) {
        paginationCtrls += '<button onclick="location_lookup(' + (page_number + 1) + ')">&gt;</button>';
      }
    }
    pagination_control.innerHTML = paginationCtrls;
  }




}
