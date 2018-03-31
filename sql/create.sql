
CREATE TABLE News(
  Data_Date varchar2(255),
  Data varchar2(255)
);
CREATE TABLE Account(
AccountID INT ,
Username varchar2 (255),
Password varchar2 (255) ,
Credit_Card_Number varchar2 (255),
Profil_Picture varchar2(255),
PRIMARY KEY (AccountID)
);

CREATE TABLE People(
PeopleID INT ,
First_Name varchar2 (255) ,
Last_Name varchar2 (255) ,
Telephone_No varchar2 (255) ,
EMail varchar2 (255),
PRIMARY KEY (PeopleID)

);
CREATE TABLE Branch(
BranchID INT  ,
Name varchar2(255) ,
Address varchar2 (255) ,
Telephone_No varchar2 (255) ,
EMail varchar2 (255)  ,
PRIMARY KEY (BranchID)
);

CREATE TABLE Owner(
OwnerID INT ,
PeopleID INT ,
BranchID INT  ,
PRIMARY KEY (OwnerID),
FOREIGN KEY (PeopleID) REFERENCES People(PeopleID),
FOREIGN KEY (BranchID) REFERENCES Branch(BranchID)
);


CREATE TABLE Customer(
CustomerID INT ,
PeopleID INT ,
Age INT ,
AccountID INT,
PRIMARY KEY (CustomerID),
FOREIGN KEY (PeopleID) REFERENCES People(PeopleID),
FOREIGN KEY(AccountID) REFERENCES Account(AccountID)
);

CREATE TABLE Guide(
GuideID INT ,
PeopleID INT ,
Known_Languages varchar2 (255) ,
PRIMARY KEY (GuideID),
FOREIGN KEY (PeopleID) REFERENCES People(PeopleID)
);

  Create Table Type_Of_Hotel 
 (Type_Of_HotelID INT,
  Explanation VARCHAR(3999) ,
  PRIMARY KEY (Type_Of_HotelID)
  
  );

CREATE TABLE Hotel(
HotelID INT ,
Type_Of_HotelID INT ,
Hotel_Name varchar2 (255) ,
Address varchar2 (255) ,
Telephone_No varchar2 (255) ,
Properties varchar2 (255) ,
PRIMARY KEY (HotelID),
FOREIGN KEY (Type_Of_HotelID) REFERENCES TYPE_OF_HOTEL(Type_Of_HotelID)
);

CREATE TABLE Booking(
BookingID INT ,
Booking_Date varchar (255) ,
Cost INT,
HotelID INT,
PRIMARY KEY (BookingID),
FOREIGN KEY (HotelID) REFERENCES Hotel(HotelID)
);
 Create Table Type_Of_Transportation 
 (Type_Of_TransportationID INT,
  Explanation VARCHAR(3999) ,
  PRIMARY KEY (Type_Of_TransportationID) 
  );
CREATE TABLE Transportation(
TransportationID INT ,
Transportation_Date varchar (255) ,
Cost INT ,
Type_Of_TransportationID INT ,
PRIMARY KEY (TransportationID),
FOREIGN KEY (Type_Of_TransportationID) REFERENCES Type_Of_Transportation(Type_Of_TransportationID)
);
Create Table Type_Of_Tour 
 (Type_Of_TourID INT,
  Explanation VARCHAR(3999) ,
  PRIMARY KEY (Type_Of_TourID)
  
  );
CREATE TABLE Tour(
TourID INT ,
Type_Of_TourID INT ,
Tour_Date varchar (255) ,
Tour_Name varchar2 (255) ,
Cost INT ,
PRIMARY KEY (TourID),
FOREIGN KEY (Type_Of_TourID) REFERENCES Type_Of_Tour(Type_Of_TourID)
);

  
  Create Table Type_Of_Campaign 
 (Type_Of_CampaignID INT,
  Explanation VARCHAR(3999) ,
  PRIMARY KEY (Type_Of_CampaignID)
  
  );

CREATE TABLE Campaign(
CampaignID INT ,
Type_Of_CampaignID INT ,
Campaign_Name varchar2 (255) ,
Campaign_Date varchar (255),
PRIMARY KEY (CampaignID),
FOREIGN KEY (Type_Of_CampaignID) REFERENCES Type_Of_Campaign(Type_Of_CampaignID)
);

 Create Table Guide_Guides_Customer 
