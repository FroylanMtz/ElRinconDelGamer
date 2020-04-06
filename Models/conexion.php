<?php

//Clase que se conecta ala base de datos pasandole los datos de la especifica conexion 
//Vemos que esta conexion es atraves de un PDO para brindar mayor robustez y trabajar con el paradigma orientado a objetos
class Conexion{

    public function conectar(){
        $pdo = new PDO("mysql:host=localhost;dbname=rincondelgamer", "admin", "ab0427caf8f5b9564526ab32c5dee7a3ac529ca15c0d2d2b");
        return $pdo;
    }

}