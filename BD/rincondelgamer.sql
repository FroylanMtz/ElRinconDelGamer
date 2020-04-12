-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-04-2020 a las 05:44:40
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rincondelgamer`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `aceptar_invitacion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `aceptar_invitacion` (`_idEquipo` INT, `_idUsu` INT)  begin
	update usuariosEquipo set
		confirmo=1
	where idEquipo=_idEquipo and idUsuario=_idUsu;
end$$

DROP PROCEDURE IF EXISTS `add_accesorio`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_accesorio` (`_id` INT, `_nombre` VARCHAR(25), `_costo` INT)  begin
	if _id = 0 then
		insert into accesorio(nombre,costo) values(_nombre,_costo);
    else
		update accesorio set
			nombre=_nombre,
            costo=_costo
		where idAccesorio=_id;
    end if;
end$$

DROP PROCEDURE IF EXISTS `add_accesorioRenta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_accesorioRenta` (`_idUsu` INT, `_idAcc` INT, `_nHoras` INT)  begin
	insert into rentaAccesorio(idRenta,idAccesorio,nHoras) values(_idUsu,_idAcc,_nHoras);
end$$

DROP PROCEDURE IF EXISTS `add_consola`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_consola` (`_id` INT, `_ids` BLOB, `_nombre` VARCHAR(25), `_numero` VARCHAR(5), `_seriall` VARCHAR(20), `_costo` INT, `_monedasGanadas` INT, `_costoMonedas` INT, `_nIds` INT)  begin
	declare i int default 1;
	if _id = 0 then		
		my_loop: LOOP
            insert into consola(idPlataforma,nombre,numero,seriall,costo,premioMonedas,costoMonedas) values(cast(ExtractValue(_ids, '//id[$i]') as signed),_nombre,_numero,_seriall,_costo,_monedasGanadas,_costoMonedas);
			SET i=i+1;
			IF i=_nIds + 1 THEN
				LEAVE my_loop;
			END IF;
		END LOOP my_loop;		
    else
		update consola set
			nombre=_nombre,
            numero=_numero,
            seriall=_seriall,
            costo=_costo,
            premioMonedas=_monedasGanadas,
            costoMonedas=_costoMonedas
		where idConsola=_id;
    end if;
end$$

DROP PROCEDURE IF EXISTS `add_dulce`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_dulce` (`_id` INT, `_nombre` VARCHAR(25), `_costo` INT, `_monDad` INT)  begin
	if _id = 0 then
		insert into dulce(nombre,precio,premioMonedas) values(_nombre,_costo,_monDad);
    else
		update dulce set
			nombre=_nombre,
            precio=_costo,
            premioMonedas=_monDad
		where idDulce=_id;
    end if;
end$$

DROP PROCEDURE IF EXISTS `add_equipoTorneo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_equipoTorneo` (`_idTorneo` INT, `_nombreEq` VARCHAR(25), `_ids` BLOB, `_nIds` INT, `_idUsu` INT)  begin
	declare i int default 1;
    declare _idEquipo int default 0;
	insert into equipoTorneo(idTorneo,nombre)values(_idTorneo,_nombreEq);
    set _idEquipo = (SELECT max(idEquipo) from equipoTorneo);
    insert into usuariosEquipo(idEquipo,idUsuario,confirmo) values(_idEquipo,_idUsu,1);
    if _nIds > 0 then
		my_loop: LOOP
			insert into usuariosEquipo(idEquipo,idUsuario) values(_idEquipo,cast(ExtractValue(_ids, '//id[$i]') as signed));
			SET i=i+1;
			IF i=_nIds + 1 THEN
				LEAVE my_loop;
			END IF;
		END LOOP my_loop;
    end if;
end$$

DROP PROCEDURE IF EXISTS `add_juego`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_juego` (`_id` INT, `_ids` BLOB, `_nombre` VARCHAR(20), `_foto` VARCHAR(70), `_nIds` INT)  begin
	declare i int default 1;
	if _id = 0 then
		insert into juego(nombre,rutaFoto)values(_nombre,_foto);
        SELECT max(idJuego) from juego;
		my_loop: LOOP
            insert into consolaJuego(idConsola,idJuego) values(cast(ExtractValue(_ids, '//id[$i]') as signed),(SELECT max(idJuego) from juego));
			SET i=i+1;
			IF i=_nIds + 1 THEN
				LEAVE my_loop;
			END IF;
		END LOOP my_loop;		
    else
		update juego set
			nombre=_nombre,
            rutaFoto=_foto
		where idJuego=_id;
    end if;
