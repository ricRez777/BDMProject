describe usert;

drop procedure usuarios_SP;

/*PROCEDURE de usuarios*/
DELIMITER |
CREATE PROCEDURE usuarios_SP(
	id_UseP int, 
	type_useP varchar(50), 
    emailP varchar(100), 
    passP varchar(300),
	nameCompleteP varchar(100),
    phoneP varchar(20),
    profilePictureP blob,
    firmP varchar(100),
    activoP bit(1),
    caseP varchar (20))
BEGIN 
	CASE caseP
		WHEN "INSERT" THEN 
        insert into usert(type_use, email, pass, nameComplete, phone, profilePicture, activo, firm) 
        values (type_useP, emailP, passP, nameCompleteP, phoneP, profilePictureP, 1, firmP);
        
        WHEN "UPDATE" THEN 
        update usert SET email = emailP, pass = passP, nameComplete = nameCompleteP, phone = phoneP, profilePicture = profilePictureP, firm = firmP 
        where id_Use = id_UseP;
        
        WHEN "UPDATE2" THEN 
        update usert SET email = emailP, pass = passP, nameComplete = nameCompleteP, phone = phoneP, firm = firmP 
        where id_Use = id_UseP;
        
        WHEN "DELETE" THEN 
        update usert SET activo = 0
        where id_Use = id_UseP;
        
        WHEN "CONFIRM_DELETE" THEN
        update usert SET confirm = 1
        where id_Use = id_UseP;
        
        WHEN "CONFIRM_STATUS" THEN
        select confirm from usert where id_Use = id_UseP;
        
        WHEN "ACTIVE" THEN 
        update usert SET activo = 1
        where id_Use = id_UseP;
        
        WHEN "LOGIN" THEN 
        select usert.email, usert.pass, usert.type_use, usert.profilePicture, usert.nameComplete, usert.id_Use, usert.phone, usert.firm
        from usert where usert.email = emailP AND usert.pass = passP AND activo = 1;
        
        WHEN "LIST_JOURNALIST" THEN 
        select usert.id_Use, usert.email, usert.firm, usert.nameComplete, usert.phone
        from usert where usert.type_use = "JOURNALIST" AND usert.activo = 1;
        
	END CASE;
END;
|

/*Ejemplo de uso con la cuenta de administrador: */
CALL usuarios_SP(0, 'ADMIN', 'admin@wnc.com', 'admin1234', 'Ricardo Resendez', '8181627829', null, 'ADMIN', true, 'INSERT');

CALL usuarios_SP(1, 'ADMIN', 'admin@gmail.com', 'admin1234', 'Ricardo Resendez', '8181627829', null, 'ADMIN', true, 'UPDATE');

CALL usuarios_SP(1, '', '', '', '', '', null, '', true, 'DELETE');

CALL usuarios_SP(3, '', '', '', '', '', null, '', true, 'ACTIVE');

CALL usuarios_SP(0, '', 'admin@gmail.com', 'admin1234', '', '', null, '', true, 'LOGIN');

SELECT * FROM usert;





