-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-01-2026 a las 02:52:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidadcompleta2.2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `idCarrera` int(11) NOT NULL,
  `nombreCarrera` varchar(55) NOT NULL,
  `descripcionMuestra` varchar(255) NOT NULL,
  `rutaImagenMuestra` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `tipoCarrera` enum('Grado','Posgrado','Curso') NOT NULL,
  `descripcionCompletaSideBar` varchar(2000) NOT NULL,
  `duracion_anios` int(11) DEFAULT NULL,
  `duracion_meses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`idCarrera`, `nombreCarrera`, `descripcionMuestra`, `rutaImagenMuestra`, `activo`, `tipoCarrera`, `descripcionCompletaSideBar`, `duracion_anios`, `duracion_meses`) VALUES
(14, 'Ingeniería en Sistemas de Información', 'Ingeniería en Sistemas de Información\r\nDiseñá y gestioná soluciones informáticas complejas. Duración: 5 años.', 'IngenieriaEnSistemas.jpeg', 1, 'Grado', 'Ingeniería en Sistemas de Información\r\n\r\nForma ingenieros capaces de analizar, diseñar, desarrollar e implementar sistemas informáticos complejos. Están preparados para integrar hardware y software, optimizar procesos organizacionales y liderar proyectos tecnológicos en empresas del sector público y privado.\r\n\r\nMaterias destacadas:\r\n•	Arquitectura de Computadoras\r\n•	Algoritmos y Estructuras de Datos\r\n•	Ingeniería de Software\r\n•	Base de Datos\r\n•	Redes y Comunicaciones\r\n', 5, NULL),
(15, 'Ingeniería Electrónica', 'Ingeniería Electrónica\r\nFormate para crear sistemas electrónicos y automatizados. Duración: 5 años.', 'IngElectronica.jpg', 1, 'Grado', 'Ingeniería Electrónica\r\n\r\nPrepara profesionales para diseñar, implementar y mantener sistemas electrónicos, de control automático y telecomunicaciones. El egresado puede trabajar en industrias, laboratorios de desarrollo, automatización industrial y empresas de tecnología.\r\n\r\nMaterias destacadas:\r\n•	Electrónica Analógica\r\n•	Electrónica Digital\r\n•	Teoría de Control\r\n•	Instrumentación y Medición\r\n•	Microcontroladores\r\n', 5, NULL),
(16, 'Ingeniería Mecánica', 'Ingeniería Mecánica\r\nDiseñá y mantené equipos mecánicos e industriales. Duración: 5 años.', 'Ing-Mecanica.jpg', 1, 'Grado', 'Ingeniería Mecánica\r\n\r\nForma especialistas en el diseño, análisis y mantenimiento de sistemas mecánicos y térmicos. Se capacita al alumno para trabajar en industrias metalúrgicas, automotrices, energéticas, navales y de manufactura avanzada.\r\n\r\nMaterias destacadas:\r\n•	Termodinámica\r\n•	Mecánica de Fluidos\r\n•	Resistencia de Materiales\r\n•	Diseño Mecánico Asistido\r\n•	Sistemas de Producción\r\n', 5, NULL),
(17, 'Ingeniería Industrial', 'Ingeniería Industrial\r\nOptimizá procesos productivos y organizacionales. Duración: 5 años.', 'Ing-Industrial.jpg', 1, 'Grado', 'Ingeniería Industrial\r\n\r\nCapacita profesionales para mejorar la eficiencia de procesos productivos, logísticos y administrativos. Los ingenieros industriales se desempeñan en áreas de planificación, calidad, operaciones, recursos humanos y gestión de proyectos.\r\n\r\nMaterias destacadas:\r\n•	Investigación Operativa\r\n•	Logística y Distribución\r\n•	Gestión de la Producción\r\n•	Organización Industrial\r\n•	Higiene y Seguridad Industrial\r\n', 5, NULL),
(18, 'Licenciatura en Tecnología Educativa', 'Licenciatura en Tecnología Educativa\r\nInnová en educación con el uso de tecnología. Duración: 4 años.', 'IngEducativa.jpg', 1, 'Grado', 'Licenciatura en Tecnología Educativa\r\n\r\nForma profesionales capaces de integrar herramientas tecnológicas en entornos educativos. Están preparados para diseñar, gestionar e implementar propuestas pedagógicas innovadoras apoyadas en tecnologías digitales.\r\n\r\nMaterias destacadas:\r\n•	Tecnología de la Información Aplicada\r\n•	Diseño de Entornos Virtuales\r\n•	Didáctica de la Educación Tecnológica\r\n•	Producción de Contenidos Digitales\r\n•	Evaluación de Proyectos Educativos\r\n', 4, NULL),
(19, 'Tecnicatura Universitaria en Programación', 'Tecnicatura Universitaria en Programación\r\nFormación intensiva en desarrollo de software. Duración: 3 años.', 'TecProgramacion.jpg', 1, 'Grado', 'Tecnicatura Universitaria en Programación\r\n\r\nUna carrera corta orientada a formar programadores altamente capacitados en el desarrollo de software y aplicaciones. Ideal para insertarse rápidamente en el mercado laboral IT, con conocimientos actualizados en lenguajes, frameworks y metodologías ágiles.\r\n\r\nMaterias destacadas:\r\n•	Programación I y II\r\n•	Base de Datos\r\n•	Paradigmas de Programación\r\n•	Desarrollo Web\r\n•	Práctica Profesional Supervisada\r\n', 3, NULL),
(20, 'Curso de Programación Web Full Stack', 'Programación Web Full Stack\r\nDesarrollá sitios y aplicaciones web completas. Duración: 6 meses.', 'ProgramacionWebFullStack.jpg', 1, 'Curso', 'Curso de Programación Web Full Stack\r\n\r\nAprendé a desarrollar sitios y aplicaciones web dinámicas desde cero, combinando tecnologías de frontend y backend. Ideal para quienes quieren trabajar en desarrollo web o crear sus propios proyectos.\r\n\r\nMaterias:\r\n•	HTML, CSS y JavaScript\r\n•	Frameworks Frontend (React o Vue)\r\n•	Programación Backend (Node.js o PHP)\r\n•	Base de Datos (MySQL / MongoDB)\r\n•	Deploy y Control de Versiones (Git & GitHub)\r\n', NULL, 6),
(21, 'Curso de Automatización Industrial', 'Automatización Industrial\r\nImplementá sistemas automáticos con PLC y sensores. Duración: 4 meses.', 'AutomatizacionIndustrial.jpg', 1, 'Curso', 'Curso de Automatización Industrial\r\n\r\nCapacitación práctica en automatización de procesos industriales mediante PLCs, sensores y actuadores. Orientado a técnicos, ingenieros o estudiantes que deseen adquirir competencias en automatización.\r\n\r\nMaterias:\r\n•	Introducción a los PLC\r\n•	Sensores y Actuadores\r\n•	Programación de PLC (ladder)\r\n•	Control de Motores y Variadores\r\n•	Simulación de Procesos Automatizados\r\n', NULL, 4),
(22, 'Curso de Ciberseguridad para Entornos Empresariales', 'Ciberseguridad para Entornos Empresariales\r\nAprendé a proteger redes y datos empresariales. Duración: 3 meses.', 'Ciberseguridad.jpg', 1, 'Curso', 'Curso de Ciberseguridad para Entornos Empresariales\r\n\r\nFormación inicial en seguridad informática con foco en prevención de amenazas, análisis de vulnerabilidades y buenas prácticas. Ideal para responsables de IT o usuarios con acceso a información sensible.\r\n\r\nMaterias:\r\n•	Fundamentos de Ciberseguridad\r\n•	Tipos de Amenazas y Malware\r\n•	Seguridad en Redes\r\n•	Autenticación y Políticas de Acceso\r\n•	Respuesta ante Incidentes\r\n', NULL, 3),
(23, 'Curso de Desarrollo de Apps Android', 'Desarrollo de Apps Android\r\nDiseñá aplicaciones móviles con Android Studio. Duración: 5 meses.', 'DesarrolloAppsAndroid.jpg', 1, 'Curso', 'Curso de Desarrollo de Apps Android\r\n\r\nCon este curso vas a aprender a desarrollar aplicaciones móviles nativas para Android utilizando Android Studio y Kotlin. No se requieren conocimientos previos en desarrollo mobile.\r\n\r\nMaterias:\r\n•	Fundamentos de Android\r\n•	Interfaces de Usuario (UI/UX)\r\n•	Manejo de Datos (SQLite / Room)\r\n•	Integración con APIs\r\n•	Publicación en Google Play\r\n', NULL, 5),
(24, 'Curso de Diseño Gráfico Digital', 'Diseño Gráfico Digital\r\nCreá piezas visuales usando herramientas digitales. Duración: 3 meses.', 'DisenioGrafico.jpg', 1, 'Curso', 'Curso de Diseño Gráfico Digital\r\n\r\nCurso práctico para aprender a comunicar visualmente a través de herramientas digitales de diseño. Ideal para emprendedores, freelancers y estudiantes creativos.\r\n\r\nMaterias:\r\n•	Fundamentos del Diseño Gráfico\r\n•	Adobe Photoshop\r\n•	Adobe Illustrator\r\n•	Diseño para Redes Sociales\r\n•	Creación de Identidad Visual\r\n', NULL, 3),
(25, 'Curso de Excel para Análisis de Datos', 'Excel para Análisis de Datos\r\nDomina Excel como herramienta de análisis. Duración: 2 meses.', 'Excel.jpg', 1, 'Curso', 'Curso de Excel para Análisis de Datos\r\n\r\nCurso intensivo para dominar Microsoft Excel como herramienta de análisis y visualización de datos. Ideal para perfiles administrativos, contables o analistas.\r\n\r\nMaterias:\r\n•	Funciones Avanzadas\r\n•	Tablas Dinámicas\r\n•	Gráficos y Dashboard\r\n•	Herramientas de Análisis\r\n•	Macros Básicas\r\n', NULL, 2),
(26, 'Maestría en Inteligencia Artificial Aplicada', 'Maestría en Inteligencia Artificial Aplicada\r\nEspecializate en soluciones de IA para la industria. Duración: 2 años.', 'IAAplicada.jpg', 1, 'Posgrado', 'Maestría en Inteligencia Artificial Aplicada\r\n\r\nForma profesionales especializados en el diseño, desarrollo e implementación de soluciones basadas en inteligencia artificial para distintas industrias. Enfocada en machine learning, visión por computadora y procesamiento del lenguaje natural.\r\n\r\nMaterias:\r\n•	Fundamentos de Machine Learning\r\n•	Deep Learning y Redes Neuronales\r\n•	Visión por Computadora\r\n•	Procesamiento de Lenguaje Natural (NLP)\r\n•	Ética y Legislación en IA\r\n', 2, NULL),
(27, 'Especialización en Automatización y Control Industrial', 'Especialización en Automatización y Control Industrial\r\nActualizá tus conocimientos en robótica y control. Duración: 1 año.', 'AutomatizacionYControlIndustrial.jpg', 1, 'Posgrado', 'Especialización en Automatización y Control Industrial\r\n\r\nPrograma orientado a ingenieros y técnicos que buscan actualizarse en tecnologías de control automático, robótica industrial e IoT aplicado a procesos productivos.\r\n\r\nMaterias:\r\n•	Controladores Lógicos Programables (PLC)\r\n•	Robótica Industrial\r\n•	SCADA y Sistemas Supervisores\r\n•	Control PID Avanzado\r\n•	Internet de las Cosas (IoT) para la Industria\r\n', 1, NULL),
(28, 'Maestría en Ciberseguridad Informática', 'Maestría en Ciberseguridad Informática\r\nConvertite en experto en protección digital. Duración: 2 años.', 'CB1.jpg', 1, 'Posgrado', 'Maestría en Ciberseguridad Informática\r\n\r\nForma expertos en gestión de la seguridad informática, con enfoque en prevención, detección y respuesta a incidentes, infraestructura crítica y protección de datos.\r\n\r\nMaterias:\r\n•	Seguridad de Redes y Sistemas\r\n•	Criptografía Aplicada\r\n•	Gestión de Incidentes de Seguridad\r\n•	Pentesting y Análisis de Vulnerabilidades\r\n•	Legislación y Ciberética\r\n', 2, NULL),
(29, 'Maestría en Ciencia de Datos y Analítica Predictiva', 'Maestría en Ciencia de Datos y Analítica Predictiva\r\nAplicá Big Data y modelos predictivos. Duración: 2 años.', 'CienciaDatos.jpg', 1, 'Posgrado', 'Maestría en Ciencia de Datos y Analítica Predictiva\r\n\r\nEste posgrado prepara profesionales capaces de transformar grandes volúmenes de datos en conocimiento útil para la toma de decisiones empresariales, científicas y tecnológicas.\r\n\r\nMaterias:\r\n•	Estadística Avanzada\r\n•	Análisis Predictivo y Modelado\r\n•	Big Data y Herramientas de Procesamiento\r\n•	Visualización de Datos\r\n•	Tesis en Proyecto de Ciencia de Datos\r\n', 2, NULL),
(30, 'Especialización en Tecnología Educativa', 'Especialización en Tecnología Educativa\r\nIntegrá TICs en contextos educativos innovadores. Duración: 1 año.', 'IngEducativa.jpg', 1, 'Posgrado', 'Especialización en Tecnología Educativa\r\n\r\nDirigida a docentes, diseñadores instruccionales y tecnólogos educativos. Ofrece herramientas para diseñar propuestas pedagógicas con uso intensivo de tecnologías digitales.\r\n\r\nMaterias:\r\n•	Diseño Instruccional con TIC\r\n•	Plataformas y Entornos Virtuales\r\n•	Evaluación en Educación Digital\r\n•	Producción de Recursos Multimediales\r\n•	Investigación en Tecnología Educativa\r\n', 1, NULL),
(31, 'Maestría en Ingeniería Biomédica', 'Maestría en Ingeniería Biomédica\r\nDesarrollá tecnología al servicio de la salud. Duración: 2 años.', 'adminDeEmpresas.jpg', 1, 'Posgrado', 'Maestría en Ingeniería Biomédica\r\n\r\nPrograma interdisciplinario que integra ingeniería y ciencias de la salud para desarrollar soluciones tecnológicas aplicadas a la medicina, el diagnóstico y la rehabilitación.\r\n\r\nMaterias:\r\n•	Instrumentación Biomédica\r\n•	Procesamiento de Señales Biológicas\r\n•	Bioinformática\r\n•	Diseño de Dispositivos Médicos\r\n•	Regulación y Ética en Ingeniería Biomédica\r\n', 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_archivos`
--