end$$

DROP PROCEDURE IF EXISTS `add_plataforma`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_plataforma` (`_id` INT, `_nombre` VARCHAR(25))  begin
	if _id = 0 then
		insert into plataforma(nombre) values(_nombre);
    else
		update plataforma set
			nombre=_nombre
		where idPlataforma=_id;
    end if;
end$$

DROP PROCEDURE IF EXISTS `add_premio`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_premio` (`_idTorneo` INT, `_premio1` VARCHAR(100), `_premio2` VARCHAR(100), `_premio3` VARCHAR(100))  begin
	insert into premio(idTorneo,posicion,premio) values(_idTorneo,1,_premio1);
    insert into premio(idTorneo,posicion,premio) values(_idTorneo,2,_premio2);
    insert into premio(idTorneo,posicion,premio) values(_idTorneo,3,_premio3);
end$$

DROP PROCEDURE IF EXISTS `add_renta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_renta` (`_id` INT, `_idUsu` INT, `_idCon` INT, `_idJue` INT, `_fecha` DATE, `_hora` TIME, `_promo` INT, `_monGan` INT, `_monUs` INT)  begin
	declare i int default 1;
	if _id = 0 then
		insert into renta(idUsuario,idConsola,idJuego,fecha,hora,promocionActiva)values(_idUsu,_idCon,_idJue,_fecha,_hora,_promo);
    else
		update renta set
			estatus=0,
            monedasGanadas=_monGan,
            monedasUsadas=_monUs
		where idRenta=_id;
    end if;
end$$

DROP PROCEDURE IF EXISTS `add_torneo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_torneo` (`_id` INT, `_idCon` INT, `_idJue` INT, `_titulo` VARCHAR(30), `_fecha` DATE, `_hora` TIME, `_modalidad` INT, `_totalInt` INT, `_forma` INT, `_maxJug` INT, `_descripcion` VARCHAR(150), `_costo` INT)  begin
	if _id = 0 then
		insert into torneo(idConsola,idJuego,titulo,fecha,hora,modalidad,totalIntegrantesEquipo,forma,maximoEquipos,descripcion,costo)values
        (_idCon,_idJue,_titulo,_fecha,_hora,_modalidad,_totalInt,_forma,_maxJug,_descripcion,_costo);
    else
		update torneo set
            idConsola=_idCon,
            idJuego=_idJue,
            titulo=_titulo,
            fecha=_fecha,
            hora=_hora,
            modalidad=_modalidad,
            totalIntegrantesEquipo=_totalInt,
            forma=_forma,
            maximoEquipos=_maxJug,
            descripcion=_descripcion,
            costo=_costo
		where idTorneo=_id;
    end if;
end$$

DROP PROCEDURE IF EXISTS `add_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_usuario` (`_id` INT, `_idRol` INT, `_nombre` VARCHAR(30), `_aPaterno` VARCHAR(30), `_aMaterno` VARCHAR(30), `_fechaN` DATE, `_genero` INT, `_telefono` VARCHAR(10), `_correo` VARCHAR(25), `_usuario` VARCHAR(20), `_contra` VARCHAR(100), `_rutaFoto` VARCHAR(70), `_idUsRef` INT)  begin
	declare _monedasRef int default 0;
	set _monedasRef = (select monedasReferencia from usuario limit 1);
	if _id = 0 then		
		insert into usuario(idRol,nombre,aPaterno,aMaterno,fechaNacimiento,genero,telefono,correo,usuario,contrasenia,rutaFoto,idUsuarioReferencia,monedasReferencia)values
		(_idRol,_nombre,_aPaterno,_aMaterno,_fechaN,_genero,_telefono,_correo,_usuario,_contra,_rutaFoto,_idUsRef,_monedasRef);
	else
		update usuario set
			idRol=_idRol,
            nombre=_nombre,
            aPaterno=_aPaterno,
            aMaterno=_aMaterno,
            fechaNacimiento=_fechaN,
            genero=_genero,
            telefono=_telefono,
            correo=_correo,
            usuario=_usuario,
            contrasenia=_contra,
            rutaFoto=_rutaFoto,
            idUsuarioReferencia=_idUsRef,
            monedasReferencia=_monedasRef
		where idUsuario=_id;
	end if;
