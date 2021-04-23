require('dotenv').config()
const express = require('express');
const app = express();
app.use(express.json())

require('./db/conn')
const User = require('./model/userSchema')
app.use(require('./router/auth'))

const port = process.env.PORT || 8000

//Middleware
const middleware = (req, res, next) => {
console.log('middleware')
}
middleware();

app.get('/', (req,res) => {
    res.send('hello');
})

app.listen(port , () => {
    console.log(`Backend is running at Port ${port}`)
})
// mongodb+srv://Ankit628792:<password>@cluster0.tde6c.mongodb.net/myFirstDatabase?retryWrites=true&w=majority
 