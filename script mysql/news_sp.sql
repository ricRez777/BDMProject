describe newst;

drop procedure news_SP;

/*PROCEDURE de usuarios*/
DELIMITER |
CREATE PROCEDURE news_SP(
	id_NewsP int, 
	titleP varchar(200), 
    descriptionP varchar(250), 
    textNewsP varchar(1000),
	eventDateP datetime,
    publicationDateP date,
    locationP varchar(100),
    keywordsP varchar(200),
    statusNewsP varchar(30),
    frontP bit(1),
    activoP bit(1),
    id_SectionP int,
    id_UseP int,
    caseP varchar (20))
BEGIN 
	CASE caseP
    
		WHEN "INSERT" THEN 
        insert into newst(title, descriptionNews, textNews, eventDate, publicationDate, location, keywords, statusNews, front, activo, id_Section, id_Use) 
        values (titleP, descriptionP, textNewsP, eventDateP, publicationDateP, locationP, keywordsP, statusNewsP, frontP, activoP, id_SectionP, id_UseP);
        
        WHEN "UPDATE" THEN 
        update newst SET title = titleP, descriptionNews = descriptionP, textNews = textNewsP, eventDate = eventDateP, publicationDate = publicationDateP, 
        location = locationP, keywords = keywordsP, statusNews = statusNewsP, front = frontP, id_Section = id_SectionP
        where id_Use = id_UseP;
        
        WHEN "CHANGE_STATUS" THEN 
        update newst SET statusNews = statusNewsP where id_News = id_NewsP;
        
        WHEN "DELETE" THEN 
        update newst SET activo = 0 where id_News = id_NewsP;
        
        WHEN "ACTIVE" THEN 
        update newst SET activo = 1 where id_News = id_NewsP;
        
	END CASE;
END;
|

/*Ejemplo de uso con la cuenta de administrador: */
CALL news_SP(0, 'Robo a casa habitacion', 'Entran delicuentes a casa para robar las pertenencias de un streamer.', 'Texto de lo que es la noticia y asi pues.',
			now(), now(), 'Morelos, CDMX', 'Robos cuarentena twitch', 'FINISHED', 1, 1, 2, 2, 'INSERT');

CALL news_SP(1, 'Robo a casa', 'Entran delicuentes a casa para robar las pertenencias de un streamer.', 'Texto de lo que es la noticia y asi pues.',
			now(), now(), 'Morelos, CDMX', 'Robos cuarentena twitch', 'FINISHED', 1, 1, 2, 2, 'UPDATE');

CALL news_SP(1, '', '', '', null, null, '', '', '', 0, 0, 0, 0, 'DELETE');

CALL news_SP(1, '', '', '', null, null, '', '', '', 0, 0, 0, 0, 'ACTIVE');

CALL news_SP(1, '', '', '', null, null, '', '', 'FINISHED', 0, 0, 0, 0, 'CHANGE_STATUS');

SELECT * FROM newst;





