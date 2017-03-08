-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 10:48 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `becap_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `becas`
--

CREATE TABLE `becas` (
  `ID_Beca` int(11) NOT NULL,
  `Nombre_Beca` varchar(250) DEFAULT NULL,
  `ID_Tipo` int(11) NOT NULL,
  `ID_Escuela` int(11) DEFAULT NULL,
  `Nivel_Estudio` varchar(30) DEFAULT NULL,
  `Estatus_Alumno` varchar(50) DEFAULT NULL,
  `Promedio_Acceso` varchar(100) DEFAULT NULL,
  `Promedio_Mantener` varchar(100) DEFAULT NULL,
  `Estudio_Socioeco` tinyint(1) DEFAULT NULL,
  `Examen_Admision` varchar(100) DEFAULT NULL,
  `Puntaje` varchar(100) DEFAULT NULL,
  `Examen_Idiomas` varchar(100) DEFAULT NULL,
  `Puntuaje_Idiomas` varchar(100) DEFAULT NULL,
  `Descripcion_Beca` varchar(300) DEFAULT NULL,
  `Requisitos_Espe` varchar(300) DEFAULT NULL,
  `Contacto` varchar(300) DEFAULT NULL,
  `Telefono` varchar(300) DEFAULT NULL,
  `Link_Beca` varchar(300) DEFAULT NULL,
  `Porcentaje_Beca` varchar(100) DEFAULT NULL,
  `Porcentaje_Credito` varchar(100) DEFAULT NULL,
  `Tasa_Interes` varchar(100) DEFAULT NULL,
  `Nom_Descriptivo` varchar(40) DEFAULT NULL,
  `Beca_Sobre` varchar(255) DEFAULT NULL,
  `Requiere_Promedio` tinyint(1) DEFAULT NULL,
  `Ingresos_Comprobar` varchar(255) DEFAULT NULL,
  `Requiere_Examen` tinyint(1) DEFAULT NULL,
  `Requiere_Idiomas` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `becas`
--

INSERT INTO `becas` (`ID_Beca`, `Nombre_Beca`, `ID_Tipo`, `ID_Escuela`, `Nivel_Estudio`, `Estatus_Alumno`, `Promedio_Acceso`, `Promedio_Mantener`, `Estudio_Socioeco`, `Examen_Admision`, `Puntaje`, `Examen_Idiomas`, `Puntuaje_Idiomas`, `Descripcion_Beca`, `Requisitos_Espe`, `Contacto`, `Telefono`, `Link_Beca`, `Porcentaje_Beca`, `Porcentaje_Credito`, `Tasa_Interes`, `Nom_Descriptivo`, `Beca_Sobre`, `Requiere_Promedio`, `Ingresos_Comprobar`, `Requiere_Examen`, `Requiere_Idiomas`) VALUES
(1, 'Distinción talento académico', 1, 21, 'Profesional', 'Preparatoria', '90', '85', 0, 'PA', '1400', 'TOEFL iBT', 'NA', 'La beca puede ser de 40/50/60/70%. Aplica a nivel nacional y requiere servicio Becario', 'Aplica a nivel nacional y requiere servicio Becario', 'apoyosfinancieros@itesm.mx', '83582000 Ext 3505-09', 'http://admision.itesm.mx/apoyos-financieros-y-becas', '70%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(2, 'Beca líderes del mañana', 1, 21, 'Profesional', 'Preparatoria', '90', '85', 1, 'PA', '1400', 'TOEFL iBT', 'NA', 'Aplica a nivel nacional e incluye SGMM', 'Aplica a nivel nacional e incluye SGMM', 'lideresdelmanana@servicios.itesm.mx', '83582004 Ext 3505-09', 'http://admision.itesm.mx/apoyos-financieros-y-becas', '100%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(3, 'Beca socioeconómica', 2, 21, 'Profesional', 'Preparatoria', '85', '85', 0, 'PA', '1300', 'TOEFL iBT', 'NA', 'Financiamiento del 20 al 80%. Servicio Becario y aplica para alumnos nuevos/actuales', 'Servicio Becario y aplica para alumnos nuevos/actuales', 'Apoyosfinancieros@itesm.mx', '83582000 Ext 3505-09', 'http://admision.itesm.mx/apoyos-financieros-y-becas', 'NA', '80%', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(4, 'Becas LEC/LPO/LCMD/LLE', 1, 21, 'Profesional', 'Preparatoria', '85', '85', 0, 'PA', '1400', 'TOEFL iBT', 'NA', 'La beca puede ser de 40 o 60%. Obtener primero o segundo lugar en la convocatoria', 'Obtener primero o segundo lugar en la convocatoria', 'mmendiol@itesm.mx', 'No hay teléfono', 'http://admision.itesm.mx/apoyos-financieros-y-becas', '60%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(5, 'Becas INCQ/IIA', 1, 21, 'Profesional', 'Preparatoria', '85', '85', 0, 'PA', '1400', 'TOEFL iBT', 'NA', 'La beca puede ser de 40 o 60%. Obtener primero o segundo lugar en la convocatoria', 'Obtener primero o segundo lugar en la convocatoria', 'becaletras.mty@itesm.mx', 'No hay teléfono', 'http://admision.itesm.mx/apoyos-financieros-y-becas', '60%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(6, 'Becas MO/LNB/LP/LPS', 1, 21, 'Profesional', 'Preparatoria', '85', '85', 0, 'PA', '1400', 'TOEFL iBT', 'NA', 'La beca puede ser de 40 o 60%. Obtener primero o segundo lugar en la convocatoria', 'Obtener primero o segundo lugar en la convocatoria', 'jlmontes@itesm.mx', 'No hay teléfono', 'http://admision.itesm.mx/apoyos-financieros-y-becas', '60%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(7, 'Becas ARQ/LAD/LDI', 1, 21, 'Profesional', 'Preparatoria', '85', '85', 0, 'PA', '1400', 'TOEFL iBT', 'NA', 'La beca puede ser de 40 o 60%. Obtener primero o segundo lugar en la convocatoria', 'Obtener primero o segundo lugar en la convocatoria', 'No hay correo', 'No hay teléfono', 'http://admision.itesm.mx/apoyos-financieros-y-becas', '60%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(8, 'Becas IQP/IDS/IID/ISD', 1, 21, 'Profesional', 'Preparatoria', '85', '85', 0, 'PA', '1400', 'TOEFL iBT', 'NA', 'La beca puede ser de 40 o 60%. Obtener primero o segundo lugar en la convocatoria', 'Obtener primero o segundo lugar en la convocatoria', 'becas.ingenieria.mty@itesm.mx', 'No hay teléfono', 'http://admision.itesm.mx/apoyos-financieros-y-becas', '60%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(9, 'Becas Gallagher', 1, 21, 'Profesional', 'Preparatoria', '95', '95', 1, 'PA', '1400', 'TOEFL iBT', 'NA', 'Alumnos de 1er ingreso y entrevista con la fundación', 'Alumnos de 1er ingreso y entrevista con la fundación', 'becas.mty@itesm.mx', 'No hay teléfono', 'http://admision.itesm.mx/apoyos-financieros-y-becas', '100%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(10, 'Becas al talento deportivo', 1, 21, 'Profesional', 'Preparatoria', '80', '75', 0, 'PA', '1200', 'TOEFL iBT', 'NA', 'La beca puede ser del 50 al 80%. Deportes: fútbol/basquetbol/volibol/natación/fútbol/americano varonil/tenis/beisbol varonil/taekwondo/atletismo/tenis de mesa/futbol rapido', 'No existen requisitos especiales', 'alejandra.delgado@tesm.mx', 'No hay teléfono', 'http://admision.itesm.mx/apoyos-financieros-y-becas', '80%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(11, 'Becas al talento musical', 1, 21, 'Profesional', 'Preparatoria', '80', '80', 0, 'PA', '1200', 'TOEFL iBT', 'NA', 'La beca puede ser del 50 al 80%. Instrumentos: flauta transversa/oboe/corno inglés/corno francés/clarinete/clarinete/bajo/fagot/trompeta/trombón/tuba/timbal/xilófono/marimba/violines/viola/violonchelo/contrabajo/clarinete bajo', 'No existen requisitos especiales', 'hazael@itesm.mx', 'No hay teléfono', 'http://admision.itesm.mx/apoyos-financieros-y-becas', '80%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(12, 'Becas Jesús m. Montemayor', 3, 21, 'Profesional', 'Preparatoria', '90', '90', 1, 'PA', '1320', 'TOEFL iBT', 'NA', 'El Tec de Monterrey facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'Apoyo para compras de libros', 'becas.mty@itesm.mx', 'No hay teléfono', 'http://admision.itesm.mx/apoyos-financieros-y-becas', 'NA', 'NA', 'NA', 'Apoyo en Compra de Libros', 'sobre colegiatura', 1, 'NA', 1, 1),
(13, 'Dr. Xorge Alejandro Domínguez', 1, 21, 'Profesional', 'Preparatoria', '90', '90', 1, 'PA', '1320', 'TOEFL iBT', 'NA', 'Requier tener Beca Tec y que sea en Campus Monterrey', 'Requier tener Beca Tec y que sea en Campus Monterrey', 'mvidea@itesm.mx', 'No hay teléfono', 'http://admision.itesm.mx/apoyos-financieros-y-becas', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(14, 'Beca Selider', 1, 21, 'Profesional', 'Preparatoria', '90', '90', 1, 'PA', '1350', 'TOEFL iBT', 'NA', 'El Tec de Monterrey facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'beca.selider@gmail.com', '8375 2107 y 04', 'www.selider.org', '100%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(15, 'Beca QH Tecnológico', 2, 21, 'Profesional', 'Preparatoria', '90', '90', 1, 'PA', '1300', 'TOEFL iBT', 'NA', 'El Tec de Monterrey facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'carlos.gabriel.puente@itesm.mx', 'No hay teléfono', 'http://www.mty.itesm.mx/becas', 'NA', '30%', 'NA', 'Sin Descripción', 'sobre mensualidad', 1, 'NA', 1, 1),
(16, 'Campo San Antonio Pape', 1, 21, 'Profesional', 'Preparatoria', '95', '90', 1, 'PA', '1300', 'TOEFL iBT', 'NA', 'El Tec de Monterrey facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'carlos.gabriel.puente@itesm.mx', 'No hay teléfono', 'http://www.mty.itesm.mx/becas', '100%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(17, 'Fundación Zaber', 1, 21, 'Profesional', 'Preparatoria', '90', '90', 1, 'PA', '1300', 'TOEFL iBT', 'NA', 'El Tec de Monterrey facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'carlos.gabriel.puente@itesm.mx', 'No hay teléfono', 'http://www.mty.itesm.mx/becas', '100%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(18, 'Casas de asistencia', 3, 21, 'Profesional', 'Preparatoria', '85', '85', 1, 'PA', '1300', 'TOEFL iBT', 'NA', 'Ser alumno becado (contar con al menos un 60% de apoyo financiero) Cuota mensual', 'Ser alumno becado (contar con al menos un 60% de apoyo financiero) Cuota mensual', 'carolina.morales@itesm.mx', 'No hay teléfono', 'http://frgs.org/', 'NA', 'NA', 'NA', 'Apoyo en Casas de Asistencia', 'sobre gastos escolares', 1, 'NA', 1, 1),
(19, 'Casas asistencia Fraternidad', 3, 21, 'Profesional', 'Preparatoria', '85', '85', 1, 'PA', '1300', 'TOEFL iBT', 'NA', 'Ser alumno becado (contar con al menos un 60% de apoyo financiero)', 'Tener una beca académica minimo del 70%', 'carlos.gabriel.puente@itesm.mx', 'No hay teléfono', 'http://admision.itesm.mx/apoyos-financieros-y-becas', 'NA', 'NA', 'NA', 'Apoyo en Casas de Asistencia', 'sobre gastos escolares', 1, 'NA', 1, 1),
(20, 'Red de filantropía', 3, 21, 'Profesional', 'Preparatoria', '70', '85', 1, 'PA', 'NA', 'TOEFL iBT', 'NA', 'Tener una beca académica minimo del 70%', 'Ser alumno becado (contar con al menos un 60% de apoyo financiero)', 'redfilantropia.mty@itesm.mx', 'No hay teléfono', 'http://admision.itesm.mx/apoyos-financieros-y-becas', 'NA', 'NA', 'NA', '1500 mensuales', 'sobre gastos escolares', 1, 'NA', 1, 1),
(21, 'Impulso educativo Santander', 1, 21, 'Profesional', 'Preparatoria', '80', '80', 0, 'PA', 'NA', 'TOEFL iBT', 'NA', 'Financiamiento del 20 al 80%', 'No existen requisitos especiales', 'ecuenta1suc5480@santander.com.mx', 'Tel externo. 8387-8413 Tels 01 800 BECA TEC +52 (81) 8328-4048', 'Impulsos Educativos Santander', 'NA', '80%', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(22, 'Crédito educativo Tec', 1, 21, 'Profesional', 'Preparatoria', '70', '70', 0, 'PA', 'NA', 'TOEFL iBT', 'NA', 'El Tec de Monterrey facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'becas.mty@itesm.mx', 'Tels 01 800 BECA TEC +52 (81) 8328-4048', 'http://admision.itesm.mx/apoyos-financieros-y-becas', 'NA', '25%', 'NA', 'Sin Descripción', 'sobre mensualidad', 1, 'NA', 1, 1),
(23, 'Crédito educativo Tec', 1, 21, 'Profesional', 'Preparatoria', '70', '70', 0, 'PA', 'NA', 'TOEFL iBT', 'NA', 'El Tec de Monterrey facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'becas.mty@itesm.mx', 'Tels 01 800 BECA TEC +52 (81) 8328-4048', 'http://admision.itesm.mx/apoyos-financieros-y-becas', 'NA', '20%', 'NA', 'Sin Descripción', 'sobre mensualidad', 1, 'NA', 1, 1),
(24, 'Crédito educativo Tec', 1, 21, 'Profesional', 'Preparatoria', '70', '70', 0, 'PA', 'NA', 'TOEFL iBT', 'NA', 'El Tec de Monterrey facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'becas.mty@itesm.mx', 'Tels 01 800 BECA TEC +52 (81) 8328-4048', 'http://admision.itesm.mx/apoyos-financieros-y-becas', 'NA', '15%', 'NA', 'Sin Descripción', 'sobre mensualidad', 1, 'NA', 1, 1),
(25, 'Crédito educativo Tec', 1, 21, 'Profesional', 'Preparatoria', '70', '70', 0, 'PA', 'NA', 'TOEFL iBT', 'NA', 'El Tec de Monterrey facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'becas.mty@itesm.mx', 'Tels 01 800 BECA TEC +52 (81) 8328-4048', 'http://admision.itesm.mx/apoyos-financieros-y-becas', 'NA', '10%', 'NA', 'Sin Descripción', 'sobre mensualidad', 1, 'NA', 1, 1),
(26, 'Federal student AID Plus', 1, 21, 'Profesional', 'Preparatoria', '70', '70', 0, 'PA', 'NA', 'TOEFL iBT', 'NA', 'El Tec de Monterrey facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'jordi.kipper@itesm.mx', 'No hay teléfono', 'http://admision.itesm.mx/sites/all/themes/admision/documents/proceso-stafford.pdf', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(27, 'Beca de Liderazgo', 1, 22, 'Profesional', 'Preparatoria', '80', '80', 1, 'Examen de admisión', 'NA', 'TOEFL iBT', 'NA', 'La beca puede ser del 10 a 30%', 'No existen requisitos especiales', 'No hay correo', '01 800 444 4020?', 'http://tecmilenio.mx/sites/all/themes/tecmilenio/reglamentos/reglamento_becas.pdf', '30%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(28, 'Beca Mérito Académico', 1, 22, 'Profesional', 'Preparatoria', '90', '85', 1, 'Examen de admisión', 'NA', 'TOEFL iBT', 'NA', 'El Tec Milenio facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'No hay correo', '01 800 444 4020?', 'http://tecmilenio.mx/sites/all/themes/tecmilenio/reglamentos/reglamento_becas.pdf', '40%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(29, 'Beca Mérito Académico', 1, 22, 'Profesional', 'Preparatoria', '95', '90', 1, 'Examen de admisión', 'NA', 'TOEFL iBT', 'NA', 'El Tec Milenio facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'No hay correo', '01 800 444 4020?', 'http://tecmilenio.mx/sites/all/themes/tecmilenio/reglamentos/reglamento_becas.pdf', '50%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(30, 'Crédito educativo Tec', 2, 22, 'Profesional', 'Preparatoria', '70', '70', 1, 'Examen de admisión', 'NA', 'TOEFL iBT', 'NA', 'El Tec Milenio facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'No hay correo', '01 800 444 4020?', 'http://tecmilenio.mx/apoyos-financieros/credito-educativo/caracteristicas', 'NA', '40%', '8.5%', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(31, 'Beca UDEM', 1, 26, 'Profesional', 'Preparatoria', '85', '85', 1, 'PAA', '1100', 'TOEFL iBT', 'NA', 'La UDEM facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'admisiones@udem.edu.mx???', 'Teléfono (81) 8215-1020  Lada sin costo: 01 800 849 4757  ext. 1020', 'http://www.udem.edu.mx/Esp/Carreras/Pages/Beca-UDEM.aspx', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(32, 'Beca UDEM', 1, 26, 'Posgrado', 'Profesional', '85', '85', 1, 'PAA', '1100', 'TOEFL iBT', 'NA', 'La UDEM facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'admisiones@udem.edu.mx???', 'Tel. (81) 8215-1000 ext. 1010 Línea sin costo 01 800-801-UDEM ext. 1010', 'http://www.udem.edu.mx/Esp/Posgrados/Pages/Candidatos-Beca.aspx', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(33, 'Beca excelencia UDEM', 1, 26, 'Posgrado', 'Profesional', '90', '90', 0, 'PAA', '1100', 'TOEFL iBT', 'NA', 'La UDEM facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'admisiones@udem.edu.mx???', 'Tel. (81) 8215-1000 ext. 1010 Línea sin costo 01 800-801-UDEM ext. 1010', 'http://www.udem.edu.mx/Esp/Posgrados/Pages/Candidatos-Beca.aspx', '90%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(34, 'Beca ExaUDEM', 1, 26, 'Posgrado', 'Profesional', '70', '70', 0, 'PAA', '1100', 'TOEFL iBT', 'NA', 'La UDEM facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'admisiones@udem.edu.mx???', 'Tel. (81) 8215-1000 ext. 1010 Línea sin costo 01 800-801-UDEM ext. 1010', 'http://www.udem.edu.mx/Esp/Posgrados/Pages/Candidatos-Beca.aspx', '20%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(35, 'Beca ExaUDEM', 1, 26, 'Posgrado', 'Profesional', '90', '70', 0, 'PAA', '1200', 'TOEFL iBT', 'NA', 'La UDEM facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'admisiones@udem.edu.mx???', 'Tel. (81) 8215-1000 ext. 1010 Línea sin costo 01 800-801-UDEM ext. 1010', 'http://www.udem.edu.mx/Esp/Posgrados/Pages/Candidatos-Beca.aspx', '30%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(36, 'Becas de Especialidades Médicas', 1, 26, 'Posgrado', 'Profesional', 'NA', 'NA', 0, 'PAA', 'NA', 'TOEFL iBT', 'NA', 'La UDEM facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'admisiones@udem.edu.mx???', 'Tel. (81) 8215-1000 ext. 1010 Línea sin costo 01 800-801-UDEM ext. 1010', 'http://www.udem.edu.mx/Esp/Posgrados/Pages/Candidatos-Beca.aspx', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(37, 'Beca talento formativo', 1, 26, 'Profesional', 'Preparatoria', '80', '80', 0, 'PAA', '1000', 'TOEFL iBT', 'NA', 'Futbol soccer/futbol rápido/básquetbol/voleibol de sala/voleibol de playa/atletismo/natación/tenis/tiro con arco/tae kwon do.', 'No existen requisitos especiales', 'becasdeportivas@udem.edu.mx', '8215 1334', 'http://www.udem.edu.mx/Esp/Admisiones/Documents/becas/Becas_Deportivas_WEB_carreras.pdf', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(38, 'Beca Excelencia UDEM Foráneos', 1, 26, 'Profesional', 'Preparatoria', '95', '95', 0, 'PAA', '1200', 'TOEFL iBT', 'NA', 'La UDEM facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'admisiones@udem.edu.mx???', 'Tel. (01 81) 8215 1010  línea sin costo 01 800 801 UDEM ext. 1010', 'http://www.udem.edu.mx/Esp/Carreras/Pages/becas/convocatoria-beca-exelencia-foraneos.aspx', '90%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(39, 'Beca al talento creativo', 1, 26, 'Profesional', 'Preparatoria', '90', '90', 0, 'PAA', '1200', 'TOEFL iBT', 'NA', 'Arte/Arquitectura/Diseño Textil y Moda/Diseño Gráfico/Diseño de Interiores/Diseño Industrial e Ingeniero en Innovación Sustentable y Energía', 'No existen requisitos especiales', 'No hay correo', 'No hay teléfono', 'http://www.udem.edu.mx/Esp/Carreras/Pages/becas/beca-talento-creativo.aspx', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(40, 'Beca formar para transformar', 1, 26, 'Profesional', 'Preparatoria', '85', '85', 0, 'PAA', 'NA', 'TOEFL iBT', 'NA', 'La UDEM facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'xochitl.berlanga@udem.edu.mx', 'Tel: (81) 8215 1325', 'http://www.udem.edu.mx/Esp/Carreras/Pages/becas/beca-formar-para-transformar.aspx', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(41, 'Beca formar para transformar', 1, 26, 'Profesional', 'Preparatoria', '80', '85', 0, 'PAA', 'NA', 'TOEFL iBT', 'NA', 'La UDEM facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'xochitl.berlanga@udem.edu.mx', 'Tel: (81) 8215 1325', 'http://www.udem.edu.mx/Esp/Carreras/Pages/becas/beca-formar-para-transformar.aspx', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(42, 'Beca escuela Fundadora', 1, 26, 'Profesional', 'Preparatoria', '80', '70', 0, 'PAA', '1100', 'TOEFL iBT', 'NA', 'Las becas fundadoras se otorgan a los primeros candidatos que concluyen su proceso de admisión', 'Las becas fundadoras se otorgan a los primeros candidatos que concluyen su proceso de admisión', 'http://www.udem.edu.mx/Esp/Admisiones/Pages/Directorio-de-contactos-carrera.aspx', 'No hay teléfono', 'http://www.udem.edu.mx/Esp/Carreras/Pages/becas/otros-apoyos-financieros.aspx', '20%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(43, 'Bachillerato Internacional', 1, 26, 'Profesional', 'Preparatoria', '80', '80', 0, 'PAA', '1300', 'TOEFL iBT', 'NA', 'Puntaje BI 24-29', 'No existen requisitos especiales', 'http://www.udem.edu.mx/Esp/Admisiones/Pages/Directorio-de-contactos-carrera.aspx', 'No hay teléfono', 'http://www.udem.edu.mx/Esp/Carreras/Pages/becas/otros-apoyos-financieros.aspx', '20%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(44, 'Bachillerato Internacional', 1, 26, 'Profesional', 'Preparatoria', '80', '80', 0, 'PAA', '1300', 'TOEFL iBT', 'NA', 'Puntaje BI 30-40', 'No existen requisitos especiales', 'http://www.udem.edu.mx/Esp/Admisiones/Pages/Directorio-de-contactos-carrera.aspx', 'No hay teléfono', 'http://www.udem.edu.mx/Esp/Carreras/Pages/becas/otros-apoyos-financieros.aspx', '30%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(45, 'Bachillerato Internacional', 1, 26, 'Profesional', 'Preparatoria', '80', '80', 0, 'PAA', '1300', 'TOEFL iBT', 'NA', 'Puntaje BI 41-44', 'No existen requisitos especiales', 'http://www.udem.edu.mx/Esp/Admisiones/Pages/Directorio-de-contactos-carrera.aspx', 'No hay teléfono', 'http://www.udem.edu.mx/Esp/Carreras/Pages/becas/otros-apoyos-financieros.aspx', '40%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(46, 'Bachillerato Internacional', 1, 26, 'Profesional', 'Preparatoria', '80', '80', 0, 'PAA', '1300', 'TOEFL iBT', 'NA', 'Puntaje BI 41-44', 'No existen requisitos especiales', 'http://www.udem.edu.mx/Esp/Admisiones/Pages/Directorio-de-contactos-carrera.aspx', 'No hay teléfono', 'http://www.udem.edu.mx/Esp/Carreras/Pages/becas/otros-apoyos-financieros.aspx', '50%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(47, 'Bachillerato Internacional', 1, 26, 'Profesional', 'Preparatoria', '80', '80', 0, 'PAA', '1300', 'TOEFL iBT', 'NA', 'Puntaje BI 45 o más', 'No existen requisitos especiales', 'http://www.udem.edu.mx/Esp/Admisiones/Pages/Directorio-de-contactos-carrera.aspx', 'No hay teléfono', 'http://www.udem.edu.mx/Esp/Carreras/Pages/becas/otros-apoyos-financieros.aspx', '90%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(48, 'Beca Financiera Santander', 2, 26, 'Profesional', 'Preparatoria', '70', '70', 0, 'PAA', 'NA', 'TOEFL iBT', 'NA', 'La UDEM facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'evelyn.garza@udem.edu.mx', 'No hay teléfono', 'http://www.udem.edu.mx/Esp/Carreras/Pages/becas/otros-apoyos-financieros.aspx', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(49, 'Financiamiento Laudex', 2, 26, 'Profesional', 'Preparatoria', '70', '70', 0, 'PAA', 'NA', 'TOEFL iBT', 'NA', 'La UDEM facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'aayala@laudex.mx', '01-800-120-0140', 'http://www.udem.edu.mx/Esp/Carreras/Pages/becas/otros-apoyos-financieros.aspx', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(50, 'William D. Ford Federal Direct', 2, 26, 'Profesional', 'Preparatoria', '85', '85', 0, 'PAA', 'NA', 'TOEFL iBT', 'NA', 'La UDEM facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'admisiones@udem.edu.mx???', '1-800-433-3243 o 319-337-5665', 'http://www.udem.edu.mx/Esp/Carreras/Pages/becas/otros-apoyos-financieros.aspx', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(51, 'Smart Option Student Loan', 2, 26, 'Profesional', 'Preparatoria', '80', '80', 0, 'PAA', 'NA', 'TOEFL iBT', 'NA', 'La UDEM facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos directamente sobre estas oportunidades.', 'No existen requisitos especiales', 'admisiones@udem.edu.mx???', '01-888-2SALLIE', 'http://www.udem.edu.mx/Esp/Carreras/Pages/becas/otros-apoyos-financieros.aspx', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(52, 'Beca de excelencia', 1, 27, 'Profesional', 'Preparatoria', '90', '90', 1, 'PAA', '1250', 'TOEFL iBT', 'NA', 'La beca puede ser del 60 al 80%', 'No existen requisitos especiales', 'informes@u-erre.mx', '8220.471', 'http://www.u-erre.mx/informacion/becas/beca-excelencia', '80%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(53, 'Beca de excelencia', 1, 27, 'Posgrado', 'Profesional', '90', '90', 1, 'PAA', '1250', 'TOEFL iBT', 'NA', 'La beca puede ser del 50 al 70%', 'No existen requisitos especiales', 'informes@u-erre.mx', '8220.471', 'http://www.u-erre.mx/informacion/becas/beca-excelencia', '70%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(54, 'Crédito ducativos Santander', 2, 27, 'Profesional', 'Preparatoria', '70', 'NA', 1, 'PAA', '1000', 'TOEFL iBT', 'NA', 'Financiamiento del 50 al 100%', 'No existen requisitos especiales', 'informes@u-erre.mx', '8220.471', 'http://www.u-erre.mx/informacion/becas/creditos', 'NA', '100%', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(55, 'Beca de académica', 1, 27, 'Profesional', 'Preparatoria', '90', '90', 1, 'PAA', '1250', 'TOEFL iBT', 'NA', 'Beca académica que va desde el 55-80%.', 'No existen requisitos especiales', 'informes@u-erre.mx', '8220.471', 'http://www.u-erre.mx/informacion/becas/beca-academica', '80%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(56, 'Beca Financiera ', 2, 27, 'Profesional', 'Preparatoria', '70', '70', 1, 'PAA', '1000', 'TOEFL iBT', 'NA', 'La U-ERRE facilita a los alumnos con acceso a Becas y Financiamiento si deseas conocer más contactanos', 'No existen requisitos especiales', 'informes@u-erre.mx', '8220.471', 'http://www.u-erre.mx/perch/resources/sol.-ayuda-financiera-ago-2015-a-2.pdf', 'NA', '45%', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(57, 'Beca deportiva', 1, 27, 'Profesional', 'Preparatoria', '85', '85', 1, 'PAA', 'NA', 'TOEFL iBT', 'NA', 'Habilidad deportiva', 'No existen requisitos especiales', 'informes@u-erre.mx', '8220.471', 'http://www.u-erre.mx/informacion/becas/deportiva', '90%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(58, 'Beca cultural', 1, 27, 'Profesional', 'Preparatoria', '85', '85', 1, 'PAA', 'NA', 'TOEFL iBT', 'NA', 'Habilidad cultural', 'No existen requisitos especiales', 'informes@u-erre.mx', '8220.471', 'http://www.u-erre.mx/informacion/becas/beca-cultural', '90%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(59, 'Beca servicio becario', 1, 28, 'Profesional', 'Preparatoria', '80', '80', 1, 'NA', 'NA', 'No hay', 'NA', 'Beca para Servicio Becario.', 'No existen requisitos especiales', 'No hay correo', 'Tel.: 83-438009 informes (81) 123-30680 conmutador', 'http://www.uane.edu.mx/web/beca_servicio.html', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(60, 'Beca 33% 33% 33%', 1, 28, 'Profesional', 'Preparatoria', '80', '80', 1, 'NA', 'NA', 'No hay', 'NA', 'Convenio con empresas o instituciones que deberán inscribir a un mínimo de cinco alumnos. UNAE otorga un 33% de beca la empresa se compromete a cubrir otro 33% y el 33% restante será cubierto por el alumno becado.', 'No existen requisitos especiales', 'No hay correo', 'Tel.: 83-438009 informes (81) 123-30680 conmutador', 'http://www.uane.edu.mx/web/beca_33.html', '33%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(61, 'Beca de excelencia', 1, 28, 'Profesional', 'Preparatoria', '95', '95', 1, 'NA', 'NA', 'No hay', 'NA', 'Se otorga a los mejores alumnos que mantengan un promedio superior a 95%', 'No existen requisitos especiales', 'No hay correo', 'Tel.: 83-438009 informes (81) 123-30680 conmutador', 'http://www.uane.edu.mx/web/beca_excelencia.html', '50%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(62, 'Beca al mérito académico', 1, 28, 'Profesional', 'Preparatoria', '95', '95', 1, 'NA', 'NA', 'No hay', 'NA', 'Se otorga al mejor alumno de cada carrera y de cada generación durante los últimos 4 semestres de su plan de estudios.', 'Se otorga al mejor alumno de cada carrera y de cada generación durante los últimos 4 semestres de su plan de estudios.', 'No hay correo', 'Tel.: 83-438009 informes (81) 123-30680 conmutador', 'http://www.uane.edu.mx/web/becas_merito_academico.html', '75%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(63, 'Beca académica', 1, 4, 'Profesional', 'Preparatoria', '80', '80', 1, 'NA', 'NA', 'No hay', 'NA', 'Beca académica del CEU porcentaje por definir.', 'No existen requisitos especiales', 'No hay correo', 'Tel: (81) 8262-7200 811-016-2704', 'http://ceu.edu.mx/becas/', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(64, 'Beca deportiva', 1, 4, 'Profesional', 'Preparatoria', '80', '80', 1, 'NA', 'NA', 'No hay', 'NA', 'Beca académica del CEU porcentaje por definir.', 'No existen requisitos especiales', 'No hay correo', 'Tel: (81) 8262-7200 811-016-2704', 'http://ceu.edu.mx/becas/', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(65, 'Beca cultural', 1, 4, 'Profesional', 'Preparatoria', '80', '80', 1, 'NA', 'NA', 'No hay', 'NA', 'Beca académica del CEU porcentaje por definir.', 'No existen requisitos especiales', 'No hay correo', 'Tel: (81) 8262-7200 811-016-2704', 'http://ceu.edu.mx/becas/', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(66, 'Beca por convenio', 1, 4, 'Profesional', 'Preparatoria', '80', '80', 1, 'NA', 'NA', 'No hay', 'NA', 'Ser empleado o familiar directo de la empresa u organización con la cual la institución haya celebrado convenio de beca o beneficio por pronto pago', 'Ser empleado o familiar directo de la empresa u organización con la cual la institución haya celebrado convenio de beca o beneficio por pronto pago', 'No hay correo', 'Tel: (81) 8262-7200 811-016-2704', 'http://ceu.edu.mx/becas/', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(67, 'Exalumnos de preparatoria', 1, 17, 'Profesional', 'Preparatoria', '85', '85', 1, 'NA', 'NA', 'No hay', 'NA', 'Sin descripción', 'No existen requisitos especiales', 'No hay correo', 'No hay teléfono', 'http://www.isac-portal.com/futuros-alumnos/becas', '20%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(68, 'Beca de excelencia acedémica', 1, 13, 'Profesional', 'Preparatoria', '95', '95', 1, 'NA', 'NA', 'No hay', 'NA', 'Sin descripción', 'No existen requisitos especiales', 'laura.garza@fldm.edu.mx', 'teléfono: 8048.2500 ext. 310', 'http://fldm.edu.mx/admisiones/ayuda-financiera/beca-de-excelencia-academica-be/', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(69, 'Desempeño sobresaliente', 1, 13, 'Profesional', 'Preparatoria', '90', '90', 1, 'NA', 'NA', 'No hay', 'NA', 'Sin descripción', 'No existen requisitos especiales', 'laura.garza@fldm.edu.mx', 'teléfono: 8048.2500 ext. 310', 'http://fldm.edu.mx/admisiones/ayuda-financiera/beca-por-desempeno-academico-sobresaliente-das/', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(70, 'Beca préstamo DANEP', 1, 13, 'Profesional', 'Preparatoria', '85', '85', 1, 'NA', 'NA', 'No hay', 'NA', 'Beca préstamo por desempeño académico y necesidad económica (DANEP)', 'No existen requisitos especiales', 'laura.garza@fldm.edu.mx', 'teléfono: 8048.2500 ext. 310', 'http://fldm.edu.mx/admisiones/ayuda-financiera/beca-prestamo-por-desempeno-academico-y-necesidad-economica-danep/', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(71, 'Beca de excelencia', 1, 29, 'Profesional', 'Preparatoria', '95', '95', 1, 'NA', 'NA', 'No hay', 'NA', 'Sin descripción', 'No existen requisitos especiales', 'No hay correo', 'No hay teléfono', 'http://www.unez.mx/', '100%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(72, 'Beca académica 75%', 1, 29, 'Profesional', 'Preparatoria', '90', '90', 1, 'NA', 'NA', 'No hay', 'NA', 'Sin descripción', 'No existen requisitos especiales', 'No hay correo', 'No hay teléfono', 'http://www.unez.mx/', '75%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(73, 'Beca académica 50%', 1, 29, 'Profesional', 'Preparatoria', '85', '85', 1, 'NA', 'NA', 'No hay', 'NA', 'Sin descripción', 'No existen requisitos especiales', 'No hay correo', 'No hay teléfono', 'http://www.unez.mx/', '50%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(74, 'Beca académica', 1, 36, 'Profesional', 'Preparatoria', '85', '85', 1, 'NA', 'NA', 'No hay', 'NA', 'Sin descripción', 'No existen requisitos especiales', 'No hay correo', 'No hay teléfono', 'http://www.utsc.edu.mx/04-aspirante/becas.html', 'NA', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(75, 'Beca referenciadas', 1, 36, 'Profesional', 'Preparatoria', '85', '85', 1, 'NA', 'NA', 'No hay', 'NA', 'Beneficio otorgado como parte del Programa de Desarrollo Social para los jóvenes referenciados de IEMS (Instituciones de Educación Media Superior) Municipio o Empresas para apoyar su Educación Superior', 'No existen requisitos especiales', 'No hay correo', 'No hay teléfono', 'http://www.utsc.edu.mx/04-aspirante/becas.html', '50%', 'NA', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(76, 'HSBC', 2, 38, 'Profesional', 'Preparatoria', '70', '70', 0, 'NA', 'NA', 'No hay', 'NA', 'Financiamiento del 10 al 80%', 'No existen requisitos especiales', 'No hay correo', 'No hay teléfono', 'http://www.up.edu.mx/es/usuarios/mex/becas-y-financiamientos', 'NA', '80%', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(77, 'Santander', 3, 37, 'Profesional', 'Preparatoria', '70', '70', 0, 'NA', 'NA', 'No hay', 'NA', 'Financiamiento del 10 al 80%', 'No existen requisitos especiales', 'No hay correo', 'No hay teléfono', 'http://www.up.edu.mx/es/usuarios/mex/becas-y-financiamientos', 'NA', 'NA', 'NA', 'Financiamiento de $230 850 MXP', 'sobre colegiatura', 1, 'NA', 1, 0),
(78, 'HSBC/Nacional Financiera', 3, 37, 'Profesional', 'Preparatoria', '75', '75', 0, 'NA', 'NA', 'No hay', 'NA', 'Financiamiento del 10 al 80%', 'No existen requisitos especiales', 'No hay correo', 'No hay teléfono', 'http://www.up.edu.mx/es/usuarios/mex/becas-y-financiamientos', 'NA', 'NA', 'NA', 'Financiamiento de $230 000 MXP', 'sobre colegiatura', 1, 'NA', 1, 0),
(79, 'Santander/Laudex', 3, 37, 'Profesional', 'Preparatoria', '70', '70', 0, 'NA', 'NA', 'No hay', 'NA', 'Financiamiento del 10 al 80%', 'No existen requisitos especiales', 'No hay correo', 'No hay teléfono', 'http://www.up.edu.mx/es/usuarios/mex/becas-y-financiamientos', 'NA', 'NA', 'NA', 'Financiamiento de $950 000 MXP', 'sobre colegiatura', 1, 'NA', 1, 0),
(80, 'Ennti', 2, 37, 'Profesional', 'Preparatoria', '70', '70', 0, 'NA', 'NA', 'No hay', 'NA', 'Financiamiento del 10 al 80%', 'No existen requisitos especiales', 'No hay correo', 'No hay teléfono', 'http://www.up.edu.mx/es/usuarios/mex/becas-y-financiamientos', 'NA', '55%', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(81, 'Institucional', 3, 18, 'Profesional', 'Preparatoria', '70', '70', 1, 'NA', 'NA', 'No hay', 'NA', '$750.00 (promedio 6-7.99) mensual', 'Provenir de un hogar cuyo ingreso mensual per cápita sea menor o igual a los cuatro deciles de la distribución del ingreso mensuales.', 'No hay correo', 'Tel. 57296000 Ext. 51844', 'http://www.sibec.ipn.mx/avisos/cartel/REQUISITOS.pdf', 'NA', 'NA', 'NA', 'Beca Socioeconómica', 'sobre gastos escolares', 1, 'NA', 1, 0),
(82, 'Institucional', 3, 18, 'Profesional', 'Preparatoria', '80', '80', 1, 'NA', 'NA', 'No hay', 'NA', '$830.00 (promedio 8-9.49) mensual', 'Provenir de un hogar cuyo ingreso mensual per cápita sea menor o igual a los cuatro deciles de la distribución del ingreso mensuales.', 'No hay correo', 'Tel. 57296000 Ext. 51844', 'http://www.sibec.ipn.mx/avisos/cartel/REQUISITOS.pdf', 'NA', 'NA', 'NA', 'Beca Socioeconómica', 'sobre gastos escolares', 1, 'NA', 1, 0),
(83, 'Institucional', 3, 18, 'Profesional', 'Preparatoria', '95', '95', 1, 'NA', 'NA', 'No hay', 'NA', '$920.00 (promedio 9.5-10) mensual', 'Provenir de un hogar cuyo ingreso mensual per cápita sea menor o igual a los cuatro deciles de la distribución del ingreso mensuales.', 'No hay correo', 'Tel. 57296000 Ext. 51844', 'http://www.sibec.ipn.mx/avisos/cartel/REQUISITOS.pdf', 'NA', 'NA', 'NA', 'Beca Socioeconómica', 'sobre gastos escolares', 1, 'NA', 1, 0),
(84, 'Institucional Polivirtual', 3, 18, 'Profesional', 'Preparatoria', '70', '70', 1, 'NA', 'NA', 'No hay', 'NA', '$750.00 (promedio 6-7.99) mensual', 'Provenir de un hogar cuyo ingreso mensual per cápita sea menor o igual a los cuatro deciles de la distribución del ingreso mensuales.', 'No hay correo', 'Tel. 57296000 Ext. 51844', 'http://www.sibec.ipn.mx/avisos/cartel/REQUISITOS.pdf', 'NA', 'NA', 'NA', 'Beca Socioeconómica', 'sobre gastos escolares', 1, 'NA', 1, 0),
(85, 'Institucional Polivirtual', 3, 18, 'Profesional', 'Preparatoria', '80', '80', 1, 'NA', 'NA', 'No hay', 'NA', '$830.00 (promedio 8-9.49) mensual', 'Provenir de un hogar cuyo ingreso mensual per cápita sea menor o igual a los cuatro deciles de la distribución del ingreso mensuales.', 'No hay correo', 'Tel. 57296000 Ext. 51844', 'http://www.sibec.ipn.mx/avisos/cartel/REQUISITOS.pdf', 'NA', 'NA', 'NA', 'Beca Socioeconómica', 'sobre gastos escolares', 1, 'NA', 1, 0),
(86, 'Institucional Polivirtual', 3, 18, 'Profesional', 'Preparatoria', '95', '95', 1, 'NA', 'NA', 'No hay', 'NA', '$920.00 (promedio 9.5-10) mensual', 'Provenir de un hogar cuyo ingreso mensual per cápita sea menor o igual a los cuatro deciles de la distribución del ingreso mensuales.', 'No hay correo', 'Tel. 57296000 Ext. 51844', 'http://www.sibec.ipn.mx/avisos/cartel/REQUISITOS.pdf', 'NA', 'NA', 'NA', 'Beca Socioeconómica', 'sobre gastos escolares', 1, 'NA', 1, 0),
(87, 'Transporte-IPN ', 3, 18, 'Profesional', 'Preparatoria', '70', '70', 1, 'NA', 'NA', 'No hay', 'NA', '$200.00 (Gasto mensual en transporte hasta $400.00)', 'Provenir de una familia cuyo ingreso mensual per cápita sea igual o menor a cuatro Salarios Mínimos Mensuales Vigentes al momento de la emisión de la convocatoria.', 'No hay correo', 'Tel. 57296000 Ext. 51844', 'http://www.sibec.ipn.mx/avisos/cartel/REQUISITOS.pdf', 'NA', 'NA', 'NA', 'Beca Socioeconómica', 'sobre gastos escolares', 1, 'NA', 1, 0),
(88, 'Transporte-IPN ', 3, 18, 'Profesional', 'Preparatoria', '80', '80', 1, 'NA', 'NA', 'No hay', 'NA', '$450.00 (Gasto mensual en transporte de más de $400.00 y hasta $800.00)', 'No existen requisitos especiales', 'No hay correo', 'Tel. 57296000 Ext. 51844', 'http://www.sibec.ipn.mx/avisos/cartel/REQUISITOS.pdf', 'NA', 'NA', 'NA', 'Beca Socioeconómica', 'sobre gastos escolares', 1, 'NA', 1, 0),
(89, 'Transporte-IPN ', 3, 18, 'Profesional', 'Preparatoria', '95', '95', 1, 'NA', 'NA', 'No hay', 'NA', '$600.00 (Gasto mensual en transporte de más de $800.00)', 'No existen requisitos especiales', 'No hay correo', 'Tel. 57296000 Ext. 51844', 'http://www.sibec.ipn.mx/avisos/cartel/REQUISITOS.pdf', 'NA', 'NA', 'NA', 'Beca Socioeconómica', 'sobre gastos escolares', 1, 'NA', 1, 0),
(90, 'IPN-Fundación Politécnico', 3, 18, 'Profesional', 'Preparatoria', '95', '95', 1, 'NA', 'NA', 'No hay', 'NA', ' $2 000.00 mensual', 'No existen requisitos especiales', 'No hay correo', 'Tel. 57296000 Ext. 51844', 'http://www.sibec.ipn.mx/avisos/cartel/REQUISITOS.pdf', 'NA', 'NA', 'NA', 'Beca IPN-Politécnico', 'sobre gastos escolares', 1, 'NA', 1, 0),
(91, 'IPN-Fundación Politécnico', 3, 18, 'Profesional', 'Preparatoria', '95', '95', 1, 'NA', 'NA', 'No hay', 'NA', ' $1 000.00 mensual', 'No existen requisitos especiales', 'No hay correo', 'Tel. 57296000 Ext. 51844', 'http://www.sibec.ipn.mx/avisos/cartel/REQUISITOS.pdf', 'NA', 'NA', 'NA', 'Beca IPN-Politécnico', 'sobre gastos escolares', 1, 'NA', 1, 0),
(92, 'IPN-Fundación Politécnico', 3, 18, 'Profesional', 'Preparatoria', '80', '80', 1, 'NA', 'NA', 'No hay', 'NA', 'El equivalente al salario mínimo general mensual del ejercicio fiscal respectivo.', 'No existen requisitos especiales', 'No hay correo', 'Tel. 57296000 Ext. 51844', 'http://www.sibec.ipn.mx/avisos/cartel/REQUISITOS.pdf', 'NA', 'NA', 'NA', 'Beca IPN-Politécnico', 'sobre gastos escolares', 1, 'NA', 1, 0),
(93, 'Beca PROBEMEX', 3, 30, 'Profesional', 'Preparatoria', '85', '85', 1, 'NA', 'NA', 'No hay', 'NA', '1er.Año $750.00 / 2do.Año $830.00 / 3er.Año $920.00 / 4to.Año $1 000.00 / 5to.Año $1 000.00', 'No existen requisitos especiales', 'becasprobemex@hotmail.com', '(01722) 2139063 y 214 55 88', 'http://seduc.edomex.gob.mx/becas_iprobemex', 'NA', 'NA', 'NA', 'Beca PROBOMEX', 'sobre gastos escolares', 1, 'NA', 1, 0),
(94, 'Beca PROBEMEX', 3, 18, 'Profesional', 'Preparatoria', '85', '85', 1, 'NA', 'NA', 'No hay', 'NA', '1er.Año $750.00 / 2do.Año $830.00 / 3er.Año $920.00 / 4to.Año $1 000.00 / 5to.Año $1 000.00', 'No existen requisitos especiales', 'becasprobemex@hotmail.com', '(01722) 2139063 y 214 55 88', 'http://seduc.edomex.gob.mx/becas_iprobemex', 'NA', 'NA', 'NA', 'Beca PROBOMEX', 'sobre gastos escolares', 1, 'NA', 1, 0),
(95, 'Beca PROBEMEX', 3, 23, 'Profesional', 'Preparatoria', '85', '85', 1, 'NA', 'NA', 'No hay', 'NA', '1er.Año $750.00 / 2do.Año $830.00 / 3er.Año $920.00 / 4to.Año $1 000.00 / 5to.Año $1 000.00', 'No existen requisitos especiales', 'becasprobemex@hotmail.com', '(01722) 2139063 y 214 55 88', 'http://seduc.edomex.gob.mx/becas_iprobemex', 'NA', 'NA', 'NA', 'Beca PROBOMEX', 'sobre gastos escolares', 1, 'NA', 1, 0),
(96, 'Beca Fulbright', 3, 5, 'Posgrado', 'Profesional', '80', '80', 1, 'Escala de calidad COMEXUS', '55', 'TOEFL iBT', '90', 'Solicitud de admisión hasta en 4 universidades. Hasta $25 000 dólares por año escolar. Seguro de gastos médicos Fulbright (ASPE).  Trámite de la visa J1. Todos los becarios Fulbright viajan con visa J1 (visitante de intercambio). Cursos pre-académicos y de enriquecimiento en Estados Unidos.', 'No existen requisitos especiales', 'becas@comexus.org.mx ', 'Tel. (+52-55) 5566-91-53/5592-30-83', 'http://www.comexus.org.mx/posgrado_eua.html', 'NA', 'NA', 'NA', 'Beca Fullbright', 'sobre gastos escolares', 1, 'NA', 1, 1),
(97, 'Beca Magdalena O. Vda.', 2, 24, 'Posgrado', 'Profesional', '85', '85', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Tener un nivel de inglés funcional con una calificación mínima de 90 en el examen TOEFL iBT ó 7 en el IELTS. Experiencia laboral para obtener el mayor beneficio de una maestría con un mínimo de dos años de tiempo completo después de haber terminado la carrera hasta la fecha de la solicitud.', 'No existen requisitos especiales', 'becasmob@becasmob.org.mx', 'Tel/fax: (33)36322872', 'http://www.becasmob.org.mx/convocatoria', 'NA', '100%', 'NA', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 1),
(98, 'Financiamiento FIDERH', 2, 2, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'No hay', '90', 'El financiamiento se cubre en pesos mexicanos en 40 pagos trimestrales (10 años). La tasa de interés es del 0.75 del Costo Porcentual Promedio (CPP) que publica el Banco de México mensualmente. ', 'No existen requisitos especiales', 'gguadarrama@banxico.org.mx', 'Teléfono 53 45 4794', 'http://www.fiderh.org.mx/financiamiento.html', 'NA', '100%', '0.75%', 'Sin Descripción', 'sobre colegiatura', 1, 'NA', 1, 0),
(99, 'Genral MBA', 1, 39, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 11 400.00( euros ) total a pagar 10 260.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jaguayo@zsem.hr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=612&ver=1', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(100, 'MBA in Management', 1, 39, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 10 400.00( euros ) total a pagar 9 360.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jaguayo@zsem.hr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=613', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(101, 'MBA in Marketing', 1, 39, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 10 400.00( euros ) total a pagar 9 360.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jaguayo@zsem.hr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=614', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(102, 'MBA/Information Systems', 1, 39, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 10 400.00( euros ) total a pagar 9 360.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jaguayo@zsem.hr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=615', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(103, 'MBA in Finance and Acounting', 1, 39, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 10 400.00( euros ) total a pagar 9 360.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jaguayo@zsem.hr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=616', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(104, 'MBA in Finance and Banking', 1, 39, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 10 400.00( euros ) total a pagar 9 360.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jaguayo@zsem.hr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=617', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(105, 'MBA in Quantitative Finance', 1, 39, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 10 400.00( euros ) total a pagar 9 360.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jaguayo@zsem.hr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=619', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(106, 'MBA/Human Resources', 1, 39, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 10 400.00( euros ) total a pagar 9 360.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jaguayo@zsem.hr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=620', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(107, 'MBA/Supply Chain', 1, 39, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 10 400.00( euros ) total a pagar 9 360.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jaguayo@zsem.hr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=621', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(108, 'MA in International Business', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 10 400.00( euros ) total a pagar 9 360.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=26', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(109, 'MSc. in Accounting', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=28', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(110, 'MSc. Business Negotiation', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=30', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1);
INSERT INTO `becas` (`ID_Beca`, `Nombre_Beca`, `ID_Tipo`, `ID_Escuela`, `Nivel_Estudio`, `Estatus_Alumno`, `Promedio_Acceso`, `Promedio_Mantener`, `Estudio_Socioeco`, `Examen_Admision`, `Puntaje`, `Examen_Idiomas`, `Puntuaje_Idiomas`, `Descripcion_Beca`, `Requisitos_Espe`, `Contacto`, `Telefono`, `Link_Beca`, `Porcentaje_Beca`, `Porcentaje_Credito`, `Tasa_Interes`, `Nom_Descriptivo`, `Beca_Sobre`, `Requiere_Promedio`, `Ingresos_Comprobar`, `Requiere_Examen`, `Requiere_Idiomas`) VALUES
(111, 'MSc. International Finance', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=33', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(112, 'MSc. in Human Resources', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=35', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(113, 'MSc. International Marketing', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=36', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(114, 'MSc. Sports Leisure & Tourism', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=39', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(115, 'MSc. In Global Business', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=183', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(116, 'Msc. Intl. Luxury and Brand', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=405', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(117, 'Msc. Communication/Digital Mkt', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=406', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(118, 'MSc. Logistics & Supply Chain', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=407', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(119, 'MSc. EcoDesign and Sustainable', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión y Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=408', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(120, 'MBA/Responsible Management', 1, 1, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 30 500.00( euros ) total a pagar 14 760.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'international@audencia.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=587&ver=1', '20%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(121, 'International Master Mgmt.', 1, 1, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 400.00( euros ) total a pagar 14 760.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP. Seguro de gastos médicos.', 'No existen requisitos especiales', 'international@audencia.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=588&ver=1', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(122, 'International Master Mgmt.', 1, 1, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 19 400.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'international@audencia.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=589&ver=1', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(123, 'Master Business Management', 1, 1, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 600.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'international@audencia.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=590&ver=1', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(124, 'M.Sc. in Supply Chain', 1, 1, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 15 000.00( euros ) total a pagar 13 500.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'international@audencia.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=591&ver=1', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(125, 'M.Sc. in Supply Chain', 1, 1, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 19 500.00( euros ) total a pagar 17 550.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'international@audencia.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=592&ver=1', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(126, 'M.Sc. Food&Agribusiness ', 1, 1, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 500.00( euros )  total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'international@audencia.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=593&ver=1', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(127, 'Specialized MBA', 1, 25, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 23 300.00( euros ) total a pagar 19 805.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP.', 'No existen requisitos especiales', 'lerouxmi@esc-larochelle.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=687&ver=1', '15%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(128, 'Master in Management', 1, 25, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 11 100.00( euros ) total a pagar 9 435.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP.', 'No existen requisitos especiales', 'lerouxmi@esc-larochelle.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=688', '15%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(129, 'Global MBA', 1, 25, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 23 300.00( euros ) total a pagar 19 805.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP.', 'No existen requisitos especiales', 'lerouxmi@esc-larochelle.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=689', '15%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(130, 'MBA Tourism and Services Mgmt.', 1, 25, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 23 300.00( euros ) total a pagar 19 805.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP.', 'No existen requisitos especiales', 'lerouxmi@esc-larochelle.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=690&ver=1', '15%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(131, 'MSc. International Mgmt/Mkt', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP.', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=752', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(132, 'MSc. Intl. Mgmt/Digital Mkt', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP.', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=753', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(133, 'MSc. Intl. Mgmt/Finance', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP.', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=754', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(134, 'MSc. Intl. Mgmt./HR', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP.', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=755', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(135, 'MSc. Intl. Mgmt./Supply Chain', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP.', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=757', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(136, 'MSc. Intl. Innovation Mgmt.', 1, 7, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 16 000.00( euros ) total a pagar 14 400.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP.', 'No existen requisitos especiales', 'caroline.jouanin@esc-rennes.fr', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=758&ver=1', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(137, 'MBA Intl. Business Consulting', 1, 31, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 11 222.00( euros ) total a pagar 7 294.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'Requiere un grado intermedio del idioma Alemán.', 'svenja.wittpoth@hs-offenburg.de', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=227', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(138, 'MBA', 1, 14, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 22 000.00( euros ) total a pagar 16 500.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'Requiere un grado intermedio del idioma Alemán.', 'jagon@globaluniversitysystems.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=568', '25%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(139, 'Maestría Antropología y Ética', 1, 3, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 194 000.00( pesos ) total a pagar 145 500.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'antonio.benitez@cph.edu.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=2', '25%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(140, 'Maestría Estudios Humanísticos', 1, 3, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 194 000.00( pesos ) total a pagar 145 500.00( pesos )Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'antonio.benitez@cph.edu.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=4', '25%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(141, 'Maestría Antropología y Ética', 1, 3, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 194 000.00( pesos ) total a pagar 145 500.00( pesos )', 'No existen requisitos especiales', 'antonio.benitez@cph.edu.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=4', '25%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(142, 'Maestría en Alta Dirección MBA', 1, 33, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 339 120.00( pesos ) total a pagar 220 428.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jdominguez@anahuacqro.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=157', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(143, 'Maestría Derecho Corporativo', 1, 33, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 214 200.00( pesos ) total a pagar 139 230.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jdominguez@anahuacqro.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=160', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(144, 'Maestría en Finanzas', 1, 33, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 188 400.00( pesos ) total a pagar 122 460.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jdominguez@anahuacqro.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=161', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(145, 'Maestría en Psicopedagogía', 1, 33, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 171 984.00( pesos ) total a pagar 111 789.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jdominguez@anahuacqro.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=163', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(146, 'Maestría Admin. Pública', 1, 33, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 234 240.00( pesos ) total a pagar 152 256.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jdominguez@anahuacqro.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=224', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(147, 'Sc.D. Desarrollo Sustentable', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 206 320.00( pesos ) total a pagar 185 688.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=351', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(148, 'Maestría en Alta Dirección', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 216 570.00( pesos ) total a pagar 194 913.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=352', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(149, 'Maestría en Finanzas', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 188 550.00( pesos ) total a pagar 169 695.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=353', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(150, 'Maestría en MKT Integral', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 216 570.00( pesos ) total a pagar 194 913.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=354&ver=3', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(151, 'Maestría Empresas Turísticas', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 168 250.00( pesos ) total a pagar 151 425.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=355', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(152, 'Maestría en Bioética', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 77 635.00( pesos ) total a pagar 69 871.50( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=356', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(153, 'Sc.D Ciencias de la Educación', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 181 430.00( pesos ) total a pagar 163 287.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=358', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(154, 'Maestría Ciencias de la Edu.', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 111 630.00( pesos ) total a pagar 100 467.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=359', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(155, 'Maestría en Filosofía', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 84 100.00( pesos ) total a pagar 75 690.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=360', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(156, 'Maestría en Diseño', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 152 660.00( pesos ) total a pagar 137 394.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=361', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(157, 'Doctorado en Derecho', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 188 740.00( pesos ) total a pagar 169 866.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=362', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(158, 'Maestría Derecho Empresarial', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 158 100.00( pesos ) total a pagar 142 290.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=363', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(159, 'Maestría Admin. Pública', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 168 250.00( pesos ) total a pagar 151 425.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=364', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(160, 'Maestría Relaciones Laborales', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 147 950.00( pesos ) total a pagar 133 155.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=365', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(161, 'Maestría Defensa Fiscal', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 158 100.00( pesos ) total a pagar 142 290.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=366', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(162, 'Maestría en Ing. Industrial', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 121 000.00( pesos ) total a pagar 108 900.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=367', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(163, 'Maestría en Gestión de Tec.', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 152 660.00( pesos ) total a pagar 137 394.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=368', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(164, 'Maestría en Terapia Familiar', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 199 890.00( pesos ) total a pagar 179 901.00( pesos ).Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=369', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(165, 'MBA Empresas de Moda&Belleza', 1, 15, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 275 500.00( pesos ) total a pagar 236 930.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'coordinacionmexico@esden.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=453&ver=1', '14%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(166, 'Sc. D Gob. y Gestión Pública', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 208 090.00( pesos ) total a pagar 187 281.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=550', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(167, 'Maestría en Auditoría', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 194 310.00( pesos ) total a pagar 174 879.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=551', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(168, 'Master Responsabilidad Social', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 249 450.00( pesos ) total a pagar 224 505.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=552', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(169, 'Maestría en Ciencias Humanas', 1, 33, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 171 984.00( pesos ) total a pagar 111 789.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jdominguez@anahuacqro.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=576', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(170, 'Maestría en Desarrollo RH', 1, 33, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 301 440.00( pesos ) total a pagar 195 936.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jdominguez@anahuacqro.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=578', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(171, 'Maestría en Ing. Empresarial', 1, 33, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 188 400.00( pesos ) total a pagar 122 460.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jdominguez@anahuacqro.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=579', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(172, 'Maestría en Mercados', 1, 33, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 301 144.00( pesos ) total a pagar 195 743.60( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jdominguez@anahuacqro.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=580', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(173, 'Doctorado en Derecho', 1, 33, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 20 8090.00( pesos ) total a pagar 135 258.50( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'jdominguez@anahuacqro.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=581', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(174, 'Maestría Relaciones Públicas', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 154 110.00( pesos ) total a pagar 138 699.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=582', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(175, 'Maestría en Dirección de Capital Humano', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 188 550.00( pesos ) total a pagar 169 695.00( pesos ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=583', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(176, 'Master en Digital Business', 1, 15, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 175 000.00( pesos ) total a pagar 150 500.00( pesos )', 'No existen requisitos especiales', 'coordinacionmexico@esden.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=686', '14%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(177, 'Tecnologías y Comunicaciones', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 178 000.00( pesos ) total a pagar 160 200.00( pesos )', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=745', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(178, 'Interiorismo Sustentable', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 146 270.00( pesos ) total a pagar 131 643.00( pesos )', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=746', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(179, 'Maestría en Nutrición Clínica', 1, 32, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 146 380.00( pesos ) total a pagar 131 742.00( pesos )', 'No existen requisitos especiales', 'posgrados.merida@anahuac.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=747', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(180, 'LLM Int./European Public Law', 1, 40, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 900.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'studylaw@tilburguniversity.edu', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=29', '15%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(181, 'LLM International Business Law', 1, 40, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 900.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'studylaw@tilburguniversity.edu', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=32', '15%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(182, 'LLM Law and Technology', 1, 40, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 900.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'studylaw@tilburguniversity.edu', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=34', '15%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(183, 'International Business Tax Law', 1, 40, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'studylaw@tilburguniversity.edu', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=482', '15%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(184, 'Victimology & Criminal Justice', 1, 40, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'studylaw@tilburguniversity.edu', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=483', '15%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(185, 'LLM Research Master in Law', 1, 40, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 13 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'studylaw@tilburguniversity.edu', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=492', '15%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(186, 'MBA', 1, 8, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'orodriguez.en@ceu.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=41', '40%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(187, 'Máster en Urbanismo&Territorio', 1, 8, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'orodriguez.en@ceu.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=52', '40%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(188, 'Master in Int. Business Law', 1, 8, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'idiezordas.en@ceu.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=54', '40%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(189, 'Bolsa y Mercados Financieros', 1, 19, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'programas@ieb.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=107', '20%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(190, 'MBA/Finanzas (IEB)', 1, 19, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'coordinacionmba@ieb.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=112', '25%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(191, 'Máster de Arte en Publicidad', 1, 35, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). Seguro de gastos médicos.', 'No existen requisitos especiales', 'nuriaPG@blanquerna.url.edu', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=126', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(192, 'Máster Acción Política', 1, 34, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'postgrado@ufv.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=173', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(193, 'Máster en Humanidades', 1, 34, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. ', 'No existen requisitos especiales', 'postgrado@ufv.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=175', '20%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(194, 'Dirección Centros Educativos', 1, 34, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'postgrado@ufv.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=184', '25%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(195, 'Banca Privada e Inversiones', 1, 34, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'postgrado@ufv.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=186', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(196, 'Periodismo Audiovisual', 1, 34, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'postgrado@ufv.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=190', '25%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(197, 'Producción de Radio y TV', 1, 34, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'postgrado@ufv.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=191', '25%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(198, 'European Business (MEB)', 1, 9, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'amoreno@escpeurope.eu', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=370', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(199, 'MSC en Mkt. y Medios Digitales', 1, 9, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'egarde@escpeurope.eu', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=371', '5%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(200, 'MBA Full Time', 1, 10, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'nuria.alcala@eoi.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=384', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(201, 'Comunicación de Moda y Belleza', 1, 11, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 000.00( euros ) total a pagar 11 050.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'Adela.rodero@colaboradoresunidadeditorial.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=415', '15%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(202, 'Periodismo de El Mundo', 1, 11, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 11 900.00( euros ) total a pagar 10 115.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'informacion@masterperiodismo.com', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=418', '15%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(203, 'Terapias Avanzadas e Innovación', 1, 34, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 11 500.00( euros ) total a pagar 7 475.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'postgrado@ufv.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=422', '35%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(204, 'MBA', 1, 12, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 19 188.00( euros ) total a pagar 11 512.80( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'informacion.madrid@escuelaeuropea.eu', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=427', '40%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(205, 'Master Project Management', 1, 16, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 10 500.00( euros ) total a pagar 8 715.00( euros ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'coordinacionmexico@esden.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=455', '17%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(206, 'MBA/Direc. y Gestión RH', 1, 16, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 500.00( euros ) total a pagar 11 890.00( euros ). Financiamiento de $100 000 MXP ', 'No existen requisitos especiales', 'coordinacionmexico@esden.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=466', '18%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(207, 'MBA/Dirección de Hoteles', 1, 16, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 500.00( euros ) total a pagar 11 890.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'coordinacionmexico@esden.mx', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=485', '18%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(208, 'MBA/Comercio Exterior', 1, 6, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 7 500.00( euros ) total a pagar 4 500.00( euros ). Financiamiento de $100 000 MXP ', 'No existen requisitos especiales', 'admision@ealde.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=513', '40%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(209, 'MBA Empresas Agroalimentarias', 1, 20, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 8 215.00( euros ) total a pagar 5 750.50( euros ). Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'elena.caceres@grupoioe.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=532', '30%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(210, 'Seguridad y Salud Laboral', 1, 20, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 14 281.00( euros ) total a pagar 9 996.70( euros ). Opción Doble Titulación - ONLINE. Financiamiento de $100 000 MXP', 'No existen requisitos especiales', 'elena.caceres@grupoioe.es', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=538', '30%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1),
(211, 'Ficción en Cine y Televisión', 1, 35, 'Posgrado', 'Profesional', '80', '80', 0, 'NA', 'NA', 'TOEFL iBT', '90', 'Costo de maestría 6 900.00( euros ) total a pagar 6 210.00( euros ). $10 000 MXP para de boleto de avión. Financiamiento de $100 000 MXP y Seguro de gastos médicos.', 'No existen requisitos especiales', 'nuriaPG@blanquerna.url.edu', 'No hay teléfono', 'http://www.fundacionbeca.net/becas_detalleprograma.php?IdPrograma=539&ver=1', '10%', 'NA', 'NA', 'Sin Descripción', 'sobre monto total', 1, 'NA', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `beca_favorito`
--

CREATE TABLE `beca_favorito` (
  `id_favorito` int(7) NOT NULL,
  `id_usuario` int(7) NOT NULL,
  `id_beca` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beca_favorito`
