const express = require('express');
const app = express();
const path = require('path');
const data = require('./job.json');

const request = require("request");
const cheerio = require("cheerio");
var fs = require('fs');

const port = process.env.PORT || 8000;

const static_path = path.join(__dirname, '../public')

app.use(express.json())
app.use(express.urlencoded({extended: false}))

app.use(express.static(static_path));
app.set("view engine", "hbs");


let jobs = `https://in.indeed.com/jobs-in-India`;
request(jobs, cb);

function cb(error, response, body) {
  parseBody(body);
}


function parseBody(body) {
    let $ = cheerio.load(body); // Holds the data of Body

    const  address = `.jobsearch-SerpJobCard.unifiedRow.row.result`

     
    for(let i=1; i<= $(`${address}`).length ; i++){
        const title = $(`${address}:nth-child(${i}) .title a`).text();
        const company = $(`${address}:nth-child(${i}) .sjcl .company`).text();
        // (company === '' || null || 'undefind') ? (company = $(`${address}:nth-child(${i}) .sjcl .company a`).text() ) : (company = $(`${address}:nth-child(${i}) .sjcl .company`).text());
        const location = $(`${address}:nth-child(${i}) .sjcl .location`).text();
        const summary = $(`${address}:nth-child(${i}) .summary`).text();

         //write data
if(!fs.existsSync(`job.json`)){
    fs.writeFileSync('job.json', JSON.stringify([]));
}
else{
        let rdata = JSON.parse(fs.readFileSync('job.json'));
      let obj = {
        title : title.trim(),
        company: company.trim(),
        location: location.trim(),
        summary: summary.trim(),
      }
      if(obj.title !== "")
      rdata.push(obj);
      fs.writeFileSync('job.json',JSON.stringify(rdata));
    }
}
}


app.get('/', (req,res) => {
  res.render("index");
});

app.get('/jobs', (req,res) => {
  try {
    res.status(200).send(data);
  } catch (error) {
    res.status(400).send(error)
  }
});


app.listen(port, () => {
  console.log(`Server is Running at Port No :  ${port}`)
})
