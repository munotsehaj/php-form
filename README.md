# php-form

A basic contact information form that allows for information storage in a MySQL Database and exporting through a PDF using PHP.

Using XAMPP, I set up a MySQL database to store my data. I connected this database to my front-end HTML & CSS using several PHP files. This project allows a user or a customer to input information including their last name, first name, phone number, street address, city, state, and zipcode. On the backend, one can view all of the data input through the front end and also search through it using all of the criteria mentioned above. All of this data is presented in a PDF. To implement the creation of the PDF, I used the FPDF PHP class to create a custom table inside a PDF page.