# interact with database via PDO
- create Dbh class that hold database info(host, user, pwd, dbName), 
    and a protect connect() method which used in child class for connect database (also set fetch mode);
- child class extends Dbh class to leverage the database connect method to manipulate the data(SAUD)
    use placeholder '?' in query when use user input
    (non-input: query($query); input: prepare($query) + execute([params..]))