end$$

DROP PROCEDURE IF EXISTS `add_ventaDulce`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_ventaDulce` (`_idUsu` INT, `_idDul` INT, `_cant` INT)  begin
	insert into rentadulce(idRenta,idDulce,cantidad) values(_idUsu,_idDul,_cant);
end$$

DROP PROCEDURE IF EXISTS `cancelar_torneo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `cancelar_torneo` (`_id` INT)  begin
	update torneo set
		estatus=4
	where idTorneo=_id;
end$$

DROP PROCEDURE IF EXISTS `delete_accesorio`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_accesorio` (IN `_id` INT)  begin
	delete from accesorio where idAccesorio=_id;
end$$

DROP PROCEDURE IF EXISTS `delete_consola`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_consola` (IN `_id` INT)  begin
	delete from consola where idConsola=_id;
end$$

DROP PROCEDURE IF EXISTS `delete_dulce`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_dulce` (IN `_id` INT)  begin
	delete from dulce where idDulce=_id;
end$$

DROP PROCEDURE IF EXISTS `delete_juego`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_juego` (IN `_id` INT)  begin
	delete from juego where idJuego=_id;
end$$

DROP PROCEDURE IF EXISTS `delete_plataforma`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_plataforma` (IN `_id` INT)  begin
	delete from plataforma where idPlataforma=_id;
end$$

DROP PROCEDURE IF EXISTS `delete_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_usuario` (IN `_id` INT)  begin
	update usuario set
		idUsuarioReferencia = 0
	where idUsuarioReferencia=_id;
	delete from usuario where idUsuario=_id;
end$$

DROP PROCEDURE IF EXISTS `finalizar_torneo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `finalizar_torneo` (`_id` INT)  begin
	update torneo set
		estatus=3
	where idTorneo=_id;
end$$

DROP PROCEDURE IF EXISTS `get_accesorio`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_accesorio` (`_id` INT)  begin
	select * from accesorio where idAccesorio=_id;
end$$

DROP PROCEDURE IF EXISTS `get_accesorios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_accesorios` ()  begin
	select * from accesorio order by nombre;
end$$

DROP PROCEDURE IF EXISTS `get_accesoriosRenta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_accesoriosRenta` ()  begin
	select a.nombre,concat(u.nombre,' ',u.aPaterno,' (',u.usuario,')') usuario, ra.nHoras
    from rentaAccesorio ra
    inner join accesorio a on a.idAccesorio = ra.idAccesorio
    inner join renta r on r.idRenta=ra.idRenta
    inner join usuario u on u.idUsuario = r.idUsuario
    order by nombre;
end$$

DROP PROCEDURE IF EXISTS `get_consola`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_consola` (`_id` INT)  begin
	select * from consola where idConsola=_id;
end$$

DROP PROCEDURE IF EXISTS `get_consolas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_consolas` ()  begin
	select c.idConsola,c.idPlataforma, p.nombre nombrePla, c.nombre, c.numero, c.seriall, c.costo, c.premioMonedas, c.costoMonedas from consola c
    inner join plataforma p on p.idPlataforma=c.idPlataforma
    order by c.nombre;
end$$

DROP PROCEDURE IF EXISTS `get_dulce`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_dulce` (`_id` INT)  begin
	select * from dulce where idDulce=_id;
end$$

DROP PROCEDURE IF EXISTS `get_dulces`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_dulces` ()  begin
	select * from dulce order by nombre;
end$$

DROP PROCEDURE IF EXISTS `get_DulcesVenta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_DulcesVenta` ()  begin
	select d.nombre,concat(u.nombre,' ',u.aPaterno,' (',u.usuario,')') usuario, rd.cantidad
    from rentadulce rd
    inner join dulce d on d.idDulce= rd.idDulce
    inner join renta r on r.idRenta=rd.idRenta
    inner join usuario u on u.idUsuario = r.idUsuario
    order by nombre;
end$$

DROP PROCEDURE IF EXISTS `get_equiposPremios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_equiposPremios` (`_idTorneo` INT)  begin
	select et.idEquipo,et.nombre from equipotorneo et
    where et.idTorneo = _idTorneo;
end$$