CREATE TABLE `carrera_archivos` (
  `idCarreraArchivo` int(11) NOT NULL,
  `CarreraID` int(11) NOT NULL,
  `rutaArchivo` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fechaSubida` datetime DEFAULT current_timestamp(),
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcioncarrera`
--

CREATE TABLE `inscripcioncarrera` (
  `id` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `fechaInscripcion` datetime DEFAULT current_timestamp(),
  `activo` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripcioncarrera`
--

INSERT INTO `inscripcioncarrera` (`id`, `idAlumno`, `idCarrera`, `fechaInscripcion`, `activo`) VALUES
(8, 18, 19, '2025-06-27 23:49:25', 1),
(9, 18, 20, '2025-06-27 23:50:13', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcionmateria`
--

CREATE TABLE `inscripcionmateria` (
  `idInscripcion` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idMateriaCarrera` int(11) NOT NULL,
  `fechaInscripcion` datetime DEFAULT current_timestamp(),
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `idMateria` int(11) NOT NULL,
  `nombreMateria` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idMateria`, `nombreMateria`, `activo`) VALUES
(14, 'HTML, CSS y JavaScript', 1),
(15, 'Frameworks Frontend (React o Vue)', 1),
(16, 'Programación Backend (Node.js o PHP)', 1),
(17, 'Base de Datos (MySQL / MongoDB)', 1),
(18, 'Deploy y Control de Versiones (Git & GitHub)', 1),
(19, 'Introducción a los PLC', 1),
(20, 'Sensores y Actuadores', 1),
(21, 'Programación de PLC (ladder)', 1),
(22, 'Control de Motores y Variadores', 1),
(23, 'Simulación de Procesos Automatizados', 1),
(24, 'Fundamentos de Ciberseguridad', 1),
(25, 'Tipos de Amenazas y Malware', 1),
(26, 'Seguridad en Redes', 1),
(27, 'Autenticación y Políticas de Acceso', 1),
(28, 'Respuesta ante Incidentes', 1),
(29, 'Fundamentos de Android', 1),
(30, 'Interfaces de Usuario (UI/UX)', 1),
(31, 'Manejo de Datos (SQLite / Room)', 1),
(32, 'Integración con APIs', 1),
(33, 'Publicación en Google Play', 1),
(34, 'Fundamentos del Diseño Gráfico', 1),
(35, 'Adobe Photoshop', 1),
(36, 'Adobe Illustrator', 1),
(37, 'Diseño para Redes Sociales', 1),
(38, 'Creación de Identidad Visual', 1),
(39, 'Funciones Avanzadas', 1),
(40, 'Tablas Dinámicas', 1),
(41, 'Gráficos y Dashboard', 1),
(42, 'Herramientas de Análisis', 1),
(43, 'Macros Básicas', 1),
(44, 'Arquitectura de Computadoras', 1),
(45, 'Algoritmos y Estructuras de Datos', 1),
(46, 'Ingeniería de Software', 1),
(47, 'Base de Datos', 1),
(48, 'Redes y Comunicaciones', 1),
(49, 'Electrónica Analógica', 1),
(50, 'Electrónica Digital', 1),
(51, 'Teoría de Control', 1),
(52, 'Instrumentación y Medición', 1),
(53, 'Microcontroladores', 1),
(54, 'Termodinámica', 1),
(55, 'Mecánica de Fluidos', 1),
(56, 'Resistencia de Materiales', 1),
(57, 'Diseño Mecánico Asistido', 1),
(58, 'Sistemas de Producción', 1),
(59, 'Investigación Operativa', 1),
(60, 'Logística y Distribución', 1),
(61, 'Gestión de la Producción', 1),
(62, 'Organización Industrial', 1),
(63, 'Higiene y Seguridad Industrial', 1),
(64, 'Tecnología de la Información Aplicada', 1),
(65, 'Diseño de Entornos Virtuales', 1),
(66, 'Didáctica de la Educación Tecnológica', 1),
(67, 'Producción de Contenidos Digitales', 1),
(68, 'Evaluación de Proyectos Educativos', 1),
(69, 'Programación I y II', 1),
(70, 'Paradigmas de Programación', 1),
(71, 'Desarrollo Web', 1),
(72, 'Práctica Profesional Supervisada', 1),
(73, 'Fundamentos de Machine Learning', 1),
(74, 'Deep Learning y Redes Neuronales', 1),
(75, 'Visión por Computadora', 1),
(76, 'Procesamiento de Lenguaje Natural (NLP)', 1),
(77, 'Ética y Legislación en IA', 1),
(78, 'Controladores Lógicos Programables (PLC)', 1),
(79, 'Robótica Industrial', 1),
(80, 'SCADA y Sistemas Supervisores', 1),
(81, 'Control PID Avanzado', 1),
(82, 'Internet de las Cosas (IoT) para la Industria', 1),
(83, 'Seguridad de Redes y Sistemas', 1),
(84, 'Criptografía Aplicada', 1),
(85, 'Gestión de Incidentes de Seguridad', 1),
(86, 'Pentesting y Análisis de Vulnerabilidades', 1),
(87, 'Legislación y Ciberética', 1),
(88, 'Estadística Avanzada', 1),
(89, 'Análisis Predictivo y Modelado', 1),
(90, 'Big Data y Herramientas de Procesamiento', 1),
(91, 'Visualización de Datos', 1),
(92, 'Tesis en Proyecto de Ciencia de Datos', 1),
(93, 'Diseño Instruccional con TIC', 1),
(94, 'Plataformas y Entornos Virtuales', 1),
(95, 'Evaluación en Educación Digital', 1),
(96, 'Producción de Recursos Multimediales', 1),
(97, 'Investigación en Tecnología Educativa', 1),
(98, 'Instrumentación Biomédica', 1),
(99, 'Procesamiento de Señales Biológicas', 1),
(100, 'Bioinformática', 1),
(101, 'Diseño de Dispositivos Médicos', 1),
(102, 'Regulación y Ética en Ingeniería Biomédica', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiadictado`
--

CREATE TABLE `materiadictado` (
  `id` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `cuatrimestre` int(11) NOT NULL DEFAULT 0,
  `turno` enum('Mañana','Tarde','Noche') NOT NULL,
  `DiaCursada` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materiadictado`
--

INSERT INTO `materiadictado` (`id`, `idMateria`, `idCarrera`, `idProfesor`, `cuatrimestre`, `turno`, `DiaCursada`, `activo`, `horaInicio`, `horaFin`) VALUES
(32, 14, 20, 17, 0, 'Tarde', 'Lunes', 1, '13:00:00', '16:30:00'),
(33, 15, 20, 17, 0, 'Mañana', 'Martes', 1, '08:00:00', '12:00:00'),
(34, 47, 19, 17, 1, 'Mañana', 'Miércoles', 1, '08:00:00', '12:00:00'),
(35, 69, 19, 17, 1, 'Tarde', 'Miércoles', 1, '13:00:00', '17:00:00'),
(36, 83, 28, 15, 1, 'Mañana', 'Lunes', 1, '08:00:00', '11:00:00'),
(37, 84, 28, 15, 1, 'Mañana', 'Martes', 1, '08:00:00', '11:30:00'),
(38, 85, 28, 15, 2, 'Tarde', 'Miércoles', 1, '13:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_archivos`
--

CREATE TABLE `materia_archivos` (
  `idMateriaArchivo` int(11) NOT NULL,
  `MateriaID` int(11) NOT NULL,
  `rutaArchivo` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `fechaSubido` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `idNovedades` int(11) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Descripcion` varchar(900) NOT NULL,
  `Activo` tinyint(1) NOT NULL,
  `Selecionado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `novedades`
--

INSERT INTO `novedades` (`idNovedades`, `Titulo`, `Descripcion`, `Activo`, `Selecionado`) VALUES
(16, 'Nueva Tecnicatura en Ciberseguridad', 'A partir del próximo cuatrimestre se abrirá la inscripción para la nueva Tecnicatura en Ciberseguridad. Una propuesta innovadora que responde a la demanda creciente de profesionales en seguridad informática y redes.', 1, 1),
(17, 'Convenio con Empresa de Software', 'La universidad firmó un acuerdo con una empresa líder en desarrollo de software, lo que permitirá a los estudiantes realizar prácticas profesionales y acceder a oportunidades laborales desde etapas tempranas de la carrera.', 1, 1),
(18, 'Concurso de Proyectos Tecnológicos', 'Está abierta la inscripción para el Concurso Anual de Proyectos Tecnológicos. Podés participar individualmente o en grupo y presentar ideas innovadoras. Hay premios, mentorías y la posibilidad de incubar tu proyecto.', 1, 1),
(19, 'Nuevo Laboratorio de Robótica', 'Inauguramos el nuevo laboratorio de robótica equipado con impresoras 3D, kits de Arduino, brazos robóticos y estaciones de programación. Está disponible para prácticas, proyectos finales y clubes de investigación.', 1, 1),
(20, 'Nueva noticia', 'Nueva noticia Nueva noticia Nueva noticia Nueva noticiaNueva noticia', 0, 1),
(21, 'ti', 'lo', 0, 0),
(22, 't', 't', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `NombreUsuario` varchar(60) NOT NULL,
  `ContraUsuario` varchar(60) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Apellido` varchar(40) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `tipoUsuario` enum('Alumno','Profesor','admin') NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fotoDePerfil` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `CarreraID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `NombreUsuario`, `ContraUsuario`, `Nombre`, `Apellido`, `DNI`, `Email`, `tipoUsuario`, `telefono`, `fotoDePerfil`, `activo`, `CarreraID`) VALUES
(15, 'jrodriguez', '$2y$10$ykvUrjHNtLUIe24zgGDWu.GEJwr6mAA/Tk.1H1jf5AzeYBW.cN5dO', 'Juan', 'Rodríguez', '30123456', 'jrodriguez@mail.com', 'Profesor', '1123456789', '381-3815346_contacto-de-persona-logo-png-transparent-png.png', 1, NULL),
(16, 'mmartinez', '$2y$10$rmz6aSRAfm7OqCKF67lqDeYVhCLX5WvuqlcuBQDqx4K5HWP2xI3mG', 'María', 'Martínez', '28999888', 'mmartinez@gmail.com', 'Profesor', '1167894321', '381-3815346_contacto-de-persona-logo-png-transparent-png.png', 1, NULL),
(17, 'lfernandez', '$2y$10$LJD3AZ9CKTErfagaWVpGs.aUEYqInxCY0KjFZBfUY.Hf2msZP.032', 'Lucas', 'Fernández', '32111222', 'lucas.fer@hotmail.com', 'Profesor', '1134567890', '381-3815346_contacto-de-persona-logo-png-transparent-png.png', 1, NULL),
(18, 'acosta123', '$2y$10$dEbFRRg.5e5RcTK.ID5zXenHIlrIJJu/ZDMfdEw4nFDO1XT8sq4IS', 'Ana', 'Costa', '27000000', 'ana.costa@yahoo.com', 'Alumno', '1145678912', '381-3815346_contacto-de-persona-logo-png-transparent-png.png', 1, NULL),
(19, 'egarcia', '$2y$10$dSWH6yOc2kVBjaovGAo0xeRmqaF0YVCd8uxn9SU3AK3eff9OlFofe', 'Eduardo', 'García', '33111222', 'edu.garcia@mail.com', 'Alumno', '1176543210', '381-3815346_contacto-de-persona-logo-png-transparent-png.png', 1, NULL),
(20, 'nramos', '$2y$10$1UcAicN5MR7FxDcC7mq/pODgcLrMxzhm2SBLRyD/QNe.A0BASx4WC', 'Natalia', 'Ramos', '29991111', 'natalia.r@gmail.com', 'Alumno', '1156789034', '381-3815346_contacto-de-persona-logo-png-transparent-png.png', 1, NULL),
(21, 'dperez', '$2y$10$vRvETOL/Z4unrIfWi4Ua.e/LSM4zWFg208jRzsHuHq.Q2wT6ftc1u', 'Diego', 'Pérez', '31000011', 'diego.pz@outlook.com', 'Profesor', '1122233344', '381-3815346_contacto-de-persona-logo-png-transparent-png.png', 1, NULL),
(22, 'smendez', '$2y$10$Y7ZPwpNOKNfDjBVk5PfMTuvHYOeWO7CNSGAjnEiGFrzRBAtXa86ES', 'Sofía', 'Méndez', '33333333', 'sofia.mdz@mail.com', 'Alumno', '1187654321', '381-3815346_contacto-de-persona-logo-png-transparent-png.png', 1, NULL),
(23, 'fariasL', '$2y$10$9Umtg3XiFh/wuWM8J1yoS.bNV/Dgh/bx2jQj7VoIKFcVjP9ErZ54.', 'Leonardo', 'Farías', '34001234', 'leo.farias@mail.com', 'Alumno', '1167890123', '381-3815346_contacto-de-persona-logo-png-transparent-png.png', 1, NULL),
(24, 'calvarez', '$2y$10$.CLwlys7n/3PsZlh7YoeFu1hHssT4ZdLnhDsrABVRPdfGf4jhHbbO', 'Camila', 'Álvarez', '29887766', 'camila.alvarez@gmail.com', 'Alumno', '1144432211', '381-3815346_contacto-de-persona-logo-png-transparent-png.png', 1, NULL),
(25, 'Administrador', '$2y$10$OGVR1Z5x.iD0DwYcU0HGJ.Kam/tGIn5ymyq33WtX6S.iIPC.KrBY2', 'admin', 'admin', '42569865', 'admin@hotmail.com', 'admin', '1122334455', 'pngkey.com-flask-png-985032.png', 1, NULL),
(26, 'Alumno', '$2y$10$kcJTh3jeRAplZw9uCcrHe.AceLyxipJ3RzTR25Is6bLmGmwCLOO9m', 'Alumno', 'Alumno', '42569866', 'alumno@hotmail.com', 'Alumno', '1122334454', 'pngkey.com-flask-png-985032.png', 1, NULL),
(27, 'Profesor', '$2y$10$x7MFKKqD6I0Qv6/FQX4Kj.qkK9oLbYdG.o/ITDvjRBUO0m1NMAKsS', 'Profe', 'Profe', '42569867', 'profe@hotmail.com', 'Profesor', '1122334453', 'pngkey.com-flask-png-985032.png', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`idCarrera`);

--
-- Indices de la tabla `carrera_archivos`
--
ALTER TABLE `carrera_archivos`
  ADD PRIMARY KEY (`idCarreraArchivo`),
  ADD KEY `CarreraID` (`CarreraID`);

--
-- Indices de la tabla `inscripcioncarrera`
--
ALTER TABLE `inscripcioncarrera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAlumno` (`idAlumno`),
  ADD KEY `idCarrera` (`idCarrera`);

--
-- Indices de la tabla `inscripcionmateria`
--
ALTER TABLE `inscripcionmateria`
  ADD PRIMARY KEY (`idInscripcion`),
  ADD KEY `idAlumno` (`idAlumno`),
  ADD KEY `idMateriaCarrera` (`idMateriaCarrera`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idMateria`);

--
-- Indices de la tabla `materiadictado`
--
ALTER TABLE `materiadictado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMateria` (`idMateria`),
  ADD KEY `idCarrera` (`idCarrera`),
  ADD KEY `idProfesor` (`idProfesor`);

--
-- Indices de la tabla `materia_archivos`
--
ALTER TABLE `materia_archivos`
  ADD PRIMARY KEY (`idMateriaArchivo`),
  ADD KEY `MateriaID` (`MateriaID`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`idNovedades`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `CarreraID` (`CarreraID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `idCarrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `carrera_archivos`
--
ALTER TABLE `carrera_archivos`
  MODIFY `idCarreraArchivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripcioncarrera`
--
ALTER TABLE `inscripcioncarrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `inscripcionmateria`
--
ALTER TABLE `inscripcionmateria`
  MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `materiadictado`
--
ALTER TABLE `materiadictado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `materia_archivos`
--
ALTER TABLE `materia_archivos`
  MODIFY `idMateriaArchivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `idNovedades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrera_archivos`
--
ALTER TABLE `carrera_archivos`
  ADD CONSTRAINT `carrera_archivos_ibfk_1` FOREIGN KEY (`CarreraID`) REFERENCES `carrera` (`idCarrera`);

--
-- Filtros para la tabla `inscripcioncarrera`
--
ALTER TABLE `inscripcioncarrera`
  ADD CONSTRAINT `inscripcioncarrera_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `inscripcioncarrera_ibfk_2` FOREIGN KEY (`idCarrera`) REFERENCES `carrera` (`idCarrera`);

--
-- Filtros para la tabla `inscripcionmateria`
--
ALTER TABLE `inscripcionmateria`
  ADD CONSTRAINT `inscripcionmateria_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `inscripcionmateria_ibfk_2` FOREIGN KEY (`idMateriaCarrera`) REFERENCES `materiadictado` (`id`);

--
-- Filtros para la tabla `materiadictado`
--
ALTER TABLE `materiadictado`
  ADD CONSTRAINT `materiadictado_ibfk_1` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idMateria`),
  ADD CONSTRAINT `materiadictado_ibfk_2` FOREIGN KEY (`idCarrera`) REFERENCES `carrera` (`idCarrera`),
  ADD CONSTRAINT `materiadictado_ibfk_3` FOREIGN KEY (`idProfesor`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `materia_archivos`
--
ALTER TABLE `materia_archivos`
  ADD CONSTRAINT `materia_archivos_ibfk_1` FOREIGN KEY (`MateriaID`) REFERENCES `materia` (`idMateria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`CarreraID`) REFERENCES `carrera` (`idCarrera`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
