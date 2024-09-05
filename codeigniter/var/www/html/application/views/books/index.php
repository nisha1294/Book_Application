<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Collection</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Book Collection</h1>
        <a href="<?php echo base_url('books/create'); ?>" class="btn btn-primary mb-3">Add New Book</a>
        <?php if (!empty($books)) : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Published Year</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <td><?php echo $book->id; ?></td>
                            <td><?php echo $book->title; ?></td>
                            <td><?php echo $book->author; ?></td>
                            <td><?php echo $book->genre; ?></td>
                            <td><?php echo $book->published_year; ?></td>
                            <td><?php echo substr($book->description, 0, 50) . '...'; ?></td>
                            <td>
                                <a href="<?php echo base_url('books/' . $book->id); ?>" class="btn btn-info btn-sm">View/Edit</a>
                                <a href="<?php echo base_url('books/delete/' . $book->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No books available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