DROP PROCEDURE IF EXISTS `get_HistoricoCambioMonedas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_HistoricoCambioMonedas` (`_idU` INT)  begin
	select r.idRenta,concat(u.nombre,' ',u.aPaterno,' (',u.usuario,')') usuario,c.nombre nombreCon,j.nombre nombreJu,r.fecha,r.hora,r.monedasUsadas from renta r
    inner join usuario u on u.idUsuario=r.idUsuario
    inner join consola c on c.idConsola=r.idConsola
    inner join juego j on j.idJuego=r.idJuego
    where r.estatus = 0 and r.idUsuario = _idU and r.monedasUsadas > 0
    order by fecha,hora;
end$$

DROP PROCEDURE IF EXISTS `get_invitaciones`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_invitaciones` (`_idUsuario` INT)  begin
	select ue.idEquipo,et.nombre equipo,t.titulo,t.fecha,t.hora from usuariosEquipo ue
    inner join equipoTorneo et on et.idEquipo=ue.idEquipo
    inner join torneo t on t.idTorneo=et.idTorneo
    where ue.confirmo=0 and ue.idUsuario in (_idUsuario);
end$$

DROP PROCEDURE IF EXISTS `get_juego`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_juego` (`_id` INT)  begin
	select * from juego where idJuego=_id;
end$$

DROP PROCEDURE IF EXISTS `get_juegos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_juegos` ()  begin
	select j.idJuego,j.nombre,j.rutaFoto,c.nombre nombreCon, p.nombre nombrePla from juego j
    inner join consolaJuego cj on cj.idJuego=j.idJuego
    inner join consola c on c.idConsola=cj.idConsola
    inner join plataforma p on p.idPlataforma=c.idPlataforma
    order by j.nombre;
end$$

DROP PROCEDURE IF EXISTS `get_juegosCon`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_juegosCon` (`_idCon` INT)  begin
	select j.idJuego,j.nombre,j.rutaFoto,c.nombre nombreCon, p.nombre nombrePla from juego j
    inner join consolaJuego cj on cj.idJuego=j.idJuego
    inner join consola c on c.idConsola=cj.idConsola
    inner join plataforma p on p.idPlataforma=c.idPlataforma
    where c.idConsola=_idCon
    order by j.nombre;
end$$

DROP PROCEDURE IF EXISTS `get_login`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_login` (`_usuario` VARCHAR(20), `_contra` VARCHAR(100))  begin
	select * from usuario where usuario=_usuario and contrasenia=_contra;
end$$

DROP PROCEDURE IF EXISTS `get_MisTorneos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_MisTorneos` (`_idUsuario` INT)  begin
	select t.idTorneo,t.titulo, c.nombre nombreCon, j.nombre nombreJue,t.fecha,t.hora,t.modalidad,t.totalIntegrantesEquipo,t.forma,t.maximoEquipos,
    t.descripcion,t.estatus,t.costo,ue.idUsuario from torneo t
    left join equipoTorneo et on et.idTorneo=t.idTorneo
    left join usuariosEquipo ue on ue.idEquipo=et.idEquipo
    inner join consola c on c.idConsola=t.idConsola
    inner join juego j on j.idJuego=t.idJuego      
    where t.estatus=1 and ue.confirmo=1
    order by fecha,hora;
end$$

DROP PROCEDURE IF EXISTS `get_monedasActuales`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_monedasActuales` (`_id` INT)  begin	
	select totalMonedas from usuario where idUsuario=_id;
end$$

DROP PROCEDURE IF EXISTS `get_monedasRef`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_monedasRef` ()  begin
	select monedasReferencia from usuario limit 1;
end$$

