<div id="app">
    <h2>{{ book.title }}</h2>
    <form @submit.prevent="updateBook">
        <input v-model="book.title" placeholder="Title" required>
        <input v-model="book.author" placeholder="Author" required>
        <input v-model="book.genre" placeholder="Genre" required>
        <input v-model="book.published_year" placeholder="Year" type="number" required>
        <textarea v-model="book.description" placeholder="Description" required></textarea>
        <button type="submit">Update</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            book: {}
        },
        created() {
            fetch(`<?php echo base_url('books/' . $book->id); ?>`)
                .then(response => response.json())
                .then(data => this.book = data);
        },
        methods: {
            updateBook() {
                fetch(`<?php echo base_url('books/update/' . $book->id); ?>`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(this.book)
                }).then(() => alert('Book updated!'));
            }
        }
    });
</script>
