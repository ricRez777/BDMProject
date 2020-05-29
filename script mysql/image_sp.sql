describe imaget;

drop procedure image_SP;

/*PROCEDURE de imagenes*/
DELIMITER |
CREATE PROCEDURE image_SP(
	id_imageP int, 
	imageP blob, 
    coverP bit(1), 
    activoP bit(1),
    id_newsP int(11),
    caseP varchar (20))
BEGIN 
	CASE caseP
		WHEN "INSERT" THEN 
        insert into imaget(image, cover, activo, id_News) values (imageP, coverP, 1, id_newsP);
        
        WHEN "UPDATE" THEN 
        update imaget SET image = imageP, cover = coverP, id_News = id_newsP where id_image = id_imageP;
        
        WHEN "DELETE" THEN 
        update imaget SET activo = 0 where id_image = id_imageP;
        
        WHEN "ACTIVE" THEN 
        update imaget SET activo = 1 where id_image = id_imageP;
        
	END CASE;
END;
|

/*Ejemplo de uso con la cuenta de administrador: */
CALL image_SP(0, 'blob', cover, activo, 'INSERT');

CALL image_SP(1, 'blob', cover, activo, 'UPDATE');

CALL image_SP(1, null, 0, 0, 'DELETE');

CALL image_SP(1, null, 0, 0, 'DELETE');image_SP

SELECT * FROM imaget;





