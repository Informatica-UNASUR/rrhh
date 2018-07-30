<?php
include '../controlador/AsistenciaControlador.php';
require 'Classes/PHPExcel/IOFactory.php'; //Agregamos la librería

$nombre = $_FILES['archivo']['name'];
$guardado = $_FILES['archivo']['tmp_name'];

if (file_exists('archivos')) {
    if(move_uploaded_file($guardado, 'archivos/'.$nombre)){ // guarda el archivo
        //Variable con el nombre del archivo
        $nombreArchivo = 'archivos/'.$nombre;
        // Cargo la hoja de cálculo
        $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);

        //Asigno la hoja de calculo activa
        $objPHPExcel->setActiveSheetIndex(0);
        //Obtengo el numero de filas del archivo
        $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

        $bandera = 0;
        for ($i = 2; $i <= $numRows; $i++) {

            $fecha = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getValue();
            $fecha = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($fecha));

            $entrada = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
            $entrada = PHPExcel_Style_NumberFormat::toFormattedString($entrada, 'hh:mm');

            $salida = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
            $salida = PHPExcel_Style_NumberFormat::toFormattedString($salida, 'hh:mm');

            $entrada2 = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
            $entrada2 = PHPExcel_Style_NumberFormat::toFormattedString($entrada2, 'hh:mm');

            $salida2 = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
            $salida2 = PHPExcel_Style_NumberFormat::toFormattedString($salida2, 'hh:mm');

            $idempleado = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();

            if(!AsistenciaControlador::cargarAsistencia($fecha, $entrada, $salida, $entrada2, $salida2, $idempleado)){
                $bandera = 1;
                break;
            }
        }

        if($bandera == 0) {
            header("location:carga_asistencia.php");
        }
    }else{
        header("location:index.php");
    }
}

?>