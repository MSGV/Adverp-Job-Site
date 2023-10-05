document.getElementById('postForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    // Get the post content from the textarea
    var postContent = document.getElementById('postContent').value;

    // Validate post content (you can add your own validation logic)

    // Create a new post element
    var postElement = document.createElement('div');
    postElement.classList.add('post');
    postElement.textContent = postContent;

    // Append the new post element to the main container
    var container = document.querySelector('.container');
    container.appendChild(postElement);

    // Clear the textarea
    document.getElementById('postContent').value = '';
});