(GuideID INT,
 CustomerID INT,
 FOREIGN KEY (GuideID) REFERENCES Guide(GuideID),
 FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID)
 );
  
  
  
  Create Table Customer_Books_Booking 
 (BookingID INT,
  CustomerID INT,
  FOREIGN KEY (BookingID) REFERENCES Booking(BookingID),
  FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID)
  );
  
  
  Create Table Make_Sale 
 (BranchID INT,
  CustomerID INT,
  OwnerID INT,
  TourID INT,
  HotelID INT,
  TransportationID INT,
  BookingID INT,
  FOREIGN KEY (BookingID) REFERENCES Booking(BookingID),
  FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID),
  FOREIGN KEY (BranchID) REFERENCES Branch(BranchID),
  FOREIGN KEY (OwnerID) REFERENCES Owner(OwnerID),
  FOREIGN KEY (TourID) REFERENCES Tour(TourID),
  FOREIGN KEY (HotelID) REFERENCES Hotel(HotelID),
  FOREIGN KEY (TransportationID) REFERENCES Transportation(TransportationID)
  );
  
  Create Table Branch_Provides_Campaign 
 (BranchID INT,
  CampaignID INT,
  FOREIGN KEY (BranchID) REFERENCES Branch(BranchID),
  FOREIGN KEY (CampaignID) REFERENCES Campaign(CampaignID)
  );
  
  Create Table Guide_Guides_Tour
 (GuideID INT,
  TourID INT,
  FOREIGN KEY (GuideID) REFERENCES Guide(GuideID),
  FOREIGN KEY (TourID) REFERENCES Tour(TourID)
  );
  
  
  Create Table Tour_Provides_Housing
 (HotelID INT,
  TourID INT,
  FOREIGN KEY (HotelID) REFERENCES Hotel(HotelID),
  FOREIGN KEY (TourID) REFERENCES Tour(TourID)
  );
  
 CREATE OR REPLACE PROCEDURE InsertPeople(
  First_Name IN People.First_Name%TYPE,
  Last_Name IN People.Last_Name%TYPE,
  Telephone_No IN People.Telephone_No%TYPE,
  EMail IN People.EMail%TYPE
)
IS
BEGIN
  INSERT INTO People(First_Name,Last_Name,Telephone_No,EMail)
  VALUES(First_Name,Last_Name,Telephone_No,EMail);
END InsertPeople;
/ 
CREATE OR REPLACE PROCEDURE InsertGuide(

	Known_Languages IN Guide.Known_Languages%TYPE,
  First_Name IN People.First_Name%TYPE,
  Last_Name IN People.Last_Name%TYPE,
  Telephone_No IN People.Telephone_No%TYPE,
  EMail IN People.EMail%TYPE
)
IS
 Pid INT;
BEGIN
  InsertPeople(First_Name,Last_Name,Telephone_No,EMail);
  SELECT MAX(PeopleID) INTO Pid FROM People; 
	INSERT INTO Guide(PeopleID,Known_Languages)
	VALUES (Pid, Known_Languages);
	
END InsertGuide;
/
create or replace PROCEDURE UpdateGuide(
  S_GuideID IN Guide.GuideID%TYPE,
  S_PeopleID IN People.PeopleID%TYPE,
  N_Known_Languages IN Guide.Known_Languages%TYPE,
  N_First_Name IN People.First_Name%TYPE,
  N_Last_Name IN People.Last_Name%TYPE,
  N_Telephone_No IN People.Telephone_No%TYPE,
  N_EMail IN People.EMail%TYPE
  
)
IS
BEGIN
  UpdatePeople(S_PeopleID,N_First_Name,N_Last_Name,N_Telephone_No,N_EMail);
  UPDATE Guide SET
    Known_Languages=N_Known_Languages
    WHERE GuideID=S_GuideID;
END UpdateGuide;
/
CREATE OR REPLACE PROCEDURE DeleteGuide(
    S_GuideID IN Guide.GuideID%TYPE
)
IS
BEGIN
  DELETE FROM Guide WHERE GuideID=S_GuideID;
  DELETE FROM Guide_Guides_Customer WHERE GuideID=S_GuideID;
  DELETE FROM Guide_Guides_Tour WHERE GuideID=S_GuideID;

END DeleteGuide;
/

CREATE OR REPLACE PROCEDURE InsertTransportation(
	Transportation_Date IN Transportation.Transportation_Date%TYPE,
	Cost IN Transportation.Cost%TYPE,
	Type_Of_TransportationID IN Type_Of_Transportation.Type_Of_TransportationID%TYPE
)
IS
BEGIN
	INSERT INTO Transportation(Transportation_Date, Cost, Type_Of_TransportationID)
	VALUES (Transportation_Date, Cost, Type_Of_TransportationID);
	
END InsertTransportation;
/
CREATE OR REPLACE PROCEDURE UpdateTransportation(
  S_TransportationID IN Transportation.TransportationID%TYPE,
  N_Transportation_Date IN Transportation.Transportation_Date%TYPE,
  N_Cost IN Transportation.Cost%TYPE,
  N_Type_Of_TransportationID IN Type_Of_Transportation.Type_Of_TransportationID%TYPE
)
IS 
BEGIN
  UPDATE Transportation SET
    Transportation_Date=N_Transportation_Date,
    Cost=N_Cost,
    Type_Of_TransportationID=N_Type_Of_TransportationID
    WHERE TransportationID=S_TransportationID;
END UpdateTransportation;
/
CREATE OR REPLACE PROCEDURE DeleteTransportation(
  S_TransportationID IN Transportation.TransportationID%TYPE
)
IS
BEGIN
  DELETE FROM Transportation WHERE TransportationID=S_TransportationID;
  DELETE FROM Make_Sale WHERE TransportationID=S_TransportationID;

END DeleteTransportation;
/
CREATE OR REPLACE PROCEDURE InsertCampaign(
  Type_Of_CampaignID IN Type_Of_Campaign.Type_Of_CampaignID%TYPE,
  Campaign_Name IN Campaign.Campaign_Name%TYPE,
  Campaign_Date IN Campaign.Campaign_Date%TYPE
)
IS
BEGIN
  INSERT INTO Campaign( Type_Of_CampaignID, Campaign_Name, Campaign_Date)
  VALUES ( Type_Of_CampaignID, Campaign_Name, Campaign_Date);
  
