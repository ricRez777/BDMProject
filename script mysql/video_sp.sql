describe videot;

drop procedure video_SP;

/*PROCEDURE de imagenes*/
DELIMITER |
CREATE PROCEDURE video_SP(
	id_videoP int, 
	videoP blob, 
    coverP bit(1), 
    activoP bit(1),
    id_newsP int(11),
    caseP varchar (20))
BEGIN 
	CASE caseP
		WHEN "INSERT" THEN 
        insert into videot(video, cover, activo, id_News) values (videoP, coverP, 1, id_newsP);
        
        WHEN "UPDATE" THEN 
        update videot SET video = videoP, cover = coverP, id_News = id_newsP where id_video = id_videoP;
        
        WHEN "DELETE" THEN 
        update videot SET activo = 0 where id_video = id_videoP;
        
        WHEN "ACTIVE" THEN 
        update videot SET activo = 1 where id_video = id_videoP;
        
        WHEN "LAST_INSERTED" THEN
		select id_News from newst order by id_News desc limit 1;
        
        WHEN "SELECT" THEN
        select id_video, video, cover from videot where id_News = id_newsP AND activo = 1;
        
	END CASE;
END;
|

/*Ejemplo de uso con la cuenta de administrador: */
CALL video_SP(0, 'blob', cover, activo, id_News, 'INSERT');

CALL video_SP(1, 'blob', cover, activo, id_News, 'UPDATE');

CALL video_SP(1, null, 0, 0, 0, 'DELETE');

CALL video_SP(1, null, 0, 0, 0, 'ACTIVE');

delete from videot where id_video <> 0



