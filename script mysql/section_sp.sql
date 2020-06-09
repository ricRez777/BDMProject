describe sectiont;

drop procedure section_SP;

/*PROCEDURE de Secciones*/
DELIMITER |
CREATE PROCEDURE section_SP(
	id_SectionP int, 
	name_sectionP varchar(50), 
    colorP varchar(100),
    activoP bit(1),
    mainP bit(1),
    caseP varchar (20))
BEGIN 
	CASE caseP
		WHEN "INSERT" THEN 
        insert into sectiont(nameSection, color, activo, main) values (name_sectionP, colorP, 1, mainP);
        
        WHEN "UPDATE" THEN 
        update sectiont SET sectiont.nameSection = name_sectionP, sectiont.color = colorP, sectiont.main = mainP where sectiont.id_Section = id_SectionP;
        
        WHEN "DELETE" THEN 
        update sectiont SET sectiont.activo = 0 where sectiont.id_Section = id_SectionP;
        
        WHEN "ACTIVE" THEN 
        update sectiont SET sectiont.activo = 1 where sectiont.id_Section = id_SectionP;
        
        WHEN "ALL_SECTIONS" THEN
        select id_Section, nameSection, color, activo, main from ALL_SECTIONS;
        
        WHEN "INDEX_SECTIONS" THEN
        select id_Section, nameSection, color, activo, main from INDEX_SECTIONS;
        
	END CASE;
END;
|

/*Ejemplo de uso con la cuenta de administrador: */
CALL section_SP(0, 'Tecnologia', '#5B4945', 1, 1, 'INSERT');

CALL section_SP(0, 'Politica', '18ABD3', 1, 1, 'INSERT');

CALL section_SP(1, '', '', '', '', 'DELETE');

CALL section_SP(3, '', '', '', '', 'ACTIVE');

CALL section_SP(0, '', '', '', '', 'ALL_SECTIONS');

CALL section_SP(3, '', '', '', '', 'DELETE');

CALL section_SP(0, '', '', '', '', 'INDEX_SECTIONS');

select * from sectiont