END InsertCampaign;
/
CREATE OR REPLACE PROCEDURE UpdateCampaign(
  S_CampaignID IN Campaign.CampaignID%TYPE,
  N_Type_Of_CampaignID IN Type_Of_Campaign.Type_Of_CampaignID%TYPE,
  N_Campaign_Name IN Campaign.Campaign_Name%TYPE,
  N_Campaign_Date IN Campaign.Campaign_Date%TYPE
)
IS
BEGIN
  UPDATE Campaign SET
    Type_Of_CampaignID=N_Type_Of_CampaignID,
    Campaign_Name=N_Campaign_Name,
    Campaign_Date=N_Campaign_Date
    WHERE CampaignID=S_CampaignID;
END UpdateCampaign;
/
CREATE OR REPLACE PROCEDURE DeleteCampaign(
  S_CampaignID IN Campaign.CampaignID%TYPE
)
IS
BEGIN
  DELETE FROM Campaign WHERE CampaignID=S_CampaignID;
  DELETE FROM Branch_Provides_Campaign WHERE CampaignID=S_CampaignID;
END DeleteCampaign;
/
CREATE OR REPLACE PROCEDURE InsertType_Of_Transportation(
	Explanation IN Type_Of_Transportation.Explanation%TYPE
)
IS
BEGIN
	INSERT INTO Type_Of_Transportation( Explanation)
	VALUES ( Explanation);
END InsertType_Of_Transportation;
/
CREATE OR REPLACE PROCEDURE UpdateType_Of_Transportation(
  S_Type_Of_TransportationID IN Type_Of_Transportation.Type_Of_TransportationID%TYPE,
  N_Explanation IN Type_Of_Transportation.Explanation%TYPE
)
IS
BEGIN
  UPDATE Type_Of_Transportation SET
    Explanation=N_Explanation
    WHERE Type_Of_TransportationID=S_Type_Of_TransportationID;
END UpdateType_Of_Transportation;
/
CREATE OR REPLACE PROCEDURE DeleteType_Of_Transportation(
  S_Type_Of_TransportationID IN Type_Of_Transportation.Type_Of_TransportationID%TYPE
)
IS
Tid INT;
BEGIN
  DELETE FROM Type_Of_Transportation WHERE Type_Of_TransportationID=S_Type_Of_TransportationID;
  SELECT TransportationID INTO Tid FROM Transportation WHERE Type_Of_TransportationID=S_Type_Of_TransportationID;
  DeleteTransportation(Tid);
END DeleteType_Of_Transportation;
/
CREATE OR REPLACE PROCEDURE InsertGuide_Guides_Customer(
	GuideID IN Guide.GuideID%TYPE,
	CustomerID IN Customer.CustomerID%TYPE
)
IS
BEGIN
	INSERT INTO Guide_Guides_Customer(GuideID, CustomerID)
	VALUES (GuideID, CustomerID);
	
END InsertGuide_Guides_Customer;
/
CREATE OR REPLACE PROCEDURE DeleteGuide_Guides_Customer(
  S_GuideID IN Guide.GuideID%TYPE,
  S_CustomerID IN Customer.CustomerID%TYPE
)
IS
BEGIN
  DELETE FROM Guide_Guides_Customer WHERE GuideID=S_GuideID and CustomerID=S_CustomerID;
END DeleteGuide_Guides_Customer;
/
CREATE OR REPLACE PROCEDURE InsertCustomer_Books_Booking(
	BookingID IN Booking.BookingID%TYPE,
	CustomerID IN Customer.CustomerID%TYPE
)
IS
BEGIN
	INSERT INTO Customer_Books_Booking(BookingID, CustomerID)
	VALUES (BookingID, CustomerID);
	
END InsertCustomer_Books_Booking;
/
CREATE OR REPLACE PROCEDURE DeleteCustomer_Books_Booking(
  S_BookingID IN Booking.BookingID%TYPE,
  S_CustomerID IN Customer.CustomerID%TYPE
)
IS
BEGIN
  DELETE FROM Customer_Books_Booking WHERE BookingID=S_BookingID and CustomerID=S_CustomerID;
END DeleteCustomer_Books_Booking;
/
CREATE OR REPLACE PROCEDURE InsertGuide_Guides_Tour(
	GuideID IN Guide.GuideID%TYPE,
	TourID IN Tour.TourID%TYPE
)
IS
BEGIN
	INSERT INTO Guide_Guides_Tour(GuideID, TourID)
	VALUES (GuideID, TourID);
	
END InsertGuide_Guides_Tour;
/
CREATE OR REPLACE PROCEDURE DeleteGuide_Guides_Tour(
  S_GuideID IN Guide.GuideID%TYPE,
  S_TourID IN Tour.TourID%TYPE
)
IS
BEGIN
  DELETE FROM Guide_Guides_Tour WHERE GuideID=S_GuideID and TourID=S_TourID;
