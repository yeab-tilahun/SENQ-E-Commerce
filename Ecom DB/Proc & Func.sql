go	-- Creating 'Ecom' Database
IF NOT EXISTS (SELECT name FROM master.sys.databases WHERE name = N'Ecom') 
	CREATE DATABASE Ecom

go -- using Database
use Ecom; 

go -- USP Get Last Product ID
Create Proc USP_GetLastProductID
as
begin
	select max(ProID) as 'ProID' from Product;
end


go -- USP Get Last Customer ID
Create Proc USP_GetLastCustomerID
as
begin
	select max(CustID) from Customers;
end







go--UpdateCustomerInfo
Create Proc USP_UpdateCustomerInfo
(
  @CustID varchar(200), @Fname varchar(20), @Lname varchar(20),  @passWrd varchar(20), @Email varchar(200),  @phoneNo varchar(20)
)
as
begin

	update Customers
	set Fname=@Fname, Lname=@Lname,passWrd=@passWrd,Email=@Email,phoneNo=@PhoneNo
	Where CustID=CONVERT (int,@CustID) 
	return 1;
end



go--ViewSpecificCustomerInfo
Create Proc ViewSpecificCustomerInfo @CustID varchar(200)
as
begin
	select Fname,Lname,PassWrd,Email,phoneNo,img 
	from Customers
	Where CustID=CONVERT(int,@CustID)
end








go -- UDF to get UnitPrice
Alter function UDF_getUnitPrice(@ProID varChar(20))
returns decimal(7,2) As 
begin
  return (select UPrice from product where ProID=@ProID);
end


go -- UDF to get Product Qty
Create function UDF_getProductQty(@ProID int)
returns int as
begin
  return (select Qty from product where ProID=@ProID);
end


go -- UDF to get Catagory ID
Create function UDF_getCatagID(@catagName varchar(20))
returns int As 
begin
  return (select CatagID from Catagory where @catagName=catagName);
end


go -- UDF to get Catagory Name
Create function UDF_getCatagName(@catagID int)
returns varchar(30) As 
begin
  return (select CatagName from Catagory where @catagID=catagID);
end


go -- UDF to Get Product Name
Create function UDF_getProductName(@ProID int)
returns varchar(50) As 
begin
  return (select Pname from product where ProID=@ProID);
end

 
go -- UDF to Get Product Stock
Create function UDF_getProductStock(@ProID int)
returns int As 
begin
  return (select Qty from product where ProID=@ProID);
end

go -- USP to Add Customer 
Alter Proc USP_AddCustomer
(
	@Fname varchar(20), @Lname varchar(20),  @passWrd varchar(20), @Email varchar(20),  @phoneNo varchar(20), @img varChar(250) 
)
as
begin
  Insert into Customers(Fname,Lname,passWrd,Email, phoneNo,img)
		     values(@Fname,@Lname,@passWrd,@Email,@phoneNo,@img);
	return 1;
end


go -- USP to Remove Customer
Alter Proc USP_RemoveCustomer( @CustID varChar(200))
as
begin
  delete from Customers where CustID=CONVERT(int, @CustID);
  return 1;
end


go -- USP to Add New Product
alter Proc USP_AddNewProduct
(
	@Pname varchar(20), @UPrice varchar(200), @catagName varchar(30), @Qty varchar(200), 
	@ProDesc varchar(300), @img varchar(250 )
)
as
begin
	DECLARE @catagID int;
	select @catagID=dbo.UDF_getCatagID(@catagName)

	Insert into product(Pname , UPrice , catagID  , Qty , ProDesc, 
						ProStatus , img)
				values (@Pname , CONVERT(decimal(7,2), @UPrice) , @catagID , CONVERT(int,@Qty) , @ProDesc, 
						1 , @img+'.png')
	return 1;
end



go -- USP to Remove Product
Alter Proc USP_RemoveProduct( @ProID varchar(200) )
as
begin
	Update product set ProStatus=0  where ProID=CONVERT(int,@ProID); --setting status of product to Zero
	return 1;
end

go -- USP Add Product Qty
Alter Proc USP_AddProductQty(@ProID varchar(200),@Amount varchar(200))
as
begin
	Update Product  
	set	Qty= Qty + CONVERT(int,@Amount)  
	where ProID=CONVERT(int,@ProID); --Updating product stock by amount
	return 1;
end






go -- USP Update Product Price
alter Proc USP_UpdateProductPrice(@ProID varchar(200),@newPrice varchar(200) )
as
begin
	Update Product 
	set	UPrice=CONVERT(decimal(7,2),@newPrice) 
	where ProID=CONVERT(int,@ProID); --Updateing product Unit Price
	return 1;
end




go -- USP Return a Specific Product
alter Proc USP_specificProduct(@ProID varchar(200))
as
begin
		select ProID,PName,UPrice,dbo.UDF_getCatagName(CatagID) as 'CatagName', 
		       Qty, ProDesc,img
		from Product
		where ProID=CONVERT(int,@ProID)
