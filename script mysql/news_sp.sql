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
    caseP varchar (50))
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
        update newst SET statusNews = statusNewsP, front = frontP, publicationDate = now() where id_News = id_NewsP;
        
        WHEN "GET_ALL_BREAKINGNEWS" THEN
        select N.id_News, N.title, N.descriptionNews, I.image from newst as N
        inner join imaget as I on N.id_News = I.id_News
        where statusNews = 'PUBLISHED' AND N.activo = 1
        group by N.id_News order by N.id_News DESC limit 6;
        
        WHEN "GET_ALL_FRONTNEWS" THEN
        select N.id_News, N.title, N.descriptionNews, I.image from newst as N
        inner join imaget as I on N.id_News = I.id_News
        where statusNews = 'PUBLISHED' AND front = 1 AND N.activo =1
        group by N.id_News order by N.id_News ASC limit 6;
        
        WHEN "GET_ALL_SECTIONSNEWS" THEN
        select N.id_News, N.title, N.descriptionNews, I.image from newst as N
        inner join imaget as I on N.id_News = I.id_News
        where statusNews = 'PUBLISHED' AND N.id_Section = id_SectionP AND N.activo =1
        group by N.id_News order by N.id_News DESC;
        
        WHEN "SELECT" THEN 
        select N.id_News, N.title, N.descriptionNews, N.textNews, N.eventDate, N.location, N.statusNews, N.keywords, S.nameSection
        from newst as N inner join sectiont as S
        on N.id_Section = S.id_Section
        where N.id_News = id_NewsP AND activo = 1;
        
        WHEN "SELECT_PUBLISHED" THEN
        select N.id_News, N.title, N.descriptionNews, N.textNews, N.eventDate, N.publicationDate, N.location, N.statusNews, S.nameSection, U.firm
        from newst as N inner join sectiont as S
        on N.id_Section = S.id_Section inner join usert as U
        on N.id_Use = U.id_Use
        where N.statusNews = "PUBLISHED" AND N.id_News = id_NewsP AND N.activo = 1;
        
        WHEN "SELECT_EDITION_ALL" THEN
        select N.id_News, N.title, N.descriptionNews, N.textNews, N.eventDate, N.publicationDate, N.location, N.statusNews, S.nameSection, U.firm
        from newst as N inner join sectiont as S
        on N.id_Section = S.id_Section inner join usert as U
        on N.id_Use = U.id_Use
        where N.statusNews = "EDITION" AND N.id_Use = id_UseP AND N.activo = 1
        order by N.id_News;
        
        WHEN "SELECT_EDITION" THEN
        select N.id_News, N.title, N.descriptionNews, N.textNews, N.eventDate, N.publicationDate, N.location, N.statusNews, S.nameSection, U.firm
        from newst as N inner join sectiont as S
        on N.id_Section = S.id_Section inner join usert as U
        on N.id_Use = U.id_Use
        where N.statusNews = "EDITION" AND N.id_Use = id_UseP AND N.activo = 1;
        
        WHEN "SELECT_FINISHED_ALL_BY_USER" THEN
        select N.id_News, N.title, N.descriptionNews, N.textNews, N.eventDate, N.publicationDate, N.location, N.statusNews, S.nameSection, U.firm
        from newst as N inner join sectiont as S
        on N.id_Section = S.id_Section inner join usert as U
        on N.id_Use = U.id_Use
        where N.statusNews = "FINISHED" AND N.id_Use = id_UseP AND N.activo = 1
        order by N.id_News;
        
        WHEN "SELECT_PUBLISHED_ALL_BY_USER" THEN
        select N.id_News, N.title, N.descriptionNews, N.textNews, N.eventDate, N.publicationDate, N.location, N.statusNews, S.nameSection, U.firm
        from newst as N inner join sectiont as S
        on N.id_Section = S.id_Section inner join usert as U
        on N.id_Use = U.id_Use
        where N.statusNews = "PUBLISHED" AND N.id_Use = id_UseP AND N.activo = 1
        order by N.id_News;
        
        WHEN "SELECT_FINISHED_ALL" THEN
        select N.id_News, N.title, N.descriptionNews, N.textNews, N.eventDate, N.publicationDate, N.location, N.statusNews, S.nameSection, U.firm
        from newst as N inner join sectiont as S
        on N.id_Section = S.id_Section inner join usert as U
        on N.id_Use = U.id_Use
        where N.statusNews = "FINISHED" AND N.activo = 1
        order by N.id_News;
        
        WHEN "SELECT_FINISHED" THEN
        select N.id_News, N.title, N.descriptionNews, N.textNews, N.eventDate, N.publicationDate, N.location, N.statusNews, S.nameSection, U.firm
        from newst as N inner join sectiont as S
        on N.id_Section = S.id_Section inner join usert as U
        on N.id_Use = U.id_Use
        where N.statusNews = "FINISHED" AND N.activo = 1 AND N.id_News = id_NewsP;
        
        WHEN "DELETE" THEN 
        update newst SET activo = 0 where id_News = id_NewsP;
        
        WHEN "ACTIVE" THEN 
        update newst SET activo = 1 where id_News = id_NewsP;
        
        WHEN "GET_ALL_FRONTNEWS" THEN
        select N.id_News, N.title, N.descriptionNews, I.image from newst as N
        inner join imaget as I on N.id_News = I.id_News
        where statusNews = 'PUBLISHED' AND front = 1 AND N.activo =1
        group by N.id_News order by N.id_News ASC limit 6;
        
        WHEN "SEARCH" THEN
        select N.publicationDate, N.id_News, N.title, N.descriptionNews, I.image from newst as N
		inner join imaget as I on N.id_News = I.id_News
		where (statusNews = 'PUBLISHED' AND N.activo =1) AND (N.title LIKE concat('%', textNewsP,'%') OR N.keywords LIKE concat('%', textNewsP,'%') OR N.descriptionNews LIKE concat('%', textNewsP,'%'))
		group by N.id_News order by N.id_News ASC;
        
	END CASE;
