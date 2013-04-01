<h3>Installation</h3>

<p>You must have Apache, MySQL, and PHP installed. A simple download and install of <a href="http://www.apachefriends.org/en/xampp.html">XAMPP</a> may be the fastest method to get started, but other setups will work as well.</p>

<p>Checkout this project in the xampp/htdocs directory, and install the depencies by running the following:<br />
    <code>git clone git://github.com/asheehan/zendTodo.git zendTodo</code><br />
    <code>php composer.phar self-update</code><br />
    <code> php composer.phar install</code>
</p>

<p>
    Setup the MySQL database and user by running: <br />
    <code>
        GRANT ALL ON *.* TO zend_user@localhost IDENTIFIED BY 'longcat';<br />
    </code>
    From the commandline we can now import tables/data (file is located in the root directory of the git project: <br />
    <code>
        mysql -u zend_user -p &lt; zend_todo.sql
    </code>
</p>


<p>Modify your apache vhosts (default for xampp is xampp/apache/conf/extra/http-vhosts.conf) to point to zendTodo/public
    <code>
        &lt;VirtualHost *:80&gt;<br />
            &nbsp;&nbsp;%DocumentRoot "C:\xampp\htdocs\zendTodo\public"<br />
            &nbsp;&nbsp;ServerName zendTodo<br />
            &nbsp;&nbsp;ServerAlias zendTodo<br />
            &nbsp;&nbsp;&lt;Directory "C:\xampp\xampp\htdocs\zendTodo\public"&gt;<br />
                &nbsp;&nbsp;&nbsp;&nbsp;Order allow,deny<br />
                &nbsp;&nbsp;&nbsp;&nbsp;Allow from all<br />
            &nbsp;&nbsp;&lt;/Directory&gt;<br />
        &lt;VirtualHost&gt;<br />
    </code>
</p>

<p>
    Restart apache and point your browser to <a href="http://zendTodo">http://zendTodo</a> (you can also modify your /etc/hosts to have zendTodo resolve without the need for http://)
</p>

<hr />

<h3>Project Objective</h3>

Create a simple “TO-DO List” web application, based on the Zend Framework, which
demonstrates knowledge of object-oriented PHP best practices and an understanding of the
MVC design pattern (as implemented in Zend Framework).

Functional requirements

<ol>
<li>On the main page, a TO-DO List containing a list of items should be displayed. Each
item in this list should be displayed with a checkbox, Edit link, and Delete link alongside
it.</li>
<li>The TO-DO list should be loaded from a database each time this page is accessed.</li>
<li>Below the form, an “Add New TO-DO” button should be displayed.</li>
<li>Below the form, a “Delete Selected” button should be displayed. Clicking this button
should trigger the removal of all currently selected items from the TO-DO List. If no items
were selected, an error message should be displayed (this validation can occur client-
side or server-side).</li>
<li>Clicking the “Add New TO-DO” button or the Edit link next to an item in the list should
both take the user to a new page that contains a form consisting of a text field and a
Save button. If an Edit link was clicked to get to this page, the text field should be pre-
populated with the TO-DO item associated with that Edit link.</li>
<li>Clicking the Save button on the Add/Edit form should either save the contents of the text
field as a new TO-DO item (if adding) or update the existing TO-DO item (if editing).</li>
</ol>

Architectural requirements

<ol>
<li>The application must be written in object-oriented PHP.</li>
<li>The application must utilize the Zend framework and adhere to its design patterns.</li>
<li>The application must demonstrate usage of the Model-View-Controller (MVC) design
pattern.</li>
<li>The application must utilize a MySQL database, accessed by appropriately utilizing the
Zend Framework’s model patterns.</li>
</ol>

Deliverables

<ol>
<li>The (well-commented) source code for the PHP application including any dependent
classes or libraries (e.g. Zend Framework).</li>
<li>A MySQL dump file that can be used to recreate your application’s database.</li>
<li>A brief document outlining how to install and access your application using the above
deliverables.</li>
</ol>