end



-- Use this one for Customer Side Programming
go -- USP Return List of Products matching searchInput AND Catagory
Alter Proc USP_ProductList(@searchInput varchar(25), @catagName varchar(30))
as
begin
	if(@catagName='All')
	  begin
		select P.ProID, P.PName,P.UPrice, P.Qty, P.ProDesc,P.img
		from Product P,Catagory C
		where (P.PName like '%'+ @searchInput +'%' OR P.ProDesc like '%'+ @searchInput +'%')  AND 
			  (P.ProStatus=1 AND P.Qty>0) AND 
		      (P.CatagID=C.CatagID)
	  END
	ELSE
	  begin
		select P.ProID, P.PName,P.UPrice, P.Qty, P.ProDesc,P.img
		from Product P,Catagory C
		where (P.PName like '%'+ @searchInput +'%' OR P.ProDesc like '%'+ @searchInput +'%')  AND 
			  (C.CatagName=@catagName) AND
			  (P.ProStatus=1 AND P.Qty>0) AND  
		      (P.CatagID=C.CatagID)
	  END
end


-- Use this One for Admin Side Programming
go -- USP Return List All Products Matching searchInput and ProStatus
Alter Proc USP_AllProductList(@searchInput varchar(25))
as
begin
		select ProID, PName,Qty,UPrice
		from Product 
		where (PName like '%'+ @searchInput +'%' OR ProID like '%'+ @searchInput +'%') AND ProStatus='1'
end


go -- USP to View All Transactions 
Alter Proc USP_ViewAllTransactions @searchInput varchar(200)
as
begin
	select TranID, CustID,Total,Cast(_Date as varchar(20)) as 'Date'
	from Transactions
	where TranID like '%'+ @searchInput +'%'
end


go -- USP to View Transactions of specific Customer 
Alter Proc USP_ViewSpecificCustomerTransactions (@CustID varchar(200))
as
begin
	select TranID,Total,_Date
	from Transactions
	where CONVERT(int,@CustID)=CustID
end





go -- USP to View Transactions Details 
Alter Proc USP_ViewTransactionsDetails (@TranID varchar(200))
as
begin
	select ProID,UPrice,Qty, Uprice*Qty as 'ProductTotal' 
	from TransactionsDetails
	where TranID=CONVERT(int,@TranID)
end



go -- USP to View Transactions of a Customer 
Create Proc USP_ViewTransactionsCustomer (@CustID varchar(200))
as
begin
	select P.PName,TD.UPrice,TD.Qty, TD.Uprice*TD.Qty as 'ProductTotal' 
	from TransactionsDetails TD,Transactions T,Product P
	where T.CustID=CONVERT(int,@CustID) 
	      AND T.TranID=TD.TranID
		  AND P.ProID=TD.ProID
end




--Admin and Cust Login



go -- USP to Login in Customer
Alter Proc USP_CustLogin (@emailOrPhone varchar(200),@passWrd varchar(30))
as
begin
	select CustID
	from Customers
	Where (@emailOrPhone=Email OR @emailOrPhone=phoneNo) AND @passWrd=PassWrd
end




go -- USP to Login in Admin
Create Proc USP_AdminLogin (@userName varchar(30),@passWrd varchar(30))
as
begin
	select userName,PassWrd
	from Admins
	Where @userName=userName AND @passWrd=PassWrd
end



select * from Product





















--- Proc to make a Tran and Tran Details

go -- USP Get last TranID ID 
Create Proc USP_GetLastTranID
as
begin
	      --Getting last TranID number
		  select Max(TranID) as 'TranID' from Transactions 
end


-- must be used in a forloop
go -- USP TransactionsDetails
create Proc USP_TransactionsDetails(@ProID int, @Qty int,@TranID int)
as
begin

	--Chechking if Qty Reqested is greater than What is in Stock
	if(@Qty>dbo.UDF_getProductQty(@ProID)) 
		SET @Qty=(dbo.UDF_getProductQty(@ProID)) -- If Qty Requested id greater, set Qty Requested to all in Stock, so that Maxium is Sold
	 

	Update Product set Qty=Qty - @Qty where ProID=@ProID;  --Reducing Product Qty
	
	
	Insert into TransactionsDetails(TranID,ProID,UPrice,Qty)  --inserting into Transaction Details Table
	values(@TranID,@ProID,dbo.UDF_getUnitPrice(@ProID),@Qty)
	
	return 1;	
end

go -- USP Make Transaction -> Finalizing
create Proc USP_MakeTransaction(@CustID int)
as
begin
	Declare @TranID int;
	Select  @TranID=max(TranID) from TransactionsDetails;--Storing Value of Last TransactionDetails

	Insert Transactions(TranID,CustID,Total,_Date)  --inserting into Transactions table
	Select @TranID,@CustID,sum(Qty*Uprice), getDate()
	From TransactionsDetails
	Where TranID=@TranID;

	return 1;
end