--
-- PostgreSQL database dump
--

\restrict YZT8l6Bcyhc9yiTSzmH7JC2oeMnIdhW9AM0eRqS6Ub9JofAl968s9wTqwkomn2j

-- Dumped from database version 17.6
-- Dumped by pg_dump version 17.6

-- Started on 2026-05-25 12:34:35

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 6 (class 2615 OID 16451)
-- Name: tuto; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA tuto;


ALTER SCHEMA tuto OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 220 (class 1259 OID 16469)
-- Name: alumnos; Type: TABLE; Schema: tuto; Owner: postgres
--

CREATE TABLE tuto.alumnos (
    id_alumno character varying(15) NOT NULL,
    matricula character varying(20) NOT NULL,
    nombre character varying(100),
    carrera character varying(100),
    id_usuario character varying(15)
);


ALTER TABLE tuto.alumnos OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 16545)
-- Name: canalizaciones; Type: TABLE; Schema: tuto; Owner: postgres
--

CREATE TABLE tuto.canalizaciones (
    id_canalizacion character varying(15) NOT NULL,
    id_alumno character varying(15),
    motivo text,
    fecha date
);


ALTER TABLE tuto.canalizaciones OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 16591)
-- Name: constancias; Type: TABLE; Schema: tuto; Owner: postgres
--

CREATE TABLE tuto.constancias (
    id_constancia character varying(15) NOT NULL,
    id_alumno character varying(15),
    fecha date,
    estado character varying(50)
);


ALTER TABLE tuto.constancias OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 16511)
-- Name: diagnosticos; Type: TABLE; Schema: tuto; Owner: postgres
--

CREATE TABLE tuto.diagnosticos (
    id_diagnostico character varying(15) NOT NULL,
    id_alumno character varying(15),
    fecha date,
    descripcion text
);


ALTER TABLE tuto.diagnosticos OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 16533)
-- Name: evidencias; Type: TABLE; Schema: tuto; Owner: postgres
--

CREATE TABLE tuto.evidencias (
    id_evidencia character varying(15) NOT NULL,
    id_sesion character varying(15),
    descripcion text,
    archivo character varying(200)
);


ALTER TABLE tuto.evidencias OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 16491)
-- Name: grupos; Type: TABLE; Schema: tuto; Owner: postgres
--

CREATE TABLE tuto.grupos (
    id_grupo character varying(10) NOT NULL,
    nombre character varying(50),
    semestre integer
);


ALTER TABLE tuto.grupos OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 16569)
-- Name: informes; Type: TABLE; Schema: tuto; Owner: postgres
--

CREATE TABLE tuto.informes (
    id_informe character varying(15) NOT NULL,
    id_tutor character varying(15),
    descripcion text,
    fecha date
);


ALTER TABLE tuto.informes OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 16557)
-- Name: retroalimentaciones; Type: TABLE; Schema: tuto; Owner: postgres
--

CREATE TABLE tuto.retroalimentaciones (
    id_retro character varying(15) NOT NULL,
    id_canalizacion character varying(15),
    comentario text,
    fecha date
);


ALTER TABLE tuto.retroalimentaciones OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 16452)
-- Name: roles; Type: TABLE; Schema: tuto; Owner: postgres
--

CREATE TABLE tuto.roles (
    id_rol character varying(10) NOT NULL,
    nombre_rol character varying(50) NOT NULL
);


ALTER TABLE tuto.roles OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 16523)
-- Name: sesiones; Type: TABLE; Schema: tuto; Owner: postgres
--

CREATE TABLE tuto.sesiones (
    id_sesion character varying(15) NOT NULL,
    id_tutor character varying(15),
    fecha date,
    tema character varying(200)
);


ALTER TABLE tuto.sesiones OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 16496)
-- Name: tutor_grupo; Type: TABLE; Schema: tuto; Owner: postgres
--

CREATE TABLE tuto.tutor_grupo (
    id_tutor character varying(15) NOT NULL,
    id_grupo character varying(10) NOT NULL
);


ALTER TABLE tuto.tutor_grupo OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 16481)
-- Name: tutores; Type: TABLE; Schema: tuto; Owner: postgres
--

CREATE TABLE tuto.tutores (
    id_tutor character varying(15) NOT NULL,
    nombre character varying(100),
    departamento character varying(100),
    id_usuario character varying(15)
);


