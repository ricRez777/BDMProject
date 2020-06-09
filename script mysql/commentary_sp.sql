describe commentaryt;

drop procedure commentary_SP;

/*PROCEDURE de Secciones*/
DELIMITER |
CREATE PROCEDURE commentary_SP(
	id_commentaryP int, 
	commentaryP varchar(250),
    id_UseP int,
    id_NewsP int,
    caseP varchar (20))
BEGIN 
	CASE caseP
		
        WHEN "INSERT" THEN
        insert into commentaryt (commentary, id_Use, id_News) values (commentaryP, id_UseP, id_NewsP);
        
        WHEN "DELETE" THEN
        delete from commentaryt where id_commentary = id_commentaryP;
        
        WHEN "ALL_BY_NEWS" THEN
        select C.id_commentary, C.commentary, U.nameComplete from commentaryt AS C
        inner join usert as U on C.id_Use = U.id_Use
        where C.id_News = id_NewsP order by C.id_commentary DESC;
        
	END CASE;
END;
|

CALL commentary_SP(0, 'Texto', id_UseP, id_NewsP, 'INSERT');

CALL commentary_SP(0, 'mugres feos', 2, 62, 'INSERT');

CALL commentary_SP(0, '', 0, 62, 'ALL_BY_NEWS');

select * from commentaryt;





