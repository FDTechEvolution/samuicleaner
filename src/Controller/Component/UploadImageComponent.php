<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

/**
 * Description of UploadImageComponent
 *
 * @author sakorn.s
 */
class UploadImageComponent extends Component {

    public $arr_ext = array('jpg', 'jpeg', 'png');
    public $UPLOAD_PATH = WWW_ROOT . 'uploads/images/';

    public function upload($file = null, $prefix = '', $subfix = '', $hasImageTable = false,$isPutCopyright=false) {

        if (is_null($file)) {
            return null;
        }
        if ($file['name'] === '') {
            return null;
        }
        $uploadfile = $file['tmp_name'];
        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
        if ($prefix != '') {
            $prefix = $prefix . "_";
        }
        $setNewFileName = $prefix . time() . "_" . rand(000000, 999999) . $subfix;

        //only process if the extension is valid
        if (in_array($ext, $this->arr_ext)) {
            //do the actual uploading of the file. First arg is the tmp name, second arg is 
            //where we are putting it
            $imageFileName = $setNewFileName . '.' . $ext;
            $path = $this->UPLOAD_PATH.$imageFileName;

            move_uploaded_file($uploadfile, $path);
            if($isPutCopyright){
                $this->putcopyright($path, $imageFileName, $ext);
            }
            
            if ($hasImageTable) {
                //prepare the filename for database entry 
                $Images = TableRegistry::get('Images');
                $image = $Images->newEntity();
                $image->name = $imageFileName;
                $image->type = $ext;
                $image->path = $path;

                $result = $Images->save($image);
                if ($result) {
                    return $result->id;
                } else {
                    return null;
                }
            }else{
                return $path;
            }
        }

        return null;
    }

    private function putcopyright($path = '', $imageFileName = '', $ext = '') {
        //validation
        if ($path == '' || $imageFileName == '' || $ext == '') {
            return;
        }
        //get copy right from imagae logo
        $path_copyright = WWW_ROOT . 'img/stamp_logo.png';

        //chicking image type
        $myImage = '';
        switch ($ext) {
            case 'gif' : $myImage = imagecreatefromgif($path);
                break;
            case 'jpg' : $myImage = imagecreatefromjpeg($path);
                break;
            case 'jpeg' : $myImage = imagecreatefromjpeg($path);
                break;
            case 'png' : $myImage = imagecreatefrompng($path);
                break;
            default : die("Unknown filetype");
        }
        $imgWidth = imagesx($myImage);
        $imgHeight = imagesy($myImage);

        //imagealphablending($myImage, true);
        // Create a reference to the watermark png 
        $copyrightmark = imagecreatefrompng($path_copyright);
        $copyrightWidth = imagesx($copyrightmark);
        $copyrightHeight = imagesy($copyrightmark);

        // Copy the watermark into the background 
        imagecopy($myImage, $copyrightmark, 0, ($imgHeight - $copyrightHeight), 0, 0, $copyrightWidth, $copyrightHeight);
        $path = $this->UPLOAD_PATH . $imageFileName;
        imagejpeg($myImage, $path);

        // Free up resources 
        imagedestroy($myImage);
        imagedestroy($copyrightmark);



        //logo is transparent: in this case stackoverflow logo
        //$logo = imagecreatefrompng($path_copyright);
        //Adjust paramerters according to your image
        //imagecopymerge($myImage, $logo, 60, 60, 0, 0, 300, 200, 100);
        //$path = WWW_ROOT . 'img/upload/' . $imageFileName;
        //imagejpeg($myImage, $path);

        /*
          if ($path == '' || $imageFileName == '' || $ext == '') {
          return;
          }

          $myImage = '';
          switch ($ext) {
          case 'gif' : $myImage = imagecreatefromgif($path);
          break;
          case 'jpg' : $myImage = imagecreatefromjpeg($path);
          break;
          case 'jpeg' : $myImage = imagecreatefromjpeg($path);
          break;
          case 'png' : $myImage = imagecreatefrompng($path);
          break;
          default : die("Unknown filetype");
          }

          $myCopyright = imagecreatefromjpeg($path_copyright);


          $destWidth = imagesx($myImage);
          $destHeight = imagesy($myImage);
          $srcWidth = imagesx($myCopyright);
          $srcHeight = imagesy($myCopyright);

          $destX = ($destWidth - $srcWidth) / 2;
          $destY = ($destHeight - $srcHeight) / 1;
          $white = imagecolorexact($myCopyright, 255, 255, 255);
          imagecolortransparent($myCopyright, $white);

          imagecopymerge($myImage, $myCopyright, $destX, $destY, 0, 0, $srcWidth, $srcHeight, 50);

          $path = WWW_ROOT . 'img/upload/' . $imageFileName;
          imagejpeg($myImage, $path);
          imagedestroy($myImage);
          imagedestroy($myCopyright);

         */
    }

    public function delete($imageId = null) {
        $Images = TableRegistry::get('Images');
        $image = $Images->get($imageId);
        $imagesLocation = $image->path;
        $Images->delete($image);
        unlink($imagesLocation);
    }

}

?>