--

INSERT INTO `beca_favorito` (`id_favorito`, `id_usuario`, `id_beca`) VALUES
(1, 2, 7),
(2, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `beca_interesa`
--

CREATE TABLE `beca_interesa` (
  `id_interesa` int(7) NOT NULL,
  `id_usuario` int(7) NOT NULL,
  `id_beca` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beca_interesa`
--

INSERT INTO `beca_interesa` (`id_interesa`, `id_usuario`, `id_beca`) VALUES
(1, 2, 34),
(2, 2, 44);

-- --------------------------------------------------------

--
-- Table structure for table `carreras_usuario`
--

CREATE TABLE `carreras_usuario` (
  `id_registro` int(7) NOT NULL,
  `id_usuario` int(7) NOT NULL,
  `psico` int(2) DEFAULT NULL,
  `conta` int(2) DEFAULT NULL,
  `econo` int(2) DEFAULT NULL,
  `finan` int(2) DEFAULT NULL,
  `arthu` int(2) DEFAULT NULL,
  `arqui` int(2) DEFAULT NULL,
  `ingen` int(2) DEFAULT NULL,
  `disin` int(2) DEFAULT NULL,
  `ensen` int(2) DEFAULT NULL,
  `medic` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carreras_usuario`
--

INSERT INTO `carreras_usuario` (`id_registro`, `id_usuario`, `psico`, `conta`, `econo`, `finan`, `arthu`, `arqui`, `ingen`, `disin`, `ensen`, `medic`) VALUES
(2, 2, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `escuelas`
--

CREATE TABLE `escuelas` (
  `ID_Escuela` int(11) NOT NULL,
  `Nombre_Escuela` varchar(255) NOT NULL,
  `Nombre_Campus` varchar(255) DEFAULT NULL,
  `Descripcion_Escuela` varchar(300) DEFAULT NULL,
  `ID_Pais` varchar(10) NOT NULL,
  `Tipo_Institucion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `escuelas`
--

INSERT INTO `escuelas` (`ID_Escuela`, `Nombre_Escuela`, `Nombre_Campus`, `Descripcion_Escuela`, `ID_Pais`, `Tipo_Institucion`) VALUES
(1, 'Audencia Nantes School of Management / Inglés', 'Francia', 'In 2015 Audencia was awarded reaccreditation by EQUIS AACSB and AMBA for the maximum period of five years. We also had the first combined start of the university year for the schools in our alliance.', 'FR', 'Escuela\r'),
(2, 'Banco de México', 'México', 'Misión: El Banco de México tiene el objetivo prioritario de preservar el valor de la moneda nacional a lo largo del tiempo y de esta forma contribuir a mejorar el bienestar ', 'MX', 'Escuela\r'),
(3, 'Centro Panamericano de Humanidades', 'México', 'Busca que las mujeres y los hombres que integran la sociedad sean verdaderos humanistas es decir que como personas tengan suficientes herramientas para conocer ', 'MX', 'Escuela\r'),
(4, 'CEU', 'Monterrey', 'Contamos con opciones educativas que te permitirán alcanzar tus metas profesionales y ser competitivo en el campo laboral. ¡Fortalece tus talentos en el CEU!', 'MX', 'Escuela\r'),
(5, 'COMEXUS', 'México', 'La Comisión México-Estados Unidos para el Intercambio Educativo y Cultural (COMEXUS) es un organismo binacional constituido por un convenio firmado entre los ', 'MX', 'Organización\r'),
(6, 'EALDE Business School', 'España', 'En EALDE desarrollamos enseñanzas para formar directivos orientados a la acción y al trabajo en equipo y que en todo momento tengan en cuenta los valores humanistas ', 'ES', 'Escuela\r'),
(7, 'ESC Rennes School of Business / Inglés', 'Francia', 'ESC Rennes School of Business se distingue por su perspectiva global y sus programas de Administración que la ha llevado al ranking 35 mundial de las mejores escuelas ', 'FR', 'Escuela\r'),
(8, 'Escuela de Negocios CEU', 'España', 'Cada uno de los colegios basa su proyecto educativo sobre tres pilares fundamentales: La integración de los valores. Facilitar y fomentar los recursos necesarios para ', 'ES', 'Escuela\r'),
(9, 'ESCP Europe', 'España', 'ESCP Europe connects and shapes the business world by advancing cross-cultural management knowledge and practice. Teaching management from an interdisciplinary ', 'ES', 'Escuela\r'),
(10, 'Escuela de Organización Industrial', 'España', 'La Escuela de Organización Industrial es la escuela de negocios más antigua de España y la tercera de la Unión Europea. EOI es una fundación pública cuyo patronato ', 'ES', 'Escuela\r'),
(11, 'Escuela de Periodismo y Comunicación de Unidad Editorial', 'España', 'Los profesores de la Escuela son profesionales de Unidad Editorial y relevantes expertos del ámbito de la comunicación el marketing la publicidad y las nuevas ', 'ES', 'Escuela\r'),
(12, 'Escuela Europea de Negocios', 'España', 'La EEN es más que una institución de estudios de postgrado porque conforma una comunidad que reúne a los jóvenes en una búsqueda compartida del conocimiento ', 'ES', 'Escuela\r'),
(13, 'FLDM', 'Monterrey', 'Nuestra Misión: Formar profesionales del Derecho del más alto nivel académico y humano con preparación internacional y sentido de responsabilidad social.', 'MX', 'Escuela\r'),
(14, 'GISMA Business School / Inglés', 'Alemania', 'Our vision conveys what GISMA Business School stands for defines our values and aids transparency allowing you to understand exactly what we do and why as well as ', 'DE', 'Escuela\r'),
(15, 'ESDEN BUSINESS SCHOOL-MÉXICO', 'México', 'Nuestro objetivo es el desarrollo profesional en plenitud de nuestros alumnos bien  a través de su emprendimiento bien como parte fundamental del crecimiento de ', 'MX', 'Escuela\r'),
(16, 'ESDEN BUSINESS SCHOOL', 'España', 'Nuestro objetivo es el desarrollo profesional en plenitud de nuestros alumnos bien  a través de su emprendimiento bien como parte fundamental del crecimiento de ', 'ES', 'Escuela\r'),
(17, 'ISAC', 'Monterrey', 'MISIÓN: Generar personas íntegras éticas competitivas en su campo profesional que a su vez sean ciudadanos comprometidos con el desarrollo político cultural y social ', 'MX', 'Escuela\r'),
(18, 'IPN', 'México', 'Te damos una cordial bienvenida al Sistema Informático de Becas (SIBec) que forma parte de la reingeniería del proceso de becas que tiene como propósito hacer más ', 'MX', 'Organización\r'),
(19, 'Instituto de Estudios Bursátiles', 'España', 'El IEB tiene una vocación práctica y de calidad en todos sus programas no sólo por la propia metodología de estudios también por el reducido número de alumnos que ', 'ES', 'Escuela\r'),
(20, 'Grupo IOE- Universidad Alcalá de Henares', 'España', 'La Universidad de Alcalá (Madrid) es una de las universidades más antiguas de Europa declarada Patrimonio de la Humanidad por la UNESCO en 1998. Sus programas son ', 'ES', 'Escuela\r'),
(21, 'ITESM', 'Monterrey', 'Nuestra visión: formar líderes con espíritu emprendedor sentido humano y competitivos internacionalmente. Esto nos lleva todos los días a ofrecer a nuestros ', 'MX', 'Escuela\r'),
(22, 'Tec Milenio', 'Monterrey', 'Para la Universidad Tecmilenio el alumno es el centro de nuestra visión y de nuestro Ecosistema de Bienestar y Felicidad por lo que es fundamental estar en continuo ', 'MX', 'Escuela\r'),
(23, 'UAM', 'México', 'La Universidad tiene conciencia de estar al servicio de la sociedad. Por ello orientará la enseñanza la investigación y la difusión de la cultura a la solución de problemas ', 'MX', 'Escuela\r'),
(24, 'MOB', 'México', 'Becas complementarias o parciales en número limitado que esta Fundación otorga en disciplinas no contempladas en los programas enumerados a continuación para ', 'MX', 'Organización\r'),
(25, 'La Rochelle Business School / Inglés', 'Francia', 'In a globalized world characterized by change complexity and uncertainty the School mission is to provide undergraduate graduate and executive business education ', 'FR', 'Escuela\r'),
(26, 'UDEM', 'Monterrey', 'Somos una institución de inspiración católica abierta a todo credo y condición que se distingue por ofrecer un Plan Personal de Formación único para cada estudiante de ', 'MX', 'Escuela\r'),
(27, 'U-ERRE', 'Monterrey', 'Somos una Universidad en Monterrey con carácter humanista. Nuestra universidad cuenta con instalaciones tecnológicamente capacitadas. Licenciaturas con programas ', 'MX', 'Escuela\r'),
(28, 'UANE', 'Monterrey', 'Nuestro modelo educativo define la forma de educación que enfatiza el logro de habilidades y competencias que son importantes para la vida y el trabajo profesional ', 'MX', 'Escuela\r'),
(29, 'UNEZ', 'Monterrey', 'Todas las carreras cuentan con Reconocimiento de Validez Oficial de Estudios (RVOE) expedido por la Secretaría de Educación. Los egresados que cumplan con la ', 'MX', 'Escuela\r'),
(30, 'UNAM', 'México', 'La Universidad Nacional Autónoma de México fue fundada el 21 de septiembre de 1551 con el nombre de la Real y Pontificia Universidad de México. Es la más grande e ', 'MX', 'Escuela\r'),
(31, 'University of Applied Sciences Offenburg', 'Alemania', 'The University maintains excellent relations with regional and national businesses and there is a constant exchange of information between faculty members and ', 'DE', 'Escuela\r'),
(32, 'Universidad del Mayab', 'México', 'La Universidad tiene como misión: Contribuir a la formación integral de líderes de acción positiva y promover institucionalmente el desarrollo de la persona y de la ', 'MX', 'Escuela\r'),
(33, 'Universidad Anáhuac Querétaro', 'México', 'Con el objetivo primordial de elevar la condición humana y social de los hombres y mujeres de México y el mundo en 1964 se funda la Universidad Anáhuac en su sede ', 'MX', 'Escuela\r'),
(34, 'Universidad Francisco de Vitoria', 'España', 'La formación de la UFV dota al alumno de los conocimientos teóricos necesarios para el desempeño de su profesión le forma en las habilidades competencias y talentos ', 'ES', 'Escuela\r'),
(35, 'Universitat Ramon Llull', 'España', 'Universitat Ramon Llull prepares professionals for the society of the future. With the commitment that this implies URL carries out top-level scientific research and ', 'ES', 'Escuela\r'),
(36, 'UTSC', 'Monterrey', 'La Universidad Tecnológica Santa Catarina es una institución de educación superior al amparo de entre otras. Está constituida bajo el régimen jurídico de Organismo ', 'MX', 'Escuela\r'),
(37, 'UP', 'México', 'Mission: Educate persons who seek the truth and commit to it promoting a Christian humanism which contributes to building a better world.', 'MX', 'Escuela\r'),
(38, 'UP', 'Monterrey', 'Mission: Educate persons who seek the truth and commit to it promoting a Christian humanism which contributes to building a better world.', 'MX', 'Escuela\r'),
(39, 'Zagreb School of Economics and Management', 'Croacia', 'La Zagreb School of Economics and Management ha sido votada como la mejor escuela de negocios de Croacia por 5 años consecutivos', 'HR', 'Escuela\r'),
(40, 'University of Tilburg', 'Holanda', 'The preparations for drafting our university new Strategic Plan for the period 2018-2021 are in full swing. This plan will help us prepare for the future give shape to the ', 'NL', 'Escuela\r');

-- --------------------------------------------------------

--
-- Table structure for table `paises`
--

CREATE TABLE `paises` (
  `ID_Pais` varchar(10) NOT NULL,
  `Nombre_Pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paises`
--

INSERT INTO `paises` (`ID_Pais`, `Nombre_Pais`) VALUES
('DE', 'Alemania\r'),
('ES', 'España\r'),
('FR', 'Francia\r'),
('HR ', 'Croacia\r'),
('MX', 'México\r'),
('NL', 'Holanda\r');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_beca`
--

CREATE TABLE `tipo_beca` (
  `id_tipo` int(7) NOT NULL,
  `nombre_tipo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_beca`
--

INSERT INTO `tipo_beca` (`id_tipo`, `nombre_tipo`) VALUES
(1, 'Académica'),
(2, 'Crédito'),
(3, 'Especie');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre_Usuario` varchar(80) DEFAULT NULL,
  `Apellidos_Usuario` varchar(150) DEFAULT NULL,
  `Mail_Usuario` varchar(255) DEFAULT NULL,
  `Pwd_Usuario` varchar(255) NOT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Pais` varchar(100) DEFAULT NULL,
  `Ciudad` varchar(100) DEFAULT NULL,
  `Estudia` tinyint(1) DEFAULT NULL,
  `Nombre_Posgrado` varchar(200) DEFAULT NULL,
  `Promedio_Pos` varchar(5) DEFAULT NULL,
  `Nombre_Universidad` varchar(200) DEFAULT NULL,
  `Promedio_Uni` varchar(5) DEFAULT NULL,
  `Nombre_Prepa` varchar(100) DEFAULT NULL,
  `Promedio_Prepa` varchar(5) DEFAULT NULL,
  `Nombre_Secundaria` varchar(100) DEFAULT NULL,
  `Promedio_Secundaria` varchar(5) DEFAULT NULL,
  `Telefono_contacto` varchar(100) DEFAULT NULL,
  `tipo_beca` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombre_Usuario`, `Apellidos_Usuario`, `Mail_Usuario`, `Pwd_Usuario`, `Fecha_Nacimiento`, `Pais`, `Ciudad`, `Estudia`, `Nombre_Posgrado`, `Promedio_Pos`, `Nombre_Universidad`, `Promedio_Uni`, `Nombre_Prepa`, `Promedio_Prepa`, `Nombre_Secundaria`, `Promedio_Secundaria`, `Telefono_contacto`, `tipo_beca`) VALUES
(2, 'Richard', 'VelRo', 'rvelazquez@devworms.com', '$2y$10$iS7q8MWZ.5LtbFgEcfi1ke6oDQJwIf5nujn70oEVcgap9m1JZP6K2', '1989-02-20', 'México', 'Nezahualcóyotl', 1, '', NULL, 'UPIICSA', '82', 'CETIS 37', '71', '51', '79', '5535060738', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `becas`
--
ALTER TABLE `becas`
  ADD PRIMARY KEY (`ID_Beca`),
  ADD KEY `ID_Escuela_idx` (`ID_Escuela`),
  ADD KEY `id_tipo` (`ID_Tipo`);

--
-- Indexes for table `beca_favorito`
--
ALTER TABLE `beca_favorito`
  ADD PRIMARY KEY (`id_favorito`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_beca` (`id_beca`);

--
-- Indexes for table `beca_interesa`
--
ALTER TABLE `beca_interesa`
  ADD PRIMARY KEY (`id_interesa`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_beca` (`id_beca`);

--
-- Indexes for table `carreras_usuario`
--
ALTER TABLE `carreras_usuario`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `escuelas`
--
ALTER TABLE `escuelas`
  ADD PRIMARY KEY (`ID_Escuela`),
  ADD KEY `ID_Pais_idx` (`ID_Pais`);

--
-- Indexes for table `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`ID_Pais`),
  ADD UNIQUE KEY `ID_Pais_UNIQUE` (`ID_Pais`);

--
-- Indexes for table `tipo_beca`
--
ALTER TABLE `tipo_beca`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`,`Pwd_Usuario`),
  ADD KEY `tipo_beca` (`tipo_beca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `becas`
--
ALTER TABLE `becas`
  MODIFY `ID_Beca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;
--
-- AUTO_INCREMENT for table `beca_favorito`
--
ALTER TABLE `beca_favorito`
  MODIFY `id_favorito` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `beca_interesa`
--
ALTER TABLE `beca_interesa`
  MODIFY `id_interesa` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `carreras_usuario`
--
ALTER TABLE `carreras_usuario`
  MODIFY `id_registro` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `escuelas`
--
ALTER TABLE `escuelas`
  MODIFY `ID_Escuela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tipo_beca`
--
ALTER TABLE `tipo_beca`
  MODIFY `id_tipo` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `becas`
--
ALTER TABLE `becas`
  ADD CONSTRAINT `ID_Escuela` FOREIGN KEY (`ID_Escuela`) REFERENCES `escuelas` (`ID_Escuela`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `becas_ibfk_1` FOREIGN KEY (`ID_Tipo`) REFERENCES `tipo_beca` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `beca_favorito`
--
ALTER TABLE `beca_favorito`
  ADD CONSTRAINT `beca_favorito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beca_favorito_ibfk_2` FOREIGN KEY (`id_beca`) REFERENCES `becas` (`ID_Beca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `beca_interesa`
--
ALTER TABLE `beca_interesa`
  ADD CONSTRAINT `beca_interesa_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beca_interesa_ibfk_2` FOREIGN KEY (`id_beca`) REFERENCES `becas` (`ID_Beca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carreras_usuario`
--
ALTER TABLE `carreras_usuario`
  ADD CONSTRAINT `carreras_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `escuelas`
--
ALTER TABLE `escuelas`
  ADD CONSTRAINT `ID_Pais` FOREIGN KEY (`ID_Pais`) REFERENCES `paises` (`ID_Pais`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo_beca`) REFERENCES `tipo_beca` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
