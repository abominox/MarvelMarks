const express = require('express')
const fs = require('fs')
const https = require('https')
const passport = require('passport')

const app = express()
app.use(express.urlencoded({
  extended: true
}))

require('./routes.js')(app)

app.use(express.static('public'))

// Init Server (HTTPS)
server = https.createServer({
  key: fs.readFileSync('./misc/marvelmarks.key'),
  cert: fs.readFileSync('./misc/marvelmarks.cert')
}, app)

server.listen(3000, '0.0.0.0', () => {
  console.log('App now listening on port 3000!')
})
