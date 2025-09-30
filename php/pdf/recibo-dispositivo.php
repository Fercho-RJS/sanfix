<?php
date_default_timezone_set('America/Argentina/Cordoba');


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
$pdf->SetTextColor(90, 90, 90); // Negro

// 🧾 Ejemplo de datos desde HTML
$cliente     = $_POST['cliente'] ?? '[Nombre del Cliente]';
$fecha       = $_POST['fecha'] ?? date('d/m/Y');
$fechaSave   = $_POST['fecha'] ?? date('dmY');
$hora        = $_POST['hora'] ?? date('H:i:s');
$recibo_nro  = $_POST['nro-recibo'] ?? '##';
$marca       = $_POST['marca'] ?? '[Marca del Dispositivo]';
$modelo      = $_POST['modelo'] ?? '[Modelo del Dispositivo]';
$categoria   = $_POST['categoria'] ?? '[Categoría del Dispositivo]';
$imei        = $_POST['imei'] ?? '[Código IMEI del Dispositivo]';
$condicion   = $_POST['condicion'] ?? '[Condición del Dispositivo]';
$telefono    = $_POST['telefono'] ?? '[Teléfono del Cliente]';
$email       = $_POST['email'] ?? '[alguien@example.com]';
$direccion   = $_POST['direccion'] ?? '[Calle, Altura, Piso, Departamento]';
$dni         = $_POST['dni'] ?? '[Documento del Cliente]';

//Checks
$ch_cargador = $_POST['cargador'] ?? true;
$ch_bateria  = $_POST['bateria'] ?? true;
$ch_caja     = $_POST['caja'] ?? true;
$ch_simcard  = $_POST['simcard'] ?? true;
$ch_microsd  = $_POST['microsd'] ?? true;
$ch_funda    = $_POST['funda'] ?? true;
$ch_mouse    = $_POST['mouse'] ?? true;
$ch_teclado  = $_POST['teclado'] ?? true;
$ch_storagedisk = $_POST['storagedisk'] ?? true;
$ch_usbmemory    = $_POST['usbmemory'] ?? true;
$ch_cable    = $_POST['cable'] ?? true;
$ch_accesorios  = $_POST['accesorios'] ?? true;

// Check boxes adicionales
$ch_otro1     = isset($_POST['otro1']) ? true : false;
$ch_otro2     = isset($_POST['otro2']) ? true : false;
$ch_otro3     = isset($_POST['otro3']) ? true : false;
$ch_otro4     = isset($_POST['otro4']) ? true : false;
$ch_otro5     = isset($_POST['otro5']) ? true : false;
$ch_otro6     = isset($_POST['otro6']) ? true : false;
$ch_otro7     = isset($_POST['otro7']) ? true : false;
$ch_otro8     = isset($_POST['otro8']) ? true : false;
$otro1       = $_POST['texto-otro1'] ?? '[Otro 1]';
$otro2       = $_POST['texto-otro2'] ?? '[Otro 2]';
$otro3       = $_POST['texto-otro3'] ?? '[Otro 3]';
$otro4       = $_POST['texto-otro4'] ?? '[Otro 4]';
$otro5       = $_POST['texto-otro5'] ?? '[Otro 5]';
$otro6       = $_POST['texto-otro6'] ?? '[Otro 6]';
$otro7       = $_POST['texto-otro7'] ?? '[Otro 7]';
$otro8       = $_POST['texto-otro8'] ?? '[Otro 8]';

//Datos del equipo
$contrasena  = $_POST['contrasena'] ?? '';
$pin         = $_POST['pin'] ?? '';
$patron = $_POST['imagenPatron'] ?? null;
$base64 = explode(',', $patron)[1] ?? null;
file_put_contents('patron.png', base64_decode($base64));

//Datos de presupuesto
$total       = $_POST['total'] ?? null;
$sena        = $_POST['sena'] ?? null;
$apagar      = $_POST['apagar'] ?? null;

// 📍 Posicionar cada label manualmente

// Encabezado
$pdf->SetXY(60, 16);
$pdf->Write(0, $fecha);

$pdf->SetXY(36, 24.5);
$pdf->Write(0, $hora);

$pdf->SetXY(46, 32.8);
$pdf->Write(0, $recibo_nro);

// Columna de datos 1
$pdf->SetXY(56, 55.4);
$pdf->Write(0, $cliente);

$pdf->SetXY(40, 61);
$pdf->Write(0, $telefono);

$pdf->SetXY(34, 66);
$pdf->Write(0, $email);

$pdf->SetXY(38, 71.3);
$pdf->Write(0, $dni);

$pdf->SetXY(40, 76.5);
$pdf->Write(0, $direccion);


// Columna de datos 2
$pdf->SetXY(127, 55.4);
$pdf->Write(0, $marca);

$pdf->SetXY(129, 61);
$pdf->Write(0, $modelo);

$pdf->SetXY(132, 66);
$pdf->Write(0, $categoria);

$pdf->SetXY(140.5, 71.3);
$pdf->Write(0, $imei);

$pdf->SetXY(133.5, 76.5);
$pdf->Write(0, $condicion);


// Texto largo 
$x1 = 16;      // posición X
$y1 = 105;     // posición Y
$w1 = 178;     // ancho del área
$h1 = 45;      // alto del área

