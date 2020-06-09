/*Triggers*/
/*Trigger para poner inactivas todas las noticias de las secciones que hayan sido dadas de baja*/
/*DROP TRIGGER Trigger_DeleteNewsSections;*/
DELIMITER |
create trigger Trigger_DeleteNewsSections after update on sectiont for each row 
	BEGIN
		if NEW.activo = 0 then
			update newst as N SET activo = 0 where N.id_Section = New.id_Section;
        end if;
	END 
| DELIMITER ;
/*Trigger para activar todas las noticias de las secciones que hayan sido dadas de alta*/
/*DROP TRIGGER Trigger_ActiveNewsSections;*/
DELIMITER |
create trigger Trigger_ActiveNewsSections after update on sectiont for each row 
	BEGIN
		if NEW.activo = 1 then
			update newst as N SET activo = 1 where N.id_Section = New.id_Section;
        end if;
	END 
| DELIMITER ;