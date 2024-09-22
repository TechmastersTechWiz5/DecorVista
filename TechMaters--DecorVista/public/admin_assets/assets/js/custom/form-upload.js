/**
 * Function to handle form submission with file upload.
 * @param {string} formMethod - The HTTP method for the request (e.g., 'POST', 'PUT').
 * @param {string} formId - The ID of the form being submitted.
 * @param {string} btnId - The ID of the submit button (to show loading and disable during submission).
 * @param {string} targetUrl - The URL to send the form data to.
 * @param {string} redirectUrl - The URL to redirect to after a successful form submission.
 * @param {number} timer - Optional, time in milliseconds to show success/error notifications. Default is 3000 ms.
 */
function handleFormUploadForm(formMethod, formId, btnId, targetUrl, redirectUrl, timer = 3000) {
  // Disable the submit button and show the spinner
  $(btnId).prop("disabled", true);
  $(btnId).html('<span class="spinner-border spinner-border-sm"></span> Processing...');

  // Get the form element and create a FormData object
  const formAttrId = $(formId).attr('id');
  const form = $(`#${formAttrId}`)[0];
  const formData = new FormData(form);

  // Make the AJAX request
  $.ajax({
    url: targetUrl,
    type: formMethod,
    data: formData,
    processData: false, // Prevent jQuery from processing the form data
    contentType: false, // Prevent jQuery from setting content-type header
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // Include CSRF token
    },
    success: function(data) {
      if (data.status === "success") {
        // Show success message
        Toastify({
          text: data.message,
          duration: timer,
          gravity: "top",
          position: 'right',
          backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
        }).showToast();

        // Redirect after showing success message
        setTimeout(() => {
          location.replace(redirectUrl);
        }, timer);
      } else {
        // Show warning or error message
        const toastColor = data.status === "warning" ? "linear-gradient(to right, #ff5f6d, #ffc371)" : "linear-gradient(to right, #ff5f6d, #ffc371)";
        Toastify({
          text: data.message,
          duration: timer,
          gravity: "top",
          position: 'right',
          backgroundColor: toastColor,
        }).showToast();

        // Re-enable the submit button
        $(btnId).prop("disabled", false);
        $(btnId).html("Submit");
      }
    },
    error: function(jqXHR) {
      // Show error message
      Toastify({
        text: "An error occurred. Please try again later.",
        duration: timer,
        gravity: "top",
        position: 'right',
        backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
      }).showToast();

      // Re-enable the submit button
      $(btnId).prop("disabled", false);
      $(btnId).html("Submit");
    },
  });
}



function UserLogout(targetUrl, timer = 3000) {

  // Make the AJAX request
  $.ajax({
    url: targetUrl,
    type: "GET",
    processData: false, 
    contentType: false, 
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // Include CSRF token
    },
    success: function(data) {
      if (data.status === "success") {
        // Show success message
        Toastify({
          text: data.message,
          duration: timer,
          gravity: "top",
          position: 'right',
          backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
        }).showToast();

        // Redirect after showing success message
        setTimeout(() => {
          window.location.reload();
        }, timer);
      } else {
        // Show warning or error message
        const toastColor = data.status === "warning" ? "linear-gradient(to right, #ff5f6d, #ffc371)" : "linear-gradient(to right, #ff5f6d, #ffc371)";
        Toastify({
          text: data.message,
          duration: timer,
          gravity: "top",
          position: 'right',
          backgroundColor: toastColor,
        }).showToast();

        // Re-enable the submit button
        $(btnId).prop("disabled", false);
        $(btnId).html("Submit");
      }
    },
    error: function(jqXHR) {
      // Show error message
      Toastify({
        text: "An error occurred. Please try again later.",
        duration: timer,
        gravity: "top",
        position: 'right',
        backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
      }).showToast();

      // Re-enable the submit button
      $(btnId).prop("disabled", false);
      $(btnId).html("Submit");
    },
  });
}
function BookAppointment(targetUrl, timer = 3000) {
  // Make the AJAX request
  $.ajax({
    url: targetUrl,  // The ID is already part of the targetUrl if passed in route
    type: "POST",    // Ensure this is POST since we're storing data
    data: {},        // If you need to send extra data, include it here (in this case, no extra data)
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),  // Include CSRF token
    },

    success: function(data) {
      if (data.status === "success") {
        // Show success message
        Toastify({
          text: data.message,
          duration: timer,
          gravity: "top",
          position: 'right',
          backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
        }).showToast();

        // Redirect after showing success message
        setTimeout(() => {
          window.location.reload();  // Reload the page to reflect the new appointment status
        }, timer);
      } else {
        // Show warning or error message
        const toastColor = data.status === "warning" ? "linear-gradient(to right, #ff5f6d, #ffc371)" : "linear-gradient(to right, #ff5f6d, #ffc371)";
        Toastify({
          text: data.message,
          duration: timer,
          gravity: "top",
          position: 'right',
          backgroundColor: toastColor,
        }).showToast();

        // Re-enable the submit button (if applicable)
        $(btnId).prop("disabled", false);
      }
    },
    error: function(jqXHR) {
      // Show error message
      Toastify({
        text: "An error occurred. Please try again later.",
        duration: timer,
        gravity: "top",
        position: 'right',
        backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
      }).showToast();

      // Re-enable the submit button (if applicable)
      $(btnId).prop("disabled", false);
      $(btnId).html("Book Appointment");
    },
  });
}