$texto_descripcion = $_POST['descripcion'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do'; //400 Carácteres limite.

// 🧾 MultiCell: crea un área con salto de línea automático
$pdf->MultiCell($w1, $h1, $texto_descripcion, 1, 'J', false, 1, $x1, $y1, true);


// Checks columna 1
if (isset($ch_cargador) && $ch_cargador == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(16.7, 135.7, 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_bateria) && $ch_bateria == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(16.7, 135.7 + (4.35 * 1), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_caja) && $ch_caja == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(16.7, 135.7 + (4.35 * 2), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_simcard) && $ch_simcard == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(16.7, 135.7 + (4.2 * 3), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

// Checks columna 2
if (isset($ch_microsd) && $ch_microsd == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(38.7, 135.7, 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_funda) && $ch_funda == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(38.7, 135.7 + (4.35 * 1), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_mouse) && $ch_mouse == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(38.7, 135.7 + (4.35 * 2), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_teclado) && $ch_teclado == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(38.7, 135.7 + (4.2 * 3), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

// Checks columna 3
if (isset($ch_storagedisk) && $ch_storagedisk == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(71.8, 135.7, 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_usbmemory) && $ch_usbmemory == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(71.8, 135.7 + (4.35 * 1), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_cable) && $ch_cable == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(71.8, 135.7 + (4.35 * 2), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

if (isset($ch_accesorios) && $ch_accesorios == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(71.8, 135.7 + (4.2 * 3), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
}

// Checks columna 5
if (isset($ch_otro1) && $ch_otro1 == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(108.5, 135.7, 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
  // 🏷️ Configuración de texto
  $pdf->SetFont('helvetica', '', 9);
  $pdf->SetXY(110.5, 133.4);
  $pdf->Write(0, $otro1);
}

if (isset($ch_otro2) && $ch_otro2 == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(108.5, 135.7 + (4.35 * 1), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
  // 🏷️ Configuración de texto
  $pdf->SetFont('helvetica', '', 9);
  $pdf->SetXY(110.5, 133.4 + (4.4 * 1));
  $pdf->Write(0, $otro2);
}

if (isset($ch_otro3) && $ch_otro3 == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(108.5, 135.7 + (4.35 * 2), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
  // 🏷️ Configuración de texto
  $pdf->SetFont('helvetica', '', 9);
  $pdf->SetXY(110.5, 133.4 + (4.2 * 2));
  $pdf->Write(0, $otro3);
}

if (isset($ch_otro4) && $ch_otro4 == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(108.5, 135.7 + (4.2 * 3), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
  // 🏷️ Configuración de texto
  $pdf->SetFont('helvetica', '', 9);
  $pdf->SetXY(110.5, 133.4 + (4.2 * 3));
  $pdf->Write(0, $otro4);
}

// Checks columna 5
if (isset($ch_otro5) && $ch_otro5 == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(151, 135.7, 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
  // 🏷️ Configuración de texto
  $pdf->SetFont('helvetica', '', 9);
  $pdf->SetXY(154, 133.4);
  $pdf->Write(0, $otro5);
}

if (isset($ch_otro6) && $ch_otro6 == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(151, 135.7 + (4.35 * 1), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
  // 🏷️ Configuración de texto
  $pdf->SetFont('helvetica', '', 9);
  $pdf->SetXY(154, 133.4 + (4.4 * 1));
  $pdf->Write(0, $otro6);
}

if (isset($ch_otro7) && $ch_otro7 == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(151, 135.7 + (4.35 * 2), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
  // 🏷️ Configuración de texto
  $pdf->SetFont('helvetica', '', 9);
  $pdf->SetXY(154, 133.4 + (4.2 * 2));
  $pdf->Write(0, $otro7);
}

if (isset($ch_otro8) && $ch_otro8 == true) {
  $pdf->SetFillColor(0, 0, 0); //Color
  $pdf->Circle(151, 135.7 + (4.2 * 3), 0.5, 0, 360, 'DF'); // X, Y, radio, ángulo inicial, final, estilo
  // 🏷️ Configuración de texto
  $pdf->SetFont('helvetica', '', 9);
  $pdf->SetXY(154, 133.4 + (4.2 * 3));
  $pdf->Write(0, $otro8);
}

// Texto lado 1 
$x2 = 16;      // posición X
$y2 = 160;     // posición Y
$w2 = 86;     // ancho del área
$h2 = 40;      // alto del área

$texto_problema = $_POST['problema'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. olore magna aliqua. olore magna aliqua. olore magna aliqua.'; //170 carácteres límite

// 🧾 MultiCell: crea un área con salto de línea automático
$pdf->MultiCell($w2, $h2, $texto_problema, 1, 'J', false, 1, $x2, $y2, true);

// Texto lado 2 
$x3 = 109.5;      // posición X
$y3 = 183;     // posición Y
$w3 = 0;     // ancho del área
$h3 = 40;      // alto del área

$texto_notas = $_POST['notas'] ?? null; //190 carácteres límite

// 🧾 MultiCell: crea un área con salto de línea automático
$pdf->MultiCell($w3, $h3, $texto_notas, 1, 'J', false, 1, $x3, $y3, true);

//Contraseña
$pdf->SetXY(20, 227.4);
$pdf->Write(0, $contrasena);

//PIN
$pdf->SetXY(20, 240);
$pdf->Write(0, $pin);

//Patron
if (!empty($patron) && isset($patron)) {
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