DROP PROCEDURE IF EXISTS `get_plataforma`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_plataforma` (`_id` INT)  begin
	select * from plataforma where idPlataforma=_id;
end$$

DROP PROCEDURE IF EXISTS `get_plataformas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_plataformas` ()  begin
	select * from plataforma order by nombre;
end$$

DROP PROCEDURE IF EXISTS `get_premios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_premios` ()  begin
	select p.idPremio,p.idTorneo,t.titulo,p.posicion,p.premio from premio p
    inner join torneo t on t.idTorneo = p.idTorneo
    order by t.idTorneo;
end$$

DROP PROCEDURE IF EXISTS `get_renta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_renta` (`_id` INT)  begin
	declare _totalAccesorios int default 0;
    declare _totalDulces int default 0;
    declare _monedasDulces int default 0;
    set _totalAccesorios = (select sum(ra.nHoras*a.costo) from renta r 
    inner join rentaAccesorio ra on ra.idRenta=r.idRenta
    inner join accesorio a on a.idAccesorio=ra.idAccesorio where r.idRenta=_id);    
    set _totalDulces = (select sum(rd.cantidad*d.precio) from renta r 
    inner join rentaDulce rd on rd.idRenta=r.idRenta
    inner join dulce d on d.idDulce=rd.idDulce where r.idRenta=_id);
    set _monedasDulces = (select sum(rd.cantidad*d.premioMonedas) from renta r 
    inner join rentaDulce rd on rd.idRenta=r.idRenta
    inner join dulce d on d.idDulce=rd.idDulce where r.idRenta=_id);
	select r.idRenta,concat(u.nombre,' ',u.aPaterno,' (',u.usuario,')') usuario,c.nombre nombreCon,r.idConsola,j.nombre nombreJu,r.fecha,r.hora,
    r.promocionActiva,c.costo,c.premioMonedas,c.costoMonedas,u.totalMonedas,_totalAccesorios totalAccesorios,_totalDulces totalDulces,
    _monedasDulces monedasDulces
    from renta r
    inner join usuario u on u.idUsuario=r.idUsuario
    inner join consola c on c.idConsola=r.idConsola
    inner join juego j on j.idJuego=r.idJuego
    where r.idRenta=_id;
end$$

DROP PROCEDURE IF EXISTS `get_rentas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_rentas` ()  begin
	select r.idRenta,concat(u.nombre,' ',u.aPaterno,' (',u.usuario,')') usuario,c.nombre nombreCon,j.nombre nombreJu,r.fecha,r.hora,r.promocionActiva from renta r
    inner join usuario u on u.idUsuario=r.idUsuario
    inner join consola c on c.idConsola=r.idConsola
    inner join juego j on j.idJuego=r.idJuego
    where r.estatus = 1
    order by fecha,hora;
end$$

DROP PROCEDURE IF EXISTS `get_rentasHistorico`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_rentasHistorico` (`_idU` INT)  begin
	select r.idRenta,concat(u.nombre,' ',u.aPaterno,' (',u.usuario,')') usuario,c.nombre nombreCon,j.nombre nombreJu,r.fecha,r.hora,r.promocionActiva from renta r
    inner join usuario u on u.idUsuario=r.idUsuario
    inner join consola c on c.idConsola=r.idConsola
    inner join juego j on j.idJuego=r.idJuego
    where r.estatus = 0 and r.idUsuario = _idU
    order by fecha,hora;
end$$

DROP PROCEDURE IF EXISTS `get_Torneo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_Torneo` (`_id` INT)  begin
	select t.idTorneo,t.titulo, c.nombre nombreCon, j.nombre nombreJue,t.fecha,t.hora,t.modalidad,t.totalIntegrantesEquipo,t.forma,t.maximoEquipos,
    t.descripcion,t.estatus,t.costo from torneo t
    inner join consola c on c.idConsola=t.idConsola
    inner join juego j on j.idJuego=t.idJuego 
    where t.idTorneo=_id
    order by fecha,hora;
end$$

DROP PROCEDURE IF EXISTS `get_Torneos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_Torneos` ()  begin
	update torneo set 
    estatus=2
    where fecha <= CURDATE() and hora <= curTime();
	select t.idTorneo,t.titulo, c.nombre nombreCon, j.nombre nombreJue,t.fecha,t.hora,t.modalidad,t.totalIntegrantesEquipo,t.forma,t.maximoEquipos,
    t.descripcion,t.estatus,t.costo from torneo t
    inner join consola c on c.idConsola=t.idConsola
    inner join juego j on j.idJuego=t.idJuego 
    order by fecha,hora;
end$$

DROP PROCEDURE IF EXISTS `get_TorneosPremios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_TorneosPremios` ()  begin
	select t.idTorneo,t.titulo, c.nombre nombreCon, j.nombre nombreJue,t.fecha,t.hora,t.modalidad,t.totalIntegrantesEquipo,t.forma,t.maximoEquipos,
    t.descripcion,t.estatus,t.costo from torneo t
    inner join consola c on c.idConsola=t.idConsola
    inner join juego j on j.idJuego=t.idJuego
    where t.idTorneo not in (select idTorneo from premio) and t.estatus=1
    order by fecha,hora;
end$$

