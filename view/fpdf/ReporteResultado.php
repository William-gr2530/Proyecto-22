<?php

require('./fpdf.php');
include("../../model/realizarModel.php");
$user = new realizarModel();

$buscar="";
$buscar=$_REQUEST['buscar'];
if ($buscar!=""){ 

$Lista = $user->Buscarexamen($buscar);

}else{ 

$Lista = $user->VerPruevas();

}

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
   

      $this->Image('../../img/logoLab.png', 185, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('LABORATORIO CLINICO 240'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación :Tercera avenida norte  "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono :22**-**45 "), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo :Laboratorio240@gmail.com "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal :2-240 "), 0, 0, '', 0);
      $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color

     
      $buscar="";
      $buscar=$_REQUEST['buscar'];
      if ($buscar!=""){ 


      $this->SetTextColor(19, 71, 223);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("RESULTADOS DEl PACIENTE: "), 0, 1, 'C', 0);
      $this->Ln(1);

      $this->SetTextColor(14, 19, 35);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      
         $this->Cell(100, 10, utf8_decode($_REQUEST['buscar']), 0, 1, 'C', 0);
       
       $this->Ln(7);
      } else {
         $this->SetTextColor(19, 71, 223);
         $this->Cell(50); // mover a la derecha
         $this->SetFont('Arial', 'B', 15);
         $this->Cell(100, 10, utf8_decode("REPORTE DE TODOS LOS ANALISIS: "), 0, 1, 'C', 0);
         $this->Ln(1);
      }




      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(129, 156, 233); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      
      $this->Cell(63, 10, utf8_decode('EXAMEN'), 1, 0, 'C', 1);
      $this->Cell(85, 10, utf8_decode('RESULTADOS'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('FECHA'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();






$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

foreach($Lista as $usuario){
   $pdf->Cell(63, 10, utf8_decode($usuario['examen']), 1, 0, 'C', 0);
   $pdf->Cell(85, 10, utf8_decode($usuario['resultado']), 1, 0, 'C', 0);
   $pdf->Cell(35, 10, utf8_decode($usuario['Fecha']), 1, 1, 'C', 0);
 }
date_default_timezone_set("America/El_Salvador");
$fecha=date("d/m/Y h:i");

$pdf->Output('Reseltados'.$fecha.'.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
