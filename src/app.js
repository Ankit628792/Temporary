require('dotenv').config()
const express = require('express');
const app = express();
const path = require('path');
const hbs = require('hbs');
const bcrypt = require('bcryptjs')
const jwt = require('jsonwebtoken')
const cookieParser = require('cookie-parser')
const auth = require('./middleware/auth')

require('./db/conn')
const User = require('./models/registers')
const Doctor = require('./models/doctorregister')
const port = process.env.PORT || 8000;

var authenticated = {log : "UserIcon", logRedirect: "/logout"}
var authenticatedUser = false;

const static_path = path.join(__dirname, '../public')
const template_path = path.join(__dirname, '../templates/views')
const partials_path = path.join(__dirname, '../templates/partials')

app.use(express.json())
app.use(cookieParser())
app.use(express.urlencoded({extended: false}))

app.use(express.static(static_path));
app.set("view engine", "ejs");
app.set('views', template_path)
hbs.registerPartials(partials_path);

app.get('/', (req,res) => {

    authenticatedUser ? authenticated = {log : "UserIcon", logRedirect: "/logout"} : authenticated = {log : "Login", logRedirect: "#modal-logs"}
    res.render("index", authenticated)
});

app.get('/about', auth, (req,res) => {
    res.render("about", authenticated)
});

// app.get('/login', (req,res) => {
//     res.render("login")
// });


app.get('/profile', auth, (req,res) => {
    
    res.render("profile", {authenticated: authenticated , user: req.user})
});

app.get('/updateprofile', auth, (req,res) => {
    
    res.render("updateprofile", {authenticated: authenticated , user: req.user})
});


app.get('/logout', auth, async (req,res) => {
    try {
        res.clearCookie("jwt");

        // for current user
        // req.user.Tokens = req.user.Tokens.filter((currentElement) => {
        //     return currentElement.token !== req.token
        // })

        // for all user
        // if(req.user == null){

        //     req.doctor.Tokens = []
        //     console.log("Logout successfuly !")
        //     await req.doctor.save();
        // }
        // if(req.doctor == null){
        //     req.user.Tokens = []
        //     await req.user.save();
        //     console.log("Logout successfuly !")

        // }
        // console.log(req.user)
        req.user.Tokens = []

await req.user.save();
        authenticatedUser = false;
        res.redirect('/')
    } catch (error) {
        res.status(500).send(error)
    }
});


app.post('/userregister', async (req,res) => {
    try {
        const Password = req.body.password;
        const ConfirmPassword = req.body.confirm_password;

        if(Password === ConfirmPassword){
            const registerUser = new User({
                FullName : req.body.fullname ,
                Username : req.body.username ,
                Email : req.body.email ,
                Password : req.body.password ,
                ConfirmPassword : req.body.confirm_password ,
            });
           
// console.log(registerUser)

            const token = await registerUser.generateAuthToken();

            res.cookie("jwt", token , {
                expires: new Date(Date.now() + 60000),
                httpOnly: true
            })

            const registeredUser = await registerUser.save();
            // console.log(registeredUser)

            authenticatedUser =true;
            res.status(201).redirect('/')
        }else{
            res.send('Invalid Credentials')
        }

    } catch (error) {
        // res.redirect('login')
        res.status(400).send(error)
        
    }
});

app.post('/userlogin', async (req, res) => {
    try {
        const Email = req.body.email;
        const Password = req.body.password;

        const userEmail = await User.findOne({Email: Email});
        // console.log(userEmail)
        const isMatch = await bcrypt.compare(Password, userEmail.Password)
        const token = await userEmail.generateAuthToken();
        // console.log("login token" + token)

        res.cookie("jwt", token , {
            expires: new Date(Date.now() + 600000),
            httpOnly: true,
            // secure:true
        })

        // if(userEmail.Password === Password){
            if(isMatch){
                authenticatedUser =true;
                // authenticated = {log : "UserIcon", logRedirect: "/logout"}
            res.redirect('/') 
        }else{
            res.send("Credential don't matched.")
        }
    } catch (error) {
        res.status(400).send("Invalid Credential ")
    }
})




app.post('/doctorregister', async (req,res) => {
    try {
        const Password = req.body.password;
        const ConfirmPassword = req.body.confirm_password;

        if(Password === ConfirmPassword){
            const registerDoctor = new Doctor({
                FullName : req.body.fullname ,
                Username : req.body.username ,
                Email : req.body.email ,
                Password : req.body.password ,
                ConfirmPassword : req.body.confirm_password ,
            });
           
// console.log(registerDoctor)

            const token = await registerDoctor.generateAuthToken();

            res.cookie("jwt", token , {
                expires: new Date(Date.now() + 60000),
                httpOnly: true
            })

            const registeredDoctor = await registerDoctor.save();
            // console.log(registeredDoctor)

            authenticatedUser =true;
            res.status(201).redirect('/')
        }else{
            res.send('Invalid Credentials')
        }

    } catch (error) {
        // res.redirect('login')
        res.status(400).send(error)
        
    }
});

app.post('/doctorlogin', async (req, res) => {
    try {
        const Email = req.body.email;
        const Password = req.body.password;

        const doctorEmail = await Doctor.findOne({Email: Email});
        // console.log(userEmail)
        const isMatch = await bcrypt.compare(Password, doctorEmail.Password)
        const token = await doctorEmail.generateAuthToken();
        
        res.cookie("jwt", token , {
            expires: new Date(Date.now() + 600000),
            httpOnly: true,
            // secure:true
        })

        // if(doctorEmail.Password === Password){
            if(isMatch){
                authenticatedUser =true;
                authenticated = {log : "UserIcon", logRedirect: "/logout"}
            res.redirect('/')
        }else{
            res.send("Credential don't matched.")
        }
    } catch (error) {
        res.status(400).send("Invalid Credential ")
    }
})


app.get('/doctor', async (req,res) => {
    try {
        // const doctor = await Doctor.find().select({FullName:1, Username: 1, Email: 1 , _id:1})
        const doctor = await Doctor.find()
        res.status(201).send(doctor)
        
    } catch (error) {
     res.status(500).send(error)   
    }
})

app.post('/updateprofile/:id', async (req,res) => {
    try {
        
        var _id = req.params.id;
        _id = _id.slice(1, _id.length)
        
        const updateDoctor = await Doctor.findByIdAndUpdate(_id , req.body, {new :true});
        await updateDoctor.save()
        res.redirect('/profile');
        // res.send(updateDoctor)
    } catch (error) {
        res.status(404).send(error);
    }
});




app.listen(port, () => {
    console.log(`Backend is running at ${port} !`)
})