END DeleteGuide_Guides_Tour;
/
CREATE OR REPLACE PROCEDURE InsertTour_Provides_Housing(
	HotelID IN Hotel.HotelID%TYPE,
	TourID IN Tour.TourID%TYPE
)
IS
BEGIN
	INSERT INTO Tour_Provides_Housing(HotelID, TourID)
	VALUES (HotelID, TourID);
	
END InsertTour_Provides_Housing;
/
CREATE OR REPLACE PROCEDURE DeleteTour_Provides_Housing(
  S_HotelID IN Hotel.HotelID%TYPE,
  S_TourID IN Tour.TourID%TYPE
)
IS
BEGIN
  DELETE FROM Tour_Provides_Housing WHERE HotelID=S_HotelID and TourID=S_TourID;
END DeleteTour_Provides_Housing;
/
CREATE OR REPLACE PROCEDURE InsertAccount(
     Username IN Account.Username%TYPE,
     Password   IN Account.Password%TYPE,
     Credit_Card_Number   IN Account.Credit_Card_Number%TYPE,
     Profil_Picture IN Account.Profil_Picture%TYPE)   
IS
BEGIN

  INSERT INTO Account (Username,Password,Credit_Card_Number,Profil_Picture)
  VALUES (Username,Password,Credit_Card_Number,Profil_Picture);

END InsertAccount;
/
CREATE OR REPLACE PROCEDURE UpdateAccount(
  S_AccountID IN Account.AccountID%TYPE,
  N_Username IN Account.Username%TYPE,
  N_Password IN Account.Password%TYPE,
  N_Credit_Card_Number IN Account.Credit_Card_Number%TYPE,
  N_Profil_Picture IN Account.Profil_Picture%TYPE
)
IS
BEGIN
  UPDATE Account SET
    Username=N_Username,
    Password=N_Password,
    Credit_Card_Number=N_Credit_Card_Number,
    Profil_Picture=N_Profil_Picture
    WHERE AccountID=S_AccountID;
END UpdateAccount;
/
CREATE OR REPLACE PROCEDURE DeleteAccount(
  S_AccountID IN Account.AccountID%TYPE
)
IS
Cid INT;
BEGIN
  DELETE FROM Account WHERE AccountID=S_AccountID;
  SELECT CustomerID INTO Cid FROM Customer WHERE AccountID=S_AccountID;
  DeleteAccount(Cid);
END DeleteAccount;
/
create or replace PROCEDURE InsertCustomer(
    Age IN Customer.Age%TYPE,
    First_Name IN People.First_Name%TYPE,
    Last_Name IN People.Last_Name%TYPE,
    Telephone_No IN People.Telephone_No%TYPE,
    EMail IN People.EMail%TYPE,
    Username IN Account.Username%TYPE,
    Password   IN Account.Password%TYPE,
    Credit_Card_Number   IN Account.Credit_Card_Number%TYPE,
    Profil_Picture IN Account.Profil_Picture%TYPE)  
IS
  Pid INT;
  Aid INT;
BEGIN
  InsertPeople(First_Name,Last_Name,Telephone_No,EMail);
  InsertAccount(Username,Password,Credit_Card_Number);
  SELECT MAX(PeopleID) INTO pid FROM People;
  SELECT MAX(AccountID) INTO Aid FROM Account;
  INSERT INTO Customer (PeopleID,Age,AccountID) VALUES(Pid,Age,Aid);


END InsertCustomer;
/
CREATE OR REPLACE PROCEDURE UpdateCustomer(
  S_CustomerID IN Customer.CustomerID%TYPE,
  N_PeopleID IN People.PeopleID%TYPE,
  N_Age IN Customer.Age%TYPE,
  N_AccountID IN Account.AccountID%TYPE
)
IS
BEGIN
  UPDATE Customer SET  
    PeopleID=N_PeopleID,
    Age=N_Age,
    AccountID=N_AccountID
    WHERE CustomerID=S_CustomerID;
END UpdateCustomer;
/
CREATE OR REPLACE PROCEDURE DeleteCustomer(
  S_CustomerID IN Customer.CustomerID%TYPE
)
IS
BEGIN
  DELETE FROM Customer WHERE CustomerID=S_CustomerID;
  DELETE FROM Guide_Guides_Customer WHERE CustomerID=S_CustomerID;
  DELETE FROM Customer_Books_Booking WHERE CustomerID=S_CustomerID;
  DELETE FROM Make_Sale WHERE CustomerID=S_CustomerID;
END DeleteCustomer;
/
CREATE OR REPLACE PROCEDURE InsertOwner(
    First_Name IN People.First_Name%TYPE,
    Last_Name IN People.Last_Name%TYPE,
    Telephone_No IN People.Telephone_No%TYPE,
    EMail IN People.EMail%TYPE,
    BranchID IN Branch.BranchID%TYPE
)
IS
Pid INT;
BEGIN
  InsertPeople(First_Name,Last_Name,Telephone_No,EMail);
  SELECT MAX(PeopleID) INTO Pid FROM People;
  INSERT INTO Owner (PeopleID,BranchID)
  VALUES (Pid,BranchID);


