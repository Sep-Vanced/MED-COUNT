$(document).ready(function () {
  // Sidebar Toggle
  const sidebarToggle = document.querySelector("#sidebar-toggle");
  sidebarToggle.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("collapsed");
  });

  document.querySelector(".theme-toggle").addEventListener("click", () => {
    toggleLocalStorage();
    toggleRootClass();
  });

  // Darkmode Toggle
  function toggleRootClass() {
    const current = document.documentElement.getAttribute("data-bs-theme");
    const inverted = current == "dark" ? "light" : "dark";
    document.documentElement.setAttribute("data-bs-theme", inverted);
  }

  function toggleLocalStorage() {
    if (isLight()) {
      localStorage.removeItem("light");
    } else {
      localStorage.setItem("light", "set");
    }
  }

  function isLight() {
    return localStorage.getItem("light");
  }

  if (isLight()) {
    toggleRootClass();
  }

  //Items toggle
  var tab_list = document.querySelectorAll(".sidebar-item[data-tc]");
  console.log(tab_list);

  var tab_items = document.querySelectorAll(".tab_item");

  tab_list.forEach(function (list) {
    list.addEventListener("click", function () {
      var tab_data = list.getAttribute("data-tc");
      console.log(tab_data);

      tab_items.forEach(function (item) {
        var tab_class = item.getAttribute("id");
        console.log(tab_class);

        tab_list.forEach(function (list) {
          list.classList.remove("active");
        });

        list.classList.add("active");

        if (tab_class.includes(tab_data)) {
          item.style.display = "flex";
        } else {
          item.style.display = "none";
        }
      });
    });
  });

  //time lamaw
  function updateTimeAndDate(elementId) {
    let time = document.getElementById(`current-time-${elementId}`);
    let date = document.getElementById(`current-date-${elementId}`);

    setInterval(() => {
      let now = new Date();
      time.innerHTML = now.toLocaleTimeString();
      date.textContent = formatDate(now);
    }, 200);
  }

  for (let i = 1; i <= 1; i++) {
    updateTimeAndDate(i);
  }

  /**
   * @param {Date} date
   */

  function formatDate(date) {
    const DAYS = [
      "Sunday",
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
    ];
    const MONTHS = [
      "January",
      "Febuary",
      "Marh",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];

    return `${
      DAYS[date.getDay()]
    }, ${MONTHS[date.getMonth()]} ${date.getDate()} ${date.getFullYear()}`;
  }
});

function resetWebsite(event) {
  event.preventDefault(); // Prevent the default behavior
  console.log("lamaw");
  // Add your reset logic here
  // For example, you can reload the page
  window.location.href = "http://localhost/capstone/pharmacy/index.php";
}


function confirmDelete() {
  if (confirm("Are you sure you want to delete this record?")) {
      var id = document.getElementById("delete_id").value;
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "1.pharmacy_delete.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
              // Update the UI or display a message if needed
              alert(xhr.responseText);

              document.getElementById("index.php").click(); 
          }
      };
      xhr.send("id=" + id);
  }
}


$(document).ready(function() {
  $('#searchForm').submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'GET',
          url: '1.search.php', // Replace 'search.php' with the actual PHP file to handle the search
          data: formData,
          success: function(response) {
              $('#pharmacyTable tbody').html(response);
          }
      });
  });

  $('#showAllBtn').click(function() {
      $.ajax({
          type: 'GET',
          url: '1.show_all.php', // Replace 'show_all.php' with the actual PHP file to fetch all items
          success: function(response) {
              $('#pharmacyTable tbody').html(response);
          }
      });
  });
});

$(document).ready(function() {
  $('#deliveredSearchForm').submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'GET',
          url: '2.search.php', // Replace 'search.php' with the actual PHP file to handle the search
          data: formData,
          success: function(response) {
              $('#deliveredTable tbody').html(response);
          }
      });
  });

  $('#deliveredShowAllBtn').click(function() {
      $.ajax({
          type: 'GET',
          url: '2.show_all.php', // Replace 'show_all.php' with the actual PHP file to fetch all items
          success: function(response) {
              $('#deliveredTable tbody').html(response);
          }
      });
  });
});

$(document).ready(function() {
  $('#rejectedSearchForm').submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'GET',
          url: '3.search.php', // Replace 'search.php' with the actual PHP file to handle the search
          data: formData,
          success: function(response) {
              $('#rejectedTable tbody').html(response);
          }
      });
  });

  $('#rejectedShowAllBtn').click(function() {
      $.ajax({
          type: 'GET',
          url: '3.show_all.php', // Replace 'show_all.php' with the actual PHP file to fetch all items
          success: function(response) {
              $('#rejectedTable tbody').html(response);
          }
      });
  });
});

$(document).ready(function() {
  $('#usedSearchForm').submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'GET',
          url: '4.search.php', // Replace 'search.php' with the actual PHP file to handle the search
          data: formData,
          success: function(response) {
              $('#usedTable tbody').html(response);
          }
      });
  });

  $('#usedShowAllBtn').click(function() {
      $.ajax({
          type: 'GET',
          url: '4.show_all.php', // Replace 'show_all.php' with the actual PHP file to fetch all items
          success: function(response) {
              $('#usedTable tbody').html(response);
          }
      });
  });
});