ALTER TABLE tuto.tutores OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16457)
-- Name: usuarios; Type: TABLE; Schema: tuto; Owner: postgres
--

CREATE TABLE tuto.usuarios (
    id_usuario character varying(15) NOT NULL,
    nombre character varying(100) NOT NULL,
    correo character varying(100) NOT NULL,
    password character varying(100) NOT NULL,
    id_rol character varying(10)
);


ALTER TABLE tuto.usuarios OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 16581)
-- Name: validaciones; Type: TABLE; Schema: tuto; Owner: postgres
--

CREATE TABLE tuto.validaciones (
    id_validacion character varying(15) NOT NULL,
    id_informe character varying(15),
    estado character varying(50),
    fecha date
);


ALTER TABLE tuto.validaciones OWNER TO postgres;

--
-- TOC entry 4986 (class 0 OID 16469)
-- Dependencies: 220
-- Data for Name: alumnos; Type: TABLE DATA; Schema: tuto; Owner: postgres
--

COPY tuto.alumnos (id_alumno, matricula, nombre, carrera, id_usuario) FROM stdin;
\.


--
-- TOC entry 4993 (class 0 OID 16545)
-- Dependencies: 227
-- Data for Name: canalizaciones; Type: TABLE DATA; Schema: tuto; Owner: postgres
--

COPY tuto.canalizaciones (id_canalizacion, id_alumno, motivo, fecha) FROM stdin;
\.


--
-- TOC entry 4997 (class 0 OID 16591)
-- Dependencies: 231
-- Data for Name: constancias; Type: TABLE DATA; Schema: tuto; Owner: postgres
--

COPY tuto.constancias (id_constancia, id_alumno, fecha, estado) FROM stdin;
\.


--
-- TOC entry 4990 (class 0 OID 16511)
-- Dependencies: 224
-- Data for Name: diagnosticos; Type: TABLE DATA; Schema: tuto; Owner: postgres
--

COPY tuto.diagnosticos (id_diagnostico, id_alumno, fecha, descripcion) FROM stdin;
\.


--
-- TOC entry 4992 (class 0 OID 16533)
-- Dependencies: 226
-- Data for Name: evidencias; Type: TABLE DATA; Schema: tuto; Owner: postgres
--

COPY tuto.evidencias (id_evidencia, id_sesion, descripcion, archivo) FROM stdin;
\.


--
-- TOC entry 4988 (class 0 OID 16491)
-- Dependencies: 222
-- Data for Name: grupos; Type: TABLE DATA; Schema: tuto; Owner: postgres
--

COPY tuto.grupos (id_grupo, nombre, semestre) FROM stdin;
\.


--
-- TOC entry 4995 (class 0 OID 16569)
-- Dependencies: 229
-- Data for Name: informes; Type: TABLE DATA; Schema: tuto; Owner: postgres
--

COPY tuto.informes (id_informe, id_tutor, descripcion, fecha) FROM stdin;
\.


--
-- TOC entry 4994 (class 0 OID 16557)
-- Dependencies: 228
-- Data for Name: retroalimentaciones; Type: TABLE DATA; Schema: tuto; Owner: postgres
--

COPY tuto.retroalimentaciones (id_retro, id_canalizacion, comentario, fecha) FROM stdin;
\.


--
-- TOC entry 4984 (class 0 OID 16452)
-- Dependencies: 218
-- Data for Name: roles; Type: TABLE DATA; Schema: tuto; Owner: postgres
--

COPY tuto.roles (id_rol, nombre_rol) FROM stdin;
ROL1	Coordinador
ROL2	Tutor
ROL3	Estudiante
\.


--
-- TOC entry 4991 (class 0 OID 16523)
-- Dependencies: 225
-- Data for Name: sesiones; Type: TABLE DATA; Schema: tuto; Owner: postgres
--

COPY tuto.sesiones (id_sesion, id_tutor, fecha, tema) FROM stdin;
\.


--
-- TOC entry 4989 (class 0 OID 16496)
-- Dependencies: 223
-- Data for Name: tutor_grupo; Type: TABLE DATA; Schema: tuto; Owner: postgres
--

COPY tuto.tutor_grupo (id_tutor, id_grupo) FROM stdin;
\.


--
-- TOC entry 4987 (class 0 OID 16481)
-- Dependencies: 221
-- Data for Name: tutores; Type: TABLE DATA; Schema: tuto; Owner: postgres
--