END InsertOwner;
/
create or replace PROCEDURE UpdateOwner(
  S_OwnerID IN Owner.OwnerID%TYPE,
  S_PeopleID IN People.PeopleID%TYPE,
  N_First_Name IN People.First_Name%TYPE,
  N_Last_Name IN People.Last_Name%TYPE,
  N_Telephone_No IN People.Telephone_No%TYPE,
  N_EMail IN People.EMail%TYPE,
  N_BranchID IN Branch.BranchID%TYPE
)
IS
BEGIN
UpdatePeople(S_PeopleID,N_First_Name,N_Last_Name,N_Telephone_No,N_EMail);
  UPDATE Owner SET
    BranchID=N_BranchID
    WHERE OwnerID=S_OwnerID;
END UpdateOwner;
/
CREATE OR REPLACE PROCEDURE DeleteOwner(
  S_OwnerID IN Owner.OwnerID%TYPE 
)
IS
BEGIN
  DELETE FROM Owner WHERE OwnerID=S_OwnerID;
  DELETE FROM Make_Sale WHERE OwnerID=S_OwnerID;
END DeleteOwner;
/
CREATE OR REPLACE PROCEDURE InsertBranch(
  Name IN Branch.Name%TYPE,
  Address IN Branch.Address%TYPE,
  Telephone_No IN Branch.Telephone_No%TYPE,
  EMail IN Branch.EMail%TYPE
)
IS
BEGIN
  INSERT INTO Branch(Name, Address, Telephone_No, EMail)
  VALUES (Name, Address, Telephone_No, EMail);
  
END InsertBranch;
/
CREATE OR REPLACE PROCEDURE UpdateBranch(
  S_BranchID IN Branch.BranchID%TYPE,
  N_Name IN Branch.Name%TYPE,
  N_Address IN Branch.Address%TYPE,
  N_Telephone_No IN Branch.Telephone_No%TYPE,
  N_EMail IN Branch.EMail%TYPE
)
IS
BEGIN
  UPDATE Branch SET
    Name=N_Name,
    Address=N_Address,
    Telephone_No=N_Telephone_No,
    EMail=N_EMail
    WHERE BranchID=S_BranchID;
END UpdateBranch;
/
CREATE OR REPLACE PROCEDURE DeleteBranch(
  S_BranchID IN Branch.BranchID%TYPE
)
IS
Owid INT;
BEGIN
  DELETE FROM Branch WHERE BranchID=S_BranchID;
  SELECT OwnerID INTO Owid FROM Owner WHERE BranchID=S_BranchID;
  DeleteOwner(Owid);
  DELETE FROM Make_Sale WHERE BranchID=S_BranchID;
  DELETE FROM Branch_Provides_Campaign WHERE BranchID=S_BranchID;
END DeleteBranch;
/

CREATE OR REPLACE PROCEDURE UpdatePeople(
  S_PeopleID IN People.PeopleID%TYPE,
  N_First_Name IN People.First_Name%TYPE,
  N_Last_Name IN People.Last_Name%TYPE,
  N_Telephone_No IN People.Telephone_No%TYPE,
  N_EMail IN People.EMail%TYPE
)
IS
BEGIN
  UPDATE People SET 
    First_Name=N_First_Name,
    Last_Name=N_Last_Name,
    Telephone_No=N_Telephone_No,
    EMail=N_EMail
    WHERE PeopleID=S_PeopleID;
END UpdatePeople;
/

CREATE OR REPLACE PROCEDURE DeletePeople(
  S_PeopleID IN People.PeopleID%TYPE
)
IS
Owid INT;
Cuid INT;
Guid INT;
BEGIN
  DELETE FROM People WHERE PeopleID=S_PeopleID;
  SELECT OwnerID INTO Owid FROM Owner WHERE PeopleID=S_PeopleID;
  DeleteOwner(Owid);
  SELECT GuideID INTO Guid FROM Guide WHERE PeopleID=S_PeopleID;
  DeleteGuide(Guid);
  SELECT CustomerID INTO Cuid FROM Customer WHERE PeopleID=S_PeopleID;
  DeleteCustomer(Cuid);
END DeletePeople;
/
  CREATE OR REPLACE PROCEDURE InsertBooking(
	   Booking_Date IN Booking.Booking_Date%TYPE,
	   Cost IN Booking.Cost%TYPE,
	   HotelID IN Hotel.HotelID%TYPE)
	  
IS
BEGIN

  INSERT INTO Booking ( Booking_Date, Cost, HotelID)
  VALUES ( Booking_Date,Cost, HotelID);

  
END InsertBooking;
/
CREATE OR REPLACE PROCEDURE UpdateBooking(
   S_BookingID IN Booking.BookingID%TYPE,
   N_Booking_Date IN Booking.Booking_Date%TYPE,
   N_Cost IN Booking.Cost%TYPE,
   N_HotelID IN Hotel.HotelID%TYPE
)
IS
BEGIN
  UPDATE Booking SET
    Booking_Date=N_Booking_Date,
    Cost=N_Cost,
    HotelID=N_HotelID
    WHERE BookingID=S_BookingID;
END UpdateBooking;
/
CREATE OR REPLACE PROCEDURE DeleteBooking(
  S_BookingID IN Booking.BookingID%TYPE
)
IS
BEGIN
  DELETE FROM Booking WHERE BookingID=S_BookingID;
  DELETE FROM Customer_Books_Booking WHERE BookingID=S_BookingID;
  DELETE FROM Make_Sale WHERE BookingID=S_BookingID;

