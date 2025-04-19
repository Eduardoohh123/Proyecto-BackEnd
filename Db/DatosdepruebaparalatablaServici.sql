
INSERT INTO `Servicios` (`Nombre`, `Costo`, `Duracion`, `Descripcion`, `Tipo`, `Min integrantes`, `Max integrantes`) VALUES
('Desarrollo Web', 500000, 30, 'Creación de sitios web personalizados', 'Tecnología', 1, 5),
('Desarrollo de Software', 1500000, 90, 'Software a medida para empresas', 'Tecnología', 2, 10),
('Consultoría Tecnológica', 300000, 15, 'Asesoramiento en tecnología', 'Consultoría', 1, 3),
('Desarrollo de Apps Móviles', 800000, 60, 'Aplicaciones móviles para Android e iOS', 'Tecnología', 2, 6),
('Mantenimiento de Sistemas', 200000, 10, 'Soporte técnico y mantenimiento', 'Soporte', 1, 4),
('Redes y Telecomunicaciones', 600000, 45, 'Configuración de redes empresariales', 'Telecomunicaciones', 2, 8),
('Ciberseguridad', 1000000, 30, 'Protección de datos y sistemas', 'Seguridad', 1, 5),
('Análisis de Datos', 700000, 20, 'Procesamiento y análisis de datos', 'Tecnología', 1, 4),
('Automatización de Procesos', 1200000, 50, 'Automatización de tareas repetitivas', 'Tecnología', 2, 6),
('Capacitación en TI', 400000, 25, 'Cursos y talleres en tecnología', 'Educación', 5, 20),
('Desarrollo de Videojuegos', 2000000, 120, 'Creación de videojuegos personalizados', 'Tecnología', 3, 10),
('Diseño UX/UI', 450000, 20, 'Diseño de interfaces de usuario', 'Diseño', 1, 3),
('Marketing Digital', 500000, 30, 'Estrategias de marketing en línea', 'Marketing', 1, 5),
('SEO y SEM', 300000, 15, 'Optimización para motores de búsqueda', 'Marketing', 1, 3),
('Gestión de Proyectos', 600000, 40, 'Planificación y gestión de proyectos', 'Consultoría', 1, 5),
('Soporte Técnico', 250000, 10, 'Resolución de problemas técnicos', 'Soporte', 1, 3),
('Auditoría de Sistemas', 900000, 30, 'Revisión y auditoría de sistemas', 'Seguridad', 1, 4),
('Migración a la Nube', 1100000, 60, 'Migración de sistemas a la nube', 'Tecnología', 2, 6),
('Integración de Sistemas', 1300000, 50, 'Integración de diferentes sistemas', 'Tecnología', 2, 6),
('Pruebas de Software', 400000, 20, 'Pruebas funcionales y de rendimiento', 'Tecnología', 1, 4);


INSERT INTO `Nosotros` (`Mision`, `Vision`, `Equipo`, `Jerarquia`) VALUES
('Proveer soluciones tecnológicas innovadoras', 'Ser líderes en tecnología en LATAM', 'Equipo multidisciplinario', 'Gerente General > Jefes de Área > Desarrolladores'),
('Facilitar la transformación digital', 'Transformar empresas con tecnología', 'Equipo de expertos en TI', 'CEO > CTO > Ingenieros'),
('Ofrecer servicios de calidad', 'Ser reconocidos por la excelencia', 'Equipo comprometido', 'Director > Coordinadores > Técnicos'),
('Impulsar la innovación', 'Ser pioneros en innovación tecnológica', 'Equipo creativo', 'CEO > Líderes de Innovación > Desarrolladores'),
('Garantizar la seguridad digital', 'Proteger los datos de nuestros clientes', 'Equipo especializado en ciberseguridad', 'Director de Seguridad > Analistas > Técnicos');


INSERT INTO `Ciudades` (`Nombre`) VALUES
('Santiago'),
('Valparaíso'),
('Concepción'),
('La Serena'),
('Antofagasta'),
('Temuco'),
('Iquique'),
('Puerto Montt'),
('Rancagua'),
('Arica'),
('Talca'),
('Chillán'),
('Copiapó'),
('Punta Arenas'),
('Valdivia'),
('Quilpué'),
('Osorno'),
('Calama'),
('Curicó'),
('Los Ángeles');


INSERT INTO `ServiciosCiudades` (`idServicio`, `idCiudad`) VALUES
(1, 1), (1, 2), (1, 3), (2, 4), (2, 5),
(3, 6), (3, 7), (4, 8), (4, 9), (5, 10),
(6, 11), (6, 12), (7, 13), (7, 14), (8, 15),
(9, 16), (9, 17), (10, 18), (10, 19), (11, 20);