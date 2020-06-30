CREATE DATABASE IF NOT EXISTS bdd_gcon;

USE bdd_gcon;

--
-- Estructura de tabla para la tabla `arls`
--

CREATE TABLE `arls` (
  `id_arl` int NOT NULL,
  `nombre_arl` varchar(20) DEFAULT NULL,
  `tipo_riesgo` varchar(6) DEFAULT NULL,
  `f_afiliacion` varchar(5) DEFAULT NULL,
  `novedad` varchar(255) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `updated_at` DATE NOT NULL,
  `created_at` DATE NOT NULL,
  PRIMARY KEY(id_arl)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int NOT NULL,
  `denominacion` varchar(20) DEFAULT NULL,
  `codigo` varchar(6) DEFAULT NULL,
  `grado` varchar(5) DEFAULT NULL,
  `caracter` varchar(255) DEFAULT NULL,
  `asignacion` varchar(255) DEFAULT NULL,
  `f_ingreso` datetime DEFAULT NULL,
  `cod_nivel` int NOT NULL,
  `cod_maa` int NOT NULL,
  `cod_persona` int NOT NULL,
  `updated_at` DATE NOT NULL,
  `created_at` DATE NOT NULL,
  PRIMARY KEY(id_cargo)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dts`
--

CREATE TABLE `dts` (
  `id_dt` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sigla` varchar(4) NOT NULL,
  PRIMARY KEY (`id_dt`)
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `dts`
--

INSERT INTO `dts` (`id_dt`, `nombre`, `director`, `direccion`, `telefono`, `email`, `sigla`) VALUES
(1, 'Dirección territorial Amazonía', 'Diana Castellanos Mendez', 'Calle 12C  #  8 – 79, Bogotá', '6530260', 'buzon.dtam@parquesnacionales.gov.co', 'DTAM'),
(2, 'Dirección territorial Andes Nororientales', 'Fabio Villamizar Duran ', 'Avenida Quebrada Seca No. 30-12 Bucaramanga', '(7) 6454865', 'buzon.dtan@parquesnacionales.gov.co', 'DTAN'),
(3, 'Dirección territorial Andes Occidentales', 'Jorge Eduardo Ceballos Betancur ', 'Carrera 42 # 47-21. Int. 202 Medellín ', '(4) 3220224', 'buzon.dtao@parquesnacionales.gov.co', 'DTAO'),
(4, 'Dirección territorial Caribe', 'Luz Elvira Angarita Jimenez ', 'Calle 17 N. 4 – 06 Santamarta', '(5) 4230750', 'buzon.dtca@parquesnacionales.gov.co', 'DTCA'),
(5, 'Dirección territorial Orinoquía', 'Edgar Olaya Ospina', 'Cra 39 No 26C-47 Villavicencio', '(8) 6819000', 'buzon.dtor@parquesnacionales.gov.co', 'DTOR'),
(6, 'Dirección territorial Pacífico', 'Robinson Galindo Tarazona ', 'Calle 29 Norte No. 6N- 43 Cali', '(2) 6676041', 'buzon.dtpa@parquesnacionales.gov.co', 'DTPA'),
(7, 'Nivel Central', 'Nubia Lucia Wilches Quintana', 'Calle 74 # 11 – 81', ' (1) 353 2400', 'prueba@parquesnacionales.gov.co', 'NC');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `id_dep` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo` int NOT NULL,
  `cod_dt` int NOT NULL,
  `categoria` varchar(5) NOT NULL,
  	PRIMARY KEY (`id_dep`) , 
	CONSTRAINT `fk_dep_dt` FOREIGN KEY (`cod_dt`) REFERENCES `dts`(`id_dt`)
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id_dep`, `nombre`, `tipo`, `cod_dt`, `categoria`) VALUES
(100, 'Dirección Territorial Amazonia', 70, 1, 'Dep'),
(101, 'Parque Nacional Natural Yaigojé Apaporis', 70, 1, 'PNN'),
(102, 'Parque Nacional Natural Amacayacu', 70, 1, 'PNN'),
(103, 'Parque Nacional Natural Serranía de los Churumbelos', 70, 1, 'PNN'),
(104, 'Parque Nacional Natural Río Puré', 70, 1, 'PNN'),
(105, 'Reserva Nacional Natural Puinawai', 70, 1, 'RNN'),
(106, 'Reserva Nacional Natural Nukak', 70, 1, 'RNN'),
(107, 'Parque Nacional Natural La Paya', 70, 1, 'PNN'),
(108, 'Parque Nacional Natural Cahuinarí', 70, 1, 'PNN'),
(109, 'Parque Nacional Natural Alto Fragua Indi Wasi', 70, 1, 'PNN'),
(110, 'Santuario de Flora Plantas Medicinales Orito Ingi - Ande', 70, 1, 'SF'),
(111, 'Parque Nacional Natural Serranía de Chiribiquete', 70, 1, 'PNN'),
(200, 'Dirección Territorial Andes Nororientales', 70, 2, 'Dep'),
(201, 'Santuario de Flora y Fauna Iguaque', 70, 2, 'SFF'),
(202, 'Parque Nacional Natural el Cocuy', 70, 2, 'PNN'),
(203, 'Parque Nacional Natural Tamá', 70, 2, 'PNN'),
(204, 'Parque Nacional Natural Serranía de Los Yariguíes', 70, 2, 'PNN'),
(205, 'Parque Nacional Natural Pisba', 70, 2, 'PNN'),
(206, 'Parque Nacional Natural Catatumbo Barí', 70, 2, 'PNN'),
(207, 'Santuario de Flora y Fauna Guanentá Alto Río Fonce', 70, 2, 'SFF'),
(208, 'Área Natural Única Los Estoraques', 70, 2, 'ANU'),
(300, 'Dirección Territorial Andes Occidentales', 70, 3, 'Dep'),
(301, 'Parque Nacional Natural Selva de Florencia', 70, 3, 'PNN'),
(302, 'Parque Nacional Natural Tatamá', 70, 3, 'PNN'),
(303, 'Parque Nacional Natural Nevado del Huila', 70, 3, 'PNN'),
(304, 'Parque Nacional Natural Las Orquídeas', 70, 3, 'PNN'),
(305, 'Parque Nacional Natural Complejo Volcanico Doña Juana - Cascabel', 70, 3, 'PNN'),
(306, 'Parque Nacional Natural Las Hermosas Gloria Valencia de Castaño', 70, 3, 'PNN'),
(307, 'Parque Nacional Natural Puracé', 70, 3, 'PNN'),
(308, 'Santuario de Fauna y Flora Otún Quimbaya', 70, 3, 'SFF'),
(309, 'Parque Nacional Natural Los Nevados', 70, 3, 'PNN'),
(310, 'Santuario de Flora Isla de la Corota', 70, 3, 'SF'),
(311, 'Santuario de Flora y Fauna Galeras', 70, 3, 'SFF'),
(312, 'Parque Nacional Natural Cueva de los Guácharos', 70, 3, 'PNN'),
(400, 'Dirección Territorial Caribe', 70, 4, 'Dep'),
(401, 'Parque Nacional Natural Macuira ', 70, 4, 'PNN'),
(402, 'Parque Nacional Natural Bahía Portete - Kaurrele', 70, 4, 'PNN'),
(403, 'Santuario de Fauna Acandí, Playón y Playona', 70, 4, 'SF'),
(404, 'Parque Nacional Natural Corales de Profundidad', 70, 4, 'PNN'),
(405, 'Santuario de Flora y Fauna Los Colorados', 70, 4, 'SFF'),
(406, 'Santuario de Flora y Fauna El Corchal ¨El Mono Hernández¨', 70, 4, 'SFF'),
(407, 'Santuario de Flora y Fauna Ciénaga Grande de Santa Marta', 70, 4, 'SFF'),
(408, 'Parque Nacional Natural Paramillo', 70, 4, 'PNN'),
(409, 'Parque Nacional Natural Sierra Nevada de Santa Marta', 70, 4, 'PNN'),
(410, 'Parque Nacional Natural Old Providence McBean Lagoon', 70, 4, 'PNN'),
(411, 'Parque Nacional Natural Macuira', 70, 4, 'PNN'),
(412, 'Santuario de Fauna y Flora Los Flamencos', 70, 4, 'SFF'),
(413, 'Vía Parque Isla de Salamanca', 70, 4, 'VPIS'),
(414, 'Parque Nacional Natural Corales del Rosario y de San Bernardo', 70, 4, 'PNN'),
(415, 'Parque Nacional Natural Tayrona', 70, 4, 'PNN'),
(500, 'Dirección Territorial Orinoquia', 70, 5, 'Dep'),
(501, 'Distrito Nacional de Manejo Cinaruco', 70, 5, 'DNM'),
(502, 'Parque Nacional Natural Cordillera de Los Picachos', 70, 5, 'PNN'),
(503, 'Parque Nacional Natural Chingaza', 70, 5, 'PNN'),
(504, 'Parque Nacional Natural Sierra de la Macarena', 70, 5, 'PNN'),
(505, 'Parque Nacional Natural El Tuparro', 70, 5, 'PNN'),
(506, 'Parque Nacional Natural Tinigua', 70, 5, 'PNN'),
(507, 'Parque Nacional Natural Sumapaz', 70, 5, 'PNN'),
(600, 'Dirección Territorial Pacifico', 70, 6, 'Dep'),
(601, 'Distrito Nacional de Manejo Cabo Manglares', 70, 6, 'DNM'),
(602, 'Distrito Nacional de Manejo Integrado Yuruparí - Malpelo', 70, 6, 'DNM'),
(603, 'Parque Nacional Natural Utría', 70, 6, 'PNN'),
(604, 'Parque Nacional Natural Uramba Bahía Málaga', 70, 6, 'PNN'),
(605, 'Parque Nacional Natural Sanquianga', 70, 6, 'PNN'),
(606, 'Parque Nacional Natural Munchique', 70, 6, 'PNN'),
(607, 'Parque Nacional Natural Los Katíos', 70, 6, 'PNN'),
(608, 'Parque Nacional Natural Farallones de Cali', 70, 6, 'PNN'),
(609, 'Santuario de Flora y Fauna Malpelo', 70, 6, 'SFF'),
(610, 'Parque Nacional Natural Gorgona', 70, 6, 'PNN'),
(701, 'Dirección General', 71, 7, 'Dep'),
(702, 'Grupo de Comunicaciones y Educacion Ambiental', 71, 7, 'Dep'),
(703, 'Grupo Participación Social', 71, 7, 'Dep'),
(704, 'Oficina Asesora Jurídica', 71, 7, 'Dep'),
(705, 'Grupo de Predios', 71, 7, 'Dep'),
(706, 'Oficina Asesora de Planeación', 71, 7, 'Dep'),
(707, 'Oficina de Gestion del Riesgo', 71, 7, 'Dep'),
(708, 'Grupo de Control Interno', 71, 7, 'Dep'),
(709, 'Subdirección de Gestión y Manejo de Areas Protegidas', 72, 7, 'Dep'),
(710, 'Grupo de Gestión e Integración del SINAP', 72, 7, 'Dep'),
(711, 'Grupo Sistemas de Información y Radiocomunicaciones', 72, 7, 'Dep'),
(712, 'Grupo de Trámites y Evaluación Ambiental', 72, 7, 'Dep'),
(713, 'Grupo de Planeación y Manejo de Areas Protegidas', 72, 7, 'Dep'),
(714, 'Subdirección de Sostenibilidad y Negocios Ambientales', 73, 7, 'Dep'),
(715, 'Subdirección Administrativa y Financiera', 74, 7, 'Dep'),
(716, 'Grupo de Procesos Corporativos', 74, 7, 'Dep'),
(717, 'Grupo de Infraestructura', 74, 7, 'Dep'),
(718, 'Grupo de Contratos', 74, 7, 'Dep'),
(719, 'Grupo de Gestión Financiera', 74, 7, 'Dep'),
(720, 'Grupo de Gestión Humana', 74, 7, 'Dep'),
(721, 'Grupo Control Disciplinario Interno', 74, 7, 'Dep');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `N_solCDP` int NOT NULL,
  `Objeto` longtext CHARACTER NOT NULL,
  `Valor` bigint NOT NULL,
  `Fuente` tinyint NOT NULL,
  `N_radicado` varchar(20) DEFAULT NULL,
  `estado` tinyint DEFAULT NULL,
  `Comentarios` longtext,
  `cod_dep` int NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
   PRIMARY KEY (`N_solCDP`),
  CONSTRAINT `fk_Sol_CDP_Dependencia` FOREIGN KEY (`cod_dep`) REFERENCES `dependencias` (`id_dep`)
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`N_solCDP`, `Objeto`, `Valor`, `Fuente`, `N_radicado`, `estado`, `Comentarios`, `cod_dep`, `updated_at`, `created_at`) VALUES
(2520, 'LUZ JANETH VILLALBA SUAREZ', 61530223, 1, '20204200000033', 2, 'este sale del seguimiento', 718, '2020-06-23', '2020-06-23'),
(2620, 'Prestación de servicios profesionales y de apoyo a la gestión para adelantar las liquidaciones de común acuerdo y unilaterales que sean necesarias de los contratos de tracto sucesivo, aquellos cuya ejecución o cumplimiento se prolongue en el tiempo y los demás que lo exijan, de conformidad a las disposiciones legales que regulan la materia, así como apoyar jurídicamente en el tema de seguros cuando se requiera.', 43015385, 2, '20204200000073', 2, NULL, 718, '2020-06-24', '2020-06-24'),
(2720, 'Prestación de Servicios Profesionales para apoyar la gestión contractual de Parques Nacionales Naturales de Colombia Nivel Central.', 35881770, 2, '20204200000023', 2, NULL, 718, '2020-06-24', '2020-06-24'),
(2920, 'Prestación de Servicios Profesionales y de apoyo a la gestión para adelantar en el área de contratos los diversos procedimientos legales relacionados con los trámites precontractuales, contractuales y poscontractuales en el Nivel Central.', 60270833, 2, '20204200000053', 2, NULL, 718, '2020-06-26', '2020-06-26'),
(3020, 'SANDRA LILIANA CHAVES CLAVIJO', 30367890, 2, '20204200000013', 2, NULL, 718, '2020-06-23', '2020-06-23'),
(3120, 'Prestación de Servicios Profesionales y de apoyo a la gestión para adelantar en el área de contratos los diversos procedimientos legales relacionados con los trámites precontractuales, contractuales y poscontractuales en el Nivel Central.', 61350310, 2, '20204200000043', 2, NULL, 718, '2020-06-24', '2020-06-24'),
(3220, 'Prestación de servicios profesionales y de apoyo a la gestión en los diferentes tramites precontractuales, contractuales y postcontractuales, asi como la elaboración, seguimiento y liquidación de convenios, que adelante parques nacionales naturales de colombia y generación de conceptos jurídicos que se requieran', 66680008, 2, '20204200000083', 2, NULL, 718, '2020-06-24', '2020-06-24'),
(3320, 'Prestación de servicios profesionales y de apoyo a la gestión para articular el proceso de presupuesto orientado a resultados, así como realizar las acciones inherentes al marco de competencias de la Oficina Asesora de Planeación.', 79875454, 1, '20201400000083', 1, NULL, 706, '2020-06-29', '2020-06-29'),
(4020, 'Prestación de servicios profesionales para gestionar, implementar y acompañar las alianzas publico privadas, así como la formulación y seguimiento a los proyectos de cooperación de la entidad', 72605365, 1, '20201400000103', 2, 'Cambio la fuente de recursos', 706, '2020-06-25', '2020-06-24'),
(4220, 'Prestar servicios profesionales y de apoyo a la gestión en el Grupo de Procesos Corporativos para el desarrollo de las etapas precontractuales, contractuales y poscontractuales que se adelanten en la Dependencia y apoyo en las actividades de materia jurídica a cargo del Grupo.', 42373264, 1, '20204600000043', 2, 'nuevo comentario', 716, '2020-06-26', '2020-06-24'),
(4320, 'Prestar servicios profesionales y de apoyo a la gestión del Grupo de Procesos Corporativos para la implementación de las normas y políticas relacionadas con la estrategia de servicio al ciudadano en armonía con las demás dependencias de la Entidad, así como la coordinación y control en la gestión de las peticiones, quejas, reclamos y sugerencias que se formulen y demás temas relacionados con el régimen de protección de base de datos personales del Grupo de Procesos Corporativos', 42373264, 2, '20204600000053', 1, NULL, 716, '2020-06-24', '2020-06-24'),
(4420, 'Prestación de servicios profesionales para brindar apoyo al seguimiento de las actividades, indicadores y recursos registrados en las herramientas e instrumentos de planeación en el marco del Modelo Integrado de Planeación y gestión vigente', 47359045, 1, '20201400000143', 1, NULL, 706, '2020-06-29', '2020-06-29'),
(4720, 'Prestar servicios profesionales y de apoyo a la gestión en el Grupo de Procesos Corporativos en el seguimiento contable a movimientos registrados en las cuentas de propiedad planta y equipo, bienes entregados a terceros, intangibles y responsabilidades, para la consolidación y reportes, así como las depreciaciones individuales a que haya lugar en el Nivel Central.', 48686869, 1, '20204600000143', 1, NULL, 716, '2020-06-29', '2020-06-29'),
(5120, 'Prestación de servicios profesionales de apoyo ala gestión de la Oficina de Gestión del Riesgo de la Dirección General para la atención de los asuntos relacionados es aspectos técnicos de presiones y amenazas en las áreas protegidas del Sistema de Parques Nacionales Naturales y en la gestión del riesgo de desastres naturales y contribuir en los análisis técnicos necesarios para la ejecución de acciones interagenciales.', 59731094, 1, '20201500000053', 1, NULL, 707, '2020-06-29', '2020-06-29'),
(5820, 'Prestar servicios profesionales y de apoyo a la gestión para la actualización de las Tablas de Retención Documental, de los procesos, procedimientos de archivo, control de registros y correspondencia, Así mismo los seguimientos al Plan de Acción del Modelo Integrado de Planeación y Gestión y al cumplimiento de los procesos de identificación, organización y depuración de los archivos de la Entidad y el seguimiento y control de los planes de mejoramiento de las metas relacionadas con el tema', 48686869, 1, '20204600000083', 1, NULL, 716, '2020-06-29', '2020-06-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cdps`
--

CREATE TABLE `cdps` (
  `id_cdp` int NOT NULL,
  `fecha` date NOT NULL,
  `codigo_rubro` varchar(45) DEFAULT NULL,
  `tipo` int NOT NULL,
  `observaciones` longtext,
  `cod_solicitud` int NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_cdp`),
  CONSTRAINT `fk_cdp_solicitud` FOREIGN KEY (`cod_solicitud`) REFERENCES `solicitudes`(`N_solCDP`)
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `cdps`
--

INSERT INTO `cdps` (`id_cdp`, `fecha`, `codigo_rubro`, `tipo`, `observaciones`, `cod_solicitud`, `updated_at`, `created_at`) VALUES
(2520, '2020-01-14', 'A-02-02-02-', 1, 'la observación nueva', 2520, '2020-06-26', '2020-06-23'),
(2620, '2020-01-14', 'A-02-02-02-001', 1, 'LILIANA ESPERANZA MURILLO MURILLO', 2620, '2020-06-26', '2020-06-26'),
(2720, '2020-01-14', 'A-02-02-02-001', 2, 'YURY CAMILA BARRANTES REYES', 2720, '2020-06-26', '2020-06-26'),
(2920, '2020-01-14', 'A-02-02-02', 2, NULL, 2920, '2020-06-26', '2020-06-26'),
(3020, '2020-01-14', 'A02-02-02- 01-003', 1, 'Se modificó el código -', 3020, '2020-06-25', '0000-00-00'),
(3120, '2020-01-14', 'A-02-02-02-008', 2, 'El de Nelson Cadena de GCO', 3120, '2020-06-25', '2020-06-25'),
(3220, '2020-01-14', 'A-02-02-02-001', 2, 'MARTHA PATRICIA LOPEZ PEREZ', 3220, '2020-06-26', '2020-06-26'),
(3920, '2020-01-14', 'A-02-02-02-001', 2, 'IVONNE LUCELLY LIEVANO NAVARRETE', 4020, '2020-06-26', '2020-06-26'),
(4120, '2020-01-14', 'A-02-02-02-001', 2, 'DANIEL ANDRES GAMBA HURTADO', 4220, '2020-06-26', '2020-06-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maas`
--

CREATE TABLE `maas` (
  `id_maa` int NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `maas`
--

INSERT INTO `maas` (`id_maa`, `nombre`) VALUES
(10, 'Misional'),
(20, 'Administrativo'),
(30, 'Apoyo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id_nivel` int NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id_nivel`, `nombre`) VALUES
(50, 'Asesor'),
(10, 'Directivo'),
(20, 'Profesional'),
(30, 'Tecnico'),
(40, 'Asistencial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `id_proceso` int NOT NULL,
  `num_proceso` varchar(50) NOT NULL,
  `modalidad` int NOT NULL,
  `abogado` int NOT NULL,
  `f_reparto` date DEFAULT NULL,
  `link` text,
  `cod_cdp` int NOT NULL,
  `estado` int NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_proceso`),
  CONSTRAINT `fk_procesos_cdp` FOREIGN KEY (`cod_cdp`) REFERENCES `cdps`(`id_cdp`) 
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`id_proceso`, `num_proceso`, `modalidad`, `abogado`, `f_reparto`, `link`, `cod_cdp`, `estado`, `updated_at`, `created_at`) VALUES
(1, 'CD-NC-002-2020', 200, 51717059, '2020-01-14', 'https://www.secop.gov.co/CO1BusinessLine/Tendering/BuyerWorkArea/Index?docUniqueIdentifier=CO1.BDOS.1038087&prevCtxUrl=https%3a%2f%2fwww.secop.gov.co%2fCO1BusinessLine%2fTendering%2fBuyerDossierWorkspace%2fIndex%3ffilteringState%3d0%26sortingState%3dLastModifiedDESC%26showAdvancedSearch%3dFalse%26showAdvancedSearchFields%3dFalse%26folderCode%3dALL%26selectedDossier%3dCO1.BDOS.1038087%26selectedRequest%3dCO1.REQ.1075204%26&prevCtxLbl=Procesos+de+la+Entidad+Estatal', 2520, 200, '2020-06-18', '2020-06-18'),
(2, 'CD-NC-001-2020', 200, 26421443, '2020-01-14', 'https://www.secop.gov.co/CO1BusinessLine/Tendering/BuyerWorkArea/Index?docUniqueIdentifier=CO1.BDOS.1038372&prevCtxUrl=https%3a%2f%2fwww.secop.gov.co%2fCO1BusinessLine%2fTendering%2fBuyerDossierWorkspace%2fIndex%3ffilteringState%3d0%26sortingState%3dLastModifiedDESC%26showAdvancedSearch%3dFalse%26showAdvancedSearchFields%3dFalse%26folderCode%3dALL%26selectedDossier%3dCO1.BDOS.1038372%26selectedRequest%3dCO1.REQ.1075078%26&prevCtxLbl=Procesos+de+la+Entidad+Estatal', 3020, 200, '2020-06-19', '2020-06-19'),
(3, 'CD-NC-003-2020', 200, 26421443, '2020-01-14', NULL, 3120, 200, '2020-06-26', '2020-06-26'),
(5, 'CD-NC-004-2020', 200, 51717059, '2020-01-14', 'https://www.secop.gov.co/CO1BusinessLine/Tendering/BuyerWorkArea/Index?docUniqueIdentifier=CO1.BDOS.1038200&prevCtxUrl=https%3a%2f%2fwww.secop.gov.co%2fCO1BusinessLine%2fTendering%2fBuyerDossierWorkspace%2fIndex%3ffilteringState%3d0%26sortingState%3dLastModifiedDESC%26showAdvancedSearch%3dFalse%26showAdvancedSearchFields%3dFalse%26folderCode%3dALL%26selectedDossier%3dCO1.BDOS.1038200%26selectedRequest%3dCO1.REQ.1075355%26&prevCtxLbl=Procesos+de+la+Entidad+Estatal', 2920, 200, '2020-06-26', '2020-06-26'),
(6, 'CD-NC-005-2020', 200, 26421443, '2020-01-14', NULL, 2720, 999, '2020-06-26', '2020-06-26'),
(7, 'CD-NC-006-2020', 200, 51717059, '2020-01-14', NULL, 2620, 200, '2020-06-26', '2020-06-26'),
(8, 'CD-NC-007-2020', 200, 51717059, '2020-01-14', NULL, 3220, 100, '2020-06-26', '2020-06-26'),
(9, 'CD-NC-008-2020', 200, 80073591, '2020-01-14', NULL, 4120, 100, '2020-06-26', '2020-06-26'),
(11, 'CD-NC-011-2020', 200, 93414563, '2020-01-14', NULL, 3920, 100, '2020-06-26', '2020-06-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id` double NOT NULL,
  `num_cto` text NOT NULL,
  `contratista` int NOT NULL,
  `f_susc` date DEFAULT NULL,
  `clase` text NOT NULL,
  `valor_mes` double UNSIGNED NOT NULL,
  `valor_total` double UNSIGNED NOT NULL,
  `obs_pago` text NOT NULL,
  `cod_dep` text NOT NULL,
  `plazo` int NOT NULL,
  `f_ini` date DEFAULT NULL,
  `f_fin` date DEFAULT NULL,
  `link` text NOT NULL,
  `expediente` text NOT NULL,
  `supervisor` text NOT NULL,
  `estado` int NOT NULL,
  `observaciones` longtext,
  `cod_proceso` int NOT NULL,
  `cod_maa` int NOT NULL,
  `cod_nivel` int NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
    CONSTRAINT `fk_contratos_procesos` FOREIGN KEY (`cod_proceso`) REFERENCES `procesos`(`id_proceso`) 
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id`, `num_cto`, `contratista`, `f_susc`, `clase`, `valor_mes`, `valor_total`, `obs_pago`, `cod_dep`, `plazo`, `f_ini`, `f_fin`, `link`, `expediente`, `supervisor`, `estado`, `observaciones`, `cod_proceso`, `cod_maa`, `cod_nivel`, `updated_at`, `created_at`) VALUES
(702020140001, 'CPS-001-2020', 53029037, '2020-01-14', 'PRESTACION DE SERVICIOS', 2663850, 30279095, 'pago mensual', 'Grupo de Contratos', 341, '2020-01-14', '2020-12-14', 'https://community.secop.gov.co/Public/Tendering/OpportunityDetail/Index?noticeUID=CO1.NTC.1038451&isFromPublicArea=True&isModal=False', '2020420501000001E', '1', 100, 'El contratista quiere suspender', 2, 20, 30, '2020-06-26', '2020-06-26'),
(702020140002, 'CPS-002-2020', 51889049, '2020-01-14', 'PRESTACION DE SERVICIOS', 5397388, 61350310, 'no', 'Grupo de Contratos', 341, '2020-01-14', '2020-12-24', 'https://community.secop.gov.co/Public/Tendering/OpportunityDetail/Index?noticeUID=CO1.NTC.1038479&isFromPublicArea=True&isModal=False', '2020420501000002E', '1', 100, 'no hay', 1, 20, 20, '2020-06-26', '2020-06-26'),
(702020140003, 'CPS-003-2020', 80073591, '2020-01-14', 'PRESTACION DE SERVICIOS', 5397388, 61350310, 'no', 'Grupo de Contratos', 341, '2020-01-14', '2020-12-24', 'https://community.secop.gov.co/Public/Tendering/OpportunityDetail/Index?noticeUID=CO1.NTC.1038361&isFromPublicArea=True&isModal=False', '2020420501000003E', '2', 100, NULL, 3, 20, 20, '2020-06-26', '2020-06-26'),
(702020140004, 'CPS-004-2020', 51760900, '2020-01-14', 'PRESTACION DE SERVICIOS', 3852124, 43015385, 'ninguna', 'Grupo de Contratos', 335, '2020-01-14', '2020-12-18', 'https://community.secop.gov.co/Public/Tendering/OpportunityDetail/Index?noticeUID=CO1.NTC.1038569&isFromPublicArea=True&isModal=False', '2020420501000004E', '2', 100, NULL, 7, 20, 20, '2020-06-27', '2020-06-27'),
(702020140007, 'CPS-007-2020', 93414563, '2020-01-15', 'PRESTACION DE SERVICIOS', 5397388, 60270833, 'NO HAY', 'Grupo de Contratos', 335, '2020-01-15', '2020-12-19', 'https://community.secop.gov.co/Public/Tendering/OpportunityDetail/Index?noticeUID=CO1.NTC.1038498&isFromPublicArea=True&isModal=False', '2020420501000007E', 'LEIDY VIVIANA SERRANO RAMOS', 100, NULL, 5, 10, 20, '2020-06-30', '2020-06-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos_has_cargos`
--

CREATE TABLE `contratos_has_cargos` (
  `cod_contrato` int NOT NULL,
  `cod_cargo` int NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos_has_personas`
--

CREATE TABLE `contratos_has_personas` (
  `cod_contrato` int NOT NULL,
  `cod_persona` int NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantias`
--

CREATE TABLE `garantias` (
  `id_garantia` int NOT NULL,
  `tipo_G` int DEFAULT NULL,
  `aseguradora` varchar(45) DEFAULT NULL,
  `fecha_exp` date DEFAULT NULL,
  `Num_anexo` int DEFAULT NULL,
  `f_aprobacion` varchar(45) DEFAULT NULL,
  `id_contrato` varchar(60) NOT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_garantia`)
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `garantias`
--

INSERT INTO `garantias` (`id_garantia`, `tipo_G`, `aseguradora`, `fecha_exp`, `Num_anexo`, `f_aprobacion`, `id_contrato`, `observaciones`, `updated_at`, `created_at`) VALUES
(2014895, NULL, 'JMALUCELLI TRAVELERS SEGUROS S.A', '2020-01-14', 0, '2020-01-14', 'CPS-002-2020', 'nueva', '2020-06-27', '2020-06-27'),
(2014896, NULL, 'JMALUCELLI TRAVELERS SEGUROS S.A', '2020-01-14', 0, '2020-01-14', 'CPS-001-2020', 'cambio el anexo', '2020-06-27', '2020-06-27'),
(2014899, NULL, 'JMALUCELLI TRAVELERS SEGUROS S.A', '2020-01-14', 0, '2020-01-14', 'CPS-003-2020', 'es nueva', '2020-06-27', '2020-06-27'),
(101000736, NULL, 'SEGUROS DEL ESTADO', '2020-01-14', 0, '2020-01-14', 'CPS-004-2020', 'nueva garantia', '2020-06-27', '2020-06-27'),
(101000748, NULL, 'SEGUROS DEL ESTADO', '2020-01-15', 0, '2020-01-15', 'CPS-004-2020', 'otra', '2020-06-27', '2020-06-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantias_has_riesgos`
--

CREATE TABLE `garantias_has_riesgos` (
  `cod_gar` int NOT NULL,
  `cod_riesgos` int NOT NULL
) ENGINE=InnoDB;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificaciones`
--

CREATE TABLE `modificaciones` (
  `id_modificacion` int NOT NULL,
  `tipo_mod` int NOT NULL,
  `f_susc` date DEFAULT NULL,
  `f_inicio` date DEFAULT NULL,
  `f_fin` date DEFAULT NULL,
  `duracion` int UNSIGNED NOT NULL,
  `categoria` int UNSIGNED NOT NULL,
  `num_modificacion` varchar(255) DEFAULT NULL,
  `valor_adicionado` double UNSIGNED NOT NULL,
  `observaciones` text NOT NULL,
  `f_terminacion` date DEFAULT NULL,
  `plazo_total` int NOT NULL,
  `valor_total` double UNSIGNED NOT NULL,
  `obs_pago` text NOT NULL,
  `cod_contrato` douclbe NOT NULL,
  	PRIMARY KEY (`id_modificacion`),
    CONSTRAINT `fk_modificaciones_contratos` FOREIGN KEY (`cod_contrato`) REFERENCES `contratos`(`id`) 
) ENGINE=InnoDB;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int NOT NULL,
  `f_pago` date DEFAULT NULL,
  `valor_pago` double UNSIGNED NOT NULL,
  `valor_saldo` double UNSIGNED NOT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `cod_contrato` double NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_pago`),
  CONSTRAINT `fk_pago_contrato` FOREIGN KEY (`cod_contrato`) REFERENCES `contratos`(`id`) 
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `f_pago`, `valor_pago`, `valor_saldo`, `observaciones`, `cod_contrato`, `updated_at`, `created_at`) VALUES
(1, '2020-02-05', 1509515, 28769580, 'primero', 6, '2020-06-27', '2020-06-27'),
(2, '2020-02-05', 3058520, 58291790, NULL, 7, '2020-06-27', '2020-06-27'),
(3, '2020-02-05', 1500000, 25500000, 'PAGO COMPLETO', 8, '2020-06-27', '2020-06-27'),
(4, '2020-03-06', 1509515, 25603000, 'NUM APROBACION COMPLETO', 7, '2020-06-27', '2020-06-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` text NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('luzyadirac@gmail.com', '$2y$10$ug4F5fPjbGRZGQ45i51qC.A/TJSabYkoiVz82VPTfEHl1VvPKIw0G', '2020-06-30 05:16:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int NOT NULL,
  `documento` int NOT NULL,
  `tipo_documento` varchar(5) DEFAULT NULL,
  `Nombres` varchar(45) DEFAULT NULL,
  `Apellidos` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `fecha_nac` varchar(45) DEFAULT NULL,
  `correo_p` varchar(45) DEFAULT NULL,
  `correo_I` varchar(45) DEFAULT NULL,
  `profesion` varchar(45) DEFAULT NULL,
  `formacion` varchar(45) DEFAULT NULL,
  `experiencia` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `hv_sigep` varchar(45) DEFAULT NULL,
  `clase` varchar(45) DEFAULT NULL,
  `observaciones` longtext,
  `cod_cargo` int DEFAULT NULL,
  `cod_arl` int DEFAULT NULL,
  `cod_contrato` int DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
   PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `documento`, `tipo_documento`, `Nombres`, `Apellidos`, `Telefono`, `genero`, `fecha_nac`, `correo_p`, `correo_I`, `profesion`, `formacion`, `experiencia`, `estado`, `hv_sigep`, `clase`, `observaciones`, `cod_cargo`, `cod_arl`, `cod_contrato`, `updated_at`, `created_at`) VALUES
(427735, 427735, '3', 'EMANUELE', 'VIRZI', '3203135896', '1', '6/12/1985', 'emanuele.virzi.arch@gmail.com', NULL, 'ARQUITECTO', 'MAESTRIA', '11A-10M-19D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(5207802, 5207802, '3', 'CAMILO ERNESTO', 'ERAZO OBANDO', '3162978447', '1', '8/03/1980', 'agrofcamilo@gmail.com', NULL, 'INGENIERO AGROFORESTAL', 'PROFESIONAL', '17A-2M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(8643040, 8643040, '3', 'LEONARDO FABIO', 'AHUMADA VILORA', '3007150911', '1', '6/11/1977', 'leonard_a_v77@hotmail.com', NULL, 'ARQUITECTO', 'PROFESIONAL', '13A-1M-7D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(9930291, 9930291, '3', 'JAMES AUGUSTO', 'MONTEALEGRE GALEANO', '3006568991', '1', '11/10/1983', 'salentointeractivo@gmail.com', NULL, 'PROFESIONAL EN PUBLICIDAD Y MERCADEO', 'PROFESIONAL', '11A-10M-13D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(10004569, 10004569, '3', 'JUAN MANUEL', 'GARCIA CAMPO', '3137359301', '2', '16/11/1977', 'ingenierojuanmanuelgarcia@gmail.com', NULL, 'INGENIERO AMBIENTAL', 'PROFESIONAL', '14A-6M-7D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(10177526, 10177526, '3', 'JOSE DEL CARMEN', 'HERRERA TOVAR', '3107691567', '1', '10/05/1971', 'jose.2004@hotmail.com', NULL, 'ECONOMISTA', 'ESPECIALIZACI', '18A-7M-1D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(12189558, 12189558, '3', 'LUIS ERNESTO', 'PARGA CERON', '3103022456', '1', '16/08/1962', 'luchoparga62@gmail.com', NULL, 'TECNICO EN ELECTRONICA Y TELECOMUNICACIONES', 'TECNICO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(13544993, 13544993, '3', 'HENRY OMAR AUGUSTO', 'CASTELLANOS QUIROZ', '3114535917', '1', '30/09/1978', 'henrycasquif@gmail.com', NULL, 'INGENIERO FORESTAL', 'MAESTRIA', '17A-3M-9D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(16072644, 16072644, '3', 'ALEJANDRO', 'TAMAYO MONTOYA', '3137508266', '1', '29/09/1982', 'alejotamayom@gmail.com', NULL, 'COMINICADOR SOCIAL Y PERIODISTA', 'ESPECIALIZACI', '8A-5M-24D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(16621849, 16621849, '3', 'CESAR', 'MURILLO BOHORQUEZ', '3138776256', '1', '13/02/1959', 'cesarmuri@gmail.com', NULL, 'BIOLOGO', 'PROFESIONAL', '33A-6M-2D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(16709168, 16709168, '3', 'JAIME', 'VASQUEZ RUIZ ', '3117850763', '1', '24/05/1963', 'javasquezruiz@gmail.com', NULL, 'BIOLOGO CON ENFANSIS EN MARINA', 'ESPECIALIZACI', '19A-10M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(16936850, 16936850, '3', 'FRANCISCO ANDRES', 'CEDIEL PEDRAZA', '3117484895', '1', '16/12/1981', 'proyectosfcediel@gmail.com', NULL, 'TECNICO PROFESIONAL EN COMUNICACION SOCIAL Y ', 'TECNICO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(19311119, 19311119, '3', 'MANUEL ANTONIO', 'MALDONADO DUE', '3204767816', '1', '12/03/1955', 'mmaldona03@gmail.com', NULL, 'INGENIERO INDUSTRIAL', 'PROFESIONAL', '28A-2M-12D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(20401109, 20401109, '3', 'NATALIA', 'JIMENEZ GALINDO', '3045841930', '2', '3/09/1983', 'natalia.jimenez4@gmail.com', NULL, 'ABOGADA', 'PROFESIONAL', '11A-4M-8D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(20568316, 20568316, '3', 'YOLANDA BERNAL', 'BERNAL JIMENEZ', '3013356056', '2', '16/06/1956', 'yoliber_j@hotmail.com', NULL, 'CONTADORA PUBLICA', 'ESPECIALIZACI', '28A-5M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(24081439, 24081439, '3', 'YOLANDA', 'RIVERA HERNANDEZ', '3123871389', '2', '23/11/1979', 'yoriher01@gmail.com', NULL, 'TECNICO PROFESIONAL EN MERCADEO', 'TECNICO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(26203047, 26203047, '3', 'CLAUDIA PATRICIA', 'BERROCAL CONDE ', '3209498171', '2', '30/04/1984', 'claudia1brrocal@hotmail.com', NULL, 'INGENIERA DE SISTEMAS', 'ESPECIALIZACI', '31M-25D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(27080661, 27080661, '3', 'DAIRA EMILCE', 'RECALDE RODRIGUEZ', '3158858007', '2', '21/05/1977', 'dairaagrof@gmail.com', NULL, 'INGENIERA AGROFORESTAL', 'PROFESIONAL', '16A-15D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(28049312, 28049312, '3', 'BETSY VIVIANA', 'RODRIGUEZ CABEZA', '3125766242', '2', '13/01/1980', 'betsyviviana@gmail.com', NULL, 'BIOLOGA', 'MAESTRIA', '13A-6M-8D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(28541768, 28541768, '3', 'MARLEY', 'ROJAS GUTIERREZ', '3102029176', '2', '10/04/1979', 'ingmarleyrojas@gmail.com', NULL, 'INGENIERA CIVIL', 'MAESTRIA', '12A-5M-2D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(28549107, 28549107, '3', 'SHIARA VANESSA', 'VELASQUEZ MENDEZ', '3188312285', '2', '2/12/1979', 'siarav79@gmail.com', NULL, 'ECONOMISTA', 'ESPECIALIZACI', '17A-8D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(29659231, 29659231, '3', 'OLGA LUCIA', 'CASA', '3114812379', '2', '10/04/1979', 'olga.casanas@gmail.com', NULL, 'BIOLOGA', 'MAESTRIA', '17A-11M-23D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(32258613, 32258613, '3', 'MARIA FERNANDA', 'BATISTA MORALES', '3015509231', '2', '9/05/1982', 'mfbatistam@gmail.com', NULL, 'INGENIERA GEOGRAFA Y AMBIENTAL', 'MAESTRIA', '7A-1M-19D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(33700575, 33700575, '3', 'JOHANNA MARIA', 'PUENTES AGUILAR', '3042138877', '2', '31/10/1980', 'johanna.restauracion@gmail.com', NULL, 'BIOLOGA', 'ESPECIALIZACI', '16A-3M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(34066254, 34066254, '3', 'LILIANA ', 'QUIROGA VILLADA', '3146304994', '2', '16/06/1985', 'iafliliana@gmail.com', NULL, 'ADMINISTRADORA AMBIENTAL', 'PROFESIONAL', '11A-4M-1D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(34321413, 34321413, '3', 'VIVIANA', 'MORENO QUINTERO', '3117297823', '2', '16/05/1983', 'vivianamoreno@gmail.com', NULL, 'BIOLOGA', 'ESPECIALIZACI', '9A-9M-25D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(35197846, 35197846, '3', 'DIANA STELLA', 'ARDILA VARGAS', '3118099143', '2', '19/10/1981', 'ardila_vargas@yahoo.es', NULL, 'BIOLOGA', 'MAESTRIA', '15A-4M-26D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(35262290, 35262290, '3', 'ANA MARIA', 'ROCHA PACHECO', '3106256627', '2', '13/01/1980', 'anyrocha@gmail.com', NULL, 'PUBLICISTA', 'PROFESIONAL', '8A-9M-2D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(35420696, 35420696, '3', 'CLAUDIA MARCELA', 'TORRES TORRES', '3118291326', '2', '31/10/1977', 'claudiamarcelat926@gmail.com', NULL, 'ADMINISTRADOR DE EMPRESAS', 'ESPECIALIZACI', '18A-10D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(35468118, 35468118, '3', 'NURY JEANNETH', 'GUIOTT RIANO', '3115064642', '2', '7/11/1958', 'jeanneth.guiottriao@gmail.com', NULL, 'BACHILLER', 'BACHILLER', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(35523975, 35523975, '3', 'OLGA LUCIA', 'PI', '3133966761', '2', '23/08/1971', 'pinerosamin@gmail.com', NULL, 'ABOGADA', 'ESPECIALIZACI', '22A-1M-9D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(35530986, 35530986, '3', 'PAULA ANDREA', 'MOJICA MEDELLIN', '3124505253', '2', '28/03/1979', 'pammedellin1@gmail.com', NULL, 'ARQUITECTA', 'PROFESIONAL', '17A-9M-14D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(36862774, 36862774, '3', 'AMELIA CAROLINA', 'CHALAPUD NOGUERA', '3183427829', '2', '18/01/1986', 'ameliachala@hotmail.com', NULL, 'ABOGADA', 'ESPECIALIZACI', '10A-2M-21D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(37547431, 37547431, '3', 'CARMEN CONSTANZA', 'ATUESTA', '3212007573', '2', '20/09/1977', 'constanzaatuesta@gmail.com', NULL, 'ABOGADA', 'ESPECIALIZACI', '18A-6M-2D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(37899919, 37899919, '3', 'ALBA LILIANA', 'GUALDRON DIAZ', '3012432458', '2', '14/04/1982', 'lgualdron.pnn@gmail.com', NULL, 'INGENIERA FORESTAL', 'ESPECIALIZACI', '12A-3M-13D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(40023756, 40023756, '3', 'MARTA CECILIA', 'DIAZ LEGUIZAMON', '3107626615', '2', '12/04/1966', 'diazmartac@gmail.com', NULL, 'BIOLOGA', 'ESPECIALIZACI', '26A-9M-21D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(41360693, 41360693, '3', 'ELSSYE MARIETH', 'MORALES DE ALCALA', '8606268', '2', '28/08/1946', 'dealcala@gmail.com', NULL, 'ARQUITECTA', 'ESPECIALIZACI', '48A-4M-24D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(41767903, 41767903, '3', 'MARTHA INES', 'FERNANDEZ PACHECO', '3002895754', '2', '14/07/1957', 'fernandezpacheco@yahoo.com', NULL, 'CONTADORA PUBLICA', 'ESPECIALIZACI', '35A-8M-6D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(41946514, 41946514, '3', 'CAROLINA', 'CARAMILLO RESTREPO', '3174291911', '2', '9/04/1980', 'carojarestrepo@hotmail.com', NULL, 'ABOGADA', 'ESPECIALIZACI', '14A-7M-5D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(43035809, 43035809, '3', 'MARTHA PATRICIA', 'LOPEZ PEREZ', '3183591375', '2', '1962-04-25', 'marthalopezbogota@hotmail.com', NULL, 'ABOGADA', 'Especializacion', '25A-29D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '2020-06-26', '2020-06-26'),
(46384587, 46384587, '3', 'ADRIANA LORENA', 'BERNAL FONSECA', '3014140594', '2', '26/11/1983', 'adrilore@gmail.com', NULL, 'INGENIERA SANITARIA Y AMBIENTAL', 'ESPECIALIZACI', '13A-1M-23D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(46385689, 46385689, '3', 'CLAUDIA PATRICIA', 'OLMOS CUESTO', '3145297643', '2', '4/09/1984', 'olmoscuesto@gmail.com', NULL, 'ANTROPOLOGA', 'ESPECIALIZACI', '9A-11M-5D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(46669762, 46669762, '3', 'SANDRA YANETH', 'PEREZ SALAZAR', '3118081477', '2', '2/01/1974', 'sandraperez39@gmail.com', NULL, 'ADMINISTRADORA DE EMPRESAS', 'PROFESIONAL', '18A-6M-19D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(51748041, 51748041, '3', 'MARTHA CECILIA', 'MARQUEZ DIAZ', '2693706', '2', '13/10/1964', 'cme20_24@yahoo.com', NULL, 'PSICOLOGA', 'PROFESIONAL', '31A-15D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(51760900, 51760900, '3', 'LILIANA ESPERANZA', 'MURILLO MURILLO', '3124901175', '2', '1963-09-25', 'lilianamurillom@gmail.com', NULL, 'ABOGADA', 'Profesional', '28A-8M-11D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '2020-06-26', '2020-06-26'),
(51838162, 51838162, '3', 'LILIAN BIBIAN', 'ROJAS MEJIA', '3202196706', '2', '26/07/1966', 'lbrojasmejia@gmail.com', NULL, 'ABOGADA', 'ESPECIALIZACI', '25A-2M-3D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(51889049, 51889049, '3', 'LUZ JANETH', 'VILLALBA SUAREZ', '3138133462', '2', '1967-12-19', 'luzjanethv@gmail.com', NULL, NULL, 'Especializacion', '14A-4M', '10', '123', 'Contratista', NULL, NULL, NULL, NULL, '2020-06-27', '2020-06-26'),
(51984445, 51984445, '3', 'PILAR ', 'LEMUS ESPINOSA', '3112067559', '2', '1/04/1969', 'pilar.lemus.e@gmail.com', NULL, 'PSICOLOGA', 'MAESTRIA', '25A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(51985434, 51985434, '3', 'ANAMARIA', 'FUENTES BACA', '3134109498', '2', '28/10/1969', 'anamariafuentes@yahoo.com', NULL, 'INGENIERA AGRONOMA', 'PROFESIONAL', '22A-5M-25D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52018404, 52018404, '3', 'CLAUDIA CECILIA', 'PINTO CHACON ', '3012743911', '2', '20/01/1969', 'claudiap90@gmail.com', NULL, 'TENICO EN SISTEMAS', 'TECNICO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52072983, 52072983, '3', 'NUBIA STELLA', 'MOSQUERA QUILINDO', '3102622167', '2', '20/03/1972', 'nubia1972@gmail.com', NULL, 'ADMINISTRADOR DE EMPRESAS', 'PROFESIONAL', '1A-1M-28D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52079909, 52079909, '3', 'ANGELA SOFIA', 'RINCON SOLER ', '3176394', '2', '7/05/1970', 'asrinconqyahoo.com', NULL, 'ANTROPOLOGA', 'PROFESIONAL', '24A-10M-10D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52087086, 52087086, '3', 'LINA MARIA ', 'PELAEZ CORTES', '3102338793', '2', '2/08/1977', 'limapeco@gmail.com', NULL, 'MEDICA VETERINARIA', 'MAESTRIA', '16A-4M-25D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52151242, 52151242, '3', 'FANNY', 'SUAREZ VELASQUEZ ', '3532400', '2', '15/06/1974', 'fanny.suarez@parquesnacionales.gov.co', NULL, 'COMUNICADORA SOCIAL PERIODISTA', 'ESPECIALIZACI', '22A-7M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52154763, 52154763, '3', 'CAROLINA DEL ROSARIO', 'CUBILLOS ORTIZ', '3105540733', '2', '28/08/1973', 'carolinacubillosortiz@gmail.com', NULL, 'ADMINISTRADORA DE EMPRESAS TURISTICAS Y HOTEL', 'MAESTRIA', '22A-1M-12D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52223650, 52223650, '3', 'ALBA KARINA', 'MORALES SALAZAR', '3214118322', '2', '30/08/1974', 'karina.morales60@gmail.com', NULL, 'ADMINISTRADORA DE EMPRESAS TURISTICAS Y HOTEL', 'PROFESIONAL', '13A-5M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52249482, 52249482, '3', 'DALIA MARCELA', 'ALVEAR PACHECO', '3057137416', '2', '19/04/1977', 'malvearp@gmail.com', NULL, 'BIOLOGA', 'MAESTRIA', '19A-4M-9D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52268711, 52268711, '3', 'ALEJANDRA MILENA', 'CHAVES GARCIA', '3002200341', '2', '20/03/1977', 'amchavezg@gmail.com', NULL, 'PSICOLOGA', 'ESPECIALIZACI', '19A-6M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52269310, 52269310, '3', 'EVELYN PAOLA', 'MORENO NIETO', '3152226996', '2', '13/04/1977', 'evelyn_eco@yahoo.com', NULL, 'ECOLOGA', 'MAESTRIA', '18A-6M-22D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52277869, 52277869, '3', 'JAZMIN ANGELICA', 'RICO HERNANDEZ', '3216219960', '2', '12/01/1976', 'arico2013@gmail.com', NULL, 'TECNICO EN ARCHIVISTICA', 'TECNICO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52282872, 52282872, '3', 'DIANA CAROLINA', 'OVIEDO LEON', '3015039147', '2', '18/05/1977', 'carolinaoviedoleon@gmail.com', NULL, 'TRABAJADORA SOCIAL', 'MAESTRIA', '23A-1M-26D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52312202, 52312202, '3', 'CLARA ROCIO', 'BURGOS VALENCIA', '3044970', '2', '14/11/1975', 'clara.rocio.30@gmail.com', NULL, 'ADMINISTRADORA HOTELERA', 'PROFESIONAL', '21A-8M-15D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52344116, 52344116, '3', 'CAMILA', 'ROMERO CHICA', '3118539675', '2', '16/05/1976', 'camilachica@hotmail.com', NULL, 'BIOLOGA MARINA', 'ESPECIALIZACI', '9A-8M-27D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52347683, 52347683, '3', 'LUISA FERNANDA', 'MALDONADO MORALES', '3164695088', '2', '30/01/1977', 'luisa.fda.maldonado@gmail.com', NULL, 'BIOLOGA MARINA', 'PROFESIONAL', '16A-1M-16D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52414077, 52414077, '3', 'DIANA FERNANDA', 'DEL PINO BUSTOS', '3143568754', '2', '27/07/1976', 'fernasoluna@gmail.com', NULL, 'BIOLOGA', 'PROFESIONAL', '13A-10M-12D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52419515, 52419515, '3', 'OLGA LUCIA', 'CHAVARRO VASQUEZ', '3103343535', '2', '23/04/1977', 'olucicha@hotmail.com', NULL, 'INGENIERA INDUSTRIAL', 'ESPECIALIZACI', '18A-4M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52440992, 52440992, '3', 'JOHANA MILENA', 'VALBUENA VELANDIA', '3114581641', '2', '18/08/1978', 'joa.biomar@gmail.com', NULL, 'BIOLOGA MARINA', 'PROFESIONAL', '16A-2M-26D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52468918, 52468918, '3', 'DORIS JOHANNA', 'GUZMAN PARRA', '3155955545', '2', '14/10/1980', 'djoisguzman@gmail.com', NULL, 'INGENIERA DE SISTEMAS', 'ESPECIALIZACI', '9A-7M-6D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52487485, 52487485, '3', 'CAROLINA', 'MATEUS GUTIERREZ', '3153407489', '2', '15/10/1980', 'cnateusg@gmail.com', NULL, 'BIOLOGA', 'MAESTRIA', '14A-9M-8D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52490210, 52490210, '3', 'CLAUDIA MARCELA', 'MORA CASTRO ', '3103841380', '2', '7/10/1977', 'marcelamoracastro@gmail.com', NULL, 'TECNICO LABORAL EN SECRETARIADO ASISTENCIAL D', 'TECNICO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52498362, 52498362, '3', 'LINA MARIA', 'CARDONA MARIN', '7060002', '2', '26/07/1979', 'lina.cardona@gmail.com', NULL, 'INGENIERA CATASTRAL Y GEODESTA', 'ESPECIALIZACI', '14A-2M-14D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52539990, 52539990, '3', 'LIBIA ANDREA', 'BUITRAGO MARTINEZ', '5213425', '2', '28/10/1979', 'andrebuitrago@gmail.com', NULL, 'TECNICO PROFESIONAL EN CIENCIAS DE LA COMPUTA', 'TECNICO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52583366, 52583366, '3', 'MARIA CAROLINA', 'DUARTE TRIVI', '3118718215', '2', '29/04/1971', 'marcarolinaduarte@gmail.com', NULL, 'ABOGADA', 'ESPECIALIZACI', '20A-10M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52706880, 52706880, '3', 'AURA MARIA', 'DUARTE ROJAS', '3205774704', '2', '8/03/1980', 'auraduarte38@gmail.com', NULL, 'MEDICA VETERINARIA Y ZOOTECNISTA', 'MAESTRIA', '12A-4M-2D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52707947, 52707947, '3', 'ROCIO ANDREA', 'BARRERO RAMIREZ', '3478264', '2', '26/05/1980', 'abarreroramirez@gmail.com', NULL, 'ECONOMISTA', 'ESPECIALIZACI', '16A-10M-20D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52708409, 52708409, '3', 'LUISA PATRICIA', 'CORREDOR GIL', '7646357', '2', '22/06/1980', 'luisacorredor@gmail.com', NULL, 'INGENIERA FORESTAL', 'ESPECIALIZACI', '15A-3M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52718992, 52718992, '3', 'IVONNE LUCELLY', 'LIEVANO NAVERRETE', '3166963408', '2', '11/01/1981', 'ivonnelucel@gmail.com', NULL, 'INGENIERA FORESTAL', 'ESPECIALIZACI', '51M-5D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52764997, 52764997, '3', 'HERLY', 'GARCIA DUARTE', '3118982665', '2', '24/07/1979', 'herlyg@yahoo.com', NULL, 'CONTADORA PUBLICA', 'ESPECIALIZACI', '16A-4M-26D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52785272, 52785272, '3', 'STHER ALICIA CAROLINA', 'VIVAS ZAPATA', '3183604806', '2', '30/07/1982', 'a.c.vivas.z@gmail.com', NULL, 'INGENIERA AMBIENTAL', 'ESPECIALIZACI', '13A-5M-16D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52794362, 52794362, '3', 'ADRIANA MARIA', 'CAMPO SANCHEZ', '6603526', '2', '26/09/1981', 'nanitacampo@hotmail.com', NULL, 'CONTADORA PUBLICA', 'ESPECIALIZACI', '13A-5M-29D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52812499, 52812499, '3', 'JOHANNA LIZETH', 'DIAZ POVEDA', '3134180735', '2', '26/09/1982', 'forest4thesoul@gmail.com', NULL, 'INGENIERA FORESTAL', 'PROFESIONAL', '10A-1M-14D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52818253, 52818253, '3', 'AMERICA YADIRA', 'MONGE ROMERO', '3204584681', '2', '19/04/1984', 'amemonge@gmail.com', NULL, 'INGENIERA FORESTAL', 'MAESTRIA', '11A-8M-28D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52867613, 52867613, '3', 'LUZ AYDA', 'CASTRO TRIANA', '3208000984', '2', '26/07/1982', 'luzcastro@gmail.com', NULL, 'ECOLOGA', 'PROFESIONAL', '13A-1M-21D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52896623, 52896623, '3', 'LUZ DARY', 'GONZALEZ MU', '8123442', '2', '26/11/1981', 'luzdary.gonzalezm@gmail.com', NULL, 'ADMINISTRADOR DE EMPRESAS', 'PROFESIONAL', '13A-8M-24D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52933829, 52933829, '3', 'MARIA JULIANA', 'HOYOS MONCAYO ', '3233460109', '2', '18/02/1983', 'mariajulianahoyos@gmail.com', NULL, 'PUBLICISTA', 'ESPECIALIZACI', '14A-4M-14D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52976308, 52976308, '3', 'GINA XIMENA', 'DEVIA WILCHES', '3114120511', '2', '17/10/1983', 'ximenadeviaw@gmail.com', NULL, 'BACHILLER', 'BACHILLER', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(52991749, 52991749, '3', 'NATALIA', 'ALVARINO CAIPA', '3008981047', '2', '2/02/1983', 'natalia.alvarino@hotmail.com', NULL, 'INGENIERA AMBIENTAL', 'ESPECIALIZACI', '11A-6M-6D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(53029037, 53029037, '1', 'SANDRA LILIANA', 'CHAVES CLAVIJO', '3006812637', '1', '1984-12-04', 'sandracadc@gmail.com', NULL, 'TECNICO EN RECURSOS HUMANOS', 'Bachiller', '0-0-0', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '2020-06-26', '2020-06-26'),
(53049305, 53049305, '3', 'MONICA MARCELA', 'GARZON RINCON', '3112106075', '2', '11/04/1985', 'mariposailustra@gmail.com', NULL, 'DISE', 'PROFESIONAL', '8A-9M-5D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(53070993, 53070993, '3', 'ANDREA JOHANNA', 'TORRES SUAREZ', '3203524690', '2', '31/12/1985', 'andretorsua@gmail.com', NULL, 'ABOGADA', 'PROFESIONAL', '5M-16D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(53090982, 53090982, '3', 'KIMBERLY JOHANNA', 'MORRIS RODRIGUEZ', '3193801693', '2', '22/09/1984', 'kymymorris@gmail.com', NULL, 'ADMINSTRADORA AMBIENTAL Y DE LOS RECURSOS NAT', 'PROFESIONAL', '12M-24D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(53139862, 53139862, '3', 'ANGELA MARIA', 'CASTA', '3175387475', '2', '21/02/1985', 'gycingenieria@gmail.com', NULL, 'INGENIERA TOPOGRAFICA', 'PROFESIONAL', '7A-7M-8D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(53154411, 53154411, '3', 'YURY MERCEDES', 'ARENAS RINCON', '3155846167', '2', '14/08/1985', 'yuryarenas@hotmail.com', NULL, 'ABOGADA', 'ESPECIALIZACI', '7A-1M-21D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(53911075, 53911075, '3', 'DIANA MARCELA', 'CLAVIJO TELLEZ', '3144556212', '2', '13/01/1985', 'diana.clavijo2013@gmail.com', NULL, 'ABOGADA', 'ESPECIALIZACI', '9A-11M-16D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(57462775, 57462775, '3', 'YIRA NATALI', 'DIAZ MENDOZA', '3177887358', '2', '14/10/1984', 'yiranataly14@gmail.com', NULL, 'LICENCIADA EN BIOLOGIA', 'PROFESIONAL', '8A-7M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(60385469, 60385469, '3', 'MARIA DEL CARMEN', 'MONCADA ROSERO', '3186234965', '2', '1/02/1978', 'marujita0154@gmail.com', NULL, 'CONTADORA PUBLICA', 'PROFESIONAL', '42M-17D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(63546810, 63546810, '3', 'MONICA ROSANIA', 'SANDOVAL ARAQUE ', '3507675579', '2', '13/01/1984', 'rosaniasandoval@gmail.com', NULL, 'MICROBIOLOGA', 'PROFESIONAL', '12A-1M-27D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(65586489, 65586489, '3', 'SANDRA CECILIA', 'LOZANO OYUELA', '3175052182', '2', '12/11/1968', 'sandraloz@hotmail.es', NULL, 'CONTADORA PUBLICA', 'PROFESIONAL', '14A-1M-6D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(65784202, 65784202, '3', 'JENNY ALEJANDRA', 'MARTINEZ CORTES', '3108420973', '2', '21/02/1979', 'jalemarco@yahoo.com', NULL, 'INGENIERIA FORESTAL', 'ESPECIALIZACI', '17A-10M-15D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(66977880, 66977880, '3', 'DORA ELENA', 'ESTRADA GARZON', '3187664592', '2', '7/05/1976', 'dlnaeg@gmail.com', NULL, 'INGENIERA TOPOGRAFICA', 'ESPECIALIZACI', '18A-11M-9D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(74371263, 74371263, '3', 'PAULO ANDRES', 'PACHECHO ZABALA', '3003869627', '1', '20/07/1976', 'paulo.pacheco@parquesnacionales.gov.co', NULL, 'INGENIERO CIVIL', 'ESPECIALIZACI', '16A-3M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(75067847, 75067847, '3', 'JORGE WILLIAM', 'JARAMILLO', '3107872079', '1', '28/06/1972', 'jowija@icloud.com', NULL, 'INGENIERO CIVIL', 'ESPECIALIZACI', '19A-6M-10D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(75086969, 75086969, '3', 'MIGUEL ORLANDO', 'BENAVIDES PENAGOS', '3103347801', '1', '3/04/1978', 'miguel.o.benavidesp@gmail.com', NULL, 'COSNTRUCTOR Y GESTOR EN ARQUITECTURA', 'ESPECIALIZACI', '6A-1M-10D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79139548, 79139548, '3', 'RODRIGO ALEJANDRO', 'DURAN BAHAMON', '3112364765', '1', '10/10/1972', 'rodrigoduranbahamon@gmail.com', NULL, 'COMUNICADOR SOCIAL PERIODISTA', 'PROFESIONAL', '24A-8M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79144699, 79144699, '3', 'MANUEL JESUS', 'MEDINA CHAVARRO', '3126137317', '1', '22/05/1955', 'mjmedi@gmail.com', NULL, 'BACHILLER', 'BACHILLER', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79284835, 79284835, '3', 'GERMAN ALBERTO', 'ANGEL BERRIO', '3143251776', '1', '8/03/1963', 'germanalberto08@gmail.com', NULL, 'ZOOTECNISTA', 'PROFESIONAL', '30A-8M-25D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79293510, 79293510, '3', 'HERMES ORLANDO', 'GARCIA ARDILA', '3132118015', '1', '12/10/1963', 'orlandogarciaardila@gmail.com', NULL, 'PROFESIONAL EN SALUD OCUPACIONAL', 'ESPECIALIZACI', '14A-9M-9D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79368519, 79368519, '3', 'OSCAR', 'MU', '3114568261', '1', '24/12/1965', 'oscamuoz65@gmail.com', NULL, 'TECNOLOGO EN MANTENIMIENTO ELECTRICO INDUSTRI', 'TECNOLOGO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79379515, 79379515, '3', 'JAIRO', 'GARCIA RUIZ', '3503384085', '1', '26/11/1965', 'jairorestauracion@gmail.com', NULL, 'INGENIERO AGRONOMICO', 'PROFESIONAL', '26A-6M-7D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79396673, 79396673, '3', 'RICARDO ALFONSO', 'REINA QUIROGA', '7006732', '1', '15/02/1964', 'rarqlost@hotmail.com', NULL, 'BIOLOGO', 'PROFESIONAL', '27A-10M-29D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79532167, 79532167, '3', 'CAMILO ERNESTO', 'VINCHIRA', '3002159322', '1', '28/08/1970', 'cevincharap@gmail.com', NULL, 'ADMINISTRADOR DE EMPRESAS AGROPECUARIAS', 'ESPECIALIZACI', '21A-2M-8D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79590259, 79590259, '3', 'JUAN CARLOS', 'CUERVO LEON', '3115426865', '2', '16/12/1971', 'jccdes@gmail.com', NULL, 'DISE', 'PROFESIONAL', '25A-3M-10D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79600811, 79600811, '3', 'ANDRES FERNANDO', 'LIZARAZO LOPEZ', '3212010567', '1', '25/05/1973', 'andrescam86@hotmail.com', NULL, 'ECONOMISTA', 'ESPECIALIZACI', '24A-7M-20D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79651317, 79651317, '3', 'JEAMMY GUSTAVO', 'CASTRO MURILLO', '3504809790', '1', '24/12/1972', 'gustavoe2267@gmail.com', NULL, 'BACHILLER', 'BACHILLER', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79657592, 79657592, '3', 'ENRIQUE HARLEY', 'CANO MORENO', '2093880', '1', '4/09/1972', 'harry19720904@hotmail.com', NULL, 'BACHILLER', 'BACHILLER', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79726173, 79726173, '3', 'DIEGO LOMBANA', 'LOMABA JEREZ', '3108775951', '1', '8/11/1978', 'dlombanajerez@gmail.com', NULL, 'INGENIERO TOPOGRAFO', 'ESPECIALIZACI', '13A-21D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79771679, 79771679, '3', 'EMERSON', 'CRUZ ALDANA', '3219213134', '1', '1/01/1979', 'emersoncruza@gmail.com', NULL, 'INGENIERO DE SISTEMAS', 'PROFESIONAL', '3A-7M-25D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79781725, 79781725, '3', 'ANDRES EDUARDO', 'VELASQUEZ RODRIGUEZ ', '3115437641', '1', '20/05/1975', 'aevelasquezv@gmail.com', NULL, 'ABOGADO', 'ESPECIALIZACI', '18A-3M-12D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79806408, 79806408, '3', 'FABIAN ENRIQUE', 'CASTRO VARGAS', '3102929925', '1', '23/08/1976', 'fecastro@gmail.com', NULL, 'SISTEMAS DE INFORMACION BIBLIOTECOLOGIA Y ARC', 'PROFESIONAL', '8A-7M-11D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79850133, 79850133, '3', 'HERNAN YECID', 'BARBOSA CAMARGO', '3002139086', '1', '15/06/1976', 'herybac@gmail.com', NULL, 'INGENIERO FORESTAL', 'ESPECIALIZACI', '14A-7M-7D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79881484, 79881484, '3', 'IVAN ANDRES', 'POSADA CESPEDES', '3006909776', '1', '10/12/1979', 'ivanforestal@gmail.com', NULL, 'INGENIERO FORESTAL', 'PROFESIONAL', '12A-3M-13D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79896417, 79896417, '3', 'JUAN CARLOS', 'RONCANCIO RONCANCIO', '3118349754', '2', '3/07/1978', 'juanchorr27@yahoo.es', NULL, 'INGENIERO ELECTRICISTA', 'ESPECIALIZACI', '14A-1M-11D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79903349, 79903349, '3', 'FABIAN GUILLERMO', 'ACOSTA PARDO', '3143058316', '1', '5/07/1978', 'fabianaco@gmail.com', NULL, 'ABOGADO', 'PROFESIONAL', '15A-8M-2D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79906334, 79906334, '3', 'SANDRA CATALINA', 'PE', '3163997469', '2', '28/05/1986', 'catha2000@hotmail.com', NULL, 'ABOGADA', 'ESPECIALIZACI', '11A-2M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79917548, 79917548, '3', 'CAMILO ERNESTO', 'GUTIERREZ MENDEZ', '6703272', '1', '15/06/1980', 'camilo.gutierrezmendez@gmail.com', NULL, 'ADMINISTRADOR DE EMPRESAS', 'ESPECIALIZACI', '12A-3M-26D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79918096, 79918096, '3', 'WILLIAM GIOVANNY', 'URRUTIA RAMIREZ', '4761833', '1', '9/05/1980', 'williamurrutia9@gmail.com', NULL, 'ABOGADO', 'ESPECIALIZACI', '11A-10M-14D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79938170, 79938170, '3', 'IVAN JAVIER', 'MONROY JINETE', '3017545229', '1', '21/03/1979', 'icacouno@gmail.com', NULL, 'INGENIERO DE SISTEMAS', 'ESPECIALIZACI', '10A-7M-18D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(79985802, 79985802, '3', 'CRISTIAM JOSUE', 'GARCIA TORRES', '3002752700', '1', '2/01/1979', 'torpedo1930@gmail.com', NULL, 'BACHILLER', 'BACHILLER', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80002671, 80002671, '3', 'DIEGO ALEXANDER', 'ARIAS VARGAS', '3115829888', '1', '21/05/1976', 'diegoariasvargas@gmail.com', NULL, 'INGENIERO TOPOGRAFO', 'ESPECIALIZACI', '10A-3M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80005591, 80005591, '3', 'CHARLY ALEXANDER', 'ROCIASCO MENDEZ', '3106695285', '1', '28/03/1979', 'charlyromenz@gmail.com', NULL, 'INGENIERO DE PRODUCCION', 'ESPECIALIZACI', '12A-12M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80051686, 80051686, '3', 'RUBEN DARIO', 'BRI', '3166915440', '1', '8/06/1980', 'rubenbrinez@gmail.com', NULL, 'ABOGADO', 'ESPECIALIZACI', '10A-5M-20D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80073591, 80073591, '3', 'NELSON', 'CADENA GARCIA', '3213453483', '1', '1984-09-29', 'nelcadena@hotmail.com', NULL, 'ABOGADO', 'Especializacion', '5A-9M-17D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '2020-06-26', '2020-06-26'),
(80082479, 80082479, '3', 'ALAN', 'AGUIA AGUDELO', '6197901', '2', '19/04/1979', 'alan.aguia@gmail.com', NULL, 'INGENIERIO DE SISTEMAS Y COMPUTACION', 'ESPECIALIZACI', '16A-10M-7D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80093967, 80093967, '3', 'ANDRES ERNESTO', 'OBANDO OROZCO', '3173649438', '1', '17/12/1981', 'aeobandoo@gmail.com', NULL, 'POLITOLOGO', 'MAESTRIA', '14A-6M-16D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80100002, 80100002, '3', 'CESAR AUGUSTO', 'GONZALEZ JIMENEZ', '4773315', '1', '23/09/1983', 'cesar.gonzalez@hdsas.co', NULL, 'INGENIERO ELECTRONICO', 'PROFESIONAL', '11A-4M-9D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80101271, 80101271, '3', 'JULIAN ANDRES', 'MEJIA RAMIREZ', '3114541407', '1', '11/09/1983', 'julianandresmejia@gmail.com', NULL, 'INGENIERO CATASTRAL Y GEODESTA', 'PROFESIONAL', '13A-6M-4D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80161126, 80161126, '3', 'MARIO ALFONSO', 'DIAZ CASAS', '4513102', '1', '28/01/1982', 'marioufoo@yahoo.es', NULL, 'INGENIERO CATASTRAL Y GEODESTA', 'PROFESIONAL', '12A-11M-8D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80166501, 80166501, '3', 'RICARDO ANDRES', 'LOZADA RODRIGUEZ', '3106250472', '1', '26/09/1981', 'ralozadar@gmail.com', NULL, 'POLITOLOGO', 'ESPECIALIZACI', '14A-7M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80192354, 80192354, '3', 'HOOVER EDISON', 'RAMOS CUELLAR', '3153815317', '1', '16/02/1985', 'hoover.ramos@gmail.com', NULL, 'ABOGADO', 'ESPECIALIZACI', '10A-5M-25D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80198100, 80198100, '3', 'JUAN CLAUDIO', 'ARENAS PONCE', '3105674046', '1', '22/12/1983', 'juanclarenas@hotmail.com', NULL, 'ABOGADO', 'PROFESIONAL', '9A-8M-5D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80228242, 80228242, '3', 'MANUEL FERNANDO', 'GOMEZ LANDINEZ', '3106251843', '1', '4/03/1980', 'fernandogomezlandinez@gmail.com', NULL, 'ABOGADO', 'ESPECIALIZACI', '15A-9M-9D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80407748, 80407748, '3', 'JUAN ANDRES', 'LOPEZ SILVA', '3107932', '2', '5/05/1965', 'jlopezsilva@yahoo.com', NULL, 'ADMINISTRADOR DE EMPRESAS', 'MAESTRIA', '28A-9M-24D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80540287, 80540287, '3', 'OMAR', 'JARAMILLO RODRIGUEZ', '3192377607', '1', '2/10/1975', 'omar.jaramillo.rodriguez@gmail.com', NULL, 'GEOGRAFO', 'PROFESIONAL', '19A-6M-11D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80732924, 80732924, '3', 'DAVID MAURICIO', 'PRIETO CASTA', '3103300512', '1', '13/07/1982', 'davidmauricioprieto@gmail.com', NULL, 'INGENIERO AMBIENTAL', 'ESPECIALIZACI', '13A-10D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80816932, 80816932, '3', 'EDUARDO', 'CORTES ZUBIETA', '3188527573', '1', '28/06/1984', 'cortes.z.eduardo@gmail.com', NULL, 'INGENIERO DE SISTEMAS', 'PROFESIONAL', '10A-6M-20D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80904052, 80904052, '3', 'DANIEL HUMBERTO', 'RODRIGUEZ CARDENAS', '3007879310', '1', '12/10/1985', 'danielcardenas@gmail.com', NULL, 'INGENIERO DE SISTEMAS', 'PROFESIONAL', '5A-3M-4D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(80926500, 80926500, '3', 'WILLIAM ALBERTO', 'GARZON ROMERO', '3057927740', '1', '17/07/1985', 'nerv06@gmail.com', NULL, 'PROFESIONAL EN RELACIONES INTERNACIONALES ', 'ESPECIALIZACI', '48M-2D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(81740160, 81740160, '3', 'JEAN ALEXIS', 'ORTIZ VANEGAS', '3138400015', '1', '24/08/1984', 'alexisortizvanegas@gmail.com', NULL, 'TECNOLOGO EN CARTOGRAFIA', 'TECNOLOGO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(82392676, 82392676, '3', 'FERNANDO', 'BOLIVAR BUITRAGO', '3004069787', '1', '4/01/1979', 'fbolivarb@gmail.com', NULL, 'INGENIERO DE SISTEMAS', 'PROFESIONAL', '14A-5M-23D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(82394159, 82394159, '3', 'HEIMUNTH ALEXANDER', 'DUARTE CUBILLOS', '3108567414', '1', '28/07/1979', 'heimunthduarte@gmail.com', NULL, 'INGENIERO AGRONOMO', 'MAESTRIA', '13A-11M-9D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(86003815, 86003815, '3', 'GEILER JHAMS', 'OCAMPO OSORIO', '3153327807', '1', '11/04/1966', 'geilerocampo11@hotmail.com', NULL, 'ABOGADO', 'ESPECIALIZACI', '18A-8M-8D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(88030872, 88030872, '3', 'ANDRES FELIPE', 'OYOLA VERGEL', '3144520927', '1', '18/11/1980', 'andres.oyola@parquesnacionales.gov.co', NULL, 'ECOLOGO', 'PROFESIONAL', '15A-10M-7D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(93414563, 93414563, '3', 'ANDRES MAURICIO', 'VILLEGAS NAVARRO', '3174292841', '1', '11/11/1979', 'maovillegas79@hotmail.com', NULL, 'ABOGADO', 'PROFESIONAL', '76M-27D', '20', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(93437545, 93437545, '3', 'EDWARD DEYVID', 'OCAMPO TELLEZ', '3214525401', '1', '4/10/1979', 'edwardocampo14@gmail.com', NULL, 'INGENIERO FORESTAL', 'ESPECIALIZACI', '13A-27D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(94064017, 94064017, '3', 'DAVID ALFONSO', 'VACCA BUENAVENTURA', '3125265599', '1', '13/10/1983', 'dvaccabu@gmail.com', NULL, 'INGENIERO DE SISTEMAS Y COMPUTACION', 'PROFESIONAL', '5A-5M-17D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1010163614, 1010163614, '3', 'GLORIA JOHANNA', 'GONZALEZ LOPEZ', '3004125035', '2', '4/06/1986', 'glorigl@gmail.com', NULL, 'BIOLOGA', 'ESPECIALIZACI', '10A-23M-24D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1010171738, 1010171738, '3', 'EFRAIN', 'MOLANO VARGAS', '3208453922', '1', '3/09/1987', 'efra_molano@hotmail.com', NULL, 'ABOGADO', 'ESPECIALIZACI', '8A-15D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1010182072, 1010182072, '3', 'JORGE ENRIQUE', 'ROJAS SANCHEZ', '3013156961', '1', '26/02/1989', 'jorge.sajor@gmail.com', NULL, 'ECONOMISTA', 'MAESTRIA', '6A-9M-3D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1010214918, 1010214918, '3', 'PAOLA ANDREA', 'CUCUNUBA MORENO', '6616197', '2', '29/03/1994', 'paolacucunuba@gmail.com', NULL, 'INGENIERA AMBIENTAL', 'ESPECIALIZACI', '3A-4M-8D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1010229854, 1010229854, '3', 'NICOLAS', 'AVILA PUENTES', '3125833778', '1', '19/09/1996', 'nico.puentes@hotmail.com', NULL, 'INGENIERO AMBIENTAL', 'PROFESIONAL', '9M-5D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1012353910, 1012353910, '3', 'NURY MAYERLIN', 'QUI', '3102361109', '2', '8/07/1989', 'nuryq_19@hotmail.com', NULL, 'CONTADORA PUBLICA', 'ESPECIALIZACI', '4A-7M-3D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1014207218, 1014207218, '3', 'LEIDY', 'MONCADA ROSERO', '3173221014', '2', '14/01/1990', 'leidy0218@gmil.com', NULL, 'TECNICO PROFESIONAL EN SISTEMAS Y TELECOMUNIC', 'TECNICO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1014274506, 1014274506, '3', 'ANDRES FELIPE', 'FONSECA MOSQUERA', '3133653643', '1', '15/02/1996', 'andrespipefon@hotmail.com', NULL, 'TECNICO PROFESIONAL EN SISTEMAS E INFORMATICA', 'TECNICO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1014281357, 1014281357, '3', 'JUAN PABLO', 'BARRANTES ARDILA', '3192274982', '2', '3/10/1996', 'juan96barrantes@hotmail.com', NULL, 'CONTADOR PUBLICO', 'PROFESIONAL', '2A-3M-20D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1015393325, 1015393325, '3', 'INGRY JOHANA', 'POVEDA AVILA', '3134553074', '2', '8/03/1986', 'johanapoveda86@gmail.com', NULL, 'ZOOTECNISTA', 'ESPECIALIZACI', '9A-7M-4D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1015399346, 1015399346, '3', 'SERGIO HERNANDO', 'OROZCO CHAPARRO', '3124271854', '1', '3/05/1987', 'audiovisual.avl@gmail.com', NULL, 'PROFESIONAL EN MEDIOS AUDIOVISUALES', 'PROFESIONAL', '8A-10M-26D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1015457972, 1015457972, '3', 'KAREN YADIRA', 'CASALLAS ROJAS', '7479703', '2', '16/10/1995', 'karen.y14@hotmail.com', NULL, 'DERECHO - No Graduado', 'UNIVERSITARIO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1016006974, 1016006974, '3', 'MARIA FERNANDA', 'LOSADA VILLARREAL', '3104800678', '2', '1/09/1987', 'mfernandalv@gmail.com', NULL, 'ABOGADA', 'ESPECIALIZACI', '9A-16D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1016017128, 1016017128, '3', 'PAOLA ANDREA', 'SANCHEZ CARVAJAL', '3202414176', '2', '24/04/1989', 'paitosanchez24@gmail.com', NULL, 'ADMINISTRADORA AMBIENTAL', 'PROFESIONAL', '2A-7M-4D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1016041939, 1016041939, '3', 'JINETH FERNANDA', 'AGUILAR MARULANDA', '3183773830', '2', '26/01/1992', 'jineth.aguilar.ma@gmail.com', NULL, 'TECNICO EN NEGOCIOS INTERNACIONALES', 'TECNICO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1016071808, 1016071808, '3', 'YURY CAMILA', 'BARRANTES REYES', '3118703648', '2', '1994-12-06', 'camila.barrantes01@gmail.com', NULL, 'ABOGADA', 'Profesional', '2A-24D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '2020-06-27', '2020-06-27'),
(1018408126, 1018408126, '3', 'STEFANIA', 'PINEDA CASTRO', '3164159703', '2', '27/12/1986', 'stephy8627@gmail.com', NULL, 'PROFESIONAL EN ADMINISTRACI', 'PROFESIONAL', '10A-10M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1018410526, 1018410526, '3', 'ADOLFO LEOON', 'IBA', '3012425716', '1', '23/05/1987', 'ibanezselam@gmail.com', NULL, 'ABOGADO', 'ESPECIALIZACI', '6A-10M-8D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1018439622, 1018439622, '3', 'MARIANA', 'RIVERA URIBE', '3112645570', '2', '24/11/1990', 'mariana.riverauribe@gmail.com', NULL, 'BIOLOGA', 'ESPECIALIZACI', '14A-2M-14D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1018441348, 1018441348, '3', 'STEFANY ELIZABETH', 'OLAYA AGUDELO ', '3186124272', '2', '4/01/1991', 'olayastefany@gmail.com', NULL, 'COMUNICADORA SOCIAL', 'ESPECIALIZACI', '4A-22D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1018443539, 1018443539, '3', 'BRIANA LIZETH', 'CABRERA LEIVA', '3202820831', '2', '2/04/1991', 'brilicambiental@gmail.com', NULL, 'INGENIERA AMBIENTAL', 'PROFESIONAL', '2A-10M-11D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1018445964, 1018445964, '3', 'CINDY LORENA', 'VELASCO ULLOA', '3005289910', '2', '20/07/1991', 'lvelascoulloa@gmail.com', NULL, 'ABOGADA', 'ESPECIALIZACI', '6A-7M-10D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1019016083, 1019016083, '3', 'JOSE AGUSTIN', 'LOPEZ CHAPARRO', '3132345780', '1', '2/06/1987', 'josealopez555@gmail.com', NULL, 'BIOLOGO', 'PROFESIONAL', '7A-1M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1019075630, 1019075630, '3', 'KATHERINNE JULIETH', 'ANGULO ALONSO', '3123112750', '2', '20/07/1992', 'katherinneangulo48@gmail.com', NULL, 'ECONOMISTA', 'PROFESIONAL', '1A-2M-14D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1019080310, 1019080310, '3', 'KELLY JOHANNA', 'SANTAMARIA ROJAS', '3154419592', '2', '6/03/1993', 'kj.santamariar@gmail.com', NULL, 'INTERNACIONALISTA', 'MAESTRIA', '3A-9M-13D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1020733112, 1020733112, '3', 'NATHALI', 'CEDE', '3174384993', '2', '29/12/1987', 'nathalicedeno@gmail.com', NULL, 'DISE', 'PROFESIONAL', '8A-1M-27D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1020742868, 1020742868, '3', 'JUAN ESTEBAN', 'MARTINEZ AHUMADA', '3012794128', '1', '15/07/1989', 'jm2555@hotmail.com', NULL, 'ADMINISTRADOR DE EMPRESAS', 'MAESTRIA', '8A-3M-18D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1020745397, 1020745397, '3', 'DAVID SANTIAGO', 'TORRES MARTINEZ', '3113529639', '1', '18/09/1989', 'dtorres_18@hotmail.com', NULL, 'ADMINISTRADOR DE EMPRESAS', 'PROFESIONAL', '5A-4M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1020747020, 1020747020, '3', 'FELIPE', 'GUERRA BAQUERO', '3115291130', '1', '21/09/1989', 'felipeguerra.fgb@gmail.com', NULL, 'POLITOLOGO', 'MAESTRIA', '6A-3M-5D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1020759512, 1020759512, '3', 'MAYRA ALEJANDRA', 'LUNA GELVEZ', '3163306728', '2', '14/02/1991', 'ma.luna94@gmail.com', NULL, 'ABOGADA', 'PROFESIONAL', '6A-10M-2D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1020770337, 1020770337, '3', 'LAURA CAMILA', 'QUIROGA LUGO', '3165139077', '2', '10/04/1992', 'laura.quiroga1902@gmail.com', NULL, 'PROFESIONAL EN RELACIONES INTERNACIONALES Y E', 'ESPECIALIZACI', '6A-3M-29D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1020771322, 1020771322, '3', 'YOHAN ANDRES', 'LOPEZ LUCERO', '3016634477', '1', '30/04/1992', 'andreslopezlu@gmail.com', NULL, 'INGENIERO CIVIL', 'PROFESIONAL', '2A-6M-24D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1022366734, 1022366734, '3', 'SANDRA MILENA', 'DIAZ GOMEZ', '3214148834', '2', '11/10/1990', 'sandram.diaz.gomez@gmail.com', NULL, 'INGENIERA AMBIENTAL', 'PROFESIONAL', '4A-2M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1022378338, 1022378338, '3', 'MAYRA ALEJANDRA', 'GONZALEZ ARCHILA', '3138741741', '2', '28/08/1992', 'malegoar92@gmail.com', NULL, 'ADMINISTRADORA AMBIENTAL', 'PROFESIONAL', '4A-7M-17D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1022400218, 1022400218, '3', 'JENNIFER LEONELA', 'CONDIA GODOY', '3223917937', '2', '13/01/1995', 'jennifercondia@gmail.com', NULL, 'COMUNICACION SOCIAL Y PERIODISMO', 'UNIVERSITARIO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1023925233, 1023925233, '3', 'MIGUEL ANGEL', 'BEDOYA PANIGUA', '3192246942', '1', '3/06/1993', 'miguelbedoyap@gmail.com', NULL, 'ADMINISTRADOR AMBIENTAL', 'ESPECIALIZACI', '5A-3M-12D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1024519301, 1024519301, '3', 'KAREN PAOLA', 'SANCHEZ GARCIA', '3014144437', '2', '15/06/1991', 'monitak17@hotmail.com', NULL, 'TECNICO EN NEGOCIACION Y VENTA DE PRODUCTOS Y', 'TECNICO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1026253679, 1026253679, '3', 'LAURA PATRICIA', 'PINILLOS COLLAZOS', '3006934320', '2', '5/09/1986', 'laurapinillosc@gmail.com', NULL, 'BIOLOGA', 'MAESTRIA', '9A-9M-23D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1026257518, 1026257518, '3', 'JOSE LUIS', 'QIOROGA PACHECO', '3114770741', '1', '22/10/1987', 'jluisqp@gmail.com', NULL, 'ABOGADO', 'ESPECIALIZACI', '8A-4M-6D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1026294138, 1026294138, '3', 'RAFAEL ANTONIO', 'NEGRETE CASANOVA', '3202633140', '1', '22/02/1996', 'rafael.negrete@outlook.com', NULL, 'ABOGADO ', 'PROFESIONAL', '11M-21D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1026560671, 1026560671, '3', 'ANGELA PATRICIA', 'PARRA  MORENO', '3006608370', '2', '10/06/1989', 'angieparra10@gmail.com', NULL, 'BIOLOGA', 'ESPECIALIZACI', '7A-10M-6D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00');
INSERT INTO `personas` (`id_persona`, `documento`, `tipo_documento`, `Nombres`, `Apellidos`, `Telefono`, `genero`, `fecha_nac`, `correo_p`, `correo_I`, `profesion`, `formacion`, `experiencia`, `estado`, `hv_sigep`, `clase`, `observaciones`, `cod_cargo`, `cod_arl`, `cod_contrato`, `updated_at`, `created_at`) VALUES
(1026576422, 1026576422, '3', 'LESLIE JOHANNA', 'MARTINEZ MARTINEZ', '3193212136', '2', '15/07/1993', 'lejmartinezma@gmail.com', NULL, 'CONTADORA PUBLICA', 'MAESTRIA', '3A-6M-5D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1030675889, 1030675889, '3', 'LEIDY VANESSA', 'MALDONADO MORENO', '3115423866', '2', '24/02/1997', 'lamaldonado3@uniminuto.edu.co', NULL, 'TRABAJADORA SOCIAL', 'TECNICO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1032363869, 1032363869, '3', 'ANA MARIA', 'HERNANDEZ ANZOLA', '3197583657', '2', '28/03/1986', 'anahernandezanzola@gmail.com', NULL, 'INGENIERA FORESTAL', 'ESPECIALIZACI', '9A-7M-8D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1032402519, 1032402519, '3', 'LAURA CAROLINA', 'CAMACHO JARAMILLO', '3003973757', '2', '29/12/1987', 'laurabiomar@gmail.com', NULL, 'BIOLOGA MARINA', 'MAESTRIA', '7A-10M-5D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1032406008, 1032406008, '3', 'JORGE ANDRES', 'DUARTE TORRES', '3013589964', '1', '10/02/1988', 'jadt0210@gmail.com', NULL, 'INGENIERO TOPOGRAFO', 'ESPECIALIZACI', '7A-3M-9D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1032436144, 1032436144, '3', 'YURY NATALI', 'SOTELO CRUZ', '3112702378', '2', '8/04/1990', 'yuryn.soteloc@gmail.com', NULL, 'INGENIERIA INDUSTRIAL', 'PROFESIONAL', '7A-2M-15D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1032452082, 1032452082, '3', 'YILBERT STEVEN', 'MATEUS CASTRO', '3105830570', '1', '15/09/1992', 'steven-992@hotmail.com', NULL, 'INGENIERO INDUSTRIAL', 'ESPECIALIZACI', '4A-9M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1032458354, 1032458354, '3', 'KAREN STEPHANY', 'AGUILAR CORTES', '3213507406', '2', '22/07/1993', 'karenstepha22@gmail.com', NULL, 'ABOGADA', 'PROFESIONAL', '4A-1M-15D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1032462158, 1032462158, '3', 'AMALYN CAROLINA', 'ROJAS SANCHEZ', '3057812677', '2', '12/02/1994', 'amalinrsa.94@gmail.com', NULL, 'BACHILLER', 'UNIVERSITARIO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1033703978, 1033703978, '3', 'LEYDI YOHANNA', 'GIRALDO ARANGO', '3227080304', '2', '22/11/1988', 'leidyjga7@hotmail.com', NULL, 'ADMINISTRADOR DE EMPRESAS', 'PROFESIONAL', '3A-9M-11D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1037604238, 1037604238, '3', 'VIVIANA', 'URREA MINOTA', '3014727434', '2', '22/03/1990', 'vurream@unal.edu.co', NULL, 'INGENIERA CIVIL', 'MAESTRIA', '6A-11M-6D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1049610293, 1049610293, '3', 'LEONARDO ALEXANDER', 'PEREZ RUBIANO', '3103409509', '1', '19/12/1987', 'perleonardo@gmail.com', NULL, 'INGENIERO AMBIENTAL Y SANITARIO', 'ESPECIALIZACI', '4A-10M-15D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1052397347, 1052397347, '3', 'JEYSSON ARMANDO', 'SUAREZ QUIJANO', '3114491716', '1', '2/10/1992', 'jeysuarezq37@gmail.com', NULL, 'INGENIERO AMBIENTAL', 'PROFESIONAL', '3A-3M-15D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1053823698, 1053823698, '3', 'ELIAS', 'BOTERO GARCIA', '3148306418', '1', '2/01/1993', 'elboteroga@unal.edu.co', NULL, 'INGENIERO INDUSTRIAL', 'ESPECIALIZACI', '3A-5M-2D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1054093192, 1054093192, '3', 'OSCAR CAMILO', 'CRUZ HERNANDEZ', '3193202861', '1', '24/03/1993', 'camicruz24@hotmail.com', NULL, 'ABOGADO', 'ESPECIALIZACI', '5A-7M-16D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1070614662, 1070614662, '3', 'HECTOR DAVID', 'ROZO SOCHA', '3208211238', '1', '17/10/1994', 'davidrozo1017@gmail.com', NULL, 'TECNICO EN SISTEMAS', 'TECNICO', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1071348647, 1071348647, '3', 'JOSE JOAQUIN', 'BENAVIDES ARRIETA', '3117287702', '1', '22/08/1985', 'josebagega@gmail.com', NULL, 'GEOGRAFO', 'ESPECIALIZACI', '9A-9M-25D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1072365766, 1072365766, '3', 'LIZETH ALEXANDRA', 'PRIETO GONZALEZ', '3125930232', '2', '16/11/1990', 'lizethprietog@hotmail.com', NULL, 'CONTADORA PUBLICA', 'PROFESIONAL', '6A-5D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1076653130, 1076653130, '3', 'YULI ANDREA', 'BECERRA CASTIBLANCO', '3142987130', '2', '22/10/1989', 'andrea221089@hotmail.com', NULL, 'CONTADORA PUBLICA', 'PROFESIONAL', '84M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1083887163, 1083887163, '3', 'FABIAN ANDRES', 'VISQUEZ CERQUERA', '3102049421', '1', '24/07/1990', 'andresvc790@gmail.com', NULL, 'INGENIERO AMBIENTAL', 'PROFESIONAL', '5A-9M-18D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1085301502, 1085301502, '3', 'PAMELA', 'MEIRELES GUERRERO', '3113685749', '2', '17/01/1992', 'pamelameireles92@gmail.com', NULL, 'ABOGADA', 'PROFESIONAL', '41M-17D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1090372377, 1090372377, '3', 'ANA LIZETH', 'QUINTERO GALVIS', '3017834303', '2', '25/08/1986', 'quintana_1906@hotmail.com', NULL, 'ABOGADA', 'ESPECIALIZACI', '12A-2M-13D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1101177000, 1101177000, '3', 'DANIEL ANDRES', 'GAMBA HURTADO', '3214168171', '1', '27/11/1992', 'andresgamba14@gmail.com', NULL, 'ABOGADO', 'ESPECIALIZACI', '3A-3M-8D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1110484375, 1110484375, '3', 'LIDA NATALIA', 'NOPIA MACHADO', '9203882', '2', '7/04/1988', 'natisnopia@gmail.com', NULL, 'LICENCIADA EN CIENCIAS NATURALES', 'PROFESIONAL', 'N/A', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1113622677, 1113622677, '3', 'ANDRES FELIPE', 'VELASCO RIVERA', '6032172', '1', '2/10/1986', 'afvelasco@hotmail.com', NULL, 'ABOGADO', 'ESPECIALIZACI', '9A-1M-18D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1116781543, 1116781543, '3', 'XIMENA CAROLINA', 'CUBILLOS VARGAS', '3163791676', '2', '17/09/1988', 'ximena.cubillos01@gmail.com', NULL, 'ADMINISTRADORA DE EMPRESAS', 'PROFESIONAL', '7A-10M-27D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1119211837, 1119211837, '3', 'KATERYN', 'RINCON BUSTOS', '3173778534', '2', '7/11/1988', 'krinconbustos@gmail.com', NULL, 'ABOGADA', 'PROFESIONAL', '7A-6M-8D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1136879550, 1136879550, '3', 'PAOLA CATALINA', 'ISOZA VELASQUEZ', '3108049700', '2', '24/08/1987', 'catalina.isoza@gmail.com', NULL, 'ABOGADA', 'ESPECIALIZACI', '6A-7M', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1143346917, 1143346917, '3', 'LAURA SOFIA', 'RAMIREZ RIVERO', '3155962759', '2', '14/08/1990', 'lausofiramirez2@gmail.com', NULL, 'ABOGADA', 'ESPECIALIZACI', '4A-5M-14D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(1144051098, 1144051098, '3', 'ISABEL CRISTINA', 'GARCIA BURBANO', '3207162154', '2', '12/02/1992', 'isabelgarcia9212@gmail.com', NULL, 'ABOGADA', 'PROFESIONAL', '6A-5M-7D', '10', NULL, 'Contratista', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00');



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `riesgos`
--

CREATE TABLE `riesgos` (
  `id_riesgo` int NOT NULL,
  `nombre_riesgo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rps`
--

CREATE TABLE `rps` (
  `id_rp` int NOT NULL,
  `fecha_sol` date DEFAULT NULL,
  `fecha_reg` date DEFAULT NULL,
  `subprograma` text,
  `cod_cdp` int NOT NULL,
  `id_contrato` varchar(60) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_rp`),
	CONSTRAINT `fk_rp_cdp` FOREIGN KEY (`cod_cdp`) REFERENCES `cdps`(`id_cdp`) 
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `rps`
--

INSERT INTO `rps` (`id_rp`, `fecha_sol`, `fecha_reg`, `subprograma`, `cod_cdp`, `id_contrato`, `updated_at`, `created_at`) VALUES
(2020, '2020-01-14', '2020-01-14', NULL, 2620, 'CPS-001-2020', '2020-06-27', '2020-06-27'),
(2520, '2020-01-14', '2020-01-14', NULL, 3020, 'CPS-001-2020', '2020-06-27', '2020-06-27'),
(2620, '2020-01-14', '2020-01-14', NULL, 2520, 'CPS-002-2020', '2020-06-27', '2020-06-27');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `surname`, `email`, `password`, `image`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Admin', 'Administrador', 'Admin', 'luzyadirac@gmail.com', '$2y$10$lA6AfzGetFdYGyHh/CSwgukv9jxztpeEIjWWMu.eIMy7prTKOue4e', NULL, '2020-06-10 02:48:01', '2020-06-10 02:48:01', 'xuW5LTwWXAeXdYatorOAmjtWoMfLKMAwM2N7ITMinzitzo7hre76B6DJ9ZHE'),
(3, 'Ages', 'Luz Yadira', 'Castro', 'luz.castro@parquesnacionales.gov.co', '$2y$10$DuoFEyi7nMzjF1QCdwk/yO3Nf452yNJxU3xVUd9zPhH02jkbfVUN.', NULL, '2020-06-24 20:37:15', '2020-06-24 20:37:15', 'U5HpKzqB2mlk3SPkGlskMWWYX9Bm4XKgzINHWZIFbwx7jN7voicKfyNJBRBN'),
(4, 'Afin', 'Javier', 'Yosa', 'polo@parquesnacionales.gov.co', '$2y$10$JFv0ubevdqhoQtDOiIReMestYbw2LITx0lFwXn4Gbq1fFdiZEdDQO', NULL, '2020-06-24 20:39:35', '2020-06-24 20:39:35', NULL);

-- --------------------------------------------------------




--
-- AUTO_INCREMENT de la tabla `modificaciones`
--
ALTER TABLE `modificaciones`
  MODIFY `id_modificacion` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `id_proceso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rps`
--
ALTER TABLE `rps`
  MODIFY `id_rp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2621;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;