END DeleteBooking;
/
 CREATE OR REPLACE PROCEDURE InsertTour(
	   Type_Of_TourID IN Type_Of_Tour.Type_Of_TourID%TYPE,
	   Tour_Date IN Tour.Tour_Date%TYPE,
	   Tour_Name IN Tour.Tour_Name%TYPE,
	   Cost IN Tour.Cost%TYPE)
	  
IS
BEGIN

  INSERT INTO Tour ( Type_Of_TourID, Tour_Date, Tour_Name,Cost)
  VALUES ( Type_Of_TourID,Tour_Date, Tour_Name,Cost);

  

END InsertTour;
/
CREATE OR REPLACE PROCEDURE UpdateTour(
    S_TourID IN Tour.TourID%TYPE,
    N_Type_Of_TourID IN Type_Of_Tour.Type_Of_TourID%TYPE,
    N_Tour_Date IN Tour.Tour_Date%TYPE,
    N_Tour_Name IN Tour.Tour_Name%TYPE,
    N_Cost IN Tour.Cost%TYPE
)
IS
BEGIN
  UPDATE Tour SET
    Type_Of_TourID=N_Type_Of_TourID,
    Tour_Date=N_Tour_Date,
    Tour_Name=N_Tour_Name,
    Cost=N_Cost
    WHERE TourID=S_TourID;
END UpdateTour;
/
CREATE OR REPLACE PROCEDURE DeleteTour(
  S_TourID IN Tour.TourID%TYPE
)
IS
BEGIN
  DELETE FROM Tour WHERE TourID=S_TourID;
  DELETE FROM Guide_Guides_Tour WHERE TourID=S_TourID;
  DELETE FROM Tour_Provides_Housing WHERE TourID=S_TourID;
  DELETE FROM Make_Sale WHERE TourID=S_TourID;
END DeleteTour;
/
 CREATE OR REPLACE PROCEDURE InsertHotel(
	   Type_Of_HotelID  IN Type_Of_Hotel.Type_Of_HotelID%TYPE,
	   Hotel_Name  IN Hotel.Hotel_Name%TYPE,
	   Address  IN Hotel.Address%TYPE,
	   Telephone_No   IN Hotel.Telephone_No%TYPE,
	   Properties   IN Hotel.Properties%TYPE)
	  
IS
BEGIN

  INSERT INTO Hotel ( Type_Of_HotelID, Hotel_Name, Address,Telephone_No,Properties)
  VALUES ( Type_Of_HotelID,Hotel_Name, Address,Telephone_No,Properties);

  

END InsertHotel;
/
CREATE OR REPLACE PROCEDURE UpdateHotel(
    S_HotelID  IN Hotel.HotelID%TYPE,
    N_Type_Of_HotelID  IN Type_Of_Hotel.Type_Of_HotelID%TYPE,
    N_Hotel_Name  IN Hotel.Hotel_Name%TYPE,
    N_Address  IN Hotel.Address%TYPE,
    N_Telephone_No   IN Hotel.Telephone_No%TYPE,
    N_Properties   IN Hotel.Properties%TYPE
)
IS
BEGIN
  UPDATE Hotel SET
    Type_Of_HotelID=N_Type_Of_HotelID,
    Hotel_Name=N_Hotel_Name,
    Address=N_Address,
    Telephone_No=N_Telephone_No,
    Properties=N_Properties
    WHERE HotelID=S_HotelID;
END UpdateHotel;
/
CREATE OR REPLACE PROCEDURE DeleteHotel(
    S_HotelID  IN Hotel.HotelID%TYPE
)
IS
Bid INT;
BEGIN
  DELETE FROM Hotel WHERE HotelID=S_HotelID;
  SELECT BookingID INTO Bid FROM Booking WHERE HotelID=S_HotelID;
  DeleteBooking(Bid);
  DELETE FROM Tour_Provides_Housing WHERE HotelID=S_HotelID;
  DELETE FROM Make_Sale WHERE HotelID=S_HotelID;

END DeleteHotel;
/

 
 CREATE OR REPLACE PROCEDURE InsertType_Of_Tour(
	   Explanation   IN Type_Of_Tour.Explanation%TYPE)	  
IS
BEGIN

  INSERT INTO Type_Of_Tour ( Explanation)
  VALUES ( Explanation);

  

END InsertType_Of_Tour;
/
CREATE OR REPLACE PROCEDURE UpdateType_Of_Tour(
  S_Type_Of_TourID IN Type_Of_Tour.Type_Of_TourID%TYPE,
  N_Explanation   IN Type_Of_Tour.Explanation%TYPE
)
IS
BEGIN
  UPDATE Type_Of_Tour SET
    Explanation=N_Explanation
    WHERE Type_Of_TourID=S_Type_Of_TourID;
END UpdateType_Of_Tour;
/
CREATE OR REPLACE PROCEDURE DeleteType_Of_Tour(
  S_Type_Of_TourID IN Type_Of_Tour.Type_Of_TourID%TYPE
)
IS
BEGIN
  DELETE FROM Type_Of_Tour WHERE Type_Of_TourID=S_Type_Of_TourID;
  DELETE FROM Tour WHERE Type_of_TourID=S_Type_Of_TourID;
