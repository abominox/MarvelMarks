const mysql = require('mysql');
const bcrypt = require('bcrypt')
require('dotenv').config()

module.exports = {
    addBookmark,
    deleteBookmark,
    verifyUser,
    registerUser
}

// General Functions
function connect() {
    return mysql.createConnection({
        host: process.env.DB_HOST,
        user: process.env.DB_USER,
        database: process.env.DB_NAME,
        password: process.env.DB_PASS
    });
}

// Bookmark Functions
async function addBookmark(req) {
    //var statement = "INSERT INTO Bookmark () VALUES (?)"
}

async function deleteBookmark(req) {
    //todo
}

// User Functions
async function verifyUser(req) {
    //todo
}

async function registerUser(req) {
    var statement = "INSERT INTO User (date_registered, username, password, email) VALUES (?)"
    var values = [
        Math.floor(Date.now() / 1000),
        req.body.username,
        await bcrypt.hash(req.body.password, 10),
        req.body.email_address
]
    var connection = connect().query(statement, [values], function(err) {
        if (err) {
            console.log(err)
            connection.end()
            //res.redirect(400, '/')
        }
    })
}
