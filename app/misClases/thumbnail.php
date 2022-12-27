<?php
   namespace Php8Solutions\image;

   class Thumbnail {
     protected $original;
     protected $originalWidth;
     protected $originalHeight;
     protected $basename;
     protected $imageType;
     protected $messages = [];

     protected $thumbWidth;
     protected $thumbHeight;
     
     public function __construct(
        string $image,
        protected string $path,
        protected int $max = 120,
        protected string $suffix = '_thb') {
            
            if (is_file($image) && is_readable($image)) {
                
                $dimension = getimagesize($image);
            } else {
                throw new \Exception("Cannot open $image");
            }
            
            if (!is_array($dimension)) {
                throw new \Exception("$image doesn't appear to be an image.");
            } else {
                if ($dimension[0]==0) {
                    throw new \Exception("Cannot determine the size of $image.");
                }
                if (!$this->checkType($dimension['mime'])) {
                    throw new \Exception('Cannot process that type of file.');
                }
            }
        if (is_dir($path) && is_writable($path)) {
            $this->path = rtrim($path,'/\\') . DIRECTORY_SEPARATOR;
        } else {
            throw new \Exception("Cannot write to $path.");
        }
        $this->original =$image;
        $this->originalWidth = $dimension[0];
        $this->originalHeight = $dimension[1];
        $this->basename = pathinfo($image,PATHINFO_FILENAME);
        $this->max = abs($max);
        if ($suffix != '_thb') {
            $this->suffix = $this->setSuffix($suffix)??'_thb';
        }
     }

     public function create(){
        $ratio = $this->calculateRatio();
        $thumbHeight = round($this->originalHeight*$ratio);
        $thumbWidth = round($this->originalWidth*$ratio);
        $resource = $this->createImageResource();
        $thumb = imagecreatetruecolor($thumbWidth,$thumbHeight);
        imagecopyresampled($thumb,$resource,0,0,0,0,$thumbWidth,$thumbHeight,
                                  $this->originalWidth,$this->originalHeight);
        $newname = $this->basename.$this->suffix;
        switch ($this->imageType){
            case 'jpeg':
                $newname .= '.jpeg';
                $success = imagejpeg($thumb,$this->path.$newname);
                break;
            case 'png':
                $newname .= '.png';
                $success = imagepng($thumb,$this->path.$newname);
                break;
            case 'gif':
                $newname .= '.gif';
                $success = imagegif($thumb,$this->path.$newname);
                break;
            case 'webp':
                $newname .= '.webp';
                $success = imagewebp($thumb,$this->path.$newname);

                break;
        }
        if ($success){
            $this->messages[]="$newname created successfully";
        } else {
            $this->message[]="Couldn't create a thumbnail for ". basename($this->original);
        }
        imagedestroy($resource);
        imagedestroy($thumb);
     }

     protected function createImageResource(){
        $resource = match ($this->imageType) {
            'jpeg'=> imagecreatefromjpeg($this->original),
            'png'=> imagecreatefrompng($this->original),
            'gif'=> imagecreatefromgif($this->original),
            'webp'=> imagecreatefromwebp($this->original)
        };

        return $resource;
     }
     

    public function getMessages(){
        return $this->messages;
    }

     protected function checkType($mime) {
        $mimetypes = ['image/jpeg','image/png','image/gif','image/webp'];
        if (in_array($mime,$mimetypes)) {
            $this->imageType = substr($mime,strpos($mime,'/')+1);
            return true;
        } else {
            return false;
        }
     }

     protected function setSuffix($suffix){
        if (preg_match('/^\w+$/',$suffix)){
            if (!str_starts_with($suffix,'_')){
                return '_'.$suffix;
            } else {
                return $suffix;
            }
        }
     }

     protected function calculateRatio() {
        if ($this->originalWidth <= $this->max && $this->originalHeight <= $this->max){
            return 1;
        }
        return ($this->originalWidth<=>$this->originalHeight)<0? 
                ($this->max/$this->originalHeight):($this->max/$this->originalWidth);
     }

   }
?>