END DeleteType_Of_Tour;
/
CREATE OR REPLACE PROCEDURE InsertType_Of_Campaign(
	   Explanation   IN Type_Of_Campaign.Explanation%TYPE)	  
IS
BEGIN

  INSERT INTO Type_Of_Campaign ( Explanation)
  VALUES ( Explanation);

 
END InsertType_Of_Campaign;
/
CREATE OR REPLACE PROCEDURE UpdateType_Of_Campaign(
  S_Type_Of_CampaignID  IN Type_Of_Campaign.Type_Of_CampaignID%TYPE,
  N_Explanation   IN Type_Of_Campaign.Explanation%TYPE
)
IS
BEGIN
  UPDATE Type_Of_Campaign SET
    Explanation=N_Explanation
    WHERE Type_Of_CampaignID=S_Type_Of_CampaignID;
END UpdateType_Of_Campaign;
/
CREATE OR REPLACE PROCEDURE DeleteType_Of_Campaign(
  S_Type_Of_CampaignID  IN Type_Of_Campaign.Type_Of_CampaignID%TYPE
)
IS
BEGIN
  DELETE FROM Type_Of_Campaign WHERE Type_Of_CampaignID=S_Type_Of_CampaignID;
  DELETE FROM Campaign WHERE Type_Of_CampaignID=S_Type_Of_CampaignID;
END DeleteType_Of_Campaign;
/
 CREATE OR REPLACE PROCEDURE InsertType_Of_Hotel(
	   Explanation   IN Type_Of_Hotel.Explanation%TYPE)  
IS
BEGIN

  INSERT INTO Type_Of_Hotel ( Explanation)
  VALUES ( Explanation);


END InsertType_Of_Hotel;
/
CREATE OR REPLACE PROCEDURE UpdateType_Of_Hotel(
  S_Type_Of_HotelID   IN Type_Of_Hotel.Type_Of_HotelID%TYPE,
  N_Explanation   IN Type_Of_Hotel.Explanation%TYPE
)
IS
BEGIN
  UPDATE Type_Of_Hotel SET
    Explanation=N_Explanation
    WHERE Type_Of_HotelID=S_Type_Of_HotelID;
END UpdateType_Of_Hotel;
/
CREATE OR REPLACE PROCEDURE DeleteType_of_Hotel(
  S_Type_Of_HotelID   IN Type_Of_Hotel.Type_Of_HotelID%TYPE
)
IS
BEGIN
  DELETE FROM Type_Of_Hotel WHERE Type_Of_HotelID=S_Type_Of_HotelID;
  DELETE FROM Hotel WHERE Type_Of_HotelID=S_Type_Of_HotelID;
END DeleteType_Of_Hotel;
/
CREATE OR REPLACE PROCEDURE InsertMake_Sale(
	   BranchID   IN Branch.BranchID%TYPE,
	   CustomerID   IN Customer.CustomerID%TYPE,
	   OwnerID    IN  Owner.OwnerID%TYPE,
	   TourID    IN Tour.TourID%TYPE,
	   HotelID    IN Hotel.HotelID%TYPE,
	   TransportationID     IN Transportation.TransportationID%TYPE,
	   BookingID    IN Booking.BookingID%TYPE)  
IS
BEGIN

  INSERT INTO Make_Sale (BranchID, CustomerID,OwnerID,TourID,HotelID,TransportationID,BookingID)
  VALUES (BranchID, CustomerID,OwnerID,TourID,HotelID,TransportationID,BookingID);

  

END InsertMake_Sale;
/
CREATE OR REPLACE PROCEDURE DeleteMake_Sale(
  S_BranchID   IN Branch.BranchID%TYPE,
  S_CustomerID   IN Customer.CustomerID%TYPE,
  S_OwnerID    IN  Owner.OwnerID%TYPE,
  S_TourID    IN Tour.TourID%TYPE,
  S_HotelID    IN Hotel.HotelID%TYPE,
  S_TransportationID     IN Transportation.TransportationID%TYPE,
  S_BookingID    IN Booking.BookingID%TYPE
)
IS
BEGIN
  DELETE FROM Make_Sale WHERE
    BranchID=S_BranchID and
    CustomerID=S_CustomerID and
    OwnerID=S_OwnerID and
    TourID=S_TourID and
    HotelID=S_HotelID and
    TransportationID=S_TransportationID and
    BookingID=S_BookingID;
END DeleteMake_Sale;
/
CREATE OR REPLACE PROCEDURE InsertBranch_Provides_Campaign(
	   BranchID   IN Branch.BranchID%TYPE,
	   CampaignID   IN Campaign.CampaignID%TYPE)  
IS
BEGIN

  INSERT INTO Branch_Provides_Campaign (BranchID, CampaignID)
  VALUES (BranchID,CampaignID);

END InsertBranch_Provides_Campaign;
/
CREATE OR REPLACE PROCEDURE DeleteBranch_Provides_Campaign(
  S_BranchID   IN Branch.BranchID%TYPE,
  S_CampaignID   IN Campaign.CampaignID%TYPE
)
IS
BEGIN
  DELETE FROM Branch_Provides_Campaign WHERE BranchID=S_BranchID and CampaignID=S_CampaignID;