DROP PROCEDURE IF EXISTS `get_TorneosRegistro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_TorneosRegistro` (`_idUsuario` INT)  begin
	select t.idTorneo,t.titulo, c.nombre nombreCon, j.nombre nombreJue,t.fecha,t.hora,t.modalidad,t.totalIntegrantesEquipo,t.forma,t.maximoEquipos,
    t.descripcion,t.estatus,t.costo,ue.idUsuario from torneo t
    left join equipoTorneo et on et.idTorneo=t.idTorneo
    left join usuariosEquipo ue on ue.idEquipo=et.idEquipo
    inner join consola c on c.idConsola=t.idConsola
    inner join juego j on j.idJuego=t.idJuego      
    where t.estatus=1
    order by fecha,hora;
end$$

DROP PROCEDURE IF EXISTS `get_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_usuario` (IN `_id` INT)  begin
	select * from usuario where idUsuario=_id;
end$$

DROP PROCEDURE IF EXISTS `get_usuarios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_usuarios` ()  begin
	select * from usuario where idUsuario > 1;
end$$

DROP PROCEDURE IF EXISTS `get_usuariosRef`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_usuariosRef` ()  begin
	select idUsuario,nombre,aPaterno,usuario from usuario 
	where idRol = 2 and idUsuario not in (select idUsuario from renta where promocionActiva=1);
end$$

DROP PROCEDURE IF EXISTS `get_usuariosRen`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_usuariosRen` ()  begin
	select idUsuario,nombre,aPaterno,usuario from usuario
    where idUsuario not in (select idUsuario from renta where estatus=1) and idRol = 2;
end$$

DROP PROCEDURE IF EXISTS `get_usuariosRenAcc`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_usuariosRenAcc` ()  begin
	select r.idRenta,u.idUsuario,concat(u.nombre,' ',u.aPaterno,' (',u.usuario,')') usuario from usuario u
    inner join renta r on r.idUsuario=u.idUsuario
    where u.idRol = 2  and r.estatus=1;
end$$

DROP PROCEDURE IF EXISTS `pagar_renta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `pagar_renta` (`_id` INT, `_monUs` INT, `_monGan` INT, `_met` INT)  begin
	declare _idUsu int default 0;
    set _idUsu = (select idUsuario from renta where idRenta=_id);
	if _met = 1 then
		update renta set
			estatus=0,
            monedasGanadas=_monGan
		where idRenta=_id;
        update usuario set
			totalMonedas = totalMonedas + _monGan
		where idUsuario = _idUsu;
	else
		update renta set
			estatus=0,
            monedasGanadas=_monGan,
            monedasUsadas=_monUs
		where idRenta=_id;
        update usuario set
			totalMonedas = (totalMonedas + _monGan) - _monUs
		where idUsuario = _idUsu;
    end if;
end$$

DROP PROCEDURE IF EXISTS `updateMonedasRef`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateMonedasRef` (`_monedas` INT)  begin
	update usuario set
		monedasReferencia=_monedas
	where idUsuario>=1;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorio`
--

