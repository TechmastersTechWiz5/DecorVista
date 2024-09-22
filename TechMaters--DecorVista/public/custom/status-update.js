// status-update.js

/**
 * Function to update the status of an item.
 * @param {string} url - The URL to send the request to.
 * @param {number} id - The ID of the item to update.
 * @param {number} status - The new status value (1 for active, 0 for inactive).
 * @param {function} successCallback - A callback function to handle successful responses.
 * @param {function} errorCallback - A callback function to handle error responses.
 */
function updateStatus(url, id) {
  $.ajax({
      url: url,
      method: 'POST',
      data: {
          id: id,
          _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token for security
      },
      success: function(response) {
          Toastify({
              text: response.message,
              duration: 3000,
              gravity: "top",
              position: 'right',
              backgroundColor: "linear-gradient(to right,#00b09b, #96c93d)",
          }).showToast();
      },
      error: function(xhr) {
          Toastify({
              text: xhr.responseText,
              duration: 3000,
              gravity: "top",
              position: 'right',
              backgroundColor: "linear-gradient(to right, #ff5f6d,#ffc371)",
          }).showToast();
          console.error(xhr.responseText);
      }
  });
}