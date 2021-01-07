/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     29/12/2020 07:53:34 a.m.                     */
/*==============================================================*/


/*==============================================================*/
/* Table: INSTITUCION                                           */
/*==============================================================*/
create table INSTITUCION
(
   ID_INSTITUCION       int not null,
   NOMBRE               char(10),
   DIRECCION            char(10),
   LOCALIDAD            char(10),
   primary key (ID_INSTITUCION)
);

/*==============================================================*/
/* Table: PROCESO_DE_DONACION                                   */
/*==============================================================*/
create table PROCESO_DE_DONACION
(
   ID_PROCESO           int not null,
   CUIL_ABLACIONISTA    numeric(50,0),
   ID_INSTITUCION_DONANTE int,
   FECHA_ABLACION       datetime,
   primary key (ID_PROCESO)
);

/*==============================================================*/
/* Table: USUARIOS                                              */
/*==============================================================*/
create table USUARIOS
(
   CUIL                numeric(50,0) not null,
   NOMBRE               varchar(50),
   APELLIDO             varchar(50),
   DIRECCION            varchar(50),
   TITULO               varchar(50),
   CARGO                varchar(50),
   primary key (CUIL)
);

/*==============================================================*/
/* Index: CUIL                                                  */
/*==============================================================*/
create index CUIL on USUARIOS
(CUIL
   
);

/*==============================================================*/
/* Index: NOMBRE                                                */
/*==============================================================*/
create index NOMBRE on USUARIOS
(NOMBRE
   
);

/*==============================================================*/
/* Index: APELLIDO                                              */
/*==============================================================*/
create index APELLIDO on USUARIOS
(APELLIDO
   
);

/*==============================================================*/
/* Index: DIRECCION                                             */
/*==============================================================*/
create index DIRECCION on USUARIOS
(DIRECCION
   
);

alter table PROCESO_DE_DONACION add constraint FK_REFERENCE_1 foreign key (CUIL_ABLACIONISTA)
      references USUARIOS (CUIL) on delete restrict on update restrict;

alter table PROCESO_DE_DONACION add constraint FK_REFERENCE_2 foreign key (ID_INSTITUCION_DONANTE)
      references INSTITUCION (ID_INSTITUCION) on delete restrict on update restrict;

