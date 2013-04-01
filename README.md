Objective

Create a simple “TO-DO List” web application, based on the Zend Framework, which
demonstrates knowledge of object-oriented PHP best practices and an understanding of the
MVC design pattern (as implemented in Zend Framework).

Functional requirements

1   On the main page, a TO-DO List containing a list of items should be displayed. Each
item in this list should be displayed with a checkbox, Edit link, and Delete link alongside
it.
2   The TO-DO list should be loaded from a database each time this page is accessed.
3   Below the form, an “Add New TO-DO” button should be displayed.
4   Below the form, a “Delete Selected” button should be displayed. Clicking this button
should trigger the removal of all currently selected items from the TO-DO List. If no items
were selected, an error message should be displayed (this validation can occur client-
side or server-side).
5   Clicking the “Add New TO-DO” button or the Edit link next to an item in the list should
both take the user to a new page that contains a form consisting of a text field and a
Save button. If an Edit link was clicked to get to this page, the text field should be pre-
populated with the TO-DO item associated with that Edit link.
6   Clicking the Save button on the Add/Edit form should either save the contents of the text
field as a new TO-DO item (if adding) or update the existing TO-DO item (if editing).

Architectural requirements

1   The application must be written in object-oriented PHP.
2   The application must utilize the Zend framework and adhere to its design patterns.
3   The application must demonstrate usage of the Model-View-Controller (MVC) design
pattern.
4   The application must utilize a MySQL database, accessed by appropriately utilizing the
Zend Framework’s model patterns.

Deliverables

1   The (well-commented) source code for the PHP application including any dependent
classes or libraries (e.g. Zend Framework).
2   A MySQL dump file that can be used to recreate your application’s database.
3   A brief document outlining how to install and access your application using the above
deliverables.