COPY tuto.tutores (id_tutor, nombre, departamento, id_usuario) FROM stdin;
\.


--
-- TOC entry 4985 (class 0 OID 16457)
-- Dependencies: 219
-- Data for Name: usuarios; Type: TABLE DATA; Schema: tuto; Owner: postgres
--

COPY tuto.usuarios (id_usuario, nombre, correo, password, id_rol) FROM stdin;
USR1	Hayley	brith@gmail.com	1234	ROL1
USR3	Adri	estudiante@gmail.com	1234	ROL3
USR2	Angel	tutor@gmail.com	1234	ROL2
\.


--
-- TOC entry 4996 (class 0 OID 16581)
-- Dependencies: 230
-- Data for Name: validaciones; Type: TABLE DATA; Schema: tuto; Owner: postgres
--

COPY tuto.validaciones (id_validacion, id_informe, estado, fecha) FROM stdin;
\.


--
-- TOC entry 4801 (class 2606 OID 16475)
-- Name: alumnos alumnos_matricula_key; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.alumnos
    ADD CONSTRAINT alumnos_matricula_key UNIQUE (matricula);


--
-- TOC entry 4803 (class 2606 OID 16473)
-- Name: alumnos alumnos_pkey; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.alumnos
    ADD CONSTRAINT alumnos_pkey PRIMARY KEY (id_alumno);


--
-- TOC entry 4817 (class 2606 OID 16551)
-- Name: canalizaciones canalizaciones_pkey; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.canalizaciones
    ADD CONSTRAINT canalizaciones_pkey PRIMARY KEY (id_canalizacion);


--
-- TOC entry 4825 (class 2606 OID 16595)
-- Name: constancias constancias_pkey; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.constancias
    ADD CONSTRAINT constancias_pkey PRIMARY KEY (id_constancia);


--
-- TOC entry 4811 (class 2606 OID 16517)
-- Name: diagnosticos diagnosticos_pkey; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.diagnosticos
    ADD CONSTRAINT diagnosticos_pkey PRIMARY KEY (id_diagnostico);


--
-- TOC entry 4815 (class 2606 OID 16539)
-- Name: evidencias evidencias_pkey; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.evidencias
    ADD CONSTRAINT evidencias_pkey PRIMARY KEY (id_evidencia);


--
-- TOC entry 4807 (class 2606 OID 16495)
-- Name: grupos grupos_pkey; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.grupos
    ADD CONSTRAINT grupos_pkey PRIMARY KEY (id_grupo);


--
-- TOC entry 4821 (class 2606 OID 16575)
-- Name: informes informes_pkey; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.informes
    ADD CONSTRAINT informes_pkey PRIMARY KEY (id_informe);


--
-- TOC entry 4819 (class 2606 OID 16563)
-- Name: retroalimentaciones retroalimentaciones_pkey; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.retroalimentaciones
    ADD CONSTRAINT retroalimentaciones_pkey PRIMARY KEY (id_retro);


--
-- TOC entry 4795 (class 2606 OID 16456)
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id_rol);


--
-- TOC entry 4813 (class 2606 OID 16527)
-- Name: sesiones sesiones_pkey; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.sesiones
    ADD CONSTRAINT sesiones_pkey PRIMARY KEY (id_sesion);


--
-- TOC entry 4809 (class 2606 OID 16500)
-- Name: tutor_grupo tutor_grupo_pkey; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.tutor_grupo
    ADD CONSTRAINT tutor_grupo_pkey PRIMARY KEY (id_tutor, id_grupo);


--
-- TOC entry 4805 (class 2606 OID 16485)
-- Name: tutores tutores_pkey; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.tutores
    ADD CONSTRAINT tutores_pkey PRIMARY KEY (id_tutor);


--
-- TOC entry 4797 (class 2606 OID 16463)
-- Name: usuarios usuarios_correo_key; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.usuarios
    ADD CONSTRAINT usuarios_correo_key UNIQUE (correo);


--
-- TOC entry 4799 (class 2606 OID 16461)
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 4823 (class 2606 OID 16585)
-- Name: validaciones validaciones_pkey; Type: CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.validaciones
    ADD CONSTRAINT validaciones_pkey PRIMARY KEY (id_validacion);


