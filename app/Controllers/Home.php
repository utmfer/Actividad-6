<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

//Respuesta tipo Array

    public function ProductosLimpieza (){

        $producto= array (
            "ID" => "00021",
            "nombre" => "Pinoclin",
            "Precio" => "0.50"
        );

        return $this->response->set.Json($producto);

    }

//Respuesta tipo Lista

    public function ProductosLimpiezaLista()   {
        $productos = [
            [
                "ID" => "00021",
                "nombre" => "Pinoclin",
                "Precio" => "0.50"
            ],
            [
                "ID" => "00022",
                "nombre" => "Limpiador Multiusos",
                "Precio" => "1.20"
            ],
            [
                "ID" => "00023",
                "nombre" => "Escoba de Cerdas",
                "Precio" => "3.50"
            ]
            // Agrega más productos según sea necesario
        ];
    
        return $this->response->setJSON($productos);
    }

 // Respuesta mensaje 

   public function Mensaje()
    {
        $mensaje = "Esta es una respuesta simple desde la API.";
    
        return $this->response->setJSON(["mensaje" => $mensaje]);
    }


 //Array Asociativo

    public function MostrarCliente()
    {
        $datos = [
            "nombre" => "Juan",
            "edad" => 25,
            "ciudad" => "Ciudad de Ejemplo"
        ];
    
        return $this->response->setJSON($datos);
    }

    public function inserta($Marca, $Modelo, $Precio) {
        $this->db = \Config\Database::connect(); 
    
        $data = [
            'Marca'  => $Marca,
            'Modelo' => $Modelo,
            'Precio' => $Precio,
        ];
    
        try {
            $this->db->table('equipos')->insert($data);
    
            $response = [
                'status'  => 'success',
                'message' => 'Registro insertado correctamente.',
            ];
    
            return $this->response->setJSON($response);
        } catch (\Exception $e) {
            $response = [
                'status'  => 'error',
                'message' => 'Error al insertar el registro: ' . $e->getMessage(),
            ];
    
            return $this->response->setJSON($response);
        }





    }

    public function actualiza($id, $marca, $modelo, $precio){
        $this->db = \Config\Database::connect();

        $data = [
            'Marca'  => $marca,
            'Modelo' => $modelo,
            'Precio' => $precio,
        ];

        try {
            $this->db->table('equipos')->where('id', $id)->update($data);

            $response = [
                'status'  => 'success',
                'message' => 'Registro actualizado correctamente.',
            ];

            return $this->response->setJSON($response);
        } catch (\Exception $e) {
            $response = [
                'status'  => 'error',
                'message' => 'Error al actualizar el registro: ' . $e->getMessage(),
            ];

            return $this->response->setJSON($response);
        }
    }

    public function selecciona($id) {
        $this->db = \Config\Database::connect();
    
        // Aqui se realiza la lógica de selección
        $query = $this->db->table('equipos')->where('id', $id)->get();
        $resultado = $query->getResult();
    
        return $this->response->setJSON($resultado);
    }
    

    public function elimina($id) {
        $this->db = \Config\Database::connect();
    
        try {
            // Aqui se realiza la lógica de eliminación
            $this->db->table('equipos')->where('id', $id)->delete();
    
            $response = [
                'status'  => 'success',
                'message' => 'Registro eliminado correctamente.',
            ];
    
            return $this->response->setJSON($response);
        } catch (\Exception $e) {
            $response = [
                'status'  => 'error',
                'message' => 'Error al eliminar el registro: ' . $e->getMessage(),
            ];
    
            return $this->response->setJSON($response);
        }
    }
    

}