END DeleteBranch_Provides_Campaign;
/
CREATE SEQUENCE CustomerID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;
  
  CREATE SEQUENCE PeopleID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;
  
  CREATE SEQUENCE GuideID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;
  
  CREATE SEQUENCE OwnerID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;
  
  CREATE SEQUENCE BranchID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;
  
   CREATE SEQUENCE TourID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;
  
     CREATE SEQUENCE AccountID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;
  
     CREATE SEQUENCE BookingID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;
  
  CREATE SEQUENCE TransportationID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;
  
  CREATE SEQUENCE HotelID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;
  
  CREATE SEQUENCE CampaignID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;
  
  CREATE SEQUENCE Type_Of_TourID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;
  
  CREATE SEQUENCE Type_Of_TransportationID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;
  
  CREATE SEQUENCE Type_Of_CampaignID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;
  
  CREATE SEQUENCE Type_Of_HotelID_Seq
  MINVALUE 1
  START WITH 1
  INCREMENT BY 1
  CACHE 20;


  CREATE OR REPLACE TRIGGER Customer_Trig
    BEFORE INSERT ON Customer
    FOR EACH ROW
  BEGIN
    SELECT CustomerID_Seq.nextval
    INTO :new.CustomerID
    FROM dual;
  END;
  /
  CREATE OR REPLACE TRIGGER People_Trig
    BEFORE INSERT ON People
    FOR EACH ROW
  BEGIN
    SELECT PeopleID_Seq.nextval
    INTO :new.PeopleID
    FROM dual;
  END;
  /
  CREATE OR REPLACE TRIGGER Account_Trig
    BEFORE INSERT ON Account
    FOR EACH ROW
  BEGIN
    SELECT AccountID_Seq.nextval
    INTO :new.AccountID
    FROM dual;
  END;
  /
  CREATE OR REPLACE TRIGGER Branch_Trig
    BEFORE INSERT ON Branch
    FOR EACH ROW
  BEGIN
    SELECT BranchID_Seq.nextval
    INTO :new.BranchID
    FROM dual;
  END;
  /
  CREATE OR REPLACE TRIGGER Owner_Trig
    BEFORE INSERT ON Owner
    FOR EACH ROW
  BEGIN
    SELECT OwnerID_Seq.nextval
    INTO :new.OwnerID
    FROM dual;
  END;
  /
  CREATE OR REPLACE TRIGGER Guide_Trig
    BEFORE INSERT ON Guide
    FOR EACH ROW
  BEGIN
    SELECT GuideID_Seq.nextval
    INTO :new.GuideID
    FROM dual;
  END;
  /
  CREATE OR REPLACE TRIGGER Type_Of_Hotel_Trig
    BEFORE INSERT ON Type_Of_Hotel
    FOR EACH ROW
  BEGIN
    SELECT Type_Of_HotelID_Seq.nextval
    INTO :new.Type_Of_HotelID
    FROM dual;
  END;
  /
  CREATE OR REPLACE TRIGGER Hotel_Trig
    BEFORE INSERT ON Hotel
    FOR EACH ROW
  BEGIN
    SELECT HotelID_Seq.nextval
    INTO :new.HotelID
    FROM dual;
  END;
  /
  CREATE OR REPLACE TRIGGER Booking_Trig
    BEFORE INSERT ON Booking
    FOR EACH ROW
  BEGIN
    SELECT BookingID_Seq.nextval
    INTO :new.BookingID
    FROM dual;
  END;
  /
  CREATE OR REPLACE TRIGGER Type_Of_Transportation_Trig
    BEFORE INSERT ON Type_Of_Transportation
    FOR EACH ROW
  BEGIN
    SELECT Type_Of_TransportationID_Seq.nextval
    INTO :new.Type_Of_TransportationID
    FROM dual;
  END;
  /
  CREATE OR REPLACE TRIGGER Transportation_Trig
    BEFORE INSERT ON Transportation
    FOR EACH ROW
  BEGIN
    SELECT TransportationID_Seq.nextval
    INTO :new.TransportationID
    FROM dual;
  END;
  /
  CREATE OR REPLACE TRIGGER Type_of_Tour_Trig
    BEFORE INSERT ON Type_Of_Tour
    FOR EACH ROW
  BEGIN
    SELECT Type_Of_TourID_Seq.nextval
    INTO :new.Type_Of_TourID
    FROM dual;
  END;
  /
  CREATE OR REPLACE TRIGGER Tour_Trig
    BEFORE INSERT ON Tour
    FOR EACH ROW
  BEGIN
    SELECT TourID_Seq.nextval
    INTO :new.TourID
    FROM dual;
  END;
  /
  CREATE OR REPLACE TRIGGER Type_Of_Campaign_Trig
    BEFORE INSERT ON Type_Of_Campaign
    FOR EACH ROW
  BEGIN
    SELECT Type_Of_CampaignID_Seq.nextval
    INTO :new.Type_Of_CampaignID
    FROM dual;
  END;
  /
  CREATE OR REPLACE TRIGGER Campaign_Trig
    BEFORE INSERT ON Campaign
    FOR EACH ROW
  BEGIN
    SELECT CampaignID_Seq.nextval
    INTO :new.CampaignID
    FROM dual;
  END;


  

 


