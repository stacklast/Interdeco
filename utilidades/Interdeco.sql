/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     10/02/2015 18:26:10                          */
/*==============================================================*/


drop table if exists CAR_CARGO;

drop table if exists CEM_CONTACTOS_EMERGENCIA;

drop table if exists COM_COMPANIA;

drop table if exists DCI_CIUDAD;

drop table if exists DEP_DETALLES_PERSONALES;

drop table if exists DET_DETALLE_FACTURA;

drop table if exists DPA_PAIS;

drop table if exists EMP_EMPLEADOS;

drop table if exists EXT_EXTRAS;

drop table if exists FAC_CABECERA;

drop table if exists FEC_FECHA;

drop table if exists HOT_HOTELES;

drop table if exists PAQUETES_X_EXTRAS;

drop table if exists PAQ_PAQUETES;

drop table if exists PARTICIPANTES_PAQUETES;

drop table if exists PAR_PARTICIPANTES;

drop table if exists PERFIL_X_RECURSOS;

drop table if exists PER_PERFIL;

drop table if exists REC_RECURSOS;

drop table if exists USU_USUARIO;

drop table if exists USU_X_PER;

/*==============================================================*/
/* Table: CAR_CARGO                                             */
/*==============================================================*/
create table CAR_CARGO
(
   CAR_ID               int not null auto_increment,
   CAR_NOMBRE           varchar(100),
   CAR_DESCIPCION       varchar(100),
   primary key (CAR_ID)
);

/*==============================================================*/
/* Table: CEM_CONTACTOS_EMERGENCIA                              */
/*==============================================================*/
create table CEM_CONTACTOS_EMERGENCIA
(
   CEM_ID               int not null auto_increment,
   PAR_ID               int,
   CEM_CONDICION_MEDICA varchar(200),
   CEM_NOMBRE           varchar(100),
   CEM_APELLIDO         varchar(100),
   CEM_TELEFONO         varchar(15),
   CEM_EMAIL            varchar(100),
   primary key (CEM_ID)
);

/*==============================================================*/
/* Table: COM_COMPANIA                                          */
/*==============================================================*/
create table COM_COMPANIA
(
   COM_ID               int not null auto_increment,
   COM_NOMBRE           varchar(100),
   COM_RUC              varchar(15),
   COM_DIRECCION        varchar(100),
   COM_TELEFONO         varchar(20),
   COM_EMAIL            varchar(25),
   COM_WEB              varchar(50),
   primary key (COM_ID)
);

/*==============================================================*/
/* Table: DCI_CIUDAD                                            */
/*==============================================================*/
create table DCI_CIUDAD
(
   CI_ID                int not null,
   CI_NOMBRE            varchar(100),
   CI_CODIGO_PAIS       varchar(5),
   CI_COD_AREA          varchar(5),
   CI_DISTRITO          varchar(50),
   CI_POBLACION         varchar(8),
   primary key (CI_ID)
);

/*==============================================================*/
/* Table: DEP_DETALLES_PERSONALES                               */
/*==============================================================*/
create table DEP_DETALLES_PERSONALES
(
   DEP_ID               int not null auto_increment,
   PAR_ID               int,
   DEP_OCUPACION        varchar(100),
   DEP_INTERESES        varchar(200),
   DEP_NIVEL_ESTUDIOS   varchar(100),
   DEP_NOMBRE_ESCUELA   varchar(100),
   DEP_LUGAR_TRABAJO    varchar(100),
   DEP_REDES_SOCIALES   varchar(100),
   DEP_FORMA_ENCUENTRO  varchar(200),
   DEP_COMPARACION      varchar(100),
   DEP_FINANCIAMIENTO_VIAJE varchar(100),
   primary key (DEP_ID)
);

/*==============================================================*/
/* Table: DET_DETALLE_FACTURA                                   */
/*==============================================================*/
create table DET_DETALLE_FACTURA
(
   DET_ID               int not null auto_increment,
   FAC_ID               int,
   DET_NOMBRE           varchar(100),
   DET_APELLIDO         varchar(100),
   DET_QTY              char(2),
   DET_DESCRIPCION      varchar(100),
   DET_TOTAL            varchar(25),
   DET_COMENTARIOS      varchar(100),
   DET_EXTRAS           varchar(25),
   DET_SUBTOTAL         varchar(25),
   DET_PAYPAL           char(1),
   primary key (DET_ID)
);

/*==============================================================*/
/* Table: DPA_PAIS                                              */
/*==============================================================*/
create table DPA_PAIS
(
   PA_ID                int not null,
   PA_CODIGO            varchar(5),
   PA_NOMBRE            varchar(100),
   PA_COD_AREA          varchar(5),
   PA_EURO              char(1),
   primary key (PA_ID)
);

