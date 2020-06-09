describe liket;

drop procedure like_SP;

/*PROCEDURE de Secciones*/
DELIMITER |
CREATE PROCEDURE like_SP(
	id_likeP int, 
	status_likeP bit(1),
    id_UseP int,
    id_NewsP int,
    caseP varchar (20))
BEGIN 
	CASE caseP
		
        WHEN "INSERT" THEN
        insert into liket(status_like, id_Use, id_News) values (status_likeP, id_UseP, id_NewsP);
        
        WHEN "LIKE" THEN
        update liket SET status_like = status_likeP where id_like = id_likeP;
        
        WHEN "SELECT" THEN
        select id_like, status_like from liket where id_Use = id_UseP AND id_News = id_NewsP;
        
        WHEN "COUNT_LIKE" THEN
        select count(id_like) as NumLike from liket where id_News = id_NewsP AND status_like = 1;
        
	END CASE;
END;
|

CALL like_SP(0, 1, id_UseP, id_NewsP, 'INSERT');

CALL like_SP(0, 0, 2, 62, 'SELECT');

CALL like_SP(0, 0, 0, 61, 'COUNT_LIKE');

select * from liket

