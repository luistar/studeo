# Studeo
Studeo is a basic CMS built for university courses. It allows students to share news and knowledge efficiently.

# The problem
Computer Science students @ *Università degli Studi di Napoli "Federico II"* were using 
a phpbb board to share solutions to previous tests and exercises. As the number of users and solutions grew, it became hard to
properly index everything manually. So we decided to build Studeo.

# PhpBB integration and dependency
Studeo is meant to integrate with an existing phpbb board bulletin and to provide additional indexing features to said board.
Although being conceived to be used along with phpbb, Studeo will be almost completely independent from the latter, 
as it will provide indexing by link. 
Only the authentication and authorization system will initially depend on phpbb USERS table. 
Other options shall be added as the project grows. 
