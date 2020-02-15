const express = require('express')
const app = express()

app.use(express.static('public'))

app.get('/:var(login.html)?', (request, response) => {
  response.sendFile('public/html/login.html', {root: __dirname })
  console.log(request.connection.remoteAddress)
  }
)

app.get('/home.html', (request, response) => {
  response.sendFile('public/html/home.html', {root: __dirname })
  console.log(request.connection.remoteAddress)
  }
)

app.listen(3000, '0.0.0.0', (err) => {
  if (err) {
    return console.log('something bad happened', err)
  }

  //console.log(`server is listening on ${port}`)
  console.log('Server listening on port 3000')
  }
)