DROP TABLE IF EXISTS `accesorio`;
CREATE TABLE IF NOT EXISTS `accesorio` (
  `idAccesorio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `costo` int(11) NOT NULL,
  PRIMARY KEY (`idAccesorio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consola`
--

DROP TABLE IF EXISTS `consola`;
CREATE TABLE IF NOT EXISTS `consola` (
  `idConsola` int(11) NOT NULL AUTO_INCREMENT,
  `idPlataforma` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `seriall` varchar(20) DEFAULT NULL,
  `costo` int(11) NOT NULL,
  `premioMonedas` int(11) NOT NULL,
  `costoMonedas` int(11) NOT NULL,
  PRIMARY KEY (`idConsola`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consolajuego`
--

DROP TABLE IF EXISTS `consolajuego`;
CREATE TABLE IF NOT EXISTS `consolajuego` (
  `idConsola` int(11) NOT NULL,
  `idJuego` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dulce`
--

DROP TABLE IF EXISTS `dulce`;
CREATE TABLE IF NOT EXISTS `dulce` (
  `idDulce` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `precio` int(11) NOT NULL,
  `premioMonedas` int(11) NOT NULL,
  PRIMARY KEY (`idDulce`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipotorneo`
--

DROP TABLE IF EXISTS `equipotorneo`;
CREATE TABLE IF NOT EXISTS `equipotorneo` (
  `idEquipo` int(11) NOT NULL AUTO_INCREMENT,
  `idTorneo` int(11) NOT NULL,
  `idPremio` int(11) DEFAULT NULL,
  `nombre` varchar(25) NOT NULL,
  PRIMARY KEY (`idEquipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

DROP TABLE IF EXISTS `juego`;
CREATE TABLE IF NOT EXISTS `juego` (
  `idJuego` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `rutaFoto` varchar(1000) NOT NULL,
  PRIMARY KEY (`idJuego`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

DROP TABLE IF EXISTS `plataforma`;
CREATE TABLE IF NOT EXISTS `plataforma` (
  `idPlataforma` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  PRIMARY KEY (`idPlataforma`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premio`
--

DROP TABLE IF EXISTS `premio`;
CREATE TABLE IF NOT EXISTS `premio` (
  `idPremio` int(11) NOT NULL AUTO_INCREMENT,
  `idTorneo` int(11) NOT NULL,
  `posicion` int(11) NOT NULL,
  `premio` varchar(100) NOT NULL,
  PRIMARY KEY (`idPremio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redsocial`
--

DROP TABLE IF EXISTS `redsocial`;
CREATE TABLE IF NOT EXISTS `redsocial` (
  `idRedSocial` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  PRIMARY KEY (`idRedSocial`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redsocialusuario`
--

DROP TABLE IF EXISTS `redsocialusuario`;
CREATE TABLE IF NOT EXISTS `redsocialusuario` (
  `idUsuario` int(11) NOT NULL,
  `idRedSocial` int(11) NOT NULL,
  `nombreUsuarioEnRed` varchar(50) NOT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renta`
--

DROP TABLE IF EXISTS `renta`;
CREATE TABLE IF NOT EXISTS `renta` (
  `idRenta` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idConsola` int(11) NOT NULL,
  `idJuego` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `promocionActiva` int(11) NOT NULL DEFAULT '0',
  `monedasGanadas` int(11) DEFAULT '0',
  `monedasUsadas` int(11) DEFAULT '0',
  `estatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idRenta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentaaccesorio`
--

DROP TABLE IF EXISTS `rentaaccesorio`;
CREATE TABLE IF NOT EXISTS `rentaaccesorio` (
  `idRenta` int(11) NOT NULL,
  `idAccesorio` int(11) NOT NULL,
  `nHoras` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentadulce`
--

DROP TABLE IF EXISTS `rentadulce`;
CREATE TABLE IF NOT EXISTS `rentadulce` (
  `idRenta` int(11) NOT NULL,
  `idDulce` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`) VALUES
(1, 'Admin'),
(2, 'Gamer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

DROP TABLE IF EXISTS `torneo`;
CREATE TABLE IF NOT EXISTS `torneo` (
  `idTorneo` int(11) NOT NULL AUTO_INCREMENT,
  `idConsola` int(11) NOT NULL,
  `idJuego` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `modalidad` int(11) NOT NULL,
  `totalIntegrantesEquipo` int(11) NOT NULL,
  `forma` int(11) NOT NULL,
  `maximoEquipos` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  `costo` int(11) NOT NULL,
  PRIMARY KEY (`idTorneo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idRol` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `aPaterno` varchar(20) NOT NULL,
  `aMaterno` varchar(20) DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` int(11) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(25) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  `rutaFoto` varchar(70) DEFAULT NULL,
  `idUsuarioReferencia` int(11) DEFAULT '0',
  `monedasReferencia` int(11) DEFAULT '0',
  `totalMonedas` int(11) DEFAULT '0',
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `idRol`, `nombre`, `aPaterno`, `aMaterno`, `fechaNacimiento`, `genero`, `telefono`, `correo`, `usuario`, `contrasenia`, `rutaFoto`, `idUsuarioReferencia`, `monedasReferencia`, `totalMonedas`) VALUES
(1, 1, 'Sheyla', 'Silva', 'Glz', '0000-00-00', 0, '', '', 'Admin', 'e3afed0047b08059d0fada10f400c1e5', NULL, 0, 0, 0),
(2, 2, 'Sheyla ', 'Silva', 'Gonzalez', '2020-04-14', 1, '82565210', 'sheyla@gmai.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'ruta', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosequipo`
--

DROP TABLE IF EXISTS `usuariosequipo`;
CREATE TABLE IF NOT EXISTS `usuariosequipo` (
  `idEquipo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `confirmo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
