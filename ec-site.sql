create table tblClient(cilentId int primary key not null auto_increment,
					cilentName nvarchar(255) not null,
					clientKana nvarchar(255) not null,
					clientSex nvarchar(255) not null,
					clientBirthday date not null,
					clientPostCode varchar(8) not null,
					clientAdd nvarchar(255) not null,
					clientTel varchar(20) not null,
					clientMailAddress nvarchar(255));
create table tblItem(itemId int primary key not null auto_increment,
					itemName nvarchar(255) not null,
					itemPrice int not null,
					itemData nvarchar(1000),
					itemCount int not null,
					itemCategory int (255) not null,
					itemImg MEDIUMBLOB);
create table tblCategory(categoryId int primary key not null auto_increment,
					categoryName nvarchar(255) not null);