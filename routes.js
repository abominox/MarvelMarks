const db = require('./db.js')
const thumbnail = require('./thumbnail.js')

// General Request Logging Function
function log(req) {
    console.log(req.method + ' ' + req.originalUrl
        + ' --- ' + req.connection.remoteAddress);
}

module.exports = function (app) {
    // Static Routes
    app.get(['/', '/login.html'], (req, res) => {
        res.sendFile('public/html/login.html', { root: __dirname })
        log(req)
    })

    app.get('/home.html', (req, res) => {
        res.sendFile('public/html/home.html', { root: __dirname })
        log(req)
    })

    // API Routes
    app.post('/api/v1/register', async (req, res) => {
        db.registerUser(req)
        log(req)
        res.redirect(301, '/');
    })
}
