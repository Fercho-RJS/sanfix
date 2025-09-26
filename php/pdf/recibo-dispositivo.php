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
$cliente     = $_POST['cliente'] ?? 'Nombre del cliente';
$fecha       = $_POST['fecha'] ?? date('d/m/Y');
$fechaSave   = $_POST['fecha'] ?? date('dmY');
$hora        = $_POST['hora'] ?? date('H:i:s');
$marca       = $_POST['marca'] ?? 'Motorola';
$modelo      = $_POST['modelo'] ?? 'Modelo';
$imei        = $_POST['imei'] ?? '000000000000000';
$telefono    = $_POST['telefono'] ?? '+54 9 3408 435682';
$dni         = $_POST['dni'] ?? '44495699';

//Checks
$ch_cargador = $_POST['cargador'] ?? true;
$ch_bateria  = $_POST['bateria'] ?? true;
$ch_simcard  = $_POST['simcard'] ?? true;
$ch_microsd  = $_POST['microsd'] ?? true;
$ch_funda    = $_POST['funda'] ?? true;
$ch_mouse    = $_POST['mouse'] ?? true;
$ch_teclado  = $_POST['teclado'] ?? true;
$ch_pendrive = $_POST['pendrive'] ?? true;
$ch_disco    = $_POST['disco'] ?? true;
$ch_btusb    = $_POST['btusb'] ?? true;
$ch_lectora  = $_POST['lectora'] ?? true;
$ch_pila     = $_POST['pila'] ?? true;
$ch_otro     = $_POST['otro'] ?? true;

//Datos del equipo
$contrasena  = $_POST['contrasena'] ?? '12344321';
$pin         = $_POST['pin'] ?? '12344321';
$patron      = $_POST['patron'] ?? null;

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

$texto_descripcion = "Lorem Ipsum se refiere a un texto de relleno, o texto falso, que se utiliza en diseño gráfico y maquetación como marcador de posición para simular un contenido real sin distraer del aspecto visual del diseño. Procede de un texto latino de Cicerón pero está modificado y no tiene un significado coherente para el lector moderno, lo que permite centrarse en la tipografía, los colores y la distribución del espacio."; //414 Carácteres limite.

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

$texto_problema = "Lorem Ipsum se refiere a un texto de relleno, o texto falso, que se utiliza en diseño gráfico y maquetación como marcador de posición para simular un contenido real sin distraer del aspecto."; //190 carácteres límite

// 🧾 MultiCell: crea un área con salto de línea automático
$pdf->MultiCell($w2, $h2, $texto_problema, 1, 'J', false, 1, $x2, $y2, true);

// Texto lado 2 
$x3 = 109.5;      // posición X
$y3 = 185;     // posición Y
$w3 = 81;     // ancho del área
$h3 = 40;      // alto del área

$texto_notas = "Lorem Ipsum se refiere a un texto de relleno, o texto falso, que se utiliza en diseño gráfico y maquetación como marcador de posición para simular un contenido real sin distraer del aspecto."; //190 carácteres límite

// 🧾 MultiCell: crea un área con salto de línea automático
$pdf->MultiCell($w3, $h3, $texto_notas, 1, 'J', false, 1, $x3, $y3, true);

//Contraseña
$pdf->SetXY(20, 227.4);
$pdf->Write(0, $contrasena);

//PIN
$pdf->SetXY(20, 240);
$pdf->Write(0, $pin);


// 🔚 Mostrar PDF
$pdf->Output('REC_' . strtoupper(str_replace(' ', '', $cliente)) . '_' . $fechaSave . '.pdf', 'I');
