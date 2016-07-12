<?php
class Courses extends CI_Controller {
    //displays the add course page
    public function index()
    {
        $this->load->view('add_course_page');
    }
    //processes the adding of a course
    public function add_course()
    {
        $course_details['title'] = $this->input->post('title'); 
        $course_details['description'] = $this->input->post('description');
        $this->load->model("Course_model");
        $add_course = $this->Course_model->add_course($course_details);
        if($add_course){
            echo "Course is added";
        }
    }
}

?>