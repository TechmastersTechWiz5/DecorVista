// Image Preview and Removal Functionality
function handleImagePreview(inputSelector, previewContainer) {
  $(inputSelector).on('change', function(event) {
      const input = event.target;
      const files = input.files;
      $(previewContainer).empty(); // Clear previous previews

      // Loop through selected files
      Array.from(files).forEach((file) => {
          if (file && file.type.startsWith('image/')) {
              const reader = new FileReader();
              reader.onload = function(e) {
                  const imgContainer = $('<div class="position-relative m-2" style="display: inline-block;">');
                  const img = $('<img>').attr('src', e.target.result).addClass('img-thumbnail').css('width', '100px').css('height', '100px');
                  const removeButton = $('<button class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1"><i class="bx bx-x"></i></button>').on('click', function() {
                      imgContainer.remove(); // Remove preview
                      removeFileFromInput(input, file); // Deselect file
                  });
                  imgContainer.append(img).append(removeButton);
                  $(previewContainer).append(imgContainer);
              };
              reader.readAsDataURL(file);
          }
      });
  });
}

// Function to remove file from input
function removeFileFromInput(input, file) {
  const dataTransfer = new DataTransfer();
  const files = input.files;

  for (let i = 0; i < files.length; i++) {
      if (files[i] !== file) {
          dataTransfer.items.add(files[i]);
      }
  }
  input.files = dataTransfer.files; // Set the updated files list
}
