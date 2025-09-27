<?php
date_default_timezone_set('America/Argentina/Cordoba');
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once(__DIR__ . '/../../library/TCPDF-main/tcpdf.php');

// Crear PDF sin márgenes ni saltos automáticos
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetMargins(0, 0, 0);
$pdf->SetAutoPageBreak(false, 0);
$pdf->AddPage();

// 📌 Fondo PNG en toda la hoja
$pageWidth = $pdf->getPageWidth();
$pageHeight = $pdf->getPageHeight();
$pdf->Image('./images/Blanco.png', 0, 0, $pageWidth, $pageHeight, '', '', '', false, 300, '', false, false, 0);

// 🏷️ Configuración de texto
$pdf->SetFont('helvetica', '', 10);
$pdf->SetTextColor(0, 0, 0); // Negro

// 🧾 Ejemplo de datos desde HTML
$cliente     = $_POST['cliente'] ?? null;
$fecha       = $_POST['fecha'] ?? date('d/m/Y');
$fechaSave   = $_POST['fecha'] ?? date('dmY');
$hora        = $_POST['hora'] ?? date('H:i:s');
$marca       = $_POST['marca'] ?? null;
$modelo      = $_POST['modelo'] ?? null;
$imei        = $_POST['imei'] ?? null;
$telefono    = $_POST['telefono'] ?? null;
$dni         = $_POST['dni'] ?? null;

//Checks
$ch_cargador = $_POST['cargador'] ?? false;
$ch_bateria  = $_POST['bateria'] ?? false;
$ch_simcard  = $_POST['simcard'] ?? false;
$ch_microsd  = $_POST['microsd'] ?? false;
$ch_funda    = $_POST['funda'] ?? false;
$ch_mouse    = $_POST['mouse'] ?? false;
$ch_teclado  = $_POST['teclado'] ?? false;
$ch_pendrive = $_POST['pendrive'] ?? false;
$ch_disco    = $_POST['disco'] ?? false;
$ch_btusb    = $_POST['btusb'] ?? false;
$ch_lectora  = $_POST['lectora'] ?? false;
$ch_pila     = $_POST['pila'] ?? false;
$ch_otro     = $_POST['otro'] ?? false;

//Datos del equipo
$contrasena  = $_POST['contrasena'] ?? '12344321';
$pin         = $_POST['pin'] ?? '12344321';
$patron = $_POST['imagenPatron'] ?? null;
$base64 = explode(',', $patron)[1] ?? null;
file_put_contents('patron.png', base64_decode($base64));

//Datos de presupuesto
$total       = $_POST['total'] ?? null;
$sena        = $_POST['sena'] ?? null;
$apagar      = $_POST['apagar'] ?? null;

// 📍 Posicionar cada label manualmente

// Encabezado
$pdf->SetXY(36, 25.1);
$pdf->Write(0, $fecha);

$pdf->SetXY(36, 32.95);
$pdf->Write(0, $hora);

// Fila de datos 1
$pdf->SetXY(20, 67.8);
$pdf->Write(0, $cliente);

$pdf->SetXY(109.5, 67.8);
$pdf->Write(0, $telefono);

// Fila de datos 2
$pdf->SetXY(20, 80.65);
$pdf->Write(0, $marca);

$pdf->SetXY(109.5, 80.65);
$pdf->Write(0, $modelo);

// Fila de datos 3
$pdf->SetXY(20, 94);
$pdf->Write(0, $imei);

$pdf->SetXY(109.5, 94);
$pdf->Write(0, $dni);

// Texto largo 
$x1 = 20;      // posición X
$y1 = 123;     // posición Y
$w1 = 170;     // ancho del área
$h1 = 40;      // alto del área

$texto_descripcion = $_POST['descripcion'] ?? null; //414 Carácteres limite.

// 🧾 MultiCell: crea un área con salto de línea automático
$pdf->MultiCell($w1, $h1, $texto_descripcion, 1, 'J', false, 1, $x1, $y1, true);


// Checks columna 1
if (isset($ch_cargador) && $ch_cargador == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(21, 156.6, 1, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_bateria) && $ch_bateria == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(21, 164, 1, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_simcard) && $ch_simcard == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(21, 171.4, 1, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

// Checks columna 2
if (isset($ch_microsd) && $ch_microsd == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(48.2, 156.6, 1, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_funda) && $ch_funda == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(48.2, 164, 1, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_mouse) && $ch_mouse == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(48.2, 171.4, 1, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

// Checks columna 3
if (isset($ch_teclado) && $ch_teclado == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(89.8, 156.6, 1, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_pendrive) && $ch_pendrive == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(89.8, 164, 1, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_disco) && $ch_disco == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(89.8, 171.4, 1, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

// Checks columna 4
if (isset($ch_btusb) && $ch_btusb == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(127.8, 156.6, 1, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_lectora) && $ch_lectora == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(127.8, 164, 1, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_pila) && $ch_pila == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(127.8, 171.4, 1, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

// Checks columna 5
if (isset($ch_otro) && $ch_otro == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(164, 156.6, 1, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

// Texto lado 1 
$x2 = 20;      // posición X
$y2 = 185;     // posición Y
$w2 = 81;     // ancho del área
$h2 = 40;      // alto del área

$texto_problema = $_POST['problema'] ?? null; //190 carácteres límite

// 🧾 MultiCell: crea un área con salto de línea automático
$pdf->MultiCell($w2, $h2, $texto_problema, 1, 'J', false, 1, $x2, $y2, true);

// Texto lado 2 
$x3 = 109.5;      // posición X
$y3 = 185;     // posición Y
$w3 = 81;     // ancho del área
$h3 = 40;      // alto del área

$texto_notas= $_POST['notas'] ?? null; //190 carácteres límite

// 🧾 MultiCell: crea un área con salto de línea automático
$pdf->MultiCell($w3, $h3, $texto_notas, 1, 'J', false, 1, $x3, $y3, true);

//Contraseña
$pdf->SetXY(20, 227.4);
$pdf->Write(0, $contrasena);

//PIN
$pdf->SetXY(20, 240);
$pdf->Write(0, $pin);

//Patron
if (!empty($patron) && isset($patron))
  {
    $pdf->Image('patron.png', 77, 220, 26, 26, 'PNG');
  } // x, y, ancho, alto

// Presupuesto

// 🏷️ Configuración de texto
$pdf->SetFont('helvetica', '', 8);
$pdf->SetTextColor(0, 0, 0); // Negro

//Total
$pdf->SetXY(160.5, 223.5);
$pdf->Write(0, '$' . $pin);

//Seña
$pdf->SetXY(160.5, 230.5);
$pdf->Write(0, '$' . $pin);

//A pagar
$pdf->SetXY(160.5, 237.5);
$pdf->Write(0, '$' . $pin);





// 🔚 Mostrar PDF
$pdf->Output('REC_' . strtoupper(str_replace(' ', '', $cliente)) . '_' . $fechaSave . '.pdf', 'I');
