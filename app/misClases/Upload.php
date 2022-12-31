<?php
   namespace App\misClases;

  class Upload {
      protected $newName;
      protected $permitted = ['image/gif','image/jpeg','image/pjpeg','image/png','image/webp'];
      protected $messages = [];

      public function __construct(string $field,protected string $path,protected int $max = 51200,string|array|null $mime = null,bool $rename = true) {
         if (!is_dir($this->path) && !is_writable($this->path)) {
            throw new \Exception("$this->path debe ser directorio valido y con permiso de escribir.");
         } else {
            $this->path = rtrim($this->path,'/\\') . DIRECTORY_SEPARATOR;
            if (!is_null($mime)){
                $this->permitted = array_merge($this->permitted,(array) $mime);
            }
            $uploaded = $_FILES[$field];
            if (is_array($uploaded['name'])){  // multiple uploads.
                $numFiles = count($uploaded['name']);
                $keys = array_keys($uploaded);
                for($i=0;$i < $numFiles;$i++){
                    $values = array_column($uploaded,$i);
                    $currentfile = array_combine($keys,$values);
                    $this->processUpload($currentfile,$rename);
                }
            } else {  // only one upload.
                $this->processUpload($_FILES['$field'],$rename);
            }
         }
      }

      protected function processUpload($uploaded,$rename){
          if ($this->checkFile($uploaded)) {
                $this->checkName($uploaded,$rename);
                $this->moveFile($uploaded);
          }
      }
      protected function checkName($file,$rename){
          $this->newName = null;
          $nospaces = str_replace(' ','_',$file['name']);
          if ($nospaces != $file['name']){
              $this->newName = $nospaces;
          }
          if ($rename){
              $name = $this->newName??$file['name'];
              if (file_exists($this->path.$name)){
                  $basename = pathinfo($name,PATHINFO_FILENAME);
                  $extension = pathinfo($name,PATHINFO_EXTENSION);
                  $this->newName = $basename. '_'. time(). ".$extension";
              }
          }
      }
      protected function checkFile($file) {
         $errorCheck = $this->getErrorLevel($file);
         $sizeCheck = $this->checkSize($file);
         $typeCheck = $this->checkType($file);
         return $errorCheck && $sizeCheck && $typeCheck;
      }

      protected function getErrorLevel($file) {
         $result = match($file['error']){
            0 => true,
            1,2 => $file['name'] . ' es muy grande: (max: '. $this->getMaxSize() .').',
            3 => $file['name'] . ' fue parcialmente subido.',
            4 => 'Archivo no enviado.',
            default => 'Lo siento, hay problemas al subir '. $file['name']
         };
         if ($result !== true) {
            $this->messages[] = $result;
            $result = false;
         }
         return $result;
      }

      protected function checkSize($file) {
         if ($file['error'] == 1 | $file['error'] == 2) {
            return false;
         } elseif ($file['size']==0){
            $this->messages[]= $file['name'] .' es un archivo vacio.';
            return false;
         } if ($file['size'] > $this->max){
            $this->messages[]= $file['name'] .' excede el tamaño maximo para un archivo ('.$this->getMaxSize() .')';
            return false;
         }
         return true;
      }

      protected function checkType($file) {
          if (empty($file['type'])) {
              return false;
          }
         if (!in_array($file['type'],$this->permitted)) {
            $this->messages[]= $file['name'] . ' tipo de archivo no permitido.';
            return false;
         }
         return true;
      }

      public function getMaxSize(){
         return number_format($this->max/1024,1).' KB';
      }

      protected function moveFile($file) {
         $filename = $this->newName??$file['name'];
         $success = move_uploaded_file($file['tmp_name'],$this->path.$filename);
         if ($success) {
            $result = $file['name']. ' fue subido exitosamente';
            if (!is_null($this->newName)){
                $result .= ', y fue renombrado '.$this->newName;
            }
            $this->messages[] = $result;
         } else {
            $this->messages[] = 'No se pudo subir '.$file['name'];
         }
      }

      public function getMessages() {
         return $this->messages;
      }
   }