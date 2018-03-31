CREATE VIEW view_GetCustomerDetails AS
	SELECT * FROM Customer NATURAL JOIN People;
/
CREATE VIEW view_GetGuideDetails AS
	SELECT * FROM Guide NATURAL JOIN People;
/
CREATE VIEW view_GetOwnerDetails AS
	SELECT * FROM Owner NATURAL JOIN People;
/
