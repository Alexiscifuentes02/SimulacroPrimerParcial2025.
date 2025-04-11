<?php
include_once 'Empresa.php';
include_once 'Venta.php';
include_once 'Moto.php';
include_once 'Cliente.php';

//1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
$objCliente1 = new Cliente("Alberto","Juarez",false,"CI",42105074);
$objCliente2 = new Cliente("Luis","Fort",false,"DNI",47050124);
/*2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación,
     descripción, porcentaje incremento anual, activo.
        código   costo   anio_fabricacion         Descripcion       porc_increment   activo
          11    2230000        2022          Benelli Imperiale 400       85%          true       191780000
          12     584000        2021            Zanella Zr 150 Ohc        70%          true        82344000
          13     999900        2023      Zanella Patagonian Eagle 250    55%          false */
$objMoto1 = new Moto(11,2230000,2022,"Benelli Imperiale 400",85,true);
$objMoto2 = new Moto(12,584000,2021,"Zanella Zr 150 Ohc",70,true);
$objMoto3 = new Moto(13,999900,2023,"Zanella Patagonian Eagle 250",55,false);
/*4. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
     Argentina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
     [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[]. */
$objEmpresa = new Empresa("Alta Gama","Av Argentina 123",[$objCliente1,$objCliente2],[$objMoto1,$objMoto2,$objMoto3],[]);
/*5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
     $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
     punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido. */
$importe = $objEmpresa->registrarVenta([11,12,13],$objCliente2);
echo "5. El importe es: " . $importe . "\n";
/*6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
     $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
     punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido. */
$importe = $objEmpresa->registrarVenta([0],$objCliente2);
echo "6. El importe es: " . $importe . "\n";
/*7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
     $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
     punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido. */
$importe = $objEmpresa->registrarVenta([2],$objCliente2);
echo "7. El importe es: " . $importe . "\n";
/*8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
     corresponden con el tipo y número de documento del $objCliente1. */
$ventasCliente1 = $objEmpresa->retornarVentasXCliente($objCliente1->getTipoDoc(),$objCliente1->getNroDoc());
echo "8. " . mostrarVentas($ventasCliente1);
/*9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
     corresponden con el tipo y número de documento del $objCliente2. */
$ventasCliente2 = $objEmpresa->retornarVentasXCliente($objCliente2->getTipoDoc(),$objCliente2->getNroDoc());
echo "9. " . mostrarVentas($ventasCliente2);
// ----------------------------------------------------------------------------------------------------
function mostrarVentas($ventas){
    if($ventas == null){
        $mensaje = "La venta es nula\n";
    }else{
        $mensaje = "Ventas del cliente: \n";
        for($i=0;$i<count($ventas);$i++){
            $mensaje = $mensaje . $ventas[$i] . "\n";
        }
    }
    return $mensaje;
}
//10. Realizar un echo de la variable Empresa creada en 2.
echo "----------------------------------------------------------------------------------------------------\n";
echo $objEmpresa->__toString();