$(document).ready(function() {
  $('#supplyRecycleBinSearchForm').submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'GET',
          url: '5.search.php', // Replace 'search.php' with the actual PHP file to handle the search
          data: formData,
          success: function(response) {
              $('#supplyRecycleBinTable tbody').html(response);
          }
      });
  });

  $('#supplyRecycleBinSearchForm').click(function() {
      $.ajax({
          type: 'GET',
          url: '5.show_all.php', // Replace 'show_all.php' with the actual PHP file to fetch all items
          success: function(response) {
              $('#supplyRecycleBinTable tbody').html(response);
          }
      });
  });
});

$(document).ready(function() {
  $('#nearExpiryBtn').click(function() {
      $.ajax({
          url: '3.expiry_show.php', // Adjust the path as necessary
          type: 'GET',
          success: function(data) {
              $('tbody').html(data);
          }
      });
  });

  $('#lowStockBtn').click(function() {
      $.ajax({
          url: '3.lowstock_show.php', // Adjust the path as necessary
          type: 'GET',
          success: function(data) {
              $('tbody').html(data);
          }
      });
  });
});

$(document).ready(function() {
  // Handle the search form submission for pharmacy requests
  $('#pharmacySearchForm').submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'GET',
          url: '2.pharmacy_search.php', // PHP file to handle pharmacy search
          data: formData,
          success: function(response) {
              $('#pharmacySupplyTable tbody').html(response);
          }
      });
  });

  // Handle the "Show All" button click for pharmacy requests
  $('#pharmacyShowAllBtn').click(function() {
      $.ajax({
          type: 'GET',
          url: '2.pharmacy_show_all.php', // PHP file to fetch all pharmacy requests
          success: function(response) {
              $('#pharmacySupplyTable tbody').html(response);
          }
      });
  });
});


function addMore() {
  var items = document.getElementById('items');
  var newItem = document.createElement('div');
  newItem.classList.add('row', 'mb-3', 'item', 'w-100');
  newItem.innerHTML = `
      <div class="col-md-4">
        <input list="product_suggestions" class="form-control" name="product_name[]" required autocomplete="off">
        <datalist id="product_suggestions"></datalist>
      </div>
      <div class="col-md-4">
        <input type="text" class="form-control" name="unit_of_issue[]" required autocomplete="off">
      </div>
      <div class="col-md-4">
        <input type="number" class="form-control" name="requested_quantity[]" required autocomplete="off">
      </div>`;
  items.appendChild(newItem);
}

function removeLast() {
  var items = document.getElementById('items');
  if (items.children.length > 1) {
      items.removeChild(items.lastElementChild);
  }
}


$(document).ready(function () {
  // Event delegation to handle input events on dynamically added product_name fields
  $(document).on('input', 'input[name="product_name[]"]', function () {
      let query = $(this).val();
      let dataListId = $(this).attr('list'); // Get the associated datalist ID

      if (query.length > 2) {
          $.ajax({
              url: 'fetch_items.php',
              method: 'GET',
              data: { term: query },
              success: function (data) {
                  let suggestions = JSON.parse(data);
                  let dropdown = '';

                  suggestions.forEach(function (item) {
                      dropdown += `<option data-unit="${item.unit_of_issue}" value="${item.product_name}">`;
                  });

                  $('#' + dataListId).html(dropdown); // Use the dynamic datalist ID
              }
          });
      }
  });

  // Event delegation to handle change events on dynamically added product_name fields
  $(document).on('change', 'input[name="product_name[]"]', function () {
      let selectedProduct = $(this).val();
      let dataListId = $(this).attr('list'); // Get the associated datalist ID
      let selectedOption = $('#' + dataListId + ' option[value="' + selectedProduct + '"]');
      let unitOfIssue = selectedOption.data('unit');

      if (unitOfIssue) {
          $(this).closest('.item').find('input[name="unit_of_issue[]"]').val(unitOfIssue);
      }
  });
});

document.addEventListener('DOMContentLoaded', function() {
  var tab_list = document.querySelectorAll('.sidebar-item[data-tc]');
  var tab_items = document.querySelectorAll('.tab_item');

  tab_list.forEach(function(list) {
      list.addEventListener('click', function() {
          var tab_data = list.getAttribute('data-tc');
          
          // Hide all tab items first
          tab_items.forEach(function(item) {
              item.style.display = 'none'; // Hide each tab content
          });

          // Show only the clicked tab content
          document.getElementById(tab_data).style.display = 'block'; // Show the selected tab content
      });
  });
});

// JavaScript to handle the confirmation button click    $(document).ready(function () {
  $(document).on('click', '.confirm-btn', function() {
    var deliveryId = $(this).data('id');
    
    $.ajax({
        url: 'confirm_delivery.php',
        type: 'POST',
        data: { id: deliveryId },
        success: function(response) {
            if (response === 'success') {
                alert('Delivery confirmed successfully.');
                location.reload(); // Refresh the page to update the status
            } else {
                alert('Error: ' + response);
            }
        }
    });
});

