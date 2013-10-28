<?php
class uploadFile_Model extends Model {
    public function __construct() {
        parent::__construct();
    }
    public function upload($sub='',$name='pic'){
        $allowed_ext = array('jpg','jpeg','png','gif','pdf','doc');
        $allowed_img = array('jpg','jpeg','png','gif');
        if(!is_dir(UPLOAD))mkdir(UPLOAD);
        $uploadDir = UPLOAD.$sub.'/';
        if(!is_dir($uploadDir))mkdir($uploadDir);
        $sizes=array(228,358,487,616);
        $thumbWidth=$sizes[rand(0,3)];
        if(array_key_exists($name,$_FILES) && $_FILES[$name]['error'] == 0 ){
            $pic = $_FILES[$name];
            $pathinfo = pathinfo($pic["name"]);
            $ext='.'.$pathinfo['extension'];
            if (file_exists($uploadDir.$pic["name"])) $file = rand().'_'.$pathinfo['filename'];
            else $file = $pathinfo['filename'];
            $nameFile=$file.$ext;
            $jpgFile=$file.'.jpg';
            if(!in_array($pathinfo['extension'],$allowed_ext)){
                $this->exit_status('Only '.implode(',',$allowed_ext).' files are allowed!');
            }	  
            if(move_uploaded_file($pic['tmp_name'], $uploadDir.$nameFile)){
                if(in_array($pathinfo['extension'],$allowed_img)){
                    $data=$this->createThumbs($nameFile,$uploadDir, $uploadDir, $thumbWidth );
                    $data['img']=true;
                }else{
                    $data['img']=false;
                }
                $this->exit_status('File was uploaded successfuly!');
                $data['file']=$nameFile;
                $data['name']=$file;
                return $data;
            }

        }
        
        $this->exit_status('Something went wrong with your upload!');
        
        
    }
    function exit_status($str){
        echo json_encode(array('status'=>$str));
    }
    public function crop(){
        $sizes=array(228,358,487,616);
        $thumbWidth=$sizes[rand(0,3)];
        $filename= $_POST['filename'];
        $filepath= UPLOAD.$_POST['filefolder'].'/';   
        
        $rel = $_POST['rel'];
	$targ_w = $_POST['w']*$rel;
        $targ_h = $_POST['h']*$rel;
	$jpeg_quality = 100;
	$src = $filepath.$filename;
        $pathinfo = pathinfo($filename);
        
        if($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg') $img_r = imagecreatefromjpeg($src);
        if($pathinfo['extension']=='png') $img_r = imagecreatefrompng($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x']*$rel,$_POST['y']*$rel,$targ_w,$targ_h,$_POST['w']*$rel,$_POST['h']*$rel);
        imagejpeg($dst_r,$src,$jpeg_quality);
        $this->createThumbs($filename,$filepath, $filepath, $thumbWidth );

    }
    public function insertImg($img,$page){
        $p=$this->db->select("SELECT content FROM page WHERE id=:id",
            array('id' => $page));
        $this->db->insert('images', array(
            'img'       => $img['file'],
            'thumb'     => $img['thumb'],
            'thumbPos'     => 0,
            'caption_EN'   => $img['name'],
            'caption_ES'   => $img['name'],
            'caption_PT'   => $img['name'],
            'video'     => $img['video'],
            'name'      => $img['name'],
            'page'      => $page,
            'w'         => $img['w'],
            'h'         => $img['h'],
            'info'      => $p[0]['content']
        ));
    }
    public function insertFile($file,$page){
        $pathinfo = pathinfo($file['file']);
        $thumb='doc.png';
        $this->db->insert('files', array(
            'name'         => $file['file'],
            'thumb'        => $thumb,
            'caption_EN'   => $file['name'],
            'caption_ES'   => $file['name'],
            'caption_PT'   => $file['name'],
            'page'         => $page,
            'lang'         => LANG
        ));
    }
    public function png2jpg($originalFile, $outputFile, $quality) {
        $image = imagecreatefrompng($originalFile);
        imagejpeg($image, $outputFile, $quality);
        //unlink($originalFile);
        imagedestroy($image);
    }
    
    public function createThumbs($fname,$pathToImages, $pathToThumbs, $thumbWidth ) 
    {
        $info = pathinfo($pathToImages . $fname);
        if ( strtolower($info['extension']) == 'jpg' ) $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
        if ( strtolower($info['extension']) == 'png' ) $img = imagecreatefrompng( "{$pathToImages}{$fname}" );

          $width = imagesx( $img );
          $height = imagesy( $img );
          $fname='thumb_'.$fname;
          // calculate thumbnail size
          $new_width = $thumbWidth;
          $new_height = floor( $height * ( $thumbWidth / $width ) );
          $data['thumb']=$fname;
          $data['w']=$new_width;
          $data['h']=$new_height;
          $new_width = 1136;
          $new_height = floor( $height * ( $new_width / $width ) );
          // create a new temporary image
          $tmp_img = imagecreatetruecolor( $new_width, $new_height ); 
          // copy and resize old image into new image 
          imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
          // save thumbnail into a fileimagepng
          imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}",70 );
          return $data;

    }
}