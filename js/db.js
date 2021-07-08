var mysql = require("mysql");

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "onlinetutorfinder",
});

var c = "a";

con.connect(function (err) {
  if (err) throw err;
  //Update the address field:
  var sql =
    "UPDATE login SET Password = 'c' WHERE Email = 'azahinhasan@gmail.com'";
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log(result.affectedRows + " record(s) updated");
  });
});