--
-- TOC entry 4827 (class 2606 OID 16476)
-- Name: alumnos alumnos_id_usuario_fkey; Type: FK CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.alumnos
    ADD CONSTRAINT alumnos_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES tuto.usuarios(id_usuario);


--
-- TOC entry 4834 (class 2606 OID 16552)
-- Name: canalizaciones canalizaciones_id_alumno_fkey; Type: FK CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.canalizaciones
    ADD CONSTRAINT canalizaciones_id_alumno_fkey FOREIGN KEY (id_alumno) REFERENCES tuto.alumnos(id_alumno);


--
-- TOC entry 4838 (class 2606 OID 16596)
-- Name: constancias constancias_id_alumno_fkey; Type: FK CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.constancias
    ADD CONSTRAINT constancias_id_alumno_fkey FOREIGN KEY (id_alumno) REFERENCES tuto.alumnos(id_alumno);


--
-- TOC entry 4831 (class 2606 OID 16518)
-- Name: diagnosticos diagnosticos_id_alumno_fkey; Type: FK CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.diagnosticos
    ADD CONSTRAINT diagnosticos_id_alumno_fkey FOREIGN KEY (id_alumno) REFERENCES tuto.alumnos(id_alumno);


--
-- TOC entry 4833 (class 2606 OID 16540)
-- Name: evidencias evidencias_id_sesion_fkey; Type: FK CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.evidencias
    ADD CONSTRAINT evidencias_id_sesion_fkey FOREIGN KEY (id_sesion) REFERENCES tuto.sesiones(id_sesion);


--
-- TOC entry 4836 (class 2606 OID 16576)
-- Name: informes informes_id_tutor_fkey; Type: FK CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.informes
    ADD CONSTRAINT informes_id_tutor_fkey FOREIGN KEY (id_tutor) REFERENCES tuto.tutores(id_tutor);


--
-- TOC entry 4835 (class 2606 OID 16564)
-- Name: retroalimentaciones retroalimentaciones_id_canalizacion_fkey; Type: FK CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.retroalimentaciones
    ADD CONSTRAINT retroalimentaciones_id_canalizacion_fkey FOREIGN KEY (id_canalizacion) REFERENCES tuto.canalizaciones(id_canalizacion);


--
-- TOC entry 4832 (class 2606 OID 16528)
-- Name: sesiones sesiones_id_tutor_fkey; Type: FK CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.sesiones
    ADD CONSTRAINT sesiones_id_tutor_fkey FOREIGN KEY (id_tutor) REFERENCES tuto.tutores(id_tutor);


--
-- TOC entry 4829 (class 2606 OID 16506)
-- Name: tutor_grupo tutor_grupo_id_grupo_fkey; Type: FK CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.tutor_grupo
    ADD CONSTRAINT tutor_grupo_id_grupo_fkey FOREIGN KEY (id_grupo) REFERENCES tuto.grupos(id_grupo);


--
-- TOC entry 4830 (class 2606 OID 16501)
-- Name: tutor_grupo tutor_grupo_id_tutor_fkey; Type: FK CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.tutor_grupo
    ADD CONSTRAINT tutor_grupo_id_tutor_fkey FOREIGN KEY (id_tutor) REFERENCES tuto.tutores(id_tutor);


--
-- TOC entry 4828 (class 2606 OID 16486)
-- Name: tutores tutores_id_usuario_fkey; Type: FK CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.tutores
    ADD CONSTRAINT tutores_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES tuto.usuarios(id_usuario);


--
-- TOC entry 4826 (class 2606 OID 16464)
-- Name: usuarios usuarios_id_rol_fkey; Type: FK CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.usuarios
    ADD CONSTRAINT usuarios_id_rol_fkey FOREIGN KEY (id_rol) REFERENCES tuto.roles(id_rol);


--
-- TOC entry 4837 (class 2606 OID 16586)
-- Name: validaciones validaciones_id_informe_fkey; Type: FK CONSTRAINT; Schema: tuto; Owner: postgres
--

ALTER TABLE ONLY tuto.validaciones
    ADD CONSTRAINT validaciones_id_informe_fkey FOREIGN KEY (id_informe) REFERENCES tuto.informes(id_informe);


-- Completed on 2026-05-25 12:34:36

--
-- PostgreSQL database dump complete
--

\unrestrict YZT8l6Bcyhc9yiTSzmH7JC2oeMnIdhW9AM0eRqS6Ub9JofAl968s9wTqwkomn2j