/*==============================================================*/
/* Table: EMP_EMPLEADOS                                         */
/*==============================================================*/
create table EMP_EMPLEADOS
(
   EMP_ID               int not null auto_increment,
   COM_ID               int,
   EMP_NOMBRE           varchar(100),
   EMP_APELLIDO         varchar(100),
   EMP_TELEFONO         varchar(25),
   EMP_CELULAR          varchar(25),
   EMP_PAIS             varchar(100),
   EMP_PROVINCIA_ESTADO varchar(100),
   EMP_CIUDAD           varchar(100),
   EMP_DIRECCION        varchar(200),
   EMP_CARGO            varchar(100),
   EMP_TELEFAX          varchar(30),
   primary key (EMP_ID)
);

/*==============================================================*/
/* Table: EXT_EXTRAS                                            */
/*==============================================================*/
create table EXT_EXTRAS
(
   EXT_ID               int not null auto_increment,
   EXT_NOMBRE           varchar(100),
   EXT_DESCRIPCI_ON     varchar(100),
   EXT_TARIFA           varchar(25),
   primary key (EXT_ID)
);

/*==============================================================*/
/* Table: FAC_CABECERA                                          */
/*==============================================================*/
create table FAC_CABECERA
(
   FAC_ID               int not null auto_increment,
   PAR_ID               int,
   COM_ID               int,
   FACT_NUMERO          varchar(10),
   FAC_AUT_SRI          varchar(25),
   FAC_FECHA            date,
   FACT_FECHA_LIMITE    date,
   FAC_DESCUENTO        varchar(20),
   FAC_OBSERVACIONES    varchar(100),
   FAC_ESTADO           char(1),
   primary key (FAC_ID)
);

/*==============================================================*/
/* Table: FEC_FECHA                                             */
/*==============================================================*/
create table FEC_FECHA
(
   FEC_ID               int not null auto_increment,
   PAQ_ID               int,
   FECHAS_VIAJE         date,
   primary key (FEC_ID)
);

/*==============================================================*/
/* Table: HOT_HOTELES                                           */
/*==============================================================*/
create table HOT_HOTELES
(
   HOT_ID               int not null auto_increment,
   HOT_NOMBRE           varchar(100),
   primary key (HOT_ID)
);

/*==============================================================*/
/* Table: PAQUETES_X_EXTRAS                                     */
/*==============================================================*/
create table PAQUETES_X_EXTRAS
(
   PAQ_ID               int not null,
   EXT_ID               int not null,
   primary key (PAQ_ID, EXT_ID)
);

/*==============================================================*/
/* Table: PAQ_PAQUETES                                          */
/*==============================================================*/
create table PAQ_PAQUETES
(
   PAQ_ID               int not null auto_increment,
   PAQ_NOMBRE           varchar(100),
   PAQ_PRECIO           varchar(15),
   primary key (PAQ_ID)
);

/*==============================================================*/
/* Table: PARTICIPANTES_PAQUETES                                */
/*==============================================================*/
create table PARTICIPANTES_PAQUETES
(
   PAR_ID               int not null,
   PAQ_ID               int not null,
   primary key (PAR_ID, PAQ_ID)
);

/*==============================================================*/
/* Table: PAR_PARTICIPANTES                                     */
/*==============================================================*/
create table PAR_PARTICIPANTES
(
   PAR_ID               int not null auto_increment,
   COM_ID               int,
   PAR_FECHA            date,
   PAR_NOMBRE           varchar(100),
   PAR_APELLIDO         varchar(100),
   PAR_GENERO           char(1),
   PAR_FECHA_NACIMIENTO date,
   PAR_NUMERO_PASAPORTE varchar(25),
   PAR_NACIONALIDAD     varchar(100),
   PAR_DIRECCION        varchar(200),
   PAR_PAIS             varchar(100),
   PAR_PROVINCIA_ESTADO varchar(100),
   PAR_CIUDAD           varchar(100),
   PAR_ZIP_POSTAL       varchar(25),
   PAR_TELEFONO         varchar(15),
   PAR_EMAIL            varchar(50),
   PAR_ESTADO           char(1),
   PAR_AGENTE           varchar(50),
   PAR_INFO_VUELO       varchar(200),
   PAR_HOSPEDAJE        varchar(100),
   PAR_COMENTARIOS      varchar(300),
   primary key (PAR_ID)
);

/*==============================================================*/
/* Table: PERFIL_X_RECURSOS                                     */
/*==============================================================*/
create table PERFIL_X_RECURSOS
(
   PER_ID               int not null,
   REC_ID               int,
   PR_CONSULTAR         char(1),
   PR_AGREGAR           char(1),
   PR_EDITAR            char(1),
   PR_ELIMINAR          char(1),
   primary key (PER_ID)
);

