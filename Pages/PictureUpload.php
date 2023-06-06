<?php

class PictureUpload   //pictureClass
{
    public $filename = null ;
    public $error = null ;
    public $postName= null;
    const MAX_FILESIZE = 5120 * 5120 ; 

    public function __construct($file, $uploadFolder) //foldername is the folder where the file will be uploaded
    {
       if(!empty($_FILES[$file]['name'])) //a file has been uploaded
       {
            extract($_FILES[$file]);

            $extension=strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $whitelist=["png","jpg", "jpeg"]; //only these extensions are allowed
            if(!in_array($extension, $whitelist)) //all kinds of validation
            {
                $this->error = "Not the right file type (png, jpg, jpeg only)";
            }else if($size > self::MAX_FILESIZE)
            {
                $this->error = "File size allowed (1024 * 1024 bytes). Please upload a smaller file.";
            }else
            {
                $this->postName = $_FILES[$file]['name']; //for postsname, we will be using the same name
                $this->filename = sha1(uniqid() . $tmp_name . $name . $size). ".$extension";  //creating unique profile names in the DB
                if (!move_uploaded_file($tmp_name, $uploadFolder."/".$this->filename)){//tries to move the file
                    $this->error = "Move/Copy Error" ;
                    $this->filename = null ; 
                  }
            }

        }else
        {
            $this->error="No File Uploaded!";
        }
    }

}

?>