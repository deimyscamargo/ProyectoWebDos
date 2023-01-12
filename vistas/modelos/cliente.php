<?php 

    class Cliente {

        public $identificador;
        public $tipoIdentificacion;
        public $nombres;
        public $apellidos;
        public $direccionDeResidencia;
        public $correoElectronico;
        public $numeroCelular;
        public $fechaNacimiento;
        public $nombresAcompanante;
        public $apellidosAcompanante;
        public $numeroCelularAcompanante;
        public $correoAcompanante;
        public $fechaNacimientoAcompanante;
        public $usuarios_idusuario ;

        

        
       public function __construct($identificador,$tipoIdentificacion,$nombres,$apellidos,$direccionDeResidencia,
                                    $correoElectronico,$numeroCelular,$fechaNacimiento,$nombresAcompanante,
                                    $apellidosAcompanante,$numeroCelularAcompanante,$correoAcompanante,
                                    $fechaNacimientoAcompanante, $usuarios_idusuario) {

         $this->identificador = $identificador;                               
         $this->tipoIdentificacion = $tipoIdentificacion;                               
         $this->nombres = $nombres;
         $this->apellidos = $apellidos;
         $this->direccionDeResidencia = $direccionDeResidencia;
         $this->correoElectronico = $correoElectronico;
         $this->numeroCelular = $numeroCelular;
         $this->fechaNacimiento = $fechaNacimiento;
         $this->nombresAcompanante = $nombresAcompanante;
         $this->apellidosAcompanante = $apellidosAcompanante;
         $this->numeroCelularAcompanante = $numeroCelularAcompanante;
         $this->correoAcompanante = $correoAcompanante;
         $this->fechaNacimientoAcompanante = $fechaNacimientoAcompanante;
         $this->usuarios_idusuario = $usuarios_idusuario;
       }


       public function getidentificador() {

          return $identificador;
       }
    
       
    }




?>