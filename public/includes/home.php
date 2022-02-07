<?php

class Home extends Db_object{
    protected static $db_table = "home";
    protected static $db_table_fields = array('name', 'image', 'date', 'status', 'content');
    public $id;
    public $name;
    public $image;
    public $date;
    public $status;
    public $filename;
    public $content;
    public $upload_directory = "images";
    public $image_placeholder = "simple_image.jpg";
    public $errors = array();
    public $upload_errors_array = array(
        UPLOAD_ERR_OK         => "There is no error",
        UPLOAD_ERR_INI_SIZE   => "The uploaded file exceeds the upload max_filesize directive",
        UPLOAD_ERR_FORM_SIZE  => "The uploaded file exceeds the MAX_FILE_SIZE directive that",
        UPLOAD_ERR_PARTIAL    => "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE    => "no file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
        UPLOAD_ERR_EXTENSION  => "A php extension stopped the file upload"
    );

    public function upload_photo()
    {

        if(empty($this->image)) {
            $this->image = $this->image_placeholder;
        }

        if(!empty($this->errors)) {
            return false;
        }

        if(empty($this->image) || empty($this->tmp_path)) {
            $this->errors[] = "файлът не е достъпен";
            return false;
        }

        // $target_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->user_image;
        $target_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->filename;

        if(file_exists($target_path)) {
            $this->errors[] = "Файлът {$this->image} съществува";
            return false;
        }

        if(move_uploaded_file($this->tmp_path, $target_path)) {
            unset($this->tmp_path);
            return true;
        }else {
            $this->errors[] = "Директорията няма права";
            return false;
        }

        $this->create();

    }

}