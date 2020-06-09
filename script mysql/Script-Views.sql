/*Vista para traer todas las noticias que deben ir en la pagina principal*/
CREATE VIEW GET_ALL_FRONTNEWS AS
	select N.id_News, N.title, N.descriptionNews, I.image from newst as N
	inner join imaget as I on N.id_News = I.id_News
	where statusNews = 'PUBLISHED' AND front = 1 AND N.activo =1
	group by N.id_News order by N.id_News ASC limit 6;
    
/*Vista para traer todas la noticias finalizadas que el admin puede confirmar*/
CREATE VIEW SELECT_FINISHED_ALL AS
    select N.id_News, N.title, N.descriptionNews, N.textNews, N.eventDate, N.publicationDate, N.location, N.statusNews, S.nameSection, U.firm
	from newst as N inner join sectiont as S
	on N.id_Section = S.id_Section inner join usert as U
	on N.id_Use = U.id_Use
	where N.statusNews = "FINISHED" AND N.activo = 1
	order by N.id_News;
    
/*Vista para traer todas las noticias de ultimo momento*/
CREATE VIEW GET_ALL_BREAKINGNEWS AS
	select N.id_News, N.title, N.descriptionNews, I.image from newst as N
	inner join imaget as I on N.id_News = I.id_News
	where statusNews = 'PUBLISHED' AND N.activo = 1
	group by N.id_News order by N.id_News DESC limit 6;

/*Vista para traer las secciones principales*/
CREATE VIEW INDEX_SECTIONS AS
	select id_Section, nameSection, color, activo, main from sectiont where activo = 1 AND main = 1
	ORDER BY id_Section DESC LIMIT 8;
    
/*Vista para traer todas las secciones activas*/
CREATE VIEW ALL_SECTIONS AS
	select id_Section, nameSection, color, activo, main from sectiont where activo = 1;
    
    
    
    
    
    
    
    
    