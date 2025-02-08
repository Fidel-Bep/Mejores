CREATE TABLE usuarios (
    nick varchar(50) NOT NULL,
    nombre varchar(50) NOT NULL,
    apellidos varchar(50) NOT NULL,
    email varchar(100) NOT NULL,UNIQUE KEY (email),
    provincia varchar(50) NOT NULL,
    municipio varchar(50) NOT NULL,
    codigo_postal varchar(20) NOT NULL,
    password varchar(128) NOT NULL,
    principios varchar(50) NULL,
    objetivo_moral varchar(50) NULL,
    lema varchar(400) NULL,
    nick_amigos varchar(50) NULL,
    nick_familiar varchar(50) NULL,
    
    puntuacion_familia int(3) NULL,
    puntuacion_amigos int(3) NULL,
    puntuacion_tribunal int(3) NULL,
    fecha_modificacion timestamp NULL ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pk_usuario PRIMARY KEY (nick),
    CONSTRAINT uq_email UNIQUE KEY (email),
    CONSTRAINT fk_usuario_amigo FOREIGN KEY (nick_amigos) REFERENCES usuarios(nick) ON UPDATE CASCADE,
    CONSTRAINT fk_usuario_familiar FOREIGN KEY (nick_familiar) REFERENCES usuarios(nick) ON UPDATE CASCADE
    
)ENGINE=InnoDB;

CREATE TABLE amigos (
   
    nick_usuario varchar(50) NOT NULL,
    nick_amigo varchar(50) NOT NULL,
    solicitud_amistad varchar(10) NOT NULL DEFAULT 'pendiente',
    fecha_modificacion timestamp NULL ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pk_amigos PRIMARY KEY (nick_usuario,nick_amigo),
    CONSTRAINT fk_amigos_usuario FOREIGN KEY (nick_usuario) REFERENCES usuarios(nick) ON UPDATE CASCADE,
    CONSTRAINT fk_amigos_amigo FOREIGN KEY (nick_amigo) REFERENCES usuarios(nick) ON UPDATE CASCADE
    )ENGINE=InnoDB;
    
   
CREATE TABLE familiares (
    nick_usuario varchar(50) NOT NULL,
    nick_familiar varchar(50) NOT NULL,
    solicitud_familia varchar(10) NOT NULL DEFAULT 'pendiente',
    fecha_modificacion timestamp NULL ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pk_familia PRIMARY KEY (nick_usuario,nick_familiar),
    CONSTRAINT fk_familiares_usuario FOREIGN KEY (nick_usuario) REFERENCES usuarios(nick) ON UPDATE CASCADE,
    CONSTRAINT fk_familiares_familiar FOREIGN KEY (nick_familiar) REFERENCES usuarios(nick) ON UPDATE CASCADE
    )ENGINE=InnoDB;

CREATE TABLE metas  (
    id int(11) NOT NULL AUTO_INCREMENT,
    nombre_meta varchar(50) NOT NULL,
    descripcion varchar(400) NOT NULL,
    CONSTRAINT pk_metas PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE metas_usuario  (
    nick_usuario varchar(50) NOT NULL,
    id_meta int(11) NOT NULL,
    puntuacion_meta int(10) NULL,
    fecha_modificacion timestamp NULL ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pk_metas_usuario PRIMARY KEY (nick_usuario,id_meta),
    CONSTRAINT fk_metas_usuario_usuario FOREIGN KEY (nick_usuario) REFERENCES usuarios(nick) ON UPDATE CASCADE,
    CONSTRAINT fk_metas_usuario_meta FOREIGN KEY (id_meta) REFERENCES metas(id) ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE publicaciones(
    id int(11) NOT NULL AUTO_INCREMENT,
    nick_usuario varchar(50) NUll,
    nick_testigo varchar(50) NULL,
    titulo varchar(200) NOT NULL,
    comentario_usuario varchar(400) NULL,
    comentario_testigo varchar(400) NULL,
    id_meta int(11) NULL,
    dificultad varchar(20) NOT NULL DEFAULT 'fácil',
    puntuacion int(2) NOT NULL DEFAULT 0,
    tribunal_comentario varchar(400),
    duda varchar(10) NOT NULL DEFAULT 'no',
    comentario_duda varchar()400 NULL,
    fecha_modificacion timestamp NULL ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pk_publicaciones PRIMARY KEY (id),
    CONSTRAINT fk_publicaciones_usuario FOREIGN KEY (nick_usuario) REFERENCES usuarios(nick) ON UPDATE CASCADE,
    CONSTRAINT fk_publicaciones_testigo FOREIGN KEY (nick_testigo) REFERENCES usuarios(nick) ON UPDATE CASCADE

)ENGINE=InnoDB;

CREATE TABLE pruebas(
    id_publicacion int(11) NOT NULL,
    nick_aportador varchar(50) NOT NULL,
    prueba varchar(255),
    metadatos json,
    fecha_modificacion timestamp NULL ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pk_pruebas PRIMARY KEY (id_publicacion,nick_aportador),
    CONSTRAINT fk_pruebas_publicacion FOREIGN KEY (id_publicacion) REFERENCES publicaciones(id) ON UPDATE CASCADE,
    CONSTRAINT fk_pruebas_nick_aportador FOREIGN KEY (nick_aportador) REFERENCES usuarios(nick) ON UPDATE CASCADE

)ENGINE=InnoDB;

CREATE TABLE comentarios(
    id int(11) NOT NULL AUTO_INCREMENT,
    id_publicacion int(11) NOT NULL,
    nick_comentador varchar(50) NOT NULL,
    id_acto_publicos varchar (400) NULL,
    duda varchar(2) NULL,
    testigo varchar(2) NULL,
    usuario varchar(2) NULL,
    comentario varchar(400)NOT NULL,
    fecha_modificacion timestamp NULL ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pk_comentarios PRIMARY KEY (id),
    CONSTRAINT fk_comentarios_publicacion FOREIGN KEY (id_publicacion) REFERENCES publicaciones(id) ON UPDATE CASCADE,
    CONSTRAINT fk_comentarios_nick_comentador FOREIGN KEY (nick_comentador) REFERENCES usuarios(nick) ON UPDATE CASCADE

)ENGINE=InnoDB;

CREATE TABLE actos_publicos(
    id int(11) NOT NULL AUTO_INCREMENT,
    nick_usuario varchar(50) NOT NULL,
    acto_condenado varchar(200) NOT NULL,
    implicados varchar(200)NULL,
    comentario varchar(400) NOT NULL,
    atenta_contra varchar(200)NULL,
    CONSTRAINT pk_actos_publicos PRIMARY KEY (id) ,
    CONSTRAINT fk_actos_publicos_usuario FOREIGN KEY (nick_usuario) REFERENCES usuarios(nick) ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE apoyar_acto_publico(
    id int(11) NOT NULL AUTO_INCREMENT,
    nick_usuario varchar(50) NOT NULL,
    id_acto_publico int(11) NOT NULL,
    CONSTRAINT pk_apoyar_acto_publico PRIMARY KEY (id),
    CONSTRAINT fk_apoyar_acto_usuario FOREIGN KEY (nick_usuario) REFERENCES usuarios(nick) ON UPDATE CASCADE,
    CONSTRAINT fk_apoyar_acto_id FOREIGN KEY (id_acto_publico) REFERENCES actos_publicos(id) ON UPDATE CASCADE
    
)ENGINE=InnoDB;