END;
|

/*Ejemplo de uso con la cuenta de administrador: */
CALL news_SP(0, 'Robo a casa habitacion', 'Entran delicuentes a casa para robar las pertenencias de un streamer.', 'Texto de lo que es la noticia y asi pues.',
			now(), now(), 'Morelos, CDMX', 'Robos cuarentena twitch', 'FINISHED', 1, 1, 2, 2, 'INSERT');

CALL news_SP(1, 'Robo a casa', 'Entran delicuentes a casa para robar las pertenencias de un streamer.', 'Texto de lo que es la noticia y asi pues.',
			now(), now(), 'Morelos, CDMX', 'Robos cuarentena twitch', 'FINISHED', 1, 1, 2, 2, 'UPDATE');

CALL news_SP(1, '', '', '', null, null, '', '', '', 0, 0, 0, 0, 'DELETE');

CALL news_SP(59, '', '', '', null, null, '', '', '', 0, 0, 0, 0, 'ACTIVE');

CALL news_SP(1, '', '', '', null, null, '', '', 'FINISHED', 0, 0, 0, 0, 'CHANGE_STATUS');

CALL news_SP(0, '', '', '', null, null, '', '', '', 0, 0, 0, 0, 'SELECT_FINISHED_ALL');

CALL news_SP(0, '', '', '', null, null, '', '', '', 0, 0, 0, 2, 'SELECT_EDITION_ALL');

CALL news_SP(10, '', '', '', null, null, '', '', '', 0, 0, 0, 0, 'SELECT_FINISHED');

CALL news_SP(54, '', '', '', null, null, '', '', '', 0,usuarios_SPusuarios_SP 0, 0, 0, 'SELECT');

CALL news_SP(0, '', '', '', null, null, '', '', '', 0, 0, 0, 2, 'SELECT_FINISHED_ALL_BY_USER');

CALL news_SP(55, '', '', '', null, null, '', '', '', 0, 0, 0, 0, 'SELECT_PUBLISHED');

CALL news_SP(0, '', '', '', null, null, '', '', '', 0, 0, 2, 0, 'GET_ALL_SECTIONSNEWS');

CALL news_SP(0, '', '', 'peligros', null, null, '', '', '', 0, 0, '', 0, 'SEARCH');

select * from newst where statusNews = 'PUBLISHED';

select * from usert;


/*delete from newst where id_News <> 0;*/


