<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add New Book</h1>
        <form id="bookForm" action="<?php echo base_url('books/create'); ?>" method="POST" onsubmit="return validateForm();">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter book title" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name (e.g., John Doe)" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" placeholder="Enter book genre" required>
            </div>
            <div class="form-group">
                <label for="published_year">Published Year</label>
                <input type="number" class="form-control" id="published_year" name="published_year" placeholder="Enter published year" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter book description (minimum 100 characters)" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="<?php echo base_url('books'); ?>" class="btn btn-secondary mt-3">Back to List</a>
    </div>

    <script>
        function validateForm() {
            const author = document.getElementById('author').value;
            const description = document.getElementById('description').value;

            // Author validation: Ensure it is in "First Last" format
            const authorRegex = /^[a-zA-Z]+\s[a-zA-Z]+$/;
            if (!authorRegex.test(author)) {
                alert('Author must be in "First Last" format.');
                return false;
            }

            // Description validation: Ensure it has at least 100 characters
            if (description.length < 100) {
                alert('Description must be at least 100 characters long.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
