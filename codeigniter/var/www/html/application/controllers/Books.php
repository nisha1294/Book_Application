<?php
    class Books extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            $this->load->model('Book_model');
            $this->load->helper('url');
        }

        public function get_books() {
            $data['books'] = $this->Book_model->get_books();
            $this->load->view('books/index', $data);
        }

        public function get_book($id) {
            $data['book'] = $this->Book_model->get_book($id);
            $this->load->view('books/view', $data);
        }

        public function create_book() {
            $this->load->library('form_validation');

            // Set validation rules
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('author', 'Author', 'required|regex_match[/^[a-zA-Z]+\s[a-zA-Z]+$/]');
            $this->form_validation->set_rules('genre', 'Genre', 'required');
            $this->form_validation->set_rules('published_year', 'Published Year', 'required|numeric');
            $this->form_validation->set_rules('description', 'Description', 'required|min_length[100]');

            if ($this->form_validation->run() === FALSE) {
                // Validation failed, reload the form with errors
                $this->load->view('books/create');
            } else {
                // Validation successful, proceed with book creation
                $this->Book_model->create_book();
                redirect('books');
            }
        }

        public function update_book($id) {
            $this->Book_model->update_book($id);
            redirect('books');
        }

        public function delete_book($id) {
            $this->Book_model->delete_book($id);
            redirect('books');
        }
    }
?>