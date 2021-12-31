<?php

namespace App;

class ActiveRecord{
      //base de Datos

      protected static $db;
      protected static $culumnasDB = [];
      protected static $tabla = '';
      //errores
      protected static $errores = [];
  
     
  
       //defiinir la conexcion a la DB
       public static function setDB($database){
          self::$db = $database;
      }
  
  
      public function crear(){
  
          //sanitizar entrada de datos
          $atributos = $this->sanitizarAtributos();
         
          //insertar en la base de datos
          $query = "INSERT INTO " . static::$tabla . " ( ";
          $query.=join(', ', array_keys($atributos));
          $query.=" ) VALUES (' ";
          $query.= join("', '", array_values($atributos));    
          $query.=" ');";
        
          $resultado = self::$db->query($query);
          //mensaje de exito o error
          if ($resultado) {
              //redireccionar al usuario
              header('location:/admin?resultado=1');
           }
      }
      
    //   public function actualizar(){
    //       $atributos = $this->sanitizarAtributos();
    //       $valores = [];
    //       foreach($atributos as $key => $value){
    //           $valores[] = "{$key}='${value}'";
    //       }
  
    //           $query = "UPDATE " . static::$tabla . " SET ";
    //       $query .= join(', ', $valores );
    //       $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
    //       $query .= " LIMIT 1 ;"; 
          
    //       $resultado = self::$db->query($query);
    //       if ($resultado) {
    //           //redireccionar al usuario
    //           header('location:/admin?resultado=2');
    //        }
    //   }
  
    //   //Eliminar un regristro
    //   public function eliminar(){
    //       //Eliminar propiedad
    //       $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1;";
    //       $resultado = self::$db->query($query);
  
    //       if($resultado){
    //           $this->eliminarImagen();
    //           header('location:/admin?resultado=3');
    //       }
    //   }
  
  
      //identidicar y unir los atributos de la base de datos
      public function atributos(){
          $atributos = [];
          foreach(static::$culumnasDB as $columna){
          if($columna === 'idusuarios') continue;
              $atributos[$columna] = $this->$columna;
          }
          return $atributos;
      }
  
  
      public function sanitizarAtributos(){
          $atributos = $this->atributos();    
          $sanitizado = [];
          
          foreach ($atributos as $key => $value ){
              $sanitizado[$key] = self::$db->escape_string($value);
          }
          return $sanitizado; 
      }
  
      //subida de archivos
    //   public function setImagen($imagen){
  
    //       //alimina la imagen previa
    //       if(!is_null($this->id) ){
    //          $this->eliminarImagen();
    //       }
    //       //Asignar al atributo imagen el nombre de la imagen
    //       if($imagen){
    //           $this->imagen = $imagen;
    //       }
    //   }
     
  
      //Eliminar Imagen{
        //   public function eliminarImagen(){
        //       $existeArchivo = file_exists(CARPETAS_IMAGENES . $this->imagen);
        //       if($existeArchivo){
        //           unlink(CARPETAS_IMAGENES . $this->imagen);
        //       }
        //   }
      //validacion
      public static function getErrores(){
          return static::$errores;
      }
  
      public function validar(){
           static::$errores = [];
           return static::$errores;
      }
  
      //listar todas las propiedades
      public static function all(){
          $query = "SELECT * FROM ". static::$tabla;
          $resultado = self::consultaSQL($query);
        
          return $resultado;
      }
  
      //busca un registro por su ID
      ////consulta para las propiedades
      public static function find($id){
          $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
          $resultado = self::consultaSQL($query);
          return array_shift($resultado);
      }
  
      public static function consultaSQL($query){
          //consultar la BD 
          $resultado = self::$db->query($query); 
          
          //Iterar los resultados
          $array = [];
          
          while($resgistro = $resultado->fetch_assoc()){
              $array[] = static::crearObjeto($resgistro); 
          }
          //liberar la memoria
          $resultado->free();
          //retornar los resultado
          return $array;
      }
  
      protected static function crearObjeto($resgistro){
          $objeto = new static;
          
          foreach($resgistro as $key => $value) {
              
              if(property_exists($objeto, $key)){
                  $objeto->$key = $value;
              }
          }
  
          return $objeto;
      }
  
      //sincroniza el objeto en memoria con los cambios realizados por el usuario
      public function sincronizar($args = []){
          foreach($args as $key => $value) {
              if(property_exists($this, $key ) && !is_null($value)){
                  $this->$key = $value;
              }
          }
      }

}