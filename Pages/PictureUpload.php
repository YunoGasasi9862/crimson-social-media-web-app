<?php

class PictureUpload   //pictureClass
{
    public $FName = null ;
    public $Error = null ;
    const MAX_FILESIZE = 1024 * 1024 ; 

    public function __construct($FName, $uploadFolder) //foldername is the folder where the file will be uploaded
    {
       if(!empty($_FILES[$filename]['name'])) //a file has been uploaded
       {
            extract($_FILES);
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
                $this->FName = sha1(uniqid() . $tmp_name . $name . $size/$size*2). ".$extension";  //creating unique profile names in the DB
                if (!move_uploaded_file($tmp_name, $uploadFolder."/".$this->FName)){//tries to move the file
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