<?php
    class Book_model extends CI_Model {
        
        public function get_books() {
            $query = $this->db->get('books');
            return $query->result();
        }

        public function get_book($id) {
            $query = $this->db->get_where('books', array('id' => $id));
            return $query->row();
        }

        public function create_book() {
            $data = array(
                'title' => $this->input->post('title'),
                'author' => $this->input->post('author'),
                'genre' => $this->input->post('genre'),
                'published_year' => $this->input->post('published_year'),
                'description' => $this->input->post('description')
            );
            return $this->db->insert('books', $data);
        }

        public function update_book($id) {
            $data = array(
                'title' => $this->input->post('title'),
                'author' => $this->input->post('author'),
                'genre' => $this->input->post('genre'),
                'published_year' => $this->input->post('published_year'),
                'description' => $this->input->post('description')
            );
            $this->db->where('id', $id);
            return $this->db->update('books', $data);
        }

        public function delete_book($id) {
            return $this->db->delete('books', array('id' => $id));
        }
    }
?>
