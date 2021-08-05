<?php


namespace App\classes;


class FileUpload
{

  private $maxSize = 2097152 ;
  public  function getName($file,$name=""){
      if($name === ""){
          $name = pathinfo($file->file->tmp_name,PATHINFO_FILENAME);
      }
      $name = strtolower(str_replace(["_"," "],"-",$name));
      $hash = md5(microtime());
      $ext = pathinfo($file->file->name,PATHINFO_EXTENSION);
      return "{$name}-{$hash}.{$ext}";
  }
  public function checkSize($file){
      return $file->file->size < $this->maxSize ? true : false;
  }
  public  function  checkImage($file){
      $validExt = ['png','jpg','jpeg','bmp','jfif'];
      $ext = pathinfo($file->file->name,PATHINFO_EXTENSION);
      return in_array($ext,$validExt);
  }

  public function move($file,$filename = ""){
      $filename = $this->getName($file);
      $tmp_name = $file->file->tmp_name;
      $path = APP_ROOT.'/public/assets/uploads/';
      if($this->checkImage($file)){
          if($this->checkSize($file)){
              if(!is_dir($path)){
                  mkdir($path);
              }
              return move_uploaded_file($tmp_name,$path.$filename);

          }else{
              return "File size is exceeded!";
          }
      }else{
          return "File must be image.Allows [ png , jpg , jpeg , bmp , jfif ]";
      }

  }
}