/*==============================================================*/
/* Table: PER_PERFIL                                            */
/*==============================================================*/
create table PER_PERFIL
(
   PER_ID               int not null auto_increment,
   PER_NOMBRE           varchar(100),
   PER_FECHAREGISTRO    datetime,
   primary key (PER_ID)
);

/*==============================================================*/
/* Table: REC_RECURSOS                                          */
/*==============================================================*/
create table REC_RECURSOS
(
   REC_ID               int not null auto_increment,
   REC_NOMBRE           varchar(100),
   REC_FECHAREGIRSTRO   datetime,
   primary key (REC_ID)
);

/*==============================================================*/
/* Table: USU_USUARIO                                           */
/*==============================================================*/
create table USU_USUARIO
(
   USU_ID               int not null auto_increment,
   EMP_ID               int,
   USU_ALIAS            varchar(50),
   USU_PASSWORD         varchar(200),
   USU_EMAIL            varchar(100),
   USU_FECHA_REGISTRO   datetime,
   primary key (USU_ID)
);

/*==============================================================*/
/* Table: USU_X_PER                                             */
/*==============================================================*/
create table USU_X_PER
(
   USU_ID               int not null,
   PER_ID               int not null,
   primary key (USU_ID, PER_ID)
);

alter table CEM_CONTACTOS_EMERGENCIA add constraint FK_PAR_X_CEM foreign key (PAR_ID)
      references PAR_PARTICIPANTES (PAR_ID) on delete restrict on update restrict;

alter table DEP_DETALLES_PERSONALES add constraint FK_PAR_DEP foreign key (PAR_ID)
      references PAR_PARTICIPANTES (PAR_ID) on delete restrict on update restrict;

alter table DET_DETALLE_FACTURA add constraint FK_FAC_X_DET foreign key (FAC_ID)
      references FAC_CABECERA (FAC_ID) on delete restrict on update restrict;

alter table EMP_EMPLEADOS add constraint FK_COM_EMP foreign key (COM_ID)
      references COM_COMPANIA (COM_ID) on delete restrict on update restrict;

alter table FAC_CABECERA add constraint FK_PAR_FAC foreign key (PAR_ID)
      references PAR_PARTICIPANTES (PAR_ID) on delete restrict on update restrict;

alter table FAC_CABECERA add constraint FK_RELATIONSHIP_11 foreign key (COM_ID)
      references COM_COMPANIA (COM_ID) on delete restrict on update restrict;

alter table FEC_FECHA add constraint FK_RELATIONSHIP_12 foreign key (PAQ_ID)
      references PAQ_PAQUETES (PAQ_ID) on delete restrict on update restrict;

alter table PAQUETES_X_EXTRAS add constraint FK_PAQUETES_X_EXTRAS foreign key (PAQ_ID)
      references PAQ_PAQUETES (PAQ_ID) on delete restrict on update restrict;

alter table PAQUETES_X_EXTRAS add constraint FK_PAQUETES_X_EXTRAS2 foreign key (EXT_ID)
      references EXT_EXTRAS (EXT_ID) on delete restrict on update restrict;

alter table PARTICIPANTES_PAQUETES add constraint FK_RELATIONSHIP_14 foreign key (PAR_ID)
      references PAR_PARTICIPANTES (PAR_ID) on delete restrict on update restrict;

alter table PARTICIPANTES_PAQUETES add constraint FK_RELATIONSHIP_15 foreign key (PAQ_ID)
      references PAQ_PAQUETES (PAQ_ID) on delete restrict on update restrict;

alter table PAR_PARTICIPANTES add constraint FK_COM_PAR foreign key (COM_ID)
      references COM_COMPANIA (COM_ID) on delete restrict on update restrict;

alter table PERFIL_X_RECURSOS add constraint FK_PER_PER_REC foreign key (PER_ID)
      references PER_PERFIL (PER_ID) on delete restrict on update restrict;

alter table PERFIL_X_RECURSOS add constraint FK_REC_INTER_PER foreign key (REC_ID)
      references REC_RECURSOS (REC_ID) on delete restrict on update restrict;

alter table USU_USUARIO add constraint FK_EMP_USU foreign key (EMP_ID)
      references EMP_EMPLEADOS (EMP_ID) on delete restrict on update restrict;

alter table USU_X_PER add constraint FK_USU_X_PER foreign key (USU_ID)
      references USU_USUARIO (USU_ID) on delete restrict on update restrict;

alter table USU_X_PER add constraint FK_USU_X_PER2 foreign key (PER_ID)
      references PER_PERFIL (PER_ID) on delete restrict on update restrict;

