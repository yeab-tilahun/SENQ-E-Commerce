go	-- Creating 'Ecom' Database
IF NOT EXISTS (SELECT name FROM master.sys.databases WHERE name = N'Ecom') 
	CREATE DATABASE Ecom

go -- using Database
use Ecom; 


drop table product	
go--Creating product Table
create table Product 
(
	ProID int identity(1,1) primary key,
	PName varchar(50) not null,
	UPrice decimal(7,2) not null,
	CatagID int References Catagory(CatagID),
	Qty int,
	ProDesc varChar(300),
	ProStatus int,
	img varchar(250)
)



drop table Catagory		
go--Creating Catagory Table
create table Catagory
(
	CatagID int identity(1,1) primary key,
	CatagName varchar(50) not null unique,
)

drop table Transactions	
go--Creating Transactions Table
create table Transactions
(
	TranID int primary key ,
	CustID int not null,
	Total decimal(7,2) not null,
	_Date date default getDate(),
)


drop table TransactionsDetails
go--Creating TransactionsDetails Table
create table TransactionsDetails
(
	TranID int,
	ProID int,
	Uprice decimal(7,2) not null,
	Qty int,
	primary key(TranID,ProID),
)

drop table Customers
go--Creating Customers Table
create table Customers
(
	CustID int identity(1,1) primary key,
	Fname varchar(20) not null,
	Lname varchar(20) not null,
	PassWrd varchar(10) not null,
	Email varchar(200) not null unique, 
	phoneNo varchar(15) unique,
	img varChar(250)
)




drop table Admins
go--Creating Admins Table
create table Admins
(
	userName varchar(20),
	PassWrd varchar(20),
)




select * from Product